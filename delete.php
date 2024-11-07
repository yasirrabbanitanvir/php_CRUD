<?php

        $connection = mysqli_connect('localhost', 'root', '', 'users');

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

$receive = $_REQUEST['id'];
$query = "DELETE FROM `user_info` WHERE id = $receive";
$result = mysqli_query($connection, $query);

if($result){

    header("location: index.php?deleted");
}

?>