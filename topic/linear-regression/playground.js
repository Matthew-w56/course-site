/*
Author: Matthew Williams
Date: April 2023

This file is meant to test the use and displaying of
Decision Trees for the users of the site learning about
how they work.  This is in conjunction with the now-
finished Linear Regression add-in that allows the user
to see Linear Regression happen in real time on a small
set of data points that they created.
*/

//Load elements from the document
const canvas = document.getElementById("tree-canvas");
const ctx = canvas.getContext("2d");
//Make the internal resolution of the canvas match it's HTML representation
canvas.width = 550;
canvas.height = 300;

//Set some things up for the functions
let points = [];
//x, y, width, height, color, x/y to split next
let sections = [[0, 0, 550, 300, 0, 0]];
let colors = ["rgba(255, 0, 0, 0.5)", "rgba(0, 0, 255, 0.5)"];

//Register events
canvas.addEventListener("pointerdown", (e) => {
	//Add a point
	console.log("Registering a new point");
	points.push([e.offsetX, e.offsetY]);
});

/**
 * Draws the splits make on the canvas, indicating
 * which areas are being classified as which
 * designation (0 or 1).
 */
function drawSplits() {
	ctx.fillStyle = "rgba(255, 255, 255, 1)";
	ctx.fillRect(0, 0, 550, 300);
	sections.forEach((rect) => {
		ctx.fillStyle = colors[rect[4]];
		ctx.fillRect(rect[0], rect[1], rect[2], rect[3]);
	});
}

/**
 * Creates a split on the canvas at the given position.
 * 
 * Parameters:
 * index		-		- (int) Index of the existing region being split
 * split_pos	-		- (int) either the X or Y position to split the region at
 *						  (Note: Whether it's split along X or Y depends on the region)
 * first_designation	- (0 or 1) What the left/top section should be designated.
 */
function makeSplit(index, split_pos, first_designation) {
	let rect = sections[index];
	
	if (rect[5] == 0) {
		//Split on the X axis
		
		//Left section of the split
		sections[index] = [
			rect[0], //x
			rect[1], //y
			split_pos - rect[0], //width
			rect[3], //height
			first_designation, //color
			1		//Split y next time
		];
		
		//Right section of the split
		sections.push([
			split_pos, //x
			rect[1], //y
			rect[2] - sections[index][2], //width
			rect[3], //height
			(first_designation + 1) % 2, //color
			1		//Split y next time
		]);
		
	} else {
		//Split on the Y axis
		
		//Top section of the split
		sections[index] = [
			rect[0], //x
			rect[1], //y
			rect[2], //width
			split_pos - rect[1], //height
			first_designation, //color
			0	//Split x next time
		];
		
		//Bottom section of the split
		sections.push([
			rect[0], //x
			split_pos, //y
			rect[2], //width
			rect[3] - sections[index][3], //Height
			(first_designation + 1) % 2, //color
			0	//Split x next time
		]);
	}
}

//Test section: runs a few splits and draws it
makeSplit(0, 200, 0);
makeSplit(1, 150, 1);
makeSplit(2, 400, 0);

drawSplits();

