@extends('layout')

@section('content')

<div class="form-group">
	{{ Form::label( 'geocode_location', 'Location:', array( 'class' => 'col-sm-2' ) ) }}
	<div class="col-sm-10">
		{{ Form::text( 'geocode_location', $geocode->geocode_location, array( 'class' => 'form-control' ) ) }}
	</div>
</div>

<div class="form-group">
	{{ Form::label( 'geocode_address', 'Address:', array( 'class' => 'col-sm-2' ) ) }}
	<div class="col-sm-10">
		{{ Form::text( 'geocode_address', $geocode->geocode_address, array( 'class' => 'form-control' ) ) }}
	</div>
</div>

<div class="form-group">
	{{ Form::label( 'geocode_city', 'City:', array( 'class' => 'col-sm-2' ) ) }}
	<div class="col-sm-10">
		{{ Form::text( 'geocode_city', $geocode->geocode_city, array( 'class' => 'form-control' ) ) }}
	</div>
</div>

<div class="form-group">
	{{ Form::label( 'geocode_state', 'State:', array( 'class' => 'col-sm-2' ) ) }}
	<div class="col-sm-10">
		{{ Form::text( 'geocode_state', $geocode->geocode_state, array( 'class' => 'form-control' ) ) }}
	</div>
</div>

<div class="form-group">
	{{ Form::label( 'geocode_country_id', 'Country:', array( 'class' => 'col-sm-2' ) ) }}
	<div class="col-sm-10">
		{{ Form::select( 'geocode_country_id', $countries, $geocode->geocode_country_id, array( 'class' => 'form-control' ) ) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2">
		{{ Form::button( 'Look up', array( 'class' => 'button', 'id' => 'lookup-location' ) ) }}
	</div>
</div>
<div class="form-group">
	{{ Form::label( 'geocode_lon', 'Longitude:', array( 'class' => 'col-sm-2' ) ) }}
	<div class="col-sm-10">
		{{ Form::text( 'geocode_lon', $geocode->geocode_lon, array( 'class' => 'form-control' ) ) }}
	</div>
</div>

<div class="form-group">
	{{ Form::label( 'geocode_lat', 'Latitude:', array( 'class' => 'col-sm-2' ) ) }}
	<div class="col-sm-10">
		{{ Form::text( 'geocode_lat', $geocode->geocode_lat, array( 'class' => 'form-control' ) ) }}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2">
		{{ Form::submit( 'Save', array( 'class' => 'button' ) ) }}
	</div>
</div>

<script type="text/javascript">
	(function ($) {
		$('#geocode_country_id').chosen();

		$('#lookup-location').click(function () {
			var url = '{{ route("admin.tour-geocode.lookup") }}';
			var data = {
				'geocode_location': $('#geocode_location').val(),
				'geocode_address': $('#geocode_address').val(),
				'geocode_city': $('#geocode_city').val(),
				'geocode_state': $('#geocode_state').val(),
				'geocode_country': $('#geocode_country_id').val(),
				'_token': $('input[name=_token]').val()
			};
			$.post(url, data, function(response) {
				alert(response);
			});
		});
	})(jQuery);
</script>

@stop