<?php 
require 'core/init.php';

$general->logged_in_protect();

if (empty($_POST) === false) {
	
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your username and password.';
	} else if ($users->user_exists($username) === false) {
		$errors[] = 'Sorry that username doesn\'t exist.';
	} else if ($users->email_confirmed($username) === false) {
		$errors[] = 'Sorry, but you need to activate your account.
					 Please check your email.';
	} else {

		$login = $users->login($username, $password);

		if ($login === false) {
			$errors[] = 'Sorry, that username/password is incorrect';
		} else {
			$_SESSION['id'] = $login;

			header('Location: home.php'); # change to home.php later
			exit();
		}
	}
}
 ?>
 <!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Login</title>
</head>
<body>	
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Login</h1>
 
		<?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?>
		<form method="post" action="">
			<h4>Username:</h4>
			<input type="text" name="username">
			<h4>Password:</h4>
			<input type="password" name="password">
			<br>
			<input type="submit" name="submit">
		</form>
	</div>
</body>
</html>