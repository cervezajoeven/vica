<?php
class School_status_model extends BEN_Model {

	public $table = "school_status";

	public function get_company_status($company_id=""){

		$this->db->select("*");
		$this->db->where("company_owner",$company_id);
		$return_data = $this->db->get($this->table)->result_array();
		return $return_data;

	}

	public function get_status(){

		$company_id = $this->session->userdata('company_id');
		$this->db->select("*");
		$return_data = $this->db->get($this->table)->result_array()[0];
		return $return_data;

	}

	public function get_history(){
		$company_id = $this->session->userdata('company_id');
		$this->db->select("*");
		$this->db->order_by("history_order","asc");
		$return_data = $this->db->get("school_history")->result_array();
		return $return_data;
	}

}