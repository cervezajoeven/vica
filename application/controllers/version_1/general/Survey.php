<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->view_folder = strtolower(get_class());
        $this->load->model("version_".$this->app_version.'/general/'.'survey_model');
    }

    public function index(){
        $this->page_title = "Survey Lists";
        $this->data = $this->survey_model->all_survey();
        
        $this->sms_view(__FUNCTION__);
    }

    public function assigned(){
        $this->page_title = "Assigned";
        $this->data = $this->survey_model->assigned_survey($this->session->userdata('id'));
        $this->sms_view(__FUNCTION__);
    }

    public function respond($id){
        $this->data['survey_id'] = $id;
        $data['id'] = $id;

        $this->data['survey'] = $this->survey_model->get("survey",$data);
        $this->data['account_profile'] = $this->survey_model->ben_where("profile","account_id",$this->session->userdata('id'))[0];
        $this->db->select("*");
        $this->db->where("account_id",$this->data['account_profile']['account_id']);
        $this->db->where("survey_id",$id);
        $this->db->where("response_status",1);
        $query = $this->db->get("survey_sheets");
        $response = $query->result_array();
        if(!empty($response)){
            //echo "<script>alert('Survey has already been responded ".$this->data['account_profile']['account_id']."');window.location.replace('".$this->ben_link('general/survey/assigned')."')</script>";
            
            $this->ben_view_ultraclear(__FUNCTION__);
        }else{
            $this->db->select("*");
            $this->db->where("account_id",$this->data['account_profile']['account_id']);
            $this->db->where("survey_id",$id);
            $new_query = $this->db->get("survey_sheets");
            $new_response = $new_query->result_array();
            if(empty($new_response)){
                $survey_data['survey_id'] = $id;
                $survey_data['account_id'] = $this->session->userdata('id');
                $this->survey_model->create_new("survey_sheets",$survey_data);
                
            }
            $this->ben_view_ultraclear(__FUNCTION__);
        }
        
    }

    public function save(){
        
        $data['survey_name'] = $_REQUEST['survey_name'];
        $data['account_id'] = $this->session->userdata('id');
        $survey_id = $this->survey_model->create_new("survey",$data);

        $this->ben_redirect("general/survey/edit/".$survey_id);
    }

    public function edit($id){
        $this->data['survey_id'] = $id;
        $data['id'] = $id;
        $this->data['survey'] = $this->survey_model->get("survey",$data);
        $this->ben_view_ultraclear(__FUNCTION__);
    }

    public function update(){
        $data['id'] = $_REQUEST['id'];
        $data['sheet'] = $_REQUEST['sheet'];
        

        $this->survey_model->update("survey",$data);
    }

    public function update_survey_sheet(){
        $data['survey_id'] = $_REQUEST['survey_id'];
        $data['respond'] = $_REQUEST['respond'];
        $data['account_id'] = $_REQUEST['account_id'];
        $data['response_status'] = 1;
        $this->db->select("*");
        $this->db->where("survey_id", $data["survey_id"]);
        $this->db->where("account_id", $data["account_id"]);
        $data['date_updated'] = date("Y-m-d H:i:s");
        $this->db->update("survey_sheets", $data);
    }

    public function upload($id){
        
        // print_r(strpos($_FILES['survey_form']['type'], "pdf"));

        if(strpos($_FILES['survey_form']['type'], "pdf")!==0){
            $tmp_name = $_FILES['survey_form']['tmp_name'];
            $file_name = $this->survey_model->id_generator("survey").".pdf";
            $dest = FCPATH."resources/uploads/survey/".$id."/".$file_name;
            if(!is_dir(FCPATH."resources/uploads/survey/".$id)){
                mkdir(FCPATH."resources/uploads/survey/".$id);
            }
            
            if(move_uploaded_file($tmp_name, $dest)){
                $data['id'] = $id;
                $data['survey_file'] = $file_name;
                $this->survey_model->update("survey",$data);
                echo "<script>alert('Successfully uploaded');window.location.replace('".$this->ben_link('general/survey/edit/'.$id)."')</script>";
            }
        }else{
            echo "<script>alert('Only PDF files are allowed');window.location.replace('".$this->ben_link('general/survey/edit/'.$id)."')</script>";
        }
        
    }

    public function delete($id){

        if($this->survey_model->delete_survey("survey",$id)){
            $this->ben_redirect("general/survey/index");
        }
    }
}
