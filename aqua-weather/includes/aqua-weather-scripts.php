<?php

function aqua_weather_enq() {
		wp_enqueue_style('aw-style', plugins_url() . '/aqua-weather/css/style.css');
}


// function aqua_weather_admin_enq() {}

add_action('wp_enqueue_scripts', 'aqua_weather_enq');
// add_action('admin_enqueue_scripts', 'aqua_weather_admin_enq');
