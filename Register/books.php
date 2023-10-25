<?php
	include('../User/functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../User/login.php');
}

?>
<?php 
    include('servbooks.php');
    if (isset($_GET['del'])) {
        $book_id = $_GET['del'];
        mysqli_query($db, "UPDATE books SET status = 'Archived_Book' WHERE book_id='$book_id'");
        header('location: books.php');
    }
?>

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="edit.css">
    <title>Manage Books</title>
    </head>
	<body>
        <div class="container rounded">
                <div class="table-responsive">
                <h1 class="text-center">Modify Books</h1>
                <ul class="pagination d-flex justify-content-end">
                    <a href="../Admin/home.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
                </ul>
                    <table class="table align-middle table-bordered border-dark">
                        <thead class="table-dark">
                            <tr>
                                <th scope='col'>BOOK ID</th>
                                <th scope='col'>Book Name</th>
                                <th scope='col'>Date Published</th>
                                <th scope='col'>Category</th>       
                                <th scope='col'>Price</th>
                                <th scope='col'>Actions</th>
                            </tr>
                        </thead>
                        <?php
                            // display records
                            $results = mysqli_query($db, "SELECT * FROM books");
                            while ($row = mysqli_fetch_array($results)) {
                            
                                if ($row['status'] == 'Archived_Book') {
                                    continue;
                                }
                                echo "<tbody>";
                                    echo "<td>".$row['book_id']."</td>";
                                    echo "<td>".$row['book_name']."</td>";
                                    echo "<td>".$row['pub_date']."</td>";
                                    echo "<td>".$row['category']."</td>";
                                    echo "<td>".$row['price']."</td>";
                                    echo "<td>
                                        <a class='btn btn-primary link-light text-decoration-none' role='button' href='../Admin/addbooks.php?edit=".$row['book_id']."'>Edit</a>
                                        <a class='btn confirmation btn-danger link-light text-decoration-none' role='button' href='books.php?del=".$row['book_id']."'>Archived</a>
                                    </td>";
                                echo "</tbody>";
                        ?>

                        <?php } ?>
                        <script src="archived.js"></script>
                        </body>

                    </table>
                </div>
        </div>
    </body>
</html>