<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "CRUD";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $this->data['all_data'] = $this->crud_model->multiple_join(array('crud','account_type','company'));
        $this->ben_view(__FUNCTION__);
    }

    public function create(){

        $this->data['all_data'] = $this->crud_model->multiple_join(array('account_type','company'));

        $this->ben_view(__FUNCTION__);
    }

    public function read(){

        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage']);
            $this->data['all_account_type'] = $this->crud_model->join(array("account_type"=>"company_id","company"=>"id"));
            $this->data['update_data'] = $this->db->get_where("crud",array("id"=>$id_storage[0]))->result_array()[0];
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/crud/index");
        }
    }

    public function update(){
        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage']);
            $this->data['all_account_type'] = $this->crud_model->join(array("account_type"=>"company_id","company"=>"id"));
            $this->data['update_data'] = $this->db->get_where("crud",array("id"=>$id_storage[0]))->result_array()[0];
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/crud/index");
        }
        
    }
    public function delete(){
        $this->ben_general_delete("crud");
    }

    public function save(){
        
        if($_REQUEST){
            if($_REQUEST['ci_session']){
                unset($_REQUEST['ci_session']);
            }
            if($this->crud_model->create("crud",$_REQUEST)){

                $this->ben_notify(array(array("success","You have successfully added new data")));
                $this->ben_redirect("general/crud/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/crud/index");
        }
    }

    public function update_save(){
        if($_REQUEST){
            // var_dump($this->crud_model->update("crud",$_REQUEST));
            // print_r($_REQUEST);

            if($this->crud_model->update("crud",$_REQUEST)){
                $this->ben_notify(array(array("success","You have successfully updated the data")));
                $this->ben_redirect("general/crud/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to update")));
            $this->ben_redirect("general/crud/index");
        }
    }

}
