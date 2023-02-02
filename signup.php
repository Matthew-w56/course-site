<?php
include_once('php/functions.php');
include_once('php/db.php');
if (loggedInInit()) header('location: ./?push=1');
$show_account = false;
$show_login = false;
//Get this from database later
$pass_length = 8;

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

//Read in the error state from the GET (AKA: from the handle-new-user.php which will return here on occation of error)
$email = (isset($_GET['a1']) ? ' value="'.$_GET['a1'].'"' : '');
$password = (isset($_GET['a2']) ? ' value="'.$_GET['a2'].'"' : '');
$confirm = (isset($_GET['a3']) ? ' value="'.$_GET['a3'].'"' : '');
$check_email = isset($_GET['c1']);
$check_pass = isset($_GET['c2']);
$check_conf = isset($_GET['c3']);
$error_code = (isset($_GET['er']) ? $_GET['er'] : 0);
$destination = (isset($_GET['dest']) ? $_GET['dest'] : '');
$error_messages = [
	'Please enter an email',
	'Email is invalid',
	'Email is already in use<br><a href="login.php'.(!empty($_GET['dest']) ? '?dest='.$_GET['dest'] : '').'" class="error-link">Log in here</a>',
	'Please enter a password',
	'Passwords do not match',
	'Password must have length of '.$pass_length,
	'Password must contain a number',
	'Password must have one of (?!.*@,)',
	'Password cannot contain "password"'
];
$error_prompt = build_error_prompt($error_code, $error_messages);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Create Account | Course Site</title>
		<?php include_once('php/head-links.php'); ?>
		<link rel="stylesheet" href="css/loginSignup.css?v=<?php echo rand(10,99); ?>">
	</head>
	<body>
		<?php include_once("php/nav.php"); ?>
		
		<div class="main-content container-fluid">
			
			<div class="form-box-signup shadow">
				<h1>Create an account</h1>
				<p class="sub-title">Fill out the information below and get learning!</p>
				<form method="post" action="php/handlers/handle-new-user.php">
					<div class="form-section signup">
						<label for="email"><b>Email<?php echo ($check_email ? '<span class="check">*</span>' : ''); ?></b></label>
						<input type="text" name="email" id="email" placeholder="Email address"<?php echo $email; ?> autofocus>
					</div>
					<div class="form-section signup">
						<label for="password"><b>Password<?php echo ($check_pass ? '<span class="check">*</span>' : ''); ?></b></label>
						<input type="password" name="password" id="password"<?php echo $password; ?> placeholder="Create a password">
					</div>
					<div class="form-section signup">
						<label for="password-confirm"><b>Confirm password<?php echo ($check_conf ? '<span class="check">*</span>' : ''); ?></b></label>
						<input type="password" name="password-confirm" id="password-confirm"<?php echo $confirm; ?> placeholder="Confirm your password">
					</div>
					<input type="text" name="destination" value="<?php echo $destination; ?>" class="d-none">
					<div class="form-section sub-button-div">
						<input type="submit" name="submit-button" value="Create account" class="btn-primary main-btn first sub-button">
					</div>
					<div class="form-section signup checkbox-div">
						<input class="remember-box" id="remember-me" type="checkbox" value="yes" name="remember" checked>
						<label for="remember-me">Remember me</label>
					</div>
					<div class="form-section signup error-prompt-div<?php if (empty($error_prompt)) echo ' hidden'; ?> shadow">
						<?php
							if (!empty($error_prompt)) {
								echo '<ul>';
									echo $error_prompt;
								echo '</ul>';	
							}
						?>
					</div>
				</form>
			</div>
			
			<div class="go-to-login container">
				<p>Already have an account?</p>
				<a href="login.php" class="btn main-btn btn-primary">Log in here</a>
			</div>
			
			<!-- Footer -->
			<?php include_once('php/footer.php'); ?>
		</div>
	</body>
</html>
