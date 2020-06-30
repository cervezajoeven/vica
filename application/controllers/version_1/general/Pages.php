<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Accounts";
        $this->view_folder = strtolower(get_class());
    }

    public function under_construction(){
        $this->ben_notify(array(array("danger","PAGE UNDER CONSTRUCTION!!!")));
        $this->ben_redirect("general/dashboard/index");

    }

}
