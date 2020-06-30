<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends BEN_General {

    public $current_function;

    function __construct() {

        parent::__construct();
        $this->module_folder = "sms";
        $this->page_title = "Campus eBook";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
         $this->ben_view_ultraclear(__FUNCTION__);
    }
}
