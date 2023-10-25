<?php include('../User/functions.php') ?>
<?php 
        include('../Register/servbooks.php');

        if (isset($_GET['borrow'])) {

            $book_id = $_GET['borrow'];
            $sql = "SELECT * FROM books WHERE book_id='$book_id'";
            $record = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($record);
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
            <form id="form-custom" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>"> 
			
                <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

                    <!-- Book ID input -->
                    <div class="form-floating mb-4">
                        <input type="text" name = 'book_id' id="book_ID" class="form-control" placeholder="book_ID">
                        <label class="form-label"  for="book_name">Book ID</label>
                    </div>
                
                    <!-- Username input -->
			        <div class="form-floating mb-4">
                        <input type="username" name = 'username' id="username" class="form-control" placeholder="Username">
                        <label class="form-label"  for="username">Username</label>
                    </div>

					<!-- Book_Title input -->
			        <div class="form-floating mb-4">
                        <input type="text" name = 'book_name' id="book_name" class="form-control" placeholder="book_name">
                        <label class="form-label"  for="book_name">Book Name</label>
                    </div>

                    <!-- Price input -->
                    <div class="form-floating mb-4">
                        <input type="text" name = 'price' id="price" class="form-control" placeholder="price">
                        <label class="form-label"  for="price">price</label>
                    </div>

                    <!-- Submit button -->
					<div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="borrow">Borrow</button>
					</div>
			</form>
		</div>
</body>
</html>