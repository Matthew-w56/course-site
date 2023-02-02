

function handleLessonToggle(obj) {
	let div = obj.parentElement.getElementsByClassName("collapse-div")[0];
	let imgs = obj.parentElement.getElementsByClassName("arrow"); //[0]: down;  [1]: up;
	if (div.classList.contains("gone")) {
		div.classList.remove("gone");
		imgs[0].classList.add("hidden");
		imgs[1].classList.remove("hidden");
	} else {
		div.classList.add("gone");
		imgs[0].classList.remove("hidden");
		imgs[1].classList.add("hidden");
	}
}