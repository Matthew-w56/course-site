<?php

function connectToDb() {
	if ($_SERVER['HTTP_HOST'] == 'localhost') {
		return new mysqli('localhost', 'root', '1550', 'course-site');
	}
	return new mysqli('sql211.epizy.com', 'epiz_32326890', 'jl1ihWGk5Zo8g', 'epiz_32326890_course-site');
}

function dbHasEmail($email) {
	//Connect to database
	$conn = connectToDb();
	
	//Establish the query
	$sql = 'SELECT id FROM login_info WHERE email = ?;';
	//Add the query and it's parameters to the statement
	$statement = $conn->prepare($sql);
	$statement->bind_param("s", $email);
	//Execute it
	$statement->execute();
	//Retreive a results object for it
	$result = $statement->get_result();
	
	//Close everything associated
	$statement->close();
	$conn->close();
	
	//Return the results
	return $result->fetch_assoc();
}

//Inserts a user into the tables of the course-site database
function insert_user($email, $passHash, $pic, $coll) {
	//Connect to the database
	$conn = connectToDb();
	
	//Establish the queries
	$sql1 = 'INSERT INTO login_info (email, password) VALUES (?, ?);';
	$sql2 = 'INSERT INTO user_info (pic, coll) VALUES (?, ?);';
	
	//Add each parameter, and execute it
	$stmt1 = $conn->prepare($sql1);
	$stmt1->bind_param("ss", $email, $passHash);
	$stmt1->execute();
	$stmt2 = $conn->prepare($sql2);
	$stmt2->bind_param("si", $pic, $coll);
	$stmt2->execute();
	
	//Close everything associated
	$stmt1->close();
	$stmt2->close();
	$conn->close();
}

//Returns if the user_info table has a pic and coll pair that matches with the given ones.
function dbHasPicHash($hash, $coll, $conn='') {
	//Connect to database
	$conn = connectToDb();
	
	//Establish the query
	$sql = 'SELECT id FROM user_info WHERE pic = ? AND coll = ?;';
	//Add the query and it's parameters to the statement
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("si", $hash, $coll);
	//Execute it
	$stmt->execute();
	//Retreive a results object for it
	$result = $stmt->get_result();
	
	//Close everything associated
	$stmt->close();
	$conn->close();
	
	//Return the results
	return $result->fetch_assoc();
}

//Returns the whole row from the login_info table in the form of a sql query result object
function getUserLoginInfo($email) {
	//Connect to the database
	$conn = connectToDb();
	
	//Establish the query
	$sql = 'SELECT * FROM login_info WHERE email = ?;';
	
	//Add the query and it's parameters
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("s", $email);
	//Execute the operation and get the results
	$stmt->execute();
	$results = $stmt->get_result();
	
	//Close everything associated
	$stmt->close();
	$conn->close();
	
	//Return the results
	return $results->fetch_assoc();
}

//Load info from the user with the given email into the Session, acting as a log in
function logIn($email) {
	
	//Establish the connection to the database
	$conn = connectToDb();
	
	//Run the first query: to get the ID of the account with the given email
	$sql1 = 'SELECT id FROM login_info WHERE email = ?;';
	$stmt1 = $conn->prepare($sql1);
	$email = strtolower($email);
	$stmt1->bind_param("s", $email);
	$stmt1->execute();
	$result1 = $stmt1->get_result();
	$stmt1->close();
	
	//Make sure that account exists.  If not, return (user is not set as logged in and life goes on)
	if (!($ar1 = $result1->fetch_assoc())) return;
	
	//Store the ID of the user
	$id = $ar1['id'];
	
	//Run the second query: getting the user's info with the given ID
	$sql2 = 'SELECT pic, coll, first_name FROM user_info WHERE id = ?;';
	$stmt2 = $conn->prepare($sql2);
	$stmt2->bind_param("i", $id);
	$stmt2->execute();
	$result2 = $stmt2->get_result();
	//It is assumed here that since the first query found a user with that email, that this will find the ID
	//Since that was the last query, close the connection to the database
	//Now, unpack the data into an associative array
	$info = $result2->fetch_assoc();
	//Close connections
	$stmt2->close();
	$conn->close();
	
	
	//Load the needed data into the $_SESSION variable so the user can stay logged in
	$_SESSION['loggedIn'] = 1;
	$_SESSION['uid'] = $id;
	if (empty($info['first_name'])) {
		$_SESSION['uname'] = $email;
		$_SESSION['nameIsEmail'] = 1;
	} else {
		$_SESSION['uname'] = $info['first_name'];
	}
	$_SESSION['upicpath'] = $info['pic'].$info['coll'];
	
}

