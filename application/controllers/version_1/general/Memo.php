<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memo extends BEN_General {
    public $current_function;

    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Memo";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){
        
        $this->data['all_data'] = $this->memo_model->all("memo");
        $this->ben_view(__FUNCTION__);
    }

    public function create(){
        $this->data['grades'] = $this->lesson_assign_model->all('grade');
        $this->data['sections'] = $this->lesson_assign_model->all('section');
        $this->data['classes'] = $this->lesson_assign_model->get_all_classes();
        $this->ben_view_clear_with_navigation(__FUNCTION__);
    }

    public function save(){

        $realpath = 'resources/version_'.$this->app_version.'/images/company/steps/memo/';
        if(!is_dir(realpath($realpath))){

            $directory = realpath($realpath);
            if(mkdir($directory,0777,TRUE)){
                echo "directory success";
            }

        }else{
            $directory = realpath($realpath);;
        }
        
        $config['upload_path']   = $directory;
        $config['max_size']      = 1365173005;
        $config['allowed_types'] = 'gif|jpg|jpeg|png';

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('memo_file')){
            $error = array('error' => $this->upload->display_errors());
            
            print_r($error);
            exit;

        }else{

            $data = array('upload_data' => $this->upload->data());
            
            $file_data['memo_url'] = $data['upload_data']['file_name'];
            $file_data['account_ids'] = $_REQUEST['account_ids'];
            if($this->banner_model->create("memo",$file_data)){
                $this->ben_notify(array(array("success","Banner has created")));
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/index");
            }else{
                echo "unsuccessful";
            }
        }
    }

    public function view(){
        $this->data['memo_data'] = $this->memo_model->all("memo");
        $this->ben_view_clear_with_navigation(__FUNCTION__);
    }

    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

}
