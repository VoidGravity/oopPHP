<?php
require_once __DIR__ . "/../configs/app.config.php";
require_once __DIR__ . "/../model/auth.php";

$auth = new Auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];

    if($auth->register($username, $password, $password2, $email)){
        header('Location: ' . ABS_URL . '/views/login.php'); 
    }else{
        header('Location: ' . ABS_URL . '/views/register.php'); 
    }

}
