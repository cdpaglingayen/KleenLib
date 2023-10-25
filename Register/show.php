<?php 
    include('server.php');
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM users WHERE id=$id");
        header('location: show.php');
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
    <title>Manage Users</title>
    </head>
	<body>
        <div class="container rounded">
            <h1 class="text-center">User Management</h1>
            <ul class="pagination d-flex justify-content-end">
                    <a href="../Admin/home.php" class="page-link rounded border border-dark btn btn-primary"><< Previous Page</a>
                </ul>
                <div class="table-responsive">
                    <table class="table align-middle table-bordered border-dark">
                        <thead class="table-dark">
                            <tr>
                                <th scope='col'>Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Password</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Actions</th>
                            </tr>
                        </thead>
                        <?php
                            // display records
                            $results = mysqli_query($db, "SELECT * FROM users");
                            while ($row = mysqli_fetch_array($results)) {

                                // hide admin accounts
                                if ($row['user_type'] == 'admin') {
                                    continue;
                                }

                                echo "<tbody>";
                                    echo "<td>".$row['username']."</td>";
                                    echo "<td>".$row['email']."</td>";
                                    echo "<td>".$row['password']."</td>";
                                    echo "<td>".$row['fname']."</td>";
                                    echo "<td>".$row['lname']."</td>";
                                    echo "<td>
                                        <a class='btn btn-primary link-light text-decoration-none' role='button' href='register.php?edit=".$row['id']."'>Edit</a>
                                        <a class='btn confirmation btn-danger link-light text-decoration-none' role='button' href='show.php?del=".$row['id']."'>Delete</a>
                                    </td>";
                                echo "</tbody>";
                        ?>
                
                        <?php } ?>
                        <script src="script.js"></script>
                    </table>
                </div>
            </div>
    </body>
</html>

