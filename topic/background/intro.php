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
			<h2>Background Mathematics</h2>
			<a href="#" class="side-nav-item side-nav-active">What is Machine Learning</a>
			<a href="calculus.php" class="side-nav-item">Calculus and Derivatives</a>
			<div class="spacer"></div>
		</div>
		
		<div class="main-content">
			
			<div class="title container-fluid">
				<h1>What is Machine Learning?</h1>
				<h4>Background Mathematics</h4>
				<br>
			</div>
			
			<div class="img-wrapper">
				<img src="../../img/lesson-img/ml-intro.jpg" class="lesson-img" width="80%;" style="margin-left: 10%;">
			</div>
			
			<div class="intro">
				<p>
					What exactly is Machine Learning?  We all have some idea of what it is.  But before we can
					really dig into the specifics, we need to specify what we mean.  There is a difference between
					what many people think of as Machine Learning, and what it actually is.  Understanding the specifics
					of what it truly is will help us as we go on to other topics.
				</p>
			</div>
			
			<div class="lesson-content">
				<h3>Machine Learning vs Intelligence</h3>
				<p>
					The goal of Machine Learning is to teach a computer how to learn the best way to do something.  This
					is very different from creating an 'intelligent' system.  Intelligence implies that the computer can
					reason, think, experience it's surroundings, and grow in it's abilities.  Machine Learning can be
					more accurately described up as a computational Mad Lib.
				</p>
				
				<h3>Mad Lib Analogy</h3>
				<p>
					If you've never seen a Mad Lib, here is the general idea: there are two players.  One asks the other for a list
					of words fitting certain descriptions.  They might ask for a noun, two verbs, a plural noun, and a conjunction.
					The other player gives them random words that fit that bill, and the first player fills them in on a card that
					has a story on it with a number of blanks.  One sentence might be "Bob was ____ing down the hill".  The sentence
					might be filled in with any verb, such as "Bob was cooking down the hill".
				</p>
				<p>
					This relates quite closely to what Machine Learning does, but with a few changes.  Instead of a story, a Machine
					Learning model can be thought of as a math equation.  Some of the variables in the equation are some kind of input
					from a data set, and some are variables that the model is optimizing.
				</p>
				<p>
					To better solidify this perspective in your mind, let's look at an equation that we are all familiar with:
					that of a line.  The equation looks like this:
				</p>
				<img class="math-img short-math-img" src="../../img/math/line-equation.png">
				<p>
					The input from a data set here is x, and the two variables that the model can play with are m and b.  We
					will get into how the model finds the best values for these variables later, but the idea to get from this
					example is that Machine Learning is a process where a computer tries to find a good filler value for the
					blanks in an equation.
				</p>
				
				<h3>Difficulties in ML</h3>
				<p>
					This is where the difficulties come in.  Look the example of an ML model that is meant to classify images.  What
					equation would you use to decide if a photo depicts a cat, a dog, or neither?  And what variables would the model
					mess with?  And in cases where we don't know the answer ourselves, how can we lead a Machine Learning model to the
					answer that we want to find?
				</p>
				<p>
					The answer lies in the magic that we call Calculus.  And, granted, not many people like doing Calculus.  But you don't have
					to like doing the math to appreciate just how interesting and powerful the ideas behind it are.  Using the power of a
					derivative, we will see how we can lead our models to the best values for the variables it controls, so that our models can
					perform their tasks as well as possible.
				</p>
				<p>
					But to understand how derivatives lead us to the best model possible, we need to look at what a derivative is first.
					And that is what the next lesson will cover.
				</p>
				
				<?php
					echo quiz(
						'Using your general understanding of Machine Learning, which of these examples might be easiest to achieve with Machine Learning?',
						[
							'Creating deep fake images',
							'Finding a dot plot\'s best-fit line',
							'Creating an interactive chat-bot',
							'Detecting sarcasm in an e-mail'
						],
						1, //Index of correct answer
						'Review Time!',
						'',
						[
							'Image processing of any kind is quite complex',
							'-',
							'Text processing is much more complicated than numerical problems',
							'Determining the intent behind text is quite complex'
						]
					);
				?>
			</div> <!-- End of lesson-content -->
			
			
			<?php
				//This creates the banner for the next lesson.  Parameters are Title, Description, and full link address
				echo nextLessonBanner(
					'Next Lesson: Calculus and Derivatives',
					'It\'s time to look at calculus, and derivatives in particular.  What they are, and how we get them, will
						help us in our Machine Learning journey.',
					'calculus.php'
				);	
			?>
		</div>
		
		<?php
			include_once("../../php/footer.php");
		?>
	</body>
</html>
