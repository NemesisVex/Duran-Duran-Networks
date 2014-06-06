@extends('layout')

@section('page_title')
 &raquo; Tour Map History
 &raquo; {{ $tour->tour_name }}
@stop

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
						<a href="/tour-date/{{$tour_date->date_id}}" class="tour-date-location" id="point_{{ $tour_date->date_id }}">{{ $tour_date->geocode->geocode_location }}</a>,
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
		// Set up our data.
		var dates = {{$dates}};

		// Center the map to the first date of the tour.
		var center = new google.maps.LatLng(dates[0].geocode_lat, dates[0].geocode_lon);
		var mapOptions = {
			zoom: 6,
			center: center
		}

		// Render the map.
		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		// Create a window to be shared between all markers.
		var infowindow = new google.maps.InfoWindow();

		// Create the markers.
		var map_marker, point;
		for (var d = 0; d < dates.length; d++) {
			// Get a point.
			point = new google.maps.LatLng(dates[d].geocode_lat, dates[d].geocode_lon);

			// Put the marker on the map.
			map_marker = new google.maps.Marker({
				position: point,
				map: map
			});

			// Cache the marker into our data. This becomes an index on which we query later.
			dates[d].geocode_point = point;
			dates[d].map_marker = map_marker;

			// Add a click event on the marker to open the window.
			google.maps.event.addListener(map_marker, 'click', function (event) {

				// Match the marker with the one indexed in our data.
				var _date;
				for (var i in dates) {
					if (dates[i].geocode_point == event.latLng) {
						_date = dates[i];
						break;
					}
				}

				// Make a request for the tour date info.
				var url = '/tour/marker/' + _date.date_id;

				$.post(url, null, function (response) {
					// Display the tour date info in the window.
					infowindow.setContent(response);
					infowindow.open(map, _date.map_marker);
				});
			});
		}

		// Let's make our tour dates interact with our map.
		$('.tour-date-location').click(function () {
			// Query our data with the ID listed in our URL.
			var _date, id = this.pathname.match(/\/tour-date\/([0-9]+)/)[1];
			for (var i in dates) {
				if (dates[i].date_id == id) {
					_date = dates[i];
					break;
				}
			}

			// Make a request for the tour date info.
			var url = '/tour/marker/' + _date.date_id;

			$.post(url, null, function (response) {
				// Display the tour date info in the window.
				infowindow.setContent(response);
				infowindow.open(map, _date.map_marker);
			});

			// This path isn't mapped, so don't let it go anywhere!
			return false;
		});

		$('#mycarousel').jcarousel({
			visible: 3
		});
	})(jQuery);
</script>

@stop