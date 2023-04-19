
let lrPoints = [];
let lrModel = new LinearRegressionModel(1, 100, 0.00008);
let lrSpeed = 50;
let lrAcceptingPoints = true;
let lrDiffThreshold = .07;
let lrSpeedLabels = ["null", "Slowest", "Slower", "Normal", "Faster", "Fastest"];

let oldLRLeft = 0;
let oldLRRight = 0;

const lrDemoCanvas = document.getElementById("lr-demo-canvas");
const lrStopButton = document.getElementById("lr-stop-btn");
const lrSpeedSlider = document.getElementById("lr-slider");
const lrSliderOutput = document.getElementById("lr-slider-output");
const lrctx = lrDemoCanvas.getContext("2d");

lrDemoCanvas.width = 550;
lrDemoCanvas.height = 300;

lrDemoCanvas.addEventListener("pointerdown", (event) => {
	if (!lrAcceptingPoints) return;
	drawCircleOnLR(event.offsetX, event.offsetY);
	lrPoints.push([event.offsetX,event.offsetY]);
});
lrSpeedSlider.oninput = handleRegressionSliderChange;

/**
 * Fires when slider value is changed. 
 * Sets text to "Slow", "Normal", or "Fast" and updates
 * internal speed variable.
 */
function handleRegressionSliderChange() {
	lrSpeed = this.value;
	lrSliderOutput.innerText = lrSpeedLabels[this.value];
	console.log(this.value);
}

function drawCircleOnLR(x, y) {
	//Draw a little circle around xy
	lrctx.beginPath();
	//center x&y, radius, startAngle, endAngle, (Clockwise?)
	lrctx.arc(x, y, 3, 0, Math.PI*2, true);
	lrctx.fill();
}

function resetLRFrame() {
	//Clears out the canvas
	lrctx.clearRect(0, 0, 550, 300);
	
	//Draw the points (little circles w/ radius 3)
	lrctx.fillStyle = "#000000";
	lrPoints.forEach((set) => {
		drawCircleOnLR(set[0], set[1]);
	});
}

function iterateDescentForLRCanvas() {
	
	//update the model
	lrModel.iterateDescent(lrPoints);
	
	//redraw the screen
	resetLRFrame();
	if (!lrAcceptingPoints)
		drawRegressionModel();
	
	//TODO: This can change to use singular method
	//If nothing has changed (equilibreum reached), then don't schedule another update
	let predictions = lrModel.predictAll([[0, 777], [550, 777]]);
	if (Math.abs(predictions[0] - oldLRLeft ) < lrDiffThreshold &&
		Math.abs(predictions[1] - oldLRRight) < lrDiffThreshold) {
			return;
	}
	oldLRLeft  = predictions[0];
	oldLRRight = predictions[1];
	
	//Otherwise, check to see if we should go again
	if (!lrAcceptingPoints) setTimeout(iterateDescentForLRCanvas, 1000 / (lrSpeed*30 + 10));
}

function handleStartRegressionButton() {
	//Boot scoot if the points are empty
	if (lrPoints.length == 0) return;
	
	//Mark the canvas as non-editable
	lrAcceptingPoints = false;
	lrDemoCanvas.style.border = "2px solid black";
	lrStopButton.classList.remove("d-none");
	lrSpeedSlider.disabled = true;
	lrSpeedSlider.classList.add("lr-slide-disabled");
	
	//Reset the model and start gradient descent
	lrModel = new LinearRegressionModel(-0.01, 0, 0.00001);
	oldLRLeft = 0;
	oldLRRight = 0;
	iterateDescentForLRCanvas();
}

function handleResetRegressionButton() {
	//Reset the canvas to editable
	lrAcceptingPoints = true;
	
	//Make it look editable again
	lrDemoCanvas.style.border = "1px solid black";
	lrStopButton.classList.add("d-none");
	lrSpeedSlider.disabled = false;
	lrSpeedSlider.classList.remove("lr-slide-disabled");
	
	//Reset the points and canvas
	lrPoints = [];
	lrctx.clearRect(0, 0, 550, 300);
}

function handleStopRegressionButton() {
	//Reset the canvas to editable
	lrAcceptingPoints = true;
	
	//Make it look editable again
	lrDemoCanvas.style.border = "1px solid black";
	lrStopButton.classList.add("d-none");
	lrSpeedSlider.disabled = false;
	lrSpeedSlider.classList.remove("lr-slide-disabled");
	
	//Clear everything out and redraw the points only
	resetLRFrame();
}

function drawRegressionModel() {
	//Draws the prediction line for the model
	lrctx.strokeStyle = "#FF5555";
	lrctx.beginPath();
	lrctx.moveTo(0, lrModel.predict(0));
	lrctx.lineTo(550, lrModel.predict(550));
	lrctx.stroke();
}
