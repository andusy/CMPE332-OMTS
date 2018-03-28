<?php
include_once 'dbconnect.php';

$address = $_POST["address"];
$city = $_POST["city"];
$postalCode = $_POST["postalCode"];
$phone = $_POST["phone"];

try {
	$sql = "INSERT INTO theatrecomplex (address, city, postalCode, phone)
	VALUES ('$address', '$city', '$postalCode', '$phone')";
	$dbh->exec($sql);
	header("Location: adminpage.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
  echo $e;
}
$conn = null;
