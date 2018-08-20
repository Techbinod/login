<?php 


if(!isset($_SESSION['admin_token']) || empty($_SESSION['admin_token']) || strlen($_SESSION['admin_token']) !=30){
	$_SESSION['warning']="Please login first.";
	@header('location:./');
	exit;
}else{
	/*COOKIE*/
}


 ?>