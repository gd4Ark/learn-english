<?php

/**
 * @var $router \App\Http\Router
 */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('login', 'AuthController@login');

    $router->group(['middleware'=>'auth:api'],function () use ($router){

        $router->post('logout', 'AuthController@logout');
        $router->post('checkLogin', 'AuthController@checkLogin');
        $router->put('password', 'AuthController@updatePassword');
        $router->resource('book', 'BookController');
        $router->resource('english', 'EnglishController');
        $router->resource('score', 'ScoreController');
        $router->resource('log', 'LogController');
        $router->resource('feedback', 'FeedbackController');
        $router->resource('setting', 'SettingController');

    });

    $router->get('book','BookController@index');
    $router->get('english','EnglishController@index');
    $router->get('score','ScoreController@index');
    $router->get('log','LogController@index');
    $router->get('setting','SettingController@index');
    $router->post('feedback','FeedbackController@create');
    $router->post('score','ScoreController@create');

});