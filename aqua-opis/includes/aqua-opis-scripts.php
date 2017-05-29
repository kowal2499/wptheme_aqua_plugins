<?php
	
function aqua_opis_enq() {
	// 	wp_enqueue_style('esl-style-css', plugins_url() . '/erla-social-links/css/style.css');
  // 	wp_enqueue_script('esl-main-js', plugins_url() . '/erla-social-links/js/main.js');
}


function aqua_opis_admin_enq() {
	wp_enqueue_script('aqua-opis-admin-js', plugins_url().'/aqua-opis/js/admin.js', array('jquery'), '1.0', true);
  wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'aqua_opis_admin_enq');
add_action('wp_enqueue_scripts', 'aqua_opis_enq');