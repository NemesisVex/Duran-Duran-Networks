<h4>{{ $tour_date->tour->tour_name }}</h4>

<p>
<strong>{{ date('M d, Y', strtotime($tour_date->date_tour_date)) }}</strong><br/>
{{ $tour_date->geocode->geocode_location }}<br/>
{{ $tour_date->geocode->geocode_city}}@if (!empty($tour_date->geocode->geocode_state)), {{ $tour_date->geocode->geocode_state }}@endif, {{ $tour_date->geocode->country->country_name }}
</p>
