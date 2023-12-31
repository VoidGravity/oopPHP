<?php

require_once __DIR__."/../configs/app.config.php";
require_once __DIR__."/../model/auth.php";
session_start();

$auth = new Auth();
// if($auth->isLoggedIn()){
//     header('Location: '.ABS_URL.'/views/login.php');
// }
// if (isset($_SESSION['username'])) {
//     if ($_SESSION['role'] == 'admin') {
//         header('Location: ./dashboard.php');
//     } else {
//         header('Location: ./index.php');
//     }
// }



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($auth->login($username,$password)) {
        header('Location: ' . ABS_URL . '/views/index.php');
    } else {
        header('Location: ' . ABS_URL . '/views/login.php');
    }
}