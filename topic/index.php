<?php
include_once("../php/functions.php");
include_once("../php/db.php");
$user_logged_in = loggedInInit();
$show_account = $user_logged_in;
$show_login = !$user_logged_in;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lesson Topics | Course Site</title>
		<?php include_once("../php/head-links.php"); ?>
		<link rel="stylesheet" href="../css/topic.css?v=<?php echo rand(10,99); ?>">
		<link rel="stylesheet" href="https://use.typekit.net/gds8jvm.css">
		<script src="../js/topic.js"></script>
	</head>
	<body>
		<?php include_once('../php/nav.php'); ?>
		
		<div class="main-content">
			
			<div class="title-wrapper">
				<div class="title container-fluid shadow-sm">
					<h1>Lesson Topics</h1>
					<p class="desc">Each topic below has different lessons.  Choose one to explore it</p>
				</div>
			</div>
			
			<div class="topic-banner container-fluid first-topic">
				<h2>Background Mathematics</h2>
				<p>
					Start here if you are unfamiliar with the background mathematics that work in Machine Learning.
					This mainly includes an overview lesson on what exactly Machine Learning is, and some basic Calculus intuition.
				</p>
				<a href="background/intro.php" class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="background/intro.php">Lesson 1: What is Machine Learning?</a></li>
						<li><a href="background/calculus.php">Lesson 2: Calculus and Derivatives</a></li>
					</ul>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<h2>General Machine Learning</h2>
				<p>
					This topic covers the basics of a variety of topics that are the basic building blocks of machine learning models, how they
					work, and how to evaluate them.
				</p>
				<a href="general/gradient-descent.php" class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="general/gradient-descent.php">Lesson 1: Gradient Descent</a></li>
						<li><a href="general/.">Lesson 2: Hyperparameters</a></li>
						<li><a href="general/.">Lesson 3: Evaluating a Model</a></li>
						<li><a href="general/.">Lesson 4: Evaluating a Model Continued</a></li>
						<li><a href="general/.">Lesson 5: Comparing Models</a></li>
					</ul>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<h2>Linear Regression</h2>
				<p>
					As the basic learning algorithm, Linear Regression is the first machine learning model that
					we will look at.  This topic covers how it works and how the math behind it functions.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="#">Lesson 1: General Idea and Terms Defined</a></li>
						<li><a href="#">Lesson 2: Hyperparameters and Learned Values</a></li>
						<li><a href="#">Lesson 3: Gradient Descent - In Practice</a></li>
						<li><a href="#">Lesson 4: Problems and Sticking Points</a></li>
					</ul>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<h2>Logistic Regression</h2>
				<p>
					Logistic Regression is an extension of Linear Regression that allows our prediction line
					to have some curve to it.  This makes it better for probability-related problems.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="#">Lesson 1: General Idea and Terms Defined</a></li>
						<li><a href="#">Lesson 2: Hyperparameters and Learned Values</a></li>
						<li><a href="#">Lesson 3: Gradient Descent - In Practice</a></li>
						<li><a href="#">Lesson 4: Problems and Sticking Points</a></li>
					</ul>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<h2>Multivariate Regression</h2>
				<p>
					Putting more weights into our models allows us to take advantage of more information at once. This topic covers
					how to do it, and some of the problems you run into when working with all these new weights.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="#">Lesson 1: Adding In More Variables</a></li>
						<li><a href="#">Lesson 2: Matrices At Work</a></li>
						<li><a href="#">Lesson 3: The Curse of Dimensionality</a></li>
						<li><a href="#">Lesson 4: Visualizing Multivariate Descent</a></li>
					</ul>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<h2>Gradient Descent Variations</h2>
				<p>
					A whole host of innovations in Machine Learning are improvements in how Gradient Descent is
					carried out.  This topic covers a few of the major methods for Gradient Descent, and their differences.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="#">Lesson 1: Vanilla Descent and Preview of Others</a></li>
						<li><a href="#">Lesson 2: Stochastic Descent</a></li>
						<li><a href="#">Lesson 3: AdaGrad</a></li>
						<li><a href="#">Lesson 4: Momentum</a></li>
						<li><a href="#">Lesson 5: RMSProp</a></li>
						<li><a href="#">Lesson 6: Adam - The King</a></li>
					</ul>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<h2>Decision Trees</h2>
				<p>
					While many models attempt to fit a line to points of data, Decision Trees pack data into meaningful
					boxes to guide predictions.  This topic covers how to implement these models, and where they are best used.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="#">Lesson 1: What is a Tree?</a></li>
						<li><a href="#">Lesson 2: Growing a Tree</a></li>
						<li><a href="#">Lesson 3: Pros and Cons</a></li>
					</ul>
				</div>
			</div>
			
			<div class="topic-banner container-fluid">
				<h2>Neural Networks</h2>
				<p>Neural Networks are the focus and basis for the most modern, performant models in existence today.  This
					topic covers how they work, and the fascinating mathematics behind them.
				</p>
				<a href="general/." class="btn btn-primary btn-sec">Start Topic</a>
				<button class="btn btn-primary dropdown-btn" onclick="handleLessonToggle(this);">
					See Lessons 
					<img src="../img/arrow-down.svg" class="arrow">
					<img src="../img/arrow-up.svg" class="arrow hidden">
				</button>
				<div class="collapse-div gone">
					<ul>
						<li><a href="#">Lesson 1: The Feed Forward Stage</a></li>
						<li><a href="#">Lesson 2: Back Propogation</a></li>
						<li><a href="#">Lesson 3: A Mathmetical Approach</a></li>
						<li><a href="#">Lesson 4: Derivatives in a Neural Net</a></li>
						<li><a href="#">Lesson 5: Hyperparameters</a></li>
						<li><a href="#">Lesson 6: Pros and Cons</a></li>
						<li><a href="#">Lesson 7: Other Sources of Study</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		
		<!-- Footer -->
		<?php include_once('../php/footer.php'); ?>
	</body>
</html>