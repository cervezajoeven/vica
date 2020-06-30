<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends BEN_General {
    public $current_function;

    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = ucwords(get_class());
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $this->ben_view(__FUNCTION__);
    }

    public function create($account_id=""){
        if($account_id){
            $this->data['account_id'] = $account_id;
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/account/index");
        }
        
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

    public function update($account_id=""){
        $this->data['account_id'] = $account_id;
        $this->data['profile_data'] = $this->profile_model->get_profile_by_account_id($account_id);
        
        if(!count($this->data['profile_data'])){
            $this->ben_redirect("general/".$this->current_page['controller']."/create/".$this->data['account_id']);
        }
        $this->ben_view(__FUNCTION__);
    }
    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

    public function save($account_id=""){
        if($_REQUEST&&$account_id){
            $_REQUEST['profile']['account_id'] = $account_id;
            if($this->profile_model->create($this->current_page['controller'],$_REQUEST['profile'])){
                $this->ben_notify(array(array("success","You have successfully added the data.")));
                $this->ben_redirect("general/account/index");
            }else{
                
            }
        }else{

        }
        
    }

    public function update_save($account_id="",$profile_id=""){

        if($_REQUEST){
            $_REQUEST['profile']['id'] = $profile_id;
            $_REQUEST['profile']['account_id'] = $account_id;
            if($this->profile_model->update($this->current_page['controller'],$_REQUEST['profile'])){
                $this->ben_notify(array(array("success","You have successfully added the data.")));
                $this->ben_redirect("general/account/index");
            }else{
                
            }
        }else{

        }
    }

}
