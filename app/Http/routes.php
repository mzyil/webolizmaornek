<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');
Route::get('welcome', 'WelcomeController@index');

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::post('login', 'Auth\AuthController@postLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('admin', 'TasksController@index');
Route::resource('admin/tasks', 'TasksController');
Route::resource('admin/roles', 'RolesController');
Route::resource('admin/users', 'UsersController');