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

Route::get('/', function()
{
	return View::make('index');
});
Route::get('/album', 'AlbumController@index');

// Tours
Route::model('tour', 'DuranDuranNetworks\App\Models\Tour');
Route::model('tour_date', 'DuranDuranNetworks\App\Models\TourDate');
Route::model('tour_geocode', 'DuranDuranNetworks\App\Models\TourGeocode');
Route::get( '/tour', array( 'as' => 'tour.home', 'uses' => 'TourController@map' ));
Route::get( '/tour/{tour?}', array( 'as' => 'tour.map', 'uses' => 'TourController@map' ));
Route::any( '/tour/marker/{id?}', array( 'as' => 'tour.marker', 'uses' => 'TourController@marker' ) );
Route::group( array( 'prefix' => 'admin', 'middleware' => 'auth' ), function () {
	Route::get( '/', array( 'as' => 'admin.home', 'uses' => 'Admin\HomeController@admin' ) );

	Route::get( '/tour/{tour}/delete', array( 'as' => 'admin.tour.delete', 'uses' => 'Admin\TourController@delete' ) );
	Route::resource('tour', 'Admin\TourController');

	Route::get( '/tour-date/{tour_date}/delete', array( 'as' => 'admin.tour-date.delete', 'uses' => 'Admin\TourDateController@delete' ) );
	Route::resource('tour-date', 'Admin\TourDateController');

	Route::get( '/tour-geocode/{tour_geocode}/delete', array( 'as' => 'admin.tour-geocode.delete', 'uses' => 'Admin\TourGeocodeController@delete' ) );
	Route::post( '/tour-geocode/lookup-location', array( 'as' => 'admin.tour-geocode.lookup', 'uses' => 'Admin\TourGeocodeController@lookup' ) );
	Route::resource('tour-geocode', 'Admin\TourGeocodeController');
} );

// Authentication
Route::get( '/auth/login', array( 'as' => 'auth.login', 'uses' => 'AuthController@getLogin') );
Route::post( '/auth/login', array( 'as' => 'auth.signin', 'uses' => 'AuthController@postLogin' ) );
Route::get( '/auth/logout', array( 'as' => 'auth.logout', 'uses' => 'AuthController@getLogout' ) );
