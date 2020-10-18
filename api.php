<?php

use Illuminate\Http\Request;

// Route::post('auth/register','App\Http\Controllers\Api\RegisterController@register');
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api){
	$api->post('auth/register','App\Http\Controllers\UserController@add');
});