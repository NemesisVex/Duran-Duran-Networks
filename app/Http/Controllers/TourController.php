<?php

namespace DuranDuranNetworks\App\Http\Controllers;

use DuranDuranNetworks\App\Models\Tour;
use DuranDuranNetworks\App\Models\TourDate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class TourController extends Controller {

	private $layout_variables = array();

	public function __construct() {
	}

	public function map($id = null) {
		if ($id == null) {
			$id = Tour::find(1);
		}

		$tours = Tour::all();

		$dates = array();
		foreach ($id->dates as $date) {
			$dates[] = (object) array(
				'date_id' => $date->date_id,
				'geocode_lat' => $date->geocode->geocode_lat,
				'geocode_lon' => $date->geocode->geocode_lon,
			);
		}

		$page_variables = array(
			'tours' => $tours,
			'tour' => $id,
			'dates' => json_encode($dates),
			'google_map_key' => GOOGLE_MAPS_API_V2_KEY,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.map', $data);
	}

	public function marker($id) {
		$tour_date = TourDate::find($id);

		$data = array(
			'tour_date' => $tour_date,
		);

		return View::make('tour.marker', $data);
	}
}
