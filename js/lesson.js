function chooseAnswer(obj) {
	let parent = obj.parentElement.parentElement;
	if (parent.getAttribute("isDone") == 1) return;
	let PrevChosenAnswer = parent.getElementsByClassName("chosen")[0];
	if (PrevChosenAnswer != null) PrevChosenAnswer.classList.remove("chosen");
	if (obj != PrevChosenAnswer) obj.classList.add('chosen');
}

function handleQuizSubmit(obj) {
	let parent = obj.parentElement;
	let grandparent = parent.parentElement;
	let chosenAnswer = parent.getElementsByClassName("chosen")[0];
	let output = parent.getElementsByClassName("output")[0];
	if (chosenAnswer == null) {
		//No answer was chosen
		output.innerHTML = "Please choose an answer";
		output.classList.remove("hidden");
	} else if (chosenAnswer.getAttribute("isCorrect") == 1) {
		//Correct answer chosen
		chosenAnswer.classList.add("final-correct");
		output.innerHTML = "That is right!";
		parent.classList.add("correct");
		parent.setAttribute("isDone", 1);
		obj.classList.add("hidden");
		output.classList.add("output-correct");
		output.classList.remove("hidden");
		let emptyCircle = grandparent.getElementsByClassName("quiz-state-indicator")[0];
		let filledCircle = grandparent.getElementsByClassName("hidden quiz-state-indicator")[0];
		emptyCircle.classList.add("hidden");
		filledCircle.classList.remove("hidden");
		
		//Any Database logging of completed quiz would happen here
	} else {
		//Wrong answer chosen
		chosenAnswer.classList.add("wrong");
		output.classList.remove("hidden");
		let message = parent.getAttribute("message" + chosenAnswer.getAttribute("indx"));
		output.innerHTML = message;
	}
}