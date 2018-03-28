<?php
include_once 'dbconnect.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$postalCode = $_POST["postalCode"];
$emailAddress = $_POST["emailAddress"];
$phoneNumber = $_POST["phoneNumber"];

$password = $_POST["password"];

try {
  session_start();
  $username = $_SESSION['username'];
	$sql = "UPDATE customer
	SET fname = '$fname', lname = '$lname', address = '$address', city = '$city', postalCode = '$postalCode', emailAddress = '$emailAddress', phoneNumber = '$phoneNumber', password = '$password'
  WHERE username = '$username'";
	$dbh->exec($sql);
	header("Location: ../loggedin.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
}
$conn = null;
