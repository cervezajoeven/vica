<?php
class Answer_sheet_model extends BEN_Model {

	public $table = "answer_sheet";

	public function get_attempts_by_quiz_assign_id($quiz_assign_id="",$account_id=""){
		$this->db->select("*");
		$this->db->from("attempt");
		$this->db->where("quiz_assign_id",$quiz_assign_id);
		$this->db->where("account_id",$account_id);
		return $this->db->get()->result_array();
	}

	public function get_incomplete_attempts($quiz_assign_id="",$account_id=""){
		$this->db->select("*");
		$this->db->from("attempt");
		$this->db->where("quiz_assign_id",$quiz_assign_id);
		$this->db->where("account_id",$account_id);
		$this->db->where("completed",0);
		return $this->db->get()->result_array();
	}

	public function get_all_quiz_data($quiz_id=""){
		$this->db->select("*");
		$this->db->from("quiz");
		$this->db->join('quiz_part', 'quiz_part.quiz_id = quiz.id','left');
		$this->db->join('question', 'question.quiz_part_id = quiz_part.id','left');
		$this->db->join('options', 'options.question_id = question.id','left');
		$this->db->where('quiz.id',$quiz_id);
		$this->db->where('quiz_part.deleted',0);
		$this->db->where('question.deleted',0);
		return $this->db->get()->result_array();
	}

	public function get_all_quiz_part($quiz_id="",$account_id=""){
		$this->db->select("quiz_label,quiz_part.id as quiz_part_id");
		$this->db->from("quiz");
		$this->db->join('quiz_part', 'quiz_part.quiz_id = quiz.id','left');
		$this->db->where('quiz.id',$quiz_id);
		return $this->db->get()->result_array();
	}

	public function get_all_attempts($account_id="",$quiz_id=""){
		$this->db->select("*,CASE WHEN attempt.completed = 1 THEN 'For Checking' WHEN attempt.completed = 0 THEN 'On Progress' ELSE 'Completed' END as completed ");
		$this->db->from("quiz");
		$this->db->join('quiz_assign', 'quiz_assign.quiz_id = quiz.id','left');
		$this->db->join('attempt', 'attempt.quiz_assign_id = quiz_assign.id','left');
		$this->db->where('quiz.id',$quiz_id);
		return $this->db->get()->result_array();
	}

	public function get_all_attempts_by_student($account_id="",$quiz_id=""){
		$this->db->select("*,CASE WHEN attempt.completed = 1 THEN 'For Checking' WHEN attempt.completed = 0 THEN 'On Progress' ELSE 'Completed' END as completed ");
		$this->db->from("quiz");
		$this->db->join('quiz_assign', 'quiz_assign.quiz_id = quiz.id','left');
		$this->db->join('attempt', 'attempt.quiz_assign_id = quiz_assign.id','left');
		$this->db->where('quiz.id',$quiz_id);
		return $this->db->get()->result_array();
	}

	public function check_attempts($quiz_assign_code="",$username=""){

		$attempts = $this->answer_sheet_model->get_attempts_by_quiz_assign_id($quiz_assign_code,$username);
		// print_r($attempts);
		if(count($attempts)>0){
			$the_count = 0;
			foreach ($attempts as $attempt_key => $attempt_value) {
				if($attempt_value['completed']==0){
					$quiz_assign = $this->answer_sheet_model->ben_get_by_id("quiz_assign",$attempt_value['quiz_assign_id']);
					print_r($quiz_assign);
				}else{
					$the_count++;
				}
			}
		}else{

		}
       	print_r($the_count);
	}

	public function create_attempt($quiz_assign=""){

        $quiz_assign_data['id'] = $quiz_assign;
        $quiz_assign = $this->quiz_model->ben_get("quiz_assign",$quiz_assign_data)[0];
        $quiz_part_data['quiz_id'] = $quiz_assign['quiz_id'];
        $quiz_parts = $this->quiz_part_model->get_all_part_by_quiz($quiz_part_data);
        $questions_order = array();
        foreach ($quiz_parts as $quiz_part_key => $quiz_part_value) {
            $questions = $this->quiz_part_model->all_questions_by_quiz_part_id($quiz_part_value['id']);
            if($quiz_part_value['randomized']==1){
                shuffle($questions);
            }
            foreach ($questions as $question_key => $question_value) {
                $question_order['quiz_part_id'] = $quiz_part_value['id'];
                $question_order['question_id'] = $question_value['id'];
                array_push($questions_order, $question_order); 
            }
        }
        $date = new DateTime();
        $date_now = $date->getTimestamp();
        $duration = $quiz_assign['duration'];

        $attempt['quiz_assign_id'] = $quiz_assign['id'];
        $attempt['assigner'] = $quiz_assign['account_id']; 
        $attempt['completed'] = 0;
        $attempt['expiration'] = strtotime("now +".$duration." minutes");
        $attempt['question_order'] = json_encode($questions_order);

        return $attempt;
	}
	
}