@extends('layout')

@section('page_title')
 &raquo; Administration
@stop

@section('section_head')
<h2>Administration</h2>
@stop

@section('section_label')

@stop

@section('seciton_sublabel')
@stop

@section('content')

<div class="col-md-12">
	<ul>
		<li><a href="{{ route( 'admin.tour.index' ) }}">Tour map history</a></li>
		<li><a href="{{ route( 'admin.tour-geocode.index' ) }}">Tour map locations</a></li>
	</ul>
</div>

@stop

