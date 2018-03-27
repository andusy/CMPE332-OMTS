<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Showtimes</h2>
<table>
<tr><th>Theatre</th><th>Start Time</th><th>Available Seats</th><th>Title</th></tr>

<?php
include_once 'dbconnect.php';

$rows = $dbh->query("select theatreNumber, startTime, seatsAvailable, title from showing");
foreach($rows as $row) {
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
    }
    $dbh = null;

?>

</table>


 </body>
</html>
