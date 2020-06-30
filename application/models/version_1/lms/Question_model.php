<?php
class Question_model extends BEN_Model {

	public $table = "question";

	public function get_options_by_question_id($question_id=""){
		$this->db->select("*");
		$this->db->where("question_id",$question_id);
		$data = $this->db->get("options")->result_array();
		return $data;
	}
	public function get_options_by_question_id_optimized($question_id="",$select="*"){
		$this->db->select($select);
		$this->db->where("question_id",$question_id);
		$data = $this->db->get("options")->result_array();
		return $data;
	}
	public function get_options_by_question_id_with_question_data($question_id="",$select="*"){
		$this->db->from('options');
		$this->db->join('question as a', 'a.id = options.question_id','left');
		$this->db->where("question_id",$question_id);
		$this->db->select($select);
		$data = $this->db->get()->result_array();
		return $data;
	}

	public function get_questions_by_quiz_part_id($quiz_part_id=""){
		$this->db->select("*");
		$this->db->where("quiz_part_id",$quiz_part_id);
		$data = $this->db->get("question")->result_array();
		return $data;
	}

	public function question_order($quiz_part_id=""){
		$this->db->select('MAX(question_order)');
		$max_question_order = $this->db->where("quiz_part_id",$quiz_part_id)->get('quiz_question')->result_array()[0];
		if($max_question_order){
			$max_question_order = $max_question_order['MAX(question_order)']+1;
		}else{

			$max_question_order['MAX(question_order)'] = 1;
		}
		
		return $max_question_order;
	}

	public function question_delete($question_id=""){
		$this->db->where("id", $question_id);
		if($this->db->delete('question')){
            return true;
        }else{
            return false;
        }
		return true;
	}


	public function save_question_data($question_type="",$data=array()){

		$question_data['question'] = $data['question'];
		$question_data['account_id'] = $this->session->userdata('id');
		$question_data['question_type'] = $question_type;
		$question_data['quiz_part_id'] = $data['quiz_part_id'];

		if($question_id = $this->question_model->create_unescaped('question',$question_data)){
			return $question_id;
		}else{
			return false;
		}

	}

	public function update_question_data($question_type="",$data=array()){
		$question_data['id'] = $data['id'];
		$question_data['question'] = $data['question'];
		$question_data['account_id'] = $this->session->userdata('id');
		$question_data['question_type'] = $question_type;
		$question_data['quiz_part_id'] = $data['quiz_part_id'];
		if($question_id = $this->question_model->update('question',$question_data)){
			return $question_id;
		}else{
			return false;
		}

	}

	public function save_quiz_question_data($question_id="",$data=array()){
		$quiz_question_data['quiz_part_id'] = $data['quiz_part_id'];
		$quiz_question_data['quiz_id'] = $data['quiz_id'];
		$quiz_question_data['question_id'] = $question_id;
		$quiz_question_data['question_order'] = $this->question_order($data['quiz_part_id']);
		if($this->question_model->create_unescaped('quiz_question',$quiz_question_data)){
			return true;
		}else{
			echo "Essay quiz questions was not successfully saved";
			exit;
		}
	}

	public function update_quiz_question_data($question_id="",$data=array()){
		$quiz_question_data['quiz_part_id'] = $data['quiz_part_id'];
		$quiz_question_data['quiz_id'] = $data['quiz_id'];
		$quiz_question_data['question_id'] = $question_id;
		$quiz_question_data['question_order'] = $this->question_order($data['quiz_part_id']);
		if($this->question_model->create_unescaped('quiz_question',$quiz_question_data)){
			return true;
		}else{
			echo "Essay quiz questions was not successfully saved";
			exit;
		}
	}

	public function save_essay($data=array()){
		
		if($question_id = $this->save_question_data("essay",$data)){

			$options_data['question_id'] = $question_id;
			$options_data['points'] = $data['points'];
			if($this->question_model->create_unescaped('options',$options_data)){
				
				if($this->save_quiz_question_data($question_id,$data)){
					return true;
				}else{
					echo "Essay quiz questions was not successfully saved";
					exit;
				}

			}else{
				echo "Essay options was not successfully saved";
				exit;
			}
		}else{
			echo "Essay was not successfully saved";
			exit;
		}
		
	}

