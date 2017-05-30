<?php
/*
	Plugin Name: AQUA weather
	Description: Simple weather widget
	Author: Roman Kowalski
	Version: 0.1
*/

// exit if accessed directly

	if (!defined('ABSPATH')) {
		exit;
	}

// load script
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-weather-scripts.php');

// load content
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-weather-content.php');