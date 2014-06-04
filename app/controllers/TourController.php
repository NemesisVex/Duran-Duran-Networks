<?php

class TourController extends \BaseController {

	private $layout_variables = array();
	private $google_map_key = 'ABQIAAAAenOcDWY3GB5qVSPOQiBt_xRPto5laNqVxgk7rNaULMnh65830hSw2SmWLSmHjjpbku0UcRlTK_fhGQ';

	public function __construct() {
		global $config_url_base;

		$this->layout_variables = array(
			'copyright_year' => date('Y'),
			'config_url_base' => $config_url_base,
		);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

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


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
