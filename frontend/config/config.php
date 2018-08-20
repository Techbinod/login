<?php 

ob_start();
session_start();




define('SITE_URL', 'http://localhost/cardinal/');
define('FRONTEND_URL',SITE_URL.'frontend/');
define('ASSETS_URL',FRONTEND_URL.'assets/');
define('CSS_URL', ASSETS_URL.'css/');
define('JS_URL', ASSETS_URL.'js/');
define('FONT_URL', ASSETS_URL.'fonts/');
define('IMG_URL', ASSETS_URL.'img/');
define('GALLERY_IMAGE', FRONTEND_URL.'gallery_images/');
define('PAGES_URL', FRONTEND_URL.'pages/');
define('FILES_URL', FRONTEND_URL.'files/');


define('SITE_TITLE','CIHBS');
const META_KEYWORD = 'cardinal school,cibhs,schools in pharping,private school in pharping';
const META_DESCRIPTION = 'Cardinal School is well renouned school and college in Pharping.Established on 1995 it is constantly serving in education sector with high quality at affordable fee.';


const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'cardinal';

$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
mysqli_select_db($conn, DB_NAME);

mysqli_query($conn,'SET NAMES utf-8');




 ?>