<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BEN_General extends CI_Controller {
	
	public $view_folder = "home";
	public $module_folder = "general/home";
	public $page_title = "Brainee";
	public $app_version = "1";
	public $primary_database = "brainee";
	public $submitted_data = array();
	public $current_page = array();	
	public $current_function = "";
	public $toggled = array();
	public $data;
	public $mode = "";
	public $excluded = array("general/home/index","general/login/login","general/login/index","general/home/about_us","general/home/index_parallax","sms/grading_api/api_test","sms/grading_api/save_deportment","sms/grading_api/save_attendance","sms/grading_api/save_tardiness","sms/grading_api/save_grades","general/synchronization/index");

	public $notification;
	
	function __construct() {
		parent::__construct();
		$url = $_SERVER['SERVER_NAME'];
		if (strpos($url,'localhost') !== false) {
		    $this->mode = "offline";
		}elseif(strpos($url,'joeven') !== false) {
			$this->mode = "offline";
		}elseif(strpos($url,'192.') !== false||strpos($url,'172.') !== false) {
		    $this->mode = "offline";
		}else{
			$this->mode = "online";
		}
		$current_function = explode("/", $_SERVER['REQUEST_URI']);
		if($current_function[2]==""){
			header("LOCATION: /sics/index.php/version_1/general/dashboard/sms_index");
		}
		$this->current_page = strtolower(get_class($this));
		date_default_timezone_set('Asia/Manila');
		$this->helpers();
		$this->ben_initialization();

	}

	public function ben_initialization(){
		$url = $_SERVER['SERVER_NAME'];
		if (strpos($url,'localhost') !== false) {
		    $this->load->database('offline');
		}elseif(strpos($url,'192.') !== false||strpos($url,'172.') !== false) {
			$this->load->database('offline');
		}elseif(strpos($url,'joeven') !== false) {
		    $this->load->database('offline');
		}else{
			$this->load->database('online');
		}
		
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->ben_models();
		$this->ben_check_session();
		$this->ben_check_permission();
	}
	public function helpers(){
		$this->load->helper('version_'.$this->app_version.'/general/general');
	}
	public function ben_models(){
		$this->load->model("version_".$this->app_version.'/general/'.'company_model');
		$this->load->model("version_".$this->app_version.'/general/'.'crud_model');
		$this->load->model("version_".$this->app_version.'/general/'.'account_type_model');
		$this->load->model("version_".$this->app_version.'/general/'.'account_model');
		$this->load->model("version_".$this->app_version.'/general/'.'profile_model');
		$this->load->model("version_".$this->app_version.'/general/'.'schoolyear_model');
		$this->load->model("version_".$this->app_version.'/general/'.'subject_model');
		$this->load->model("version_".$this->app_version.'/general/'.'section_model');
		$this->load->model("version_".$this->app_version.'/general/'.'grade_model');
		$this->load->model("version_".$this->app_version.'/general/'.'school_status_model');
		$this->load->model("version_".$this->app_version.'/general/'.'banner_model');
		$this->load->model("version_".$this->app_version.'/general/'.'announcement_model');
		$this->load->model("version_".$this->app_version.'/general/'.'memo_model');

		// LMS Models
		$this->load->model("version_".$this->app_version.'/lms/'.'lesson_model');
		$this->load->model("version_".$this->app_version.'/lms/'.'question_model');
		$this->load->model("version_".$this->app_version.'/lms/'.'quiz_model');
		$this->load->model("version_".$this->app_version.'/lms/'.'quiz_part_model');
		$this->load->model("version_".$this->app_version.'/lms/'.'lesson_assign_model');
		$this->load->model("version_".$this->app_version.'/lms/'.'answer_sheet_model');
		// LMS Models

		// SMS Models
		$this->load->model("version_".$this->app_version.'/sms/'.'grading_model');
		// SMS Models

	}
	public function ben_check_session(){

		$excluded = $this->excluded;
   		$current_function = explode("/", $_SERVER['REQUEST_URI']);

   		if(count($current_function)<=6){
   			$current_function = $current_function[4]."/".$current_function[5]."/index";
   		}else{
   			if($current_function[6]==""){
   				$current_function = $current_function[4]."/".$current_function[5]."/index";
   			}else{
   				$current_function = $current_function[4]."/".$current_function[5]."/".$current_function[6];
   			}
   		}   		
   		if(!$this->session->has_userdata('username')){
			if(!in_array($current_function, $excluded)){
				//$this->ben_notify(array(array("warning","You need to login first.")));
				
                // $this->session->set_flashdata('wrong_credentials',"Incorrect Username or Password");
				$this->ben_redirect("general/home/index#login_label");
			}
		}else{
			if(in_array($current_function, $excluded)){
//				$this->ben_notify(array(array("info","Please logout first.")));
				$this->ben_redirect("general/dashboard/sms_index");
			}
		}

	}
	public function ben_check_permission(){

		$excluded = $this->excluded;

		if($this->session->has_userdata('username')){
			
			$current_function = explode("/", $_SERVER['REQUEST_URI']);
			$page_structure = array();
			$page_structure['module'] = $current_function[4];
	   		$page_structure['controller'] = $current_function[5];
	   		$current_page = array("module"=>$current_function[4],"controller"=>$current_function[5]);
			
	   		$page_structure['account_type_id'] = $this->session->userdata('account_type_id');

	   		if(count($current_function)<=6){
	   			$current_function = $current_function[4]."/".$current_function[5]."/index";
	   			$page_structure['action_function'] = "index";
	   		}else{
	   			if($current_function[6]==""){
	   				$current_function = $current_function[4]."/".$current_function[5]."/index";
	   				$page_structure['action_function'] = "index";
	   			}else{

	   				$page_structure['action_function'] = $current_function[6];
	   				$current_function = $current_function[4]."/".$current_function[5]."/".$current_function[6];
	   			}
	   		}
	   		$current_page['function'] = $page_structure['action_function'];
	   		$this->current_page = $current_page;
	   		$current_access = $page_structure['module']."/";
	   		$current_access .= $page_structure['controller']."/";
	   		$current_access .= $page_structure['action_function'];	

	   		$accesses_array = $this->crud_model->accesses($page_structure);
	   		// print_r($current_access);
	   		// exit();
	   		if($accesses_array){
	   			if(in_array($current_access, $accesses_array)){

		   		}else{
		   			if($current_access=="general/login/logout"){
		   				
		   			}elseif(!in_array($current_access,$excluded)){
		   				$this->ben_notify(array(array("warning","You are not allowed to access that page.")));
						$this->ben_redirect("general/dashboard/sms_index");
		   			}
		   		}
	   		}else{
	   			$this->account_model->logout($this->session->userdata());
        		$this->session->sess_destroy();
	   			$this->ben_notify(array(array("warning","You do not have access to that page.")));
				$this->ben_redirect("general/home/index");
	   		}
	   		


	   	} else{


	   	}
   		
	}
	
	public function ben_image($link=""){
		return base_url("/resources/version_".$this->app_version."/images/".$link);
	}

	public function ben_css($link=""){
		return base_url("/resources/version_".$this->app_version."/css/".$link);
	}

	public function ben_resources($link=""){
		return base_url("/resources/".$link);
	}

	public function ben_js($link=""){
		return base_url("/resources/version_".$this->app_version."/js/".$link);
	}

	public function ben_view($views=array()){
		$this->ben_header();
		$this->ben_navigation();
		$this->ben_notification();
		$this->ben_alert();
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views,$views_value);
		$this->ben_footer();
	}

	public function sms_views_default($views){

		if(is_array($views)){
			if(!array_key_exists("header", $views)){
				$views['header'] = "general/headers/header";
			}
			if(!array_key_exists("navigation", $views)){

				$views['navigation'] = "general/navigations/left_side_nav";
			}
			if(!array_key_exists("footer", $views)){
				$views['footer'] = "general/footers/footer";
			}
		}else{
			$views = array();
			$views['header'] = "general/headers/header";
			$views['navigation'] = "general/navigations/left_side_nav";
			$views['footer'] = "general/footers/footer";
		}

		return $views;
	}

	public function sms_view($views){
		
		$view_layout = $this->sms_views_default($views);
		$this->sms_header($view_layout['header']);
		
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$views_value['school_status'] = $this->school_status_model->all("school_status")[0];
        $this->sms_navigation($view_layout['navigation'],$views_value);
		if(is_string($views)){
			$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views,$views_value);
		}else if(is_array($views)){
			$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views['view'],$views_value);
		}
		
		$this->sms_footer($view_layout['footer']);
	}

	public function sms_header($header=""){
		$views_value['general_class'] = $this;
		if($header){
			$this->load->view("version_".$this->app_version."/".$header,$views_value);
		}else{
			$this->load->view("version_".$this->app_version."/general/header",$views_value);
		}
	}

	public function sms_footer($footer=""){
	   	$views_value['general_class'] = $this;
	   	$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/".$footer,$views_value);
	}

	public function sms_navigation($navigation,$views_value){
		$views_value['general_class'] = $this;
		$this->load->view("version_".$this->app_version."/".$navigation,$views_value);
	}

	public function datatable($views=array()){
		
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/general/footers/datatable_js",$views_value);
	}
	public function datatable_clear($views=array()){
		
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/general/footers/datatable_clear",$views_value);
	}

	public function ben_view_clear_with_navigation($views=array()){
		$this->ben_header();
		$this->ben_navigation();
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views,$views_value);
		$this->ben_footer();
	}

	public function ben_view_superclear($views=array()){
		
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views,$views_value);
		$this->ben_footer();
	}

	public function ben_view_ultraclear($views=array()){
		
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views,$views_value);
	}


	public function ben_html($views=array()){
		
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views,$views_value);
	}

	public function ben_view_clear($views=array()){
		$this->ben_header();
		$views_value['general_class'] = $this;
		$views_value['data'] = $this->data;
		$this->load->view("version_".$this->app_version."/".$this->module_folder."/".$this->view_folder."/".$views,$views_value);
		$this->ben_footer();
	}

	public function ben_header($header=""){
		$views_value['general_class'] = $this;
		if($header){
			$this->load->view("version_".$this->app_version."/".$header,$views_value);
		}else{
			$this->load->view("version_".$this->app_version."/general/header",$views_value);
		}
		
	}
	public function ben_link($link="home"){
		return base_url("index.php/version_".$this->app_version."/".$link);
	}
	public function ben_navigation(){
		$views_value['general_class'] = $this;
		$this->load->view("version_".$this->app_version."/general/navigation",$views_value);
	}
	public function ben_titlebar($parameters=array()){
		if($this->session->has_userdata('username')){
			
			$current_function = explode("/", $_SERVER['REQUEST_URI']);
			$page_structure = array();
			$page_structure['module'] = $current_function[4];
	   		$page_structure['controller'] = $current_function[5];
	   		$page_structure['account_type_id'] = $this->session->userdata('account_type_id');

	   		if(count($current_function)<=6){
	   			$current_function = $current_function[4]."/".$current_function[5]."/index";
	   			$page_structure['action_function'] = "index";
	   		}else{
	   			if($current_function[6]==""){
	   				$current_function = $current_function[4]."/".$current_function[5]."/index";
	   				$page_structure['action_function'] = "index";
	   			}else{

	   				$page_structure['action_function'] = $current_function[6];
	   				$current_function = $current_function[4]."/".$current_function[5]."/".$current_function[6];
	   			}
	   		}

	   		$accesses_array = $this->crud_model->accesses($page_structure);
	   		
	   		$views_value['general_class'] = $this;
	   		$views_value['accesses_array'] = $accesses_array;
	   		$views_value['page_structure'] = $page_structure;
	   		$views_value['parameters'] = $parameters;


			$this->load->view("version_".$this->app_version."/general/titlebar",$views_value);


	   	} else{


	   	}
		
	}

	public function ben_titlebar_clear($parameters=array()){
		if($this->session->has_userdata('username')){
			
			$current_function = explode("/", $_SERVER['REQUEST_URI']);
			$page_structure = array();
			$page_structure['module'] = $current_function[4];
	   		$page_structure['controller'] = $current_function[5];
	   		$page_structure['account_type_id'] = $this->session->userdata('account_type_id');

	   		if(count($current_function)<=6){
	   			$current_function = $current_function[4]."/".$current_function[5]."/index";
	   			$page_structure['action_function'] = "index";
	   		}else{
	   			if($current_function[6]==""){
	   				$current_function = $current_function[4]."/".$current_function[5]."/index";
	   				$page_structure['action_function'] = "index";
	   			}else{

	   				$page_structure['action_function'] = $current_function[6];
	   				$current_function = $current_function[4]."/".$current_function[5]."/".$current_function[6];
	   			}
	   		}

	   		$accesses_array = $this->crud_model->accesses($page_structure);
	   		
	   		$views_value['general_class'] = $this;
	   		$views_value['accesses_array'] = $accesses_array;
	   		$views_value['page_structure'] = $page_structure;
	   		$views_value['parameters'] = $parameters;


			$this->load->view("version_".$this->app_version."/general/titlebar",$views_value);


	   	} else{


	   	}
		
	}
	
	public function ben_datatable($settings=array()){
		$views_value['general_class'] = $this;
		if($settings&&is_array($settings)){
			$views_value['settings'] = $settings;
			$this->load->view("version_".$this->app_version."/general/datatable",$views_value);
		}else{
			echo "Settings should be array";
			exit;
		}
		
	}
	public function ben_footer(){
		$current_function = explode("/", $_SERVER['REQUEST_URI']);
		$page_structure = array();
		$page_structure['module'] = $current_function[4];
	   	$page_structure['controller'] = $current_function[5];
	   	$page_structure['account_type_id'] = $this->session->userdata('account_type_id');
	   	$data['page_structure'] = $page_structure;
	   	$data['general_class'] = $this;
		$this->load->view("version_".$this->app_version."/general/footer",$data);
	}
	public function ben_notification(){
		$data['general_class'] = $this;
		$data['notification'] = $this->session->userdata('notification');
		if($this->session->userdata('notification')){
			$this->load->view("version_".$this->app_version."/general/notification",$data);
		}	
	}
	public function ben_alert(){
		$this->load->view("version_".$this->app_version."/general/alert");
	}
	public function ben_notify($notification=array()){
		$_SESSION['notification'] = $notification;
		$this->session->mark_as_flash('notification');
	}
	public function ben_redirect($value="home"){
		redirect('/version_'.$this->app_version.'/'.$value);

	}
	public function ben_redirect2($link="home"){
		return redirect(base_url("index.php/version_".$this->app_version."/".$link));
	}
	public function ben_open_form($value = ""){
		return form_open('/version_'.$this->app_version.'/'.$value);
	}

	public function ben_general_delete($table,$function="index"){
		if($_REQUEST['id_storage']){

            $id_storage = json_decode($_REQUEST['id_storage']);
            $delete_status = array();
            
            foreach ($id_storage as $id_storage_key => $id_storage_value) {
                $data = array(
                    "id"=>$id_storage_value,
                    "deleted"=>1,
                );
                if($this->account_model->soft_delete($table,$data)){
                    array_push($delete_status, 1);
                }else{
                    array_push($delete_status, 0);
                }
            }
            if(in_array(0, $delete_status)){
                $this->ben_notify(array(array("danger","Some of the data was not deleted.")));
                
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/".$function);
            }else{

                $this->ben_notify(array(array("danger","All data was successfully deleted")));
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/".$function);
            }
            

        }else{
            $this->ben_notify(array(array("danger","Please select an item to delete")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
	}

	public function ben_field($data=array()){
		$the_field = "";

		if($data['field']){
			$field = $data['field'];
		}else{
			echo "field was not declared";
			exit;
		}
		$the_field .= '<div class="form-group">';

	}

}
