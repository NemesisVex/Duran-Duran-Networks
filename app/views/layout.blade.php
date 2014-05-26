<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Duran Duran Networks
			@if (!empty($page_title))
			: {{ $page_title }}
			@endif
		</title>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/css/jquery.jcarousel.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="/css/typography.css" type="text/css" media="all" />
		<link rel="stylesheet" href="/css/layout.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="/css/jScrollPane.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="/css/skins/ddn/skin.css" type="text/css" media="screen, projection" />
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jquery.jcarousel.pack.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jquery.em.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jScrollPane.js"></script>
	</head>
	<body>

		<div id="container" class="container">
			
			<div class="row">
				<div id="masthead" class="col-md-12">
					<h1 id="title"><a href="/">Duran Duran Networks</a></h1>
					<h2>Duran Duran on the Web 2.0</h2>
				</div>
			</div>
			
			<div id="content" class="row">

				@if (!empty($section_head))
				<h1 class="section-head">{$section_head}</h1>
				
					@if (!empty($section_label))
				<h2 class="section-label">{$section_label}</h2>
					@endif
				
				@endif

				@if (!empty($content_side_template))
				<div id="frame-1" class="col-md-8">
				@else
				<div id="frame-1" class="col-md-12">
				@endif
				
				@yield('content')

				@if (!empty($content_side_template))
				</div>

				<div id="frame-2" class="col-md-4">
					@yield('sidebar')
				</div>
				@endif

			</div>
		</div>

		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
			try {
				var pageTracker = _gat._getTracker("UA-7828220-5");
				pageTracker._trackPageview();
			} catch (err) {
			}
		</script>

	</body>
</html>
