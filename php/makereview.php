<?php
include 'dbconnect.php';
session_start();
$title = $_SESSION['title'];
$reviewText = $_POST["reviewText"];
$rating = $_POST["rating"];
$username = $_SESSION['username'];
$id = "
SELECT accountNumber
FROM customer
WHERE username = '$username'
";
$account = $dbh->query($id);
$accountNumber = $account->fetchColumn(0);

try {
	$sql = "INSERT INTO customerreview (movieTitle, reviewText, rating, accountNumber)
	VALUES ('$title', '$reviewText', '$rating', '$accountNumber')";
	$dbh->exec($sql);
	header("Location: memberpage.php");
	die();
}
catch(PDOException $e) {
	echo "<h3>FAIL</h3>";
  echo $e;
}
