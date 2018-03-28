<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- TITLE -->
	<title>Admin</title>

	<!-- FAVICON -->
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />

	<!-- ICONS -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" type=text/css>

	<!-- CSS -->
	<link href="adminlogin.css" type="text/css" rel="stylesheet" >

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>
<body>
<h2>Admin Information</h2>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] == true) {
} else {
    echo "Log in Please";
}?>

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Member List</a></li>
  <li role="presentation"><a href="#">Theatre Complex</a></li>
  <li role="presentation"><a href="#">Movies</a></li>
  <li role="presentation"><a href="#">Popular Movie</a></li>
  <li role="presentation"><a href="#">Popular Theatre Complex</a></li>
</ul>	
	
</body>
</html>