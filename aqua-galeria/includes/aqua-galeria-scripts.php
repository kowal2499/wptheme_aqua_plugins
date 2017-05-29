<?php
function aqua_galeria_admin_enq() {
	// wp_enqueue_script('aqua-galeria-admin-js', plugins_url().'/aqua-galeria/js/admin.js', array('jquery'), '1.0', true);
	// wp_enqueue_media();
}

function aqua_galeria_enq() {
    // wp_register_script('aqua_lightbox', plugins_url() . '/aqua-galeria/js/simple-lightbox.min.js', array(), false, true);
    // wp_enqueue_script('aqua_lightbox');
}

add_action('admin_enqueue_scripts', 'aqua_galeria_admin_enq');
// add_action('wp_enqueue_scripts', 'aqua_galeria_enq');
