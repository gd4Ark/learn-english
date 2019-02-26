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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->post('login','AdminController@login');

    $router->get('book','UserController@getBook');

    $router->get('english','UserController@getEnglish');

    $router->post('submit','UserController@submit');

    $router->get('rank','UserController@getRank');

    $router->get('setting','UserController@getSetting');

    $router->get('log','UserController@getLog');

    $router->group(['middleware' => ['throttle:1,1']],function () use ($router){

        $router->put('feedback','UserController@addFeedback');

    });

    $router->group(['middleware'=>'auth:api'],function () use ($router){

        $router->post('checkLogin','AdminController@checkLogin');

        $router->post('logout','AdminController@logout');

        $router->post('password','AdminController@updatePassword');

        $router->post('setting','AdminController@updateSetting');

        $router->post('book','AdminController@updateBook');

        $router->put('book','AdminController@addBook');

        $router->delete('book','AdminController@delBook');

        $router->post('english','AdminController@updateEnglish');

        $router->put('english','AdminController@addEnglish');

        $router->delete('english','AdminController@delEnglish');

        $router->get('feedback','AdminController@getFeedback');

        $router->delete('feedback','AdminController@delFeedback');

        $router->delete('log','AdminController@delLog');

        $router->put('log','AdminController@addLog');

        $router->post('log','AdminController@updateLog');

    });

});