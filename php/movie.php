<!DOCTYPE html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- TITLE -->
		<title>Movies</title>

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
		<link rel="stylesheet" type="text/css" href="../css/movie.css" />

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
					  <li><a href="php/movie.php">Movies</a></li>
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
	<h1>Movies</h1>
	<hr>
	<table>
		<tr><th>Movie</th><th>Run Time (Minutes)</th><th>Plot Synopsis</th><th>Director</th><th>Production Company</th><th>Rating</th><th>Review</th></tr>

	<?php
	include 'dbconnect.php';
	$sql = "
	SELECT title, runTime, plotSynopsis, director, productionCompany, rating
	FROM movie
	";
	$rows = $dbh->query($sql);
	foreach($rows as $row) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."
			</td>
				<td>
					<a href='addReview.php?title=".$row[0]."''><button type='submit' class='btn btn-primary'>Review</button></a>
				</td>
			</tr>";
	    }
	    $dbh = null;
	?>
	</table>
	<h1>Purchase Tickets</h1>
	<hr>
		<label>Select Movie</label>
	<form action="makepurchase.php" method="POST">
	<select name = 'title' name = 'select'>
		<option value = "">Select a movie...</option>
		<?php
			include 'dbconnect.php';
			$sql = "
			SELECT title, runTime, plotSynopsis, director, productionCompany
			FROM movie
			";
			$rows = $dbh->query($sql);
			foreach($rows as $row) {
				echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
		    }
		    $dbh = null;
		?>
	</select>
	<label>Number of Tickets:</label> <input type = "text" name = "numTickets">
	<button type="submit" class="btn btn-primary">See Showings</button>
	</form>
	</div>
 </body>
</html>
