 <!DOCTYPE html>
 <html>
 <head>
 	<title>Super Globals</title>
 </head>
 <body>
 	<h1>Super Globals | About</h1>
 	<a href="index.php">Index</a>
 	<?php 
 		echo htmlspecialchars($_GET['name']);
 	 ?>
 </body>
 </html>