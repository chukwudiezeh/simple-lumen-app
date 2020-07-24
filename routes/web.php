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

$router->group(['prefix' => 'api/v1'], function() use ($router) {

    $router->group(['prefix' => 'authors'], function() use ($router){

        $router->get('', 'AuthorsController@index');//all authors
        $router->get('{id}', 'AuthorsController@show');//show one author
        $router->post('create', 'AuthorsController@create');//create
        $router->put('update/{id}', 'AuthorController@update');//update an author
        $router->delete('delete/{id}', 'AuthorController@delete');//delete an author

    });

});

