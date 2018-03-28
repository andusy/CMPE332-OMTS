<?php
include_once 'dbconnect.php';
session_start();
$showingID = $_SESSION['showingID'];
$startTime = $_POST['startTime'];

try {
	$sql = "UPDATE showing
	SET startTime = '$startTime'
  WHERE showingID = '$showingID'";
	$dbh->exec($sql);
	header("Location: adminpage.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
	echo $e;
}
