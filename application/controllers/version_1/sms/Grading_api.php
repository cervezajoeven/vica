<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grading_api extends BEN_General {
	public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "sms";
        $this->page_title = "Lesson";
        $this->view_folder = strtolower(get_class());
    }

    public function api_test($data=""){
        header('Content-Type: application/json');
        $data = json_decode(urldecode($data));
        $sy = str_replace("SY ", "", $data->schoolyear);
        preg_match_all('!\d+!', $data->semester, $trime);
        $trime = $trime[0][0];
        $level = "Grade ".$data->grade;
        $section = ucfirst(strtolower($data->section));
        $subject = ucfirst(strtolower($data->subject));


        $otherdb = $this->load->database('dhan', TRUE);
        $otherdb->select("sn,quiz,total_item,score");
        $otherdb->from("quiz_chart");
        $otherdb->where('sy',$sy);
        $otherdb->where('trime',$trime);
        $otherdb->where('level',$level);
        $otherdb->where('section',$section);
        $otherdb->where('subject',$subject);
        $quiz_chart = $otherdb->get()->result_array();
    	echo json_encode($quiz_chart);
    }

    public function save_deportment($data=""){
        header('Content-Type: application/json');
        $data = json_decode(urldecode($data));
        print_r($data);

        // $sy = str_replace("SY ", "", $data->schoolyear);
        // preg_match_all('!\d+!', $data->semester, $trime);
        // $trime = $trime[0][0];
        // $level = "Grade ".$data->grade;
        // $section = ucfirst(strtolower($data->section));
        // $subject = ucfirst(strtolower($data->subject));


        // $otherdb = $this->load->database('dhan', TRUE);
        // $otherdb->select("sn,quiz,total_item,score");
        // $otherdb->from("quiz_chart");
        // $otherdb->where('sy',$sy);
        // $otherdb->where('trime',$trime);
        // $otherdb->where('level',$level);
        // $otherdb->where('section',$section);
        // $otherdb->where('subject',$subject);
        // $quiz_chart = $otherdb->get()->result_array();
        // echo json_encode($quiz_chart);
    }

    public function save_attendance($data=""){
        // header('Content-Type: application/json');
        $data = json_decode(urldecode($data));
        print_r($data);

        // $sy = str_replace("SY ", "", $data->schoolyear);
        // preg_match_all('!\d+!', $data->semester, $trime);
        // $trime = $trime[0][0];
        // $level = "Grade ".$data->grade;
        // $section = ucfirst(strtolower($data->section));
        // $subject = ucfirst(strtolower($data->subject));


        // $otherdb = $this->load->database('dhan', TRUE);
        // $otherdb->select("sn,quiz,total_item,score");
        // $otherdb->from("quiz_chart");
        // $otherdb->where('sy',$sy);
        // $otherdb->where('trime',$trime);
        // $otherdb->where('level',$level);
        // $otherdb->where('section',$section);
        // $otherdb->where('subject',$subject);
        // $quiz_chart = $otherdb->get()->result_array();
        // echo json_encode($quiz_chart);
    }

    public function save_tardiness($data=""){
        // header('Content-Type: application/json');
        $data = json_decode(urldecode($data));
        print_r($data);

        // $sy = str_replace("SY ", "", $data->schoolyear);
        // preg_match_all('!\d+!', $data->semester, $trime);
        // $trime = $trime[0][0];
        // $level = "Grade ".$data->grade;
        // $section = ucfirst(strtolower($data->section));
        // $subject = ucfirst(strtolower($data->subject));


        // $otherdb = $this->load->database('dhan', TRUE);
        // $otherdb->select("sn,quiz,total_item,score");
        // $otherdb->from("quiz_chart");
        // $otherdb->where('sy',$sy);
        // $otherdb->where('trime',$trime);
        // $otherdb->where('level',$level);
        // $otherdb->where('section',$section);
        // $otherdb->where('subject',$subject);
        // $quiz_chart = $otherdb->get()->result_array();
        // echo json_encode($quiz_chart);
    }

    public function save_grades($data){

        $data = urldecode($data);
        $data = json_decode($data);
        $sms_grades_code = $data->code;
        $schoolyear = $data->schoolyear;
        $semester = $data->semester;
        $subject = $data->subject; 
        $section = $data->section;
        $gender = $data->gender;
        $grade = $data->grade;
        $faculty = $data->faculty;
        $grades = json_encode($data->grades);
        $schoolyear = str_replace("SY","", $schoolyear);
        $schoolyear = str_replace(" ","", $schoolyear);
        $semester = str_replace(" ","", $semester);
        $subject = strtolower($subject);
        $section = ucfirst(strtolower($section));

        $create_sms_grades = array(
            "sms_grades_code"=>$sms_grades_code,
            "schoolyear"=>$schoolyear,
            "semester"=>$semester,
            "subject"=>$subject,
            "section"=>$section,
            "gender"=>$gender,
            "grade"=>$grade,
            "faculty"=>$faculty,
            "grades"=>$grades,
            "company_owner"=>2
        );
        
        if($this->grading_model->ben_where("sms_grades","sms_grades_code",$create_sms_grades['sms_grades_code'])){

            $updated = $this->grading_model->sms_update("sms_grades","sms_grades_code",$create_sms_grades);
        }else{
            $this->grading_model->create_unescaped("sms_grades",$create_sms_grades);
        }

    }
    
}
