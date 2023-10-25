<?php
	include('../User/functions.php');
if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../User/login.php');
}

?>
<?php
    $users = $_SESSION['user']['username'];
?>

<?php 
$users = $_SESSION['user']['username'];
    include('../Register/servbooks.php');
    if (isset($_GET['req'])) {
        $book_id = $_GET['req'];
        $results = mysqli_query($db, "SELECT * FROM books WHERE username='$users'");
        while ($row = mysqli_fetch_array($results)) {
            $borrow_count = mysqli_query($db, "SELECT COUNT(*) c FROM books WHERE username='$users' ");
            $count_row = mysqli_fetch_array($borrow_count);
        }   

        $count_user = $count_row['c'];

        if ($count_user < 2){
            print"You can Request Books";
            mysqli_query($db, "UPDATE books SET status = 'Borrow_Requested' WHERE book_id='$book_id'");
            mysqli_query($db, "UPDATE books SET username = '$users' WHERE book_id='$book_id'");
            
        } else {
          
    }
        header('location: view.php');
    }
        
?>

<?php 
    include('../Register/servbooks.php');

    $try = 0;
    
        $results = mysqli_query($db, "SELECT * FROM borrow WHERE borrower='$users'");
        while ($row = mysqli_fetch_array($results)) {

            $borrow_count = mysqli_query($db, "SELECT COUNT(*) c FROM borrow WHERE borrower='$users'");
            $count_row = mysqli_fetch_array($borrow_count);

            if($count_row == NULL){
            continue;
            }
        }
        $count_user = isset($count_row['c']);
        
        if($count_user<2) {
            // borrow books variable
            $try = 1;
            
        } else {
            echo "<script>alert('You Borrowed Max Books')</script>";
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
        <div class="container">
            <div class="table-responsive">
            <h1 class="text-center">Book List</h1>
           
                <table class="table align-middle table-bordered border-dark">
                    <thead class="table-dark">
                        <tr>
                            <th scope='col'>BOOK ID</th>
                                <th scope='col'>Book title</th>
                                <th scope='col'>Date</th>
                                <th scope='col'>Category</th>
                                <th scope='col'>Price</th>
                                <th scope='col'>Status</th>
                                <th scope='col'>Action</th>
                        </tr>
                    <span class="badge bg-dark text-white mb-3 d-flex justify-content-center">
						 <font size="6"><strong><?php echo $_SESSION['user']['username']; ?></strong></font>
					</span>
                    <ul class="pagination d-flex justify-content-end">
                    <a href="../User/index.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
                </ul>
                    <?php
                        // display records
                        $results = mysqli_query($db, "SELECT * FROM books");
                    
                        while ($row = mysqli_fetch_array($results)) {
                            if ($row['status'] == 'Archived_Book') {
                                continue;
                                }
                                if ($row['status'] == 'Borrow_Requested') {
                                    $try = 0;
                                    }
                                    if ($row['status'] == 'Borrowed') {
                                continue;
                                }
                                if ($row['status'] == 'To_be_paid') {
                                    continue;
                                    }
                                
                            echo "<tbody>";
                                echo "<td>".$row['book_id']."</td>";
                                echo "<td>".$row['book_name']."</td>";
                                echo "<td>".$row['pub_date']."</td>";
                                echo "<td>".$row['category']."</td>";
                                echo "<td>".$row['price']."</td>";
                                echo "<td>".$row['status']."</td>";

                            if($try == 1 || $row['status'] == 'Available' ){
                                echo "<td> <a class='confirmation btn btn-danger link-light text-decoration-none' role='button' href='view.php?req=".$row['book_id']."'>Request</a> </td>";
                                echo "</tbody>";
                            } else {
                                print"<td>"; print"<button type=button disabled> Request </button>"; print"</td>";
                            }
                    ?>
                    
                    <?php }  ?>
                    <script src="script1.js"></script>
                </table>
            </div>
        </div>
        
    </body>
</html>