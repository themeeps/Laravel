<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/role', function () {
    return view('role');
});

Route::get('/dashboard', function () {
    return view('index');
});

Route::get('/user', 'UserController@show');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::post('/user/change', 'UserController@update');
Route::post('/user/add', 'UserController@add');

Route::get('/contractor', 'KontraktorController@show');
Route::get('/contractor/delete/{id}', 'KontraktorController@delete');
Route::post('/contractor/change', 'KontraktorController@update');
Route::post('/contractor/add', 'KontraktorController@add');

Route::get('/achievement-contractor', 'AchievementKontraktorController@show');
Route::get('/achievement-contractor/delete/{id}', 'AchievementKontraktorController@delete');
Route::post('/achievement-contractor/change', 'AchievementKontraktorController@update');
Route::post('/achievement-contractor/add', 'AchievementKontraktorController@add');

Route::get('/experience-contractor', 'ExperienceKontraktorController@show');
Route::get('/experience-contractor/delete/{id}', 'ExperienceKontraktorController@delete');
Route::post('/experience-contractor/change', 'ExperienceKontraktorController@update');
Route::post('/experience-contractor/add', 'ExperienceKontraktorController@add');

Route::get('/process', 'ProsesController@show');
Route::get('/process/delete/{id}', 'ProsesController@delete');
Route::post('/process/change', 'ProsesController@update');
Route::post('/process/add', 'ProsesController@add');

Route::get('/process-detail', 'ProsesDetailController@show');
Route::get('/process-detail/delete/{id}', 'ProsesDetailController@delete');
Route::post('/process-detail/change', 'ProsesDetailController@update');
Route::post('/process-detail/add', 'ProsesDetailController@add');

Route::get('/rated', 'RatingController@show');
Route::get('/rated/delete/{id}', 'RatingController@delete');
Route::post('/rated/change', 'RatingController@update');
Route::post('/rated/add', 'RatingController@add');