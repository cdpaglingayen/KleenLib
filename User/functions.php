<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
</head>

<body>

	<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'multi_login');

	// variable declaration
	$username = "";
	$email    = "";
	$fname = "";
	$lname = "";
	$errors   = array(); 

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// REGISTER USER
	function register(){
		// call these variables with the global keyword to make them available in function
		global $db, $errors, $username, $email,$fname,$lname;

			// receive all input values from the form. Call the e() function
			// defined below to escape form values
			$username    =  e($_POST['username']);
			$email       =  e($_POST['email']);
			$password_1  =  e($_POST['password_1']);
			$password_2  =  e($_POST['password_2']);
			$fname  =   e($_POST['fname']);
			$lname  =   e($_POST['lname']);
			

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		if (empty($fname)) { 
			array_push($errors, "firstname is required"); 
		}

		if (empty($fname)) { 
			array_push($errors, "Last name is required"); 
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (username, email, user_type, password,fname,lname) 
						VALUES('$username', '$email', '$user_type', '$password','$fname','$lname')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: ../Admin/home.php');
			}else{
				$query = "INSERT INTO users (username, email, user_type, password,fname,lname) 
						VALUES('$username', '$email', 'user', '$password','$fname','$lname')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				header('location: ../User/index.php');				
			}
		}
	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}	

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}


	// call the login() function if register_btn is clicked

	if (isset($_POST['login_btn'])) {
		// if(!isset($_SESSION['user'])){
			login();
			// exit;
		// } else {
		//     header('location: ../User/index.php');
		// }
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "<script>alert('Username is required')</script>");
		}
		if (empty($password)) {
			array_push($errors, "<script>alert('Password is required')</script>");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ../Admin/home.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: ../User/index.php');
				}
			}else {
				array_push($errors, "<script>alert('Wrong username/password combination')</script>");
			}
		}
	}

	// ...
	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	?>
</body>

</html>