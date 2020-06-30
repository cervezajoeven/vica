<?php

function ben_date($date=""){

	$date = date("h:i A, M d, Y",strtotime($date));
	return $date;
}

function ben_date_no_time($date=""){

    $date = date("M d, Y",strtotime($date));
    return $date;
}

function ben_status($status){

	$status = ($status == 1) ? "active" : "inactive";
	return $status;
}

function filter_data($data){
    unset($data['_ga']);
    unset($data['_gid']);
    unset($data['ci_session']);
    return $data;
}

function convert_to_hh_mm_ss($seconds) {
  $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

function shuffle_assoc($list) { 
  if (!is_array($list)) return $list; 

  $keys = array_keys($list); 
  shuffle($keys); 
  $random = array(); 
  foreach ($keys as $key) { 
    $random[$key] = $list[$key]; 
  }
  return $random; 
} 

function underscore_convert($data){
	$data = str_replace("_", " ", $data);
	return $data;
}
function shet(){
	echo "sslsl";
}

function remove_time($date=""){

    $date = date("Y-m-d",strtotime($date));
    return $date;
}

function roman_numeral($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

function categorize_file_type($file_type=""){
    $return_data = $file_type;
    if (strpos($file_type, 'image') !== false) {
        $return_data = 'image';
    }elseif(strpos($file_type, 'video') !== false){
        $return_data = 'video';
    }elseif(strpos($file_type, 'pdf') !== false){
        $return_data = 'pdf';
    }elseif(strpos($file_type, 'powerpoint') !== false){
        $return_data = 'ppt';
    }
    return $return_data;
}

function number_to_alphabet($number=0){
    $alpha = array('A','B','C','D','E','F','G','H','I','J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X ','Y','Z');
    return $alpha[$number];
}

function array_sort_status($sort){
    $default = $sort;
    sort($sort);

    $flag = true;
    foreach($sort as $key=>$value)
        if($value!=$default[$key])
            $flag = false;  

    if($flag)
        return true;  
    else
        return false;            
}

function id_generator(){
    
}
?>