<?php

class Announcement_model extends BEN_Model {

	public $table = "announcement";

	public function announcement_account_profile(){

		$this->db->select('*');
		$this->db->from('announcement');
		$this->db->join('account as a', 'a.id = announcement.account_id','left');
		$this->db->join('profile as b', 'a.id = b.account_id','left');
		$this->db->where("announcement.deleted",0);
		$query = $this->db->get()->result_array();
		return $query;
	}

}