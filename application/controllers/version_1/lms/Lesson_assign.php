<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_assign extends BEN_General {

    public $current_function;

    function __construct() {

        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Assign Lesson";
        $this->view_folder = strtolower(get_class());
    }

    public function index($lesson_id=""){

        $this->data['all_data'] = $this->lesson_assign_model->get_schedules($lesson_id);
        $this->data['lesson_id'] = $lesson_id;
        $this->ben_view(__FUNCTION__);
    }

    public function create($lesson_id=""){

        $this->data['lesson_id'] = $lesson_id;
        $this->data['grades'] = $this->lesson_assign_model->all('grade');
        $this->data['sections'] = $this->lesson_assign_model->all('section');
        $this->data['classes'] = $this->lesson_assign_model->get_all_classes();

        $lesson_assign['id'] = $lesson_id;
        $this->data['lesson_assign'] = $this->lesson_assign_model->get_lesson_assign_data_by_lesson_id($lesson_id);
        if($this->data['lesson_assign']){
            $this->data['assigned_students'] = explode(",", $this->data['lesson_assign']['account_ids']);
            $this->sms_view("create_update");
        }else{
            $this->sms_view(__FUNCTION__);
        }
        
    }

    public function update($lesson_id=""){
        $lesson_assign_id = json_decode($_REQUEST['id_storage'])[0];
        $this->data['lesson_assign_id'] = $lesson_assign_id;
        $data['id'] = $lesson_assign_id;
        $this->data['lesson_assign_data'] = $this->lesson_assign_model->ben_get('lesson_assign',$data);
        $this->data['lesson_id'] = $lesson_id;
        $this->data['grades'] = $this->lesson_assign_model->all('grade');
        $this->data['sections'] = $this->lesson_assign_model->all('section');
        $this->data['classes'] = $this->lesson_assign_model->get_all_classes();
        // print_r($this->data['lesson_assign_data']);
        $this->ben_view(__FUNCTION__);
    }

    public function save($lesson_id="",$lesson_assign_id=""){
        
        if($_REQUEST){
            $data['lesson_id'] = $_REQUEST['lesson_id'];
            $data['start_date'] = $_REQUEST['start_date'];
            $data['end_date'] = $_REQUEST['end_date'];
            $data['account_ids'] = $_REQUEST['account_ids'];
            $data['grades'] = $_REQUEST['grades'];
            $data['sections'] = $_REQUEST['sections'];
            $data['account_id'] = $this->session->userdata("id");
            if($lesson_assign_id = $this->lesson_assign_model->assignment($data)){

                $this->ben_notify(array(array("success","Successfully assigned.")));
                $this->ben_redirect("lms/lesson/index/");
            }else{
                echo "wala wala gd ko ya";
            }

        }else{

            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("lms/lesson/index/");

        }
    }

    public function update_save($lesson_id="",$lesson_assign_id=""){

        
        if($_REQUEST){

            $data['id'] = $lesson_assign_id;
            $data['lesson_id'] = $_REQUEST['lesson_id'];
            $data['start_date'] = $_REQUEST['start_date'];
            $data['end_date'] = $_REQUEST['end_date'];
            $data['account_ids'] = $_REQUEST['account_ids'];
            $data['grades'] = $_REQUEST['grades'];
            $data['sections'] = $_REQUEST['sections'];
            $data['account_id'] = $this->session->userdata("id");
            // echo "<pre>";
            // print_r($data);
            // print_r(explode(",", $data['account_ids']));
            

            if($lesson_assign_id = $this->lesson_assign_model->update("lesson_assign",$data)){

                $this->ben_notify(array(array("success","Data was successfully updated.")));
                $this->ben_redirect("lms/lesson/index/");
            }

        }else{

            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("lms/".$this->current_page['controller']."/index/".$lesson_id);

        }
        
    }

}
