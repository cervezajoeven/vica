<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Synchronization extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Synchronization";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/general/'.'synchronization');
    }

    public function index(){
        // return "<body>";
        // exit();
        // return $this->synchronization_model->synchronization();
    }


}
