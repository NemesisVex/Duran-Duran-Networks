@extends('layout')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; {{ $date->tour->tour_name }}
 &raquo; {{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>
	Tours
	<small>{{ $date->tour->tour_name }}</small>
</h3>
@stop

@section('section_sublabel')
<h3>
	Date
	<small>{{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}</small>
</h3>
@stop

@section('content')
<div class="col-md-8">

	<ul class="list-inline">
		<li><a href="{{ route( 'admin.tour-date.edit', array( 'id' => $date->date_id ) ) }}" class="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
		<li><a href="{{ route( 'admin.tour-date.delete', array( 'id' => $date->date_id ) ) }}" class="button"><span class="glyphicon glyphicon-remove"></span> Delete</a></li>
	</ul>

	<p>
		<label>Tour name:</label> {{ $date->tour->tour_name }}
	</p>

	<p>
		<label>Location:</label> <a href="{{ route( 'admin.tour-geocode.show', array( $date->geocode->geocode_id ) ) }}">{{ $date->geocode->geocode_location }}</a>,
		@if (!empty($date->geocode->geocode_city))
		{{ $date->geocode->geocode_city }},
		@endif
		@if (!empty($date->geocode->geocode_state))
		{{ $date->geocode->geocode_state }},
		@endif
		@if (!empty($date->geocode->country->country_name))
		{{ $date->geocode->country->country_name }}
		@endif
	</p>

	<p>
		<label>Date:</label> {{ date('Y-m-d', strtotime($date->date_tour_date) )  }}
	</p>

</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

