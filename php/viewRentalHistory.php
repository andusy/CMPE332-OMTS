<?php
include 'dbconnect.php';

if(isset($_GET['accountNumber'])){
$accountNumber = $_GET['accountNumber'];
}

function getDatetimeNow() {
  $tz_object = new DateTimeZone('America/New_York');
  $datetime = new DateTime();
  $datetime->setTimezone($tz_object);
  return $datetime->format('Y\-m\-d\ h:i:s');
}

$currentDate = getDatetimeNow();


echo "<h1>Account ID:".$accountNumber. "</h1>";
echo "<h1>Currently Held Tickets</h1>";

echo "<table>
		<tr><th>Movie</th><th>Showing ID</th><th>Tickets Reserved</th><th>Time</th><th>Reservation ID</th></tr>";

$sql = "
SELECT title, reservation.showingID, ticketsReserved, startTime, reservationID
FROM reservation
JOIN showing on showing.showingID = reservation.showingID
WHERE accountNumber = '$accountNumber'
";
$rows = $dbh->query($sql);

foreach($rows as $row){
	if ($row[3]>$currentDate){
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
	}
}
echo "</table>";

echo "<h1>Past Tickets</h1>";

echo "<table>
		<tr><th>Movie</th><th>Showing ID</th><th>Tickets Reserved</th><th>Time</th><th>Reservation ID</th></tr>";

$sql = "
SELECT title, reservation.showingID, ticketsReserved, startTime, reservationID
FROM reservation
JOIN showing on showing.showingID = reservation.showingID
WHERE accountNumber = '$accountNumber'
";
$rows = $dbh->query($sql);

foreach($rows as $row){
	if ($row[3]<=$currentDate){
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
	}
}
echo "</table>";
