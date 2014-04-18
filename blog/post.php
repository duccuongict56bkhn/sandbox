<?php 
require 'blog.php';
use \Blog as Blog;

if ( !$conn ) {
	echo 'Could not connect to db.';
}
else {
	// Fetch all the post
	$post = Blog\get_by_id((int)$_GET['id'], $conn);
	if ( $post ) {
		$post = $post[0];
		view('post', array(
		  'post' => $post
		));
	} else {
		header('location:/sandbox/blog/');
	}
}
?>