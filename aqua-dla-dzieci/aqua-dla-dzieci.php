<?php
/*
	Plugin Name: AQUA dla dzieci
	Description: Udogodnienia dla najmłodszych
	Author: Roman Kowalski
	Version: 0.1
*/

// exit if accessed directly

	if (!defined('ABSPATH')) {
		exit;
	}


// load script
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-dla-dzieci-scripts.php');

// load class
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-dla-dzieci-class.php');

	// register widget

	function register_Aqua_Dla_Dzieci_Widget() {
		register_widget('Aqua_Dla_Dzieci_Widget');
	}

	add_action('widgets_init', 'register_Aqua_Dla_Dzieci_Widget');
