<html>
    <body>
        <?php 
            $db = mysqli_connect('localhost', 'root', '', 'multi_login');

            // initialize variables
            $update = false;

            if (isset($_POST['submit'])) {
                // variables from form
                $book_name = $_POST['book_name'];
                $pub_date = $_POST['pub_date'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $status = $_POST['status'];
                $author = $_POST['author'];

                // variables for book_id
                $id_name = substr($book_name, 0, 2);
                $id_month = date('M', strtotime($pub_date));
                $id_added = date('d');
                $id_year = date('Y', strtotime($pub_date));
                $id_category = substr($category, 0, 3);

                $get_count = mysqli_query($db, 'SELECT MAX(counts) AS max_count FROM books');
                $count_row = mysqli_fetch_array($get_count);
                $count = $count_row['max_count'];
                $id_counts = sprintf('%04d', $count+1);

                $status = 'Available';
                $book_id = $id_name.$id_added.$id_month.$id_year.$id_category.$id_counts;

                // add to database
                mysqli_query($db, "INSERT INTO books (book_id, book_name, pub_date, category, counts,price,status,author) VALUES ('$book_id', '$book_name', '$pub_date', '$category', '$id_counts', '$price','$status','$author')"); 
                header('location: ../Admin/addbooks.php');
            }
        ?>
    </body>
</html>