<?php
include_once("../../php/functions.php");
include_once("../../php/db.php");
include_once("../../php/lesson-functions.php");
//Required variables for the Nav system
$user_logged_in = loggedInInit();
$show_account = $user_logged_in;
$show_login = !$user_logged_in;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ML Introduction | Course Site</title>
		<?php include_once("../../php/head-links.php"); ?>
		<link rel="stylesheet" href="../../css/lesson.css?v=<?php echo rand(10,99); ?>">
		<script src="../../js/lesson.js" defer></script>
	</head>
	<body>
		<?php include_once('../../php/nav.php'); ?>
		
		<div class="side-nav shadow-sm">
			<h2>Background Mathmatics</h2>
			<a href="intro.php" class="side-nav-item">What is Machine Learning</a>
			<a href="calculus.php" class="side-nav-item">Calculus and Derivatives</a>
			<a href="#" class="side-nav-item side-nav-active">Matrix Operations</a>
			<div class="spacer"></div>
		</div>
		
		<div class="main-content">
			
			<div class="title container-fluid">
				<h1>Lesson Title Here</h1>
				<h4>Topic Name Here</h4>
			</div>
			
			<div class="title-img">
				<img src="img-path-here">
			</div>
			
			<div class="intro">
				<p>This is a paragaph of introduction text before the lesson really starts</p>
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
					'Next Lesson: Hyperparameters',
					'Now that we have looked at some numbers that we let the model train, it\'s time to look into the
						settings that we take care of ourselves.',
					'hyperparameters.php'
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
		
	</body>
</html>
