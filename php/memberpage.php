<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>
<?php
include 'dbconnect.php';
function getDatetimeNow() {
  $tz_object = new DateTimeZone('America/New_York');
  $datetime = new DateTime();
  $datetime->setTimezone($tz_object);
  return $datetime->format('Y\-m\-d\ h:i:s');
}

$currentDate = getDatetimeNow();
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] == false) {
    echo $_SESSION['username'];
} else {
    echo "You are not logged in.<br/>";
}
?>
</h1>
<h2>My Tickets</h2>
<table>
<tr><th>Movie</th><th>Theatre</th><th>Start Time</th><th>Seats Reserved</th><th>Reservation ID</th></tr>
<?php
$username = $_SESSION['username'];
$sql = "
SELECT title, theatreComplex.address, startTime, ticketsReserved, reservationID
FROM reservation
JOIN showing on showing.showingID = reservation.showingID
JOIN theatrecomplex on theatrecomplex.theatreCompID = showing.theatreCompID
JOIN customer on customer.accountNumber = reservation.accountNumber
WHERE username = '$username'
";
$rows = $dbh->query($sql);
foreach($rows as $row) {
  if($row[2]>$currentDate){
  		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td>
      <td>
        <button type='submit' class='btn btn-primary'><a href='deletereservation.php?reservationID=".$row[4]."''>Cancel</a></button>
      </td></tr>";
    }
}
?>
</table>

<h2>Past Purchases</h2>
<table>
<tr><th>Movie</th><th>Theatre</th><th>Start Time</th><th>Seats Reserved</th><th>Reservation ID</th></tr>
<?php
$username = $_SESSION['username'];
$sql = "
SELECT title, theatreComplex.address, startTime, ticketsReserved, reservationID
FROM reservation
JOIN showing on showing.showingID = reservation.showingID
JOIN theatrecomplex on theatrecomplex.theatreCompID = showing.theatreCompID
JOIN customer on customer.accountNumber = reservation.accountNumber
WHERE username = '$username'
";
$rows = $dbh->query($sql);
foreach($rows as $row) {
  if($row[2]<$currentDate){
  		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td>
      <td>
        <button type='submit' class='btn btn-primary'><a href='deletereservation.php?reservationID=".$row[4]."''>Cancel</a></button>
      </td></tr>";
    }
  }
?>
</table>
</body>
</html>
