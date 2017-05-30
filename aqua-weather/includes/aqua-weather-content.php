<?php

 // {
 //    "id": 3082745,
 //    "name": "Ustronie Morskie",
 //    "country": "PL",
 //    "coord": {
 //      "lon": 15.75568,
 //      "lat": 54.215172
 //    }
 //  },

function aw_content() {

	function getForecast($measurements, $date='') {
		$temp = "";
		$opis = "";
		$icon = "";

		if (empty($date)) {
			$temp = $measurements['list'][0]['main']['temp'];
			$opis = $measurements['list'][0]['weather'][0]['description'];
			$icon = $measurements['list'][0]['weather'][0]['icon'];
		} else {

			foreach ($measurements['list'] as $sample) {
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
 	$after_tomorrow = date('Y-m-d H:i:s', mktime(12, 0, 0, date('m'), date('d')+2, date('Y')));

 	$forecast1 = getForecast($data);
 	$forecast2 = getForecast($data, $tomorrow);
 	$forecast3 = getForecast($data, $after_tomorrow);

 	?>
	
	<div class="weather-wrapper">
		<div class="forecast-now">
			<div class="forecast-day">POGODA TERAZ</div>
			<div class="forecast-icon"><img src="<?= plugins_url() . '/aqua-weather/ikony/' . $forecast1["icon"]. '.png'; ?>"></div>
			<div class="forecast-temp"><?= ceil($forecast1["temperature"]); ?> &deg;C</div>
		</div>
		
		<div class="forecast">
			<div class="forecast-day">JUTRO</div>
			<div class="forecast-icon"><img src="<?= plugins_url() . '/aqua-weather/ikony/' . $forecast2["icon"]. '.png'; ?>"></div>
			<div class="forecast-temp"><?= ceil($forecast2["temperature"]); ?> &deg;C</div>
		</div>

		<div class="forecast">
			<div class="forecast-day">POJUTRZE</div>
			<div class="forecast-icon"><img src="<?= plugins_url() . '/aqua-weather/ikony/' . $forecast3["icon"]. '.png'; ?>"></div>
			<div class="forecast-temp"><?= ceil($forecast3["temperature"]); ?> &deg;C</div>
		</div>
	</div>

	<br><br>

 	<?php

}

add_shortcode('aqua_weather', 'aw_content');
