<?php
// Check connection
header('Content-Type: application/json; Charset=UTF-8');
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

if($_REQUEST){
	
	$table = $_REQUEST['table'];
	unset($_REQUEST['table']);
	$return_data[$table] = array();
	foreach ($_REQUEST as $key => $value) {
		$data = get("SELECT * FROM ".$table." WHERE ID = '$value'");
			$data[0] = array_map("utf8_encode", $data[0] );
			array_push($return_data[$table], $data[0]);
		
	}
	
}
//echo "bulshit";
// print_r($return_data);
echo json_encode($return_data);
