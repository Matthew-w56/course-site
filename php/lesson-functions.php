<?php

function getWrongMessages($messages, $count) {
	$return = '';
	if (empty($messages) || sizeof($messages) != $count) {
		//only '' passed in AKA: no messages provided
		//Or, messages provided but the number of them
		//doesn't match the number of answers in quiz
		//So, fill with default messages
		for ($i = 0; $i < $count; $i++) {
			$return .= ' message'.$i.'="Try again!"';
		}
	} else {
		//Messages provided and correct count of messages
		for ($i = 0; $i < $count; $i++) {
			$return .= ' message'.$i.'="'.$messages[$i].'"';
		}
	}
	return $return;
}

function quiz($question, $answers, $correctIndex, $title='Quiz Time!', $img='', $wrongMessages='') {
	?>	
	<div class="wrapper">
		<div class="quiz-head-div">
			<h3 class="quiz-header"><?php echo $title; ?></h3>
			<img class="quiz-state-indicator" src="../../img/lesson-img/circle.svg">
			<img class="hidden quiz-state-indicator" src="../../img/lesson-img/check2-circle.svg">
		</div>
		<div class="quiz" isdone="0"<?php echo getWrongMessages($wrongMessages, sizeof($answers)); ?>>
			<div class="quiz-body">
				<?php if (!empty($img)) echo '<img src="'.$img.'">'; ?>
				<p><?php echo $question; ?></p>
			</div>
			<div class="quiz-choices block">
				<?php
				for ($i = 0; $i < sizeof($answers); $i++) {
					echo '<p class="" indx="'.$i.'" onClick="chooseAnswer(this);"'.($i == $correctIndex ? ' isCorrect="1"' : '').'>'.$answers[$i].'</p>';
				}
				?>
			</div>
			<p class="js-btn" onClick="handleQuizSubmit(this);">Check answer</p>
			<p class="output hidden"></p>
		</div>
	</div>
	<?php
}

function nextLessonBanner($title, $desc, $link) {
	?>
	<div class="next-lesson-wrapper container-fluid">
		<div class="next-lesson-content container">
			<h6><?php echo $title; ?></h6>
			<p><?php echo $desc; ?></p>
			<a href="<?php echo $link; ?>" class="btn btn-primary main-btn next-btn">Go to Lesson</a>
		</div>
	</div>
	<div class="next-lesson-spacer"></div>
	<?php
}

/**
 * 
 * NOTE TO DO NEXT: ACTUALLY MOVE THE FILES
 * so that they are called lr-demo and are in the
 * right places. Right now they are called Playground
 * 
 * Also, names are half renamed in playground.js. Make
 * sure it works and find any missed variable names.
 * 
 * 
 * To use this function, make sure to include the associated
 * JS and CSS files to support it's usage.  These are found
 * in the JS and CSS founders, and are called lr-demo(.js/.css)
 * (But, first include the linear-regression model JS file in the
 * /js/models folder)
 */
function linearRegressionDemo() {
	?>
		<div class="lr-demo shadow-sm">
			<canvas id="lr-demo-canvas" class="lr-demo-canvas"></canvas><br>
			<button onClick="handleStartRegressionButton();" class="">Start Regression</button>
			<button onClick="handleStopRegressionButton();" class="d-none" id="lr-stop-btn">Stop</button>
			<button onClick="handleResetRegressionButton();" class="">Reset</button>
			<br>
			<div class="lr-slidecontainer">
				<label class="lr-slide-label">Speed</label><br>
				<input type="range" min="1" max="5" value="3" class="lr-slider" id="lr-slider">
				<label id="lr-slider-output">Normal</label>
			</div>
		</div>
	<?php
}

?>