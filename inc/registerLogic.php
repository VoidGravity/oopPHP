<?php
session_start();

require("../inc/connection.php");
$passPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if (preg_match($passPattern, $password) && $password == $password2) {
        

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email'];



        $sql = "INSERT INTO users (username,password,email) VALUES ('$username','$hash','$email')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'Registration successful!';
            header('Location: login.php');
        } else {
            echo 'Registration failed!';
        }


    } else {
        die("Invalid password");
    }
}
