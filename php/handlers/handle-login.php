<?php

include_once('../functions.php');
include_once('../db.php');
if (loggedInInit()) header('location: ../../.?push=1');


function recreatePassHash($pass) {
	$pre_pend = '667ppls';
	$salt = 'FKLE89474?skjdsf..sfjj';
	return hash('sha512', $pre_pend.$pass.$salt);
}

//Validate Information ---------------------------------------------------------------------------------------
/*
Error codes:
1:  no email entered
2:  email not in system / not in use
4:  no password entered
8:  email / pass incorrect
*/
//------------------------------------------------------------------------------------------------------------

//Prep default variables for the astrisks by the field names
$check_email = false;
$check_pass = false;
$erc = 0;


//Make sure both fields are actually filled out before continuing
if (empty($_POST['email'])) {
	$erc += 1;
	$check_email = true;
}
if (empty($_POST['password'])) {
	$erc +=4;
	$check_pass = true;
}

//If no errors encountered yet, compare to database info
if ($erc == 0) {
	//Get the user info for the email of { $_POST['email']  }
	$login_info = getUserLoginInfo($_POST['email']);
	
	//If no rows returned, say no email exists
	if (!$login_info) {
		$erc += 2;
		$check_email = true;
	} else {
		//With the assumption that the email exists and we have a row to get, see if the info matches
		$newPassHash = recreatePassHash($_POST['password']);
		if (!($newPassHash == $login_info['password'])) {
			//Pass didn't match.
			$erc += 8;
			$check_email = true;
			$check_pass = true;
			//Clear the password field when returned
			$_POST['password'] = '';
		}
	}
	
}


//If no errors were run into, log the user in
if ($erc == 0) {
	logIn($_POST['email']);
	//Set the cookie for login next time
	if (!empty($_POST['remember'])) setLoginCookie();
	//Now, direct to the destination from the $_POST['destination'].
	header('location: '.(!empty($_POST['destination']) ? $_POST['destination'] : '/course-site/topic/.'));
} else {
	/*	REDIRECT to the login.php page (AKA: the only source for this handler).
		GET style info layout: (leave one unset to assume no need to communicate)
	a1-a2: Values of email,password
	c1-c2: denotes check for email,password.  Value does not matter, just whether it's set
	er: error code
	dest: destination to go to after login   */
	//Destination in this preloaded text serves to preserve custom destinations to go to after the sign-in process
	$head = 'location: /course-site/login.php?er='.$erc.(!empty($_POST['destination']) ? '&dest='.$_POST['destination'] : '');
	
	//Add in any info about filled input boxes
	if (!empty($_POST['email'])) $head .= '&a1='.$_POST['email'];
	if (!empty($_POST['password'])) $head .= '&a2='.$_POST['password'];
	
	//Add in any check marks needed
	if ($check_email) $head .= '&c1=1';
	if ($check_pass) $head .= '&c2=1';
	
	//Actually redirect there
	header($head);
}

?>