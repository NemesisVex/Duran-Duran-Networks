<?php

class TourDateController extends \BaseController {

	private $layout_variables = array();

	public function __construct() {
		global $config_url_base;

		$this->layout_variables = array(
			'config_url_base' => $config_url_base,
		);

		$this->beforeFilter( 'auth' );

		$this->beforeFilter( 'csrf', array( 'only' => array( 'store', 'update', 'destroy' ) ) );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tour = Input::get('tour');

		if (!empty($tour)) {
			$dates = TourDate::with('tour')->where('date_tour_id', $tour)->orderBy('date_tour_date');
		} else {
			$dates = TourDate::with('tour')->orderBy('date_tour_date')->get();
		}

		$page_variables = array(
			'dates' => $dates,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.date.index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$date = new TourDate;
		$date->date_tour_date = date('Y-m-d');

		$tour_id = Input::get('tour');
		if (!empty($tour_id)) {
			$date->date_tour_id = $tour_id;
		}

		$tours = Tour::lists('tour_name', 'tour_id');
		$tours = array(0 => '&nbsp;') + $tours;

		$geocodes = $this->build_location_options();

		$page_variables = array(
			'date' => $date,
			'tours' => $tours,
			'geocodes' => $geocodes,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.date.create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = new TourDate;

		$fields = $id->getFillable();

		foreach ($fields as $field) {
			$id->{$field} = Input::get($field);
		}

		$result = $id->save();

		if ($result !== false) {
			return Redirect::route('admin.tour-date.show', array('id' => $id->date_id))->with('message', 'Your changes were saved.');
		} else {
			return Redirect::route('admin.tour.show', array('id' => $id->date_id))->with('error', 'Your changes were not saved.');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$method_variables = array(
			'date' => $id,
		);

		$data = array_merge($method_variables, $this->layout_variables);

		return View::make('tour.date.show', $data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tours = Tour::lists('tour_name', 'tour_id');
		$tours = array(0 => '&nbsp;') + $tours;

		$geocodes = $this->build_location_options();

		$page_variables = array(
			'date' => $id,
			'tours' => $tours,
			'geocodes' => $geocodes,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.date.edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$fields = $id->getFillable();

		foreach ($fields as $field) {
			$id->{$field} = Input::get($field);
		}

		$result = $id->save();

		if ($result !== false) {
			return Redirect::route('admin.tour-date.show', array('id' => $id->date_id))->with('message', 'Your changes were saved.');
		} else {
			return Redirect::route('admin.tour.show', array('id' => $id->date_id))->with('error', 'Your changes were not saved.');
		}
	}


	public function delete($id) {

		$method_variables = array(
			'date' => $id,
		);

		$data = array_merge($method_variables, $this->layout_variables);

		return View::make('tour.date.delete', $data);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$confirm = (boolean) Input::get('confirm');
		$tour_id = $id->date_tour_id;

		if ($confirm === true) {
			// Remove tour.
			$id->delete();
			return Redirect::route('admin.tour.show', array('id' => $tour_id))->with('message', 'The tour date was deleted.');
		} else {
			return Redirect::route('admin.tour-date.show', array('id' => $id->date_id))->with('error', 'The tour date was not deleted.');
		}
	}

	private function build_location_options() {
		$geocodes = TourGeocode::orderBy('geocode_location')->get();
		$geocode_list = $geocodes->lists('geocode_location', 'geocode_id');

		foreach ($geocode_list as $g => $geocode_list_item) {
			$location = array();
			$geocode = $geocodes->find($g);

			if (!empty($geocode->geocode_city)) { $location[] = $geocode->geocode_city; }
			if (!empty($geocode->geocode_state)) { $location[] = $geocode->geocode_state; }
			if (!empty($geocode->country->country_name)) { $location[] = $geocode->country->country_name; }

			$address = implode(', ', $location);

			$geocode_list[$g] = $geocode_list_item;
			$geocode_list[$g] .= ' (' . $address . ')';
		}

		$geocode_list = array(0 => '&nbsp;') + $geocode_list;
		return $geocode_list;
	}
}
