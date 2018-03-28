<?php
include_once 'dbconnect.php';
session_start();
$ticketsReserved = $_SESSION['ticketsReserved'];
$showingID = $_POST["showingID"];
$currentUser = $_SESSION['username'];
$id = "
SELECT accountNumber
FROM customer
WHERE username = '$currentUser'
";
$account = $dbh->query($id);
$accountNumber = $account->fetchColumn(0);
try {
	$sql = "INSERT INTO reservation (showingID, accountNumber, ticketsReserved)
	VALUES ('$showingID', '$accountNumber', '$ticketsReserved')";
	$dbh->exec($sql);
	header("Location: memberpage.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
	echo $e;
}
$conn = null;
