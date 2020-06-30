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

$online_url = "http://localhost/sanisidro/retrieve.php";
 $ch = curl_init($online_url);                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_POSTREDIR, 3);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow http 3xx redirects
    $resp_orders = curl_exec($ch); // execute
print_r($resp_orders);
// echo "<pre>";

// if($online_data == "false"){
		
// }else{

// }

?>