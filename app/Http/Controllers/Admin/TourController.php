<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourDate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class TourController extends Controller {

	private $layout_variables = array();
	private $google_map_key = 'ABQIAAAAenOcDWY3GB5qVSPOQiBt_xRPto5laNqVxgk7rNaULMnh65830hSw2SmWLSmHjjpbku0UcRlTK_fhGQ';

	public function __construct() {
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tours = Tour::all();

		$page_variables = array(
			'tours' => $tours,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tour = new Tour;

		$page_variables = array(
			'tour' => $tour,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = new Tour;

		$fields = $id->getFillable();

		foreach ($fields as $field) {
			$id->{$field} = Input::get($field);
		}

		$result = $id->save();

		if ($result !== false) {
			return Redirect::route('tour.show', array('id' => $id->tour_id))->with('message', 'Your changes were saved.');
		} else {
			return Redirect::route('tour.index')->with('error', 'Your changes were not saved.');
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
		$chunks = $id->dates->chunk(10);
		$dates = $chunks[0];

		$page_variables = array(
			'tour' => $id,
			'chunks' => $chunks,
			'dates' => $dates,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.show', $data);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page_variables = array(
			'tour' => $id,
		);

		$data = array_merge($page_variables, $this->layout_variables);
		return View::make('tour.edit', $data);
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
			return Redirect::route('tour.show', array('id' => $id->tour_id))->with('message', 'Your changes were saved.');
		} else {
			return Redirect::route('tour.index')->with('error', 'Your changes were not saved.');
		}
	}


	public function delete($id) {

		$method_variables = array(
			'tour' => $id,
		);

		$data = array_merge($method_variables, $this->layout_variables);

		return View::make('tour.delete', $data);
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
		$tour_name = $id->tour_name;

		if ($confirm === true) {
			// Remove tour.
			$id->delete();
			return Redirect::route('tour.index')->with('message', $tour_name . ' was deleted.');
		} else {
			return Redirect::route('tour.show', array('id' => $id->tour_id))->with('error', $tour_name . ' was not deleted.');
		}
	}

}
