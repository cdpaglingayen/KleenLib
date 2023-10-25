<?php
    $db2 = mysqli_connect('localhost', 'root', '', 'multi_login');

    if(isset($_GET['approve'])) {
        $book_id = $_GET['approve'];
        $results = mysqli_query($db, "SELECT * FROM books WHERE book_id='$book_id'");
        while ($row = mysqli_fetch_array($results)) {
            $this_user = $row['username'];
            $borrower = $row['username'];
            $brw_book = $row['book_id'];
        }

        // date today + due date
        $today = date('Y-m-d');
        $brw_due = date('Y-m-d', strtotime($today. ' + 7 days'));

        // date interval count
        $results = mysqli_query($db2, "SELECT * FROM borrow WHERE borrower='$this_user'");
        while ($row = mysqli_fetch_array($results)) {
            $borrow_count = mysqli_query($db2, "SELECT COUNT(*) c FROM borrow WHERE borrower='$this_user' AND date_brw > now() - INTERVAL 7 day");
            $count_row = mysqli_fetch_array($borrow_count);
        }
        $count_user = $count_row['c'];
        if($count_user<2) {
            // borrow books variable
            $borrow = mysqli_query($db2, "INSERT INTO borrow(borrower, brw_book, date_brw, brw_due, fine) VALUES('$borrower', '$brw_book', '$today', '$brw_due', '0')");
        }
        
    }
?>