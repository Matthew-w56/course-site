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
		<title>Derivatives | Course Site</title>
		<?php include_once("../../php/head-links.php"); ?>
		<link rel="stylesheet" href="../../css/lesson.css?v=<?php echo rand(10,99); ?>">
		<script src="../../js/lesson.js" defer></script>
	</head>
	<body>
		<?php include_once('../../php/nav.php'); ?>
		
		<div class="side-nav shadow-sm">
			<h2>Background Mathematics</h2>
			<a href="intro.php" class="side-nav-item">What is Machine Learning</a>
			<a href="#" class="side-nav-item side-nav-active">Calculus and Derivatives</a>
			<a href="matrix.php" class="side-nav-item">Matrix Operations</a>
			<div class="spacer"></div>
		</div>
		
		<div class="main-content">
			
			<div class="title container-fluid">
				<h1>Calculus and Derivatives</h1>
				<h4>Background Mathematics</h4>
			</div>
			
			<div class="title-img">
				<img src="../../img/lesson-img/calc-x-square-derivative.png">
			</div>
			
			<div class="intro">
				<p>
					Derivatives are a huge part of how Machine Learning works.  It is important that we
					understand what they look like and what they mean.  This lesson is meant both for someone
					who has never studied Calculus as well as for someone who has learned about derivatives but
					might not be able to explain how they can be applied.  The goal of this
					lesson is to internalize what a derivative is, what information it gives us about a function,
					and what this knowledge allows us to achieve in the realm of Machine Learning.
				</p>
			</div>
			
			<div class="lesson-content">
				<h3>Basic Explanation</h3>
				<p>
					At the most basic level, a derivative is a function.  But this function is found by using another
					function, and a process in Calculus called taking a Derivative.  This base function could be anything.
					It could be x<sup>2</sup>, it could be 2x + 5, or it could be something much less nice-looking.
				</p>
				<p>
					The relationship between a base function and it's derivative function is really cool.  With any
					function, we give it an input (such as x=3) and we get back an output (such as y=9).  With a derivative
					function, we give it the same input, and we get back a number that represents the slope of our original
					function at that point.
				</p>
				
				<h3>Visual Example</h3>
				<p>
					What exactly does the "slope" of a function mean?  And why does it matter?  To better illustrate it, let's
					use a specific example and see some images.  For this example, let's say our original function (which we call
					f(x)) is:
				</p>
				
				<img class="math-img short-math-img" style="height:45px !important" src="../../img/math/calc-x-square.png">
				
				<p>
					This means that our derivative function of f(x) (which we call f'(x)) is:
				</p>
				
				<img class="math-img short-math-img" src="../../img/math/calc-x-square-derivative.png">
				
				<p>
					For now, we won't worry about how we found that derivative function.  That process is better
					taught in a Calculus class, or a longer online tutorial.  But the take-away here is to be able to
					see the relationship between these functions.  Here is the graph of these two functions together:
				</p>
				
				<div class="img-wrapper">
					<img src="../../img/lesson-img/calc-derivative-example1.png" class="lesson-img">
				</div>
				
				<p>
					Here, the curved red line is our original function (or f(x)), and the dotted blue line is our derivative
					function (or f'(x)).  Notice how when x=0, f(x) is flat.  In other words, as the function line passes
					through the y axis, it is moving completely horizontally.  This means that the slope at x=0 is 0.  So,
					accordingly, our derivative function evaluates to 0 at x=0.  As we go to the right, our f'(x) gets higher
					and higher while our f(x) gets steeper and steeper.
				</p>
				
				<p>
					Now let's say that you wanted to draw a straight line somewhere on this graph so that
					the line touches our curved line, but only once.  It would almost go parallel to it for
					a bit, then just barely touch it on one point.  To see an example of this kind of line,
					see the image at the beginning of this lesson.  This line is called a tangent line.  The
					angle of this line (or the slope) is equal to the derivative at that point.
				</p>
				<p>
					So if we were to draw a line that touched our curve at x=-2, the line would be pointing
					downwards.  Specifically, the slope of that line would be exactly -4.  And how do we know
					this?  Because f'(x) = 2x, and when we plug -2 in for x, we get f'(x) = -4!
				</p>
				
				<h3>Great!  So what?</h3>
				<p>
					So we know that a derivative is a function that evaluates to the slope of the base function
					at a given point.  But what do we do with that information?
				</p>
				<p>
					The answer is that we can use this information to enable the training process for a Machine
					Learning model.  Without the power of derivatives, the models we see today wouldn't be possible.
					To see how these derivatives play into ML, see the lesson on
					<a href="../general/gradient-descent.php">Gradient Descent</a> in the General Machine Learning topic
					section.
				</p>


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
