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


Route::get('/', 'HomeController@showGetStarted');

Route::post('/', 'HomeController@createFirstBudget');

Route::get('/', 'HomeController@showWelcome');

Route::get('/login', 'AuthController@showLogin');

Route::get('/logout', 'AuthController@doLogout');

Route::post('/login', 'AuthController@doLogin');

Route::get('/login/facebook', 'AuthController@loginFacebook');

Route::get('/glossary', 'GlossaryTermController@index');

Route::resource('simulations', 'SimulationsController');

Route::resource('transactions', 'TransactionsController');

Route::resource('savings', 'SavingsController');

Route::resource('users', 'UsersController');

Route::resource('goals', 'GoalsController');