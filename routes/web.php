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

$router->get('/sum/{num1}/{num2}', function ($num1, $num2) use ($router) {
    $sum = $num1+$num2;
    return $sum;
});

$router->post('/mul', function () use ($router) {
    $multiply = $router->app->request->input('num1') * $router->app->request->input('num2');
    return response($multiply);
});

$router->post('/div', function () use ($router) {
    $num1 = $router->app->request->input('num1');
    $num2 = $router->app->request->input('num2');

    if(empty($num2))
        return response('Second number must be greater than 0', 403);

    $division =  $num1 / $num2;
    $rest = $num1 % $num2;
    return response()->json(['result' => $division, 'rest' => $rest]);
});




