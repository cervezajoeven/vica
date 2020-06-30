<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends BEN_General {

    function __construct() {

        parent::__construct();
    }

    public function index(){

    	$this->data['banner_data'] = $this->banner_model->all('banner');
        $this->ben_view(__FUNCTION__);
    }

}
