<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Duran Duran Networks
			@yield('page_title')
		</title>
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/css/jquery.jcarousel.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/css/chosen.min.css" type="text/css" />
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" />
		<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="/css/skins/ddn/skin.css" type="text/css" media="screen, projection" />
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jquery.jcarousel.pack.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jquery.em.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/jScrollPane.js"></script>
		<script type="text/javascript" src="{{ VIGILANTMEDIA_CDN_BASE_URI }}/web/js/chosen.jquery.min.js"></script>
	</head>
	<body>

		<div id="container" class="container">
			
			<div class="row">
				<div id="masthead" class="col-md-12">
					<h1 id="title"><a href="/">Duran Duran Networks</a></h1>
					<h2>Duran Duran on the Web 2.0</h2>
				</div>

				<div class="collapse navbar-collapse" id="main-nav">
					<ul class="nav navbar-nav">
						<li><a href="{{ route('admin.home') }}">Home</a></li>
						@if ( Auth::check() )
						<li><a href="{{ route('auth.logout') }}">Logout</a></li>
						@else
						<li><a href="{{ route('auth.login') }}">Login</a></li>
						@endif
					</ul>
				</div>
			</div>
			
			<div id="content" class="row">

				<div class="col-md-12">
					@yield('section_head')

					@yield('section_label')

					@yield('section_sublabel')

					@if ( Session::get('message') != '' )
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('message') }}
					</div>
					@endif

					@if ( Session::get('error') != '' )
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						{{ Session::get('error') }}
					</div>
					@endif

				</div>


				@yield('content')

				@yield('sidebar')
			</div>
		</div>

		<footer class="row">
			<div class="col-md-12">
			</div>
		</footer>

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
