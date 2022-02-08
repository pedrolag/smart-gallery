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

$router->group(['prefix' => '/api'], function () use ($router) {

    $router->group(['prefix' => '/categories'], function () use ($router) {
        $router->get('', 'CategoryController@getAll');
        $router->get('{id}', 'CategoryController@getById');
        $router->post('', 'CategoryController@create');
        $router->put('{id}', 'CategoryController@update');
        $router->delete('{id}', 'CategoryController@destroy');
    });

    $router->group(['prefix' => '/images'], function () use ($router) {
        $router->get('', 'ImageController@getAll');
        $router->get('{id}', 'ImageController@getById');
        $router->post('', 'ImageController@create');
        $router->put('{id}', 'ImageController@update');
        $router->delete('{id}', 'ImageController@destroy');
    });

});
