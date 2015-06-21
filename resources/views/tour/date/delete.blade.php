@extends('layout')

@section('page_title')
 &raquo; Tour History Map
 &raquo; {{ $date->tour->tour_name }}
 &raquo; {{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}
 &raquo; Delete
@stop

@section('section_head')
<hgroup>
	<h2>
		Tours
		<small>{{ $date->tour->tour_name }}</small>
	</h2>
</hgroup>
@stop

@section('section_label')
<h3>
	Delete
	<small>{{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}</small>
</h3>
@stop

@section('content')
<div class="col-md-8">
	<p>
		You are about to delete <strong><em>{{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}</em></strong> from the database.
	</p>

	<p>
		Are you sure you want to do this?
	</p>

	{!! Form::model( $date, array( 'route' => array( 'admin.tour-date.destroy', $date->date_id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'delete' ) ) !!}

	<div class="form-group">
		<div class="col-sm-12">
			<div class="radio">
				<label>
					{!! Form::radio('confirm', '1') !!} Yes, I want to delete {{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}.
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('confirm', '0') !!} No, I don't want to delete {{ $date->geocode->geocode_location }}: {{ date('Y-m-d', strtotime( $date->date_tour_date )) }}.
				</label>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-12">
			{!! Form::submit('Confirm', array( 'class' => 'btn btn-danger' )) !!}
		</div>
	</div>


	{!! Form::close() !!}
</div>


@stop
