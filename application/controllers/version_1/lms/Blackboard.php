<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blackboard extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Blackboard";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        $this->toggled = array("sics","blackboard");
        
        $this->sms_view(__FUNCTION__);
    }

}
