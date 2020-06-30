<?php
class Optical_model extends BEN_Model {

	public $table = "quiz";

    public function save($data){
        if($data){

            return $this->create_new("quiz",$data);
        }else{
            return false;
        }
    }

    public function get_student_data($account_id=""){
    	$this->db->select("*");
		$this->db->from("classes");
		$this->db->join('section', 'section.id = classes.section_id','left');
		$this->db->join('grade', 'grade.id = section.grade_id','left');

		$this->db->where('classes.account_id',$account_id);
		return $this->db->get()->result_array();
    }
	
}