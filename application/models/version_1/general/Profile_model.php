<?php
class Profile_model extends BEN_Model {

	public $table = "profile";

	public function check_account_id($account_id=""){
		if($account_id&&is_string($account_id)){
			$this->db->select("account_id");
			$this->db->from("profile");
			$this->db->where("account_id",$account_id);
			$data = $this->db->get();
			$return_data = $data->result_array();

			print_r($return_data);
			exit;
		}else{
			echo "Account id was not provided!";
			exit;
		}
	}

	public function get_profile_by_account_id($account_id=""){

		$this->db->select("*");
		$this->db->from("profile");
		$this->db->where("account_id",$account_id);
		$data = $this->db->get();
		$return_data = $data->result_array();
		return $return_data;
	}

	public function get_student_complete_information($account_id=""){

		$school_status = $this->school_status_model->get_status();
		$schoolyear = $school_status['schoolyear'];
		$semester = $school_status['semester'];

		$this->db->select("*");
		$this->db->from("account");
		$this->db->join('profile', 'profile.account_id = account.id','left');
		$this->db->join('classes', 'classes.account_id = account.id','left');
		$this->db->join('section', 'classes.section_id = section.id','left');
		$this->db->join('grade', 'section.grade_id = grade.id','left');
		$this->db->where("account.id",$account_id);
		$this->db->where("classes.schoolyear",$schoolyear);
		$this->db->like("classes.semesters",$semester);
		$data = $this->db->get();
		$return_data = $data->result_array()[0];

		return $return_data;
	}

}