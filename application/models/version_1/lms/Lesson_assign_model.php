<?php
class Lesson_assign_model extends BEN_Model {

	public $table = "lesson_assign";

	public function get_all_classes(){

		$company_id = $this->session->userdata('company_id');
		$this->db->select('*');
		$this->db->from('school_status');
		$this->db->where('company_owner',$company_id);
		$school_status = $this->db->get()->result_array()[0];
		
		$this->db->select('*');
		$this->db->from('classes');
		$this->db->join('account as a', 'a.id = classes.account_id','left');
		$this->db->join('profile as b', 'a.id = b.account_id','left');
		
		$query = $this->db->where('schoolyear_id',$school_status['schoolyear_id'])->get()->result_array();
		return $query;
	}

	public function get_schedules($lesson_id=""){

		$company_id = $this->session->userdata('company_id');
		
		$this->db->from('lesson_assign');
		$this->db->join('lesson as a', 'lesson_assign.lesson_id = a.id','left');
		$this->db->select('a.lesson_name as lesson_name,lesson_assign.*');
		$this->db->where('lesson_id',$lesson_id);

		$query = $this->db->get()->result_array();

		return $query;
	}

	public function get_student_schedule($account_id=""){

		$company_id = $this->session->userdata('company_id');
		$account_id = $this->session->userdata('id');
		$this->db->from('lesson_assign');
		$this->db->join('lesson as a', 'lesson_assign.lesson_id = a.id','left');
		$this->db->join('profile as b', 'lesson_assign.account_id = b.account_id','left');
		
		$this->db->select('
			lesson_assign.*,
			lesson_assign.date_created as date_assigned,
			REPLACE(DATE_FORMAT(lesson_assign.end_date, "%M %e, %Y"),"\`","") as availability,
			a.lesson_name as lesson_name,
			b.first_name as first_name,
			b.last_name as last_name,
			lesson_assign.account_id as account_id,
			CONCAT(b.first_name," ",b.last_name) as assigned_by,
			a.id as id
		');
		$date_now = date("Y-m-d H:i:s");
		$this->db->where('start_date <=', $date_now);
		$this->db->where('end_date >=', $date_now);
		// $this->db->where('DATE_ADD(end_date,INTERVAL 1 DAY) >=', $date_now);
		$this->db->where("FIND_IN_SET(".$account_id.", lesson_assign.account_ids) !=", 0);
		$this->db->where('lesson_assign.deleted', 0);

		$query = $this->db->get()->result_array();

		return $query;
	}

	public function assignment($data=""){

		if($this->lesson_assign_model->create_new("lesson_assign",$data)){
			return true;
		}
		return false;
		
	}

	public function get_lesson_assign_data_by_lesson_id($lesson_id=""){

		$company_id = $this->session->userdata('company_id');
		
		$this->db->from('lesson_assign');
		$this->db->where('lesson_id', $lesson_id);

		$query = $this->db->get()->result_array();
		if($query){
			return $query[0];
		}else{
			return array();
		}
		
	}


}