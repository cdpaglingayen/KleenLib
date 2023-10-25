<?php 
include('../User/functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../User/login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../User/login.php");
}
?>

<?php
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../User/login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
	<link rel="stylesheet" type="text/css" href="admin-page.css">
	
</head>
<body>

	<div class="container mt-5 text-center">
	
	<div class="content p-2 rounded">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<!-- EDITED -Ram  -->
			<?php
				$username = $_SESSION['user']['username'];
				$sql = "SELECT image FROM users WHERE username='$username'";
				$res =  mysqli_query($db, $sql);
				while($images = mysqli_fetch_assoc($res)) { ?>
				<img style="height: 250px; width:250px;" src="../Image/uploads/<?=$images['image']?>">
			<?php } ?>
			<!-- EDITED -->
			<div>
			<span class="badge bg-light text-dark mt-3">
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
					<i>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></span>
						<br>
						
						<!-- Table for Choose File -->
						<table class="img-table d-flex justify-content-center">
							<tr>
								<form action="../Image/upload.php" method="post" enctype="multipart/form-data">
								<td>
									<input type="file" id="files" name="imageFile[]" style="display: none;">
									<label class="btn btn-primary btn-block mt-3" for="files">Choose</label>
								</td>
								<td><input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload" class="btn btn-primary btn-block mt-3 ms-3"></td>
								<td><a href="home.php?logout='1'" role='button' class="btn btn-danger mt-3 ms-3">LOGOUT</a></td>
								</form>
							</tr>
						</table>
						<!-- Table for Choose File -->

						<div class="row m-3 justify-content-center">							
							<div class="card m-3" style="background-color: #865439; width: 15rem;">
								<img src="images/users-image.jpg" class="card-img-top" alt="users">
								<div class="card-body">
									<h5 class="card-title text-light">User Management</h5>
									<a href="../Admin/create_user.php" role='button' class='btn btn-success m-2'> ADD</a>
									<a href="../Register/show.php" role='button' class='btn btn-primary'>  EDIT</a>
								</div>
							</div>

							<div class="card m-3" style="background-color: #865439; width: 15rem;">
								<img src="images/books-image.jpg" class="card-img-top" alt="books">
									<div class="card-body">
										<h5 class="card-title text-light">Book Management</h5>
										<a href="../Admin/addbooks.php" role='button' class='btn btn-success m-2'> ADD</a>
										<a href="../Register/books.php" role='button' class='btn btn-primary'> EDIT</a>
									</div>
								</div>

								<div class="card m-3" style="background-color: #865439; width: 15rem;">
								<img src="images/admin-image.png" class="card-img-top" alt="books">
									<div class="card-body">
										<h5 class="card-title text-light">Book Admin</h5>
										<a href="../Register/requestedbooks.php" role='button' class='btn btn-warning'> INQUIRE </a>
										<a href="../Admin/borrowedbooks.php" role='button' class='btn btn-primary m-2'> LEASE </a>
									</div>
								</div>

								<div class="card m-3" style="background-color: #865439; width: 15rem;">
								<img src="images/archive-image.png" class="card-img-top" alt="books">
									<div class="card-body">
										<h5 class="card-title text-light">Archive Books</h5>
										<a href="../Register/archived.php" role='button' class='btn btn-warning m-2'> SHOW</a>
									</div>
								</div>

							</div>
						</div>

					</small>
					
				<?php endif ?>
			</div>
		</div>
	</div>
</div>

</body>
</html>