<?php
/*
	Plugin Name: AQUA zalety
	Description: Zalety apartamentu: tytuł, opis i obrazek
	Author: Roman Kowalski
	Version: 0.1
*/

// exit if accessed directly

	if (!defined('ABSPATH')) {
		exit;
	}


// load script
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-zalety-scripts.php');

// load class
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-zalety-class.php');

	// register widget

	function register_Aqua_Zalety_Widget() {
		register_widget('Aqua_Zalety_Widget');
	}

	add_action('widgets_init', 'register_Aqua_Zalety_Widget');
