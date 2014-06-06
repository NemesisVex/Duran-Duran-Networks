@extends('tour._form')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; Add a tour
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>Add a tour</h3>
@stop

@section('section_sublabel')
@stop

@section('content')
<div class="col-md-8">
	{{ Form::model( $tour, array( 'route' => 'admin.tour.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post' ) ) }}
	@parent
	{{ Form::close() }}
</div>
@stop

@section('sidebar')
<div class="col-md-4">

</div>
@stop

