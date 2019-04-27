<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>UTAnimals</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="homepage is-preload">
	<div id="page-wrapper">

		<!-- Header -->
		<div id="header-wrapper">
			<div id="header" class="container">

				<!-- Logo -->
				<h1 id="logo"><a href="index.php">UTAnimals</a></h1>

				<!-- Nav -->
				<nav id="nav">
					<ul>
						<li>
							<a href="find.php">Find a Friend</a>
						</li>
						<li><a href="profile.php"><?php
							if($_SESSION['username'] == '')
								echo "Profile";
							else 
								echo "Hi, " . $_SESSION['username']. "!";
						?></a></li>
						<li class="break"><a href="inquiry.php">Inquiries</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</nav>

			</div>

			<!-- Hero -->
			<section id="hero" class="container">
				<header>
					<h2>Pets not Animals
						<br />
						Find. Friends. Forever</a></h2>
				</header>
				<p>Designed and built by <a href="https://github.com/raujimenez/animal_shelter">Raul and Michael</a> and created for
					<br />
					<a href="http://heracleia.uta.edu/~sharifara/Spring_19_3330/index.html">CSE 3330: Databases</a>.</p>
				<ul class="actions">
					<li><a href="login.php" class="button">
						<?php
							if(!empty($_SESSION['username']))
							{
								echo "Welcome back, " . $_SESSION['username'];
							}
							else
							{
								echo "Get this party started";
							}
						?>
					</a></li>
				</ul>
			</section>

		</div>

		<!-- Features 1 -->
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<section class="col-6 col-12-narrower feature">
						<div class="image-wrapper first">
							<a href="find.php" class="image featured first"><img src="images/family.jpg" alt="" /></a>
						</div>
						<header>
							<h2>Great Friends.<br />
								Perfect Family.</h2>
						</header>
						<p>Pets not only make for great companions. They make for great family. Having someone you can depend on is
							The best feeling in the world. Let us help you find your friend that fits your lifestyle.
						</p>
						<ul class="actions">
							<li><a href="find.php" class="button">Find your family</a></li>
						</ul>
					</section>
					<section class="col-6 col-12-narrower feature">
						<div class="image-wrapper">
							<a href="inquiry.php" class="image featured"><img src="images/question.jpg" alt="" /></a>
						</div>
						<header>
							<h2>Need more info?<br />
								Let us know!</h2>
						</header>
						<p>We believe in matching each person to their perfect pet. If you aren't sure or need more information to make an
							informed decision let us know and we will help you to the best of our ability.
						</p>
						<ul class="actions">
							<li><a href="inquiry.php" class="button">Ask us</a></li>
						</ul>
					</section>
				</div>
			</div>
		</div>

		<!-- Promo -->
		<div id="promo-wrapper">
			<section id="promo">
				<h2>Want to support your favorite friend in the shelter?</h2>
				<a href="donate.php" class="button">Donate</a>
			</section>
		</div>

		<!-- Features 2 -->
		<div class="wrapper">
			<section class="container">
				<header class="major">
					<h2>Our furry friends are always looking for homes</h2>
					<p></p>
				</header>
				<div class="row features">
					<section class="col-4 col-12-narrower feature">
						<div class="image-wrapper">
							<a href="find.php" class="image featured"><img src="images/bird.jpg" alt="" /></a>
						</div>
						<header>
							<h3>Busy Birds</h3>
						</header>
						<p>These birds are all over the place! They love to sing, fly, and play. While they build their nest will you let them stay in yours?</p>
					</section>
					<section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper first">
                            <a href="find.php" class="image featured"><img src="images/dog.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Doggy Mayhem</h3>
                        </header>
                        <p>These dogs know how to wrestle and play. Don't let their good behavior fool you! These are the most playful of dogs.</p>
                    </section>
					<section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper">
                            <a href="find.php" class="image featured"><img src="images/cat.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Kitty Kats</h3>
                        </header>
                        <p>Their ancestors were the kings of the jungle and they still think they are royalty. These cats are as pretigious as they come!</p>
                        </ul>
                    </section>
				</div>
				<ul class="actions major">
					<li><a href="login.php" class="button">Login / Sign up</a></li>
				</ul>
			</section>
		</div>

		<!-- Footer -->
		<div id="footer-wrapper">
			<div id="footer" class="container">
				<header class="major">
					<h2>UTAnimals Cares about your friends</h2>
					<p>We at UTAnimals value your our guest as much as our own family.<br> Please take care of our family members when adopting. </p>
				</header>
			</div>
		</div>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>