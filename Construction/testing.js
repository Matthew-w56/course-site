
function chooseAnswer(obj) {
	let parent = obj.parentElement.parentElement;
	if (parent.getAttribute("isDone") == 1) return;
	let PrevChosenAnswer = parent.getElementsByClassName("chosen")[0];
	if (PrevChosenAnswer != null) PrevChosenAnswer.className = '';
	if (obj != PrevChosenAnswer) obj.className = 'chosen';
}

function handleQuizSubmit(obj) {
	let parent = obj.parentElement;
	let chosenAnswer = parent.getElementsByClassName("chosen")[0];
	let output = parent.getElementsByClassName("output")[0];
	if (chosenAnswer == null) {
		//No answer was chosen
		output.innerHTML = "Please choose an answer";
		output.className = "output";
	} else if (chosenAnswer.getAttribute("isCorrect") == 1) {
		//Correct answer chosen
		output.innerHTML = "That is right!";
		parent.className = "quiz correct";
		parent.setAttribute("isDone", 1);
		obj.className = "hidden";
		output.className = "output output-correct";
		//Any Database logging of completed quiz would happen here
	} else {
		//Wrong answer chosen
		chosenAnswer.className = "chosen wrong";
		output.className = "output";
		output.innerHTML = "Try again!";
	}
}