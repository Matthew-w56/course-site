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
		<title>Decision Trees Testing | Course Site</title>
		<?php include_once("../../php/head-links.php"); ?>
		<link rel="stylesheet" href="../../css/lesson.css?v=<?php echo rand(10,99); ?>">
		<link rel="stylesheet" href="playground.css">
		<script src="../../js/lesson.js" defer></script>
		<script src="playground.js" defer></script>
	</head>
	<body>
		<?php include_once('../../php/nav.php'); ?>
		
		<div class="side-nav shadow-sm">
			<h2>Testing Stuff</h2>
			<a href="#" class="side-nav-item side-nav-active">Active Lesson</a>
			<a href="#" class="side-nav-item">Other Lessons</a>
			<div class="spacer"></div>
		</div>
		
		<div class="main-content">
			
			<div class="title container-fluid">
				<h1>Decision Trees</h1>
				<h4>A Visual Demonstration</h4>
			</div>
			
			<div class="lesson-content">
				
				<canvas id="tree-canvas" class="tree-canvas"></canvas>
				
			</div> <!-- End of lesson-content -->
		</div>
		
		<?php
			include_once("../../php/footer.php");
		?>
	</body>
</html>
