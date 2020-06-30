<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Sections";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $this->data['all_data']= $this->section_model->multiple_join(array('section','grade','company'));
        $this->ben_view(__FUNCTION__);
    }

    public function create(){

        $this->data['company_data']= $this->company_model->all('company');
        $this->data['grade_data']= $this->company_model->all('grade');

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
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update(){
        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage']);
            $this->data['all_data']['section'] = $this->account_type_model->all('section');
            $this->data['all_data']['grade'] = $this->account_type_model->all('grade');
            $this->data['update_data'] = $this->db->get_where($this->current_page['controller'],array("id"=>$id_storage[0]))->result_array()[0];
            $this->data['company_data']= $this->company_model->all('company');
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
        if($_REQUEST){
            
            if($this->session->userdata('company_id')!=1){
                $_REQUEST[$this->current_page['controller']]['company_id'] = $this->session->userdata('company_id');
            }

            if($this->company_model->create("section",$_REQUEST[$this->current_page['controller']])){
                $this->ben_notify(array(array("success","You have successfully added new data")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }else{
                $this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update_save(){
        if($_REQUEST){

            if($this->session->userdata('company_id')!=1){
                $_REQUEST[$this->current_page['controller']]['company_id'] = $this->session->userdata('company_id');
            }

            if($this->section_model->update("section",$_REQUEST[$this->current_page['controller']])){
                $this->ben_notify(array(array("success","You have successfully updated the data")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }else{
                $this->ben_notify(array(array("danger","Error on saving")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

}
