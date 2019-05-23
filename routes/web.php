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

Route::get('/', 'MainPageController@index');

Route::get('/film/{id}', 'MainPageController@filmPage');

Route::post('/subscription/add', 'SubscribeController@subscription')->name('subscription');

Route::post('/comments/add', 'CommentsController@addComment')->name('comment.add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@update');

Route::get('/categories/{id}', 'Search@categories');

Route::post('/user/credentials','HomeController@postCredentials');

Route::post('/search','Search@index');