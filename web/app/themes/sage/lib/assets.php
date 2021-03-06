<?php

namespace Roots\Sage\Assets;

/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/dist/styles/main.css
 *
 * Enqueue scripts in the following order:
 * 1. /theme/dist/scripts/modernizr.js
 * 2. /theme/dist/scripts/main.js
 */

class JsonManifest {
	private $manifest;

	public function __construct($manifest_path) {
		if (file_exists($manifest_path)) {
			$this->manifest = json_decode(file_get_contents($manifest_path), true);
		} else {
			$this->manifest = [];
		}
	}

	public function get() {
		return $this->manifest;
	}

	public function getPath($key = '', $default = null) {
		$collection = $this->manifest;
		if (is_null($key)) {
			return $collection;
		}
		if (isset($collection[$key])) {
			return $collection[$key];
		}
		foreach (explode('.', $key) as $segment) {
			if (!isset($collection[$segment])) {
				return $default;
			} else {
				$collection = $collection[$segment];
			}
		}
		return $collection;
	}
}

function asset_path($filename) {
	$dist_path = get_template_directory_uri() . DIST_DIR;
	$directory = dirname($filename) . '/';
	$file = basename($filename);
	static $manifest;

	if (empty($manifest)) {
		$manifest_path = get_template_directory() . DIST_DIR . 'assets.json';
		$manifest = new JsonManifest($manifest_path);
	}

	if (array_key_exists($file, $manifest->get())) {
		return $dist_path . $directory . $manifest->get()[$file];
	} else {
		return $dist_path . $directory . $file;
	}
}

function assets() {
	wp_enqueue_style('sage_css', asset_path('styles/main.css'), false, null);

	if (is_single() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Angular specific dependencies
	// wp_localize_script('sage_js', 'sageLocalized', ['partials' => trailingslashit( get_template_directory_uri() . '/templates/')]);
	// wp_enqueue_script('angular', asset_path('scripts/angular.js'), [], null, true);
	// wp_enqueue_script('angular_route', asset_path('scripts/angular-route.js'), [], null, true);
	// wp_enqueue_script('angular_sanitize', asset_path('scripts/angular-sanitize.js'), [], null, true);

	wp_enqueue_script('modernizr', asset_path('scripts/modernizr.js'), [], null, true);
	wp_enqueue_script('rgbcolor_js', asset_path('scripts/rgbcolor.js'), [], null, true);
	wp_enqueue_script('canvg_js', asset_path('scripts/canvg.js'), [], null, true);
	wp_enqueue_script('d3_js', asset_path('scripts/d3.js'), [], null, true);
	wp_enqueue_script('trigons_js', asset_path('scripts/trigons.js'), ['rgbcolor_js', 'canvg_js', 'd3_js'], null, true);
	wp_enqueue_script('ripples_js', asset_path('scripts/ripples.js'), [], null, true);
	wp_enqueue_script('material_js', asset_path('scripts/material.js'), [], null, true);
	wp_enqueue_script('sage_js', asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
