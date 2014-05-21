<?php

/**
 * TourController
 *
 * @author Greg Bueno
 */
class TourController extends BaseController  {
	
	private $layout_variables = array();
	
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
		
		foreach ($tour->dates as $tour_date) {
			$tour_date->date_tour_date_formatted = date('Y-m-d', strtotime($tour_date->date_tour_date));
		}
		
		$page_variables = array(
			'tours' => $tours,
			'tour' => $tour,
		);
		
		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.index', $data);
	}
	
}
