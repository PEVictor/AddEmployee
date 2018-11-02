<!DOCTYPE html>
<html>
<head>
	<title>AddEmployee</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<nav class="navbar">
		<a href="index.php" class="navbar-brand">AddEmployee</a>
		<?php
		if ($logged) {
			echo '
			<div>
				<p class="navbar-text">Welcome, '.$name.'!</p>
				<a href="index.php" class="navbar-brand">Home</a>
				<a href="?nav=options" class="navbar-brand">Options</a>
				<a href="?nav=close" class="navbar-brand">Close session</a>
			</div>
			';
		}
		?>
		
	</nav>