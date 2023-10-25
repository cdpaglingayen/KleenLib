<?php # filename - checkusername.php

/* This page checks a database to see if
 * $_GET['username'] has already been registered.
 * The page will be called by JavaScript.
 * The page returns a simple text message.
 * No HTML is required by this script!
 */

 // Validate that the page received $_GET['username']:
if (isset($_GET['username'])) {


 // Connect to the database:
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$db = 'multi_login';
$dbc = new mysqli($dbhost, $dbuser, $dbpass, $db) OR die ('The availability of this username will be confirmed upon form submission.');

 // Define the query:
$q = sprintf("SELECT id FROM users WHERE username='%s'", 
mysqli_real_escape_string($dbc,trim($_GET['username'])));

 // Execute the query:
$r = mysqli_query($dbc, $q);

 // Report upon the results:
	if (mysqli_num_rows($r) == 1) {
		echo 'The username is unavailable!';
	} else {
		echo 'The username is available!';
	}
	mysqli_close($dbc);
	} else { // No username supplied!
		echo 'Please enter a username.';
}
?>