<?php 

require 'functions.php';
require 'db.php';

// Connect to the dabatbase
$conn = Blog\connect($config);

if ( !$conn ) {
	echo 'Could not connect to db.';
	die();
}

 ?>