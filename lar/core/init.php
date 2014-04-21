<?php 
session_start();
require 'connect/database.php';
require 'classes/users.php';
require 'classes/general.php';
require 'classes/bcrypt.php';
 
$users 		= new Users($db);
$general 	= new General();
$bcrypt 	= new Bcrypt(12);
 
error_reporting(0);
 
if ($general->logged_in() === true)  {
	$user_id 	= $_SESSION['id'];
	$user 	= $users->userdata($user_id);
}
 
$errors = array();
 
// ob_start(); 
?>