

const canvas = document.getElementById("tree-canvas");
const ctx = canvas.getContext("2d");
let points = [];
//x, y, width, height, color, x/y to split next
let sections = [[0, 0, 550, 300, 0, 0]];
let colors = ["rgba(255, 0, 0, 0.5)", "rgba(0, 0, 255, 0.5)"];

canvas.width = 550;
canvas.height = 300;

canvas.addEventListener("pointerdown", (e) => {
	//Add a point
	console.log("Registering point.");
	points.push([e.offsetX, e.offsetY]);
});

function drawSplits() {
	sections.forEach((rect) => {
		ctx.fillStyle = colors[rect[4]];
		ctx.fillRect(rect[0], rect[1], rect[2], rect[3]);
	});
}

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

makeSplit(0, 200, 0);
makeSplit(1, 150, 1);
makeSplit(2, 400, 0);

drawSplits();

