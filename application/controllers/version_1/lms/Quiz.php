<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends BEN_General {
    public $current_function;
    function __construct() {
        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Quiz";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        $this->toggled = array("sics","assessment","my_quizzes");
        // if($this->session->userdata('account_type_id')==4){

            
        // }else{
        //     $this->data['all_data'] = $this->quiz_model->teacher_quizzes();

        // }
        $this->data['all_data'] = $this->quiz_model->teacher_quizzes();

        $this->sms_view(__FUNCTION__);
    }

    public function review_answers($quiz_id=""){
        $this->toggled = array("sics","assessment","my_quizzes");


        $this->data['quiz'] = $this->quiz_model->ben_get_by_id("quiz",$quiz_id);
        $this->data['all_data'] = $this->quiz_model->review_answers_section($quiz_id);
        $this->data['passed_students'] = $this->quiz_model->passed_students($quiz_id);
        $this->data['failed_students'] = $this->quiz_model->failed_students($quiz_id);
        

        $this->sms_view(__FUNCTION__);
    }

    public function packages($type="mastery"){
        $this->toggled = array("sics","assessment","quiz_packages");
        $this->data['all_data'] = $this->quiz_model->packages();
        // echo "<pre>";
        // print_r($this->data['all_data']);
        // exit();
        $this->sms_view(__FUNCTION__);
    }

    public function mastery(){

        $this->page_title = "Mastery Test";
        if($this->session->userdata('account_type_id')==4){
            $type = "mastery_test";
            $this->data['all_data'] = $this->quiz_model->teacher_quizzes($type);
        }else{
            $this->data['all_data'] = $this->quiz_model->all_mastery();
        }

        $this->ben_view(__FUNCTION__);
    }

    public function formative(){

        $this->page_title = "Formative Test";
        
        if($this->session->userdata('account_type_id')==4){
            $type = "formative_test";
            $this->data['all_data'] = $this->quiz_model->teacher_quizzes($type);
        }else{
            $this->data['all_data'] = $this->quiz_model->all_formative();
        }

        $this->ben_view(__FUNCTION__);
    }

    // public function results($quiz_id=""){

    //     $this->data['quiz_id'] = $quiz_id;
    //     $this->data['grade_section'] = $this->account_model->get_all_grades_and_section();
    //     $this->ben_view(__FUNCTION__);
        
    // }

    public function results($quiz_id="",$section_id=""){

        $this->toggled = array("sics","assessment","my_quizzes");
        $this->data['all_data'] = $this->quiz_model->review_answers($quiz_id,$section_id);
        $this->data['section_id'] = $section_id;
        $this->sms_view(__FUNCTION__);
        
    }

    public function overall_result($quiz_id="",$section_id=""){

        $this->data['quiz_id'] = $quiz_id;
        $this->data['all_data'] = $this->quiz_model->get_assigned_students_by_quiz_id($quiz_id,$section_id);
        
        if($this->data['all_data']){
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("Warning","No students assigned on this quiz")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index");
        }
    }

    public function student_assigned_quizzes($quiz_id=""){
        $this->toggled = array("student_assigned_quizzes");
        $this->data['quizzes'] = $this->quiz_model->all_assigned_quiz_by_account_id($this->session->userdata('id'));
        $quizzes = $this->data['quizzes'];
        // echo "<pre>";
        
        foreach ($quizzes as $quizzes_key => $quizzes_value) {
            $quiz_attempts = $this->quiz_model->attempts_count($quizzes_value['id'],$this->session->userdata('id'));
            
            $quizzes[$quizzes_key]["attempts_done"] = $quiz_attempts;
            if($quiz_attempts >= $quizzes_value['attempts']){
                unset($quizzes[$quizzes_key]);
            }
            
        }
        
        $this->data['quizzes'] = $quizzes;
        $this->sms_view(__FUNCTION__);
    }

    public function assigned_quizzes($quiz_id=""){

        $this->data['all_data'] = $this->quiz_model->all_assigned_quiz_by_account_id($this->session->userdata('id'));

        $this->ben_view(__FUNCTION__);
    }

    public function student_quiz_history($quiz_id=""){
        $this->toggled = array("student_quiz_history");
        $this->page_title = "Quiz History";
        $this->data['quizzes'] = $this->quiz_model->review_answers_student($this->session->userdata('id'));
        // echo "<pre>";
        // print_r($this->data['quizzes']);
        // exit();
        $this->sms_view("student_quiz_history");
    }

    public function quiz_history($quiz_id=""){

        //echo "<pre>";
        $this->page_title = "Quiz History";
        $this->data['all_data'] = $this->quiz_model->get_quiz_history($this->session->userdata('id'));
        //print_r($this->data['all_data']);
        //exit();
        $this->ben_view(__FUNCTION__);
    }

    public function unassign($quiz_id=""){
        if($this->quiz_model->ben_where_delete_by_id("quiz_assign","quiz_id",$quiz_id)){
            $this->ben_notify(array(array("success","Successfully unassigned")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index");
        }else{
            $this->ben_notify(array(array("success","Successfully unassigned")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index");
        }
    }

    public function assign($quiz_id=""){

        $this->data['quiz_id'] = $quiz_id;
        
        if($this->quiz_model->ben_where("quiz_assign","quiz_id",$quiz_id)){
            $quiz_data = $this->quiz_model->ben_where("quiz_assign","quiz_id",$quiz_id)[0];
            $this->data['quiz_assign'] = $quiz_data;
            $_REQUEST['id'] = $quiz_data['id'];
            $this->data['account_ids'] = explode(",", $this->data['quiz_assign']['account_ids']);
        }else{
            $this->data['quiz_assign'] = array();
            $this->data['account_ids'] = array();
        }
        
        $this->data['grades'] = $this->lesson_assign_model->all('grade');
        $this->data['sections'] = $this->lesson_assign_model->all('section');
        $this->data['classes'] = $this->lesson_assign_model->get_all_classes();
        $this->sms_view(__FUNCTION__);
    }
    public function quiz_bank($type="mastery"){

        $this->toggled = array("sics","assessment","shared_quizzes");
        $this->data['all_data'] = $this->quiz_model->quiz_bank();
        // echo "<pre>";
        // print_r($this->data['all_data']);
        // exit();
        $this->sms_view(__FUNCTION__);
    }
    public function teacher_quiz_bank($quiz_type=""){

        $this->page_title = "Your Shared Quiz";
        
        if($quiz_type=="mastery_test"){
            $this->data['quiz_type'] = "mastery_test";
            $this->data['all_data'] = $this->quiz_model->all_shared_teacher($this->data['quiz_type']);
        }elseif($quiz_type=="formative_test"){
            $this->data['quiz_type'] = "formative_test";
            $this->data['all_data'] = $this->quiz_model->all_shared_teacher($this->data['quiz_type']);
        }else{
            $this->data['quiz_type'] = "quiz";
            $this->data['all_data'] = $this->quiz_model->all_shared_teacher($this->data['quiz_type']);
        }
        
        $this->ben_view(__FUNCTION__);
    }

    public function import($quiz_id=""){
        $data['id'] = $quiz_id;
        $quiz = $this->quiz_model->ben_get("quiz",$data)[0];

        $quiz_data['semester_id'] = $quiz['semester_id'];
        $quiz_data['account_id'] = $this->session->userdata('id');
        $quiz_data['subject_id'] = $quiz['subject_id'];
        $quiz_data['grade_id'] = $quiz['grade_id'];
        $quiz_data['shared'] = 0;
        $quiz_data['quiz_name'] = $quiz['quiz_name']." New";
        $quiz_data['quiz_type'] = $quiz['quiz_type'];
        $quiz_data['total_score'] = $quiz['total_score'];
        $quiz_data['assigned'] = 0;
        $quiz_data['status'] = 1;
        $quiz_data['deleted'] = 0;
        
        if($new_quiz_id = $this->quiz_model->create_new("quiz",$quiz_data)){
            $new_quiz = $this->quiz_model->ben_where2("quiz","id",$new_quiz_id);
            $optical = $this->quiz_model->ben_where2("optical","quiz_id",$quiz_id);
            if($optical){
                unset($optical['id']);
                $optical_data['quiz_id'] = $new_quiz_id;
                $optical_data['answer_key'] = $optical['answer_key'];
                $optical_data['file_name'] = $optical['file_name'];
                $optical_data['answers'] = $optical['answers'];
                $optical_data['score'] = $optical['score'];
                $optical_data['total_score'] = $optical['total_score'];
                $optical_data['status'] = 1;
                $optical_data['deleted'] = 0;
                $directory = realpath('resources/uploads/optical/').'/'.$new_quiz_id;
                // print_r(realpath('resources/uploads/optical/').'/'.$new_quiz_id);
                // var_dump($directory);
                if($this->quiz_model->create_unescaped("optical",$optical_data)){
                    if(file_exists(realpath('resources/uploads/optical/').'/'.$data['id']."/optical.pdf")){
                        mkdir($directory,0777,TRUE);
                        copy(realpath('resources/uploads/optical/').'/'.$data['id']."/optical.pdf", realpath('resources/uploads/optical/').'/'.$new_quiz_id."/optical.pdf");
                    }
                }
            }
        }

        //$this->ben_notify(array(array("success","Successfully imported")));
        $this->ben_redirect("lms/quiz/index");
        
    }

    public function import_bkp($quiz_id=""){
        $data['id'] = $quiz_id;
        $quiz = $this->quiz_model->ben_get("quiz",$data)[0];
        echo "<pre>";

        $quiz_data['semester_id'] = $quiz['semester_id'];
        $quiz_data['account_id'] = $this->session->userdata('id');
        $quiz_data['subject_id'] = $quiz['subject_id'];
        $quiz_data['grade_id'] = $quiz['grade_id'];
        $quiz_data['shared'] = 0;
        $quiz_data['quiz_name'] = $quiz['quiz_name']." New";
        $quiz_data['quiz_type'] = $quiz['quiz_type'];
        $quiz_data['total_score'] = $quiz['total_score'];
        $quiz_data['assigned'] = 0;
        $quiz_data['status'] = 1;
        $quiz_data['deleted'] = 0;
        print_r($quiz_data);
        exit();
        if($new_quiz_id = $this->quiz_model->create_new("quiz",$quiz_data)){
            $quiz_parts = $this->quiz_part_model->get_all_part_by_quiz($data);
            //foreach quiz_parts
            foreach ($quiz_parts as $quiz_part_key => $quiz_part_value) {
                $questions = $this->question_model->get_questions_by_quiz_part_id($quiz_part_value['id']);
                unset($quiz_part_value['id']);
                unset($quiz_part_value['date_created']);
                unset($quiz_part_value['date_updated']);
                $quiz_part_value['quiz_id'] = $new_quiz_id;

                if($new_quiz_part_id = $this->quiz_part_model->create_new("quiz_part",$quiz_part_value)){

                    //foreach Questions
                    foreach ($questions as $question_key => $question_value){
                        $options = $this->question_model->get_options_by_question_id($question_value['id']);
                        unset($question_value['id']);
                        unset($question_value['date_created']);
                        unset($question_value['date_updated']);
                        $question_value['quiz_part_id'] = $new_quiz_part_id;
                        $question_value['account_id'] = $this->session->userdata('id');
                        if($new_question_id = $this->quiz_model->create_unescaped("question",$question_value)){
                            foreach ($options as $option_key => $option_value){
                                $option_value['question_id'] = $new_question_id;
                                unset($option_value['id']);
                                unset($option_value['date_created']);
                                unset($option_value['date_updated']); 
                                $this->quiz_model->create_unescaped("options",$option_value);
                            }
                        }   
                    }
                }                
            }
            
        }

        //$this->ben_notify(array(array("success","Successfully imported")));
        $this->ben_redirect("lms/".$this->current_page['controller']."/index");
        
    }



    public function share($id="",$share=""){

        $data['id'] = $id;
        $data['shared'] = $share;

        if($this->lesson_model->update("quiz",$data)){
            
        }else{

        }
        if($share==1){
            $result = "shared";
        }else{
            $result = "unshared";
        }

        $this->ben_redirect("lms/quiz/index");
    }

    public function save_assign(){

        echo "<pre>";

        $quiz_assign['quiz_id'] = $_REQUEST['quiz_id'];
        $quiz_assign['start_date'] = date("Y-m-d H:i:s", strtotime($_REQUEST['start_date']));
        $quiz_assign['end_date'] = date("Y-m-d H:i:s", strtotime($_REQUEST['end_date']));
        $quiz_assign['attempts'] = $_REQUEST['attempts'];
        $quiz_assign['quiz_type'] = $_REQUEST['quiz_type'];
        $quiz_assign['percentage'] = $_REQUEST['percentage'];
        $quiz_assign['account_ids'] = $_REQUEST['account_ids'];
        $quiz_assign['grades'] = $_REQUEST['grades'];
        $quiz_assign['sections'] = $_REQUEST['sections'];
        $quiz_assign['account_id'] = $this->session->userdata('id');
        $quiz_assign['duration'] = $_REQUEST['duration'];
        // print_r($quiz_assign);
        // exit();

        $school_status = $this->school_status_model->get_status();
        // print_r($_REQUEST);
        $quiz_assign['semester'] = $school_status['semester'];
        $quiz_assign['schoolyear'] = $school_status['schoolyear'];
        if($_REQUEST){

           
            if($this->quiz_model->ben_where("quiz_assign","quiz_id",$quiz_assign['quiz_id'])){
                $quiz_data = $this->quiz_model->ben_where("quiz_assign","quiz_id",$quiz_assign['quiz_id'])[0];
                $quiz_assign['id'] = $quiz_data["id"];
                $this->quiz_model->update("quiz_assign",$quiz_assign);
                $this->ben_redirect("lms/".$this->current_page['controller']."/index");
            }else{
                if($this->quiz_model->create_new("quiz_assign",$quiz_assign)){

                    $quiz['id'] = $_REQUEST['quiz_id'];
                    $quiz['assigned'] = 1;

                    if($this->quiz_model->update("quiz",$quiz)){
                        $this->ben_redirect("lms/".$this->current_page['controller']."/index");
                    }

                }else{

                    $this->ben_redirect("lms/".$this->current_page['controller']."/index");
                }
            }
            


            
        }
    }

    public function check_if_assigned($quiz_id=""){

        $return_data = $this->quiz_model->ben_where("quiz","id",$quiz_id)[0];

        print_r($return_data['assigned']);
            
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

    public function read(){

        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage'])[0];
            $this->ben_redirect('lms/answer_sheet/read/'.$id_storage);
        }else{
            
        }
    }

    public function update($quiz_id=""){


            $quiz_data['id'] = $quiz_id;

            
            // $this->quiz_model->update_total_score($quiz_data['id']);
            $quiz_data = $this->quiz_model->ben_get('quiz',$quiz_data)[0];
            $company_id = $this->session->userdata('company_id');

            $this->data['quiz_data'] = $quiz_data;  
            $this->data['company_data']= $this->company_model->all_limited('company',$company_id);
            $this->data['subject_data']= $this->company_model->all_limited('subject',$company_id);
            $this->data['grade_data']= $this->company_model->all_limited('grade',$company_id);
            $this->data['account_data']= $this->company_model->all_limited('account',$company_id);
            $this->data['semester_data']= $this->company_model->all_limited('semester',$company_id);
        
            $this->sms_view(__FUNCTION__);
        
    }
    public function delete($id=""){
        $data = array(
            "id"=>$id,
            "deleted"=>1,
        );

        if($this->quiz_model->update("quiz",$data)){
            if($optical_data = $this->quiz_model->ben_where2("optical","quiz_id",$data['id'])){
                $optical['id'] = $optical_data['id'];
                $optical['deleted'] = 1;
                $this->quiz_model->update("optical",$optical);
                $quiz_assign_data = array(
                    "quiz_id"=>$data['id'],
                    "deleted"=>1,
                );
                $this->quiz_model->sms_update("quiz_assign","quiz_id",$quiz_assign_data);
                $this->quiz_model->sms_update("optical_answer_sheet","quiz_id",$quiz_assign_data);
            }
        }
        $this->ben_redirect("lms/".$this->current_page['controller']."/index");
    }

    public function save(){
        if($_REQUEST){

            $data['quiz_name'] = $_REQUEST['quiz_name'];
            $data['subject_id'] = $_REQUEST['subject_id'];
            $data['semester_id'] = $_REQUEST['semester_id'];
            $data['grade_id'] = $_REQUEST['grade_id'];
            $data['quiz_type'] = $_REQUEST['quiz_type'];
            $data['company_owner'] = $this->session->userdata('company_id');
            $data['account_id'] = $this->session->userdata('id');

            if($current_quiz_id = $this->company_model->create_new("quiz",$data)){
                
                $this->ben_notify(array(array("success","You have successfully created new Quiz!")));
                if($data['quiz_type']=="optical"){
                    $optical_data['quiz_id'] = $current_quiz_id;
                    $this->lesson_model->create_new("optical",$optical_data);
                    $this->ben_redirect("lms/optical/optical/".$current_quiz_id);
                }else{
                    $this->ben_redirect("lms/quiz_part/index/".$current_quiz_id);
                }
                
            }else{
                //$this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect("general/".$this->current_page['controller']."/sms_index");
            }
        }else{
            //$this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/sms_index");
        }
    }

    public function update_save(){
        if($_REQUEST){
            // print_r($_REQUEST);
            // exit();
            $quiz_data['id'] = $_REQUEST['quiz']['id'];
            $quiz_data['quiz_name'] = $_REQUEST['quiz']['quiz_name'];
            $quiz_data['subject_id'] = $_REQUEST['quiz']['subject_id'];
            $quiz_data['grade_id'] = $_REQUEST['quiz']['grade_id'];
            $quiz_data['semester_id'] = $_REQUEST['quiz']['semester_id'];
            if($this->quiz_model->update("quiz",$quiz_data)){

                $this->ben_redirect("lms/optical/optical/".$quiz_data['id']);
            }else{
                //$this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect("lms/quiz/index");
            }
        }else{
            //$this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("lms/quiz/index");
        }
    }

}
