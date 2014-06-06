@extends('tour.geocode._form')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; {{ $geocode->geocode_location }}
 &raquo; Edit
@stop

@section('section_head')
<h2>
	Tour History
	<small>{{ $geocode->geocode_location }}</small>
</h2>
@stop

@section('section_label')
<h3>Edit</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">
	{{ Form::model( $geocode, array( 'route' => array('admin.tour-geocode.update', $geocode->geocode_id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put' ) ) }}
	@parent
	{{ Form::close() }}
</div>
@stop

@section('sidebar')
<div class="col-md-4">
	@parent
</div>
@stop

