<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BEN_Model extends CI_Model {

    public function all($table=""){
        
        if($table&&is_string($table)){
            $this->db->select("*");
            $this->db->where("deleted","0");
            $this->db->order_by("id","desc");
            $query = $this->db->get($table);
            $return = $query->result_array();
            return $return;
        }else{
            echo "Table name was not declared.";
            exit();
        }
    }

    public function ben_get($table="",$data=array()){
        $this->db->select("*");
        $this->db->where("id",$data['id']);
        $query = $this->db->get($table);
        $return = $query->result_array();
        return $return;
    }

    public function ben_get_by_id($table="",$id="",$select="*"){
        $this->db->select($select);
        $this->db->where("id",$id);
        $query = $this->db->get($table);
        $return = $query->result_array();
        return $return[0];
    }

    public function get($table="",$data=array()){
        $this->db->select("*");
        $this->db->where("id",$data['id']);
        $query = $this->db->get($table);
        $return = $query->result_array()[0];
        return $return;
    }

    public function all_limited($table="",$company_id=""){
        
        if($table&&is_string($table)){
            $this->db->select("*");
            $this->db->where("deleted","0");
            $this->db->where("company_owner",$company_id);
            $this->db->order_by("id","desc");
            $query = $this->db->get($table);
            $return = $query->result_array();
            return $return;
        }else{
            echo "Table name was not declared.";
            exit();
        }
    }

    public function custom($table=""){
        
        if($table&&is_string($table)){
            $query = $this->db->get($table);
            $return = $query->result_array();
            return $return;
        }else{
            echo "Table name was not declared.";
            exit();
        }
    }

    public function multiple_join($data=array()){

        if($data&&is_array($data)){
            $default_tables = array('id','company_owner','date_created','date_read','date_updated','deleted','status');
            $table_array = array();
            foreach (array_reverse($data) as $data_key => $data_value) {
                foreach ($default_tables as $default_tables_key => $default_tables_value) {
                    $table = $data_value.'.'.$default_tables_value.' as main_'.$data_value.'_'.$default_tables_value;
                    array_push($table_array,$table);
                }
            }
            foreach ($data as $data_key => $data_value) {
                $table = $data_value.'.*';
                array_push($table_array,$table);
            }
            $table_array = implode(",",$table_array);
        }

        $this->db->select($table_array);
        $this->db->from($data[0]);
        foreach ($data as $data_key => $data_value) {
            if($data_key!=0){
                $this->db->join($data_value, $data[$data_key-1].'.'.$data_value.'_id = '.$data_value.'.id');
            }
        }

        $this->db->order_by($data[0].'.date_created','desc');
        $this->db->where($data[0].'.deleted',0);
        if($this->session->userdata['company_id']!=1){
            $this->db->where($data[0].'.company_owner',$this->session->userdata['company_id']);
        }

        $query = $this->db->get();
        $return = $query->result_array();
        $escaped_return = array();

        return $return;
    }

    public function merge_multiple($array1=array(),$array2=array()){
        if(!empty($array1)){
            foreach ($array1 as $array1_key => $array1_value) {
                $merge[$array1_key] = array_merge($array1_value,$array2[$array1_key]);
            }
            $return_data = $merge;
            
        }else{
            $return_data = array();
        }
        return $return_data;
    }

	public function create($table="",$data=array()){
        
        if($table&&is_string($table)){
        	
            $escaped_data = array();
            foreach ($data as $data_key => $data_value) {
                $escaped_data[$data_key] = html_escape($data_value);
            }
            if(!array_key_exists('company_owner', $escaped_data)){
                $escaped_data['company_owner'] = $this->session->userdata['company_id'];
            }
            $escaped_data['date_created'] = date("Y-m-d H:i:s");
            if($this->db->insert($table, $escaped_data)){
                
                return $this->db->insert_id();
            }else{ 
                print_r($this->db->error());
                return false; 
            }
            
        }else{
        	echo "Table name was not declared.";
        	return false;
        }
    }

    public function synchronization($action,$id,$table){
        $synchronization_id = "synchronization_".$this->mode."_".microtime(true)*10000;
        $synchronization_id = $synchronization_id.rand(1000,1999);
        $synchronization = array(
            "id"=>$synchronization_id,
            "data_id"=>$id,
            "data_table"=>$table,
            "action"=>$action,
            "origin"=>"offline",
            "status"=>"0",
        );
        $this->db->insert("synchronization", $synchronization);
    }

    public function id_generator($table){
        $this->mode;
        $id = $table."_".$this->mode."_".microtime(true)*10000;
        $id = $id.rand(1000,1999);
        return $id;
    }

    public function create_new($table="",$data=array()){
        
        if($table&&is_string($table)){
            $this->mode;
            $id = $table."_".$this->mode."_".microtime(true)*10000;
            $id = $id.rand(1000,1999);
            $data['id'] = $id;
            
            $escaped_data = array();
            foreach ($data as $data_key => $data_value) {
                $escaped_data[$data_key] = html_escape($data_value);
            }
            if(!array_key_exists('company_owner', $escaped_data)){
                $escaped_data['company_owner'] = $this->session->userdata['company_id'];
            }
            $escaped_data['date_created'] = date("Y-m-d H:i:s");
            if($this->db->insert($table, $escaped_data)){
                $this->synchronization("create",$id,$table);
                return $id;
            }else{ 
                print_r($this->db->error());
                return false; 
            }
            
        }else{
            echo "Table name was not declared.";
            return false;
        }
    } 
    public function create_unescaped($table="",$data=array()){
        
        if($table&&is_string($table)){
            $id = $table."_".$this->mode."_".microtime(true)*10000;
            $id = $id.rand(1000,1999);
            $data['id'] = $id;
            
            $escaped_data = array();
            foreach ($data as $data_key => $data_value) {
                $escaped_data[$data_key] = $data_value;
            }
            if(!array_key_exists('company_owner', $escaped_data)){
                $escaped_data['company_owner'] = $this->session->userdata['company_id'];
            }
            $escaped_data['date_created'] = date("Y-m-d H:i:s");
            if($this->db->insert($table, $escaped_data)){
                $this->synchronization("create",$id,$table);
                return $id;
            }else{ 
                print_r($this->db->error());
                return false; 
            }
            
        }else{
            echo "Table name was not declared.";
            return false;
        }
    }

    public function update($table="",$data=array()){
        
        if($table&&is_string($table)){
        	$this->db->where("id", $data["id"]);
            $data['date_updated'] = date("Y-m-d H:i:s");
			if($this->db->update($table, $data)){
                $this->db->where("id", $data["id"]);
                $query = $this->db->get($table);
                $return = $query->result_array()[0];
                $this->synchronization("update",$data["id"],$table);
                return $return;
            }else{
                return false;
            }

                    	
        }else{   
        	echo "Table name was not declared.";
        	exit();
        }  
    }

    public function sms_update($table="",$where="",$data=array()){
        
        if($table&&is_string($table)){
            
            $this->db->where($where, $data[$where]);
            
            if($this->db->update($table, $data)){
                $this->db->where($where, $data[$where]);
                $query = $this->db->get($table);
                $return = $query->result_array();
                
                return $return;
            }else{
                return false;
            }

                        
        }else{   
            echo "Table name was not declared.";
            exit();
        }
    }

    public function ben_where($table="",$column="",$value=""){
        
        if($table&&is_string($table)){

            $return_data = $this->db->where($column, $value)->get($table)->result_array();
            if($return_data){
                return $return_data;
            }else{
                return false;
            }
            
                        
        }else{ 
            echo "Table name was not declared.";
            exit();
        }  
    }

    public function ben_where2($table="",$column="",$value=""){
        
        if($table&&is_string($table)){

            $return_data = $this->db->where($column, $value)->get($table)->result_array()[0];
            return $return_data;
                        
        }else{   
            echo "Table name was not declared.";
            exit();
        }  
    }

    public function ben_where_delete_by_id($table="",$column="",$value=""){
        
        if($table&&is_string($table)){

            $this->db->where($column, $value);
            if($this->db->delete($table)){
                return true;
            }else{
                return false;
            }

                        
        }else{   
            echo "Table name was not declared.";
            exit();
        }  
    }

    public function read($table="",$data=array()){
        
        if($table&&is_string($table)){
            $this->db->where("id", $data["id"]);
            $query = $this->db->get($table);
            $return = $query->result_array()[0];
            $data["date_read"] = date('Y-m-d H:i:s');
            $this->db->update($table, $data);
            return $return;           
        }else{
            echo "Table name was not declared.";
            exit();
        }  
    }

    public function delete($table="",$data=array()){
        
        if($table&&is_string($table)){
        	$this->db->where("id", $data["id"]);
			if($this->db->delete($table)){
                return true;
            }else{
                return false;
            }
                   	
        }else{
        	echo "Table name was not declared.";
        	exit();
        }  
    }

    public function hard_delete_by_id($table="",$id=""){
        
        if($table&&is_string($table)){
            $this->db->where("id", $id);
            if($this->db->delete($table)){
                return true;
            }else{
                return false;
            }
                    
        }else{
            echo "Table name was not declared.";
            exit();
        }  
    }

    public function soft_delete_by_id($table="",$id=""){
        
        if($table&&is_string($table)){
            $data['id'] = $id;
            $data['deleted'] = 1;
            if($this->update($table,$data)){
                return true;
            }else{
                return false;
            }

        }else{
            echo "Table name was not declared.";
            exit();
        } 
    }

    public function soft_delete($table="",$data=array()){
        
        if($table&&is_string($table)){
            
            if($this->update($table,$data)){
                return true;
            }else{
                return false;
            }

        }else{
            echo "Table name was not declared.";
            exit();
        }  
    }

    public function join($data=array()){
        if($data&&is_array($data)){
            $array_keys = array_keys($data);
            $array_values = array_values($data);
            $this->db->select('*');
            $this->db->from($array_keys[0]);
            $this->db->join($array_keys[1], $array_keys[0].'.'.$array_values[0].'='.$array_keys[1].'.'.$array_values[1]);
            $query = $this->db->get();
            $return = $query->result_array();
            return $return;            
        }else{
            echo "Join should be an array";
            exit();
        }
    }


}
