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
		<title>Account | Course Site</title>
		<?php include_once("php/head-links.php"); ?>
		<link rel="stylesheet" href="css/account.css?v=<?php echo rand(10,99); ?>">
	</head>
	<body>
		<?php include_once('php/nav.php'); ?>
		
		<div class="main-content">
			
			<div class="image-sidebar">
				<img src="img/profiles/default.png">
				<p>Your name here</p>
			</div>
			<div class="information">
				
			</div>
			
		</div>
			
		<!-- Footer -->
		<?php include_once('php/footer.php'); ?>
	</body>
</html>
