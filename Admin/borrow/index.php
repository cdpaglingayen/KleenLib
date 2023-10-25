<?php
    include('dbconn.php');
    if(isset($_POST['borrow'])) {
        header('location: show1.php');
    }
    if (isset($_GET['borrow'])) {
        $book_id = $_GET['borrow'];
    }
?>

<html>
    <head>
        <title>Borrow</title>
    </head>
    <body>
        <form method="post" action="">
            Username: <input type="text" name="borrower"><br>
            Book ID: <input type="text" name="brw_book" value="<?php echo $book_id ?>"><br>
            <br><button type="submit" name="borrow" onclick="alertFunc()">Request Borrow</button>
        </form>
    </body>
</html>