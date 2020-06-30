<?php
class Section_model extends BEN_Model {

	public $table = "section";

	public function sections(){

        $this->db->from('section');
        $this->db->join('grade', 'grade.id = section.grade_id','left');

        $this->db->select('*,section.id as id');
        // $this->db->where('lesson.deleted',0);
        $this->db->where('section.deleted',0);

        $query = $this->db->get();

        $return = $query->result_array();
        return $return;
    }
	
}
