@extends('layout')

@section('page_title')
 &raquo; Administration
 &raquo; Tours
 &raquo; {{ $geocode->geocode_location }}
@stop

@section('section_head')
<h2>Tour History</h2>
@stop

@section('section_label')
<h3>
	Tours
	<small>{{ $geocode->geocode_location }}</small>
</h3>
@stop

@section('section_sublabel')
<h3>
	Location
</h3>
@stop

@section('content')
<div class="col-md-8">

	<ul class="list-inline">
		<li><a href="{{ route( 'admin.tour-geocode.edit', array( 'id' => $geocode->geocode_id ) ) }}" class="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
		<li><a href="{{ route( 'admin.tour-geocode.delete', array( 'id' => $geocode->geocode_id ) ) }}" class="button"><span class="glyphicon glyphicon-remove"></span> Delete</a></li>
	</ul>

	<p>
		<label>Location:</label> {{ $geocode->geocode_location }}
	</p>

	<p>
		<label>Address:</label> {{ $geocode->geocode_address }}
	</p>

	<p>
		<label>City:</label> {{ $geocode->geocode_city }}
	</p>

	<p>
		<label>State:</label> {{ $geocode->geocode_state }}
	</p>

	<p>
		<label>Country:</label> {{ $geocode->country->country_name }}
	</p>

	<p>
		<label>Longitude:</label> {{ $geocode->geocode_lon }}
	</p>

	<p>
		<label>Latitude:</label> {{ $geocode->geocode_lat }}
	</p>

</div>
@stop

@section('sidebar')
<script src="https://maps.googleapis.com/maps/api/js?key={{ GOOGLE_MAPS_API_V3_CLIENT_KEY }}" type="text/javascript"></script>
<script type="text/javascript">
	(function ($) {
		$(function () {
			$('#geocode_country_id').chosen();

			var latLon = new google.maps.LatLng({{ !empty($geocode->geocode_lat) ? $geocode->geocode_lat : 0 }} , {{ !empty($geocode->geocode_lon) ? $geocode->geocode_lon : 0 }});
			var mapOptions = {
				center: latLon,
				zoom: 16
			};
			var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
			var marker = new google.maps.Marker({
				position: latLon,
				map: map,
				title: '{{ $geocode->geocode_location }}'
			});

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

					var newLatLon = new google.maps.LatLng(lat, lng);
					map.setCenter(newLatLon);
					marker.setPosition(newLatLon);
					marker.setTitle($('#geocode_location').val());

					$('body').css('cursor', 'default');
				});
			});
		});
	})(jQuery);
</script>

<div class="col-md-4">
	<h4>Preview</h4>

	<div id="map-canvas" style="width: 100%; height: 300px;">
		<p>Set coordinates to see a preview.</p>
	</div>

</div>
@stop

