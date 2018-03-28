<!DOCTYPE html>
<html>
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- TITLE -->
		<title>OMTS</title>

		<!-- FAVICON -->
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png" />

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />

		<!-- ICONS -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" type=text/css>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous"></script>
	</head>

	<body>
		<div id="main"></div>
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
				<a class="navbar-brand" href="#"></a>
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
          	<li><a href="php/logout.php">Log Out</a></li>
				    <li><a href="php/movie.php">Movies</a></li>
				    <li><a href="php/memberpage.php">My Profile</a></li>
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


	<div id="intro">
		<div id="content">
			<h1><img src="img/ticket.png" width="60"> Online Movie Ticket Service</h1>
			<hr>
			<h3>Purchase Tickets Now To Watch Your Favorite Movies!</h3>
		</div>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Carousel indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
			</ol>
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/avengers.jpg" alt="First Slide">
				</div>
				<div class="item">
					<img src="img/blackpanther.jpg" alt="Second Slide">
				</div>
				<div class="item">
					<img src="img/gotg.jpg" alt="Third Slide">
				</div>
				<div class="item">
					<img src="img/onepiece.jpg" alt="Fourth Slide">
				</div>
			</div>
			<!-- Carousel controls -->
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">
			</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">
			</a>
		</div>
	</div>

	<div class="movies">
		<ul class="nav nav-tabs ">
			<li role="presentation" class="active"><a href="#">Movies Available</a></li>
		</ul>
		<div class="row">
			<div class="col-xs-6 col-md-2">
				<a href="#" class="thumbnail">
			  		<img src="img/posters/avengers.jpg" width="165">
				</a>
				<div class="caption">
					<h5>Avengers: Infinity War</h5>
					<p><a href="https://www.youtube.com/watch?v=6ZfuNTqbHE8"><i class="fa fa-play-circle" aria-hidden="true"></i> Trailer</a></p>
					<p><a href="#" class="btn btn-primary" role="button">More Info</a></p>
				</div>
			</div>
			<div class="col-xs-6 col-md-2">
				<a href="#" class="thumbnail">
			  		<img src="img/posters/blackpanther.jpg" width="165">
				</a>
				<div class="caption">
					<h5>Black Panther</h5>
					<p><a href="https://www.youtube.com/watch?v=xjDjIWPwcPU"><i class="fa fa-play-circle" aria-hidden="true"></i> Trailer</a></p>
					<p><a href="#" class="btn btn-primary" role="button">More Info</a></p>
				</div>
			</div>
			<div class="col-xs-6 col-md-2">
				<a href="#" class="thumbnail">
			  		<img src="img/posters/guardiansofthegalaxy.jpg" width="162">
				</a>
				<div class="caption">
					<h5>Guardians of the Galaxy</h5>
					<p><a href="https://www.youtube.com/watch?v=dW1BIid8Osg"><i class="fa fa-play-circle" aria-hidden="true"></i> Trailer</a></p>
					<p><a href="#" class="btn btn-primary" role="button">More Info</a></p>
				</div>

			</div>
			<div class="col-xs-6 col-md-2">
				<a href="#" class="thumbnail">
			  		<img src="img/posters/justiceleague.jpg" width="158">
				</a>
				<div class="caption">
					<h5>Justice League</h5>
					<p><a href="https://www.youtube.com/watch?v=r9-DM9uBtVI"><i class="fa fa-play-circle" aria-hidden="true"></i> Trailer</a></p>
					<p><a href="#" class="btn btn-primary" role="button">More Info</a></p>
				</div>
			</div>
			<div class="col-xs-6 col-md-2">
				<a href="#" class="thumbnail">
			  		<img src="img/posters/onepiece.jpg" width="200">
				</a>
				<div class="caption">
					<h5>One Piece: Gold</h5>
					<p><a href="https://www.youtube.com/watch?v=BvqD6Oamf0U"><i class="fa fa-play-circle" aria-hidden="true"></i> Trailer</a></p>
					<p><a href="#" class="btn btn-primary" role="button">More Info</a></p>
				</div>
			</div>
			<div class="col-xs-6 col-md-2">
				<a href="#" class="thumbnail">
			  		<img src="img/posters/wonderwoman.jpg" width="170">
				</a>
				<div class="caption">
					<h5>Wonder Woman</h5>
					<p><a href="https://www.youtube.com/watch?v=VSB4wGIdDwo"><i class="fa fa-play-circle" aria-hidden="true"></i> Trailer</a></p>
					<p><a href="#" class="btn btn-primary" role="button">More Info</a></p>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div id="footer-links">
			<div id="footer-first">
				<ul>
					<li>Help</li>
				</ul>
			</div>
			<div id="footer-second">
				<ul>
					<li>Theatre Complexes</li>
					<li>Movies</li>
					<li>Showings</li>
					<li>Actors</li>
					<li>Production Companies</li>
				</ul>
			</div>
			<div id="footer-third">
				<ul>
					<li>Careers</li>
					<li>About</li>
				</ul>
			</div>
		</div>

		<hr>

		<div id="footer-contact">
			<div id="footer-github">
				<img src="img/footer/github.png" />
				<ul>
					<li><a href="https://github.com/andusy">Andus Yu</a></li>
					<li><a href="https://github.com/darianlio">Darian Lio</a></li>
					<li><a href="https://github.com/seanblee">Sean Lee</a></li>
				</ul>
			</div>
			<div id="footer-linkedin">
				<img src="img/footer/linkedin.png" />
				<ul>
					<li><a href="https://www.linkedin.com/in/andusyu">Andus Yu</a></li>
					<li><a href="https://www.linkedin.com/in/darianlio/">Darian Lio</a></li>
					<li><a href="https://www.linkedin.com/in/seanbrianlee/">Sean Lee</a></li>
				</ul>
			</div>
		</div>
	</footer>
	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- JS Script -->
	<script src="js/main.js"></script>
	</body>
</html>
