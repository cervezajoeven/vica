<?php
class Reports_model extends BEN_Model {

    public $table = "account";

    public function total_lessons(){
        $this->db->select('COUNT(account.id) as count,lesson.account_id,account.account_type_id');
        $this->db->from('lesson');
        $this->db->join('account','account.id = lesson.account_id','left');
        $this->db->where('account.account_type_id', 4);
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    public function total_quizzes(){
        $this->db->select('COUNT(account.id) as count,quiz.account_id,account.account_type_id');
        $this->db->from('quiz');
        $this->db->join('account','account.id = quiz.account_id','left');
        $this->db->where('account.account_type_id', 4);
        $this->db->like('quiz.id', 'quiz');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
//        $this->db->select('account.id as id,account.username,first_name,last_name,logged');
//        $this->db->from('account');
//        $this->db->join('account_type','account_type.id = account.account_type_id','left');
//        $this->db->join('profile','profile.account_id = account.id','left');
//        $this->db->join('classes','classes.account_id = account.id','left');
//        $this->db->join('section','section.id = classes.section_id','left');
//        $this->db->join('grade','grade.id = section.grade_id','left');
//        $this->db->where('account.deleted', 0);
//        $this->db->where('account.account_type_id!=','3');
//        $query = $this->db->get();
//        $return = $query->result_array();

    }

    public function assigned_lessons(){
        $this->db->select('COUNT(account.id) as count,lesson_assign.account_id,account.account_type_id');
        $this->db->from('lesson_assign');
        $this->db->join('account','account.id = lesson_assign.account_id','left');
        $this->db->where('account.account_type_id', 4);
        $this->db->like('lesson_assign.id', 'lesson_assign');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
//        $this->db->select('account.id as id,account.username,first_name,last_name,logged');
//        $this->db->from('account');
//        $this->db->join('account_type','account_type.id = account.account_type_id','left');
//        $this->db->join('profile','profile.account_id = account.id','left');
//        $this->db->join('classes','classes.account_id = account.id','left');
//        $this->db->join('section','section.id = classes.section_id','left');
//        $this->db->join('grade','grade.id = section.grade_id','left');
//        $this->db->where('account.deleted', 0);
//        $this->db->where('account.account_type_id!=','3');
//        $query = $this->db->get();
//        $return = $query->result_array();

    }

    public function assigned_quizzes(){
        $this->db->select('COUNT(account.id) as count,quiz_assign.account_id,account.account_type_id');
        $this->db->from('quiz_assign');
        $this->db->join('account','account.id = quiz_assign.account_id','left');
        $this->db->where('account.account_type_id', 4);
        $this->db->like('quiz_assign.id', 'quiz_assign');
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
//        $this->db->select('account.id as id,account.username,first_name,last_name,logged');
//        $this->db->from('account');
//        $this->db->join('account_type','account_type.id = account.account_type_id','left');
//        $this->db->join('profile','profile.account_id = account.id','left');
//        $this->db->join('classes','classes.account_id = account.id','left');
//        $this->db->join('section','section.id = classes.section_id','left');
//        $this->db->join('grade','grade.id = section.grade_id','left');
//        $this->db->where('account.deleted', 0);
//        $this->db->where('account.account_type_id!=','3');
//        $query = $this->db->get();
//        $return = $query->result_array();

    }



}