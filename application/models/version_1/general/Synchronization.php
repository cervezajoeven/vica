<?php
class Synchronization_model extends BEN_Model {

	public $table = "synchronization";

    public function synchronization(){

        $this->db->from('synchronization');
        $this->db->select('*');
        
        $query = $this->db->get();
        $return = $query->result_array();
        // $this->db->where("id",$return[0]["id"]);
        // $this->db->delete("synchronization");
        print_r($return);
        exit();
        return $return;
    }
	
}