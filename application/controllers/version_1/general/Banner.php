<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends BEN_General {
    public $current_function;
    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Banner";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){

        $this->data['all_data'] = $this->banner_model->all('banner');
        $this->ben_view(__FUNCTION__);
    }

    public function create(){

        $this->ben_view(__FUNCTION__);
    }

    public function update(){
        $banner_id = json_decode($_REQUEST['id_storage'])[0];
        $banner['id'] = $banner_id;
        $banner_data = $this->banner_model->ben_get('banner',$banner);
        $this->data['banner_data'] = $banner_data[0];
        $this->ben_view(__FUNCTION__);
    }

    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

    public function update_save(){

        $realpath = 'resources/uploads/banners/';
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

        if($_FILES['banner_file']['name']){

            if (!$this->upload->do_upload('banner_file')){
                $error = array('error' => $this->upload->display_errors());
                
                print_r($error);
                exit;
                
            }else{

                $data = array('upload_data' => $this->upload->data());
                $file_data['id'] = $_REQUEST['id'];
                $file_data['banner_name'] = $_REQUEST['banner_name'];
                $file_data['banner_order'] = $_REQUEST['banner_order'];
                $file_data['banner_width'] = $_REQUEST['banner_width'];
                $file_data['banner_url'] = $data['upload_data']['file_name'];
                unlink($directory.'/'.$_REQUEST['banner_url']);
                
                if($this->banner_model->update("banner",$file_data)){
                    $this->ben_notify(array(array("success","Banner has updated")));
                    $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/index");
                }else{
                    echo "unsuccessful";
                }
            }

        }else{

            $file_data['id'] = $_REQUEST['id'];
            $file_data['banner_name'] = $_REQUEST['banner_name'];
            $file_data['banner_order'] = $_REQUEST['banner_order'];
            $file_data['banner_width'] = $_REQUEST['banner_width'];

            if($this->banner_model->update("banner",$file_data)){
                $this->ben_notify(array(array("success","Banner has updated")));
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/index");
            }else{
                echo "unsuccessful";
            }

        }
        
    }

    public function save(){
        $realpath = 'resources/uploads/banners/';
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

        if (!$this->upload->do_upload('banner_file')){
            $error = array('error' => $this->upload->display_errors());
            
            print_r($error);
            exit;

        }else{

            $data = array('upload_data' => $this->upload->data());
            $file_data['banner_name'] = $_REQUEST['banner_name'];
            $file_data['banner_order'] = $_REQUEST['banner_order'];
            $file_data['banner_width'] = $_REQUEST['banner_width'];
            $file_data['banner_url'] = $data['upload_data']['file_name'];
            if($this->banner_model->create("banner",$file_data)){
                $this->ben_notify(array(array("success","Banner has created")));
                $this->ben_redirect($this->module_folder."/".$this->current_page['controller']."/index");
            }else{
                echo "unsuccessful";
            }
        }        
    }

}