//Attempts to log the user in, or see if they already are.  If false is returned, they are not logged in,
//and the cookie is either missing or invalid
function loggedInInit() {
	//See if they are already logged in
	if (!empty($_SESSION['uid'])) return true;
	//If not, try to log in with the cookie (if it exists)
	if (!empty($_COOKIE['satonalog'])) logInWithCookie();
	//Return if any of those worked
	return !empty($_SESSION['uid']);
}

//Reads who is logged in from the $_SESSION, and creates a cookie to sign in again next time
//Dips if nobody is logged in
function setLoginCookie() {
	//TODO: Get the $days variable from the options database
	$days = 30;
	
	//Dip if nobody is signed in
	if (empty($_SESSION['uid'])) return;
	
	//Connect to the database, and run the query to get the current user's nonce value and pass hash
	$conn = connectToDb();
	$sql = 'SELECT password, nonce FROM login_info WHERE id = ?;';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $_SESSION['uid']);
	$stmt->execute();
	$result = $stmt->get_result();
	$info = $result->fetch_array(MYSQLI_NUM);  //[0] is pass hash, [1] is nonce
	$stmt->close();
	$conn->close();
	
	//Create the value to set to the cookie which is the ID, a ||, then the 32-char hash of (pass and nonce)
	$cookie_val = $_SESSION['uid'].'||';
	$cookie_hash = hash('md5', $info[0].$info[1]);
	$cookie_val .= $cookie_hash;
	
	//Set the cookie
	setcookie('satonalog', $cookie_val, time() + (86400 * $days), '/'); //86400 = 1 day || total: $days days
}

//Attempts to log in with the stored login cookie
function logInWithCookie() {

	//Make sure cookie is set
	if (empty($_COOKIE['satonalog'])) return;
	
	//Get the ID and Hash from the cookie
	$c_info = explode('||', $_COOKIE['satonalog']);
	
	//Get the email, passhash, and nonce from the database (don't close conn yet)
	$conn = connectToDb();
	$sql = 'SELECT email, password, nonce FROM login_info WHERE id = ?;';
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $c_info[0]);
	$stmt->execute();
	$result = $stmt->get_result();
	$d_info = $result->fetch_array(MYSQLI_NUM);
	$stmt->close();
	
	//Hash the passhash and nonce and see if it matches the hash in the cookie
	$db_hash = hash('md5', $d_info[1].$d_info[2]);
	
	//If it's a match
	if ($db_hash == $c_info[1]) {
		
		//call logIn($email);
		logIn($d_info[0]);
		
		//Update the nonce to something else (random [0,99])
		$sql1 = 'UPDATE login_info SET nonce = '.rand(0,99).' WHERE id = ?;';
		$stmt1 = $conn->prepare($sql1);
		$stmt1->bind_param("i", $c_info[0]);
		$stmt1->execute();
		//close conn
		$stmt1->close();
		$conn->close();

		//call setLoginCookie();
		setLoginCookie();
	//If no match
	} else {
		//Trash the existing cookie (it is invalid)
		setcookie('satonalog', 'previousCookieInvalid', time() - 1, '/');
		//close conn
		$conn->close();
	}
}

?>
