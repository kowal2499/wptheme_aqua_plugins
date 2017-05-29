<?php
/*
	Plugin Name: AQUA opis
	Description: Opisy apartamentu z obrazkiem
	Author: Roman Kowalski
	Version: 0.1
*/

// exit if accessed directly

	if (!defined('ABSPATH')) {
		exit;
	}


// load script
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-opis-scripts.php');

// load class
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-opis-class.php');

	// register widget

	function register_me() {
		register_widget('Aqua_Opis_Widget');
	}

	add_action('widgets_init', 'register_me');
