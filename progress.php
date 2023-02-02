<?php
include_once("php/functions.php");
include_once("php/db.php");
$user_logged_in = loggedInInit();
$show_account = $user_logged_in;
$show_login = !$user_logged_in;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lesson Topics | Course Site</title>
		<?php include_once("php/head-links.php"); ?>
		<link rel="stylesheet" href="css/progress.css?v=<?php echo rand(10,99); ?>">
		<link rel="stylesheet" href="https://use.typekit.net/gds8jvm.css">
		<script src="js/topic.js"></script>
	</head>
	<body>
		<?php include_once('php/nav.php'); ?>
		
		<div class="main-content">
			
			<div class="title-wrapper">
				<div class="title container-fluid shadow-sm">
					<h1>Lesson Topics</h1>
					<p class="desc">Each topic below has different lessons.  Choose one to explore it</p>
				</div>
			</div>
			
			
			
			
			
			<div class="topic-banner container-fluid topic-finished">
				<img src="img/award-fill.svg" class="award-indicator">
				<h2>Background Mathmatics</h2>
				<div class="indicator-labels ib3">
					<div><p>What is Machine Learning</p></div>
					<div><p>Calculus and Derivatives</p></div>
					<div><p>Matrix Operations</p></div>
				</div>
				<div class="indicator-bar ib3">
					<a href="."><div class="ib-complete"><p>Review</p></div></a>
					<a href="."><div class="ib-start"></div></a>
					<a href="."><div class="ib-not"></div></a>
				</div>
				<a href="background/intro.php" class="btn btn-primary btn-sec">Review Topic</a>
			</div>
			
			<div class="topic-banner container-fluid topic-started">
				<img src="img/award.svg" class="award-indicator">
				<h2>General Learning Things</h2>
				<p>
					This lesson covers the basics of a variety of topics that are the basic building blocks of machine learning models, how they
					work, and how to evaluate them.
				</p>
				<a href="general/gradient-descent.php" class="btn btn-primary btn-sec">Continue Topic</a>
			</div>
			
			<div class="topic-banner container-fluid">
				<!-- img src="img/award.svg" class="award-indicator" -->
				<!-- img src="img/award-fill.svg" class="award-indicator" -->
				<div class="award-spacer"></div>
				<h2>Linear Regression</h2>
				<p>
					As the basic learning algorithm, Linear Regression is the first machine learning model that
					we will look at how it works and how the math behind it functions.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
			</div>
			
			<div class="topic-banner container-fluid">
				<img src="img/award.svg" class="award-indicator">
				<h2>Logistic Regression</h2>
				<p>
					Logistic Regression is an extension of Linear Regression that allows us to perform better for a
					different set of situations than Linear Regression is used.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<img src="img/award.svg" class="award-indicator">
				<h2>Multivariate Regression</h2>
				<p>
					Putting more learned values into our models allows us to take advantage of more information at once. But, there are
					also things to be careful about when doing it.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
			</div>
			
			<div class="topic-banner container-fluid">
				<img src="img/award.svg" class="award-indicator">
				<h2>Gradient Descent Variations</h2>
				<p>
					Many innovations in Machine Learning are improvements in how Gradient Descent is carried out.  This topic covers
					a few of the major methods for Gradient Descent, and their pros and cons.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
			</div>
			
			<div class="topic-banner container-fluid">
				<img src="img/award.svg" class="award-indicator">
				<h2>Decision Trees</h2>
				<p>
					While many models attempt to fit a line to points of data, Decision Trees pack data into meaningful
					boxes to guide predictions and classify new data points.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
			</div>
			
			<div class="topic-banner container-fluid">
				<img src="img/award.svg" class="award-indicator">
				<h2>Neural Networks</h2>
				<p>Neural Networks are the focus and basis for the most modern, performant models in existance today.  This
					topic covers how they work, and the fascinating mathmatics behind them.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
			</div>
		</div>
		
		
		<!-- Footer -->
		<?php include_once('php/footer.php'); ?>
	</body>
</html>