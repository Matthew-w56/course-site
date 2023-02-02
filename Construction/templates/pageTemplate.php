<?php
include_once("../../php/functions.php");
include_once("../../php/db.php");
$user_logged_in = loggedInInit();
$show_account = $user_logged_in;
$show_login = !$user_logged_in;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Page Title | Course Site</title>
		<?php include_once("../../php/head-links.php"); ?>
		<!-- <link rel="stylesheet" href="css/index.css?v=<?php echo rand(10,99); ?>"> -->
	</head>
	<body>
		<?php include_once('../../php/nav.php'); ?>
		
		<div class="main-content">
			
			<!-- |                       | -->
			<!-- | Put Page Content Here | -->
			<!-- |                       | -->
			
		</div>
			
		<!-- Footer -->
		<?php include_once('../../php/footer.php'); ?>
	</body>
</html>
