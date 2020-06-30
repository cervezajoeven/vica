<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_sheet extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "lms";
        $this->page_title = "Quiz";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $this->data['all_data'] = $this->quiz_model->all_quiz();
        $this->ben_view_superclear(__FUNCTION__);
    }

    public function ajax_saving(){
        $data = $_REQUEST;
        $data['id'] = $data['attempt_id'];
        $data['answer_sheet'] = json_encode(json_decode($data['answers']));
        unset($data['attempt_id']);
        unset($data['answers']);
        unset($data['ci_session']);
        // print_r($data);
        $this->quiz_model->update('attempt',$data);
    }

    public function view_attempts($account_id="",$quiz_id=""){
        $this->data['account_id'] = $account_id;
        $this->data['quiz_id'] = $quiz_id;
        $this->data['all_data'] = $this->answer_sheet_model->get_all_attempts($account_id,$quiz_id);
        $this->page_title = "Attempts";
        // print_r($this->data['all_data']);
        $this->ben_view(__FUNCTION__);
        
    }

    public function view_attempts_student($quiz_assign_id=""){
        $this->data['account_id'] = $this->session->userdata('id');
        $this->data['quiz_id'] = $quiz_assign_id;

        $this->data['all_data'] = $this->answer_sheet_model->get_all_attempts_by_student($this->data['account_id'],$this->data['quiz_id']);
        $this->page_title = "Attempts";
        $this->ben_view(__FUNCTION__);
        
    }

    public function answer_sheet($attempt_id="",$quiz_id=""){
        $this->data['attempt'] = $this->answer_sheet_model->ben_get_by_id("attempt",$attempt_id);
        $this->data['quiz_assign'] = $this->answer_sheet_model->ben_get_by_id("quiz_assign",$this->data['attempt']['quiz_assign_id']);
        $quiz_id = $this->data['quiz_assign']['quiz_id'];
        $this->data['quiz'] = $this->answer_sheet_model->ben_get_by_id("quiz",$quiz_id);
        $this->data['questions'] = $this->answer_sheet_model->get_all_quiz_data($quiz_id);
        $this->data['quiz_part'] = $this->answer_sheet_model->get_all_quiz_part($quiz_id);
        $this->data['student'] = $this->answer_sheet_model->ben_where("profile","account_id",$this->data['attempt']['account_id'])[0];
        $this->data['checked_answer_sheet'] = $this->check_answer3($attempt_id);
        if($attempt_id){

            $this->ben_view_clear_with_navigation("answer_sheet2");

        }else{

            $this->ben_notify(array(array("warning","This student haven't attempted the quiz yet.")));
            $this->ben_redirect("lms/quiz/results/".$quiz_id);
        }
    }

    public function answer_sheet_attempt($quiz_id="",$attempt_id=""){
        $this->data['attempt'] = $this->answer_sheet_model->ben_get_by_id("attempt",$attempt_id);
        $this->data['quiz_assign'] = $this->answer_sheet_model->ben_get_by_id("attempt",$this->data['attempt']['quiz_assign_id']);
        $this->data['quiz'] = $this->answer_sheet_model->ben_get_by_id("quiz",$this->data['quiz_assign']['quiz_id']);
        $this->data['questions'] = $this->answer_sheet_model->get_all_quiz_data($quiz_id);
        $this->data['quiz_part'] = $this->answer_sheet_model->get_all_quiz_part($quiz_id);
        $this->data['student'] = $this->answer_sheet_model->ben_where("profile","account_id",$this->data['attempt']['account_id'])[0];
        $this->data['checked_answer_sheet'] = $this->check_answer($attempt_id);

        if($attempt_id){

            $this->ben_view_clear_with_navigation("answer_sheet2");
            
        }else{

            $this->ben_notify(array(array("warning","This student haven't attempted the quiz yet.")));
            $this->ben_redirect("lms/quiz/results/".$quiz_id);
        }
    }

    public function submit_quiz(){
        //echo "<pre>";
        $data['id'] = $_REQUEST['id'];
        $ajax_saving['id'] = $_REQUEST['id'];
        $ajax_saving['answer_sheet'] = $_REQUEST['answers'];
        if($this->quiz_model->update('attempt',$data)){
            unset($_REQUEST['ci_session']);
            $data['answer_sheet'] = $_REQUEST['answers'];
            $attempt_data = $this->quiz_model->ben_get_by_id('attempt',$data['id']);
            $question_order = json_decode($attempt_data['question_order']);
            $has_essay = 0;
            $total_score = 0;

            foreach ($question_order as $question_order_key => $question_order_value) {
                $options = $this->question_model->get_options_by_question_id_with_question_data($question_order_value->question_id,"question_id,question_match,a.question_type,points,")[0]; 
                if($options['question_type']=="identification"){
                    $total_score += $options['points'];
                }
                if($options['question_type']=="multiple_choice"){

                    $total_score += $options['points'];
                }
                if($options['question_type']=="true_or_false"){
                    $total_score += $options['points'];

                }
                if($options['question_type']=="essay"){
                    $total_score += $options['points'];
                }
                if($options['question_type']=="multiple_choice_multiple_answer"){
                    $total_score += $options['points'];
                }
                if($options['question_type']=="matching_type"){
                    foreach (explode("||", $options['question_match']) as $question_match_key => $question_match_value) {
                        $total_score += $options['points'];   
                    }
                }

            }
            if($this->quiz_model->update('attempt',$data)){
                
                $answer_sheet = json_decode($data['answer_sheet']);
                
                $student_total_score = 0;
                
                foreach ($answer_sheet as $answer_sheet_key => $answer_sheet_value) {
                    $option = $this->question_model->get_options_by_question_id_with_question_data($answer_sheet_key,"question_id,answer,case_sensitive,space_sensitive,correct,question_match,a.question_type,points,")[0];     
                    
                    if($option['question_type']=="identification"){
                        $answers = explode("||", $option['answer']);
                        if($option['case_sensitive']==0){
                            $answer_sheet_value = strtolower($answer_sheet_value);
                        }
                        if($option['case_sensitive']==0){
                            $answer_sheet_value = str_replace(' ', '', $answer_sheet_value);
                        }
                        foreach ($answers as $answer_key => $answer_value) {
                            if($option['case_sensitive']==0){
                                $answers[$answer_key] = strtolower($answer_value);
                            }
                            if($option['case_sensitive']==0){
                                $answers[$answer_key] = str_replace(' ', '', $answer_value);
                            }
                            if(in_array($answer_sheet_value, $answers)){
                                $student_total_score += $option['points'];
                                break;
                            }
                            
                        }
                        
                    }
                    if($option['question_type']=="multiple_choice"){

                        if($option['correct']==$answer_sheet_value){
                            $student_total_score += $option['points'];
                        }
                    }
                    if($option['question_type']=="true_or_false"){

                        if($option['correct']==$answer_sheet_value){
                            $student_total_score += $option['points'];
                        }
                    }
                    if($option['question_type']=="essay"){
                        $has_essay = 1;
                    }
                    if($option['question_type']=="multiple_choice_multiple_answer"){

                        if($option['correct']==$answer_sheet_value){
                            $student_total_score += $option['points'];
                        }
                        
                    }

                    if($option['question_type']=="matching_type"){
                        $answer_sheet_value = explode(",", $answer_sheet_value);
                        foreach (explode("||", $option['question_match']) as $question_match_key => $question_match_value) {
                            
                            if($answer_sheet_value[$question_match_key] == $question_match_key){
                                $student_total_score += $option['points'];
                            }
                        }
                        
                    }
                }
                $attempt['id'] = $data['id'];
                $attempt['total_score'] = $total_score;
                $attempt['score'] = $student_total_score;
                $attempt['has_essay'] = $has_essay;
                if($attempt['has_essay']==1){
                    $attempt['completed'] = 1;
                }else{
                    $attempt['completed'] = 2;
                }
                
                if($this->quiz_model->update('attempt',$attempt)){
                    $this->ben_notify(array(array("success","Your quiz was successfully submitted. ")));
                    $this->ben_redirect("lms/quiz/student_assigned_quizzes");
                }
            }
        }
        
    }

    public function check_answer3($attempt_id=""){
        ini_set('display_errors', 0);
        echo "<pre>";
        $attempt_data = $this->quiz_model->ben_get_by_id('attempt',$attempt_id);
        $question_order = json_decode($attempt_data['question_order']);
        $answer_sheet = json_decode($attempt_data['answer_sheet']);
        $correction = array();
        $has_essay = 0;
        $total_score = 0;
        
        // print_r($answer_sheet);
        foreach ($question_order as $question_order_key => $question_order_value) {
            $options = $this->question_model->get_options_by_question_id_with_question_data($question_order_value->question_id,"question_id,question_match,a.question_type,points,correct,answer")[0];

            if($options['question_type']=="identification"){
                $total_score += $options['points'];
                $question_id = $options['question_id'];
                $student_answer = $answer_sheet->$question_id;
                $options_data = $this->question_model->get_options_by_question_id($question_id);
                
                print_r($options_data);
                // $student_answer = $answer_sheet[$question_id];
                // if(in_array(strtolower($answer_sheet->$options['question_id']), explode("||", strtolower($options['answer'])))){
                //     $correction[$question_order_value->question_id]['status'] = 1;
                // }else{
                //     $correction[$question_order_value->question_id]['status'] = 0;
                // }
                $correction[$question_order_value->question_id]['question_type'] = "identification";
                $correction[$question_order_value->question_id]['correct'] = $options['answer'];
            }


        }
        // print_r($correction);
        // print_r($total_score);
        exit();

    }

    public function check_answer2($attempt_id=""){
        ini_set('display_errors', 0);
        $attempt_data = $this->quiz_model->ben_get_by_id('attempt',$attempt_id);
        $question_order = json_decode($attempt_data['question_order']);
        $answer_sheet = json_decode($attempt_data['answer_sheet']);
        $correction = array();
        $has_essay = 0;
        $total_score = 0;
        // echo "<pre>";
        
        foreach ($question_order as $question_order_key => $question_order_value) {
            $options = $this->question_model->get_options_by_question_id_with_question_data($question_order_value->question_id,"question_id,question_match,a.question_type,points,correct,answer")[0];
            
            if($options['question_type']=="multiple_choice_multiple_answer"){
                $total_score = $options['points'];
                // print_r($options['correct']);
                // exit();
                if($options['correct'] == $answer_sheet->$options['question_id']){
                    // $correction[$question_order_value->question_id] = $options['correct'];
                }else{
                    $student_answer = explode(",",$answer_sheet->$options['question_id']);
                    foreach (explode(",",$options['correct']) as $options_key => $options_value) {
                        if($student_answer[$options_key]==$options_value){
                            $choice_correction[] = $options_value;
                        }else{
                            $choice_correction[] = 2;
                        }
                        
                    }
                    
                }
                $correction[$question_order_value->question_id]['answer'] = $student_answer;
                
                $correction[$question_order_value->question_id]['correction'] = explode(",", $options['correct']);
            }

            if($options['question_type']=="identification"){
                $total_score += $options['points'];
                if(in_array(strtolower($answer_sheet->$options['question_id']), explode("||", strtolower($options['answer'])))){
                    $correction[$question_order_value->question_id]['status'] = 1;
                }else{
                    $correction[$question_order_value->question_id]['status'] = 0;
                }
                $correction[$question_order_value->question_id]['original'] = $answer_sheet->$options['question_id'];
                $correction[$question_order_value->question_id]['correct'] = $options['answer'];
            }

            if($options['question_type']=="multiple_choice"){
                $total_score += $options['points'];

                if(property_exists($answer_sheet, $options['question_id'])){
                    // print_r($answer_sheet);
                    // print_r($options['question_id']);
                    // exit();
                    if($options['correct'] == $answer_sheet->$options['question_id']){
                        $correction[$question_order_value->question_id] = explode(",", $options['correct']);
                    }else{
                        // $student_answer = explode(",",$answer_sheet->$options['question_id']);
                        $choice_correction = [];
                        $student_answer = explode(",",$answer_sheet->$options['question_id']);
                        foreach (explode(",",$options['correct']) as $options_key => $options_value) {
                            if($student_answer[$options_key]==$options_value){
                                $choice_correction[] = $options_value;
                            }else{
                                if($options_value==1){
                                    $choice_correction[] = 1;
                                }elseif($options_value==0){
                                    $choice_correction[] = 2;
                                }
                            }
                            
                        }
                        $correction[$question_order_value->question_id] = $choice_correction;
                        
                    }
                }else{

                }
            }

            if($options['question_type']=="true_or_false"){
                $total_score += $options['points'];

                if($answer_sheet->$options['question_id'] == $options['correct']){
                    $correction[$question_order_value->question_id]['status'] = 1;
                    $correction[$question_order_value->question_id]['answer'] = $answer_sheet->$options['question_id'];
                }else{
                    $correction[$question_order_value->question_id]['status'] = 0;
                    if($options['correct'] == "1,0"){
                        $correction[$question_order_value->question_id]['answer'] = "1,2";
                    }else{
                        $correction[$question_order_value->question_id]['answer'] = "2,1";
                    }
                }

                
            }
            if($options['question_type']=="essay"){
                $total_score += $options['points'];
                $correction[$question_order_value->question_id] = $answer_sheet->$options['question_id'];
            }

            
            if($options['question_type']=="matching_type"){
                foreach (explode("||", $options['question_match']) as $question_match_key => $question_match_value) {
                    $total_score += $options['points'];   
                }

                $student_answer = explode(",",$answer_sheet->$options['question_id']);
                $correct_sequence = 0;
                $match_correction = [];
                foreach ($student_answer as $student_answer_key => $student_answer_value) {
                    if($student_answer_value==0){
                        if($student_answer_value == $correct_sequence){
                            array_push($match_correction, 1);
                        }else{
                            array_push($match_correction, 0);
                        }
                        
                    }elseif($student_answer_value){
                        if($student_answer_value == $correct_sequence){
                            array_push($match_correction, 1);
                        }else{
                            array_push($match_correction, 0);
                        }
                    }else{
                        array_push($match_correction, 0);
                    }
                    
                    $correct_sequence++;
                }
                $correction[$question_order_value->question_id]['correction'] = $match_correction;
                $correction[$question_order_value->question_id]['original'] = $student_answer;
            }
            
        }

        return $correction;

    }

    public function check_answer($attempt_id=""){

        $attempt_data = $this->quiz_model->ben_get_by_id('attempt',$attempt_id);
        $question_order = json_decode($attempt_data['question_order']);
        $answer_sheet = json_decode($attempt_data['answer_sheet']);
        $correction = array();
        $has_essay = 0;
        $total_score = 0;
        // echo "<pre>";
        
        
        foreach ($question_order as $question_order_key => $question_order_value) {
            $options = $this->question_model->get_options_by_question_id_with_question_data($question_order_value->question_id,"question_id,question_match,a.question_type,points,correct,answer")[0];
            // print_r($options['question_type']);
            if($options['question_type']=="multiple_choice_multiple_answer"){
                $total_score += $options['points'];

                if($options['correct'] == $answer_sheet->$options['question_id']){
                    $correction[$question_order_value->question_id] = $options['correct'];
                }else{
                    // $student_answer = explode(",",$answer_sheet->$options['question_id']);
                    $choice_correction = [];
                    $student_answer = explode(",",$answer_sheet->$options['question_id']);
                    foreach (explode(",",$options['correct']) as $options_key => $options_value) {
                        if($student_answer[$options_key]==$options_value){
                            $choice_correction[] = $options_value;
                        }else{
                            $choice_correction[] = 2;
                        }
                        
                    }
                    $correction[$question_order_value->question_id]['answer'] = $student_answer;
                    $correction[$question_order_value->question_id]['correction'] = $choice_correction;
                }
            }

            if($options['question_type']=="identification"){
                $total_score += $options['points'];
                if(in_array(strtolower($answer_sheet->$options['question_id']), explode("||", strtolower($options['answer'])))){
                    $correction[$question_order_value->question_id]['status'] = 1;
                }else{
                    $correction[$question_order_value->question_id]['status'] = 0;
                }
                $correction[$question_order_value->question_id]['original'] = $answer_sheet->$options['question_id'];
                $correction[$question_order_value->question_id]['correct'] = $options['answer'];
            }

            if($options['question_type']=="multiple_choice"){
                $total_score += $options['points'];

                if(property_exists($answer_sheet, $options['question_id'])){
                    // print_r($answer_sheet);
                    // print_r($options['question_id']);
                    // exit();
                    if($options['correct'] == $answer_sheet->$options['question_id']){
                        $correction[$question_order_value->question_id] = explode(",", $options['correct']);
                    }else{
                        // $student_answer = explode(",",$answer_sheet->$options['question_id']);
                        $choice_correction = [];
                        $student_answer = explode(",",$answer_sheet->$options['question_id']);
                        foreach (explode(",",$options['correct']) as $options_key => $options_value) {
                            if($student_answer[$options_key]==$options_value){
                                $choice_correction[] = $options_value;
                            }else{
                                if($options_value==1){
                                    $choice_correction[] = 1;
                                }elseif($options_value==0){
                                    $choice_correction[] = 2;
                                }
                            }
                            
                        }
                        $correction[$question_order_value->question_id] = $choice_correction;
                        
                    }
                }else{

                }
            }

            if($options['question_type']=="true_or_false"){
                $total_score += $options['points'];
                if($answer_sheet->$options['question_id'] == $options['correct']){
                    $correction[$question_order_value->question_id]['status'] = 1;
                    $correction[$question_order_value->question_id]['answer'] = $answer_sheet->$options['question_id'];
                }else{
                    $correction[$question_order_value->question_id]['status'] = 0;
                    if($options['correct'] == "1,0"){
                        $correction[$question_order_value->question_id]['answer'] = "1,2";
                    }else{
                        $correction[$question_order_value->question_id]['answer'] = "2,1";
                    }
                }
                
            }
            if($options['question_type']=="essay"){
                $total_score += $options['points'];
                $correction[$question_order_value->question_id] = $answer_sheet->$options['question_id'];
            }

            
            if($options['question_type']=="matching_type"){
                foreach (explode("||", $options['question_match']) as $question_match_key => $question_match_value) {
                    $total_score += $options['points'];   
                }
                print_r("");
                $student_answer = explode(",",$answer_sheet->$options['question_id']);
                $correct_sequence = 0;
                $match_correction = [];
                foreach ($student_answer as $student_answer_key => $student_answer_value) {
                    if($student_answer_value==0){
                        if($student_answer_value == $correct_sequence){
                            array_push($match_correction, 1);
                        }else{
                            array_push($match_correction, 0);
                        }
                        
                    }elseif($student_answer_value){
                        if($student_answer_value == $correct_sequence){
                            array_push($match_correction, 1);
                        }else{
                            array_push($match_correction, 0);
                        }
                    }else{
                        array_push($match_correction, 0);
                    }
                    
                    $correct_sequence++;
                }
                $correction[$question_order_value->question_id]['correction'] = $match_correction;
                $correction[$question_order_value->question_id]['original'] = $student_answer;
            }
            
        }
        // exit();
        // echo "<pre>";
        // print_r($correction);
        // exit();
        return $correction;

    }

    public function review(){
        
    }

    public function test($quiz_id="",$attempt_id=""){
        $quiz_data['id'] = $quiz_id;
        $attempt_data['id'] = $attempt_id;
        $this->data['quiz'] = $this->quiz_model->ben_get("quiz",$quiz_data)[0];
        $this->data['attempt'] = $this->quiz_model->ben_get("attempt",$attempt_data)[0];
        
        $this->ben_view_clear_with_navigation(__FUNCTION__);
    }

    public function attempt_quiz($quiz_assign_code=""){

        echo "<pre>";
        $this->answer_sheet_model->create_attempt($quiz_assign_code);
        $this->answer_sheet_model->check_attempts($quiz_assign_code,$this->session->userdata('id'));

    }

    // public function attempt($quiz_assign_id=""){
    //     // echo "<pre>";
    //     $this->data['quiz_assign_id'] = $quiz_assign_id;
    //     $quiz_assign_data['id'] = $quiz_assign_id;
    //     $quiz_assign = $this->quiz_model->ben_get("quiz_assign",$quiz_assign_data)[0];
    //     $the_quiz_data = $this->quiz_model->ben_get_by_id("quiz",$quiz_assign['quiz_id']);
        
    //     if($the_quiz_data['quiz_type']=="optical"){
    //         $this->ben_redirect("lms/optical/optical/".$the_quiz_data['id']."/".$quiz_assign_id);
    //     }
    //     $number_of_attempts = $this->answer_sheet_model->get_attempts_by_quiz_assign_id($quiz_assign_id,$this->session->userdata('id'));
    //     // print_r(count($number_of_attempts));
    //     // exit();

    //     if(count($number_of_attempts)<$quiz_assign['attempts']){
    //         $quiz_id = $quiz_assign['quiz_id'];
    //         $quiz_part_data['quiz_id'] = $quiz_id;
    //         $quiz_parts = $this->quiz_part_model->get_all_part_by_quiz($quiz_part_data);
    //         $questions_order = array();
    //         foreach ($quiz_parts as $quiz_part_key => $quiz_part_value) {
    //             $questions = $this->quiz_part_model->all_questions_by_quiz_part_id($quiz_part_value['id']);
    //             if($quiz_part_value['randomized']==1){
    //                 shuffle($questions);
    //             }
    //             foreach ($questions as $question_key => $question_value) {
    //                 $question_order['quiz_part_id'] = $quiz_part_value['id'];
    //                 $question_order['question_id'] = $question_value['id'];
    //                 array_push($questions_order, $question_order); 
    //             }
    //         }
    //         $date = new DateTime();
    //         $date_now = $date->getTimestamp();
    //         $duration = $quiz_assign['duration'];

    //         $attempt['quiz_assign_id'] = $quiz_assign['id'];
    //         $attempt['assigner'] = $quiz_assign['account_id'];
    //         $attempt['account_id'] = $this->session->userdata("id");
    //         $attempt['completed'] = 0;
    //         $attempt['expiration'] = strtotime("now +".$duration." minutes");
    //         $attempt['question_order'] = json_encode($questions_order);
            
    //         // var_dump($this->quiz_model->create_unescaped('attempt',$attempt));

    //         if($attempt_id = $this->quiz_model->create_unescaped('attempt',$attempt)){

    //             $this->ben_redirect("lms/".$this->current_page['controller']."/test/".$quiz_id."/".$attempt_id);
    //         }

    //     }else{

    //         $this->ben_notify(array(array("warning","All of attempts was consumed.")));
    //         $this->ben_redirect("lms/quiz/student_assigned_quizzes");
    //     }
        
    // }

    public function attempt($quiz_assign_id=""){
        // echo "<pre>";
        $this->data['quiz_assign_id'] = $quiz_assign_id;
        $quiz_assign_data['id'] = $quiz_assign_id;
        $quiz_assign = $this->quiz_model->ben_get("quiz_assign",$quiz_assign_data)[0];
        $the_quiz_data = $this->quiz_model->ben_get_by_id("quiz",$quiz_assign['quiz_id']);
        
        $get_incomplete = $this->answer_sheet_model->get_incomplete_attempts($quiz_assign_id,$this->session->userdata('id'));

        
        if(!empty($get_incomplete)){
            $this->ben_redirect("lms/optical/optical/".$the_quiz_data['id']."/".$quiz_assign_id."/".$get_incomplete[0]['id']);
            
        }else{
            $number_of_attempts = $this->answer_sheet_model->get_attempts_by_quiz_assign_id($quiz_assign_id,$this->session->userdata('id'));
        

            if(count($number_of_attempts)<$quiz_assign['attempts']){
                $quiz_id = $quiz_assign['quiz_id'];
                
                $date = new DateTime();
                $date_now = $date->getTimestamp();
                $duration = $quiz_assign['duration'];

                $attempt['quiz_assign_id'] = $quiz_assign['id'];
                $attempt['assigner'] = $quiz_assign['account_id'];
                $attempt['account_id'] = $this->session->userdata("id");
                $attempt['completed'] = 0;
                $attempt['expiration'] = strtotime("now +".$duration." minutes")*1000;
                $attempt['time_started'] = strtotime("now +0 seconds")*1000;
                
                
                // var_dump($this->quiz_model->create_unescaped('attempt',$attempt));
                // if($the_quiz_data['quiz_type']=="optical"){
                    // $this->ben_redirect("lms/optical/optical/".$the_quiz_data['id']."/".$quiz_assign_id);
                // }
                if($attempt_id = $this->quiz_model->create_new('attempt',$attempt)){
                    $this->ben_redirect("lms/optical/optical/".$the_quiz_data['id']."/".$quiz_assign_id."/".$attempt_id);
                }

                

            }
        }
        
        

        
        
    }

    public function read($quiz_id=""){
        $quiz_id_data['quiz_id'] = $quiz_id;
        $this->data['quiz_parts'] = $this->quiz_part_model->get_all_part_by_quiz($quiz_id_data);
        // echo "<pre>";
        foreach ($this->data['quiz_parts'] as $quiz_part_key => $quiz_part_value) {
            $questions[$quiz_part_key] = $this->quiz_part_model->all_questions_by_quiz_part_id($quiz_part_value['id']);
            foreach ($questions[$quiz_part_key] as $option_key => $option_value) {
                
                $questions[$quiz_part_key][$option_key]['options'] = $this->question_model->get_options_by_question_id($questions[$quiz_part_key][$option_key]['id']);
                // print_r($questions[$quiz_part_key][$option_key]);
            }
        }
        $this->data['questions'] = $questions;
        $this->ben_view_clear_with_navigation(__FUNCTION__);
    }

    public function display_options($data=array(),$question_data=array()){
        
        $this->data['option_data'] = $data;
        $this->data['question_data'] = $question_data;
        // print_r($this->data['option_data']);
        // print_r($this->data['question_data']);
        // print_r($question_data);
        if($question_data['question_type']=="essay"){
            return $this->ben_html('essay');
        }else if($question_data['question_type']=="identification"){
            return $this->ben_html('identification');
        }else if($question_data['question_type']=="multiple_choice"){
            return $this->ben_html('multiple_choice');
        }else if($question_data['question_type']=="true_or_false"){
            return $this->ben_html('true_or_false');
        }else if($question_data['question_type']=="matching_type"){
            // echo "holyshet";
            return $this->ben_html('matching_type');
        }else if($question_data['question_type']=="multiple_choice_multiple_answer"){
            return $this->ben_html('multiple_choice_multiple_answer');
        }else if($question_data['question_type']=="fill_in_the_blanks"){
            return $this->ben_html('fill_in_the_blanks');
        }
        
    }

    public function test_display_options($question_id=""){

        // $this->data['option_data'] = $data;
        $this->data['question'] = $this->quiz_model->ben_get_by_id("question",$question_id,"id,question_type");
        $this->data['options'] = $this->question_model->get_options_by_question_id($question_id);
        // $this->data['answer_sheet_'] = $this->question_model->get_options_by_question_id($question_id);
        
        if($this->data['question']['question_type']=="multiple_choice"){
            return $this->ben_html('answer_multiple_choice');
        }
        else if($this->data['question']['question_type']=="identification"){
            return $this->ben_html('answer_identification');
        }
        else if($this->data['question']['question_type']=="essay"){
            return $this->ben_html('answer_essay');
        }
        else if($this->data['question']['question_type']=="true_or_false"){
            return $this->ben_html('answer_true_or_false');
        }
        else if($this->data['question']['question_type']=="multiple_choice_multiple_answer"){
            return $this->ben_html('answer_multiple_choice_multiple_answer');
        }
        else if($this->data['question']['question_type']=="matching_type"){
            return $this->ben_html('answer_matching_type');
        }
        //else if($question_data['question_type']=="multiple_choice"){
        //     return $this->ben_html('multiple_choice');
        // }else if($question_data['question_type']=="true_or_false"){
        //     return $this->ben_html('true_or_false');
        // }else if($question_data['question_type']=="matching_type"){
        //     // echo "holyshet";
        //     return $this->ben_html('matching_type');
        // }else if($question_data['question_type']=="multiple_choice_multiple_answer"){
        //     return $this->ben_html('multiple_choice_multiple_answer');
        // }else if($question_data['question_type']=="fill_in_the_blanks"){
        //     return $this->ben_html('fill_in_the_blanks');
        // }
        
    }

    

}
