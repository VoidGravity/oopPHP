<?php
function view($view, $data = [])
{
    extract($data);
    ob_start();
    require_once __DIR__ . "/../views/" . $view . ".view.php";
    $renderResult = ob_get_clean();
    echo $renderResult;
}

function validatePassword($password)
{
    $passCheckRgex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
    return preg_match($passCheckRgex, $password);
}

// assets fixer
function assets($path)
{
    return ABS_URL . "./assets/" . $path;
}

function url($path)
{
    return ABS_URL . "/" . $path;
}

function isLoggedIn()
{
    return isset($_SESSION['role']);
}

function getSessionParam($param)
{
    return @$_SESSION[$param];
}

function setSessionParam($param, $value)
{
    return $_SESSION[$param] = $value;
}

function clearSession()
{
    session_destroy();
    return true;
}

function redirect($url)
{
    header('location: ' . ABS_URL . "/" . $url);
    die();
}
