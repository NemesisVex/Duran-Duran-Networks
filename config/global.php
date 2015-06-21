<?php
/**
 * Created by PhpStorm.
 * User: gregbueno
 * Date: 6/20/15
 * Time: 7:32 PM
 */

define('VIGILANTMEDIA_CDN_BASE_URI', env('VIGILANTMEDIA_CDN_BASE_URI', '//cdn.vigilantmedia.com'));

return [
	'url_base' => array(
		'to_archive' => env('TO_MUSICWHORE', '//archive.musicwhore.org'),
		'to_musicwhore' => env('TO_MUSICWHORE', '//musicwhore.org'),
		'to_filmwhore' => env('TO_MUSICWHORE', '//filmwhore.org'),
		'to_tvwhore' => env('TO_MUSICWHORE', '//tvwhore.org'),
		'to_vigilantmedia' => env('TO_VIGILANTMEDIA', '//vigilantmedia.com'),
	),
];
