<?php 
require 'blog.php';
use \Blog as Blog;

	// Fetch all the post
	$posts = Blog\get('posts', $conn, 10);
	//var_dump($posts);
	// Filter through and display in the view

	view('index', array(
		  'posts' => $posts
		));
?>