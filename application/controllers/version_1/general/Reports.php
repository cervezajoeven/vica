<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Reports";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/general/'.'reports_model');
    }

    public function usage(){
        $this->data['total_lessons'] = $this->reports_model->total_lessons()[0]['count'];
        $this->data['total_quiz'] = $this->reports_model->total_quizzes()[0]['count'];
        $this->data['assigned_lessons'] = $this->reports_model->assigned_lessons()[0]['count'];
        $this->data['assigned_quizzes'] = $this->reports_model->assigned_quizzes()[0]['count'];
//        print_r("<pre>");
//        print_r($this->data['total_lessons']);
//        exit;
        $this->sms_view(__FUNCTION__);
    }

}
