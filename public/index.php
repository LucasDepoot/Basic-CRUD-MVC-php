<?php
require_once '../vendor/autoload.php';

//-------------Routage------------//
$router = new AltoRouter();

//Defini le chemin pour le routeur
if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
} else {
    $_SERVER['BASE_URI'] = '/';
}

//creation des routes
$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => '\App\Controllers\MainController'
    ],
    'main-home'
);
// route d exemples 
$router->map(
    'GET',
    '/exemple',
    [
        'method' => 'exemple',
        'controller' => '\App\Controllers\ExempleController'
    ],
    'exemple-exemple'
);
// route d ajout
$router->map(
    'GET',
    '/exemple/add',
    [
        'method' => 'exempleAdd',
        'controller' => '\App\Controllers\ExempleController'
    ],
    'exemple-exempleAdd'
);
$router->map(
    'POST',
    '/exemple/add',
    [
        'method' => 'exempleAddProcess',
        'controller' => '\App\Controllers\ExempleController'
    ],
    'exemple-exempleAddProcess'
);
// route update
$router->map(
    'GET',
    '/exemple/update/[i:id]',
    [
        'method' => 'exempleUpdate',
        'controller' => '\App\Controllers\ExempleController'
    ],
    'exemple-exempleUpdate'
);
$router->map(
    'POST',
    '/exemple/update/[i:id]',
    [
        'method' => 'exempleUpdateProcess',
        'controller' => '\App\Controllers\ExempleController'
    ],
    'exemple-exempleUpdateProcess'
);
// route delete
$router->map(
    'GET',
    '/exemple/delete/[i:id]',
    [
        'method' => 'exempleDelete',
        'controller' => '\App\Controllers\ExempleController' // On indique le FQCN de la classe
    ],
    'exemple-exempleDelete'
);

$match = $router->match();
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
$dispatcher->dispatch();
