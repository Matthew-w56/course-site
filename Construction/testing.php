<?php
include_once("../php/functions.php");
include_once("../php/db.php");
$user_logged_in = loggedInInit();
$show_account = $user_logged_in;
$show_login = !$user_logged_in;

function quiz($question, $answers, $correctIndex, $title='Quiz Time!', $img = '') {
	?>	
	<div class="wrapper">
		<div class="quiz-head-div">
			<h3 class="quiz-header"><?php echo $title; ?></h3>
			<img class="quiz-state-indicator" src="../img/lesson-img/circle.svg">
			<img class="hidden indicator" src="../img/lesson-img/check2-circle.svg">
		</div>
		<div class="quiz"> <!-- Change to PHP function -->
			<div class="quiz-body">
				<?php if (!empty($img)) echo '<img src="'.$img.'">'; ?>
				<p><?php echo $question; ?></p>
			</div>
			<div class="quiz-choices block">
				<?php
				for ($i = 0; $i < sizeof($answers); $i++) {
					echo '<p class="" onClick="chooseAnswer(this);"'.($i == $correctIndex ? ' isCorrect="1"' : '').'>'.$answers[$i].'</p>';
				}
				?>
			</div>
			<p class="js-btn" onClick="handleQuizSubmit(this);">Check answer</p>
			<p class="output hidden"></p>
		</div>
	</div>
	<?php
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Gradient Descent | Course Site</title>
		<?php include_once("../php/head-links.php"); ?>
		<link rel="stylesheet" href="../css/lesson.css?v=<?php echo rand(10,99); ?>">
		<script src="../js/lesson.js"></script>
	</head>
	<body>
		<?php include_once('../php/nav.php'); ?>
		
		<div class="side-nav shadow-sm">
			<h2>General ML</h2>
			<a href="#" class="side-nav-item side-nav-active">Gradient Descent</a>
			<a href="#" class="side-nav-item">Hyperparameters</a>
			<a href="#" class="side-nav-item">Evaluating a Model</a>
			<a href="#" class="side-nav-item">Evaluation cont.</a>
			<a href="#" class="side-nav-item">Comparing Models</a>
			<div class="spacer"></div>
		</div>
		
		<div class="main-content">
			<div class="title container-fluid">
				<h1>Gradient Descent</h1>
				<h4>General Machine Learning Items</h4>
			</div>
			
			<!-- I want this image, and future ones, to be sticky once passed, until -->
			<!-- another one is hit.  Ideally, it would be in the middle until passed,-->
			<!-- and then animate over to the side and stay there until fading out once -->
			<!-- the next image is hit.  This way the reader can reference it throughout -->
			
			<div class="title-img">
				<img src="../img/lesson-img/gradient-descent.png">
			</div>
			
			<div class="intro">
				<p>What is gradient descent, and how does it help our models learn?  The answer lies in the basic calculus that
					is reviewed in the previous lesson [LINK HERE], so make sure you understand that section first.  The
					secret ingredient to what gradient descent is lies in what derivatives are, and what they mean.
				</p>
			</div>
			
			<div class="lesson-content">
				<h3>Recap from Calculus</h3>
				<p>
					The important part to understand as fully as possible is that a function's derivative at a given point is
					the slope of the function at that point.  This means that with just one point, we can know which way to go
					to increase the function, and which way to go to decrease it.
				</p>
				
				<h3>Now, for the Gradient part</h3>
				<p>
					First off, let's look at the words "gradient descent" themselves and their meanings.
					The word gradient means a slope, or incline.  And descent is
					the act of going down something.  So, intuitively, the term Gradient Descent just refers
					to the process of moving from a weight that leads to a lot of error for a model towards a weight that leads
					to less error.  Literally moving from high error to low.
				</p>
				
				<?php quiz(
					"This is the body of the question.  If that is true, and you want to succeed, what answer would you choose?",
					[
						'This wrong answer',
						'That wrong answer',
						'The obviously wrong answer',
						'The correct answer'
					],
					3
				); ?>
				
				<?php quiz(
						'This is my new question.  Does it work with the function?  Do you think so?',
					  	[
							'This is answer 1',
							'This is the second answer',
							'Correct answer here',
							'I think you\'re wrong!',
							'Fifth option!'
						],
						2,
						'Time for a quiz!',
						'../img/book-and-leaves.png'
				); ?>
			</div>
		</div>
		
	</body>
</html>
