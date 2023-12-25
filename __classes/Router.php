<?php

namespace __classes;

class Router
{



    public static function get($url, $controller,$method)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['url']) && $_GET['url'] === $url) {
                $controller = new $controller();
                $controller->$method($_GET);
            }
        }
    }

    public static function post($url, $controller,$method)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_GET['url'] === $url) {
                $controller = new $controller();
                $controller->$method($_POST);
            }
        }
    }
}
