<?php
require_once __DIR__ . "/../configs/app.config.php";
require_once __DIR__ . "/../model/auth.php";

$auth = new Auth();

if ($auth->logout()) {
    header('Location: ' . ABS_URL . '/views/login.php');
}