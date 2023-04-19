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
		<title>Gradient Descent | Course Site</title>
		<?php include_once("../../php/head-links.php"); ?>
		<link rel="stylesheet" href="../../css/lesson.css?v=<?php echo rand(10,99); ?>">
		<link rel="stylesheet" href="../../css/lr-demo.css">
		<script src="../../js/linear-regression.js"></script>
		<script src="../../js/lr-demo.js" defer></script>
		<script src="../../js/lesson.js" defer></script>
	</head>
	<body>
		<?php include_once('../../php/nav.php'); ?>
		
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
				<br>
			</div>
			
			<div class="title-img">
				<img src="../../img/lesson-img/gradient-descent.png">
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
					the slope of the function at that point.  This means that with one point, we can know which way to go
					to increase the function, and which way to go to decrease it.
				</p>
				
				<h3>Now, for the Gradient part</h3>
				<p>
					First off, let's look at the words "gradient descent" themselves and their meanings.
					The word <span>gradient</span> means a slope, or incline.  And <span>descent</span>, is
					the act of going down something.  So, intuitively, the term Gradient Descent just refers
					to the process of moving from a spot that leads to a lot of error for a model towards one that leads
					to less error.  Literally moving from high error to low.
				</p>
				<p>
					Let's look at the image from above again.
				</p>
				<br>
				<div class="title-img">
					<img src="../../img/lesson-img/gradient-descent.png" class="lesson-img">
				</div>
				<p>
					In this example, we have a graph where the X axis is our model's weight, and the Y axis is
					the model's error on some training set X<sup>^</sup>.  The large red point on the graph is
					our initial weight and the error it yields on X<sup>^</sup>, and the blue arc is the error
					function, which is a function of our weight.  And as you can see, the dotted line is labelled
					"Gradient".  It represents the slope of the error function at that point.  Because
					it points downwards off to the left, we know we need to decrease the weight to achieve a lower
					error.  These shifts are shown by the red arrows.
				</p>
				
				<h3>Hip Hip Hurray!</h3>
				<p>
					And just like that, you have performed Gradient Descent!  There are many complexities that we
					will get to later, but that is the basic idea: changing the weights of a model to achieve a
					better result.  And we use the gradient as a guide for how to adjust the weights.
				</p>
				
				<?php
				//quiz($question, $answers, $correctIndex, $title='Quiz Time!', $img = '')
					echo quiz(
						'Which of these is the most appropriate alternative word for "Gradient"?',
						[
							'Distance',
							'Weight',
							'Derivative',
							'Direction'
						],
						2,
						'Material Review',
						'',
						[
							'Distance is just one part of a gradient',
							'The weight is the thing we are updating',
							'-',
							'Direction is just one part of a gradient'
						]
					);
				?>
				
				<h5>
					Behind the Mathematics
				</h5>
				
				<p>
					As is common in Machine Learning, the math we do doesn't include a ton of numbers.  Usually, a
					gradient is represented by the variables that go into it, and their relation to eachother.  They
					can look scary at first but after looking into what it all means they become much nicer.
				</p>
				<p>
					Let's look at a common error function, the Least Squares Error.
				</p>
				<img class="math-img" src="../../img/math/least-squares-error.png">
				<p>
					There are two layers to this equation.  The section within the inner-most parenthases is often
					condensed as
				</p>
				<img src="../../img/math/least-squares-y-hat.png" class="math-img" style="height: 80px;">
				<p>
					The variables may be a bit different, but we know what this equation represents!  It's the
					equation for a line (y=mx+b).
				</p>
				<p>
					The y hat is the model's prediction.  It generates this prediction by taking
					the input (x<sub>i</sub>) and multiplying it by the weight (pronounced "theta"), then adding the
					bias (pronounced "beta").
				</p>
				<p>
					Using y hat as a substitute, we get
				</p>
				<img src="../../img/math/least-squares-condensed.png" class="math-img">
				<p>
					What this equation is saying, in English, is that the label (or true value) that corresponds to
					the input is subtracted from the model's prediction.  That difference is then squared to make all
					differences positive.  This is then cut in half to make the derivative easier to calculate, as we
					will see in a second.
				</p>
				
				<h3>
					Least Square's Derivative
				</h3>
				<p>
					Using the Chain rule and the Power rule from Calculus, we can find the derivative of this equation
					so we can start training our model.  To start, we use the power rule to bring the exponent
					down in front of the whole thing, and click the power down by 1 (to 1).
				</p>
				<img src="../../img/math/least-squares-power-rule.png" class="math-img">
				<p>
					The power of 1 can be ignored, and the leading 2 cancels out with the one half to leave us with
				</p>
				<img src="../../img/math/least-squares-factored-1.png" class="math-img">
				<p>
					But we're not done yet.  The Chain Rule states that we must multiply by the derivative of the
					inner part.  In this case, the inner part is y hat.  Let's look at what y hat represents again.
				</p>
				<img src="../../img/math/least-squares-y-hat.png" class="math-img" style="height: 80px;">
				<p>
					The derivative of y hat with respect to theta is x<sub>i</sub>.  So let's throw that into the equation
					we've been working with.
				</p>
				<img src="../../img/math/least-squares-derivative.png" class="math-img">
				<p>
					As a side note, you may also see it written (and implemented) as being divided by n.  This has the
					effect of getting the average gradient between all the data points, as opposed to the sum.  It helps
					keep the final gradient in the same ballpark as the individual gradients, which can be very good.
				</p>
				<img src="../../img/math/least-squares-derivative-average.png" class="math-img">
				<p>
					And we're done!  This is the final derivative of the Least Squares Error equation with respect to
					theta.  And what this equation means in English is that the derivative of our error function with
					respect to the weight that we used for theta is equal to the difference between our prediction and the
					true label, multiplied by the corresponding x.  And by summing these all together, one for each data point,
					we get the sum derivative for that weight.
				</p>
				
				<h3>Handling the Bias</h3>
				<p>
					What you might have noticed this far is that we have been solving for the derivative of the error function
					with respect to theta, but we have completely ignored beta!  Beta is another number that we will be adjusting
					as our model learns, so what is it's derivative?  If you want you can read back through the last section, and
					try to figure out what it should be for beta before reading ahead and seeing the answer.
				</p>
				<p>
					So let's look at beta.
				</p>
				<img src="../../img/math/least-squares-error.png" class="math-img">
				<p>
					Because beta sits in the same set of parenthases as theta, we can reuse a few steps of math from last time.
					Namely, we can assume the same power rule applies here which, after reducing, left us with this.
				</p>
				<img src="../../img/math/least-squares-factored-1.png" class="math-img">
				<p>
					This is where we differ from last time.  This time our next step is to find the derivative of y hat with respect
					to beta, rather than theta.  Looking at the full equation above, we see that the derivative of y hat with respect
					to beta is just 1.  So, the final derivative of the error function with respect to beta is just:
				</p>
				<img src="../../img/math/least-squares-factored-1.png" class="math-img">
				<p>
					This is a common pattern in the derivatives of Machine Learning models.  The derivative of a weight that is multiplied
					with some sort of input is often the derivative of it's corresponding bias, multiplied by it's input.
				</p>
				<p>
					And the practice of reusing math, or computation, comes back in a big way once we get to Neural Networks.  But for now
					we have saved some extra work, and we got to the derivatives of a model that uses Least Squares Error.
				</p>
				
				<h3>
					Applying the Gradient
				</h3>
				<p>
					Okay, so we have an equation for the gradient, now what?
				</p>
				<p>
					The goal is to make our model perform better by minimizing a function that describes how bad our model is doing.  In the
					previous section, we looked at the equation to see how bad the model is doing, and we found the equation to find the gradient.
				</p>
				<p>
					So if we apply it to the current weight or bias, we should be good, right?  Yes, but there are a few things to keep in mind.
					The first thing is the question:
				</p>
				<p>
					Do we want to add, or subtract the gradient from the current weight?
				</p>
				<p>
					Well, the goal is to reduce error, but the gradient describes the slope of the error function.  So if we add it, we will
					see a higher error next time, because that's what a gradient is.  But, if we subtract it, we will see a lower error next time.
				</p>
				<p>
					Another side detail to keep in mind is that subtracting the gradient itself is way too big of a change.  Making gradient steps
					that are too large can lead to bouncing right past the spot we want to get to in our weight, and end up worse off than when we
					started.
				</p>
				<p>
					Here is an example of where updating the weight leads to when the changes we make are too large.
				</p>
				<div class="img-wrapper">
					<img src="../../img/lesson-img/gradient-large-step.png" style="width: 400px;">
				</div>
				<p>
					The problem is that the change takes the weight past the middle and off to the side, even further from the middle than it was
					before.  Then, because the wall of the function is even steeper in the new spot than the first one, the next gradient is in the
					opposite direction, and even larger than before.  This pattern repeats forever as the model gets further and further from where
					it should be.
				</p>
				<p>
					This occurance is called divergence, or we say that the gradient is diverging.  So we multiply the gradient by a very small number
					(let's say, 0.01) to keep the steps managable.
				</p>
				
				<h3>
					Update Equation
				</h3>
				<p>
					Every time we want to update our weight or bias, we will do these two equations.  Each of these model the effect of multiplying
					the gradients by a small number (represented as gamma) and subtracting them from their corresponding weight or bias.
				</p>
				<img src="../../img/math/least-squares-update-weight.png" class="math-img"><br>
				<img src="../../img/math/least-squares-update-bias.png" class="math-img" style="margin-top: 10px;">
				<p>
					And by subtracting these values from the weight and bias, the model will perform better the next time.  These update equations
					are run many times, usually between a few hundred to a few thousand.
				</p>
				
				<?php
				//quiz($question, $answers, $correctIndex, $title='Quiz Time!', $img = '')
					echo quiz(
						'Why do we use a gamma term to make the gradient steps smaller, such as in this equation?',
						[
							'To put off other work we have to do',
							'To keep the gradient from diverging',
							'Because the weights are so small',
							'Because the Least Squares Error is being used'
						],
						1,
						'Gradient Quiz',
						'../../img/math/least-squares-update-weight.png',
						[
							'Not quite, try again!',
							'-',
							'Not necessarily.  The weights could be quite large.  Try again',
							'The cost function doesn\'t affect the use of the gradient, try again'
						]
					);
				?>
			</div>
				
			<?php
				echo nextLessonBanner(
					'Next Lesson: Hyperparameters',
					'Now that we have looked at some numbers that we let the model train, it\'s time to look into the
						settings that we take care of ourselves.',
					'hyperparameters.php'
				);	
			?>
			<div class="summary">
				<h5>
					Summary of Equations
				</h5>
				<p>
					Least Squares Error equation
				</p>
				<img src="../../img/math/least-squares-error.png" class="math-img">
				<p>
					Least Squares Error condensed
				</p>
				<img src="../../img/math/least-squares-condensed.png" class="math-img">
				<p>
					Derivative with respect to Theta
				</p>
				<img src="../../img/math/least-squares-derivative.png" class="math-img">
				<p>
					Derivative with respect to Beta
				</p>
				<img src="../../img/math/least-squares-factored-1.png" class="math-img">
				<p>
					Update Equations
				</p>
				<img src="../../img/math/least-squares-update-weight.png" class="math-img"><br>
				<img src="../../img/math/least-squares-update-bias.png" class="math-img" style="margin-top: 10px;">
			</div>
		</div>
		
		<?php
			include_once("../../php/footer.php");
		?>
	</body>
</html>
