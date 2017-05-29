<?php
	
function aqua_zalety_enq() {
}


function aqua_zalety_admin_enq() {
	wp_enqueue_script('aqua-zalety-admin-js', plugins_url().'/aqua-zalety/js/admin.js', array('jquery'), '1.0', true);
    wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'aqua_zalety_admin_enq');
add_action('wp_enqueue_scripts', 'aqua_zalety_enq');