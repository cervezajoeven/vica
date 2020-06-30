<?php
class Account_model extends BEN_Model {

	public $table = "account";

	public function login($data){

		$this->db->select('*');

		$username = $data['username'];
		$password = $data['password'];
		
		$this->db->where('username', $username)
				->where('password', md5($password))
				->where('status', 1)
				->where('deleted', 0)
				;
		$query = $this->db->get($this->table);
		$return = $query->result_array()[0];

		if(!empty($return)){
			$current_ip = $this->getIP();
			$current_log_status = $return['logged'];
			$current_activity_status = $return['active'];
			$update = array("id"=>$return['id'],"logged"=>1);

			$update = $this->update($this->table,$update);
			
			return $update;
		}else{
			return false;
		}

	}

	public function get_all_grades_and_section(){
		$this->db->select("*,section.id as id");
		$this->db->from("section");
		$this->db->join('grade', 'grade.id = section.grade_id','left');
		$this->db->order_by('section_name','asc');
		return $this->db->get()->result_array();
	}

	public function account_information($data=array()){
		$this->db->select('*');
		$this->db->from('account_type');
		$company_data = $this->db->where('id',$data['account_type_id'])->get()->result_array()[0];
		$data['company_id'] = $company_data['company_id'];
		$data['account_type_name'] = $company_data['account_type_name'];
		$this->db->select('*');
		$this->db->from('company');
		$company = $this->db->where('id',$data['company_id'])->get()->result_array()[0];
		$data['company_name'] = $company['company_name'];
		$this->db->select('*');
		$this->db->from('profile');
		$profile_data = $this->db->where('account_id',$data['id'])->get()->result_array()[0];
		$data['first_name'] = $profile_data['first_name'];
		$data['middle_name'] = $profile_data['middle_name'];
		$data['last_name'] = $profile_data['last_name'];
		$data['address'] = $profile_data['address'];
		$data['email_address'] = $profile_data['email_address'];
		$data['contact_number'] = $profile_data['contact_number'];
		return $data;
	}

	public function reset($id=""){
		$table="account";
		$this->db->where("id", $id);
		$data = $this->db->get($table)->result_array()[0];
		// $data['password'] = md5($data['username']);
//        print_r($data);
//        exit();
        if($data['account_type_id']==5){
            $data['password'] = md5("student");
            
        }elseif($data['account_type_id']==4){
            $data['password'] = md5("teacher");
        }else{
            $data['password'] = md5("admin");
        }
        $data['initial_login'] = 0;

		$this->db->where("id", $id);
        if($this->db->update($table, $data)){
			$this->db->where("id", $id);
        	$data = $this->db->get($table)->result_array()[0];
        	return $data;
        }else{
        	return false;
        }
	}

	public function confirm_old_password($old="",$new=""){
		
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

	public function accounts(){

		$this->db->select('account.id as id,account.username,first_name,last_name,logged');
		$this->db->from('account');
		$this->db->join('account_type','account_type.id = account.account_type_id','left');
		$this->db->join('profile','profile.account_id = account.id','left');
		$this->db->join('classes','classes.account_id = account.id','left');
		$this->db->join('section','section.id = classes.section_id','left');
		$this->db->join('grade','grade.id = section.grade_id','left');
		$this->db->where('account.deleted', 0);
		$this->db->where('account.account_type_id!=','3');
		$query = $this->db->get();
		$return = $query->result_array();

		// print_r($return);
		// exit;
		return $return;


	}

}