<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- TITLE -->
	<title>My Profile</title>

	<!-- FAVICON -->
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />

	<!-- ICONS -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" type=text/css>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../css/memberpage.css" />

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>
<body>
	<!-- NAV -->
	<nav class="navbar navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
				<a class="navbar-brand" href="../loggedin.php"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<div class="container-2">
						<span class="icon"><i class="fa fa-search"></i></span>
						<input type="search" id="search" placeholder="What are you looking for?" />
					</div>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Theatres Complexes <i class="fa fa-angle-down" aria-hidden="true"></i></a></li>
					  <li><a href="movies.html">Movies</a></li>
					  <li><a href="memberpage.php">My Profile</a></li>
					<li><a>
						<?php
							session_start();
							if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] == false) {
								echo $_SESSION['username'];
							}
						?>
						</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
<div class="content">
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
    echo "You are not logged in.";
    die();
}
?>
</h1>
<hr>
<h3>My Tickets</h3>
<hr>
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
			<a href='deletereservation.php?reservationID=".$row[4]."''><button type='submit' class='btn btn-primary'>Cancel</button></a>
		  </td></tr>";
		}
	}
	?>
</table>

<h3>Order History</h3>
<hr>
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
		  </td></tr>";
		}
	  }
	?>
</table>
<hr>
<button type="submit" class="btn btn-info" href="editprofile.php">Edit Profile</button>
</div>
</body>
</html>
