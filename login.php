<?php
include_once('php/functions.php');
include_once('php/db.php');
if (loggedInInit()) header('location: ./?push=1');
$show_account = false;
$show_login = false;

function build_error_prompt($erc, $messages) {
	$e_prompt = '';
	if ($erc > 0) {
		$max = sizeof($messages) - 1;
		for ($i = $max; $i >= 0; $i--) {
			if ($erc >= (2 ** $i)) {
				$erc -= (2 ** $i);
				$e_prompt .= '<li>* '.$messages[$i].'</li>';
			}
		}
	}
	return $e_prompt;
}

//Read in the error state from the GET (AKA: from the handle-login.php which will return here on occation of error)
$email = (isset($_GET['a1']) ? ' value="'.$_GET['a1'].'"' : '');
$password = (isset($_GET['a2']) ? ' value="'.$_GET['a2'].'"' : '');
$check_email = isset($_GET['c1']);
$check_pass = isset($_GET['c2']);
$error_code = (isset($_GET['er']) ? $_GET['er'] : 0);
$destination = (isset($_GET['dest']) ? $_GET['dest'] : '');
$error_messages = [
	'Please enter an email',
	'No account with that email exists<br><a href="signup.php'.(!empty($_GET['dest']) ? '?dest='.$_GET['dest'] : '').'" class="error-link">Create new account?</a>',
	'Please enter a password',
	'Email or password is incorrect'
];
$error_prompt = build_error_prompt($error_code, $error_messages);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Log in | Course Site</title>
		<?php include_once('php/head-links.php'); ?>
		<link rel="stylesheet" href="css/loginSignup.css?v=<?php echo rand(10,99); ?>">
	</head>
	<body>
		<?php include_once("php/nav.php"); ?>
		
		<div class="main-content container-fluid">
			
			<div class="form-box-login shadow">
				<h1>Log in</h1>
				<p class="sub-title">Welcome back to Course Site!</p>
				<form method="post" action="php/handlers/handle-login.php">
					<div class="form-section login">
						<label for="email"><b>Email<?php echo ($check_email ? '<span class="check">*</span>' : ''); ?></b></label>
						<input type="text" name="email" id="email" placeholder="Email address"<?php echo $email; ?> autofocus>
					</div>
					<div class="form-section login">
						<label for="password"><b>Password<?php echo ($check_pass ? '<span class="check">*</span>' : ''); ?></b></label>
						<input type="password" name="password" id="password"<?php echo $password; ?> placeholder="Create a password">
					</div>
					<input type="text" name="destination" value="<?php echo $destination; ?>" class="d-none">
					<div class="form-section login sub-button-div">
						<input type="submit" name="submit-button" value="Log in" class="btn-primary main-btn first sub-button btn-sec">
					</div>
					<div class="form-section login checkbox-div">
						<input class="remember-box" id="remember-me" type="checkbox" value="yes" name="remember" checked>
						<label for="remember-me">Remember me</label>
					</div>
					<div class="form-section login error-prompt-div<?php if (empty($error_prompt)) echo ' hidden'; ?> shadow">
						<?php
							if (!empty($error_prompt)) {
								echo '<ul class="error-ul">';
									echo $error_prompt;
								echo '</ul>';
							}
						?>
					</div>
				</form>
			</div>
			
			<div class="go-to-signup container">
				<p>Don't have an account yet?</p>
				<a href="signup.php" class="btn main-btn btn-primary">Create an Account</a>
			</div>
			
			<!-- Footer -->
			<?php include_once('php/footer.php'); ?>
		</div>
	</body>
</html>
