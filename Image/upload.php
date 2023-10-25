<?php
    include('../User/functions.php');
    if(isset($_POST['uploadImageBtn'])) {
        $username = $_SESSION['user']['username'];
        $uploadFolder = '../Image/uploads/';
        foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
            $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
            $imageName = $_FILES['imageFile']['name'][$key];
            $result = move_uploaded_file($imageTmpName, $uploadFolder.$imageName);

            $query = "UPDATE users SET image='$imageName' WHERE username='$username'";
            $run = $db->query($query) or die("Error saving image".$db->error);
        }
        if (!isAdmin()) { header('location: ../User/index.php'); }
        else { header('location: ../Admin/home.php'); }
    }
?>