@extends('tour.date._form')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; {{ $date->tour->tour_name }}
 &raquo; {{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}
 &raquo; Edit
@stop

@section('section_head')
<h2>
	Tour History
	<small>{{ $date->tour->tour_name}}</small>
</h2>
@stop

@section('section_label')
<h3>
	Edit
	<small>{{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}</small>
</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">
	{{ Form::model( $date, array( 'route' => array('admin.tour-date.update', $date->date_id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put' ) ) }}
	@parent
	{{ Form::close() }}
</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

