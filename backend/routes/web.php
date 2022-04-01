<?php

declare(strict_types=1);

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\City;
use App\Models\User;
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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->post('logout', [
        'middleware' => 'auth',
        'uses' => 'AuthController@logout'
    ]);
});

$router->group(['middleware' => ['exists', "auth"]], function () use ($router) {
    $router->addRoute(
        ['GET', 'POST', 'PUT', 'DELETE'],
        '/{model}/{methodName}[/{id:[0-9]+}]',
        'SingleController@handle'
    );
});

$router->get('/testPublish', function () use ($router) {
    $client = new Client("http://centrifugo:8000/api", "api_key");
    $openweather_key = env("OPENWEATHER_KEY");

    $concreteCity = City::get(new \Illuminate\Http\Request(), 1);

    $response = Http::get("https://api.openweathermap.org/data/2.5/weather?id={$concreteCity['api_city_id']}&appid={$openweather_key}");
    $data = json_decode($response->body());
    $data->main->temp = rand(1, 500);

    $client->publish("{$concreteCity['name']}", $data);

    $cities = City::get(new \Illuminate\Http\Request());
    $city_id = array_rand($cities);

    $response = Http::get("https://api.openweathermap.org/data/2.5/weather?id={$cities[$city_id]['api_city_id']}&appid={$openweather_key}");
    $data = json_decode($response->body());
    $data->main->temp = rand(1, 500);

    $client->publish("{$cities[$city_id]['name']}", $data);

    $users = User::getAll(new \Illuminate\Http\Request());
    foreach ($users as $user) {
        $favourite = User::find($user['id'])
            ->cities()
            ->get(['id','api_city_id'])
            ->toArray();
        if (!$favourite) continue;
        $city_id = array_rand($favourite);

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?id={$favourite[$city_id]['api_city_id']}&appid={$openweather_key}");
        $data = json_decode($response->body());
        $data->main->temp = rand(1, 500);

        $client->publish("userChannel#{$user['id']}", $data);
    }

    return 1;
});
