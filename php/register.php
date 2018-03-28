<?php
include_once 'dbconnect.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$postalCode = $_POST["postalCode"];
$emailAddress = $_POST["emailAddress"];
$phoneNumber = $_POST["phoneNumber"];
$username = $_POST["username"];
$password = $_POST["password"];

try {
	$sql = "INSERT INTO customer (fname, lname, address, city, postalCode, emailAddress, phoneNumber, username, password)
	VALUES ('$fname', '$lname', '$address', '$city', '$postalCode', '$emailAddress', '$phoneNumber', '$username', '$password')";
	$dbh->exec($sql);
	session_start();
	$_SESSION['loggedin'] = true;
	$_SESSION['admin'] = false;
	$_SESSION['username'] = $username;
	header("Location: ../loggedin.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
}
$conn = null;
