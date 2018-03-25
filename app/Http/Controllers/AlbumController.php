<?php

/**
 * AlbumController
 *
 * @author Greg Bueno
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;

class AlbumController extends Controller  {
	
	private $layout_variables = array();
	
	public function __construct() {
		global $config_url_base;
		
		$this->layout_variables = array(
			'copyright_year' => date('Y'),
			'config_url_base' => $config_url_base,
		);
	}
	
	public function index() {
		$page_variables = array(
		);
		
		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('album.index', $data);
	}
	
}
