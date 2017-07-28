<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 11/06/2017
 * Time: 13:59
 */

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
<script src="https://rawgithub.com/arunisrael/angularjs-geolocation/master/dist/angularjs-geolocation.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css" rel="stylesheet">
<link href="css/weather-icons.min.css" rel="stylesheet">
<link href="css/weather-icons-wind.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<title>Weather App by Krishna Diamesso</title>

</head>
<body class="w3-orange">
<div ng-app="weatherApp" ng-controller="weatherCtrl" ng-cloak>
<br>
<div class="w3-container  w3-center w3-padding">
<p class="w3-xxlarge">{{cityName | uppercase}}</p>
<p style="font-size:60px" id="temperature">{{temperatureC | number: 0}} {{celsius}}</p>

<i class="wi {{iconGif}}"></i>
<p class="capitalize">{{weatherDesc}}</p>


<p id="info">Your Weather Information will load shortly after you have approved the geolocation on your browser.</p>
<div class="w3-content w3-row" style="width:75%">
<div class="w3-col l6 m6 w3-container w3-center">
<i class="wi {{humidityIcon}}"></i>
 <br><br>
<p>{{humidity}}</p>
</div>
<div class="w3-col l6 m6 w3-container w3-center">
<i class="wi {{windIcon}}"></i>
 <br><br>
<p>{{wind}}</p>
</div>
</div>
<div>
<span class="w3-margin-right"><i class="wi {{wiFahrenheit}}"></i></span>
<label class="switch">
<input type="checkbox" checked ng-click="changeTemp()">
<div class="{{sliderRound}}"></div>
</label>
<span class="w3-margin-left"><i class="wi {{wiCelsius}}"></i></span>
</div>
<br>
</div>
</div>
<script src="js/app.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
<script src="https://rawgithub.com/arunisrael/angularjs-geolocation/master/dist/angularjs-geolocation.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css" rel="stylesheet">
<link href="css/weather-icons.min.css" rel="stylesheet">
<link href="css/weather-icons-wind.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<title>Weather App by Krishna Diamesso</title>

</head>
<body class="w3-orange">
<div ng-app="weatherApp" ng-controller="weatherCtrl" ng-cloak>
<br>
<div class="w3-container  w3-center w3-padding">
<p class="w3-xxlarge">{{cityName | uppercase}}</p>
<p style="font-size:60px" id="temperature">{{temperatureC | number: 0}} {{celsius}}</p>

<i class="wi {{iconGif}}"></i>
<p class="capitalize">{{weatherDesc}}</p>


<p id="info">Your Weather Information will load shortly after you have approved the geolocation on your browser.</p>
<div class="w3-content w3-row" style="width:75%">
<div class="w3-col l6 m6 w3-container w3-center">
<i class="wi {{humidityIcon}}"></i>
 <br><br>
<p>{{humidity}}</p>
</div>
<div class="w3-col l6 m6 w3-container w3-center">
<i class="wi {{windIcon}}"></i>
 <br><br>
<p>{{wind}}</p>
</div>
</div>
<div>
<span class="w3-margin-right"><i class="wi {{wiFahrenheit}}"></i></span>
<label class="switch">
<input type="checkbox" checked ng-click="changeTemp()">
<div class="{{sliderRound}}"></div>
</label>
<span class="w3-margin-left"><i class="wi {{wiCelsius}}"></i></span>
</div>
<br>
</div>
</div>
<script src="js/app.js"></script>
</body>
</html>
