<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BEN_General {

    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Dashboard";
        $this->view_folder = "dashboard";
    }

    public function index(){
        $this->data['banner_data'] = $this->banner_model->all('banner');
        $this->data['announcement_data'] = $this->announcement_model->announcement_account_profile();
        $this->ben_view(__FUNCTION__);
    }

    public function sms_index(){
        $this->data['banner_data'] = $this->banner_model->all('banner');
        $this->data['announcement_data'] = $this->announcement_model->announcement_account_profile();
        $current_account = $this->account_model->ben_where("account","id",$this->session->userdata('id'))[0];
        $this->data['the_user'] = $this->session->userdata();
        $this->data['trigger_change_password'] = false;
        if($current_account['account_type_id']==5){
            if($current_account['initial_login']==0){
                $this->data['trigger_change_password'] = true;
            }
        }
        
        $this->sms_view(array("view"=>"sms_index"));
        
    }

    public function circulation(){
        $this->data['banner_data'] = $this->banner_model->all('banner');
        $this->data['announcement_data'] = $this->announcement_model->announcement_account_profile();
        $current_account = $this->account_model->ben_where("account","id",$this->session->userdata('id'))[0];
        $this->data['the_user'] = $this->session->userdata();
        $this->data['trigger_change_password'] = false;
        if($current_account['account_type_id']==5){
            if($current_account['initial_login']==0){
                $this->data['trigger_change_password'] = true;
            }
        }
        
        $this->sms_view(array("view"=>"circulation"));
        
    }

    public function about_us(){
        $this->ben_view(__FUNCTION__);
    }

    public function contact_us(){
        $this->ben_view(__FUNCTION__);
    }

    public function portal(){
        $this->ben_view(__FUNCTION__);
    }

    public function admission(){
        
        $this->ben_view_ultraclear(__FUNCTION__);

    }


}
