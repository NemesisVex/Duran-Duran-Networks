<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 5/26/14
 * Time: 2:09 PM
 */


namespace DuranDuranNetworks\App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	use AuthenticatesAndRegistersUsers;

	private $layout_variables = array();
	protected $redirectTo = '/admin';

	public function __construct() {
	}

	public function getLogin() {

		if (Auth::check() === true) {
			return Redirect::intended('/');
			die();
		}

		$method_variables = array();

		$data = array_merge($method_variables, $this->layout_variables);

		return View::make('auth.login', $data);
	}

	public function postLogin() {
		$user_name = Input::get('user_name');
		$user_password = Input::get('user_password');

		if (Auth::attempt( array( 'user_name' => $user_name, 'password' => $user_password ), true )) {
			return Redirect::intended('/');
		} else {
			return Redirect::to('/auth/login')->with('error', "Sorry, we couldn't verify your credentials. Please try again.");
		}
	}

}