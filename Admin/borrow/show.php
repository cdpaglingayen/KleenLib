<?php 
    include('dbconn.php');
?>

<html>
    <head>
        <title>Manage Users</title>
    </head>
	<body>
        <table style="border: 1px solid black;">
        <?php
            // get borrowed data
            $results = mysqli_query($db2, "SELECT * FROM borrow");
            while ($row = mysqli_fetch_array($results)) {
                $id = $row['id'];
                $username = $row['borrower'];
                $book_id = $row['brw_book'];
                $due_date = $row['brw_due'];
                $this_day = date('Y-m-d');

                // calculate fine
                $get_diff = strtotime($this_day) - strtotime($due_date);
                $diff = round($get_diff/86400);
                $fine = $diff*10;
                if($fine<0) {
                    $fine = 0;
                }
                
                // update fine value
                mysqli_query($db2, "UPDATE borrow SET fine=$fine WHERE id=$id");
                
                // display records
                $borrower = mysqli_query($db2, "SELECT * FROM users WHERE username='$username'");
                while ($row1 = mysqli_fetch_array($borrower)) {
                        echo "<tr>";
                            echo "<td>".$row1['username']."</td>";
                            echo "<td> Fname : ".$row1['fname']."</td>";
                            echo "<td> Lname : ".$row1['lname']."</td>";
                            echo "<td> Fine </td>";
                        echo "</tr>";
                    $borrowed = mysqli_query($db2, "SELECT * FROM books WHERE book_id='$book_id'");
                    while ($row2 = mysqli_fetch_array($borrowed)) {
                        echo "<tr>";
                            echo "<td>".$row2['book_id']."</td>";
                            echo "<td>".$row2['book_name']."</td>";
                            echo "<td>".$due_date."</td>";
                            echo "<td>".$fine."</td>";
                        echo "</tr>";
                    }
                }
            }
        ?>
        </table>
    </body>
</html>

