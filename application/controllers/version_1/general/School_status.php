<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_status extends BEN_General {

    public $current_function;

    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Accounts";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        // print_r($this->session->userdata());
        // exit;
        $company_id = $this->session->userdata('company_id');
        $this->data['schoolyear_data'] = $this->school_status_model->all("schoolyear");
        $this->data['semester_data'] = $this->school_status_model->all("semester");
        $this->data['school_status_data'] = $this->school_status_model->get_company_status($company_id);
        $this->ben_view(__FUNCTION__);
    }

    public function save(){
        if($_REQUEST){
            if($this->school_status_model->create("school_status",$_REQUEST)){

                $school_status_data = $this->school_status_model->get_company_status($this->session->userdata('company_id'))[0];
                $this->session->set_userdata('school_status_schoolyear',$school_status_data['schoolyear_id']);
                $this->session->set_userdata('school_status_semester',$school_status_data['semester_id']);
                $this->ben_notify(array(array("success","You have successfully saved the School Status.")));
                $this->ben_redirect("general/school_status/index");
            }else{
                $this->ben_notify(array(array("warning","Data was not saved successfully ")));
                $this->ben_redirect("general/school_status/index");
            }
        }else{
            $this->ben_notify(array(array("danger","No data to save.")));
            $this->ben_redirect("general/school_status/index");
        }
    }

    public function update_save(){

        if($_REQUEST){
            if($this->school_status_model->update("school_status",$_REQUEST)){
                
                $school_status_data = $this->school_status_model->get_company_status($this->session->userdata('company_id'))[0];
                $this->session->set_userdata('school_status_schoolyear',$school_status_data['schoolyear_id']);
                $this->session->set_userdata('school_status_semester',$school_status_data['semester_id']);
                $this->ben_notify(array(array("success","You have successfully saved the School Status.")));
                $this->ben_redirect("general/school_status/index");
            }else{
                $this->ben_notify(array(array("warning","Data was not saved successfully ")));
                $this->ben_redirect("general/school_status/index");
            }
        }else{
            $this->ben_notify(array(array("danger","No data to save.")));
            $this->ben_redirect("general/school_status/index");
        }
    }

}
