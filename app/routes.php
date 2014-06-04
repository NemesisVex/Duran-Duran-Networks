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
Route::model('tour', 'Tour');
Route::model('tour_date', 'TourDate');
Route::model('tour_geocode', 'TourGeocode');
Route::get( '/tour', array( 'as' => 'tour.home', 'uses' => 'TourController@map' ));
Route::get( '/tour/{tour?}', array( 'as' => 'tour.map', 'uses' => 'TourController@map' ));
Route::any( '/tour/marker/{id?}', array( 'as' => 'tour.marker', 'uses' => 'TourController@marker' ) );
Route::group( array( 'prefix' => 'admin' ), function () {
	Route::get( '/', array( 'as' => 'admin.home', 'uses' => 'HomeController@admin' ) );

	Route::get( '/tour/{tour}/delete', array( 'as' => 'admin.tour.delete', 'before' => 'auth', 'uses' => 'TourController@delete' ) );
	Route::resource('tour', 'TourController');

	Route::get( '/tour-date/{tour_date}/delete', array( 'as' => 'admin.tour-date.delete', 'before' => 'auth', 'uses' => 'TourDateController@delete' ) );
	Route::resource('tour-date', 'TourDateController');

	Route::get( '/tour-geocode/{tour_geocode}/delete', array( 'as' => 'admin.tour-geocode.delete', 'before' => 'auth', 'uses' => 'TourGeocodeController@delete' ) );
	Route::resource('tour-geocode', 'TourGeocodeController');
} );

// Authentication
Route::get( '/login', array( 'as' => 'auth.login', 'uses' => 'AuthController@login') );
Route::get( '/logout', array( 'as' => 'auth.logout', 'uses' => 'AuthController@sign_out' ) );
Route::post( '/signin', array( 'as' => 'auth.signin', 'uses' => 'AuthController@sign_in' ) );
