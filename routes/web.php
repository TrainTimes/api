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


/* -- API End Points -- */
$router->group(['prefix' => env('API_VER')], function () use ($router) {
    $router->get('/routes/{province_id}', ['uses' => 'TrainTimesController@route']);
    $router->get('/stations/{route_id}', ['uses' => 'TrainTimesController@station']);
});

$router->group(['prefix' => 'shopify'], function () use ($router) {
    $router->get('/install', ['uses' => 'ShopifyController@install']);
    $router->get('/generatetoken', ['uses' => 'ShopifyController@generateToken']);
});