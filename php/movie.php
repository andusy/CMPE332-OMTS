<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<h1>Movies</h1>
	<table>
	<tr><th>Movie</th><th>Run Time (Minutes)</th><th>Plot Synopsis</th><th>Director</th><th>Production Company</th></tr>

	<?php
	include_once 'dbconnect.php';

	$rows = $dbh->query("select title, runTime, plotSynopsis, director, productionCompany from movie");
	foreach($rows as $row) {
			echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
	    }
	    $dbh = null;
	?>
	</table>

	<h1>Purchase Tickets</h1>
	<h2>Select Movie</h2>
	<select name = 'formMovie'>
		<option value = "">Select a movie...</option>
		<?php
			include 'dbconnect.php';

			$rows = $dbh->query("select title from movie");
			foreach($rows as $row) {
				echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
		    }
		    $dbh = null;
		?>
	</select>

	<br>

	<select name = 'formShowing'>
		<option value = "">Select a Showing Time</option>
		<?php
			include 'dbconnect.php';

			$rows = $dbh->query("select startTime from movie");
			foreach($rows as $row) {
				echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
		    }
		    $dbh = null;
		?>
	</select>

	<form>
		Number of Tickets: <input type = "text" name = "numTickets"> <br>
		<input type = "submit">
	</form>

 </body>
</html>
