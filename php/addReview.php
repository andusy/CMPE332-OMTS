<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_GET['title'])){
	$_SESSION['title']= $_GET['title'];
}
?>
	<head>
	</head>
	<body>
		<form action="makereview.php" method="POST">
		<select name = 'rating'>
			<option value = "">Select a Rating...</option>
			<option value = "good">Good</option>
			<option value = "bad">Bad</option>
		</select>
		Review (Maximum 1000 characters): <input type = "text" name = "reviewText">
		<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</body>
</html>
