<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\UsersController;
Use Illuminate\Http\Request;

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

$router->post('/register','UsersController@register');

$router->get('/posts', 'PostsController@index');

$router->group(['middleware' => 'auth'], function() use ($router) {
    
    $router->post('/newpost', 'PostsController@create');
    $router->get('/api/user', function(Request $request) {
        $user = $request->user();
        return $user->toArray();
    });
    $router->get('/userposts', 'UsersController@view_postById');
    $router->get('/logout', 'UsersController@logout');
});






