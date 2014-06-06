<h4>{{ $tour_date->tour->tour_name }}</h4>

<ul class="list-unstyled">
	<li><strong>{{ date('M d, Y', strtotime($tour_date->date_tour_date)) }}</strong></li>
	<li>{{ $tour_date->geocode->geocode_location }}</li>
	<li>{{ $tour_date->geocode->geocode_city}}@if (!empty($tour_date->geocode->geocode_state)), {{ $tour_date->geocode->geocode_state }}@endif, {{ $tour_date->geocode->country->country_name }}</li>
</ul>
