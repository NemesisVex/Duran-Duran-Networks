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
Route::get('/album', 'AlbumController@index');

// Tours
Route::model('tour', 'Tours');
Route::get('/tour/{id?}', 'TourController@index');
Route::any('/tour/marker/{id?}', 'TourController@marker');
Route::resource('tour', 'TourController');
Route::get( '/tour/{tour}/delete', array( 'as' => 'tour.delete', 'before' => 'auth', 'uses' => 'TourController@delete' ) );

// Authentication
Route::get( '/login', array( 'as' => 'auth.login', 'uses' => 'AuthController@login') );
Route::get( '/logout', array( 'as' => 'auth.logout', 'uses' => 'AuthController@sign_out' ) );
Route::post( '/signin', array( 'as' => 'auth.signin', 'uses' => 'AuthController@sign_in' ) );