	public function update_essay($data=array()){
		
		if($this->update_question_data("essay",$data)){

			$options_data['id'] = $this->question_model->ben_where('options','question_id',$data['id'])[0]['id'];
			if($this->question_model->delete('options',$options_data)){
				$options_data['question_id'] = $data['id'];
				$options_data['points'] = $data['points'];
				if($this->question_model->create_unescaped('options',$options_data)){
					return true;
				}else{
					echo "Essay options was not successfully saved";
					exit;
				}
			}else{
				print_r("unsuccessfully deleted");
				exit();
			}
			
		}else{
			echo "Essay was not successfully saved";
			exit;
		}
		
	}

	public function update_identification($data=array()){
		$data = filter_data($data);
		if(array_key_exists('case_sensitive', $data)){
			$data['case_sensitive'] = true;
		}else{
			$data['case_sensitive'] = false;
		}
		if(array_key_exists('space_sensitive', $data)){
			$data['space_sensitive'] = true;
		}else{
			$data['space_sensitive'] = false;
		}

		if($this->update_question_data("identification",$data)){

			$options_data['id'] = $this->question_model->ben_where('options','question_id',$data['id'])[0]['id'];
			
			if($this->question_model->delete('options',$options_data)){
				$options_data['question_id'] = $data['id'];
				$options_data['answer'] = implode("||",$data['answer']);
				$options_data['points'] = $data['points'];
				$options_data['case_sensitive'] = $data['case_sensitive'];
				$options_data['space_sensitive'] = $data['space_sensitive'];
				
				if($this->question_model->create_unescaped('options',$options_data)){
					
					// print_r($options_data);
					// print_r($data);
					// exit();
					return true;
				}else{
					echo "Identification options was not successfully saved";
					exit;
				}
			}else{
				print_r("unsuccessfully deleted");
				exit();
			}
			
		}else{
			echo "Essay was not successfully saved";
			exit;
		}
		
	}

	public function update_multiple_choice($data=array()){

		$correct = array();
		foreach ($data['answer'] as $correct_key => $correct_value) {
			
			if($correct_key==$data['correct']){
				$correct[$correct_key] = 1;
			}else{
				$correct[$correct_key] = 0;
			}
			
		}
		
		if($this->update_question_data("multiple_choice",$data)){

			$options_data['id'] = $this->question_model->ben_where('options','question_id',$data['id'])[0]['id'];
			if($this->question_model->delete('options',$options_data)){

				$options_data['question_id'] = $data['id'];
				$options_data['points'] = $data['points'];
				$options_data['answer'] = implode("||",$data['answer']);
				$options_data['correct'] = implode(",",$correct);

				if($this->question_model->create_unescaped('options',$options_data)){	
					return true;
				}else{
					echo "Multiple choice options was not successfully saved";
					exit;
				}
			}else{
				print_r("unsuccessfully deleted");
				exit();
			}
			
			
			

			
			
		}else{
			echo "Multiple choice was not successfully saved";
			exit;
		}
		
	}

	public function update_true_or_false($data=array()){

		$correct = array();
		foreach ($data['answer'] as $correct_key => $correct_value) {
			
			if($correct_key==$data['correct']){
				$correct[$correct_key] = 1;
			}else{
				$correct[$correct_key] = 0;
			}
			
		}

		if($this->update_question_data("true_or_false",$data)){

			$options_data['id'] = $this->question_model->ben_where('options','question_id',$data['id'])[0]['id'];
			if($this->question_model->delete('options',$options_data)){

				$options_data['question_id'] = $data['id'];
				$options_data['points'] = $data['points'];
				$options_data['answer'] = implode("||",$data['answer']);
				$options_data['correct'] = implode(",",$correct);

				if($this->question_model->create_unescaped('options',$options_data)){	
					return true;
				}else{
					echo "Multiple choice options was not successfully saved";
					exit;
				}
			}else{
				print_r("unsuccessfully deleted");
				exit();
			}
			
			
			

			
			
		}else{
			echo "Multiple choice was not successfully saved";
			exit;
		}
		
	}

