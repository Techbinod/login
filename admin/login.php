<?php 


require 'inc/config.php';

require  'inc/functions.php';


if(isset($_POST) &&  !empty($_POST)){

  $username = sanitize($_POST['username']);

  $username = filter_var($username,FILTER_VALIDATE_EMAIL); //$username or False


 if(!$username){

 	$_SESSION['error'] = "Invalid usename.Username must be of email type";
 	@header('location:./');
 	exit;
 
 }


 $enc_password = sha1($username.$_POST['password']);


 $user_info = getUserInfoByUsername($username);

 if($user_info){

 	if($enc_password == $user_info['password']){

 		  /*multiple option can be validated*/
       $_SESSION['user_id'] = $user_info['id'];
       $_SESSION['name'] = $user_info['name'];


       $_SESSION['admin_token'] = generateRandomString(30);
       $_SESSION['success'] =  "Welcome to admin panel - ".$user_info['name']."!!";

       @header('location:dashboard');
       exit;


 	}else{
 		$_SESSION['error'] = "Password does not match";
 		@header('location:./');
 	}

 }else{
 	$_SESSION['error'] ="Username does not match.";
 	@header('location:./');
 	exit;
 }

 

} else{

	$_SESSION['error'] = "Unauthorized Access";
	@header('location:./');
	exit;
}





 ?>