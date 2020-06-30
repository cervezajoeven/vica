<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends BEN_General {

    function __construct() {
        parent::__construct(); 
        $this->page_title = "Brainee LMS";
        $this->module_folder = "general";
    }

    public function index($username=""){

        $this->db->from('account');
        $this->db->select('username');
        $this->db->where('account.account_type_id',5);

        $this->db->error();
        $query = $this->db->get();
        $return = $query->result_array();
    
        foreach ($return as $return_key => $return_value) {
            $usernames[$return_key] = $return_value['username'];
        }
        // print_r(json_encode($usernames));
        $this->data['usernames'] = json_encode($usernames);
        // print_r(implode(",", $usernames));
        // exit();
    	$this->data['banner_data'] = $this->banner_model->all('banner');
        $this->data['announcement_data'] = $this->announcement_model->announcement_account_profile();
        $this->data['school_status'] = $this->school_status_model->all("school_status")[0];
        $this->data['school_history'] = $this->school_status_model->get_history();
        $this->data['username'] = $username;


        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function index_parallax(){
        // echo "<pre>";
        $this->db->from('account');
        $this->db->join('profile', 'profile.account_id = account.id','left');
        $this->db->join('classes', 'account.id = classes.account_id','left');
        $this->db->join('section', 'section.id = classes.section_id','left');
        $this->db->join('grade', 'grade.id = section.grade_id','left');


        $this->db->select('
            username,
            first_name,
            middle_name,
            last_name,
            grade.grade_name as grade_name,
            section.section_name as section_name,
            ');
        $this->db->where('account.account_type_id',5);

        $this->db->error();
        $query = $this->db->get();
        $return = $query->result_array();
        // print_r($return);
        // exit();
        $this->data['data'] = $return;
        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function calendar(){

        $this->ben_view(__FUNCTION__);
    }


    public function about_us(){

        $this->ben_view(__FUNCTION__);
    }

}
