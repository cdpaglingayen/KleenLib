<?php include('../User/functions.php') ?>

<?php
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../User/login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration system PHP and MySQL - Create user</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
	<script src="ajax.js" type="text/javascript" language="javascript"></script>
	<script src="checkusername.js" type="text/javascript" language="javascript"></script>
    <link rel="stylesheet" href="design.css">
</head>
<body>
	<div class="justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Library Management System</h1>
		</div>
	</div>
		<div class="text-center">
			<form id="form-custom" method="post" action="create_user.php">
				<?php echo display_error(); ?>
				<ul class="pagination d-flex justify-content-end">
                    <a href="home.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
                </ul>
				<h1 class="mb-3">Adding User</h1>
				
				<!-- Username input -->
				<div class="form-floating mb-4">
						  <input type="username" name = 'username' class="form-control" placeholder="Username" onchange="check_username(this.form.username.value)" required>
						  <label class="form-label"  for="username">Username</label>
						  <span class="badge rounded-pill bg-light text-dark mt-4"  id="username"></span>
				</div>
				
				<!-- Email input -->
				<div class="form-floating mb-4">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
					<label class="form-label"  for="email">Email</label>
				</div>
				
				<!-- Type of User -->
				<div class="mb-4">
					<select name="user_type" id="user_type" class="form-select  w-200">
						<option selected="true" disabled="disabled">--Type of User--</option>
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</div>

				<div class="form-floating mb-4">
					<input type="password" name = 'password_1' id="password" class="form-control" placeholder="Password" required>
					<label class="form-label"  for="password">Password</label>
				</div>
				
				<div class="form-floating mb-4">
					<input type="password"  name = 'password_2'id="repassword" class="form-control" placeholder="Re-type Password" required>
					<label class="form-label" for="repassword">Confirm Password</label>
				</div>

				<!-- First and Last name input -->
				<div class="form-floating">
					<div class="row g-3">
						<div class="col">
							<input type="fname" name = "fname" id="fname" class="form-control" placeholder="First name" required>
						</div>
						<div class="col">
							<input type="lname" name = "lname" id="lname" class="form-control mb-5" placeholder="Last name" required>
						</div>
					</div>
				</div>
				
				<div class="d-grid gap-2 col-6 mx-auto">
					<button type="submit" class="button" name="register_btn"> Add User</button>
				</div>
			</form>
		</div>

</body>
</html>