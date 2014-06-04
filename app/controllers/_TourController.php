<?php

/**
 * TourController
 *
 * @author Greg Bueno
 */
class TourController extends BaseController  {
	
	private $layout_variables = array();
	private $google_map_key = 'ABQIAAAAenOcDWY3GB5qVSPOQiBt_xRPto5laNqVxgk7rNaULMnh65830hSw2SmWLSmHjjpbku0UcRlTK_fhGQ';
	
	public function __construct() {
		global $config_url_base;
		
		$this->layout_variables = array(
			'vigilantmedia_cdn_uri' => VIGILANTMEDIA_CDN_BASE_URI,
			'copyright_year' => date('Y'),
			'config_url_base' => $config_url_base,
		);
	}
	
	public function index($id = 1) {
		
		$tours = Tours::all();
		
		$tour = Tours::find($id);
		
		$center_point = $tour->dates->first();
		
		$page_variables = array(
			'tours' => $tours,
			'tour' => $tour,
			'google_map_key' => $this->google_map_key,
		);
		
		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.index', $data);
	}
	
	public function marker($id) {
		$tour_date = TourDates::find($id);
		
		$data = array(
			'tour_date' => $tour_date,
		);
		
		return View::make('tour.marker', $data);
	}
}
