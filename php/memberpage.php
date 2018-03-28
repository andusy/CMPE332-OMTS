<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>
<?php
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
<tr><th>Theatre Complex</th><th>Theatre</th><th>Start Time</th><th>Title</th></tr>
<?php
$currentUser = $_SESSION['username'];

include_once 'dbconnect.php';

$rows = $dbh->query("select address, theatreNumber, startTime, title
from showing
join theatrecomplex on theatrecomplex.theatreCompID = showing.theatreCompID");
foreach($rows as $row) {
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td></tr>";
    }
?>
</table>

</body>
</html>
