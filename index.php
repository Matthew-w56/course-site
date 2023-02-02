<?php
include_once("php/functions.php");
include_once("php/db.php");
$user_logged_in = loggedInInit();
$show_account = $user_logged_in;
$show_login = !$user_logged_in;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Course Site | Learn Machine Learning</title>
		<?php include_once("php/head-links.php"); ?>
		<link rel="stylesheet" href="css/index.css?v=<?php echo rand(10,99); ?>">
	</head>
	<body>
		<?php include_once('php/nav.php'); ?>
		
		
		<!-- Title Content -->
		<div class="main-content container-fluid">
			<div class="title-content row gy-4">
				
				<div class="col filler"></div>
				
				<div class="title-img col-3">
					<img src="img/guy-with-laptop.png" width="330px">
				</div>
				
				<div class="col-1 filler"></div>
				
				<div class="title-text col-6">
					<h1>Learn about<br><lgr>Machine Learning</lgr>.</h1>
					<p>Learn anything ML related at all levels.  From intuitive examples to mathmatical explainations, Course Site has what you need.</p>
					<?php if (!$user_logged_in) { ?>
					<a href="signup.php" class="btn btn-primary main-btn btn-sec">Create an Account</a>
					<a href="topic/." class="btn main-btn main-btn-second">Available Topics</a>
					<?php } else { ?>
					<a href="topic/." class="btn btn-primary main-btn btn-sec">Go to Topics</a>
					<a href="account.php" class="btn main-btn main-btn-second">See my account</a>
					<?php } ?>
				</div>
				
				<div class="col filler"></div>
			</div>
			<!-- Title Content -->
			
			<!-- Description -->
			<div class="description row container-fluid">
				
				<div class="col filler"></div>
				
				<div class="description-text col-5">
					<h1>Learning at your pace.<br> For your needs.</h1>
					<p>Each lesson is broken down into pieces so you can move at your own pace.  Just how it should be.</p>
					<a href="topic/." class="btn btn-primary main-btn">See Lessons</a>
				</div>
				
				<div class="description-img col-4">
					<img src="img/girl-on-ground.png" width="490px" class="shadow">
				</div>
				
			</div>
			<!-- Description -->
			
			<!-- Progress Tracker Info -->
			<div class="track-progress row gy-4">
				<div class="col-4">
					<img src="img/book-and-leaves.png" class="track-img shadow" width="480px">
				</div>
				
				<div class="col-1"></div>
				
				<div class="track-content col-5">
					<h1>Track Progress, and<br>Always know what's next.</h1>
					<p>A custom-made progress page shows you what is next.  Progress, without the stress.</p>
					<a href="progress.php" class="btn btn-primary main-btn btn-sec">See Tracker</a>
				</div>
				
				<div class="col filler"></div>
			</div>
			<!-- Progress Tracker Info -->
			
			<!-- Topics Banner -->
			<div class="topics-box row gy-4 shadow">
				<h1>Browse Topics Now</h1>
				<div class="topics-text-box">
					<p>See what you could learn today, and get started on (or continue) your machine learning journey!</p>
				</div>
				<a href="topic/." class="btn btn-primary main-btn">Go to topics</a>
			</div>
			<!-- Topics Banner -->
			
		</div>
		
		<!-- Footer -->
		<?php include_once('php/footer.php'); ?>
	</body>
</html>
