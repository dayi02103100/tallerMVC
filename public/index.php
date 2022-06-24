<?php

require_once __DIR__ .'/../includes/app.php';

use MVC\Router;
use Controllers\tareaController;
use Controllers\tipoController;

$router = new Router();

$router->get('/tarea/admin', [tareaController::class, 'index'] );
$router->get('/tipo/adminT', [tipoController::class, 'index'] );


$router->get('/tarea/crear', [tareaController::class, 'crear'] );
$router->post('/tarea/crear', [tareaController::class, 'crear'] );
$router->get('/tarea/actualizar', [tareaController::class, 'actualizar']);
$router->post('/tarea/actualizar', [tareaController::class, 'actualizar']);
$router->post('/tarea/eliminar', [tareaController::class, 'eliminar']);

//vendedores

$router->get('/tipo/crear', [tipoController::class, 'crear'] );
$router->post('/tipo/crear', [tipoController::class, 'crear'] );
$router->get('/tipo/actualizar', [tipoController::class, 'actualizar']);
$router->post('/tipo/actualizar', [tipoController::class, 'actualizar']);
$router->post('/tipo/eliminar', [tipoController::class, 'eliminar']);


$router->comprobarRutas();
