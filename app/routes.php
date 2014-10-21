<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::resource('transactions', 'TransactionsController');

Route::get('/users/{id}/forecast', 'UsersController@forecast');

Route::resource('users', 'UsersController');

Route::resource('simulatons', 'SimulationsController');

Route::resource('savings', 'SavingsController');

Route::get('/login', 'HomeController@showLogin');

Route::get('/logout', 'HomeController@doLogout');

Route::post('/login', 'HomeController@doLogin');