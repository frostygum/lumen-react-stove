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

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register"
    $router->post('register', 'AuthController@register');

    // Matches "/api/login"
    $router->post('login', 'AuthController@login');

    // Matches "/api/profile"
    $router->get('profile', 'UserController@profile');

    // Matches "/api/logout"
    $router->get('logout', 'UserController@logout');

    // Matches "/api/todo"
    $router->post('todo', 'TodoController@addTodo');

    $router->get('todo', 'TodoController@showAll');

    $router->get('todo/{id}', 'TodoController@show');

    $router->delete('todo/{id}', 'TodoController@destroy');
 });