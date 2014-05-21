@extends('layout')

@section('content')
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key={$config.google_map_key}" type="text/javascript"></script>
<script src="/js/ddn_tour_map.js" type="text/javascript"></script>

<ul>
	@foreach($tours as $tour)
	<li><a href="/tour/{{ $tour->tour_id }}/">{{ $tour->tour_name }}</a></li>
	@endforeach
</ul>

<h2>{{ $tour->tour_name }}</h2>

<ul>
	@foreach ($tour->dates as $tour_date)
	<li>
		{{ $tour_date->date_tour_date_formatted }}: <a href="/tour/point/{{ $tour_date->date_id }}/" class="geo-point">{{ $tour_date->geocode->geocode_location }}</a>, {{ $tour_date->geocode->geocode_city }}@if (!empty($tour_date->geocode->geocode_state)), {{ $tour_date->geocode->geocode_state }}@endif, {{ $tour_date->geocode->country->country_name }}
	</li>
	@endforeach
</ul>

<script type="text/javascript">
	(function ($) {
		$('.geo-point').click(function () {
		});
	})(jQuery);
</script>


@stop