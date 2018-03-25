@extends('layout')

@section('page_title')
 &raquo; Tour History Map
 &raquo; {{ $geocode->geocode_location }}
 &raquo; Delete
@stop

@section('section_head')
<hgroup>
	<h2>
		Tours
		<small>{{ $geocode->geocode_location }}</small>
	</h2>
</hgroup>
@stop

@section('section_label')
<h3>Delete</h3>
@stop

@section('content')
<div class="col-md-8">
	<p>
		You are about to delete <strong><em>{{ $geocode->geocode_location }}</em></strong> from the database.
	</p>

	<p>
		Are you sure you want to do this?
	</p>

	{!! Form::model( $geocode, array( 'route' => array( 'tour-geocode.destroy', $geocode->geocode_id), 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'delete' ) ) !!}

	<div class="form-group">
		<div class="col-sm-12">
			<div class="radio">
				<label>
					{!! Form::radio('confirm', '1') !!} Yes, I want to delete {{ $geocode->geocode_location }}.
				</label>
			</div>
			<div class="radio">
				<label>
					{!! Form::radio('confirm', '0') !!} No, I don't want to delete {{ $geocode->geocode_location }}.
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
