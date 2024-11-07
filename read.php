<?php

        $connection = mysqli_connect('localhost', 'root', '', 'users');

        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM `user_info`";
        $result = mysqli_query($connection, $query);

        $count = mysqli_num_rows($result);

        if($count < 0){

        while($row = mysqli_fetch_assoc($result)){

            // echo"<pre>";

            // print_r($row);

            // echo"</pre>";

            // $id = $row['id'];
            // echo"$id";
            // echo "<br>";

            $id = $row['username'];
            echo"$id";
            echo "<br>";
        }

    }

    else{

        echo"You don't have any data in your database";
    }

?>