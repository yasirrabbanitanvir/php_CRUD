<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <br>
    <form action="create.php" method='post'>
        <input type="text" name='name' placeholder="Enter your name">
        <input type="email" name='email' placeholder="Enter your email">
        <input type="password" name='password' placeholder="Enter your password">
        <input type="submit" name='submit' value='Submit'>
    </form>
    <br>
    <?php
        $connection = mysqli_connect('localhost', 'root', '', 'users');
        
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM `user_info`";
        $result = mysqli_query($connection, $query);
        $count = mysqli_num_rows($result);

    ?>

    <?php
        if (isset($_REQUEST['deleted'])) {
            echo "<font color='green'>Data is deleted</font>";
        }
    ?>

    <?php
        if (isset($_REQUEST['updated'])) {
            echo "<font color='green'>Data is updated</font>";
        }
    ?>

    <?php
        if (isset($_REQUEST['inserted'])) {
            echo "<font color='green'>Data is inserted</font>";
        }
    ?>

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <?php    
            while($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $username = $row['username'];
                $email = $row['email'];
                $password = $row['password'];
        ?>

        <tbody>
            <tr>
                <td><?php echo "$id"; ?></td>
                <td><?php echo "$username"; ?></td>
                <td><?php echo "$email"; ?></td>
                <td><?php echo "$password"; ?></td>
                <td><a href="edit.php?edit_id=<?php echo $id; ?>">Edit</a>||<a href="delete.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        </tbody>

        <?php
            }
        ?>

    </table>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>