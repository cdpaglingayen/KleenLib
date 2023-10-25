<?php
	include('../User/functions.php');
    include('../Admin/borrow/dbconn.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../User/login.php');
}
?>

<?php 
    include('../Register/servbooks.php');
    if (isset($_GET['approve'])) {
        $book_id = $_GET['approve'];
        mysqli_query($db, "UPDATE books SET status = 'Borrowed' WHERE book_id='$book_id'");
        header('location: requestedbooks.php');
    }
?>

<?php 
    include('../Register/servbooks.php');
    if (isset($_GET['deny'])) {
        $book_id = $_GET['deny'];
        mysqli_query($db, "UPDATE books SET status = 'Available' WHERE book_id='$book_id'");
        mysqli_query($db, "UPDATE books SET username = '' WHERE book_id='$book_id'");
        mysqli_query($db, "UPDATE books SET status = 'Available' , username='' WHERE  book_id='$book_id'" );
        header('location: requestedbooks.php');
    }
?>

<?php 
    include('../Register/servbooks.php'); 
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
        <div class="container">
            <div class="table-responsive">
            <h1 class="text-center">Book Borrowing</h1>
            <ul class="pagination d-flex justify-content-end">
                    <a href="../Admin/home.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
                </ul>
                <table class="table align-middle table-bordered border-dark">
                    <thead class="table-dark">
                        <tr>
                            <th scope='col'>User</th>
                            <th scope='col'>BOOK ID</th>
                            <th scope='col'>Book title</th>
                            <th scope='col'>Date</th>
                            <th scope='col'>Category</th>
                            <th scope='col'>Price</th>
                            <th scope='col'>Status</th>
                            <th scope='col'>Action</th>
                        </tr>
                    </thead>
                    <?php

                        // display records
                        
                        $results = mysqli_query($db, "SELECT * FROM books");
                    
                        while ($row = mysqli_fetch_array($results)) {
                            if ($row['status'] == 'Archived_Book') {
                                continue;
                                }
                                if ($row['status'] == 'Available') {
                                    continue;
                                }

                                if ($row['status'] == 'Borrowed') {
                                    continue;

                                } if ($row['status'] == 'To_be_paid') {
                                    continue;

                                }
                                echo "<tbody>";
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td>".$row['book_id']."</td>";
                                    echo "<td>".$row['book_name']."</td>";
                                    echo "<td>".$row['pub_date']."</td>";
                                    echo "<td>".$row['category']."</td>";
                                    echo "<td>".$row['price']."</td>";
                                    echo "<td>".$row['status']."</td>";
                                    echo "<td>
                                        <a class='confirmation1 btn btn-success link-light text-decoration-none' role='button' href='requestedbooks.php?approve=".$row['book_id']."'>Approve Borrow</a>
                                        <a class='confirmation btn btn-danger link-light text-decoration-none' role='button' href='requestedbooks.php?deny=".$row['book_id']."'>Deny</a>      
                                        </td>";
                                echo "</tbody>";
                    ?>
                    <?php } ?>
                    <script src="script1.js"></script>
                    <script src="approve.js"></script>
                </table>
            </div>
        </div>
    </body>
</html>