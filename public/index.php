<?php

require_once "../vendor/autoload.php";

$request = new \Core\Http\Request($_SERVER['REQUEST_URI']);
$response = new \Core\Http\Response();
$router = new \Core\Http\Router($request, $response);
$routes = require_once '../config/routes.php';
$routes = $routes($router);

$router->dispatch();