@extends('layout')

@section('content')
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key={{ $google_map_key }}" type="text/javascript"></script>
<script src="/js/ddn_tour_map.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
		var center_point = new GLatLng( {{ $tour->dates->first()->geocode->geocode_lat }}, {{ $tour->dates->first()->geocode->geocode_lon }});
		set_center(center_point);
	});
</script>

@if (!empty($tours))
<div id="nav-tour" class="row">
	<nav class="col-md-12">
		<ul id="mycarousel" class="jcarousel-skin-ddn">
			@foreach ($tours as $one_tour)
			<li> <a href="/tour/{{ $one_tour->tour_id }}/">{{ $one_tour->tour_name }}</a><br/>({{ date('M Y', strtotime($one_tour->dates->min('date_tour_date'))) }}-{{ date('M Y', strtotime($one_tour->dates->max('date_tour_date'))) }})</li>
			@endforeach
		</ul>
	</nav>
</div>
@endif

<div class="row">
	<div class="col-md-6">

		@if (!empty($tour))
		<h2>{{ $tour->tour_name }}</h2>

		<div id="tour_dates">
			<ul class="list-unstyled">
				@foreach ($tour->dates as $tour_date)
				<li>
					<script type="text/javascript">
					$(document).ready(function () {
						point = new GLatLng({{ $tour_date->geocode->geocode_lat }}, {{ $tour_date->geocode->geocode_lon }});
						create_marker(point, {{ $tour_date->date_id }}, $('#point_{{ $tour_date->date_id }}')[0]);
					});
					</script>
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
		<div id="map_canvas"></div>
		
		<h3>Notes</h3>

		<ul>
			<li> In the case of venues no longer available, only the city, state and country are plotted on the map if an address could not be located.</li>
			<li> Tour information provided by the <a href="http://duranduran.wikia.com/wiki/Category:Timeline">Duran Duran Timeline</a>.</li>
		</ul>

	</div>	
</div>
@stop