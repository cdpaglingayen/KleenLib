<?php 
	include('../User/functions.php');
	// edited -R
	if (!isset($_SESSION['user']) || empty($_SESSION['user'])){
		header("Location:../User/login.php");
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
	<link rel="stylesheet" type="text/css" href="css/design.css?v=1">
</head>
<body>
	<form id="form-custom">
		<h2 class="reg">User Profile</h2>
		<div class="content">
			
			<!-- notification message -->
			<?php if (isset($_SESSION['success'])) : ?>
				<div class="error success" style="text-align: center" >
					<h3>
						<?php 
							echo $_SESSION['success']; 
							unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>
			
			
			<!-- logged in user information -->
			<div class="profile_info text-center">
				<!-- <img src="user_profile.png" class="img-thumbnail img-fluid rounded mx-auto d-block" alt="Responsive image"> -->

				<!-- EDITED -Ram  -->
				<?php
					$username = $_SESSION['user']['username'];
					$sql = "SELECT image FROM users WHERE username='$username'";
					$res =  mysqli_query($db, $sql);
					while($images = mysqli_fetch_assoc($res)) { ?>
					<img class="img-thumbnail img-fluid rounded mx-auto d-block" alt="Responsive image" style="height: 250px; width:250px;" src="../Image/uploads/<?=$images['image']?>">
				<?php } ?>
				<!-- EDITED -->
				<span class="badge bg-light text-dark mb-2 mt-2 ">
						<?php  if (isset($_SESSION['user'])) : ?>
							<strong><?php echo $_SESSION['user']['username']; ?></strong>

							<small>
							<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></span>
						<?php endif ?>
				<!-- Table for Choose File -->
				<table class="img-table d-flex justify-content-center">
							<tr>
								<form action="../Image/upload.php" method="post" enctype="multipart/form-data">
								<td>
									<input type="file" id="files" name="imageFile[]" style="display: none;">
									<label class="btn btn-primary btn-block mt-3 mb-3" for="files">Choose</label>
								</td>
								<td><input type="submit" name="uploadImageBtn" id="uploadImageBtn" value="Upload" class="btn btn-primary btn-block mt-3 ms-3 mb-3"></td>
								<td><a href="index.php?logout='1'" role='button' class="btn btn-danger link-light text-decoration-none mt-3 ms-3 mb-3">Logout</a></td>
								</form>
							</tr>
						</table>
						<!-- Table for Choose File -->
						
					<div class="row justify-content-center">
						<div class="card text-center" style="background-color: #865439; width: 20rem;">
							<img src="books_image.png" class="card-img-top" alt="books">
								<div class="card-body">
									<a class='btn btn-warning mt-1' role='button' href='view.php'>BOOKS</a>
									<a class='btn btn-success link-light mt-1 ms-2' role='button' href='userbr.php'>BORROWED</a>
								</div>
						</div>
					</div>
			</div>
		</div>
	</form>

</body>
</html>

