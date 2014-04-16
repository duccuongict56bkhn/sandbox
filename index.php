<?php
	// $months = array("January", "February", "March", "April", "May", "June",
	//  "July", "August", "September", "October", "November", "December");
	$tuts_sites = array(
		"nettuts" => "http://net.tutsplus.com",
		"psdtuts" => "http://psd.tutsplus.com",
		"wptuts" => "http://wp.tutsplus.com"
	);

	$number = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP Test | <?php echo date('Y');?></title>
</head>
<body>
	<h1>Tuts+ Site</h1>
	<ul>
		 <?php
		 	foreach ($tuts_sites as $name => $url) {
		 		echo "<li><a href=\"$url\" target=\"_blank\">" . ucwords($name) . "</a></li>";
		 	}
		 ?>
	</ul>

	<?php 
		if ($number == true) {
			echo "It does";
		} else {
			echo "Not the right month";
		}
	?>
</body>
</html>