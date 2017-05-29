<?php
/*
	Plugin Name: AQUA atrakcje
	Description: Okoliczne atrakcje
	Author: Roman Kowalski
	Version: 0.1
*/

// exit if accessed directly

	if (!defined('ABSPATH')) {
		exit;
	}


// load script
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-atrakcje-scripts.php');

// load class
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-atrakcje-class.php');

	// register widget

	function register_aqua_atrkacje() {
		register_widget('Aqua_Atrakcje_Widget');
	}

	add_action('widgets_init', 'register_aqua_atrkacje');
