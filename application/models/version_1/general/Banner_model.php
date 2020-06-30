<?php
class Banner_model extends BEN_Model {

	public $table = "banner";

	public function all($table="banner"){
        
        if($table&&is_string($table)){
            $this->db->select("*");
            $this->db->where("deleted","0");
            $this->db->order_by("banner_order","asc");
            $query = $this->db->get($table);
            $return = $query->result_array();
            return $return;
        }else{
            echo "Table name was not declared.";
            exit();
        }
    }
	
}