<?php
/*
Plugin Name: wpCompressor
Plugin URI: http://playground.ebiene.de/16/plugin-fuer-gzip-komprimierung-der-beitraege-in-wordpress-25/
Description: wpCompressor automatic compression assumes the data output and boosts the performance of the blog pages.
Author: Sergej M&uuml;ller
Version: 0.3
Author URI: http://www.wpSEO.org
*/


if (ob_get_length() === false && !ini_get("zlib.output_compression") && ini_get("output_handler") != "ob_gzhandler" && extension_loaded("zlib") && !headers_sent() && !is_admin() && stripos($_SERVER['REQUEST_URI'], 'wp-includes/js/tinymce') === false) {
	add_action(
		'init',
		create_function(
			'',
			'@ini_set("zlib.output_compression_level", 6); ob_start("ob_gzhandler");'
		)
	);
}
?>