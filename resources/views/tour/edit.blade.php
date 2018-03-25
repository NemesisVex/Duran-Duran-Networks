@extends('tour._form')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; {{ $tour->tour_name }}
 &raquo; Edit
@stop

@section('section_head')
<h2>
	Tour History
	<small>{{ $tour->tour_name}}</small>
</h2>
@stop

@section('section_label')
<h3>Edit</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">
	{!! Form::model( $tour, array( 'route' => array('tour.update', $tour->tour_id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put' ) ) !!}
	@parent
	{!! Form::close() !!}
</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

