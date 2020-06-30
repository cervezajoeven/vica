<?php
class Survey_report_model extends BEN_Model {

	public $table = "survey";

	public function all_survey() {

        #Create where clause
        $this->db->select('survey_id');
        $this->db->from('survey_sheet');
        $sub_query = $this->db->get_compiled_select();
        //$this->db->_reset_select();

        $this->db->select('*,survey.date_created as date_created, survey.id as id');
        $this->db->from('survey');
        $this->db->join('profile', 'profile.account_id = survey.account_id','left');
        $this->db->where('survey.deleted', 0);
        $this->db->where('survey.sheet !=', null);
        $this->db->where('survey.sheet !=', '');
        $this->db->where('survey.survey_file !=', null);
        $this->db->where('survey.survey_file !=', '');
        $this->db->where_in('$sub_query');
        $this->db->order_by('survey.date_created',"desc");

        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function survey($id) {

        $this->db->select('sheet');
        $this->db->from('survey');
        $this->db->where('survey.id', $id);

        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function survey_sheets($id) {
        $this->db->select('survey_sheets.id, survey_sheets.account_id, respond, survey.id AS survey_id, survey.survey_name AS survey_name, survey.survey_file AS survey_pdf_file_name, survey.date_created AS survey_date_created');
        $this->db->from('survey_sheets');
        $this->db->join('survey', 'survey.id = survey_sheets.survey_id', 'left');
        $this->db->where('survey_sheets.survey_id', $id);
        $this->db->where('survey_sheets.respond !=', null);
        $this->db->where('survey_sheets.respond !=', '');

        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }

    public function survey_responses($id) {
        $this->db->select('respond');
        $this->db->from('survey_sheets');
        $this->db->where('survey_id', $id);
        $this->db->where('respond !=', null);
        $this->db->where('respond !=', '');

        $query = $this->db->get();
        $result = $query->result_array();

        return $result;
    }
}
