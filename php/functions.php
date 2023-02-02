<?php
session_start();

//AKA: "File or Hashtag".  Returns the link unless you are already on that page, making it a hashtag
// Input names in the form of the absolute path from the root of the page (htdocs/$name)
// Ex: /course-site/index.php
// Ex: /course-site/topic/general/lessonExp.php
function foh($name, $newPath='') {
	return ($_SERVER['PHP_SELF'] == $name ? '#' : 
		($name == '/course-site/index.php' ? '/course-site/.' : $name)
	);
}

//Will eventually use the photo path to get the photo
function getUserPhoto() {
	return '<img src="/course-site/img/profiles/default.png" class="user-photo">';
}

//Returns the display name for the user
function getUserName() {
	if (isset($_SESSION['nameIsEmail'])) {
		//This is an email, not a name
		//So, return the email without the @whatever.com, and capitalize the fist letter
		$email = $_SESSION['uname'];
		$indexOfAt = strpos($email, '@');
		$email = substr($email, 0, $indexOfAt);
		return ucfirst($email);
	} else {
		//This is just their user name
		//So, return it with all lowercase, and a capital first letter
		return ucfirst(strtolower($_SESSION['uname']));
	}
}


?>