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

<script src="https://maps.googleapis.com/maps/api/js?key={{ GOOGLE_BROWSER_APP_KEY }}" type="text/javascript"></script>
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
			$('body').css('cursor', 'progress');
			$.post(url, data, function(response) {
				var map_data = $.parseJSON(response);
				var lng = map_data.results[0].geometry.location.lng;
				var lat = map_data.results[0].geometry.location.lat;

				$('#geocode_lon').val(lng);
				$('#geocode_lat').val(lat);

				var latLng = new google.maps.LatLng(lat, lng);
				var mapOptions = {
					center: latLng,
					zoom: 18
				};
				var map = new google.maps.Map(document.getElementById("map-preview"),
					mapOptions);

				var marker = new google.maps.Marker({
					position: latLng,
					map: map,
					title: $('#geocode_location').val()
				});
				$('body').css('cursor', 'default');
			});
		});
	})(jQuery);
</script>

@stop

@section('sidebar')

<h4>Preview</h4>

<div id="map-preview" style="width: 100%; height: 300px;">
	<p>Look up coordinates to see a preview.</p>
</div>

@stop