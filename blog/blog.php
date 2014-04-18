<?php 
require 'functions.php';
require 'db.php';

use \Blog as Blog;

// Connect to the dabatbase
$conn = Blog\connect($config);

if ( !$conn ) {
	echo 'Could not connect to db.';
	die();
}

 ?>