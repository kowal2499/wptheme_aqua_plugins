<?php
/*
	Plugin Name: AQUA galeria
	Description: Galeria zdjęć z kategoriami
	Author: Roman Kowalski
	Version: 0.1
*/

// exit if accessed directly

	if (!defined('ABSPATH')) {
		exit;
	}


// load script
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-galeria-scripts.php');

// load class
	require_once(plugin_dir_path(__FILE__) . '/includes/aqua-galeria-class.php');

	// register widget

	function register_aqua_galeria() {
		register_widget('Aqua_Galeria_Script');
	}

	add_action('widgets_init', 'register_aqua_galeria');
