<?php

namespace App\Http\Controllers;

use App\Models\TourGeocode;
use App\Models\TourCountry;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use GuzzleHttp\Client;

class TourGeocodeController extends Controller {

	private $layout_variables = array();
	private $google_maps_api_url_base = 'https://maps.googleapis.com/maps/api/geocode/json';

	public function __construct() {
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$geocodes = TourGeocode::orderBy('geocode_location')->get();

		$page_variables = array(
			'geocodes' => $geocodes,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.geocode.index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$geocode = new TourGeocode;

		$countries = TourCountry::orderBy('country_name')->lists('country_name', 'country_id');
		$countries = array(0 => '&nbsp;') + $countries->toArray();

		$page_variables = array(
			'geocode' => $geocode,
			'countries' => $countries,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.geocode.create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = new TourGeocode;

		$fields = $id->getFillable();

		foreach ($fields as $field) {
			$id->{$field} = Input::get($field);
		}

		$result = $id->save();

		if ($result !== false) {
			return Redirect::route('admin.tour-geocode.show', array('id' => $id->geocode_id))->with('message', 'Your changes were saved.');
		} else {
			return Redirect::route('admin.tour-geocode.index')->with('error', 'Your changes were not saved.');
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
			'geocode' => $id,
		);

		$data = array_merge($method_variables, $this->layout_variables);

		return View::make('tour.geocode.show', $data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$countries = TourCountry::orderBy('country_name')->lists('country_name', 'country_id');
		$countries = array(0 => '&nbsp;') + $countries->toArray();

		$page_variables = array(
			'geocode' => $id,
			'countries' => $countries,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.geocode.edit', $data);
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
			return Redirect::route('admin.tour-geocode.show', array('id' => $id->geocode_id))->with('message', 'Your changes were saved.');
		} else {
			return Redirect::route('admin.tour-geocode.index')->with('error', 'Your changes were not saved.');
		}
	}


	public function delete($id) {

		$method_variables = array(
			'geocode' => $id,
		);

		$data = array_merge($method_variables, $this->layout_variables);

		return View::make('tour.geocode.delete', $data);
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
		$geocode_location = $id->geocode_location;

		if ($confirm === true) {
			// Remove tour.
			$id->delete();
			return Redirect::route('admin.tour-geocode.index')->with('message', $geocode_location . ' was deleted.');
		} else {
			return Redirect::route('admin.tour-geocode.show', array('id' => $id->geocode_id))->with('error', $geocode_location . ' was not deleted.');
		}
	}

	public function lookup() {

		$input = Input::all();
		$country_id = $input['geocode_country'];

		if (!empty($country_id)) {
			$input['geocode_country_name'] = TourCountry::find($country_id)->country_name;
		}

		$location = array();

		if (!empty($input['geocode_location'])) {
			$location[] = $input['geocode_location'];
		}

		if (!empty($input['geocode_address'])) {
			$location[] = $input['geocode_address'];
		}

		if (!empty($input['geocode_city'])) {
			$location[] = $input['geocode_city'];
		}

		if (!empty($input['geocode_state'])) {
			$location[] = $input['geocode_state'];
		}

		if (!empty($input['geocode_country_name'])) {
			$location[] = $input['geocode_country_name'];
		}

		$address = urlencode( implode(', ', $location) );

		$url = $this->google_maps_api_url_base . '?address=' . $address . '&key=' . GOOGLE_MAPS_API_V3_SERVER_KEY;

		$client = new Client();
		$response = $client->get($url);

		echo $response->getBody() . "\n";
	}
}