	public function update_multiple_choice_multiple_answer($data=array()){

		$correct = array();
		foreach ($data['answer'] as $correct_key => $correct_value) {
			
			if($data['correct'][$correct_key] == "on"){
				$correct[$correct_key] = 1;
			}else{
				$correct[$correct_key] = 0;
			}
			
		}
		
		if($this->update_question_data("multiple_choice_multiple_answer",$data)){

			$options_data['id'] = $this->question_model->ben_where('options','question_id',$data['id'])[0]['id'];
			if($this->question_model->delete('options',$options_data)){

				$options_data['question_id'] = $data['id'];
				$options_data['points'] = $data['points'];
				$options_data['answer'] = implode("||",$data['answer']);
				$options_data['correct'] = implode(",",$correct);

				if($this->question_model->create_unescaped('options',$options_data)){	
					return true;
				}else{
					echo "Multiple choice options was not successfully saved";
					exit;
				}
			}else{
				print_r("unsuccessfully deleted");
				exit();
			}
			
		}else{
			echo "Multiple choice was not successfully saved";
			exit;
		}
		
	}

	public function update_matching_type($data=array()){

		
		if($this->update_question_data("matching_type",$data)){

			$options_data['id'] = $this->question_model->ben_where('options','question_id',$data['id'])[0]['id'];
			if($this->question_model->delete('options',$options_data)){

				$options_data['question_id'] = $data['id'];
				$options_data['points'] = $data['points'];
				$options_data['answer'] = implode("||",$data['answer']);
				$options_data['question_match'] = implode("||",$data['question_match']);

				if($this->question_model->create_unescaped('options',$options_data)){	
					return true;
				}else{
					echo "Matching Type options was not successfully saved";
					exit;
				}
			}else{
				print_r("unsuccessfully deleted");
				exit();
			}
			
		}else{
			echo "Multiple choice was not successfully saved";
			exit;
		}
		
	}

	public function save_identification($data=array()){
		$data = filter_data($data);
		
		if(array_key_exists('case_sensitive', $data)){
			$data['case_sensitive'] = true;
		}else{
			$data['case_sensitive'] = false;
		}
		if(array_key_exists('space_sensitive', $data)){
			$data['space_sensitive'] = true;
		}else{
			$data['space_sensitive'] = false;
		}

		if($question_id = $this->save_question_data("identification",$data)){
			
			$options_data['question_id'] = $question_id;
			$options_data['points'] = $data['points'];
			$options_data['answer'] = implode("||",$data['answer']);
			$options_data['case_sensitive'] = $data['case_sensitive'];
			$options_data['space_sensitive'] = $data['space_sensitive'];
			
			if($this->question_model->create_unescaped('options',$options_data)){
				
				if($this->save_quiz_question_data($question_id,$data)){
					return true;
				}else{
					echo "Essay quiz questions was not successfully saved";
					exit;
				}

			}else{
				echo "Essay options was not successfully saved";
				exit;
			}
		}else{
			echo "Essay was not successfully saved";
			exit;
		}
		
	}

	public function save_fill_in_the_blanks($data=array()){
		$data = filter_data($data);
		print_r($data);
		exit();
		// if(array_key_exists('case_sensitive', $data)){
		// 	$data['case_sensitive'] = true;
		// }else{
		// 	$data['case_sensitive'] = false;
		// }
		// if(array_key_exists('space_sensitive', $data)){
		// 	$data['space_sensitive'] = true;
		// }else{
		// 	$data['space_sensitive'] = false;
		// }
		// if($question_id = $this->save_question_data("identification",$data)){

		// 	$options_data['question_id'] = $question_id;
		// 	$options_data['points'] = $data['points'];
		// 	$options_data['answer'] = implode("||",$data['answer']);
		// 	$options_data['case_sensitive'] = $data['case_sensitive'];
		// 	$options_data['space_sensitive'] = $data['space_sensitive'];

		// 	if($this->question_model->create('options',$options_data)){
				
		// 		if($this->save_quiz_question_data($question_id,$data)){
		// 			return true;
		// 		}else{
		// 			echo "Essay quiz questions was not successfully saved";
		// 			exit;
		// 		}

		// 	}else{
		// 		echo "Essay options was not successfully saved";
		// 		exit;
		// 	}
		// }else{
		// 	echo "Essay was not successfully saved";
		// 	exit;
		// }
		
	}

