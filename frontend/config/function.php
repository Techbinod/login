<?php


function getCurrentPage(){

	$current_page = pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
	return $current_page;
}

function debugger($data,$is_die = false){
	echo "<pre>";
	print_r($data);
	echo "</pre>";

	if($is_die){
		exit;
	}
}



function getNewsId($tables){
	global $conn;
	if($conn){

	}
	$sql = "SELECT *  FROM ".$tables. "  ORDER BY id DESC LIMIT 4 ";
	$query = mysqli_query($conn, $sql);
	if(mysqli_num_rows($query) <= 0){
		return false;
	}else{
		$data=array();
		while($row = mysqli_fetch_assoc($query)){
			$data[]=$row;
		}
		return $data;
	}
}