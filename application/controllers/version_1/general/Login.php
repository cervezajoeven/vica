<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Login";
        $this->view_folder = strtolower(get_class());

    }

    public function index(){



        $this->ben_redirect("general/dashboard/sms_index");
    }
    
    public function login(){

        $data = $this->input->post();
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );

        if(!$this->session->has_userdata('username')){
            if ($this->form_validation->run()){
                $login = $this->account_model->login($data);
                
                if($login){
                    $login = $this->account_model->account_information($login);

                    $school_status = $this->school_status_model->get_company_status($login['company_id'])[0];
                    if(count($school_status)){
                        $login['school_status_schoolyear'] = $school_status['schoolyear_id'];
                        $login['school_status_semester'] = $school_status['semester_id'];
                    }
                    
                    //if login successful
                    $this->session->set_userdata($login);
                    // $this->ben_redirect("general/dashboard");
                    $this->ben_redirect("general/dashboard/sms_index");

                }else{

                    //if login not successful
//                    $this->ben_notify(array(array("danger","Wrong Username or Password.")));
                    $this->ben_redirect("general/login/index");
                }
            }
            else{

                //if accessed through url
//                $this->ben_notify(array(array("warning","You are not authorized to access that page. ^_^")));
                $this->ben_redirect("general/login/index");
            }
        }else{

            //if user is already logged in
//            $this->ben_notify(array(array("success","You are already logged in. ^_^")));
            $this->ben_redirect("general/dashboard");
        }
    }
    public function logout(){

        $this->account_model->logout($this->session->userdata());
        $this->session->sess_destroy();
        $this->ben_notify(array(array("success","You have successfully logged out")));
        $this->ben_redirect("general/home");
    }

}
