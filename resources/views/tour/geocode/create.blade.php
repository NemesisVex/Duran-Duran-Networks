@extends('tour.geocode._form')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; Add a location
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>Add a location</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">
	{!! Form::model( $geocode, array( 'route' => 'admin.tour-geocode.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post' ) ) !!}
	@parent
	{!! Form::close() !!}
</div>
@stop

@section('sidebar')
<div class="col-md-4">
@parent
</div>
@stop

