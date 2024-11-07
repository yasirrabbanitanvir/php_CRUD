<?php

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($username && $email && $password) {
        $connection = mysqli_connect('localhost', 'root', '', 'users');

        // if($connection){
        //     echo "Database Connected";
        // } else {
        //     echo "Not Connected" .mysqli_error();
        // }

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "INSERT INTO user_info (username, email, password) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            header("location: index.php?inserted");
        }
        
        else {
            echo "Insert failed: " . mysqli_error($connection);
        }
        
    } 
    
    else {
        echo "No field can be blank";
    }
}

?>