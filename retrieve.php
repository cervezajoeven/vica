<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<h1>Please Don't Close This</h1>
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
$school = "sics";
function connect($servername = "localhost",$username = "root",$password = "",$dbname = "cms"){
	if(MODE == "online"){
		$conn = new mysqli("localhost", "sanisidr_joeven", "Joeven241!", "sanisidr_cms");
	}else{
		$conn = new mysqli($servername, $username, $password, $dbname);
	}
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function query($sql=""){
	$conn = connect();	
	$conn->query($sql);
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
		echo "there is a date_updated";
		foreach ($array as $key => $value) {
			$value = str_replace("'", "''", $value);
			array_push($set_array, $key." = '".utf8_decode($value)."'");
		}
		$values = implode(",", $set_array);

		var_dump(query("UPDATE ".$table." SET ".$values." WHERE id = '".$id."'"));

	}

	
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

function insert($table="",$array=array()){
	$keys = array();
	$values = array();
	foreach ($array as $key => $value) {
		$value = str_replace("'", "''", $value);
		array_push($keys,$key);
		array_push($values,"'".$value."'");
	}
	$keys = implode(",", $keys);
	$values = implode(",", $values);
	
	$sql = "INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
	query($sql);

}

function find($table="",$where="",$value=""){
	
	$sql = "SELECT * FROM $table WHERE $where = '$value'";
	
	$return = get($sql);
	if($return){
		return $return;	
	}else{
		return false;
	}
	
}
echo "<pre>";
$tables = array("attempt","file","lesson","lesson_assign","optical","optical_answer_sheet","quiz","quiz_assign","schedule","profile","account","survey","survey_sheets");
// $tables = array("attempt");

$online_url = 'http://campuscloudph.com/'.$school.'/online_retrieve.php';
$ch = curl_init($online_url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_POSTREDIR, 3);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$online_fetch = json_decode(curl_exec($ch));
curl_close($ch);
// print_r($online_fetch);
if(!empty($online_fetch)){
	foreach ($tables as $tables_key => $tables_value) {
	
		$online_data = $online_fetch->$tables_value;

		$offline_data = get("SELECT id,date_created,date_updated FROM ".$tables_value);

		$online_ids = array();
		$offline_ids = array();

		$online_with_date = array();
		if(!empty($online_data)){
			foreach ($online_data as $key => $value) {

				if($value->date_updated){
					$online_with_date[$value->id] = $value->date_updated;
				}else{
					$online_with_date[$value->id] = $value->date_created;
				}
				
			}
		}
		

		$offline_with_date = array();
		if(!empty($offline_data)){
			foreach ($offline_data as $key => $value) {

				if($value['date_updated']){
					$offline_with_date[$value['id']] = $value['date_updated'];
				}else{
					$offline_with_date[$value['id']] = $value['date_created'];
				}
			}
		}


		//populating ids
		if(!empty($online_data)){
			foreach ($online_data as $key => $value) {
				array_push($online_ids, $value->id);
			}
		}
		if(!empty($offline_data)){
			foreach ($offline_data as $key => $value) {
				array_push($offline_ids, $value['id']);
			}
		}
		//populating ids

		//checking id similarities
		$similar_ids = array();
		$new_online_ids = array();

		foreach ($online_ids as $key => $value) {
			if(in_array($value, $offline_ids)){
				array_push($similar_ids, $value);
			}else{
				array_push($new_online_ids, $value);
			}
		}

		$new_offline_ids = array();
		foreach ($offline_ids as $key => $value) {
			if(in_array($value, $online_ids)){

			}else{
				array_push($new_offline_ids, $value);
			}
		}

		//checking id similarities


		$priorities = array();

		foreach ($similar_ids as $similar_ids_key => $similar_ids_value) {
			// echo $similar_ids_value." = ".strtotime($online_with_date[$similar_ids_value])."<br>";
			// echo $similar_ids_value." = ".strtotime($offline_with_date[$similar_ids_value])."<br>";

			if(strtotime($online_with_date[$similar_ids_value])>strtotime($offline_with_date[$similar_ids_value])){
				// echo "online is bigger <br>";
				$priorities["online"][$similar_ids_key] = $similar_ids_value;
			}else if(strtotime($online_with_date[$similar_ids_value])<strtotime($offline_with_date[$similar_ids_value])){
				// echo "offline is bigger <br>";
				$priorities["offline"][$similar_ids_key] = $similar_ids_value;
			}
		}

		print_r("priorities<br>");
		print_r($priorities);
		if(array_key_exists("online", $priorities)){
			$url = 'http://campuscloudph.com/'.$school.'/get_data.php';
			$fields = $priorities["online"];
			$fields['table'] = $tables_value;
			$fields_string = "";
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			$online_retrieve = json_decode(curl_exec($ch));
			// echo "online retrieve exists";
			// print_r($online_retrieve);
			curl_close($ch);
		}else{
			$online_retrieve = array();
		}

		//online to offline update

		
		foreach ($online_retrieve as $key => $value) {
			
			foreach ($value as $value_key => $value_value) {


				update($key,$value_value);
			}
		}
		//online to offline update

		//offline to online update
		if(array_key_exists("offline", $priorities)){
			$data_to_online = array();
			foreach ($priorities['offline'] as $key => $value) {
				$data_to_online[$key] = get("SELECT * FROM ".$tables_value." WHERE id='".$value."' ")[0];
				$data_to_online[$key] = array_map('utf8_encode', $data_to_online[$key]);
			}
			
			$url = 'http://campuscloudph.com/'.$school.'/offline_to_online.php';
			$fields = array();
			$fields[$tables_value] = json_encode($data_to_online);
			//print_r($fields);
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			// curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
			// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_exec($ch);
			curl_close($ch);
		}
		//offline to online update

		//offline to online new
		echo "offline to online new id's<br> ";
		// echo "offline to online IDS";
		
		print_r($new_offline_ids);
		
		if(!empty($new_offline_ids)){

			foreach ($new_offline_ids as $key => $value) {
				$data_to_online_new[$key] = get("SELECT * FROM ".$tables_value." WHERE id='".$value."' ")[0];
				$data_to_online_new[$key] = array_map('utf8_encode', $data_to_online_new[$key]);
			}

			$url = 'http://campuscloudph.com/'.$school.'/offline_to_online.php';
			$fields = array();
			$fields[$tables_value] = json_encode($data_to_online_new);

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
			curl_exec($ch);
			curl_close($ch);
		}
		//offline to online new
		echo "online to offline IDS <br>";
		print_r($new_online_ids);
		//online to offline new
		if(!empty($new_online_ids)){
			$url = 'http://campuscloudph.com/'.$school.'/get_data.php';
			$fields = $new_online_ids;
			$fields['table'] = $tables_value;
			$fields_string = "";
			foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
			rtrim($fields_string, '&');

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			$online_to_offline_new = json_decode(curl_exec($ch));
			curl_close($ch);

			foreach ($online_to_offline_new as $key => $value) {

				foreach ($value as $value_key => $value_value) {
					insert($key,$value_value);
				}
			}
		}
		//online to offline new
	}
}


?>
<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function() {
	      	location.reload();
	    }, 3000);
		
	});
</script>