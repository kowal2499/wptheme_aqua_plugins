<?php
	
function aqua_dla_dzieci_enq() {
}


function aqua_dla_dzieci_admin_enq() {
}

add_action('admin_enqueue_scripts', 'aqua_dla_dzieci_admin_enq');
add_action('wp_enqueue_scripts', 'aqua_dla_dzieci_enq');