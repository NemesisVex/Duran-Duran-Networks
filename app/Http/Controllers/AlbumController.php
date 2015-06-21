<?php

/**
 * AlbumController
 *
 * @author Greg Bueno
 */
class AlbumController extends BaseController  {
	
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
