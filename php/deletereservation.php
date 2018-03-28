<?php
include 'dbconnect.php';

if(isset($_GET['reservationID'])){
$reservationid = $_GET['reservationID'];
}

$sql = "
DELETE FROM reservation
WHERE reservationID = '$reservationid'
";

$dbh->query($sql);
header("Location: memberpage.php");
die();
