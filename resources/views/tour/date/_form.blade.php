@extends('layout')

@section('content')

<div class="form-group">
	{!! Form::label( 'date_tour_id', 'Tour:', array( 'class' => 'col-sm-2' ) ) !!}
	<div class="col-sm-10">
		{!! Form::select( 'date_tour_id', $tours, $date->date_tour_id, array( 'class' => 'form-control' ) ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label( 'date_geocode_id', 'Location:', array( 'class' => 'col-sm-2' ) ) !!}
	<div class="col-sm-10">
		{!! Form::select( 'date_geocode_id', $geocodes, $date->date_geocode_id, array( 'class' => 'form-control' ) ) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label( 'date_tour_date', 'Date:', array( 'class' => 'col-sm-2' ) ) !!}
	<div class="col-sm-10">
		{!! Form::text( 'date_tour_date', date('Y-m-d', strtotime($date->date_tour_date) ), array( 'class' => 'form-control' ) ) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2">
		{!! Form::submit( 'Save', array( 'class' => 'btn btn-primary' ) ) !!}
	</div>
</div>

<script type="text/javascript">
	(function ($) {
		$('#date_tour_id').chosen();
		$('#date_geocode_id').chosen();

		$('#date_tour_date').datepicker({
			dateFormat: 'yy-mm-dd'
		});
	})(jQuery);
</script>

@stop