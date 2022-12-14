<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/personajes', 'PersonajeController@index');

$router->get('/personajes/{id}', 'PersonajeController@ver');

$router->post('/personajes', 'PersonajeController@guardar');

$router->delete('/personajes/{id}', 'PersonajeController@eliminar');

$router->post('/personajes/{id}', 'PersonajeController@actualizar');