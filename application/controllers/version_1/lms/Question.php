<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Questions";
        $this->view_folder = strtolower(get_class());
    }

    public function index($quiz_id="",$quiz_part_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
    }

    public function create(){

        $company_id = $this->session->userdata('company_id');
        $this->data['company_data']= $this->company_model->all_limited('company',$company_id);
        $this->data['subject_data']= $this->company_model->all_limited('subject',$company_id);
        $this->data['grade_data']= $this->company_model->all_limited('grade',$company_id);
        $this->data['account_data']= $this->company_model->all_limited('account',$company_id);
        $this->data['semester_data']= $this->company_model->all_limited('semester',$company_id);

        $this->ben_view(__FUNCTION__);
    }

    public function read(){

        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage']);
            $this->data['all_data']['section'] = $this->account_type_model->all('section');
            $this->data['update_data'] = $this->db->get_where($this->current_page['controller'],array("id"=>$id_storage[0]))->result_array()[0];
            $this->data['company_data']= $this->company_model->all('company');
            $this->ben_view(__FUNCTION__);
        }else{
            
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update($question_id=""){
        $this->data['question_id'] = $question_id;
        $question['id'] = $question_id;
        $this->data['question_data'] = $this->question_model->ben_get('question',$question)[0];
        print_r($this->data['question_data']);

        $this->ben_view(__FUNCTION__);
    }

    public function delete($question_id="",$quiz_id=""){
        if($this->question_model->question_delete($question_id)){
            $this->ben_redirect("lms/quiz_part/index/".$quiz_id);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$quiz_id);
        }
    }

    public function question_type(){
        $data = $_REQUEST;
        switch ($data['question_type']) {
            case 'essay':
                $this->ben_redirect2("lms/question/essay/".$data['quiz_id'].'/'.$data['quiz_part_id']);
                break;
            case 'identification':
                $this->ben_redirect2("lms/question/identification/".$data['quiz_id'].'/'.$data['quiz_part_id']);
                break;
            case 'multiple_choice':
                $this->ben_redirect2("lms/question/multiple_choice/".$data['quiz_id'].'/'.$data['quiz_part_id']);
                break;
            case 'true_or_false':
                $this->ben_redirect2("lms/question/true_or_false/".$data['quiz_id'].'/'.$data['quiz_part_id']);
                break;
            case 'matching_type':
                $this->ben_redirect2("lms/question/matching_type/".$data['quiz_id'].'/'.$data['quiz_part_id']);
                break;
            case 'multiple_choice_multiple_answer':
                $this->ben_redirect2("lms/question/multiple_choice_multiple_answer/".$data['quiz_id'].'/'.$data['quiz_part_id']);
                break;
            case 'fill_in_the_blanks':
                $this->ben_redirect2("lms/question/fill_in_the_blanks/".$data['quiz_id'].'/'.$data['quiz_part_id']);
                break;
            default:
                # code...
                break;
        }
    }

    public function essay($quiz_id="",$quiz_part_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function identification($quiz_id="",$quiz_part_id=""){
        // $this->question_model->get_complete_quiz_data($quiz_id,"*");
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function multiple_choice($quiz_id="",$quiz_part_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function true_or_false($quiz_id="",$quiz_part_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function matching_type($quiz_id="",$quiz_part_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function multiple_choice_multiple_answer($quiz_id="",$quiz_part_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function fill_in_the_blanks($quiz_id="",$quiz_part_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function save_fill_in_the_blanks(){

        $data = $_REQUEST;
        if($this->question_model->save_fill_in_the_blanks($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function save_essay(){

        $data = $_REQUEST;
        if($this->question_model->save_essay($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function save_identification(){

        $data = $_REQUEST;
        if($this->question_model->save_identification($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function save_multiple_choice(){

        $data = $_REQUEST;
        
        if($data['correct']){
            if($this->question_model->save_multiple_choice($data)){
            
                $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
            }else{
                
                $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
            }
        }else{
            $this->ben_notify(array(array("Warning","No correct answer selected")));
            header("location:javascript://history.go(-1)");
        }
        
    }

    public function save_true_or_false(){
        
        $data = $_REQUEST;

        if($this->question_model->save_true_or_false($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function save_matching_type(){
        
        $data = $_REQUEST;
        
        if($this->question_model->save_matching_type($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function save_multiple_choice_multiple_answer(){
        
        $data = $_REQUEST;
        
        if($this->question_model->save_multiple_choice_multiple_answer($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function update_setup_data($quiz_id="",$quiz_part_id="",$question_id=""){
        $quiz['id']=$quiz_id;
        $quiz_part['id']=$quiz_part_id;
        $question['id']=$question_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_id'] = $quiz_part_id;
        $this->data['quiz_data'] = $this->question_model->ben_get('quiz',$quiz);
        $this->data['question_data'] = $this->question_model->ben_get('question',$question)[0];
        $this->data['option_data'] = $this->question_model->get_options_by_question_id($question_id);
        $this->data['quiz_part_data'] = $this->question_model->ben_get('quiz_part',$quiz_part);
    }

    public function update_essay($quiz_id="",$quiz_part_id="",$question_id=""){
        $this->update_setup_data($quiz_id,$quiz_part_id,$question_id);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function update_fill_in_the_blanks($quiz_id="",$quiz_part_id="",$question_id=""){
        $this->update_setup_data($quiz_id,$quiz_part_id,$question_id);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function update_identification($quiz_id="",$quiz_part_id="",$question_id=""){
        $this->update_setup_data($quiz_id,$quiz_part_id,$question_id);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function update_multiple_choice($quiz_id="",$quiz_part_id="",$question_id=""){
        $this->update_setup_data($quiz_id,$quiz_part_id,$question_id);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function update_true_or_false($quiz_id="",$quiz_part_id="",$question_id=""){
        $this->update_setup_data($quiz_id,$quiz_part_id,$question_id);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function update_matching_type($quiz_id="",$quiz_part_id="",$question_id=""){
        $this->update_setup_data($quiz_id,$quiz_part_id,$question_id);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function update_multiple_choice_multiple_answer($quiz_id="",$quiz_part_id="",$question_id=""){
        $this->update_setup_data($quiz_id,$quiz_part_id,$question_id);
        $this->ben_view(__FUNCTION__);
        $this->ben_view_superclear('close_mce_notif');
    }

    public function update_save_essay(){

        $data = $_REQUEST;
        if($this->question_model->update_essay($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function update_save_multiple_choice(){

        $data = $_REQUEST;
        
        if($this->question_model->update_multiple_choice($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function update_save_identification(){

        $data = $_REQUEST;
        
        if($this->question_model->update_identification($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function update_save_true_or_false(){

        $data = $_REQUEST;
        
        if($this->question_model->update_true_or_false($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function update_save_multiple_choice_multiple_answer(){

        $data = $_REQUEST;
        
        if($this->question_model->update_multiple_choice_multiple_answer($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

    public function update_save_matching_type(){

        $data = $_REQUEST;
        
        if($this->question_model->update_matching_type($data)){
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }else{
            
            $this->ben_redirect("lms/quiz_part/index/".$data['quiz_id'].'/'.$data['quiz_part_id']);
        }
    }

}
