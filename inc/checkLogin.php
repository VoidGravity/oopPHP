<?php
require("./inc/connection.php");

if (isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $password;

    $sql = "SELECT * FROM users WHERE username ='$username'";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        $row = mysqli_fetch_array($result);
        $hash = $row['password'];
        echo "<br>
        $hash
        <br>";
        echo "<br>
        $password
        <br>";
        

        if (password_verify("$password",$hash)) { 
            echo 'Login successful!';
            header('Location: home.php');
        } else {

            echo "DAMN";
        }
    } else {
        echo 'Invalid username or password 222222';
        die();
    }
}