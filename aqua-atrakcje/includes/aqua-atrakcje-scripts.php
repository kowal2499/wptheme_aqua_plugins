<?php
	function aqua_atrakcje_admin_enq() {
	wp_enqueue_script('aqua-atrakcje-admin-js', plugins_url().'/aqua-atrakcje/js/admin.js', array('jquery'), '1.0', true);
  wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'aqua_atrakcje_admin_enq');