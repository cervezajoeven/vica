<?php
class Lesson_model extends BEN_Model {

	public $table = "lesson";

    public function teacher_lessons(){

        $this->db->from('lesson');
        $this->db->join('subject as a', 'a.id = lesson.subject_id','left');
        $this->db->join('grade as b', 'b.id = lesson.grade_id','left');
        $this->db->join('account as c', 'c.id = lesson.account_id','left');
        $this->db->join('semester as d', 'd.id = lesson.semester_id','left');


        $this->db->select('
            lesson.*,
            lesson.id as id,
            semester,
            lesson.date_created as date_created,
            a.subject_name as subject_name,
            c.id as account_id,
            b.grade_name as grade_name,
            (SELECT grades FROM lesson_assign WHERE lesson_id=lesson.id LIMIT 1) as grades,
            (SELECT sections FROM lesson_assign WHERE lesson_id=lesson.id LIMIT 1) as sections,
        ');
        $this->db->where("lesson.deleted",0);
        $this->db->where("lesson.assignment",0);
        $this->db->where("account_id",$this->session->userdata("id"));
        $this->db->order_by("id","desc");
        $this->db->error();
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }
    public function lesson_schedule($grade=""){

        $this->db->from('lesson_assign');
        $this->db->join('lesson', 'lesson.id = lesson_assign.lesson_id','left');
        $this->db->join('profile', 'profile.account_id = lesson.account_id','left');

        $this->db->select('
            lesson_name,
            start_date,
            end_date,
            lesson_assign.grades,
            lesson_assign.sections as sections,
            lesson.deleted as lesson_deleted,
            lesson_assign.deleted as lesson_assign_deleted,
            profile.last_name as last_name,
        ');
        // $this->db->where('lesson.deleted',0);
        $this->db->where('lesson_assign.deleted',0);
        $this->db->where('lesson.account_id',$this->session->userdata('id'));
        if($grade){
            $this->db->where("FIND_IN_SET('".$grade."', lesson_assign.grades) !=", 0);
        }
        
        $this->db->error();
        $query = $this->db->get();

        $return = $query->result_array();
        return $return;
    }
    public function lesson_schedule_admin($grade=""){

        $this->db->from('lesson_assign');
        $this->db->join('lesson', 'lesson.id = lesson_assign.lesson_id','left');
        $this->db->join('profile', 'profile.account_id = lesson.account_id','left');

        $this->db->select('
            lesson_name,
            start_date,
            end_date,
            lesson_assign.grades,
            lesson_assign.sections as sections,
            lesson.deleted as lesson_deleted,
            lesson_assign.deleted as lesson_assign_deleted,
            profile.last_name as last_name,
        ');
        // $this->db->where('lesson.deleted',0);
        $this->db->where('lesson_assign.deleted',0);
        if($grade){
            $this->db->where("FIND_IN_SET('".$grade."', lesson_assign.grades) !=", 0);
        }
        
        $this->db->error();
        $query = $this->db->get();

        $return = $query->result_array();
        return $return;
    }
    public function optimize_lessons(){

        $this->db->from('lesson');
        // $this->db->join('lesson_assign', 'lesson.id = lesson_assign.lesson_id','left');
        $this->db->select('
            *,
            lesson.deleted as lesson_deleted,
        ');
        $this->db->error();
        $query = $this->db->where('lesson.deleted',1);
        $query = $this->db->get();
        $return = $query->result_array();
        foreach ($return as $return_key => $return_value) {
            $lesson_assign_data = array("lesson_id"=>$return_value['id'],"deleted"=>1);
            $this->lesson_model->sms_update("lesson_assign","lesson_id",$lesson_assign_data);
        }
        return $return;
    }
    public function update_sort_order($data){
        $this->db->where("id",$data['id']);
        print_r($data);
        if($this->db->update("file", $data)){
            return true;
        }
        return false;
    }

    public function lesson_packages(){

        $this->db->from('lesson');
        $this->db->join('subject as a', 'a.id = lesson.subject_id','left');
        $this->db->join('grade as b', 'b.id = lesson.grade_id','left');
        $this->db->join('account as c', 'c.id = lesson.account_id','left');
        $this->db->join('semester as d', 'd.id = lesson.semester_id','left');

        $this->db->select('
            lesson.*,
            lesson.id as id,
            semester,
            account_type_id,
            lesson.date_created as date_created,
            a.subject_name as subject_name,
            c.id as account_id,
            b.grade_name as grade_name,
            (SELECT grades FROM lesson_assign WHERE lesson_id=lesson.id LIMIT 1) as grades,
            (SELECT sections FROM lesson_assign WHERE lesson_id=lesson.id LIMIT 1) as sections,
        ');
        $this->db->where("lesson.deleted",0);
        $this->db->where("lesson.assignment",0);
        $this->db->where("account_type_id",3);
        $this->db->order_by("id","desc");
        $this->db->error();
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    public function assignment_lessons(){

        $this->db->from('lesson');
        $this->db->join('subject as a', 'a.id = lesson.subject_id','left');
        $this->db->join('grade as b', 'b.id = lesson.grade_id','left');
        $this->db->join('account as c', 'c.id = lesson.account_id','left');
        $this->db->join('semester as d', 'd.id = lesson.semester_id','left');

        $this->db->select('
            lesson.*,
            lesson.id as id,
            lesson.date_created as date_created,
            a.subject_name as subject_name,
            c.id as account_id,
            b.grade_name as grade_name,
        ');
        $this->db->where("lesson.deleted",0);
        $this->db->where("lesson.assignment",1);
        $this->db->where("account_id",$this->session->userdata("id"));
        $this->db->order_by("id","desc");
        $this->db->error();
        $query = $this->db->get();
        $return = $query->result_array();
        return $return;
    }

    public function teacher_shared(){

        $this->db->from('lesson');
        $this->db->join('subject as a', 'a.id = lesson.subject_id','left');
        $this->db->join('grade as b', 'b.id = lesson.grade_id','left');
        $this->db->join('account as c', 'c.id = lesson.account_id','left');
        $this->db->join('semester as d', 'd.id = lesson.semester_id','left');

        $this->db->select('
            lesson.*,
            lesson.id as id,
            lesson.date_created as date_created,
            a.subject_name as subject_name,
            c.username as username,
            c.id as account_id,
            b.grade_name as grade_name,
        ');
        $this->db->where("account_id",$this->session->userdata("id"));
        $this->db->where("lesson.deleted",0);
        $this->db->where("shared",1);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

	public function get_file_data_by_id($file_id=""){

		$data['id'] = $file_id;
		if($return_data = $this->lesson_model->ben_get('file',$data)[0]){
			return $return_data;
		}
		return array();
	}

	public function delete_file_by_id($file_id=""){
        $this->db->where("id",$file_id);
        if($this->db->delete('file')){
        	return true;
        }else{
        	return false;
        }
        
	}

	public function all_shared_lesson(){
        $this->db->from('lesson');
        $this->db->join('subject as a', 'a.id = lesson.subject_id','left');
        $this->db->join('grade as b', 'b.id = lesson.grade_id','left');
        $this->db->join('account as c', 'c.id = lesson.account_id','left');
        $this->db->join('semester as d', 'd.id = lesson.semester_id','left');

        $this->db->select('
            lesson.*,
            lesson.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("shared",1);
        $this->db->where("lesson.deleted",0);
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

    public function all_shared_lesson_where_not_teacher(){
        $this->db->from('lesson');
        $this->db->join('subject as a', 'a.id = lesson.subject_id','left');
        $this->db->join('grade as b', 'b.id = lesson.grade_id','left');
        $this->db->join('account as c', 'c.id = lesson.account_id','left');
        $this->db->join('semester as d', 'd.id = lesson.semester_id','left');

        $this->db->select('
            lesson.*,
            lesson.id as id,
            a.subject_name as subject_name,
            b.grade_name as grade_name,
            c.username as username,
            d.semester as semester,
        ');
        $this->db->where("shared",1);
        $this->db->where("lesson.deleted",0);
        $this->db->where("account_id !=",$this->session->userdata('id'));
        $this->db->order_by("id","desc");
        $query = $this->db->get();
        $return = $query->result_array();

        return $return;
    }

	public function get_lesson_data_by_id($lesson_id=""){
		$data['id'] = $lesson_id;
		return $this->lesson_model->ben_get('lesson',$data)[0];
	}

	public function get_files_by_lesson_id($lesson_id=""){

		$this->db->select("*");
        $this->db->where("lesson_id",$lesson_id);
        $this->db->where("deleted",0);
        $this->db->order_by("file_order","asc");
        $this->db->order_by("folder","asc");
        $query = $this->db->get('file');
        $return = $query->result_array();
        return $return;

	}
	

}