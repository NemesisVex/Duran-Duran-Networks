@extends('layout')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; Geocodes
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>Geocodes</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">

	<ul class="list-inline">
		<li><a href="{{ route( 'tour-geocode.create' ) }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add a location</a></li>
	</ul>

	@if (count($geocodes) > 0)
	<ul class="list-unstyled">
		@foreach ($geocodes as $geocode)
		<li>
			<ul class="list-inline">
				<li><a href="{{ route( 'tour-geocode.edit', array( 'id' => $geocode->geocode_id ) ) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> <span class="sr-only">Edit</span></a></li>
				<li><a href="{{ route( 'tour-geocode.delete', array( 'id' => $geocode->geocode_id ) ) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-remove"></span> <span class="sr-only">Remove</span></a></li>
				<li>
					<a href="{{ route( 'tour-geocode.show', array( 'id' => $geocode->geocode_id ) ) }}">{{ $geocode->geocode_location }}</a>,
					@if (!empty( $geocode->geocode_city ))
					{{ $geocode->geocode_city }},
					@endif
					@if (!empty( $geocode->geocode_state ))
					{{ $geocode->geocode_state }},
					@endif
					@if (!empty( $geocode->country->country_name ))
					{{ $geocode->country->country_name }}
					@endif
				</li>
			</ul>
		</li>
		@endforeach
	</ul>
	@endif

    {!! $geocodes->render() !!}
</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

