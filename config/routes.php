<?php

return function (\Core\Http\Router $router) {
    $router->get('/', function() {
        echo 'main';
    });
    $router->get('/about', function() {
        echo 'about';
    });
    $router->get('/contacts', function() {
        echo 'contacts';
    });
    $router->get('/post/(?P<id>[0-9]+)', function() {
        echo 'post';
    });
};