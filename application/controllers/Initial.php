<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Initial extends BEN_General {

	function __construct() {

       	parent::__construct();
       	$this->view_folder = "general/home";
   	}	

	public function index(){
		$this->ben_redirect("general/home/index");
	}

}
