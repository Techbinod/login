<?php 



ob_start();
session_start();

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'cardinal';


const SITE_URL = 'http://localhost/abcd/';
const ADMIN_URL = SITE_URL.'admin/';


const ASSETS_URL = ADMIN_URL.'assets/';
const CSS_URL = ASSETS_URL.'css/';
const FONT_AWESOME_URL = ASSETS_URL.'font-awesome/';
const JS_URL = ASSETS_URL.'js/';



$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS);
mysqli_select_db($conn, DB_NAME);

mysqli_query($conn,'SET NAMES utf-8');

 ?>