	public function save_multiple_choice($data=array()){

		$correct = array();
		foreach ($data['answer'] as $correct_key => $correct_value) {
			
			if($correct_key==$data['correct']){
				$correct[$correct_key] = 1;
			}else{
				$correct[$correct_key] = 0;
			}
			
		}
		
		if($question_id = $this->save_question_data("multiple_choice",$data)){

			$options_data['question_id'] = $question_id;
			$options_data['points'] = $data['points'];
			$options_data['answer'] = implode("||",$data['answer']);
			$options_data['correct'] = implode(",",$correct);
			
			// foreach ($data['answer'] as $answer_key => $answer_value) {
			// 	$options_data['answer'] = $answer_value;
			// 	$options_data['correct'] = $correct[$answer_key];

				if($this->question_model->create_unescaped('options',$options_data)){	
					return true;
				}else{
					echo "Multiple choice options was not successfully saved";
					exit;
				}
			// }
			
		}else{
			echo "Multiple choice was not successfully saved";
			exit;
		}
	}

	public function save_true_or_false($data=array()){

		$correct = array();
		foreach ($data['answer'] as $correct_key => $correct_value) {
			
			if($correct_key==$data['correct']){
				$correct[$correct_key] = 1;
			}else{
				$correct[$correct_key] = 0;
			}
		}

		
		if($question_id = $this->save_question_data("true_or_false",$data)){

			$options_data['question_id'] = $question_id;
			$options_data['points'] = $data['points'];
			$options_data['answer'] = implode("||",$data['answer']);
			$options_data['correct'] = implode(",",$correct);

			if($this->question_model->create_unescaped('options',$options_data)){
				
				if($this->save_quiz_question_data($question_id,$data)){
					return true;
				}else{
					echo "True or False was not successfully saved";
					exit;
				}

			}else{
				echo "True or False options was not successfully saved";
				exit;
			}
		}else{
			echo "True or False was not successfully saved";
			exit;
		}
	}

	public function save_matching_type($data=array()){
		
		if($question_id = $this->save_question_data("matching_type",$data)){

			$options_data['question_id'] = $question_id;
			$options_data['points'] = $data['points'];
			$options_data['answer'] = implode("||",$data['answer']);
			$options_data['question_match'] = implode("||",$data['question_match']);

			if($this->question_model->create_unescaped('options',$options_data)){
				
				if($this->save_quiz_question_data($question_id,$data)){
					return true;
				}else{
					echo "True or False was not successfully saved";
					exit;
				}

			}else{
				echo "True or False options was not successfully saved";
				exit;
			}
		}else{
			echo "True or False was not successfully saved";
			exit;
		}
	}

	public function save_multiple_choice_multiple_answer($data=array()){

		$correct = array();
		foreach ($data['answer'] as $correct_key => $correct_value) {
			
			if($data['correct'][$correct_key] == "on"){
				$correct[$correct_key] = 1;
			}else{
				$correct[$correct_key] = 0;
			}
			
		}
		
		if($question_id = $this->save_question_data("multiple_choice_multiple_answer",$data)){

			$options_data['question_id'] = $question_id;
			$options_data['points'] = $data['points'];
			$options_data['answer'] = implode("||",$data['answer']);
			$options_data['correct'] = implode(",",$correct);

			if($this->question_model->create_unescaped('options',$options_data)){
				
				if($this->save_quiz_question_data($question_id,$data)){
					return true;
				}else{
					echo "True or False was not successfully saved";
					exit;
				}

			}else{
				echo "True or False options was not successfully saved";
				exit;
			}
		}else{
			echo "True or False was not successfully saved";
			exit;
		}
	}
	

	public function get_complete_quiz_data($quiz_id="",$select=""){
		$this->db->from('quiz');
		$this->db->select($select);
		$this->db->join('quiz_part', 'quiz_part.quiz_id = quiz.id','left');
		$this->db->where("id",$quiz_id);
		$data = $this->db->get()->result_array();
		
		// return $data;
	}
}