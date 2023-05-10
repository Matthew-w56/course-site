<?php
include_once("../../php/functions.php");
include_once("../../php/db.php");
include_once("../../php/lesson-functions.php");
$user_logged_in = loggedInInit();
$show_account = $user_logged_in;
$show_login = !$user_logged_in;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Hyperparameters | Course Site</title>
		<?php include_once("../../php/head-links.php"); ?>
		<link rel="stylesheet" href="../../css/lesson.css?v=<?php echo rand(10,99); ?>">
		<script src="../../js/lesson.js" defer></script>
	</head>
	<body>
		<?php include_once('../../php/nav.php'); ?>
		
		<div class="side-nav shadow-sm">
			<h2>General ML</h2>
			<a href="gradient-descent.php" class="side-nav-item">Gradient Descent</a>
			<a href="#" class="side-nav-item side-nav-active">Hyperparameters</a>
			<a href="#" class="side-nav-item">Evaluating a Model</a>
			<a href="#" class="side-nav-item">Evaluation cont.</a>
			<a href="#" class="side-nav-item">Comparing Models</a>
			<div class="spacer"></div>
		</div>
		
		<div class="main-content">
			
			<div class="title container-fluid">
				<h1>Hyperparameters</h1>
				<h4>General Machine Learning</h4>
			</div>
			
			<div class="title-img">
				<img src="../../img/lesson-img/fine-tune.jpg" class="rounded-img">
			</div>
			
			<div class="intro">
				<p>
					While the magic of Machine Learning is that the model can find the best values for some of
					its variables (called parameters), the unavoidable fact is that there will always be something that
					we need to set ourselves.  And the way we set these other variables (called <span>
					hyper-</span>parameters</span>) affects how our model turns out.  This lesson will cover a few
					of the common hyperparameters that show up in our models, and a couple common methods used to
					find the best hyperparameter value possible.
				</p>
			</div>
			
			<div class="lesson-content">
				<h3>Lesson Part Header</h3>
				<p>This is a part of the lesson</p>
				
				<h3>Lesson Part Header</h3>
				<p>This is a part of the lesson using <sup>Superimposed</sup> text</p>
				
				<br> <!-- BR's are used for spacing here and there -->
				
				<h3>Lesson Part Header</h3>
				<p>This is a part of the lesson using <span>Important</span> words in the lesson</p>
				
				<!-- Many images that sit in the middle of the page are like this -->
				<div class="img-wrapper">
					<img src="image path here" class="lesson-img">
				</div>
				
				<?php
				//quiz($question, $answers, $correctIndex, $title='Quiz Time!', $img = '')
					echo quiz(
						'Quiz Question Here',
						[
							'Answer Here',
							'Answer Here',
							'Answer Here',
							'Answer Here'
						],
						2, //Index of correct answer
						'Quiz Title Here',
						'',
						[
							'wrong answer feedback 1',
							'wrong answer feedback 2',
							'-', //Correct Answer
							'wrong answer feedback 4'
						]
					);
				?>
				
				<h5>
					New Section Here - Maybe the Math part?
				</h5>
				
				<!-- Math Images are like this -->
				<img class="math-img" src="../../img/math/least-squares-error.png">
			</div> <!-- End of lesson-content -->
			
			
			<?php
				//This creates the banner for the next lesson.  Parameters are Title, Description, and full link address
				echo nextLessonBanner(
					'Next Lesson: Generic',
					'Apply the description of the next lesson here',
					'link-to-next-lesson.php'
				);
			?>
			
			<!-- Summary is just information after the lesson -->
			<div class="summary">
				<h5>
					Use an h5 at the beginning
				</h5>
				<p>
					Anything here
				</p>
				<img src="../../img/math/least-squares-update-weight.png" class="math-img"><br>
			</div>
		</div>
		
		<?php
			include_once("../../php/footer.php");
		?>

	</body>
</html>
