<?php
    $connection = mysqli_connect('localhost', 'root', '', 'users');
    
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (isset($_REQUEST['edit_id'])) {
        $receive = $_REQUEST['edit_id'];
        $query = "SELECT * FROM `user_info` WHERE id = $receive";
        $result = mysqli_query($connection, $query); 

        while ($row = mysqli_fetch_assoc($result)) {
?>

<form action="update_data.php" method="post">
    <input type="text" name="username" value="<?php echo $row['username']; ?>" placeholder="Enter your name">
    <input type="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter your email">
    <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Enter your password">
    <input type="submit" name="update" value="Update">
    <input type="hidden" name="update_id" value="<?php echo $receive; ?>" >
</form>

<?php
        }
    }
?>
