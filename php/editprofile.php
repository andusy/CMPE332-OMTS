<!DOCTYPE html>
<html>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- TITLE -->
		<title>Edit Profile</title>

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
		<link rel="stylesheet" type="text/css" href="../css/editcopy.css" />

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
				<li><a href="logout.php">Log Out</a></li>
          <li><a href="movie.php">Movies</a></li>
				    <li><a href="memberpage.php">My Profile</a></li>
					  <li><a>
            <?php
              session_start();
              echo $_SESSION['username'];
            ?>
          </a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

  	<div class="container">
		<a href="../loggedin.php"><img src="../img/ticket.png" width="50px"/></a>
		<h1>Edit Profile</h1>
		<form action="php/editprofile2.php" method="POST">
			<div class="onerow">
				<input type="text" name="fname" placeholder="First Name" required/>
				<input type="text" name="lname" placeholder="Last Name" required/>
			</div>
			<input type="text" name="emailAddress" placeholder="Email" required/>
			<input type="text" name="phoneNumber" placeholder="Phone Number" required/>
			<input type="text" name="address" placeholder="Address" required/>
			<input type="text" name="city" placeholder="City" required/>
			<input type="text" name="postalCode" placeholder="Postal" required/>
			<input type="password" name="password" placeholder="Password" required/>
			<button type="submit" class="btn btn-primary">SAVE PROFILE INFORMATION</button>
		</form>
  	</div>
</body>
</html>
