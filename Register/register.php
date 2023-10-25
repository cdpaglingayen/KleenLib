<?php include('../User/functions.php') ?>
<?php 
        include('../Register/server.php');

        if(isset($_POST['submit'])) {
            header('location: ../Register/show.php');
        }
        
        if (isset($_GET['edit'])) {
            $update = true;
            $id = $_GET['edit'];
            $sql = "SELECT * FROM users WHERE id=".$_GET['edit'];
            $record = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($record);

            $username = $row['username'];
            $email = $row['email'];
            $fname = $row['fname'];
            $lname = $row['lname'];
        }

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $username = $_POST['username'];
            $password1 = $_POST['password_1'];
            $password2 = $_POST['password_2'];
            $email = $_POST['email'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $password = md5($password1);

            mysqli_query($db, "UPDATE users SET username='$username', password='$password', email='$email', fname='$fname', lname='$lname' WHERE id=$id");
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
    <script src="ajax.js" type="text/javascript" language="javascript"></script>
    <script src="checkusername.js" type="text/javascript" language="javascript"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Library Management System</h1>
      </div>
    </div>

		<div class="container text-center">
			<form id="form-custom" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
				<?php echo display_error(); ?>

				<?php if ($update == true): ?>
          <h1 class="reg">Updating</h1>
                <?php else: ?>
                    <h1 class="reg">Registration</h1>
                <?php endif ?>

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <!-- Username input -->
                <div class="form-floating mb-4">
                  <input type="username" name = 'username' class="form-control" value="<?php echo $username; ?>" placeholder="Username" onchange="check_username(this.form.username.value)" required>
                  <label class="form-label"  for="username">Username</label>
                  <span class="badge rounded-pill bg-light text-dark mt-4"  id="username"></span>
                </div>

                <!-- Email input -->
                <div class="form-floating mb-4">
                  <input type="email" name = 'email' id="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email" required>
                  <label class="form-label"  for="email">Email</label>
                </div>

                <!-- Password input -->
                <div class="form-floating mb-4">
                  <input type="password" name = 'password_1' id="password" class="form-control" placeholder="Password" required>
                  <label class="form-label"  for="password">Password</label>
                </div>
                
                <!-- Re-type Password input -->
                <div class="form-floating mb-4">
                  <input type="password"  name = 'password_2'id="repassword" class="form-control" placeholder="Re-type Password" required>
                  <label class="form-label" for="repassword">Re-type Password</label>
                </div>			
                
                <!-- First and Last name input -->
                <div class="form-floating">
                  <div class="row g-3">
                    <div class="col">
                      <input type="fname" name = "fname" id="fname" class="form-control" value="<?php echo $fname; ?>" placeholder="First name" required>
                    </div>
                    <div class="col">
                      <input type="lname" name = "lname" id="lname" class="form-control mb-5" value="<?php echo $lname; ?>" placeholder="Last name" required>
                    </div>
                  </div>
                </div>
                        
                <!-- Submit button -->
                <div class="d-grid gap-2 col-6 mx-auto">
                  <?php if ($update == true): ?>
                    <button type="submit" name="update">Update</button>
                  <?php else: ?>
                    <button type="submit" name="register_btn">Register</button>
                    <p><center>Already a member? <a href="../User/login.php">Sign in</a></center></p>
                  <?php endif ?>
                </div>
			</form>
		</div>
		<!-- Previous/Next button for Update --> 
    <?php if ($update == true): ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item mx-5 mt-1">
            <a href="../Admin/home.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
          </li>
        </ul>
      </nav>
    <?php else: ?>
     <!-- Previous/Next button for Register -->
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item mx-5 mt-1">
            <a href="../User/login.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
          </li>
        </ul>
      </nav>
    <?php endif ?>
      
</body>
</html>