<?php
class Attendance_model extends BEN_Model {

    public $table = "attendance";
    
    public function log($account_id, $start_date="", $end_date="") {
        $this->db->select("DATE_FORMAT(date_created, '%m/%d/%Y') as log_date, DATE_FORMAT(date_created, '%h:%i %p') as log_time, IF(entry = 'ENTER', 'IN', 'OUT') as log_type");
        $this->db->from('attendance');
        $this->db->where('account_id', $account_id);
        // $this->db->where('date_created >=', $start_date);
        // $this->db->where('date_created <=', $end_date);
        
        if ($start_date != "" && $start_date != "0") {
            $this->db->where('date_created >=', $start_date . ' 12:00:00');
            $this->db->where('date_created <=', $end_date  . ' 23:59:59');
        }

        $this->db->order_by('date_created','asc');
        $this->db->order_by('entry','desc');
        
        $result = $this->db->get()->result_array();
        //print_r($this->db->last_query()); 

        return $result;
    }

    public function get_names($name) {
        // $this->db->select("account_id AS id, CONCAT(first_name, ' ', IFNULL(last_name, '')) AS full_name");
        // $this->db->from("profile");
        // $this->db->where("first_name like '%".$search."%' or last_name like '%".$search."%'");
        // $this->db->order_by('first_name, last_name','asc');

        $this->db->select("*");
        $this->db->from("(SELECT account_id AS id, CONCAT(first_name, ' ', IFNULL(last_name, '')) AS full_name from profile) AS USERLIST");
        if ($name != "")
            $this->db->where("LOWER(full_name) like '".strtolower(urldecode($name))."%'");
        $this->db->order_by("full_name", "asc");

        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;

        return $result;
    }

    public function get_students($name) {
        // $this->db->select("account_id AS id, CONCAT(first_name, ' ', IFNULL(last_name, '')) AS full_name");
        // $this->db->from("profile");
        // $this->db->where("first_name like '%".$search."%' or last_name like '%".$search."%'");
        // $this->db->order_by('first_name, last_name','asc');

        $this->db->select("USERLIST.id,USERLIST.full_name");
        $this->db->from("(SELECT profile.account_id AS id, CONCAT(profile.first_name, ' ', IFNULL(profile.last_name, '')) AS full_name from profile) AS USERLIST");
        $this->db->join("account","USERLIST.id = account.id");
        if ($name != "")
            $this->db->where("LOWER(full_name) like '".strtolower(urldecode($name))."%'");
            $this->db->where("account.account_type_id",5);
        $this->db->order_by("full_name", "asc");

        $query = $this->db->get();
        $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;

        return $result;
    }
}