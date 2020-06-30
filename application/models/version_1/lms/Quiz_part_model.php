<?php
class Quiz_part_model extends BEN_Model {

	public $table = "quiz_part";

	public function quiz_order_filter($quiz_id=""){
		$this->db->select("*");
		$this->db->where("deleted","0");
		$this->db->where("status","1");
		$this->db->where("quiz_id",$quiz_id)->order_by('quiz_order');
		$query = $this->db->get('quiz_part')->result_array();
        return $query;
	}
	public function reorder($direction="",$quiz_part_id="",$quiz_id=""){

		$this->db->select("*");
		$this->db->where("id",$quiz_part_id);
		$selected_data = $this->db->get('quiz_part')->result_array()[0];
		$this->db->select("*");

		if($direction=="down"){
			
			$this->db->where("quiz_id",$quiz_id)->where('quiz_order',$selected_data['quiz_order']+1);
			
		}else{
			$this->db->where("quiz_id",$quiz_id)->where('quiz_order',$selected_data['quiz_order']-1);
		}

		$target_data = $this->db->get('quiz_part')->result_array()[0];

		if($target_data){
			$old_quiz_order = $selected_data['quiz_order'];
			$selected_data['quiz_order'] = $target_data['quiz_order'];
			$target_data['quiz_order'] = $old_quiz_order;

			$this->update('quiz_part',$selected_data);
			$this->update('quiz_part',$target_data);

			return true;
		}else{
			return false;
		}
		
		// $interchanged = $this->db->get('quiz_part')->result_array()[0];
	}

	public function interchange($data=array()){
		
		echo "<pre>";
		$this->db->select("*");
		$this->db->where("id",$data['selected_quiz_part_id']);
		$selected_data = $this->db->get('quiz_part')->result_array()[0];
		$this->db->select("*");
		$this->db->where("id",$data['target_quiz_part_id']);
		$target_data = $this->db->get('quiz_part')->result_array()[0];

		$selected_data['quiz_order'] = $target_data['quiz_order'];

		$some_data['quiz_id'] =  $data['quiz_id'];
		$sorted_order = $this->get_all_part_by_quiz($data);
		$new_sort_order = $sorted_order;

		foreach ($sorted_order as $sorted_order_key => $sorted_order_value) {
			if($sorted_order_value['id'] == $selected_data['id']){
				$sorted_order[$sorted_order_key]['quiz_order'] = $target_data['quiz_order'];
			}else if($sorted_order_value['quiz_order']<=$target_data['quiz_order']){
				$sorted_order[$sorted_order_key]['quiz_order'] = $sorted_order_value['quiz_order']-1;
			}else{
				unset($sorted_order[$sorted_order_key]);
			}
			
		}
		foreach ($sorted_order as $new_sorted_order_key => $new_sorted_order_value) {
			$this->db->where("id",$sorted_order[$new_sorted_order_key]['id']);
			$this->db->update('quiz_part',$sorted_order[$new_sorted_order_key]);
		}

		print_r($sorted_order);

		return true;
	}

	public function get_all_part_by_quiz($data=array()){

		$this->db->select("*");
		$this->db->where("quiz_id",$data['quiz_id'])->order_by("quiz_order","asc");
		$all_parts = $this->db->get('quiz_part')->result_array();
		return $all_parts;
	}

	public function order_interchange($data=array(),$reorder=array()){
		echo "<pre>";
		$sorted_order = $this->get_all_part_by_quiz($data);
		$new_sort_order = $sorted_order;

		foreach($sorted_order as $sorted_order_key => $sorted_order_value){
			if($sorted_order_value['id']==$data['quiz_order']){
				$array_key = $sorted_order_key;
				$return_data = $sorted_order_value['quiz_order'];
			}
		}
		foreach($sorted_order as $sorted_order_key => $sorted_order_value){
			if($sorted_order_key<$array_key){
				unset($new_sort_order[$sorted_order_key]);
			}else{
				$new_sort_order[$sorted_order_key]['quiz_order'] = $new_sort_order[$sorted_order_key]['quiz_order']+1;
				$this->db->where("id",$new_sort_order[$sorted_order_key]['id']);
				$this->db->update('quiz_part',$new_sort_order[$sorted_order_key]);
			}	
		}
		
        return $return_data;
	}

	public function change_label($data=""){
		$this->db->select("*");
		$this->db->where("id",$data['id']);
		if($this->db->update('quiz_part',$data)){
			return true;
		}else{
			return false;
		}
	}

	public function get_maximum_order_by_quiz_id($quiz_id=""){
		$this->db->select('MAX(quiz_order)');
		$max_quiz_order = $this->db->where("quiz_id",$quiz_id)->get('quiz_part')->result_array()[0];

		return $max_quiz_order['MAX(quiz_order)']+1;
	}

	public function all_questions_by_quiz_part_id($quiz_part_id=""){
		$this->db->select('*',FALSE);
		$questions = $this->db->where("quiz_part_id",$quiz_part_id)->get('question')->result_array();
		return $questions;
	}
	
}