@extends('layout')

@section('content')

<div class="form-group">
	{!! Form::label( 'tour_name', 'Tour name:', array( 'class' => 'col-sm-2' ) ) !!}
	<div class="col-sm-10">
		{!! Form::text( 'tour_name', $tour->tour_name, array( 'class' => 'form-control' ) ) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2">
		{!! Form::submit( 'Save', array( 'class' => 'btn btn-primary' ) ) !!}
	</div>
</div>

@stop