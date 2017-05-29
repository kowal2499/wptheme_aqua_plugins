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

// load class
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-weather-class.php');

	// register widget

	function register_aqua_weather() {
		register_widget('Aqua_Weather_Widget');
	}

	add_action('widgets_init', 'register_aqua_weather');
