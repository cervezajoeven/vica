<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_question extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Quiz Questions";
        $this->view_folder = strtolower(get_class());
    }

    public function index($quiz_id){
        $this->data['quiz_id'] = $quiz_id;
        $this->ben_view(__FUNCTION__);
    }

    public function question_type($quiz_id=""){
        $data = $_REQUEST;
        print_r($data);
        switch ($data['question_type']) {
            case 'essay':
                $this->ben_redirect2("lms/quiz_question/essay/".$data['quiz_id']);
                break;
            case 'identification':
                $this->ben_redirect2("lms/quiz_question/identification/".$data['quiz_id']);
                break;
            case 'multiple_choice':
                $this->ben_redirect2("lms/quiz_question/multiple_choice/".$data['quiz_id']);
                break;
            case 'true_or_false':
                $this->ben_redirect2("lms/quiz_question/true_or_false/".$data['quiz_id']);
                break;
            case 'matching_type':
                $this->ben_redirect2("lms/quiz_question/matching_type/".$data['quiz_id']);
                break;
            case 'multiple_choice_multiple_answer':
                $this->ben_redirect2("lms/quiz_question/multiple_choice_multiple_answer/".$data['quiz_id']);
                break;
            default:
                # code...
                break;
        }

    }

    public function essay($quiz_id=""){
        $this->data['quiz_id'] = $quiz_id;
        $this->ben_view(__FUNCTION__);
    }

    public function identification($quiz_id=""){
        $this->data['quiz_id'] = $quiz_id;
        $this->ben_view(__FUNCTION__);
    }

    public function multiple_choice($quiz_id=""){
        $this->data['quiz_id'] = $quiz_id;
        $this->ben_view(__FUNCTION__);
    }

    public function true_or_false($quiz_id=""){
        $this->data['quiz_id'] = $quiz_id;
        $this->ben_view(__FUNCTION__);
    }

    public function matching_type($quiz_id=""){
        $this->data['quiz_id'] = $quiz_id;
        $this->ben_view(__FUNCTION__);
    }

    public function multiple_choice_multiple_answer($quiz_id=""){
        $this->data['quiz_id'] = $quiz_id;
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

    public function update(){
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
    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

    public function save(){
        if($_REQUEST){
            
            $_REQUEST[$this->current_page['controller']]['company_owner'] = $this->session->userdata('company_id');
            $_REQUEST[$this->current_page['controller']]['account_id'] = $this->session->userdata('id');
            if($current_quiz_id = $this->company_model->create_new("quiz",$_REQUEST[$this->current_page['controller']])){
                
                
                $this->ben_redirect("lms/quiz_part/index/".$current_quiz_id);
            }else{
                
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update_save(){
        if($_REQUEST){

            if($this->session->userdata('company_id')!=1){
                $_REQUEST[$this->current_page['controller']]['company_id'] = $this->session->userdata('company_id');
            }

            if($this->section_model->update("section",$_REQUEST[$this->current_page['controller']])){
                
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }else{
                
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

}
