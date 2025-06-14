<?php

return function (\Core\Http\Router $router) {
    $router->get('/', [\App\Controllers\HomeController::class, 'index']);
    $router->get('/about', [\App\Controllers\HomeController::class, 'about']);
    $router->get('/contacts', [\App\Controllers\HomeController::class, 'contacts']);
    $router->get('/register', [\App\Controllers\UserController::class, 'register']);

    $router->post('/register', [\App\Controllers\UserController::class, 'store']);
};