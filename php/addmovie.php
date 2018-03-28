<?php
include_once 'dbconnect.php';

$title = $_POST["title"];
$runTime = $_POST["runTime"];
$plotSynopsis = $_POST["plotSynopsis"];
$director = $_POST["director"];
$productionCompany = $_POST["productionCompany"];
$supplierName = $_POST["supplierName"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$rating = $_POST["rating"];

try {
	$sql = "INSERT INTO movie (title, runTime, plotSynopsis, director, productionCompany, supplierName, startDate, endDate, rating)
	VALUES ('$title', '$runTime', '$plotSynopsis', '$director', '$productionCompany', '$supplierName', '$startDate', '$endDate', '$rating')";
	$dbh->exec($sql);
	header("Location: adminpage.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
  echo $e;
}
$conn = null;
