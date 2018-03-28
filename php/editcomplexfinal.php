<?php
include_once 'dbconnect.php';
session_start();
$address = $_POST["address"];
$city = $_POST["city"];
$postalCode = $_POST["postalCode"];
$phone = $_POST["phone"];
$theatreCompID = $_SESSION['theatreCompID'];

try {
	$sql = "UPDATE theatrecomplex
	SET address = '$address', city = '$city', postalCode = '$postalCode', phone = '$phone'
  WHERE theatreCompID = '$theatreCompID'";
	$dbh->exec($sql);
	header("Location: adminpage.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
	echo $e;
}
