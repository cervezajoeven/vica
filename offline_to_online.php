<?php
// Check connection

$url = $_SERVER['SERVER_NAME'];
if (strpos($url,'localhost') !== false) {
	define("MODE", "offline");
}elseif(strpos($url,'192.') !== false) {
	define("MODE", "offline");
}else{
	define("MODE", "online");
}

function connect($servername = "localhost",$username = "root",$password = "",$dbname = "cms"){
	if(MODE == "online"){
		$conn = new mysqli("localhost", "joeven", "joeven241", "cms");
	}else{
		$conn = new mysqli($servername, $username, $password, $dbname);
	}
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function get($sql=""){
	$conn = connect();	
	$result = $conn->query($sql);
	$x = 0;
	$return_data = array();
	if ($result->num_rows > 0) {
	    // output data of each row
		while($row = $result->fetch_assoc()) {
		    $return_data[$x] = $row;
		    $x++;
		}
		return $return_data;
	} else {
	    return false;
	}
}

function find($table="",$where="",$value=""){
	
	$sql = "SELECT * FROM $table WHERE $where = '$value'";
	// print_r(get($sql));
	
	$return = get($sql);
	if($return){
		return $return;	
	}else{
		return false;
	}
	
}

function insert($table="",$array=array()){
	$keys = array();
	$values = array();
	foreach ($array as $key => $value) {
		// array_push($keys,$key);
		array_push($values,"'".$value."'");
	}
	$keys = implode(",", $keys);
	$values = implode(",", $values);
	
	$sql = "INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
	query($sql);

}

function query($sql=""){
	$conn = connect();	
	if($conn->query($sql)){
		return true;
	}else{
		return false;
	}
}

function update($table="",$array=array()){
	
	$set_array = array();
	$id = $array->id;
	unset($array->id);
	
	if(!$array->date_updated){
		echo "no date_updated";
		unset($array->date_updated);
		foreach ($array as $key => $value) {
			$value = str_replace("'", "''", $value);
			array_push($set_array, $key." = '".utf8_decode($value)."'");
		}
		$values = implode(",", $set_array);
		// print_r("UPDATE ".$table." SET ".$values.",date_updated=NULL WHERE id = '".$id."'");
		var_dump(query("UPDATE ".$table." SET ".$values.",date_updated=NULL WHERE id = '".$id."'"));
	}else{

		foreach ($array as $key => $value) {
			$value = str_replace("'", "''", $value);
			array_push($set_array, $key." = '".utf8_decode($value)."'");
		}
		$values = implode(",", $set_array);
		// print_r("UPDATE ".$table." SET ".$values.",date_updated=NULL WHERE id = '".$id."'");
		var_dump(query("UPDATE ".$table." SET ".$values." WHERE id = '".$id."'"));

	}
	
}

if($_REQUEST){

	foreach ($_REQUEST as $key => $value) {

		$values = json_decode($value);
		foreach ($values as $values_key => $values_value) {

			$exists = get("SELECT id FROM ".$key." WHERE id = '".$values_value->id."'");

			if(!empty($exists)){

				update($key,$values_value);
			}else{

				insert($key,$values_value);
			}
			
		}
		
	}
	
}

