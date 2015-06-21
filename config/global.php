<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 6/20/15
 * Time: 7:32 PM
 */

define('VIGILANTMEDIA_CDN_BASE_URI', env('VIGILANTMEDIA_CDN_BASE_URI', '//cdn.vigilantmedia.com'));
define('GOOGLE_MAPS_API_V3_CLIENT_KEY', 'AIzaSyBS8brmPao9sFXVfl83T0MbLtwvNBPyk_k');
define('GOOGLE_MAPS_API_V3_SERVER_KEY', 'AIzaSyDgVUk3iiVkDq8rDPVbmWeeSFbVOl493Do');
define('GOOGLE_MAPS_API_V2_KEY', 'ABQIAAAAenOcDWY3GB5qVSPOQiBt_xRPto5laNqVxgk7rNaULMnh65830hSw2SmWLSmHjjpbku0UcRlTK_fhGQ');

return [
	'url_base' => array(
		'to_archive' => env('TO_MUSICWHORE', '//archive.musicwhore.org'),
		'to_musicwhore' => env('TO_MUSICWHORE', '//musicwhore.org'),
		'to_filmwhore' => env('TO_MUSICWHORE', '//filmwhore.org'),
		'to_tvwhore' => env('TO_MUSICWHORE', '//tvwhore.org'),
		'to_vigilantmedia' => env('TO_VIGILANTMEDIA', '//vigilantmedia.com'),
	),
];
