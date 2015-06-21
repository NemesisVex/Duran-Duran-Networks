@extends('layout')

@section('page_title')
&raquo; Tour History Map
&raquo; {{ $tour->tour_name }}
&raquo; Delete
@stop

@section('section_header')
<hgroup>
	<h2>
		Tours
		<small>{{ $tour->tour_name }}</small>
	</h2>
</hgroup>
@stop

@section('section_label')
<h3>Delete</h3>
@stop

@section('content')
<div class="col-md-8">
	<p>
		You are about to delete <strong><em>{{ $tour->tour_name }}</em></strong> from the database.
	</p>

	<p>
		Are you sure you want to do this?
	</p>

	{!! Form::model( $tour, array( 'route' => array( 'admin.tour.destroy', $tour->tour_id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'delete' ) ) !!}

	<div class="form-group">
		<div class="col-sm-12">
			<div class="radio">
				<label>
					{!! Form::radio('confirm', '1') }} Yes, I want to delete {{ $tour->tour_name !!}.
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('confirm', '0') }} No, I don't want to delete {{ $tour->tour_name !!}.
				</label>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			{!! Form::submit('Confirm', array( 'class' => 'button' )) !!}
		</div>
	</div>


	{!! Form::close() !!}
</div>


@stop
