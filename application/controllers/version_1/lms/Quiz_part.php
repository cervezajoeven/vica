<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_part extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Quiz Part";
        $this->view_folder = strtolower(get_class());
    }

    public function index($quiz_id=""){
        
        $this->data['all_data']= $this->quiz_part_model->quiz_order_filter($quiz_id);
        $this->data['quiz_id'] = $quiz_id;
        $data['id'] = $quiz_id;
        $this->quiz_model->update_total_score($quiz_id);
        $this->data['quiz_data'] = $this->quiz_model->get('quiz',$data);
        $this->data['quiz_id'] = $quiz_id;
        $this->ben_view(__FUNCTION__);
    }

    public function create($quiz_id=""){
        $company_id = $this->session->userdata('company_id');
        $this->data['quiz_id'] = $quiz_id;
        $this->data['quiz_part_data'] = $this->quiz_part_model->quiz_order_filter($quiz_id);
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
            //$this->ben_notify(array(array("danger","No data was specified")));
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
            //$this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
        
    }
    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

    public function save(){
        if($_REQUEST){
            
            if(array_key_exists('quiz_order', $_REQUEST[$this->current_page['controller']])){
                if($_REQUEST[$this->current_page['controller']]['quiz_order']){

                    $interchanged = $this->quiz_part_model->order_interchange($_REQUEST[$this->current_page['controller']]);
                    $_REQUEST[$this->current_page['controller']]['quiz_order'] = $interchanged;
                }else{
                    $_REQUEST[$this->current_page['controller']]['quiz_order'] = $this->quiz_part_model->get_maximum_order_by_quiz_id($_REQUEST[$this->current_page['controller']]['quiz_id']);
                }
            }else{
                $_REQUEST[$this->current_page['controller']]['quiz_order'] = 1;
            }
            
               
            if($this->company_model->create_new("quiz_part",$_REQUEST[$this->current_page['controller']])){
                //$this->ben_notify(array(array("success","You have successfully added new data")));

                $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$_REQUEST[$this->current_page['controller']]['quiz_id']);
            }else{
                //$this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }

        }else{
            //$this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update_save(){
        if($_REQUEST){

            if($this->session->userdata('company_id')!=1){
                $_REQUEST[$this->current_page['controller']]['company_id'] = $this->session->userdata('company_id');
            }

            if($this->section_model->update("section",$_REQUEST[$this->current_page['controller']])){
                //$this->ben_notify(array(array("success","You have successfully updated the data")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }else{
                $this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            //$this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function delete_by_id($id="",$quiz_id=""){
        $data['id'] = $id;
        $data['deleted'] = 1;
        $this->quiz_part_model->soft_delete("quiz_part",$data);
        //$this->ben_notify(array(array("success","Removed successfully")));
        $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$quiz_id);
    }

    public function modify_part(){

        $quiz_label = $_REQUEST['quiz_label'];
        $data = $_REQUEST;
        unset($data['_ga']);
        unset($data['_gid']);
        unset($data['ci_session']);
        // print_r($data);
        // exit();
        if($quiz_label){
            $this->quiz_part_model->change_label($data);
            //$this->ben_notify(array(array("success","Renamed successfully")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$data['quiz_id']);
        }else{
            echo "no quiz label";
            exit;
        }
    }

    public function interchange(){

        $data = $_REQUEST;
        if($this->quiz_part_model->interchange($data)){
            //$this->ben_notify(array(array("success","Successfully rearranged")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$data['quiz_id']);
        }else{
            //$this->ben_notify(array(array("warning","No changes made")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$data['quiz_id']);
        }
    }

    public function reorder($direction="down",$quiz_part_id="",$quiz_id=""){
        
        if($this->quiz_part_model->reorder($direction,$quiz_part_id,$quiz_id)){
            //$this->ben_notify(array(array("success","Successfully rearranged")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$quiz_id);
        }else{
            //$this->ben_notify(array(array("warning","No changes made")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$quiz_id);
        }

        
    }

    public function display_html_question($data=array()){

        $question_data = $data;
        
        
        $this->data['option_data'] = $this->question_model->get_options_by_question_id($question_data['id']);
        $this->data['question_data'] = $question_data;
        if($data['question_type']=="essay"){
            return $this->ben_html('essay');
        }else if($data['question_type']=="identification"){
            return $this->ben_html('identification');
        }else if($data['question_type']=="multiple_choice"){
            return $this->ben_html('multiple_choice');
        }else if($data['question_type']=="true_or_false"){
            return $this->ben_html('true_or_false');
        }else if($data['question_type']=="matching_type"){
            return $this->ben_html('matching_type');
        }else if($data['question_type']=="multiple_choice_multiple_answer"){
            return $this->ben_html('multiple_choice_multiple_answer');
        }else if($data['question_type']=="fill_in_the_blanks"){
            return $this->ben_html('fill_in_the_blanks');
        }
        
    }

}
