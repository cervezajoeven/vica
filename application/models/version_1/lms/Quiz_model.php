<?php
class Quiz_model extends BEN_Model {

	public $table = "quiz";

    public function all_quiz(){
        $type = 'quiz';
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        // $this->db->where("quiz_type",'quiz');
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function review_answers($quiz_id="",$section_id=""){

        $this->db->from('optical_answer_sheet');
        $this->db->join('profile', 'profile.account_id = optical_answer_sheet.account_id','left');
        $this->db->join('quiz', 'quiz.id = optical_answer_sheet.quiz_id','left');
        $this->db->join('optical', 'optical.quiz_id = quiz.id','left');
        $this->db->join('quiz_assign', 'quiz_assign.quiz_id = quiz.id','left');
        $this->db->join('attempt', 'quiz_assign.id = attempt.quiz_assign_id','left');
        $this->db->join('classes', 'classes.account_id = optical_answer_sheet.account_id','left');
        $this->db->join('section', 'section.id = classes.section_id','left');
        $this->db->join('grade', 'grade.id = section.grade_id','left');


        $this->db->select('
            optical_answer_sheet.*,
            quiz.quiz_name as quiz_name,
            optical_answer_sheet.quiz_id as quiz_id,
            optical.total_score as total_score,
            quiz_assign.percentage as percentage,
            quiz_assign.quiz_type as quiz_type,
            profile.first_name as first_name,
            profile.last_name as last_name,
            section.section_name as section_name,
            section.id as section_id,
            grade.grade_name as grade_name,
            MAX(attempt.date_created) as date_created,
            (SELECT time_started FROM attempt WHERE account_id = profile.account_id AND date_created = (SELECT MAX(date_created) FROM attempt WHERE account_id = profile.account_id)) as time_started,
            (SELECT time_done FROM attempt WHERE account_id = profile.account_id AND date_created = (SELECT MAX(date_created) FROM attempt WHERE account_id = profile.account_id)) as time_done,
            (optical_answer_sheet.score/optical.total_score)*100 as the_percent
        ');
        // MAX(attempt.date_created) as date_created,
        // $this->db->where("quiz_type",'quiz');
        $this->db->where("optical_answer_sheet.quiz_id",$quiz_id);
        $this->db->where("section_id",$section_id);
        $this->db->order_by("profile.last_name","asc");
        // $this->db->group_by("attempt.account_id");
        $this->db->group_by("profile.account_id");
        $query = $this->db->get();
        $return = $query->result_array();
        // echo "<pre>";
        // print_r($return);
        // exit();
        return $return;
    }

    public function review_answers_section($quiz_id=""){

        $this->db->from('optical_answer_sheet');
        $this->db->join('profile', 'profile.account_id = optical_answer_sheet.account_id','left');
        $this->db->join('quiz', 'quiz.id = optical_answer_sheet.quiz_id','left');
        $this->db->join('optical', 'optical.quiz_id = quiz.id','left');
        $this->db->join('quiz_assign', 'quiz_assign.quiz_id = quiz.id','left');
        $this->db->join('classes', 'classes.account_id = optical_answer_sheet.account_id','left');
        $this->db->join('section', 'section.id = classes.section_id','left');
        $this->db->join('grade', 'grade.id = section.grade_id','left');


        $this->db->select('
            optical_answer_sheet.*,
            optical_answer_sheet.quiz_id as quiz_id,
            optical.total_score as total_score,
            quiz_assign.percentage as percentage,
            section.section_name as section_name,
            section.id as section_id,
            grade.grade_name as grade_name,
            optical_answer_sheet.score as score,
            (SELECT COUNT(*) FROM optical_answer_sheet LEFT JOIN classes ON classes.account_id = optical_answer_sheet.account_id WHERE quiz_id = "'.$quiz_id.'" AND (score/CAST((SELECT total_score FROM optical WHERE quiz_id="'.$quiz_id.'") AS SIGNED))*100 >= CAST((SELECT percentage FROM quiz_assign WHERE quiz_id="'.$quiz_id.'") AS SIGNED) AND classes.section_id = section.id) as passed,
            (SELECT COUNT(*) FROM optical_answer_sheet LEFT JOIN classes ON classes.account_id = optical_answer_sheet.account_id WHERE quiz_id = "'.$quiz_id.'" AND (score/CAST((SELECT total_score FROM optical WHERE quiz_id="'.$quiz_id.'") AS SIGNED))*100 < CAST((SELECT percentage FROM quiz_assign WHERE quiz_id="'.$quiz_id.'") AS SIGNED) AND classes.section_id = section.id) as failed,
            COUNT(*) as number_of_students,
        ');

        // $this->db->where("quiz_type",'quiz');
        $this->db->where("optical_answer_sheet.quiz_id",$quiz_id);
        $this->db->group_by("section_name");
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();
        // echo "<pre>";
        // print_r($return);
        // exit();
        return $return;
    }

    public function passed_students($quiz_id=""){
        // echo "<pre>";
        $query = $this->db->query('SELECT CONCAT(profile.last_name,", ",profile.first_name) as last_name, section_id,score FROM optical_answer_sheet LEFT JOIN classes ON classes.account_id = optical_answer_sheet.account_id LEFT JOIN profile ON classes.account_id = profile.account_id WHERE quiz_id = "'.$quiz_id.'" AND (score/CAST((SELECT total_score FROM optical WHERE quiz_id="'.$quiz_id.'") AS SIGNED))*100 >= CAST((SELECT percentage FROM quiz_assign WHERE quiz_id="'.$quiz_id.'") AS SIGNED) ORDER BY last_name ASC');
        $sections = $this->db->query('SELECT section_id FROM optical_answer_sheet LEFT JOIN classes ON classes.account_id = optical_answer_sheet.account_id LEFT JOIN profile ON classes.account_id = profile.account_id WHERE quiz_id = "'.$quiz_id.'" AND (score/CAST((SELECT total_score FROM optical WHERE quiz_id="'.$quiz_id.'") AS SIGNED))*100 >= CAST((SELECT percentage FROM quiz_assign WHERE quiz_id="'.$quiz_id.'") AS SIGNED) GROUP BY section_id');

        $return = $query->result_array();
        $by_section = $sections->result_array();
        $students = array();

        foreach ($by_section as $key => $value) {
            $students[$value['section_id']] = array();
        }
        foreach ($return as $key => $value) {
            $students[$value['section_id']][$key] = array("name"=>$value['last_name'],"score"=>$value['score']);
            // array_push($students[$value['section_id']], $value['last_name']);
        }
        // echo "<pre>";
        // print_r($students);
        // exit();
        return $students;
    }

    public function failed_students($quiz_id=""){
        // echo "<pre>";
        $query = $this->db->query('SELECT CONCAT(profile.last_name,", ",profile.first_name) as last_name, section_id,score FROM optical_answer_sheet LEFT JOIN classes ON classes.account_id = optical_answer_sheet.account_id LEFT JOIN profile ON classes.account_id = profile.account_id WHERE quiz_id = "'.$quiz_id.'" AND (score/CAST((SELECT total_score FROM optical WHERE quiz_id="'.$quiz_id.'") AS SIGNED))*100 < CAST((SELECT percentage FROM quiz_assign WHERE quiz_id="'.$quiz_id.'") AS SIGNED) ORDER BY last_name ASC');
        $sections = $this->db->query('SELECT section_id FROM optical_answer_sheet LEFT JOIN classes ON classes.account_id = optical_answer_sheet.account_id LEFT JOIN profile ON classes.account_id = profile.account_id WHERE quiz_id = "'.$quiz_id.'" AND (score/CAST((SELECT total_score FROM optical WHERE quiz_id="'.$quiz_id.'") AS SIGNED))*100 < CAST((SELECT percentage FROM quiz_assign WHERE quiz_id="'.$quiz_id.'") AS SIGNED) GROUP BY section_id');

        // $query = $this->db->get();
        $return = $query->result_array();
        $by_section = $sections->result_array();
        $students = array();

        foreach ($by_section as $key => $value) {
            $students[$value['section_id']] = array();
            // array_push($students[$value['section_id']], $value['last_name']);
        }
        foreach ($return as $key => $value) {
            // array_push($students[$value['section_id']], $value['last_name']);
            $students[$value['section_id']][$key] = array("name"=>$value['last_name'],"score"=>$value['score']);
        }
        // echo "<pre>";
        // print_r($students);
        // exit();
        return $students;
    }

    public function review_answers_student(){

        $this->db->from('optical_answer_sheet');
        $this->db->join('profile', 'profile.account_id = optical_answer_sheet.account_id','left');
        $this->db->join('quiz', 'quiz.id = optical_answer_sheet.quiz_id','left');
        $this->db->join('quiz_assign', 'quiz_assign.quiz_id = quiz.id','left');
        $this->db->join('optical', 'optical.quiz_id = quiz.id','left');
        $this->db->join('classes', 'classes.account_id = optical_answer_sheet.account_id','left');
        $this->db->join('section', 'section.id = classes.section_id','left');
        $this->db->join('grade', 'grade.id = section.grade_id','left');


        $this->db->select('
            optical_answer_sheet.*,
            quiz.quiz_name as quiz_name,
            optical_answer_sheet.quiz_id as quiz_id,
            quiz_assign.percentage as percentage,
            profile.first_name as first_name,
            profile.last_name as last_name,
            optical.total_score as total_score,
            section.section_name as section_name,
            grade.grade_name as grade_name,

        ');

        // $this->db->where("quiz_type",'quiz');
        $this->db->where("optical_answer_sheet.account_id",$this->session->userdata('id'));
        $this->db->where("optical_answer_sheet.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function get_quiz_history($account_id=""){
        $this->db->from('attempt');
        $this->db->join('quiz_assign', 'quiz_assign.id = attempt.quiz_assign_id','left');
        $this->db->join('quiz', 'quiz.id = quiz_assign.quiz_id','left');
        $this->db->where("attempt.account_id",$account_id);
        $this->db->order_by("attempt.id","desc");
        $this->db->group_by("attempt.quiz_assign_id");
        $this->db->select('attempt.*,
            MAX(attempt.score) as score,
            attempt.total_score as total_score,
            quiz.quiz_type as quiz_type,
            quiz.id as quiz_id,
            quiz_assign.percentage as remarks_percentage,
            quiz.quiz_name as quiz_name,
            round((MAX(attempt.score)) / (attempt.total_score)*100,2) as percentage,
            ');
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function get_assigned_students_by_quiz_id($quiz_id="",$section=""){

        if($quiz_assign = $this->db->where('quiz_id',$quiz_id)->get('quiz_assign')->result_array()[0]){
            $quiz_data = $this->db->where('id',$quiz_id)->get('quiz')->result_array()[0];
            $total = $this->db->where('quiz_assign_id',$quiz_assign['id'])->get('attempt')->result_array();
            $section_accounts = $this->grading_model->get_students_by_section($section);
            // $account_ids = explode(",", $quiz_assign['account_ids']);
            foreach ($section_accounts as $section_accounts_key => $section_accounts_value) {
                $account_ids[$section_accounts_key] = $section_accounts_value['account_id'];
            }
            // echo "<pre>";
            // print_r($account_ids);
            // exit();
            

            if($account_ids[0]){
                // echo "<pre>";
                foreach ($account_ids as $account_id_key => $account_id_value) {
                    $this->db->from('profile');
                    $this->db->select('
                        account_id as id,
                        CONCAT(last_name," ",first_name) as full_name
                    ');
                    
                    $profile[$account_id_key] = $this->db->where('account_id',$account_id_value)->get()->result_array()[0];
                    // print_r($account_id_value);
                    // print_r($profile[$account_id_key]);
                    $this->db->from('classes');
                    $this->db->select('section_id,schoolyear_id,grade_id,section_name');
                    $this->db->join('section as a', 'a.id = classes.section_id','left');
                    $classes = $this->db->where('account_id',$account_id_value)->get()->result_array()[0];
                    $grade = $this->ben_get_by_id('grade',$classes['grade_id'],'grade_name');

                    if(count($max_score = $this->db->select("MAX(score) as score,total_score")->where('quiz_assign_id',$quiz_assign['id'])->where('account_id',$account_id_value)->get('attempt')->result_array())){
                        // print_r($max_score);
                        if(count($score = $this->db->select("id,MAX(score) as score,total_score")->where('quiz_assign_id',$quiz_assign['id'])->where('account_id',$account_id_value)->where('score',$max_score[0]['score'])->get('attempt')->result_array())){
                            // print_r($quiz_assign);
                            $current_score = $score[0]['score'];
                            $current_id = $score[0]['id'];
                            $current_total_score = $score[0]['total_score'];
                            if($quiz_data['quiz_type']=="mastery_test"){
                                if($current_score!=0&&$current_total_score!=0){
                                    $percentage = ($current_score/$current_total_score)*100;
                                    if($percentage>=70){
                                        $remarks = "Above Average";
                                    }else if($percentage<=69&&$percentage>=50){
                                        $remarks = "Average";
                                    }else{
                                        $remarks = "Below Average";
                                    }      
                                }else{
                                    $remarks = "No remarks";
                                    $percentage = 0;
                                }
                            }else{
                                if($current_score!=0&&$current_total_score!=0){
                                    $percentage = ($current_score/$current_total_score)*100;
                                    if($percentage>=$quiz_assign['percentage']){
                                        $remarks = "Pass";
                                    }else{
                                        $remarks = "Fail"; 
                                    }

                                }else{
                                    $remarks = "No remarks";
                                    $percentage = 0;
                                }
                            }
                            
                            
                            

                        }else{
                            $current_score = 0;
                            $current_id = 0;
                            $current_total_score = 0;
                            $remarks = "No remarks";
                            $percentage = 0;
                        }

                    }else{
                        $current_score = 0;
                        $current_id = 0;
                        $current_total_score = 0;
                        $remarks = "No remarks";
                        $percentage = 0;
                    }
                    
                    $profile[$account_id_key] = array_merge($profile[$account_id_key],$classes);
                    $quiz_assign_data['id'] = $current_id;
                    $quiz_assign_data['score'] = $current_score;
                    $quiz_assign_data['date_created'] = $quiz_assign['date_created'];
                    $quiz_assign_data['status'] = $quiz_assign['status'];
                    $quiz_assign_data['remarks'] = $remarks;
                    $quiz_assign_data['percentage'] = round($percentage)."%";
                    $quiz_assign_data['grade_name'] = "Grade ".$grade['grade_name'];
                    $quiz_assign_data['total_score'] = $current_total_score;
                    $profile[$account_id_key] = array_merge($profile[$account_id_key],$quiz_assign_data);
                }

                // exit();

                return $profile;
            }else{
                return false;
            }
            
        }else{
            return false;
        }
    }

    public function get_all_quiz_data($quiz_code=""){
        $this->db->select("*");
        $this->db->from("quiz");
        $this->db->join('quiz_part', 'quiz_part.quiz_id = quiz.id','left');
        $this->db->join('question', 'question.quiz_part_id = quiz_part.id','left');
        $this->db->join('options', 'options.question_id = question.id','left');
        $this->db->where('quiz.id',$quiz_code);
        $this->db->where('quiz_part.deleted',0);
        $this->db->where('question.deleted',0);
        return $this->db->get()->result_array();
    }

    public function update_total_score($quiz_code=""){
        $updated_total_score = $this->quiz_model->calculate_total_score($quiz_code);
        $udpate_data = array("id"=>$quiz_code,"total_score"=>$updated_total_score);
        return $this->quiz_model->update("quiz",$udpate_data);
    }

    public function calculate_total_score($quiz_code=""){

        $questions = $this->quiz_model->get_all_quiz_data($quiz_code);
        $total_score = 0;

        foreach ($questions as $questions_key => $questions_value) {
            if($questions_value['question_type']=="identification"){
                $total_score += $questions_value['points'];
            }
            if($questions_value['question_type']=="multiple_choice"){

                $total_score += $questions_value['points'];
            }
            if($questions_value['question_type']=="true_or_false"){
                $total_score += $questions_value['points'];

            }
            if($questions_value['question_type']=="essay"){
                $total_score += $questions_value['points'];
            }
            if($questions_value['question_type']=="multiple_choice_multiple_answer"){
                $total_score += $questions_value['points'];
            }
            if($questions_value['question_type']=="matching_type"){
                foreach (explode("||", $questions_value['question_match']) as $question_match_key => $question_match_value) {
                    $total_score += $questions_value['points'];   
                }
            }
        }
        return $total_score;
    }

    public function all_assigned_quiz_by_account_id($account_id=""){

        $this->db->from('quiz_assign');
        $this->db->join('quiz as a', 'a.id = quiz_assign.quiz_id','left');
        // $this->db->join('attempt as b', 'b.quiz_assign_id = quiz_assign.id','left');
        $this->db->join('profile', 'profile.account_id = quiz_assign.account_id','left');
        $this->db->join('semester', 'semester.id = quiz_assign.semester_id','left');
        $this->db->join('schoolyear', 'schoolyear.id = quiz_assign.schoolyear_id','left');
        $this->db->select('
            quiz_assign.*,
            quiz_assign.id as quiz_assign_id,
            REPLACE(DATE_FORMAT(quiz_assign.date_created, "%M %e, %Y"),"\`","") as date_created,
            REPLACE(DATE_FORMAT(quiz_assign.date_updated, "%M %e, %Y"),"\`","") as date_updated,
            semester.semester,
            schoolyear.schoolyear,
            a.total_score,
            CONCAT(profile.first_name," ",profile.last_name) as full_name,
            a.quiz_name
        ');
        $date_now = date("Y-m-d H:i:s");
        $this->db->where('start_date <=', $date_now);
        // $this->db->where('DATE_ADD(quiz_assign.end_date,INTERVAL 1 DAY) >=', $date_now);
        $this->db->where('end_date >=', $date_now);
        $this->db->where("FIND_IN_SET(".$account_id.", quiz_assign.account_ids) !=", 0);
        $return = $this->db
                    ->order_by('id','desc')
                    ->group_by('quiz_assign_id')
                    ->get()->result_array();
        // echo "<pre>"
        // print_r($return);
        // exit;
        return $return;
    }

    public function attempts_count($quizzes="",$account_id=""){

        // $this->db->from('quiz_assign');
        // $this->db->select('*');
        // $this->db->where("quiz_id",$quizzes);
        // $quiz_assign_data = $this->db->get()->result_array();
        $this->db->from('attempt');
        $this->db->select('*');
        $this->db->where("quiz_assign_id",$quizzes)->where("account_id",$account_id)->where("completed",1);
        $attempts = $this->db->get()->result_array();
        // echo "<pre>";
        // print_r($attempts);
        // exit;
        // return $attempts;
        return count($attempts);
    }
    
    public function all_shared_quiz(){
        $type = 'quiz';
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("quiz_type",'quiz');
        $this->db->where("account_type_id",3);
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function packages(){

        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.account_type_id as account_type_id,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("account_type_id",3);
        $this->db->where("shared",1);
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function quiz_bank(){

        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.account_type_id as account_type_id,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("account_type_id",4);
        $this->db->where("shared",1);
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function shared_quizzes(){

        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.account_type_id as account_type_id,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("account_type_id",4);
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function all_shared_teacher($type=""){
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("quiz_type",$type);
        $this->db->where("account_id",$this->session->userdata('id'));
        $this->db->where("shared",1);
        $this->db->where("deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function all_shared_mastery(){
        $type = 'quiz';
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("quiz_type",'mastery_test');
        $this->db->where("shared",1);
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function all_shared_formative(){
        $type = 'quiz';
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("quiz_type",'formative_test');
        $this->db->where("shared",1);
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function all_mastery(){
        $type = 'quiz';
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("quiz_type",'mastery_test');
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function teacher_quizzes($type=""){
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            quiz.id as quiz_id,
            quiz.date_created as quiz_date_created,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
            (SELECT grades FROM quiz_assign WHERE quiz_id=quiz.id LIMIT 1) as grades,
            (SELECT sections FROM quiz_assign WHERE quiz_id=quiz.id LIMIT 1) as sections,
            quiz.deleted
        ');
        // $this->db->where("quiz_type",$type);
        $this->db->where("account_id",$this->session->userdata('id'));
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("quiz_date_created","DESC");
        $query = $this->db->get();
        $return = $query->result_array();
        // print_r("<pre>");
        // print_r($return);
        // exit();
        return $return;
    }

    public function all_formative(){
        $type = 'quiz';
        $this->db->from('quiz');
        $this->db->join('subject as a', 'a.id = quiz.subject_id','left');
        $this->db->join('grade as b', 'b.id = quiz.grade_id','left');
        $this->db->join('account as c', 'c.id = quiz.account_id','left');
        $this->db->join('semester as d', 'd.id = quiz.semester_id','left');

        $this->db->select('
            quiz.*,
            quiz.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("quiz_type",'formative_test');
        $this->db->where("quiz.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function optimize_quizzes(){

        $this->db->from('quiz');
        // $this->db->join('lesson_assign', 'lesson.id = lesson_assign.lesson_id','left');
        $this->db->select('
            *,
            quiz.deleted as quiz_deleted,
        ');
        $this->db->error();
        $query = $this->db->where('quiz.deleted',1);
        $query = $this->db->get();
        $return = $query->result_array();
        foreach ($return as $return_key => $return_value) {
            $quiz_assign_data = array("quiz_id"=>$return_value['id'],"deleted"=>1);
            $this->quiz_model->sms_update("quiz_assign","quiz_id",$quiz_assign_data);
        }
        return $return;
    }

    public function quiz_schedule($grade=""){

        $this->db->from('quiz_assign');
        $this->db->join('quiz', 'quiz.id = quiz_assign.quiz_id','left');
        $this->db->join('profile', 'profile.account_id = quiz.account_id','left');

        $this->db->select('
            quiz_name,
            start_date,
            end_date,
            quiz_assign.grades,
            quiz_assign.sections as sections,
            quiz.deleted as quiz_deleted,
            quiz_assign.deleted as quiz_assign_deleted,
            profile.last_name as last_name,
        ');
        // $this->db->select('*');
        $this->db->where('quiz_assign.deleted',0);
        $this->db->where('quiz.account_id',$this->session->userdata('id'));
        if($grade){
            $this->db->where("FIND_IN_SET('".$grade."', quiz_assign.grades) !=", 0);
        }
        
        $this->db->error();
        $query = $this->db->get();

        $return = $query->result_array();
        return $return;
    }

    public function quiz_schedule_admin($grade=""){

        $this->db->from('quiz_assign');
        $this->db->join('quiz', 'quiz.id = quiz_assign.quiz_id','left');
        $this->db->join('profile', 'profile.account_id = quiz.account_id','left');

        $this->db->select('
            quiz_name,
            start_date,
            end_date,
            quiz_assign.grades,
            quiz_assign.sections as sections,
            quiz.deleted as quiz_deleted,
            quiz_assign.deleted as quiz_assign_deleted,
            profile.last_name as last_name,
        ');
        // $this->db->select('*');
        $this->db->where('quiz_assign.deleted',0);
        if($grade){
            $this->db->where("FIND_IN_SET('".$grade."', quiz_assign.grades) !=", 0);
        }
        
        $this->db->error();
        $query = $this->db->get();

        $return = $query->result_array();
        return $return;
    }
	
}