
<nav id="main-nav" class="navbar navbar-expand-lg navbar-light mt-1 px-3 shadow-sm">
	<div class="container-fluid d-flex">
		<div class="d-flex">
			<a href="<?php echo foh('/course-site/index.php'); ?>" class="navbar-brand mx-5 d-inline d-sm-flex"><h4 class="icon-name">Course Site</h4></a>
			
			<a class="nav-link btn btn-primary first" href="<?php echo foh('/course-site/topic/index.php'); ?>">Lesson Topics</a>
			
			<!-- a href="<?php echo foh('/course-site/progress.php'); ?>" class="nav-link second">My Progress</a -->
			<a href="<?php echo foh('/course-site/contact.php'); ?>" class="nav-link second">Contact Us</a>
			<a href="<?php echo foh('/course-site/about.php'); ?>" class="nav-link second">About us</a>
		</div>
		
		<div class="d-flex nav-item" style="box-sizing: border-box;">
			<a class="nav-link btn btn-primary first<?php echo ($show_login ? '' : ' d-none'); ?>" href="<?php echo foh('/course-site/signup.php'); ?>">Sign up</a>
			<a class="nav-link second<?php echo ($show_login ? '' : ' d-none'); ?>" href="<?php echo foh('/course-site/login.php'); ?>">Log in</a>
			
			<a class="nav-link second<?php echo ($show_account ? '' : ' d-none'); ?>" href="<?php echo foh('/course-site/account.php'); ?>"><?php echo getUserName();  echo getUserPhoto(); ?></a>
			<a class="nav-link second<?php echo ($show_account ? '' : ' d-none'); ?> logout" href="/course-site/php/handlers/handle-logout.php">Log out</a>
		</div>
	</div>
</nav>
<div class="nav-spacer"></div>
