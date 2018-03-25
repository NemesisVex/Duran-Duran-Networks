<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 6/20/15
 * Time: 7:32 PM
 */

define('VIGILANTMEDIA_CDN_BASE_URI', env('VIGILANTMEDIA_CDN_BASE_URI', '//cdn.vigilantmedia.com'));
define('GOOGLE_MAPS_API_KEY', env('GOOGLE_MAPS_API_KEY'));

return [
	'url_base' => array(
		'to_archive' => env('TO_ARCHIVE', '//archive.musicwhore.org'),
		'to_musicwhore' => env('TO_MUSICWHORE', '//musicwhore.org'),
		'to_filmwhore' => env('TO_FILMWHORE', '//filmwhore.org'),
		'to_tvwhore' => env('TO_TVWHORE', '//tvwhore.org'),
		'to_vigilantmedia' => env('TO_VIGILANTMEDIA', '//vigilantmedia.com'),
	),
];
