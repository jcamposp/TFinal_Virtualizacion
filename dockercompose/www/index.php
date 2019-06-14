<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
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

	<!-- FORMS -->
		<!--QUERY FORM -->
		<form id="frm" method="POST">
			<label>Search: <input type="text" name="q" value="<?= (isset($_POST['q'])?$_POST['q']:'') ?>"></label>
			Order: <select class="slc" name="order">
				<option value="ascending" <?= (isset($_POST['order']) && $_POST['order']=="descending")?"":"selected" ?>>Ascending</option>
				<option value="descending" <?= (isset($_POST['order']) && $_POST['order']=="descending")?"selected":"" ?>>Descending</option>
			</select>
			<input id="sbmt" value="Submit" type="submit">		
<?php
		# SPAN WELCOME USER / ERROR LOGIN
			if (isset($_SESSION["username"])) {
?>	
				<span id="welcomespan"><strong>Welcome <?= $_SESSION["name"] ?>! &lt;3</strong></span>
<?php
			} elseif (isset($_SESSION["error"])) {
?>
				<span id="welcomespan"><strong><?= $_SESSION["error"] ?></strong></span>
<?php
			}
?>
		</form>

<?php
		if (!isset($_SESSION["username"])) {
?>
		<!-- LOGIN FORM WITH 'LOG IN' BUTTON -->
			<form class="formlogin" action="login.php" method="POST">
				<label>Name: <input type="text" name="username" placeholder="Enter your name"></label>
				<label>Password: <input type="password" name="userpasswd" placeholder="Enter your password"></label>
				<input type="submit" name="submit" value="Log in">
			</form>
<?php
		} else {				
?>
		<!-- LOGIN FORM 'LOG OUT' BUTTON -->
			<form class="formlogin" action="logout.php" method="POST">
				<input type="submit" name="submitoff" value="Log out">
			</form>
<?php
		}

	# CALL FUNCTIONS ######################################################
		
		include "restaurantsdb.php";
	
	# We fetch the results from the function getRestaurants() with query or empty query
		$restaurants = getRestaurants(isset($_REQUEST["q"])?$_REQUEST["q"]:"",isset($_REQUEST['order'])?$_REQUEST['order']:'');
?>
		<div id="mainContent"> <!-- MAIN CONTENT STARTS -->
			<div class="row"> <!-- ROW STARTS -->

<?php

	# We run over the array $restaurants, and we show the specific values to show
				foreach ($restaurants as $innerArray) {
?>
					<div class="card col-sm-7 col-md-5 col-lg-2 mx-2 my-3"> <!-- CARD STARTS -->			
						<h3><?= $innerArray['name'] ?></h3>
						<p><b>Locality:</b> <?= $innerArray['locality'] ?></p>
						<p><b>Route:</b> <?= $innerArray['route'] ?></p>
						<p><b>Street number:</b> <?= $innerArray['streetNumber'] ?></p>
						<p><b>Postal code:</b> <?= $innerArray['postalCode'] ?></p>
						<p><b>Phone number:</b> <?= $innerArray['phoneNumber'] ?></p>
						<img src='<?= $innerArray['filePath'] ?>' alt='image_restaurant'/><hr>
						<div class="text-center"> <!-- BUTTON STARTS -->
						<!-- href links with restaurant.php and the id value obtained -->
							<a href="restaurant.php?id=<?= $innerArray['id'] ?>">
							<button type="button" class="btn btn-success btn-lg">Know more!</button></a>
						</div> <!-- BUTTON ENDS -->
							
					</div> <!-- CARD ENDS -->
					<hr>
<?php
				} # END FOREACH
?>
			</div> <!-- MAIN CONTENT ENDS -->
		</div> <!-- CONTAINER ENDS -->
				
		<footer>
			<div>
				<small>&copy; All rights reserved | IES Francesc de Borja Moll 2018</small>
				<ul>
					<li><a href="https://github.com/jcamposp" id="ghub" target="_blank"></a></li>
					<li><a href="#" id="twitter"></a></li>
					<li><a href="#" id="facebook"></a></li>
					<li><a href="#" id="pinterest"></a></li>
				</ul>
			</div>
		</footer>
	</body>
</html>