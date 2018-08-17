<?php 


session_start();

session_destroy();
/*cookies could be also destroyed here*/

@header('location:./');
exit;

 ?>