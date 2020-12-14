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


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'ReynielController@index']);
});


function resources($router, $url, $controller){
	$router->get($url,$controller.'@index');
	$router->post($url,$controller.'@store');
	$router->get($url.'/{id}',$controller.'@show');
	$router->put($url.'/{id}',$controller.'@update');
	$router->patch($url.'/{id}',$controller.'@update');
	$router->delete($url.'/{id}',$controller.'@destroy');
}
resources($router, '/users', 'ReynielController');


$router->get('/usersjob', 'JobController@index');
$router->get('/usersjob/{id}', 'JobController@show');
$router->post('/usersjob', 'JobController@create');
$router->put('/usersjob/{id}', 'JobController@update');
$router->delete('/usersjob/{id}', 'JobController@destroy');