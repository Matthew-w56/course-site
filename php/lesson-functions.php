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

?>