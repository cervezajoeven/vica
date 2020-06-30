<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends BEN_General {

    function __construct() {
        parent::__construct(); 
        $this->page_title = "STEPS";
        
    }

    public function index(){
    	
        $this->ben_view(array(
        	array("value"=>"index")
        ));
    }

}
