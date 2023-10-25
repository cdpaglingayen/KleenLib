<?php include('../User/functions.php') ?>
<?php 
        include('../Register/server.php');

        if(isset($_POST['submit'])) {
            header('location: ../Register/show.php');
        }
        if (isset($_GET['edit'])) {
            $update = true;
            $sql = "SELECT * FROM users WHERE id=".$_GET['edit'];
            $record = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($record);
        }
     

        if (isset($_POST['update'])) {
            $username = $_POST['username'];
            $password1 = $_POST['password_1'];
            $password2 = $_POST['password_2'];
            $email = $_POST['email'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];

            mysqli_query($db, "UPDATE users SET username='$username', password='$password_1', email='$email', fname='$fname', lname='$lname'  ");
            header('location: ../Register/show.php');
        }
    ?>
    <!--added codes-->

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Library Management System</h1>
		</div>
	</div>
		<div>
			 <form id="form-custom" method="post" action="adduser.php"> 
			 <form method="post" action="create_user.php">
				<?php echo display_error(); ?>

				<h1 class="reg">Adding New User</h1>

                <input type="hidden" name="id" value="<?php echo $id; ?>">

					<!-- Username input -->
				    <div class="form-floating mb-4">
                      <input type="username" name = 'username' id="username" class="form-control" placeholder="Username">
                      <label class="form-label"  for="username">Username</label>
                    </div>

                    <!-- Email input -->
					<div class="form-floating mb-4">
                      <input type="email" name = 'email' id="email" class="form-control" placeholder="Email">
                      <label class="form-label"  for="email">Email</label>
                    </div>

					<!-- Password input -->
                    <div class="form-floating mb-4">
                      <input type="password" name = 'password_1' id="password" class="form-control" placeholder="Password">
                      <label class="form-label"  for="password">Password</label>
                    </div>
					
					<!-- Re-type Password input -->
                    <div class="form-floating mb-4">
                      <input type="password"  name = 'password_2'id="repassword" class="form-control" placeholder="Re-type Password">
                      <label class="form-label" for="repassword">Re-type Password</label>
                    </div>
					
					<!-- First and Last name input -->
					<div class="form-floating">
						<div class="row g-3">
						  <div class="col">
							<input type="fname" name = "fname" id="fname" class="form-control" placeholder="First name">
						  </div>
						  <div class="col">
							<input type="lname" name = "lname" id="lname" class="form-control mb-5" placeholder="Last name">
						  </div>
						</div>
					</div>
                   
                    <!-- Submit button -->
					<div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="register_btn">Add User</button>
					</div>
					
			</form>
		</div>
		<!-- Previous/Next button --> 
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
			<li class="page-item mx-5 mt-3">
			  <a href="home.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
			</li>
		  </ul>
		</nav>
</body>
</html>