@extends('layout')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>Tours</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">

	<ul class="list-inline">
		<li><a href="{{ route( 'admin.tour.create' ) }}" class="button"><span class="glyphicon glyphicon-plus"></span> Add a tour</a></li>
	</ul>

	@if (count($tours) > 0)
	<ul class="list-unstyled">
		@foreach ($tours as $tour)
		<li>
			<ul class="list-inline">
				<li><a href="{{ route( 'admin.tour.edit', array( 'id' => $tour->tour_id ) ) }}"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">Edit</span></a></li>
				<li><a href="{{ route( 'admin.tour.delete', array( 'id' => $tour->tour_id ) ) }}"><span class="glyphicon glyphicon-remove"></span> <span class="sr-only">Remove</span></a></li>
				<li><a href="{{ route( 'admin.tour.show', array( 'id' => $tour->tour_id ) ) }}">{{ $tour->tour_name }}</a></li>
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

