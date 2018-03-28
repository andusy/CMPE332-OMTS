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
  	<div class="content">
	<h1>Movies</h1>
	<hr>
	<table>
	<tr><th>Movie</th><th>Run Time (Minutes)</th><th>Plot Synopsis</th><th>Director</th><th>Production Company</th></tr>

	<?php
	include 'dbconnect.php';
	$sql = "
	SELECT title, runTime, plotSynopsis, director, productionCompany
	FROM movie
	";
	$rows = $dbh->query($sql);
	foreach($rows as $row) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
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
	Number of Tickets: <input type = "text" name = "numTickets">
	<button type="submit" class="btn btn-primary">See Showings</button>
	</form>
	</div>
 </body>
</html>
