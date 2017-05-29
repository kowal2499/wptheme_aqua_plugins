<?php
	class Aqua_Weather_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 
			'aqua_weather_widget', 
			__('AQUA weather', 'aw_domain'), 
			array('description' => __('Simple weather widget', 'aw_domain')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		// $img_src = esc_attr($instance['uploaded_image']);
		// $desc = $instance['description'];
		// $title = esc_attr($instance['title']);
		echo $args['before_widget'];
		// $this->getFrontend($img_src, $title, $desc);
		echo $args['after_widget'];

	}


	public function form( $instance ) {
		// outputs the options form on admin
		$this->getForm($instance);
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved

		// $instance = array(
		// 	'uploaded_image' => (!empty($new_instance['uploaded_image'])) ? strip_tags($new_instance['uploaded_image']) : '',
		// 	'title' => (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '',
		// 	'description' => (!empty($new_instance['description'])) ? $new_instance['description'] : ''
		// 	);
		return $instance;
	}

	public function getForm( $instance ) {
		// gets & dispays backend form
	}

	function getFrontend($img_src, $title, $desc) {
		
			// {
 //    "id": 3082745,
 //    "name": "Ustronie Morskie",
 //    "country": "PL",
 //    "coord": {
 //      "lon": 15.75568,
 //      "lat": 54.215172
 //    }
 //  },


	function getForecast($data, $date='') {
		$temp = "";
		$opis = "";
		$icon = "";

		if (empty($date)) {
			$temp = $data['list'][0]['main']['temp'];
			$opis = $data['list'][0]['weather'][0]['description'];
			$icon = $data['list'][0]['weather'][0]['icon'];
		} else {

			foreach ($data['list'] as $sample) {
				if ($sample["dt_txt"] == $date) {
					$temp = $sample['main']['temp'];
					$opis = $sample['weather'][0]['description'];
					$icon = $sample['weather'][0]['icon'];

					break;
				}
			}
		}

		return array("temperature" => $temp,
			"description" => $opis,
			"icon" => $icon);
	}

  $json = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id=3082745&APPID=5b984a269b782d52fd45d53277fc587c&units=metric&lang=pl');
  
 	$data = json_decode($json, true);

 	$tomorrow = date('Y-m-d H:i:s', mktime(12, 0, 0, date('m'), date('d')+1, date('Y')));
 	$datomorrow = date('Y-m-d H:i:s', mktime(12, 0, 0, date('m'), date('d')+2, date('Y')));

 	$forecast1 = getForecast($data);
 	$forecast2 = getForecast($data, $tomorrow);
 	$forecast3 = getForecast($data, $datomorrow);

 	?>
	
	<div class="weather-wrapper">
		<div class="forecast-now">
			<div class="forecast-day">POGODA TERAZ</div>
			<div class="forecast-icon"><img src="ikony/<?= $forecast1["icon"]; ?>.png"></div>
			<div class="forecast-temp"><?= ceil($forecast1["temperature"]); ?> &#8451;</div>
		</div>
		
		<div class="forecast">
			<div class="forecast-day">JUTRO</div>
			<div class="forecast-icon"><img src="ikony/<?= $forecast2["icon"]; ?>.png"></div>
			<div class="forecast-temp"><?= ceil($forecast2["temperature"]); ?> &#8451;</div>
		</div>

		<div class="forecast">
			<div class="forecast-day">POJUTRZE</div>
			<div class="forecast-icon"><img src="ikony/<?= $forecast3["icon"]; ?>.png"></div>
			<div class="forecast-temp"><?= ceil($forecast3["temperature"]); ?> &#8451;</div>
		</div>
	</div>

	<br><br>

 	<?php

	}

}