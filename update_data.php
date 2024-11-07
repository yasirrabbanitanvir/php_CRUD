<?php
    $connection = mysqli_connect('localhost', 'root', '', 'users');
    
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (isset($_REQUEST['update'])) {
        
        $name = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $hidden_id = $_REQUEST['update_id'];

        $query = "UPDATE user_info SET username = '$name', email = '$email', password = '$password' WHERE id = $hidden_id";

    }

    $result = mysqli_query($connection, $query);
    if ($result) {
        header("location: index.php?updated");
    }
?>