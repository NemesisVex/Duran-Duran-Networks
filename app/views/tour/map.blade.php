@extends('layout')

@section('section_head')
<h2>Tour Map History</h2>
@stop

@section('content')
<div class="col-md-12">
	@if (!empty($tours))
	<div id="nav-tour" class="row">
		<nav class="col-md-12">
			<ul id="mycarousel" class="jcarousel-skin-ddn">
				@foreach ($tours as $one_tour)
				<li> <a href="{{ route('tour.map', array('id' => $one_tour->tour_id)) }}">{{ $one_tour->tour_name }}</a><br/>({{ date('M Y', strtotime($one_tour->dates->min('date_tour_date'))) }}-{{ date('M Y', strtotime($one_tour->dates->max('date_tour_date'))) }})</li>
				@endforeach
			</ul>
		</nav>
	</div>
	@endif

	<div class="row">
		<div class="col-md-6">

			@if (!empty($tour))
			<h3>{{ $tour->tour_name }}</h3>

			<div id="tour_dates">
				<ul class="list-unstyled">
					@foreach ($tour->dates as $tour_date)
					<li>
						<strong>{{ date('M d, Y', strtotime($tour_date->date_tour_date)) }}</strong>:
						<a href="javascript:" id="point_{{ $tour_date->date_id }}">{{ $tour_date->geocode->geocode_location }}</a>,
						{{ $tour_date->geocode->geocode_city }}@if (!empty($tour_date->geocode->geocode_state)), {{ $tour_date->geocode->geocode_state }}@endif, {{ $tour_date->geocode->country->country_name }}<br/>
					</li>
					@endforeach
				</ul>
			</div>

			@endif

		</div>
		<div class="col-md-6">
			<div id="map-canvas">Map goes here</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12">
			<h4>Notes</h4>

			<ul>
				<li> In the case of venues no longer available, only the city, state and country are plotted on the map if an address could not be located.</li>
				<li> Tour information provided by the <a href="http://duranduran.wikia.com/wiki/Category:Timeline">Duran Duran Timeline</a>.</li>
			</ul>
		</div>


	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key={{ GOOGLE_MAPS_API_V3_CLIENT_KEY }}" type="text/javascript"></script>
<script type="text/javascript">
	(function ($) {
		var dates = {{$dates}};

		var center = new google.maps.LatLng(dates[0].geocode.geocode_lat, dates[0].geocode.geocode_lon);
		var mapOptions = {
			zoom: 6,
			center: center
		}
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		for (var d = 0; d < dates.length; d++) {
			var point_cache = new google.maps.LatLng(dates[d].geocode.geocode_lat, dates[d].geocode.geocode_lon);
			var map_marker = new google.maps.Marker({
				position: point_cache,
				map: map
			});
			var infowindow = new google.maps.InfoWindow({
				content: dates[d].infowindow_content
			});
			google.maps.event.addListener(map_marker, 'click', function (event) {
				infowindow.setPosition(event.latLng);
				infowindow.open(map);
			});
		}

		$('#mycarousel').jcarousel({
			visible: 3
		});
	})(jQuery);
</script>

@stop