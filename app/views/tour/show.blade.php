@extends('layout')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; {{ $tour->tour_name }}
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>
	Tours
	<small>{{ $tour->tour_name }}</small>
</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">

	<ul class="list-inline">
		<li><a href="{{ route( 'admin.tour.edit', array( 'id' => $tour->tour_id ) ) }}" class="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
		<li><a href="{{ route( 'admin.tour.delete', array( 'id' => $tour->tour_id ) ) }}" class="button"><span class="glyphicon glyphicon-remove"></span> Delete</a></li>
	</ul>

	<p>
		<label>Tour name:</label> {{ $tour->tour_name }}
	</p>

	<h3>Dates</h3>

	<ul class="list-inline">
		<li><a href="{{ route( 'admin.tour-date.create' ) }}"><span class="glyphicon glyphicon-plus"></span> Add a date</a></li>
	</ul>

	@if (count($tour->dates) > 0)
	<ul class="list-unstyled">
		@foreach ($tour->dates as $date)
		<li>
			<ul class="list-inline">
				<li><a href="{{ route( 'admin.tour-date.edit', array( 'id' => $date->date_id ) ) }}"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">Edit</span></a></li>
				<li><a href="{{ route( 'admin.tour-date.delete', array( 'id' => $date->date_id ) ) }}"><span class="glyphicon glyphicon-remove"></span> <span class="sr-only">Delete</span></a></li>
				<li><a href="{{ route( 'admin.tour-date.show', array( 'id' => $date->date_id ) ) }}">{{ date('Y-m-d', strtotime($date->date_tour_date)) }}: {{ $date->geocode->geocode_location }}</a></li>
			</ul>
		</li>
		@endforeach
	</ul>
	@else
	<p>
		This tour has no dates yet listed.
	</p>
	@endif

</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

