<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Notification";
        $this->view_folder = strtolower(get_class());
        
    }

    public function text_blast(){

        $this->data['sections'] = $this->section_model->sections();
        $this->sms_view(__FUNCTION__);
    }

    public function text_blast_send(){
        echo "<pre>";
        $sms_message = $_REQUEST['sms_message'];
        // print_r($_REQUEST);
        $this->db->select("profile.account_id as account_id, profile.guardian_contact_number as guardian_contact_number");
        $this->db->from('classes');
        $this->db->where('classes.deleted', 0);
        $this->db->where('classes.section_id', 0);
        foreach (explode(",", $_REQUEST['recipient']) as $key => $value) {
            $this->db->or_where('classes.section_id', $value);
        }
        
        $this->db->join('profile', 'classes.account_id = profile.account_id');

        $query = $this->db->get();

        $the_accounts = $query->result_array();

        foreach ($the_accounts as $key => $value) {
            $data = array(
                'account_id' => $value['account_id'],
                'sms_message' => $sms_message,
                'sms_number' => $value['guardian_contact_number'],
                'sms_status' => "FOR SENDING",
            );
            
            if($value['guardian_contact_number']){
                $this->account_model->create_new("sms_notification",$data);    
            }
        }

        $this->ben_redirect("general/notification/text_blast");
        
    }
}
