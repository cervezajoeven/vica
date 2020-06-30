<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends BEN_General {
    public $current_function;

    function __construct() {

        parent::__construct();
        $this->module_folder = "general";
        $this->page_title = "Announcement";
        $this->view_folder = strtolower(get_class());
    }

    public function index(){

        $this->data['all_data'] = $this->announcement_model->multiple_join(array('announcement','account'));
        $this->ben_view(__FUNCTION__);
    }

    public function create(){

        $this->ben_view(__FUNCTION__);
    }

    public function update(){
        $id = json_decode($_REQUEST['id_storage'])[0];
        $data['id'] = $id;
        $data = $this->announcement_model->ben_get('announcement',$data);
        $this->data['data'] = $data[0];
        $this->ben_view(__FUNCTION__);
    }

    public function delete(){
        $this->ben_general_delete($this->current_page['controller']);
    }

    public function save(){
        // print_r($_REQUEST);
        unset($_REQUEST['_ga']);
        unset($_REQUEST['_gid']);

        // exit();
        if($_REQUEST){
            $_REQUEST['account_id'] = $this->session->userdata('id');
            unset($_REQUEST['ci_session']);
            print_r($_REQUEST);
            if($this->announcement_model->create('announcement',$_REQUEST)){

                $this->ben_notify(array(array("success","Announcement was successfully saved.")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }else{
                $this->ben_notify(array(array("danger","Announcement was not successfully saved.")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("danger","No data can be saved.")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }
    }

    public function update_save(){

        if($_REQUEST){
            $_REQUEST['account_id'] = $this->session->userdata('id');
            unset($_REQUEST['ci_session']);
            print_r($_REQUEST);
            if($this->announcement_model->update('announcement',$_REQUEST)){

                $this->ben_notify(array(array("success","Announcement was successfully saved.")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }else{
                $this->ben_notify(array(array("danger","Announcement was not successfully saved.")));
                $this->ben_redirect("general/".$this->current_page['controller']."/index");
            }
        }else{
            $this->ben_notify(array(array("danger","No data can be saved.")));
            $this->ben_redirect("general/".$this->current_page['controller']."/index");
        }

    }
}
