<?php

namespace DuranDuranNetworks\App\Http\Controllers\Admin;

use DuranDuranNetworks\App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function __construct() {
	}

	public function admin() {
		return View::make('admin');
	}


}
