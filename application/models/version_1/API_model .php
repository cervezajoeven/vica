<?php
class API_model extends BEN_Model {

	public $table = "account";

	function __construct(){
		$this->db->select('*');
	}
	public function api_login_update($data){

		$username = $data['username'];
		$password = $data['password'];
		
		$this->db->where('username', $username)->where('password', $password);
		$query = $this->db->get($this->table);
		$return = $query->result_array()[0];
		if(!empty($return)){
			$current_ip = $this->getIP();
			$current_log_status = $return['logged'];
			$current_activity_status = $return['active'];
			$update = array("id"=>$return['id'],"logged"=>1);
			$update = $this->update($this->table,$update);
			print_r($current_log_status);
			exit;
			
			return $update;
		}else{
			return false;
		}
	}
	public function getIP()
	{
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}

		return $ip;
	}

	public function logout($data){

		$id = $data['id'];
		
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		$return = $query->result_array()[0];
		if(!empty($return)){
			$update = array("id"=>$return['id'],"logged"=>0);
			$update = $this->update($this->table,$update);
			return $update;
		}else{
			return false;
		}
	}

}