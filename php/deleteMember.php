<?php
include 'dbconnect.php';

if(isset($_GET['accountNumber'])){
$accountNumber = $_GET['accountNumber'];
}

$sql = "
DELETE FROM CreditCardInfo
WHERE accountNumber = '$accountNumber';
";
$dbh->query($sql);

$sql = "
DELETE FROM CustomerReview
WHERE accountNumber = '$accountNumber';
";
$dbh->query($sql);

$sql = "
DELETE FROM Reservation
WHERE accountNumber = '$accountNumber';
";
$dbh->query($sql);

$sql = "
DELETE FROM Customer
WHERE accountNumber = '$accountNumber';
";
$dbh->query($sql);

header("Location: adminpage.php");
die();
