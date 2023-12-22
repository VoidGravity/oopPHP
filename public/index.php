<?php

$request = $_SERVER['REQUEST_URI'];

$routes = [
    '/' => 'HomeController@index',
    '/about' => 'AboutController@index',
    '/login' => 'LoginController@index',
];

foreach ($routes as $route => $action) {
    if ($route == $request) {
        list($controller, $method) = explode('@', $action);

        require_once 'controllers/' . $controller . '.php';

        $controllerInstance = new $controller;
        $controllerInstance->$method();

        exit();
    }
}
http_response_code(404);
echo 'Page not found';