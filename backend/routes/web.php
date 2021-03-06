<?php

declare(strict_types=1);

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\Post;
use Illuminate\Support\Facades\Http;
use phpcent\Client;

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

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->post('logout', [
        'middleware' => 'auth',
        'uses' => 'AuthController@logout'
    ]);
});

$router->group(['middleware' => ['exists','auth']], function () use ($router) {
    $router->addRoute(
        ['GET', 'POST', 'PUT', 'DELETE'],
        '/{model}/{methodName}[/{id:[0-9]+}]',
        'SingleController@handle'
    );
});


