<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Restaurants</title>
		<meta charset="UTF-8"/>
		
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css"/> <!-- CSS -->
	
	</head>
	<body>

		<div class="contenedor">
			<header>
				<div class="mainTop">
					<img class="logo" src="images/logo.png" alt="logo"/>
					<div class="navBar">
						<ul>
							<li><a href="index.php">Index</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
				</div>
			</header>
		</div>
<?php

		if (isset($_SESSION["username"])) {
?>	
		<div class="formlogin">
				<span id="welcomespan1"><strong>Welcome <?= $_SESSION["name"] ?>! &lt;3</strong></span>
<?php
			} elseif (isset($_SESSION["error"])) {
?>
				<span id="welcomespan1"><strong><?= $_SESSION["error"] ?></strong></span>
<?php
			}
?>
		</div>
<?php

	# CALL FUNCTION ######################################################

	require_once "restaurantsdb.php";

	# We obtain the id from the GET method workin with href from index.php
	$restaurant = getRestaurant($_GET['id']);
?>
	<div id="mainRestaurant">
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
<?php

	# We run over the full array specifying if the value is 'Name', or 'imgCard' to perform a specific HTML tag. 
	# Otherwise, we show the values from the array with the <p> HTML tag
					foreach($restaurant as $rest => $value) {
						if ($rest=='Name') {
?>
							<h5 class="card-header text-center"><?= $value ?></h5>
<?php
						} elseif ($rest == 'filePath') {
?>
							<img id="imgCard" src="<?= $value ?>"/>
<?php
						} else {
?>
							<p><b><?= $rest ?>:</b> <?= $value ?>.<br>
<?php
						}		
					}
?>
				</div><br>
			</div>
<?php
			if (isset($_SESSION["username"])) {
?>
				<div class="col-sm-6">
					<form action="comment.php?id=<?= $_GET['id'] ?>" method="POST">
						<div class="card">
							<h5 class="card-header text-center">Leave a comment!</h5>
							<hr>
							<textarea id="text" rows="7" cols="2" name="comment"></textarea>
							<br>
							<h5>Leave a puntuation (from 1 to 5)</h5>
							<input type="range" min="1" max="5" value="3" class="slider" name="slide">
							<hr>
							<input id="commentsubmit" type="submit" class="btn btn-success btn-sm" value="Submit">
						</div>
					</form>
				</div>
<?php
			}

			require_once "comment.php";
			$show=showComments($_GET['id']);
				foreach($show as $sh) {
?>
				<div class="col-sm-12">
					<div class="card">
						<h5 class="card-header text-center">Comment by <?= $sh['username'] ?> / Rating: <?= $sh['rating'] ?></h5>
							<p><?= $sh['comment'] ?></p>
					</div><br><br>
				</div>
<?php
				}	
?>	
		</div>
	</div>


		<a href="index.php">
			<button type="button" id="goback" class="btn btn-success btn-lg">Go Back</button>
		</a>

		<footer> <!-- FOOTER STARTS -->
			<div>
				<small>&copy; All rights reserved | IES Francesc de Borja Moll 2018</small>
				<ul>
					<li><a href="https://github.com/jcamposp" id="ghub" target="_blank"></a></li>
					<li><a href="#" id="twitter"></a></li>
					<li><a href="#" id="facebook"></a></li>
					<li><a href="#" id="pinterest"></a></li>
				</ul>
			</div>
		</footer> <!-- FOOTER ENDS -->
	</body>
</html>