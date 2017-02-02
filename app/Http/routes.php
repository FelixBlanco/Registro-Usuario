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


Route::auth();

Route::get('/', 'HomeController@inicio');

//Registro de ususario
Route::get('crear', 'HomeController@create')->name("crear");

//GRUD ADMIN
Route::resource('admin', 'HomeController');

Route::get('/home', 'HomeController@index');

