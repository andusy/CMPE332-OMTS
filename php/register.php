<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$street = $_POST["street"];
$city = $_POST["city"];
$postalCode = $_POST["postalCode"];
$emailAddress = $_POST["emailAddress"];
$phoneNumber = $_POST["phoneNumber"];
$username = $_POST["username"];
$password = $_POST["password"];
$host = "127.0.0.1";
$dbname = "omtsdb";
$user = "root";
$pass = "";
try {
	$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO admin (fname, lname, street, city, postalCode, emailAddress, phoneNumber, username, password)
	VALUES ('$fname', '$lname', '$street', '$city', '$postalCode', '$emailAddress', '$phoneNumber', '$username', '$password')";
	$dbh->exec($sql);
	echo "<h3>Hello User: $givenName</h3> <h2>Successfully created account</h2>";
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
}
$conn = null;
