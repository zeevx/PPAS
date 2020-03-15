<!--
Arthur ==> ADAMS PAUL OHIANI
Title ==> ADVANCED WEB LOGIN OPTION(PATTERN)

-->

<?php
	require_once("application/session.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home | AuthX</title>
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/header-fixed.css">
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
</head>
<body>
<header class="header-fixed">
	<div class="header-limiter">
		<h1><a href="#">Auth<span>X</span></a></h1>
		<nav>
			<a href="home.php">Home</a>
			<a>|</a>
			<a href="profile.php">Profile</a>
			<a>|</a>
			<a href="changepass.php">Change Password</a>
           	<a>|</a>
			<a href="changepat.php">Change Pattern</a>
			<a>|</a> &nbsp;
			<a href="application/logout.php?logout=true" class="logout-btn">Logout</a>
		</nav>
	</div>
</header>
<!-- You need this element to prevent the content of the page from jumping up -->
<div class="header-fixed-placeholder"></div>
<!-- The content of your page would go here. -->

<div class="menu">
	<h1>Default home page</h1>
</div>
<div>
	<h2 style="text-align:center; margin-top:40px">Default homepage can be changed by editing configurations.php file<p><a href="#">Click here for full documentation</a></p></h2>
</center>

<!-- Your scripts. -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Your scripts. -->
</body>

</html>
