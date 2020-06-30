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
		$conn = new mysqli("166.62.10.190", "joeven", "Joeven241", "sanisidro");
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

//get synchronization ->synchronization.php
$online_data = Array
(
    "id" => "synchronization_offline_15631111509169"
    "data_id" => "file_offline_15631111509120"
    "data_table" => "file"
    "action" => "create"
    "priority" =>""
    "origin" => "offline"
    "status" => "0"
    "date_created" => "2019-07-14 21:32:31"
    "date_updated" => "0000-00-00 00:00:00"
);
//get data synch ->retrieve.php


// Create connection
$synchronization = get("SELECT * FROM synchronization");
// print_r($synchronization);

foreach ($synchronization as $synchronization_key => $synchronization_value) {
	print_r($synchronization_value);
	// echo $synchronization_value['data_table'];
	// echo $synchronization_value['data_id'];
	if(find($synchronization_value['data_table'],'id',$synchronization_value['data_id'])[0]){
		if($synchronization_value['action']=="create"){

		}elseif($synchronization_value['action']=="update"){

		}
	}else{

	}
	// if(find($synchronization_value['data_table'],"id",$synchronization_value['data_id'])){
	// 	echo "may ara";
	// }else{
	// 	echo "wala";

	// }
}


?>