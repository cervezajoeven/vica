<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolyear extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "School Years";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $data_filter = $this->account_type_model->multiple_join(array('schoolyear'));

        $this->data['all_data'] = $data_filter;

        $this->ben_view(__FUNCTION__);
    }

    public function create(){
        
        $this->data['all_data'] = $this->account_type_model->multiple_join(array('semester','company'));
        $this->ben_view(__FUNCTION__);
    }

    public function read(){

        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage']);
            $this->data['all_data']['company'] = $this->account_type_model->all('company');
            $this->data['update_data'] = $this->db->get_where($this->current_page['controller'],array("id"=>$id_storage[0]))->result_array()[0];
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update(){
        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage']);
            $this->data['all_data'] = $this->account_type_model->multiple_join(array('account_type','company'));
            $this->data['update_data'] = $this->db->get_where($this->current_page['controller'],array("id"=>$id_storage[0]))->result_array()[0];
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }
    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

    public function save(){

        $data = $this->input->post();
        
        $data = $data['schoolyear'];
        
        $this->form_validation->set_rules('schoolyear[schoolyear]', 'School Year', 'required');

        if($data&&$this->form_validation->run()){
            
            $this->schoolyear_model->create($this->current_page['controller'],$data);
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update_save(){

        if($_REQUEST){
            if($this->schoolyear_model->update($this->current_page['controller'],$_REQUEST['schoolyear'])){
                $this->ben_notify(array(array("success","You have successfully updated the data")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to update")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

}
