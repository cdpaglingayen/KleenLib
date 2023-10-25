<?php include('../User/functions.php') ?>
<?php 
        include('../Register/servbooks.php');

        if(isset($_POST['submit'])) {
            header('location: ../Register/books.php');
        }
        if (isset($_GET['edit'])) {
            $update = true;
            $book_id = $_GET['edit'];
            $sql = "SELECT * FROM books WHERE book_id='$book_id'";
            $record = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($record);
        }
        if (isset($_POST['update'])) {
            $book_id = $_POST['book_id'];
            $book_name = $_POST['book_name'];
            $pub_date = $_POST['pub_date'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $author = $_POST['author'];

            mysqli_query($db, "UPDATE books SET book_name='$book_name', pub_date='$pub_date', category='$category', price='$price', author='$author' WHERE book_id='$book_id'");
            header('location: ../Register/books.php');
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
          
             <ul class="pagination d-flex justify-content-end">
                    <a href="home.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
                </ul>
                
				<?php echo display_error(); ?>
                <?php if ($update == true): ?>
				    <h1 class="reg">Updating</h1>
                <?php else: ?>
                    <h1 class="reg">Add Books</h1>
                <?php endif ?>
                
                <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

					<!-- Book_Title input -->
				    <div class="form-floating mb-4">
						<input type="text" name = 'book_name' id="book_name" class="form-control" placeholder="book_name">
						<label class="form-label"  for="book_name">Book Name</label>
                    </div>

                    <!-- Published input -->
				    <div class="form-floating mb-4">
						<input type="date" name = 'pub_date' id="published" class="form-control" placeholder="published">
						<label class="form-label"  for="pub_date">Date Published</label>
                    </div>

                    <!-- Author -->
                    <div class="form-floating mb-4">
						<input type="text" name = 'author' id="author" class="form-control" placeholder="author">
						<label class="form-label"  for="author">Author Name</label>
                    </div>

                    <!-- Category input -->
					<div class="mb-4">
						<select name="category" class="form-select  w-200">
							<option selected="true" disabled="disabled">Select Option</option>
								<?php
								$category = array("Science Fiction", "Non-Fiction", "Psychological", "Horror", "Novel", "Fiction", "Thriller", "Romance", "Comedy", "Self-help");
								foreach($category as $item){
									echo "<option value='$item'>$item</option>";
								}
								?>
						</select>
                    
					</div>
					
                    <!-- Price input -->
                    <div class="form-floating mb-4">
						<input type="text" name = 'price' id="price" class="form-control" placeholder="price">
						<label class="form-label"  for="price">price</label>
					</div>
                   
                    <!-- Submit button -->
					<div class="d-grid gap-2 col-6 mx-auto">
                        <?php if ($update == true): ?>
                            <button type="submit" name="update">Update</button>
                        <?php else: ?>
                            <button type="submit" name="submit">Add Book</button>
                        <?php endif ?>
					</div>
					
			</form>
           
		</div>
		
		
</body>
</html>