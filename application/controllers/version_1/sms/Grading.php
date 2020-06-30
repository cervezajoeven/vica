<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grading extends BEN_General {

    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "sms";
        $this->page_title = "Lesson";
        $this->view_folder = strtolower(get_class());
    }

    public function form_138(){

        $student_tree = $this->grading_model->get_student_tree();
        $filtered_students = $this->grading_model->filter_by_section($student_tree);
        $this->data['filtered_students'] = $filtered_students;

        $this->sms_view(array("view"=>"form_138"));
    	
    }

    public function form_138_section(){

        $student_tree = $this->grading_model->get_student_tree();
        $filtered_students = $this->grading_model->filter_by_section($student_tree);
        $this->data['filtered_students'] = $filtered_students;
        // echo "<pre>";
        // print_r($filtered_students);
        // exit();
        $this->ben_view_ultraclear(__FUNCTION__);
        
    }

    public function view($schoolyear="",$semester="",$grade="",$section="",$gender="",$account_id=""){

        $this->data['profile'] = $this->grading_model->ben_where2("profile","account_id",$account_id);
        $this->data['schoolyear'] = $schoolyear;
        $this->data['semester'] = $semester;
        $this->data['grade'] = $grade;
        $this->data['section'] = $section;
        $this->data['gender'] = $gender;
        $this->data['account_id'] = $account_id;
        $this->ben_view_ultraclear(__FUNCTION__);
        
    }

    public function view_section($schoolyear="",$semester="",$grade="",$section=""){

        $this->data['schoolyear'] = $schoolyear;
        $this->data['semester'] = $semester;
        $this->data['grade'] = $grade;
        $this->data['section'] = $section;
        $this->data['students'] = $this->grading_model->get_students($schoolyear,$semester,$grade,$section);
        $this->ben_view_ultraclear(__FUNCTION__);
        
    }

    public function form_138_print($schoolyear="",$semester="",$grade="",$section="",$gender="",$account_id=""){
        
        $this->data['student_grades'] = $this->grading_model->get_student_grades($schoolyear,$semester,$grade,$section,$gender,$account_id);
        $this->data['profile'] = $this->profile_model->get_student_complete_information($account_id);
        // echo "<pre>";
        // print_r($this->data['student_grades']);
        // exit();
        $this->ben_view_ultraclear("form138");
        
    }

}
