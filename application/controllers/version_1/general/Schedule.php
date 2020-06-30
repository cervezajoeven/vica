<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Schedule";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/general/'.'schedule_model');
    }

    public function index($grade=""){
        $this->toggled = array("my_schedule");
        $account_id = $this->session->userdata('id');
        $this->data['schedule'] = $this->schedule_model->ben_where('schedule',"account_id",$account_id);
        $this->lesson_model->optimize_lessons();
        $this->data['lesson_schedule'] = $this->lesson_model->lesson_schedule(urldecode($grade));

        $main_color_array = array("#9e0000","#9e5700","#9e8400","#969e00","#699e00","#2f9e00","#009e7e","#00779e","#001a9e","#4a009e","#8c009e","#9e005f","#9e0000");
        $color_array = $main_color_array;

        foreach ($this->data['lesson_schedule'] as $lesson_schedule_key => $lesson_schedule_value) {
            $lesson_schedule_json[$lesson_schedule_key] = new stdClass();
            $lesson_schedule_json[$lesson_schedule_key]->title = html_entity_decode($lesson_schedule_value['lesson_name'])." Teacher: ".html_entity_decode($lesson_schedule_value['last_name']);
            $lesson_schedule_json[$lesson_schedule_key]->start = date("c",strtotime($lesson_schedule_value['start_date']));
            $lesson_schedule_json[$lesson_schedule_key]->end = date("c",strtotime($lesson_schedule_value['end_date']));
            $lesson_schedule_json[$lesson_schedule_key]->allDay = false;
            $the_random = 0;
            $lesson_schedule_json[$lesson_schedule_key]->color = $color_array[$the_random];
            $lesson_schedule_json[$lesson_schedule_key]->sections = $lesson_schedule_value['sections'];
            $lesson_schedule_json[$lesson_schedule_key]->topic = html_entity_decode($lesson_schedule_value['lesson_name']);
            unset($color_array[$the_random]);
            if(!empty($color_array)){
                $color_array = array_values($color_array);
            }else{
                $color_array = $main_color_array;
            }
            
        }

        $this->data['lesson_schedule'] = json_encode($lesson_schedule_json);
        $this->data['sections'] = $this->schedule_model->all('section');
        
        $this->sms_view(__FUNCTION__);
    }

    public function assessment($grade=""){
        $this->toggled = array("my_schedule");
        $account_id = $this->session->userdata('id');
        $this->data['schedule'] = $this->schedule_model->ben_where('schedule',"account_id",$account_id);
        $this->quiz_model->optimize_quizzes();
        $this->data['the_schedule'] = $this->quiz_model->quiz_schedule(urldecode($grade));

        $main_color_array = array("#9e0000","#9e5700","#9e8400","#969e00","#699e00","#2f9e00","#009e7e","#00779e","#001a9e","#4a009e","#8c009e","#9e005f","#9e0000");
        $color_array = $main_color_array;

        foreach ($this->data['the_schedule'] as $the_schedule_key => $the_schedule_value) {
            $schedule_json[$the_schedule_key] = new stdClass();
            $schedule_json[$the_schedule_key]->title = html_entity_decode($the_schedule_value['quiz_name'])." Teacher: ".html_entity_decode($the_schedule_value['last_name']);
            $schedule_json[$the_schedule_key]->start = date("c",strtotime($the_schedule_value['start_date']));
            $schedule_json[$the_schedule_key]->end = date("c",strtotime($the_schedule_value['end_date']));
            $schedule_json[$the_schedule_key]->allDay = false;
            $the_random = 0;
            $schedule_json[$the_schedule_key]->color = $color_array[$the_random];
            $schedule_json[$the_schedule_key]->sections = $the_schedule_value['sections'];
            $schedule_json[$the_schedule_key]->topic = html_entity_decode($the_schedule_value['quiz_name']);
            unset($color_array[$the_random]);
            if(!empty($color_array)){
                $color_array = array_values($color_array);
            }else{
                $color_array = $main_color_array;
            }
            
        }

        $this->data['the_schedule'] = json_encode($schedule_json);
        $this->data['sections'] = $this->schedule_model->all('section');
        
        $this->sms_view(__FUNCTION__);
    }

    public function admin_lesson($grade=""){
        $this->toggled = array("my_schedule");
        $account_id = $this->session->userdata('id');
        $this->data['schedule'] = $this->schedule_model->ben_where('schedule',"account_id",$account_id);
        $this->lesson_model->optimize_lessons();
        $this->data['lesson_schedule'] = $this->lesson_model->lesson_schedule_admin(urldecode($grade));

        $main_color_array = array("#9e0000","#9e5700","#9e8400","#969e00","#699e00","#2f9e00","#009e7e","#00779e","#001a9e","#4a009e","#8c009e","#9e005f","#9e0000");
        $color_array = $main_color_array;

        foreach ($this->data['lesson_schedule'] as $lesson_schedule_key => $lesson_schedule_value) {
            $lesson_schedule_json[$lesson_schedule_key] = new stdClass();
            $lesson_schedule_json[$lesson_schedule_key]->title = html_entity_decode($lesson_schedule_value['lesson_name'])." Teacher: ".html_entity_decode($lesson_schedule_value['last_name']);
            $lesson_schedule_json[$lesson_schedule_key]->start = date("c",strtotime($lesson_schedule_value['start_date']));
            $lesson_schedule_json[$lesson_schedule_key]->end = date("c",strtotime($lesson_schedule_value['end_date']));
            $lesson_schedule_json[$lesson_schedule_key]->allDay = false;
            $the_random = 0;
            $lesson_schedule_json[$lesson_schedule_key]->color = $color_array[$the_random];
            $lesson_schedule_json[$lesson_schedule_key]->sections = $lesson_schedule_value['sections'];
            $lesson_schedule_json[$lesson_schedule_key]->topic = html_entity_decode($lesson_schedule_value['lesson_name']);
            unset($color_array[$the_random]);
            if(!empty($color_array)){
                $color_array = array_values($color_array);
            }else{
                $color_array = $main_color_array;
            }
            
        }
        // print_r($this->data['lesson_schedule']);
        $this->data['lesson_schedule'] = json_encode($lesson_schedule_json);
        $this->data['sections'] = $this->schedule_model->all('section');

        $this->sms_view(__FUNCTION__);
    }

    public function admin_assessment($grade=""){
        $this->toggled = array("my_schedule");
        $account_id = $this->session->userdata('id');
        $this->data['schedule'] = $this->schedule_model->ben_where('schedule',"account_id",$account_id);
        $this->quiz_model->optimize_quizzes();
        $this->data['the_schedule'] = $this->quiz_model->quiz_schedule_admin(urldecode($grade));

        $main_color_array = array("#9e0000","#9e5700","#9e8400","#969e00","#699e00","#2f9e00","#009e7e","#00779e","#001a9e","#4a009e","#8c009e","#9e005f","#9e0000");
        $color_array = $main_color_array;

        foreach ($this->data['the_schedule'] as $the_schedule_key => $the_schedule_value) {
            $schedule_json[$the_schedule_key] = new stdClass();
            $schedule_json[$the_schedule_key]->title = html_entity_decode($the_schedule_value['quiz_name'])." Teacher: ".html_entity_decode($the_schedule_value['last_name']);
            $schedule_json[$the_schedule_key]->start = date("c",strtotime($the_schedule_value['start_date']));
            $schedule_json[$the_schedule_key]->end = date("c",strtotime($the_schedule_value['end_date']));
            $schedule_json[$the_schedule_key]->allDay = false;
            $the_random = 0;
            $schedule_json[$the_schedule_key]->color = $color_array[$the_random];
            $schedule_json[$the_schedule_key]->sections = $the_schedule_value['sections'];
            $schedule_json[$the_schedule_key]->topic = html_entity_decode($the_schedule_value['quiz_name']);
            unset($color_array[$the_random]);
            if(!empty($color_array)){
                $color_array = array_values($color_array);
            }else{
                $color_array = $main_color_array;
            }
            
        }

        $this->data['the_schedule'] = json_encode($schedule_json);
        $this->data['sections'] = $this->schedule_model->all('section');
        
        $this->sms_view(__FUNCTION__);
    }

    public function save(){
        
        $data['account_id'] = $_REQUEST['account_id'];
        $data['schedule'] = $_REQUEST['schedule'];
        $find_data = $this->schedule_model->ben_where('schedule',"account_id",$data['account_id']);
        if(empty($find_data)){
            if($id = $this->schedule_model->create_new("schedule",$data)){
                echo "success";
            }else{
                echo "failed";
            }
        }else{
            $data['id'] = $find_data[0]['id'];
            if($id = $this->schedule_model->update("schedule",$data)){
                echo "update success";
            }else{
                echo "update failed";
            }
        }
        
        
    }

    

}
