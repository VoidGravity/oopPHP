<?php 
require("./inc/connection.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT `username`, `password` FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo 'Login successful!';
        header('Location: home.php');
    } else {
        echo 'Invalid username or password';
    }
}

?>