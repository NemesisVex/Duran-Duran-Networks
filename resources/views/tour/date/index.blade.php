@extends('layout')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; Dates
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>Tour Dates</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">

	<ul class="list-inline">
		<li><a href="{{ route( 'admin.tour-date.create' ) }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add a date</a></li>
	</ul>

	@if (count($dates) > 0)
	<ul class="list-unstyled">
		@foreach ($dates as $date)
		<li>
			<ul class="list-inline">
				<li><a href="{{ route( 'admin.tour-date.edit', array( 'id' => $date->date_id ) ) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">Edit</span></a></li>
				<li><a href="{{ route( 'admin.tour-date.delete', array( 'id' => $date->date_id ) ) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span> <span class="sr-only">Remove</span></a></li>
				<li><a href="{{ route( 'admin.tour-date.show', array( 'id' => $date->date_id ) ) }}">{{ date('Y-m-d', strtotime($date->date_tour_date)) }}: {{ $date->geocode->geocode_location }}</a></li>
			</ul>
		</li>
		@endforeach
	</ul>
	@endif
</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

