<?php

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

$router->group(['prefix' => 'rol'], function () use ($router) {
    $router->get('/', 'RolController@showAll');
    $router->get('/{id}', 'RolController@find');
    $router->post('/', 'RolController@store');
    $router->post('/{id}', 'RolController@edit');
    $router->delete('/{id}', 'RolController@destroy');
});