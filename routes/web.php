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

$router->group(['prefix' => 'permiso'], function () use ($router) {
    $router->get('/', 'PermisoController@showAll');
    $router->get('/{id}', 'PermisoController@find');
    $router->post('/', 'PermisoController@store');
    $router->post('/{id}', 'PermisoController@edit');
    $router->delete('/{id}', 'PermisoController@destroy');
});

$router->group(['prefix' => 'usuario'], function () use ($router) {
    $router->get('/', 'UsuarioController@showAll');
    $router->get('/{id}', 'UsuarioController@find');
    $router->post('/', 'UsuarioController@store');
    $router->post('/{id}', 'UsuarioController@edit');
    $router->delete('/{id}', 'UsuarioController@destroy');
});

$router->group(['prefix' => 'tarea'], function () use ($router) {
    $router->get('/', 'TareaController@showAll');
    $router->get('/{id}', 'TareaController@find');
    $router->post('/', 'TareaController@store');
    $router->post('/{id}', 'TareaController@edit');
    $router->delete('/{id}', 'TareaController@destroy');
});

$router->group(['prefix' => 'academia'], function () use ($router) {
    $router->get('/', 'AcademiaController@showAll');
    $router->get('/{id}', 'AcademiaController@find');
    $router->post('/', 'AcademiaController@store');
    $router->post('/{id}', 'AcademiaController@edit');
    $router->delete('/{id}', 'AcademiaController@destroy');
});