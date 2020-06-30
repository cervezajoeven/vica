<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends BEN_General {

    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "sms";
        $this->page_title = "Attendance";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'//sms//'.'attendance_model');

    }

    public function log($account_id=15) {
        $this->toggled = array("attendance","attendance_log");
        
        if($account_id != 0) {            
            $this->data['all_data'] = $this->attendance_model->log($account_id);
        }
        
        // echo "<pre>";
        // print_r($this->data['all_data']);
        // exit;
        $this->sms_view(__FUNCTION__);
    }
    public function log_ajax($account_id, $start_date="", $end_date="") {
        // $account_id = $_POST['id']; 
        // $start_date = $_POST['start'];
        // $end_date = $_POST['end'];

        // $account_id = $this->uri->segment('5');
        // $start_date = $this->uri->segment('6');
        // $end_date = $this->uri->segment('7');

        //echo($start_date . "==" . $end_date);

        $logs = $this->attendance_model->log($account_id, $start_date, $end_date);
        $data = array();

        foreach($logs as $log) {
            $row = array($log['log_date'], $log['log_time'], $log['log_type']);
            array_push($data, $row);
        }

        echo json_encode(array("data"=>$data));
    }
   
    public function autocomplete_user() {
        $returnData = array();
        $results = array('error' => false, 'data' => '');
        // echo "<pre>";
        
        $name = $_POST['search'];
        if($this->session->userdata('account_type_id') == 4){
            $users = $this->attendance_model->get_students($name);
        }else{
            $users = $this->attendance_model->get_names($name);
        }    
        // print_r($users);
        // exit;

        if(empty($name)) 
            $results['error'] = true;
        else {
            // Generate array
            if(!empty($users)){
                foreach ($users as $row){
                    // $data['id'] = $row['id'];
                    // $data['full_name'] = $row['full_name'];
                    // array_push($returnData, $data);
                    //$results['data'] .= "<li class='list-gpfrm-list' data-accountid='".$row['id']."' data-fullname='".$row['full_name']."'>".$row['full_name'];
                    $returnData[] = array("value"=>$row['id'],"label"=>$row['full_name']);
                }
            }
        }       
        
        // Return results as json encoded array
        echo json_encode($returnData); die;
    }
}
