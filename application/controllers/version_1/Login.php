<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends BEN_General {

    function __construct() {

        parent::__construct();
    }
    function __destruct(){
        $this->ben_check_session();
    }

    public function index(){

    	$data = $this->input->post();
    	$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );

        if(!$this->session->has_userdata('username')){
            if ($this->form_validation->run()){
            	$login = $this->account_model->login($data);
                if($login){
                    //if login successful
                    $this->session->set_userdata($login);
                    $this->ben_redirect("dashboard");
                }else{
                    //if login not successful
                    $this->ben_notify(array(array("danger","Login credentials does not exist.")));
                    $this->ben_redirect("home");
                }
            }
            else{
                //if accessed through url
                $this->ben_notify(array(array("warning","You are not authorized to access that page. ^_^")));
            	$this->ben_redirect("home");
            }
        }else{
            //if user is already logged in
            $this->ben_notify(array(array("success","You are already logged in. ^_^")));
            $this->ben_redirect("dashboard");
        }


    }
    public function logout(){
        $this->current_function = __FUNCTION__;
        // $this->account_model->logout($this->session->userdata());
        // $this->session->sess_destroy();
        // $this->ben_redirect("home");
    }

}
