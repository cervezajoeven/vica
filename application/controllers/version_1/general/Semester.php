<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Accounts";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $data_filter = $this->account_type_model->multiple_join(array('semester','company'));

        $this->data['all_data'] = $data_filter;

        $this->ben_view(__FUNCTION__);
    }

    public function create(){
        
        $this->data['all_data'] = $this->account_type_model->all('company');
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
        $data = $data['account'];
        $this->form_validation->set_rules('account[username]', 'Username', 'required');
        $this->form_validation->set_rules('account[password]', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('account[confirm_password]', 'Confirm Password', 'required|matches[account[password]]');

        if($data&&$this->form_validation->run()){
            unset($data['confirm_password']);

            if($insert_id = $this->account_model->create($this->current_page['controller'],$data)){
                $this->ben_notify(array(array("success","Account was successfully created"),array("info","Please add some profile information for your account.")));
                $this->ben_redirect("general/profile/create/".$insert_id);
            }else{
                $this->ben_notify(array(array("danger","The username has already been taken")));
                $this->ben_redirect("general/account/create");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update_save(){
        if($_REQUEST){
            if($this->account_type_model->update($this->current_page['controller'],$_REQUEST)){
                $this->ben_notify(array(array("success","You have successfully updated the data")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to update")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

}
