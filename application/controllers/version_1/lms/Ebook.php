<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Ebooks";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $this->sms_view(__FUNCTION__);
    }

    public function reader($ebook){
        $this->data['ebook'] = $ebook;
        $this->sms_view(__FUNCTION__);
        
    }
    public function upload_learning_plan(){
        header('Content-Type: application/json'); // set json response headers
        $preview = $config = $errors = [];
        $input = 'upload_files'; // the input name for the fileinput plugin
        // print_r($_REQUEST['lesson_id']);
        // print_r($_FILES);
        if (empty($_FILES[$input])) {
            return [];
        }

        if(!is_dir(realpath('resources/uploads/learning_plan/'.$_REQUEST['lesson_id']))){
            $quiz_path = realpath('resources/uploads/learning_plan').'/'.$_REQUEST['lesson_id'];
            // echo "no path if first";
            if(mkdir($quiz_path,0777,TRUE)){
                // echo "quiz_path ". $_REQUEST['folder'];
                $path = realpath('resources/uploads/learning_plan/').'/'.$_REQUEST['lesson_id'];
                // echo "finished creating first path";
               
            }
            
        }else{

            $check_path = realpath('resources/uploads/learning_plan/').'/'.$_REQUEST['lesson_id'];
            if(!is_dir($check_path)){
                if(mkdir($check_path,0777,TRUE)){
                    $path = realpath('resources/uploads/learning_plan/').'/'.$_REQUEST['lesson_id'];
                }
            }else{
                $path = realpath('resources/uploads/learning_plan/').'/'.$_REQUEST['lesson_id'];
            }
        }

        $total = count($_FILES[$input]['name']); // multiple files
        // // print_r($path);
        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES[$input]['tmp_name'][$i]; // the temp file path
            $fileName = $_FILES[$input]['name'][$i]; // the file name
            $fileSize = $_FILES[$input]['size'][$i]; // the file size
            $filetype = $_FILES[$input]['type'][$i]; // the file size
            
             //Make sure we have a file path
            if ($tmpFilePath != ""){
                //Setup our new file path
                $newFilePath = $path.'/' . "learning_plan.pdf";
                $newFileUrl = $this->ben_resources('uploads/learning_plan/').'/'.$_REQUEST['lesson_id'].'/optical.pdf';
                
                //Upload the file into the new path
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $fileId = "learning_plan" . $i; // some unique key to identify the file
                    $preview[] = $newFileUrl;
                    
                    $filetype = explode("/", $filetype)[0];
                    
                    $optical_data['id'] = $_REQUEST['lesson_id'];
                    $optical_data['learning_plan'] = "learning_plan.pdf";
                    $this->lesson_model->update("lesson",$optical_data);
                    $config[] = [
                            'key' => $fileId,
                            'caption' => "learning_plan.pdf",
                            'size' => $fileSize,
                            'url' => $this->ben_link("lms/learning_plan/ajax_delete/"),
                            'type'=>$filetype,
                        ];

                } else {
                    $errors[] = "learning_plan.pdf";
                }
            } else {
                $errors[] = "learning_plan.pdf";
            }
        }
        $out = ['initialPreview' => $preview, 'initialPreviewConfig' => $config, 'initialPreviewAsData' => false];

        if (!empty($errors)) {
            $img = count($errors) === 1 ? 'file "' . $error[0]  . '" ' : 'files: "' . implode('", "', $errors) . '" ';
            $out['error'] = 'Oh snap! We could not upload the ' . $img . 'now. Please try again later.';
        }
        echo json_encode($out); // return json data
        exit();
    }

    public function lesson_bank_sms($data=""){

        $this->data['lesson_packages'] = $this->lesson_model->lesson_packages();
        $this->sms_view("lesson_bank_sms");
    }

    public function assignment(){
        $this->page_title = "Assignment";
        if($this->session->userdata("account_type_id") == 4){

            $this->data['all_data'] = $this->lesson_model->assignment_lessons();

        }else{

            $this->data['all_data'] = $this->lesson_model->multiple_join(array('lesson','subject'));
            $add_data = $this->section_model->multiple_join(array('lesson','grade'));
            $this->data['all_data'] = $this->section_model->merge_multiple($this->data['all_data'],$add_data);
            $add_data = $this->section_model->multiple_join(array('lesson','grade'));
            $this->data['all_data'] = $this->section_model->merge_multiple($this->data['all_data'],$add_data);

        }

        $this->ben_view(__FUNCTION__);
        
    }

    public function teacher_assignment(){

        $this->ben_view_clear_with_navigation(__FUNCTION__);
        
    }

    public function student_assignment(){

        $this->ben_view_clear_with_navigation(__FUNCTION__);
        
    }

    public function create($assignment="0"){

        $company_id = $this->session->userdata('company_id');
        $this->data['company_data']= $this->company_model->all_limited('company',$company_id);
        $this->data['subject_data']= $this->company_model->all_limited('subject',$company_id);
        $this->data['grade_data']= $this->company_model->all_limited('grade',$company_id);
        $this->data['account_data']= $this->company_model->all_limited('account',$company_id);
        $this->data['semester_data']= $this->company_model->all_limited('semester',$company_id);
        $this->data['assignment']= $assignment;

        $this->sms_view(__FUNCTION__);
       
    }

    public function import($lesson_id=""){
        ini_set('max_execution_time', 300);
        $old_lesson_id = $lesson_id;
        $lesson_data = $this->lesson_model->get_lesson_data_by_id($lesson_id);
        $lesson_files = $this->lesson_model->get_files_by_lesson_id($lesson_id);
        echo "<pre>";
        unset($lesson_data['id']);
        unset($lesson_data['date_created']);
        unset($lesson_data['date_read']);
        unset($lesson_data['date_updated']);
        unset($lesson_data['date_deleted']);
        $lesson_data['account_id'] = $this->session->userdata("id");
        $lesson_data['company_owner'] = $this->session->userdata("company_id");
        $lesson_data['shared'] = 0;

        //copy lesson
        if($lesson_id = $this->lesson_model->create_new("lesson",$lesson_data)){
            
            //copy files

            foreach ($lesson_files as $lesson_file_key => $lesson_file_value) {

                $directory = realpath('resources/uploads/lessons/'.$old_lesson_id.'/'.$lesson_file_value['folder']);
                $new_directory = realpath('resources/uploads/lessons')."/".$lesson_id.'/'.$lesson_file_value['folder'];
                
                //if directory does not exists
                if(!is_dir($directory)){

                    echo "Does not exists";
                    exit;   
                }
                //if directory exists
                else{

                    
                    //if file exists
                    if(file_exists($directory.'/'.$lesson_file_value['file_name'])){
                        $copied_file = $directory.'/'.$lesson_file_value['file_name'];
                        
                        //if new file directory does not exists
                        if(!is_dir($new_directory)){
                            
                            if(mkdir($new_directory,0777,TRUE)){
                                
                                $paste_file = $new_directory.'/'.$lesson_file_value['file_name'];

                                if(copy($copied_file, $paste_file)){
                                    
                                    unset($lesson_file_value['date_created']);
                                    unset($lesson_file_value['date_updated']);
                                    unset($lesson_file_value['id']);

                                    $lesson_file_value['lesson_id'] = $lesson_id;
                                    
                                    // exit();
                                    if($new_file_id = $this->lesson_model->create_new("file",$lesson_file_value)){
                                        
                                        // exit();
                                    }else{
                                        print_r("error na namn para kay joeven..ss");
                                        exit;
                                    }
                                }else{
                                    echo $lesson_file_value['file_name'].": Was not successfully copied.";
                                    exit();
                                }
                                
                            }else{
                               print_r("not created");  
                            }
                        }else{

                            $paste_file = $new_directory.'/'.$lesson_file_value['file_name'];
                            if(copy($copied_file, $paste_file)){
                                unset($lesson_file_value['date_created']);
                                unset($lesson_file_value['date_updated']);
                                unset($lesson_file_value['id']);
                                $lesson_file_value['lesson_id'] = $lesson_id;
                                if($this->lesson_model->create_new("file",$lesson_file_value)){

                                }else{
                                    print_r("error na namn para kay joeven..hahsssaha");
                                    exit;
                                }
                            }else{
                                echo $lesson_file_value['file_name'].": Was not successfully copied.";
                                exit();
                            }

                        }

                    }
                    //if file does not exists
                    else{
                        echo "Files does not exists.";
                        exit();

                    }
                }
            }
        }
        
        $this->ben_notify(array(array("success","Successfully imported to your lessons")));
        $this->ben_redirect("lms/".$this->current_page['controller']."/packages");
        
    }

    public function share($lesson_id="",$share=""){

        $data['id'] = $lesson_id;
        $data['shared'] = $share;
        // print_r($this->lesson_model->update("lesson",$data));

        if($this->lesson_model->update("lesson",$data)){
            
            // exit();
            
        }else{

            // echo "puta";
        }
        // print_r($data);
        // exit();
        // $this->lesson_model->update("lesson",$data);
        if($share==1){
            $result = "shared";
        }else{
            $result = "unshared";
        }

        // $this->ben_notify(array(array("success","Successfully ".$result)));
        $this->ben_redirect("lms/lesson/index");
    }

    

    public function lesson_bank($data=""){
        $this->toggled = array("sics","lessons","lesson_bank");
        $this->data['bank_type'] = $data;
        if($this->session->userdata("account_type_id") == 4){
            if($data=="shared"){

                $this->page_title = "Your shared Lessons";
                $this->data['all_data'] = $this->lesson_model->teacher_shared();
            }else{

                $this->page_title = "All Shared Lessons";
                $this->data['all_data'] = $this->lesson_model->all_shared_lesson_where_not_teacher();
            }
            
        }else{
            $this->data['all_data'] = $this->lesson_model->all_shared_lesson();
        }

        if($this->session->userdata("account_type_id") == 4){

            $this->sms_view("teacher_lesson_bank");
        }else{

            $this->sms_view(__FUNCTION__);
        }
        
    }

    public function assigned_lesson(){
        $this->toggled = array("assigned_lesson");
        $this->data['all_data'] = $this->lesson_assign_model->get_student_schedule();
        $this->sms_view(__FUNCTION__);
    }

    public function student_assigned_lessons(){

        $this->data['all_data'] = $this->lesson_assign_model->get_student_schedule($this->session->userdata('id'));
        $this->sms_view(__FUNCTION__);
    }

    public function save(){

        if($_REQUEST){
            
            $_REQUEST['company_owner'] = $this->session->userdata('company_id');
            $_REQUEST['account_id'] = $this->session->userdata('id');
            $this->form_validation->set_rules('lesson_name', 'Lesson Name', 'required|xss_clean');
            $this->form_validation->set_rules('username', 'Username', 'required');
            // echo "<pre>";
            $save_data = array(
                'lesson_name' => $_REQUEST['lesson_name'],
                'subject_id' => $_REQUEST['subject_id'],
                'grade_id' => $_REQUEST['grade_id'],
                'semester_id' => $_REQUEST['semester_id'],
                'company_owner' => $_REQUEST['company_owner'],
                'account_id' => $_REQUEST['account_id'],
            );

            if($lesson_id = $this->lesson_model->create_new("lesson",$save_data)){
                
                $this->ben_notify(array(array("success","You have successfully added new data")));
                $this->ben_redirect("lms/lesson/slideshow/".$lesson_id);
            }else{
                $this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("/".$this->current_page['controller']."/index");
        }

    }

    public function validate(){

    }

    public function read(){

        $lesson_id = json_decode($_REQUEST['id_storage'])[0];
        $files = $this->lesson_model->get_files_by_lesson_id($lesson_id)[0];

        if($files){
            $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/student_view/".$lesson_id."/1/".$files['id'].'/stall');
        }else{
            $this->ben_notify(array(array("warning","This lesson has no content available")));
            $this->ben_redirect("lms/lesson/index");
        }
    }

    public function update(){
        
        $lesson_id = json_decode($_REQUEST['id_storage'])[0];
        $company_id = $this->session->userdata('company_id');
        $lesson_data['id'] = $lesson_id;
        $this->data['lesson_data'] = $this->lesson_model->ben_get('lesson',$lesson_data)[0];
        $this->data['company_data']= $this->company_model->all_limited('company',$company_id);
        $this->data['subject_data']= $this->company_model->all_limited('subject',$company_id);
        $this->data['grade_data']= $this->company_model->all_limited('grade',$company_id);
        $this->data['account_data']= $this->company_model->all_limited('account',$company_id);
        $this->data['semester_data']= $this->company_model->all_limited('semester',$company_id);

        $this->ben_view(__FUNCTION__);
        
    }

    public function update_save(){
        
        if($_REQUEST){
            $lesson_id = $_REQUEST[$this->current_page['controller']]['id'];
            $_REQUEST[$this->current_page['controller']]['company_owner'] = $this->session->userdata('company_id');
            $_REQUEST[$this->current_page['controller']]['account_id'] = $this->session->userdata('id');
            if($this->lesson_model->update("lesson",$_REQUEST[$this->current_page['controller']])){
                
                $this->ben_notify(array(array("success","You have successfully added new data")));
                $this->ben_redirect("lms/lesson/upload/".$lesson_id."/1");
            }else{
                $this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("/".$this->current_page['controller']."/index");
        }
    }

    // public function student_view($lesson_id="",$folder="",$file_id="",$stall=""){

    //     $this->data['lesson_id'] = $lesson_id;
    //     $this->data['folder'] = $folder;
    //     $this->data['file_id'] = $file_id;
    //     $this->data['stall'] = $stall;
    //     $this->data['lesson_data'] = $this->lesson_model->get_lesson_data_by_id($lesson_id);
    //     $this->data['files'] = $this->lesson_model->get_files_by_lesson_id($lesson_id);
    //     $this->data['file_data'] = array();
    //     if($this->data['file_id']){
    //         $this->data['file_data'] = $this->lesson_model->get_file_data_by_id($this->data['file_id']);
    //         if(!$this->data['file_data']){
    //             $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/upload/".$lesson_id."/".$folder);
    //         }
    //     }
    //     $this->ben_view_ultraclear(__FUNCTION__);
        
    // }

    public function student_view($lesson_id=""){

        $this->data['lesson_id'] = $lesson_id;
        $this->data['lesson_folders'] = array("Induction","Follow - Up Activity","Lesson Proper","Drill","Evaluation","Wrapping - Up");
        $this->data['lesson_data'] = $this->lesson_model->get_lesson_data_by_id($lesson_id);
        $this->data['files'] = $this->lesson_model->get_files_by_lesson_id($lesson_id);
        $this->ben_view_ultraclear(__FUNCTION__);
        
    }

    public function lesson_upload(){

        $this->ben_view_clear(__FUNCTION__);
        
    }

    public function pdf_viewer(){

        $this->ben_view_clear('/pdfjs/web/viewer.html');
        
    }

    public function slideshow($lesson_id=""){

        $this->data['lesson_id'] = $lesson_id;
        $this->data['lesson_folders'] = array("Induction","Follow - Up","Lesson Proper","Drill","Wrapping - Up","LAS");
        $this->data['lesson_data'] = $this->lesson_model->get_lesson_data_by_id($lesson_id);
        $this->data['files'] = $this->lesson_model->get_files_by_lesson_id($lesson_id);
        $this->ben_view_ultraclear(__FUNCTION__);
        
    }
    public function slideshow_view($lesson_id=""){

        $this->data['lesson_id'] = $lesson_id;
        $this->data['lesson_folders'] = array("Induction","Follow - Up","Lesson Proper","Drill","Wrapping - Up","LAS");
        $this->data['lesson_data'] = $this->lesson_model->get_lesson_data_by_id($lesson_id);
        $this->data['files'] = $this->lesson_model->get_files_by_lesson_id($lesson_id);
        $this->ben_view_ultraclear(__FUNCTION__);
        
    }

    public function upload($lesson_id="",$folder="",$file_id=""){

        $this->data['lesson_id'] = $lesson_id;
        $this->data['folder'] = $folder;
        $this->data['file_id'] = $file_id;
        $this->data['lesson_data'] = $this->lesson_model->get_lesson_data_by_id($lesson_id);
        $this->data['files'] = $this->lesson_model->get_files_by_lesson_id($lesson_id);
        $this->data['file_data'] = array();
        if($this->data['file_id']){
            $this->data['file_data'] = $this->lesson_model->get_file_data_by_id($this->data['file_id']);
            if(!$this->data['file_data']){
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/upload/".$lesson_id."/".$folder);
            }
        }
        $this->ben_view_clear(__FUNCTION__);
        
    }

    public function ajax_upload($lesson_id="",$folder=""){
        header('Content-Type: application/json'); // set json response headers
        $preview = $config = $errors = [];
        $input = 'upload_files'; // the input name for the fileinput plugin
        // $test = realpath('resources/uploads/lessons/'.$_REQUEST['lesson_id']);
        // var_dump(mkdir($test,0777,TRUE));
        // print_r($test);
        // exit();
        if (empty($_FILES[$input])) {
            return [];
        }

        if(!is_dir(realpath('resources/uploads/lessons/'.$_REQUEST['lesson_id']))){
            $lesson_path = realpath('resources/uploads/lessons').'/'.$_REQUEST['lesson_id'];
            
            if(mkdir($lesson_path,0777,TRUE)){
                // echo "lesson_path ". $_REQUEST['folder'];
                $check_path = realpath('resources/uploads/lessons/').'/'.$_REQUEST['lesson_id'].'/'.$_REQUEST['folder'];
                
                if(!is_dir($check_path)){
                    if(mkdir($check_path,0777,TRUE)){
                        $path = realpath('resources/uploads/lessons/'.$_REQUEST['lesson_id'].'/'.$_REQUEST['folder']);  
                    }
                }
            }
            
        }else{

            $check_path = realpath('resources/uploads/lessons/').'/'.$_REQUEST['lesson_id'].'/'.$_REQUEST['folder'];
            if(!is_dir($check_path)){
                if(mkdir($check_path,0777,TRUE)){
                    $path = realpath('resources/uploads/lessons/').'/'.$_REQUEST['lesson_id'].'/'.$_REQUEST['folder'];
                }
            }else{
                $path = realpath('resources/uploads/lessons/').'/'.$_REQUEST['lesson_id'].'/'.$_REQUEST['folder'];
            }
        }

        $total = count($_FILES[$input]['name']); // multiple files
        // print_r($path);
        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES[$input]['tmp_name'][$i]; // the temp file path
            $fileName = $_FILES[$input]['name'][$i]; // the file name
            $fileSize = $_FILES[$input]['size'][$i]; // the file size
            $filetype = $_FILES[$input]['type'][$i]; // the file size
            
             //Make sure we have a file path
            if ($tmpFilePath != ""){
                //Setup our new file path
                $newFilePath = $path.'/' . $fileName;
                $newFileUrl = $this->ben_resources('uploads/lessons/').'/'.$_REQUEST['lesson_id'].'/'.$_REQUEST['folder'].'/'. $fileName;
                
                //Upload the file into the new path
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $fileId = $fileName . $i; // some unique key to identify the file
                    $preview[] = $newFileUrl;
                    
                    $filetype = explode("/", $filetype)[0];
                    // print_r($filetype);
                    
                    $this->db->select("MAX(file_order) as file_order");
                    $this->db->where("lesson_id",$_REQUEST['lesson_id']);
                    $this->db->where("folder",$_REQUEST['folder']);
                    $orders = $this->lesson_model->custom("file")[0];
                    $file_order = $orders['file_order'];
                    if($file_order!=""){
                        $file_order = $file_order+1;
                    }else{
                        $file_order = 0;
                    }
                    
                    $this->db->select("id as duplicate");
                    $this->db->where("lesson_id",$_REQUEST['lesson_id']);
                    $this->db->where("folder",$_REQUEST['folder']);
                    $this->db->where("file_name",$fileName);
                    $this->db->where("file_type",$filetype);
                    $duplication = $this->lesson_model->custom("file");
                    // print_r($duplication);
                    if(empty($duplication)){
                        
                        $file = array(
                            "lesson_id"=>$_REQUEST['lesson_id'],
                            "folder"=>$_REQUEST['folder'],
                            "file_name"=>$fileName,
                            "file_type"=>$filetype,
                            "file_order"=>$file_order,
                        );
                        $file_id = $this->lesson_model->create_new("file",$file);

                        $config[] = [
                            'key' => $fileId,
                            'caption' => $fileName,
                            'size' => $fileSize,
                            'file_order' => $file_order,
                            'file_id' => $file_id,
                            'url' => $this->ben_link("lms/lesson/ajax_delete/").$_REQUEST['lesson_id']."/".$file_id."/".$_REQUEST['folder']."/".$fileName, // server api to delete the file based on key
                            'type'=>$filetype,

                        ];

                    }
                    
                    

                } else {
                    $errors[] = $fileName;
                }
            } else {
                $errors[] = $fileName;
            }
        }

        

        $out = ['initialPreview' => $preview, 'initialPreviewConfig' => $config, 'initialPreviewAsData' => true];

        if (!empty($errors)) {
            $img = count($errors) === 1 ? 'file "' . $error[0]  . '" ' : 'files: "' . implode('", "', $errors) . '" ';
            $out['error'] = 'Oh snap! We could not upload the ' . $img . 'now. Please try again later.';
        }
        echo json_encode($out); // return json data
        exit(); // terminate


    }

    public function update_file_order(){
        // header('Content-Type: application/json');
        $update_data = json_decode($_REQUEST['data'])[0];
        $lesson_id = $update_data->lesson_id;
        $content_order = $update_data->content_order;
        foreach ($content_order as $content_order_key => $content_order_value) {
            $data = array(
                "lesson_id"=>$lesson_id,
                "file_order"=>$content_order_key,
                "id"=>$content_order_value->file_id,
            );
            $this->lesson_model->update_sort_order($data);
            
        }
    }

    public function get_file_order(){
        // header('Content-Type: application/json');
        $update_data = $_REQUEST;
        $data = json_decode($_REQUEST['data']);
        $action = $_REQUEST['action'];
        $retrieve_data = array(
            "id"=>$data->id,
        );
        // print_r($_REQUEST);
        // exit();
        $current_data = $this->lesson_model->get("file",$retrieve_data);
        $this->db->where("lesson_id",$current_data['lesson_id']);
        $this->db->where("folder",$data->folder);
        if($action=='next'){
            $this->db->where("file_order",$current_data['file_order']+1);
        }else{
            $this->db->where("file_order",$current_data['file_order']-1);
        }
        
        $get_next_data = $this->lesson_model->custom("file");
        if($get_next_data){
            $next_data = array(
                "id"=>$get_next_data[0]['id'],
                "lesson_id"=>$get_next_data[0]['lesson_id'],
                "file_name"=>$get_next_data[0]['file_name'],
                "file_type"=>$get_next_data[0]['file_type'],
                "folder"=>$get_next_data[0]['folder'],
            );
            echo json_encode($next_data);
        }else{

            if($action=='next'){
                $this->db->where("lesson_id",$current_data['lesson_id']);
                $this->db->where("folder",$data->folder+1);
                $this->db->where("file_order",0);
                $get_next_data = $this->lesson_model->custom("file");
            }else{

                $this->db->select('MAX(file_order) as file_order');
                $this->db->where("lesson_id",$current_data['lesson_id']);
                $this->db->where("folder",$data->folder-1);
                $file_order = $this->lesson_model->custom("file")[0]['file_order'];

                $this->db->where("lesson_id",$current_data['lesson_id']);
                $this->db->where("folder",$data->folder-1);
                $this->db->where("file_order",$file_order);
                $get_next_data = $this->lesson_model->custom("file");
            }
            
            if($get_next_data){
                $next_data = array(
                    "id"=>$get_next_data[0]['id'],
                    "lesson_id"=>$get_next_data[0]['lesson_id'],
                    "file_name"=>$get_next_data[0]['file_name'],
                    "file_type"=>$get_next_data[0]['file_type'],
                    "folder"=>$get_next_data[0]['folder'],
                );

                echo json_encode($next_data);
            }else{
                echo "no moow";
            }

        }
        
    }

    public function update_objective(){
        // header('Content-Type: application/json');
        $update_data['id'] = $_REQUEST['id'];
        $update_data['objective'] = $_REQUEST['objective'];
        $update_data['lesson_name'] = $_REQUEST['lesson_name'];

        if($this->lesson_model->update("lesson",$update_data)){
            echo "yes";
        }else{
            echo "no";
        }

        exit();
        
        
    }

    public function delete_file_by_id(){
        $file_data = array();

        $file_data['id'] = $_REQUEST['file_id'];
        $file_data['deleted'] = $_REQUEST['deleted'];
        if($this->lesson_model->update("file",$file_data)){
            echo $file_data['id'];
        }else{

            echo "";
        }
        
    }

    public function ajax_delete($lesson_id="",$file_id="",$folder="",$file_name=""){
        // $delete_path = realpath('resources/uploads/lessons/').'/'.$lesson_id.'/'.$folder.'/'.urldecode($file_name);

        // if(file_exists($delete_path)){
        //     // if(unlink($delete_path)){
        //         // $this->lesson_model->delete_file_by_id($file_id);
        //         $this->lesson_model->synchronization("delete",$file_id,"file");
        //     // }    
        // }
        echo "{}";
    }

    public function update_fake_name(){

        $update_data["id"] = $_REQUEST["id"];
        $update_data["fake_name"] = $_REQUEST["fake_name"];
        if($this->lesson_model->update("file",$update_data)){
            echo "yes";
        }else{
            echo "no";
        }
        
        print_r($_REQUEST);
        exit();
    }


    public function update_notes(){

        $update_data['id'] = $_REQUEST['id'];
        $update_data['notes'] = $_REQUEST['notes'];
        if($this->lesson_model->update("file",$update_data)){
            echo "yes";
        }else{
            echo "no";
        }


        print_r($_REQUEST);
        exit();
        
        
    }

    public function get_file(){

        $data = $_REQUEST;
        $this->db->where("id", $data["id"]);
        $file_data = $this->lesson_model->get("file",$data);


        print_r(json_encode($file_data));
        exit();
        
        
    }

    


    public function delete_file($lesson_id="",$folder="",$file_id=""){
        
        $file_data = $this->lesson_model->get_file_data_by_id($file_id);

        if(!is_dir(realpath('resources/uploads/lessons/lesson_'.$folder."_".$lesson_id))){
            $directory = realpath('resources/uploads/lessons/').'lesson_'.$folder."_".$lesson_id;
            $this->lesson_model->delete_file_by_id($file_id);
            $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/upload/".$lesson_id."/".$folder);
        }else{
            $directory = realpath('resources/uploads/lessons').'/lesson_'.$folder."_".$lesson_id;
            $file_directory = $directory."/".$file_data['file_name'];
            if(file_exists($file_directory)){
                unlink($file_directory);
                $this->lesson_model->delete_file_by_id($file_id);
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/upload/".$lesson_id."/".$folder);
                
            }else{
                $this->lesson_model->delete_file_by_id($file_id);
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/upload/".$lesson_id."/".$folder);
            }
            
            
        }

        
    }

    public function file_upload($lesson_id="",$folder=""){

        ini_set('max_execution_time', 300);

        if(!is_dir(realpath('resources/uploads/lessons/lesson_'.$folder."_".$lesson_id))){
            $directory = realpath('resources/uploads/lessons').'/lesson_'.$folder."_".$lesson_id;
            mkdir($directory,0777,TRUE);
        }else{
            $directory = realpath('resources/uploads/lessons/').'/lesson_'.$folder."_".$lesson_id;
        }
        
        $config['upload_path']          = $directory;
        $config['max_size']             = 1365173005;
        $config['allowed_types']        = 'gif|jpg|jpeg|png|mp4|pdf|ppt|wmv|mp3|xsls|xls';

        $this->load->library('upload', $config);

        foreach ($_FILES['upload_files']['name'] as $file_key => $file_value) {
            $_FILES['files'.$file_key]['name'] = $file_value;
        }
        foreach ($_FILES['upload_files']['type'] as $file_key => $file_value) {
            $_FILES['files'.$file_key]['type'] = $file_value;
        }
        foreach ($_FILES['upload_files']['tmp_name'] as $file_key => $file_value) {
            $_FILES['files'.$file_key]['tmp_name'] = $file_value;
        }
        foreach ($_FILES['upload_files']['error'] as $file_key => $file_value) {
            $_FILES['files'.$file_key]['error'] = $file_value;
        }
        foreach ($_FILES['upload_files']['size'] as $file_key => $file_value) {
            $_FILES['files'.$file_key]['size'] = $file_value;
        }

        foreach ($_FILES['upload_files']['name'] as $fileskey => $filesvalue) {
            if (!$this->upload->do_upload('files'.$fileskey))
            {
                $error = array('error' => $this->upload->display_errors());
                
                print_r($_FILES['files'.$fileskey]['type']);
                print_r($error);
                exit;
                $this->ben_notify(array(array("success","An Error has occured")));
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/upload/".$lesson_id."/".$folder);
            }
            else
            {

                $data = array('upload_data' => $this->upload->data());
                $file_data['file_name'] = $data['upload_data']['file_name'];
                $file_data['lesson_id'] = $lesson_id;
                $file_data['folder'] = $folder;
                $file_data['file_type'] = $data['upload_data']['file_type'];
                $file_data['company_owner'] = $this->session->userdata('company_id');
                $this->lesson_model->create("file",$file_data);
            }
        }
        
        $this->ben_notify(array(array("success","Files successfully uploaded")));
        $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/upload/".$lesson_id."/".$folder);
        
    }

    public function delete($id=""){
        $data = array(
            "id"=>$id,
            "deleted"=>1,
        );

        $this->lesson_model->update("lesson",$data);
        $lesson_assign_data = array(
            "lesson_id"=>$id,
            "deleted"=>1,
        );
        $this->lesson_model->sms_update("lesson_assign","lesson_id",$lesson_assign_data);
        $this->lesson_model->sms_update("file","lesson_id",$lesson_assign_data);
        $this->ben_redirect("lms/".$this->current_page['controller']."/index");
    }
    
    public function report_card(){
        $this->page_title = "Report Card";
        $account_id = $this->session->userdata('id');
        $data['id'] = $account_id;
        $profile_data = $this->lesson_model->ben_where("profile","account_id",$account_id)[0];
        $this->data['id_number'] = $profile_data['id_number'];
        $this->sms_view(array("view"=>"report_card"));
    }

}
