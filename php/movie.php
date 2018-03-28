<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<h1>Movies</h1>
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
	<h2>Select Movie</h2>
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

 </body>
</html
