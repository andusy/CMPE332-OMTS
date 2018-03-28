<!DOCTYPE html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- TITLE -->
		<title>Admin</title>

		<!-- FAVICON -->
		<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png" />

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

		<!-- ICONS -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" type=text/css>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="../css/adminpage.css" />

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
					  <li><a href="php/movie.php">Movies</a></li>
					<li><a href="adminpage.php">Admin</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
  <div class="content">
<h1>Admin Information</h1>
<hr>
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['admin'] == true) {
} else {
    echo "Log in Please";
		die();
}?>

	<h3>Members</h3>
	<table>
		<tr><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>Postal Code</th><th>Email Address</th><th>Phone Number</th><th>Username</th><th>Password</th><th>Account Number</th></tr>
		<?php
			include 'dbconnect.php';

			$rows = $dbh->query("SELECT fname, lname, address, city, postalCode, emailAddress, phoneNumber, username, password, accountNumber
			FROM customer");
			foreach($rows as $row) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td>
				<td>
					<a href='viewRentalHistory.php?accountNumber=".$row[9]."''><button type='submit' class='btn btn-primary'>Rental History</button></a>
					</td>
					<td>
						<a href='deleteMember.php?accountNumber=".$row[9]."''><button type='submit' class='btn btn-primary'>Delete</button></a>
					</td>
				</tr>";
	    	}
	    	$dbh = null;
		?>
	</table>

	<h3>Theatre Complexes</h3>
		<table>
			<tr><th>Address</th><th>City</th><th>Postal Code</th><th>Phone Number</th><th>Theatre Complex ID</th></tr>

			<?php
				include 'dbconnect.php';

				$rows = $dbh->query("SELECT address, city, postalCode, phone, theatreCompID
				FROM theatrecomplex");
				foreach($rows as $row) {
				echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td>
				<td>
					<a href='editcomplex.php?theatreCompID=".$row[4]."''><button type='submit' class='btn btn-primary'>Edit</button></a>
				</td>

				</tr>";
		    	}
		    	$dbh = null;
			?>
		</table>
		<h2>Add Theatre Complex</h2>
		<form action="addtheatre.php" method="POST" class="addtheatre">
				<input type="text" name="address" placeholder="Address" required/>
				<input type="text" name="city" placeholder="City" required/>
				<input type="text" name="postalCode" placeholder="Postal Code" required/>
				<input type="text" name="phone" placeholder="Phone" required/>
				<button type="submit" class="btn btn-primary">Add Complex</button>
			<hr>
		</form>
	<h2>Movies</h2>
		<table>
			<tr><th>Movie Title</th><th>Run Time (Minutes)</th><th>Plot Synopsis</th><th>Director</th><th>Production Company</th><th>Supplier Name</th><th>Start Date</th><th>End Date</th><th>Rating</th></tr>

			<?php
				include 'dbconnect.php';

				$rows = $dbh->query("SELECT title, runTime, plotSynopsis, director, productionCompany, supplierName, startDate, endDate, rating
				FROM Movie");
				foreach($rows as $row) {
				echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td>";

				if ($row[8] == null){
					echo "<td>NA</td>";
				} else {
					echo "<td>".$row[8]."</td>";
				}
				echo "
				<td>
					<a href='editmovie.php?title=".$row[0]."''><button type='submit' class='btn btn-primary'>Edit</button></a>
				</td>
				</tr>";
		    	}
		    	$dbh = null;
			?>
		</table>
	<h2>Add Movie</h2>
	<form action="addmovie.php" method="POST" class="addmovie">
			<input type="text" name="title" placeholder="title" required/>
			<input type="text" name="runTime" placeholder="runTime" required/>
			<input type="text" name="plotSynopsis" placeholder="plotSynopsis" required/>
			<input type="text" name="director" placeholder="director" required/>
			<input type="text" name="productionCompany" placeholder="productionCompany" required/>
			<input type="text" name="supplierName" placeholder="supplierName" required/>
			<input type="text" name="startDate" placeholder="startDate" required/>
			<input type="text" name="endDate" placeholder="endDate" required/>
			<input type="text" name="rating" placeholder="rating" required/>
			<button type="submit" class="btn btn-primary">Add Movie</button>
		<hr>
	</form>
	<h1>Analytics</h1>
	<h3>Most Popular Movies: </h3>
	<table>
	<tr><th>Movie</th><th>Tickets Sold</th></tr>
	<?php
		include 'dbconnect.php';
		$sql = "
		SELECT title, SUM(ticketsReserved)
		FROM reservation
		JOIN showing on showing.showingID = reservation.showingID
		GROUP BY title
		ORDER BY SUM(ticketsReserved) DESC
		";
		$rows = $dbh->query($sql);
		foreach($rows as $row) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
			}
		?>
	</table>
	<h3>Most Popular Theatre Complex: </h3>
	<table>
	<tr><th>Complex Address</th><th>Tickets Sold</th></tr>
	<?php
		include 'dbconnect.php';
		$sql = "
		SELECT address, SUM(ticketsReserved)
		FROM reservation
		JOIN showing on showing.showingID = reservation.showingID
		JOIN theatrecomplex on theatrecomplex.theatreCompID = showing.theatreCompID
		GROUP BY theatrecomplex.theatreCompID
		ORDER BY SUM(ticketsReserved) DESC
		";
		$rows = $dbh->query($sql);
		foreach($rows as $row) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
			}
		?>
	</table>
	</div>
</body>
</html>
