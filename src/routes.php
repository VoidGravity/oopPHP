<?php

$routes = [
    '/' => 'HomeController@index',
    '/about' => 'AboutController@index',
    '/contact' => 'ContactController@index',
];

$url = $_SERVER['REQUEST_URI'];

if (array_key_exists($url, $routes)) {
    $routeParts = explode('@', $routes[$url]);
    $controller = $routeParts[0];
    $method = $routeParts[1];

    require_once __DIR__ . '/../controllers/' . $controller . '.php';

    $controllerInstance = new $controller();

    $controllerInstance->$method();
} else {
    echo '404 Not Found';
}
