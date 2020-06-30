<?php
class Crud_model extends BEN_Model {

	public $table = "crud";

	public function accesses($data){

		$this->db->select('*');

		$account_type_id = $data['account_type_id'];
		
		$this->db->where('account_type_id', $account_type_id);
		$this->db->where('deleted', 0);
		$this->db->where('status', 1);
		$query = $this->db->get($this->table);
		$return = $query->result_array();

		if(!empty($return)){
			$return_array = array();
			foreach ($return as $return_key => $return_value) {
				$return_array[$return_key] = $return_value['module']."/".$return_value['controller']."/".$return_value['action_function'];
			}
			return $return_array;

		}else{
			return false;
		}
	}

	public function accountType_company(){

        $this->db->select('*');
		$this->db->from('account_type');
		$this->db->join('company', 'account_type.company_id = company.id');
		$query = $this->db->get();
        $return = $query->result_array();
        return $return;    

	}

}