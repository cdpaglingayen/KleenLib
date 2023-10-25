<html>
	<body>
		<?php 
			$db = mysqli_connect('localhost', 'root', '', 'multi_login');

			// initialize variables
			$id = 0;
			$update = false;

			if (isset($_POST['submit'])) {
				// declare variables
				$username = $_POST['username'];
				$password1 = $_POST['password_1'];
				$password2 = $_POST['password_2'];
				$email = $_POST['email'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];

				// add to database
				mysqli_query($db, "INSERT INTO users (username, password1, password2, email, fname, lname) VALUES ('$username', '$password1', '$password2', '$email', '$fname', '$lname')"); 
				header('location: register.php');
			}
		?>
	</body>
</html>
