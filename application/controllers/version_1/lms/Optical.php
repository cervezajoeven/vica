<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Optical extends BEN_General {
    public $current_function;
    function __construct() {
        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Optical";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/lms/'.'optical_model');
    }

    public function index(){
        
        if($this->session->userdata('account_type_id')==4){
            $type = "quiz";
            $this->data['all_data'] = $this->quiz_model->teacher_quizzes($type);
        }else{
            $this->data['all_data'] = $this->quiz_model->all_quiz();
        }
        $this->ben_view(__FUNCTION__);
    }

    public function create(){

        $company_id = $this->session->userdata('company_id');
        $this->data['company_data']= $this->company_model->all_limited('company',$company_id);
        $this->data['subject_data']= $this->company_model->all_limited('subject',$company_id);
        $this->data['grade_data']= $this->company_model->all_limited('grade',$company_id);
        $this->data['account_data']= $this->company_model->all_limited('account',$company_id);
        $this->data['semester_data']= $this->company_model->all_limited('semester',$company_id);

        $this->sms_view(__FUNCTION__);
       
    }

    public function save(){

        $data = array(
            "quiz_name"=>$_REQUEST['quiz_name'],
            "subject_id"=>$_REQUEST['subject_id'],
            "grade_id"=>$_REQUEST['grade_id'],
            "account_id"=>$this->session->userdata('id'),
            "semester_id"=>$_REQUEST['semester_id'],
            "quiz_type"=>"optical",
        );

        if($quiz_id = $this->optical_model->save($data)){
            $this->ben_redirect("lms/".$this->current_page['controller']."/optical/".$quiz_id);

        }
        
    }

    public function optical($quiz_id="",$quiz_assign_id="",$attempt_id=""){
        $quiz = $this->optical_model->ben_get_by_id("quiz",$quiz_id);
        $this->data['optical'] = $this->optical_model->ben_where("optical","quiz_id",$quiz_id);
        $this->data['quiz'] = $this->optical_model->ben_where("quiz","id",$quiz_id);
        $this->data['quiz_assign_id'] = $quiz_assign_id;
        $account_id = $this->session->userdata('id');
        $this->db->select("*");
        $this->db->where("quiz_id",$quiz_id)->where("account_id",$account_id);
        $query = $this->db->get("optical_answer_sheet");
        $this->data['optical_answer_sheet'] = $query->result_array();
        $this->data['student_data'] = $this->optical_model->get_student_data($account_id);
        if($attempt_id){
            $this->data['attempt'] = $this->optical_model->ben_where("attempt","id",$attempt_id);
        }
        if(!$this->data['student_data']){
            $this->data['student_data'][0]["grade_name"] = "(Grade)";
            $this->data['student_data'][0]["section_name"] = "(Section)";
        }
        // print_r("<pre>");
        // print_r($this->data['student_data']);
        // exit();

        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function optical_view($quiz_id="",$quiz_assign_id=""){
        $quiz = $this->optical_model->ben_get_by_id("quiz",$quiz_id);
        $this->data['optical'] = $this->optical_model->ben_where("optical","quiz_id",$quiz_id);
        $this->data['quiz'] = $this->optical_model->ben_where("quiz","id",$quiz_id);
        $this->data['quiz_assign_id'] = $quiz_assign_id;
        $account_id = $this->session->userdata('id');
        $this->db->select("*");
        $this->db->where("quiz_id",$quiz_id)->where("account_id",$account_id);
        $query = $this->db->get("optical_answer_sheet");
        $this->data['optical_answer_sheet'] = $query->result_array();
        $this->data['student_data'] = $this->optical_model->get_student_data($account_id);
        if(!$this->data['student_data']){
            $this->data['student_data'][0]["grade_name"] = "(Grade)";
            $this->data['student_data'][0]["section_name"] = "(Section)";
        }
        // print_r("<pre>");
        // print_r($this->data['student_data']);
        // exit();

        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function optical_review($quiz_id="",$account_id="",$section_id=""){
        $quiz = $this->optical_model->ben_get_by_id("quiz",$quiz_id);
        $this->data['optical'] = $this->optical_model->ben_where("optical","quiz_id",$quiz_id);
        $this->data['quiz'] = $this->optical_model->ben_where("quiz","id",$quiz_id);
        $this->data['quiz_id'] = $quiz_id;
        $this->data['section_id'] = $section_id;
        $this->data['account_type_id'] = 5;
        $this->data['optical_account_id'] = $account_id;
        $this->db->select("*");
        $this->db->where("quiz_id",$quiz_id)->where("account_id",$account_id);
        $query = $this->db->get("optical_answer_sheet");
        $this->data['optical_answer_sheet'] = $query->result_array();
        $this->data['student_data'] = $this->optical_model->get_student_data($account_id);
        if(!$this->data['student_data']){
            $this->data['student_data'][0]["grade_name"] = "(Grade)";
            $this->data['student_data'][0]["section_name"] = "(Section)";
        }
        
        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function save_optical(){
        $update_data['id'] = $_REQUEST['id'];
        $update_data['answer_key'] = $_REQUEST['answer_key'];
        $update_data['answers'] = $_REQUEST['answers'];
        $update_data['total_score'] = isset($_REQUEST['total_score'])?$_REQUEST['total_score']:"";
        $quiz_data['id'] = $_REQUEST['quiz_id'];
        $quiz_data['quiz_name'] = $_REQUEST['quiz_name'];
        if($this->optical_model->update("optical",$update_data)){
            if($this->optical_model->update("quiz",$quiz_data)){
                echo "yes";
            }
            
        }else{
            echo "no";
        }
    }

    public function student_answer(){
        $update_data['account_id'] = isset($_REQUEST['account_id'])?$_REQUEST['account_id']:"";
        $update_data['quiz_id'] = isset($_REQUEST['quiz_id'])?$_REQUEST['quiz_id']:"";
        $update_data['answers'] = isset($_REQUEST['answers'])?$_REQUEST['answers']:"";
        $update_data['score'] = isset($_REQUEST['score'])?$_REQUEST['score']:"";
        $attempt_id = isset($_REQUEST['attempt_id'])?$_REQUEST['attempt_id']:"";

        $this->db->select("*");
        $this->db->where("quiz_id",$update_data['quiz_id'])->where("account_id",$update_data['account_id']);
        $query = $this->db->get("optical_answer_sheet");
        $return = $query->result_array();
        if($return){
            $this->db->select("*");
            $this->db->where("quiz_id", $update_data['quiz_id'])->where("account_id", $update_data['account_id']);
            $query = $this->db->get("optical_answer_sheet");
            $new_return = $query->result_array()[0];
            $update_data['id'] = $new_return['id'];
            $quiz_assign['quiz_assign_id'] = $_REQUEST['quiz_assign_id'];
            $quiz_assign['account_id'] = $update_data['account_id'];
            
            if($this->optical_model->update("optical_answer_sheet",$update_data)){
                
                if(isset($_REQUEST['score'])){
                    
                    $attempt = array(
                        "id"=>$attempt_id,
                        "completed"=>1,
                        "time_done"=>strtotime("now +0 seconds")*1000,

                    );
                    $this->optical_model->update("attempt",$attempt);
                }
                
                echo "yes";
            }else{
                echo "no";
            }
        }else{
            if($this->optical_model->create_unescaped("optical_answer_sheet",$update_data)){
                echo "yes";
            }else{
                echo "no";
            }
        }

    }

    public function auto_save(){
        $update_data['account_id'] = isset($_REQUEST['account_id'])?$_REQUEST['account_id']:"";
        $update_data['quiz_id'] = isset($_REQUEST['quiz_id'])?$_REQUEST['quiz_id']:"";
        $update_data['answers'] = isset($_REQUEST['answers'])?$_REQUEST['answers']:"";
        $update_data['score'] = isset($_REQUEST['score'])?$_REQUEST['score']:"";

        $this->db->select("*");
        $this->db->where("quiz_id",$update_data['quiz_id'])->where("account_id",$update_data['account_id']);
        $query = $this->db->get("optical_answer_sheet");
        $return = $query->result_array();
        if($return){
            $this->db->select("*");
            $this->db->where("quiz_id", $update_data['quiz_id'])->where("account_id", $update_data['account_id']);
            $query = $this->db->get("optical_answer_sheet");
            $new_return = $query->result_array()[0];
            $update_data['id'] = $new_return['id'];
            $quiz_assign['quiz_assign_id'] = $_REQUEST['quiz_assign_id'];
            $quiz_assign['account_id'] = $update_data['account_id'];
            
            if($this->optical_model->update("optical_answer_sheet",$update_data)){
                echo "yes";
            }else{
                echo "no";
            }
        }else{
            if($this->optical_model->create_unescaped("optical_answer_sheet",$update_data)){
                echo "yes";
            }else{
                echo "no";
            }
        }

    }

    public function ajax_upload(){
        header('Content-Type: application/json'); // set json response headers
        $preview = $config = $errors = [];
        $input = 'upload_files'; // the input name for the fileinput plugin
        if (empty($_FILES[$input])) {
            return [];
        }

        if(!is_dir(realpath('resources/uploads/optical/'.$_REQUEST['quiz_id']))){
            $quiz_path = realpath('resources/uploads/optical').'/'.$_REQUEST['quiz_id'];
            // echo "no path if first";
            if(mkdir($quiz_path,0777,TRUE)){
                // echo "quiz_path ". $_REQUEST['folder'];
                $path = realpath('resources/uploads/optical/').'/'.$_REQUEST['quiz_id'];
                // echo "finished creating first path";
               
            }
            
        }else{

            $check_path = realpath('resources/uploads/optical/').'/'.$_REQUEST['quiz_id'];
            if(!is_dir($check_path)){
                if(mkdir($check_path,0777,TRUE)){
                    $path = realpath('resources/uploads/optical/').'/'.$_REQUEST['quiz_id'];
                }
            }else{
                $path = realpath('resources/uploads/optical/').'/'.$_REQUEST['quiz_id'];
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
                $newFilePath = $path.'/' . "optical.pdf";
                $newFileUrl = $this->ben_resources('uploads/optical/').'/'.$_REQUEST['quiz_id'].'/optical.pdf';
                
                //Upload the file into the new path
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    $fileId = "optical" . $i; // some unique key to identify the file
                    $preview[] = $newFileUrl;
                    
                    $filetype = explode("/", $filetype)[0];
                    
                    $optical_data['id'] = $_REQUEST['id'];
                    $optical_data['file_name'] = "optical.pdf";
                    $this->lesson_model->update("optical",$optical_data);
                    $config[] = [
                            'key' => $fileId,
                            'caption' => "optical.pdf",
                            'size' => $fileSize,
                            'url' => $this->ben_link("lms/optical/ajax_delete/"),
                            'type'=>$filetype,
                        ];

                } else {
                    $errors[] = "optical.pdf";
                }
            } else {
                $errors[] = "optical.pdf";
            }
        }
        $out = ['initialPreview' => $preview, 'initialPreviewConfig' => $config, 'initialPreviewAsData' => false];

        if (!empty($errors)) {
            $img = count($errors) === 1 ? 'file "' . $error[0]  . '" ' : 'files: "' . implode('", "', $errors) . '" ';
            $out['error'] = 'Oh snap! We could not upload the ' . $img . 'now. Please try again later.';
        }
        echo json_encode($out); // return json data
        exit(); // terminate
    }

    //September 9, 2019
    public function update_essay_score(){
        $this->db->select('id');
        $this->db->where('quiz_id',$_REQUEST['quiz_id']);
        $this->db->where('account_id',$_REQUEST['account_id']);

        $query = $this->db->get('optical_answer_sheet');
        $optical_answer_sheet_id = $query->result_array()[0]['id'];
        $update_data['id'] = $optical_answer_sheet_id;
        $update_data['essay_scores'] = json_encode($_REQUEST['essay_scores']);
        $update_data['score'] = $_REQUEST['score'];
        print_r($update_data['essay_scores']);
        if($this->optical_model->update("optical_answer_sheet",$update_data)){
            echo "yes";
           
        }else{
            echo "no";
        }
    }

    //September 9, 2019
    public function score_fix(){
        $this->db->select('id');
        $this->db->where('quiz_id',$_REQUEST['quiz_id']);
        $this->db->where('account_id',$_REQUEST['account_id']);

        $query = $this->db->get('optical_answer_sheet');
        $optical_answer_sheet_id = $query->result_array()[0]['id'];
        $update_data['id'] = $optical_answer_sheet_id;
        $update_data['score'] = $_REQUEST['score'];
        if($this->optical_model->update("optical_answer_sheet",$update_data)){
            echo "yes";
           
        }else{
            echo "no";
        }
    }

}
