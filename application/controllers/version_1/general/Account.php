<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Accounts";
        $this->view_folder = strtolower(get_class());
        
    }

    public function index(){
        
        $data_filter = $this->account_model->accounts(array('account','account_type','company'));
        $end_data_filter = $data_filter;
        end($end_data_filter);

        $end_data_filter_key = key($end_data_filter); 
        unset($data_filter[$end_data_filter_key]);

        $this->data['all_data'] = $data_filter;

        $this->sms_view(__FUNCTION__);
    }

    public function mastery_test_index(){
        
        $data_filter = $this->account_type_model->multiple_join(array('account','account_type','company'));
        $end_data_filter = $data_filter;
        end($end_data_filter);
        $end_data_filter_key = key($end_data_filter); 
        unset($data_filter[$end_data_filter_key]);

        $this->data['all_data'] = $data_filter;

        $this->ben_view(__FUNCTION__);
    }

    public function formative_test_index(){
        
        $data_filter = $this->account_type_model->multiple_join(array('account','account_type','company'));
        $end_data_filter = $data_filter;
        end($end_data_filter);
        $end_data_filter_key = key($end_data_filter); 
        unset($data_filter[$end_data_filter_key]);

        $this->data['all_data'] = $data_filter;

        $this->ben_view(__FUNCTION__);
    }

    public function create(){
        
        $this->data['all_data'] = $this->account_type_model->multiple_join(array('account_type','company'));
        $this->data['section'] = $this->account_type_model->multiple_join(array('section','grade'));
        $this->ben_view(__FUNCTION__);
    }

    public function read(){

        if($_REQUEST['id_storage']){
            $id_storage = json_decode($_REQUEST['id_storage']);
            $this->data['all_data']['company'] = $this->account_type_model->all('company');
            $this->data['update_data'] = $this->db->get_where($this->current_page['controller'],array("id"=>$id_storage[0]))->result_array()[0];
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update($account_id){

        if($account_id){
            $this->data['account_id'] = $account_id;
            $this->data['all_data'] = $this->account_type_model->multiple_join(array('account_type','company'));
            $this->data['update_data'] = $this->db->get_where($this->current_page['controller'],array("id"=>$account_id))->result_array()[0];
            $this->ben_view(__FUNCTION__);
        }else{
            $this->ben_notify(array(array("danger","No data was specified")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }
    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

    public function change($id=""){
        $this->data['update_data'] = $this->db->get_where($this->current_page['controller'],array("id"=>$id))->result_array()[0];
        $this->data['id'] = $id;
        $this->ben_view(__FUNCTION__);
    }
    public function change_password(){
        $account_id = $this->session->userdata('id');
        $password = $_REQUEST['password'];
        $confirm_password = $_REQUEST['confirm_password'];
        if($password==$confirm_password){
            $account_data['password'] = md5($password);
            $account_data['initial_login'] = 1;
            $account_data['id'] = $account_id;
            $this->session->set_flashdata('change_password_successful','success');
            if($this->account_model->sms_update('account','id',$account_data)){
                $this->ben_redirect('general/dashboard/sms_index');
            }

        }
    }

    public function change_save($id=""){
        unset($_REQUEST['_ga']);
        unset($_REQUEST['_gid']);
        unset($_REQUEST['ci_session']);
        $_REQUEST['account']['password'] = md5($_REQUEST['account']['password']);
        // print_r($_REQUEST);
        $this->form_validation->set_rules('account[password]', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('account[confirm_password]', 'Confirm Password', 'required|matches[account[password]]');
        $this->account_model->update($this->current_page['controller'],$_REQUEST['account']);
        // $this->ben_notify(array(array("success","Account password"),array("info","Please add some profile information for your account.")));
        $this->ben_redirect("general/account/change/".$_REQUEST['account']['id']);
    }

    public function save(){

        $data = $this->input->post();
        $section_data = $data['section'];
        $data = $data['account'];
        $this->form_validation->set_rules('account[username]', 'Username', 'required');
        $this->form_validation->set_rules('account[password]', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('account[confirm_password]', 'Confirm Password', 'required|matches[account[password]]');


        if($data&&$this->form_validation->run()){
            unset($data['confirm_password']);
            $data['password'] = md5($data['password']);
            if($insert_id = $this->account_model->create($this->current_page['controller'],$data)){
                if($data['account_type_id']==5){
                    $class = array(
                        "account_id"=>$insert_id,
                        "section_id"=>$section_data,
                        "semesters"=>'1,2,3,4',
                        "schoolyear"=>'2019-2020',
                        "company_owner"=>2,
                        "schoolyear_id"=>2,
                    );

                    if($this->account_model->create("classes",$class)){

                    }
                }
                $this->ben_notify(array(array("success","Account was successfully created"),array("info","Please add some profile information for your account.")));
                $this->ben_redirect("general/profile/create/".$insert_id);
            }else{
                $this->ben_notify(array(array("danger","The username has already been taken")));
                $this->ben_redirect("general/account/create");
            }
        }else{
            $this->ben_notify(array(array("warning","No data to save")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update_save(){
        if($_REQUEST){

            if($this->account_type_model->update($this->current_page['controller'],$_REQUEST['account'])){
                $this->ben_notify(array(array("success","You have successfully updated the data")));
                $this->ben_redirect("general/profile/update/".$_REQUEST['account']['id']);
            }

        }else{
            $this->ben_notify(array(array("warning","No data to update")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index/");
        }
    }
    public function reset($id=""){
        $data['id'] = $id;
        if($account = $this->account_model->reset($id)){
            $this->ben_notify(array(array("success","The username ".$account['username']." password has been reset.")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }else{
            $this->ben_notify(array(array("warning","The username ".$account['username']." password was not reset.")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }
    public function import_users(){

        $users = json_decode($this->users_data());

        foreach ($users as $user_key => $user_value) {

            $account['username'] = $user_value->username;
            $account['password'] = md5($user_value->username);

            

            if($account_id = $this->account_model->create('account',$account)){
                $classes['account_id'] = $account_id;
                $classes['section_id'] = $user_value->section_id;
                $classes['schoolyear_id'] = 1;
                $profile['account_id'] = $account_id;
                $profile['first_name'] = $user_value->first_name;
                $profile['last_name'] = $user_value->last_name;
                $profile['middle_name'] = $user_value->middle_name;
                $this->profile_model->create('profile',$profile);
                $this->profile_model->create('classes',$classes);
            }else{
                echo "no";
            }

            // $user_data[$user_key]['password'] = $user_value['password'];
            // $user_data[$user_key]['company_owner'] = 2;
            // if($user_value['su']=='1'){
            //     $user_data[$user_key]['account_type_id'] = "2";
            // }elseif($user_value['su']=='2'){
            //     $user_data[$user_key]['account_type_id'] = "4";
            // }else{
            //     $user_data[$user_key]['account_type_id'] = "5";
            // }

        }
        echo "<pre>";
        print_r($profile);
    }

    public function users_data(){
        $users = '';
        return $users;
    }

}
