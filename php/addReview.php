<!DOCTYPE html>
<html>
	<head>
	</head>

	<body>
		<form action="makepurchase.php" method="POST">
		<select name = 'title' name = 'select'>
			<option value = "">Select a Rating...</option>
			<option value = "good">Good</option>
			<option value = "bad">Bad</option>
		</select>
		Review (Maximum 1000 characters): <input type = "text" name = "Review">
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</body>
</html>
