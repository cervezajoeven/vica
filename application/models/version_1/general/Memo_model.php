<?php
class Memo_model extends BEN_Model {

	public $table = "memo";
	
	public function memo_current_year(){
		$this->db->select("*");
        $this->db->where("deleted","0");
        $this->db->where("YEAR(date_created)","YEAR(CURDATE())");
        $this->db->order_by("id","desc");
        $query = $this->db->get("memo");
        $return = $query->result_array();
        return $return;
	}

	public function memo_current_month($month){

		$this->db->select("*");
        $this->db->where("deleted","0");
        $this->db->where("YEAR(date_created)","YEAR(CURDATE())");
        $this->db->where("MONTH(date_created)",9);
        $this->db->order_by("id","desc");
        $query = $this->db->get("memo");
        $return = $query->result_array();
        return $return;
	}
}