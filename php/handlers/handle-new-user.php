<?php

// TODO:
//  - Redirect the person if they are already logged in to the account page
//	- Implement profile pictures

include_once('../functions.php');
include_once('../db.php');
if (loggedInInit()) header('location: ../../.?push=1');

function register_new_user() {
	$pre_pend = '667ppls';
	$salt = 'FKLE89474?skjdsf..sfjj';
	//Add user to database, assuming POST is filled out and info is verified.
	$email = strtolower($_POST['email']);
	$passRaw = $_POST['password'];
	$passHash = hash('sha512', $pre_pend.$passRaw.$salt);
	$pic = hash('adler32', $email);
	$coll = 0;
	
	$conn = connectToDb();
	while (dbHasPicHash($pic, $coll, $conn)) {
		$coll ++;
	}
	
	insert_user($email, $passHash, $pic, $coll, $conn);
	/*echo 'Raw Email: '.$email.'<br>';
	echo 'Raw Password: '.$passRaw.'<br>';
	echo 'Hashed Pass: '.$passHash.'<br>';
	echo 'Pic Address: '.$pic.$coll.'<br>';*/
}

//Validate Information ------------------------------------------------------------------------------------[_____________]
/*
Error codes:
1:   no email entered
2:   email is not valid
4:   email already in use
8:   no password entered
16:  passwords do not match
32:  password is not long enough
64:  password does not contain a number
128: password does not contain a special character (?!.*@,)
256: password contains "password"
*/
//------------------------------------------------------------------------------------------------------------------------------------------


//Prep default variables for the astrisks by the field names
$check_email = false;
$check_pass = false;
$check_conf = false;
$erc = 0;

//Email time
//Mark if the email or password were not filled out. If either are true,
//	don't worry about any other errors, just have them fix that.
if (empty($_POST['email'])) {
	$erc += 1;
	$check_email = true;
} else {
	//Make sure the email is valid
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || !preg_match("/@/", $_POST['email'])) {
		$erc += 2;
		$check_email = true;
	} else {
		// See if the result is empty
		if (dbHasEmail($_POST['email'])) {
			$erc += 4;
			$check_email = true;
		}
	}
}

//Passwords time
if (empty($_POST['password'])) {
	//No password entered
	$erc += 8;
	$check_pass = true;
} else {
	//Make sure that the password and the password confirmation match
	if ($_POST['password'] == $_POST['password-confirm']) {
		//Passwords match
		$pass = $_POST['password'];
		$pass_length = 8;  // TODO Get this out of database of settings in future.
		
		//See if the password is long enough
		if (strlen($pass) < $pass_length) {
			$erc += 32;
			$check_pass = true;
			$check_conf = true;
		}
		
		//Has a special character in [?!.*@,]
		if (preg_match("/[?!.*@,]/", $pass) == 0) {
			//No special characters
			$erc += 128;
			$check_pass = true;
			$check_conf = true;
		}

		//Check to see if the password has a number
		if (preg_match("/[0-9]/", $pass) == 0) {
			//No number
			$erc += 64;
			$check_pass = true;
			$check_conf = true;
		}
		
		//For kicks and giggles, make sure the password does not contain the word 'password'
		if (preg_match("/password/", strtolower($pass)) != 0) {
			$erc += 256;
			$check_pass = true;
			$check_conf = true;
		}			

	} else {
		//Passwords do not match
		$erc += 16;
		//Clear the current password and confirmation
		$_POST['password'] = '';
		$_POST['password-confirm'] = '';
		$check_pass = true;
		$check_conf = true;
	}
}

//If no errors were run into, register the new user
if ($erc == 0) {
	register_new_user();
	
	logIn($_POST['email']);
	if (!empty($_POST['remember'])) setLoginCookie();
	
	//Now, direct to the destination from the $_POST['destination'].
	header('location: '.(!empty($_POST['destination']) ? $_POST['destination'] : '/course-site/topic/.'));
} else {
	//REDIRECT to the signup.php page (AKA: the only source for this handler).
	//GET style info layout: (leave one unset to assume no need to communicate)
	//a1-a3: Values of email,password,confirm
	//c1-c3: denotes check for email,password,confirm.  Value does not matter, just whether it's set
	//er: error code
	//dest: destination to go to after signup
	//Destination in this preloaded text serves to preserve custom destinations to go to after the sign-in process
	$head = 'location: /course-site/signup.php?er='.$erc.(!empty($_POST['destination']) ? '&dest='.$_POST['destination'] : '');
	
	//Add in any info about filled input boxes
	if (!empty($_POST['email'])) $head .= '&a1='.$_POST['email'];
	if (!empty($_POST['password'])) $head .= '&a2='.$_POST['password'];
	if (!empty($_POST['password-confirm'])) $head .= '&a3='.$_POST['password-confirm'];
	
	//Add in any check marks needed
	if ($check_email) $head .= '&c1=1';
	if ($check_pass) $head .= '&c2=1';
	if ($check_conf) $head .= '&c3=1';
	
	header($head);
}

?>