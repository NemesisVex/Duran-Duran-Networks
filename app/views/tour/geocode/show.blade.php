@extends('layout')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; {{ $geocode->geocode_location }}
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>
	Tours
	<small>{{ $geocode->geocode_location }}</small>
</h3>
@stop

@section('section_sublabel')
<h3>
	Location
</h3>
@stop

@section('content')
<div class="col-md-8">

	<ul class="list-inline">
		<li><a href="{{ route( 'admin.tour-geocode.edit', array( 'id' => $geocode->geocode_id ) ) }}" class="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
		<li><a href="{{ route( 'admin.tour-geocode.delete', array( 'id' => $geocode->geocode_id ) ) }}" class="button"><span class="glyphicon glyphicon-remove"></span> Delete</a></li>
	</ul>

	<p>
		<label>Location:</label> {{ $geocode->geocode_location }}
	</p>

	<p>
		<label>Address:</label> {{ $geocode->geocode_address }}
	</p>

	<p>
		<label>City:</label> {{ $geocode->geocode_city }}
	</p>

	<p>
		<label>State:</label> {{ $geocode->geocode_state }}
	</p>

	<p>
		<label>Country:</label> {{ $geocode->country->country_name }}
	</p>

	<p>
		<label>Longitude:</label> {{ $geocode->geocode_lon }}
	</p>

	<p>
		<label>Latitude:</label> {{ $geocode->geocode_lat }}
	</p>

</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

