<?php


function getCurrentPage(){
	$current_page =pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
	return $current_page;
}


function debugger($data, $is_die="false"){

   echo "<pre>";
   print_r($data);
   echo "</pre>";

   if($is_die){
   	exit;
   }
}


function sanitize($str){
	global $conn;
	return  mysqli_real_escape_string($conn,$str);
	
}


function getUserInfoByUsername($username){
    

    global $conn;
	$sql = "SELECT *FROM users WHERE email_address = '".$username."' ";
	$query  = mysqli_query($conn,$sql);

	if(mysqli_num_rows($query) <= 0){
		return false;
	} else{
		$data = mysqli_fetch_assoc($query);
		return $data;

	}

}

function generateRandomString($length = 100){
	$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

	$leng=strlen($chars);
	for($i=0;$i<$length;$i++){
		$random.=$chars[rand(0,$leng-1)];
	}
	return $random;

}


 ?>