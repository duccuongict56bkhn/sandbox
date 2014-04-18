<?php 

require '../blog.php';
use \Blog as Blog;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$title = $_POST['title'];
	$body = $_POST['body'];

	// Validation
	if ( empty($title) || empty($body)) {
		$status = 'Please fill out both fields';
	}
} else {
	// create new row
	Blog\query(
		"INSERT INTO posts(title, body) VALUES(:title, :body)", 
		array('title' => $title, 'body' => $body),
		$conn
		);
}

view('admin/create', array(
		'status' => $status
	));

?>