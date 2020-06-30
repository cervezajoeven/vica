<?php
class Grading_model extends BEN_Model {

	public $table = "sms_grades";

	public function get_student_tree(){
		$this->db->select("
			classes.section_id,
			classes.account_id,
			section.grade_id,
			profile.first_name,
			profile.last_name,
			profile.gender,
			grade.grade_name,
			section.section_name,
		");
		$this->db->from("classes");
		$this->db->join('profile', 'profile.account_id = classes.account_id','left');
		$this->db->join('section', 'section.id = classes.section_id','left');
		$this->db->join('grade', 'grade.id = section.grade_id','left');
		return $this->db->get()->result_array();
	}

	public function grades_and_section(){
		$this->db->select("
			section.id,
			section.section_name,
			grade.grade_name
		");
		$this->db->from("section");
		$this->db->join('grade', 'section.grade_id = grade.grade_name','left');
		return $this->db->get()->result_array();
	}
	public function grade_levels(){
		$this->db->select("id,grade_name");
		$this->db->from("grade");
		return $this->db->get()->result_array();
	}

	public function get_students($schoolyear="",$semester="",$grade="",$section=""){
		$schoolyear = $this->ben_where2("schoolyear","schoolyear",$schoolyear);
		$semester = $this->ben_where2("semester","semester_order",$semester);
		$grade = $this->ben_where2("grade","grade_name",$grade);
		$section = $this->ben_where2("section","section_name",$section);
		$this->db->select("
			classes.section_id,
			classes.account_id,
			classes.schoolyear_id,
			section.grade_id,
			profile.first_name,
			profile.last_name,
			profile.gender,
			grade.grade_name,
			section.section_name,
		");
		$this->db->from("classes");
		$this->db->join('profile', 'profile.account_id = classes.account_id','left');
		$this->db->join('section', 'section.id = classes.section_id','left');
		$this->db->join('grade', 'grade.id = section.grade_id','left');
		$this->db->where('schoolyear_id',$schoolyear['id']);
		$this->db->where('classes.section_id',$section['id']);
		return $this->db->get()->result_array();
	}

	public function filter_by_section($data=array()){
		$filtered_students = array();
		foreach ($data as $data_key => $data_value) {
			$filtered_students[$data_value['grade_name']][$data_value['section_name']][$data_value['account_id']] = $data_value;
		}
		return $filtered_students;
	}

	public function get_students_by_section($section=""){
		
		$this->db->select("*");
		$this->db->from("classes");
		$this->db->where("section_id",$section);
		$section = $this->db->get()->result_array();
		return $section;
	}

	public function get_student_grades($schoolyear="",$semester="",$grade="",$section="",$gender="",$account_id=""){
		$this->db->select("*");
		$this->db->from("sms_grades");
		$this->db->where("schoolyear",$schoolyear);
		// $this->db->where("semester",$semester);
		$this->db->where("grade",$grade);
		$this->db->where("section",$section);
		// $this->db->where("gender",$gender);
		$grades = $this->db->get()->result_array();
		$student_number = $this->ben_where2("account","id",$account_id);
		$student_profile = $this->ben_where2("profile","account_id",$account_id);
		// echo "<pre>";
		
		// print_r($grades);
		$form_138_grade = array();
		foreach ($grades as $grades_key => $grades_value) {
			
			$the_grades = json_decode($grades_value['grades']);
			// print_r($grades_value);
			foreach ($the_grades as $the_grades_key => $the_grades_value) {
				
				if($the_grades_value->student_number==$student_number['username']){
					$form_138_grade['grade'] = $grades_value['grade'];
					$form_138_grade['gender'] = $grades_value['gender'];
					$form_138_grade['section'] = $grades_value['section'];
					$form_138_grade['schoolyear'] = $grades_value['schoolyear'];
					$form_138_grade['student_name'] = $student_profile['last_name'].", ".$student_profile['first_name'];
					$form_138_grade['last_name'] = $student_profile['last_name'];
					$form_138_grade['first_name'] = $student_profile['first_name'];
					$form_138_grade['lrn'] = "";
					$form_138_grade['birthday'] = "";
					$form_138_grade['student_number'] = $the_grades_value->student_number;
					$form_138_grade['grades'][$grades_value['semester']][$grades_value['subject']] = $the_grades_value->grade;
				}
				
			}
		}
		// print_r($form_138_grade);

		// exit();

		if($grades){
			return $form_138_grade;
		}else{
			return false;
		}
		
	}
}