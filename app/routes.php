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

Route::get('/', function()
{
	return View::make('index');
});
Route::get('/tour/{id?}', 'TourController@index');
Route::any('/tour/marker/{id?}', 'TourController@marker');
Route::get('/album', 'AlbumController@index');
