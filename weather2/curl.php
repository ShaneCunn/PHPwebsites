<?php
/**
 * Created by PhpStorm.
 * User: MTA USER
 * Date: 02/06/2017
 * Time: 11:36
 */

$favcolor = "red";


//$city = "galway";
$city = $_GET['city'];
$country = "ireland";

$appID = "&appid=775158c1c823e0fc9aa77299bc16461c";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . $appID;

$process = curl_init($api_url);
curl_setopt($process, CURLOPT_USERAGENT, 1);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($process);
$results = json_decode($return);
// var_dump($results);

$temperature = $results->main->temp - 273.15;
//$city =  $results->main->id->name;
// getting data from php object
$condition = $results->weather[0]->description;
$humidity = $results->main->humidity . "%";
$wind = $results->wind->speed * 3.6;
$direction = $results->wind->deg;
$city1 = $results->name;


// getting data from associative array
$results2 = json_decode($return, true);
//var_dump($results2); // dump out to screen for debugging the array and object positions
// $lat =  $results[lat;
//$long = $results[lon];
//$lat = "53.2707";
//$long = "-9.0568";
$city2 = $_GET['city'];
//$city2 = "galway";
$temperature2 = $results2[main][temp] - 273.15;

// getting data from php object
$condition2 = $results2[weather][0][description];
$humidity2 = $results2[main][humidity] . "%";
$wind2 = round(($results2[wind][speed] * 3.6), 0); // round the number
$direction2 = $results2[wind][deg];
$lat = $results2[coord][lat]; // get the lat and long for the darksky api
$long = $results2[coord][lon];

//
//echo "<Strong>City: </Strong>" . $city . "<br />";
//
//echo "<Strong>Condition are:</Strong> " . $condition . "<br />";
//
//echo "<Strong>Temperature:</Strong> " . $temperature . " &#8451;<br />";
//echo "<Strong>Humidity:</Strong> " . $humidity . "<br />";
//echo "<Strong>Wind Speed:</Strong> " . $wind . " KPH<br />";
//echo "<Strong>Wind Direction:</Strong> " . $direction2 . "&deg;<br />";

$bearing = $direction;

/**
 * @param $bearing
 * @return int|string
 */
function degreeToString($bearing)
{
    $cardinalDirections = array(
        'North' => array(337.5, 22.5),
        'North East' => array(22.5, 67.5),
        'East' => array(67.5, 112.5),
        'South East' => array(112.5, 157.5),
        'South' => array(157.5, 202.5),
        'South West' => array(202.5, 247.5),
        'West' => array(247.5, 292.5),
        'North West' => array(292.5, 337.5)
    );
// for statement to convert degree to wind direction eg west
    foreach ($cardinalDirections as $dir => $angles) { // convert degrees into wind direction
        if ($bearing >= $angles[0] && $bearing < $angles[1]) {
            $direction = $dir;
            break;
        }
    }
    return $direction;
}

$direction = degreeToString($bearing);

//echo $direction;
// Darkskies api feed
$appDarksky = "2457a1a06421272ba3217d68bf4f47fa";
//$lat = "53.2707";
//$long = "-9.0568";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_urlDark = "https://api.darksky.net/forecast/" . $appDarksky . "/" . $lat . "," . $long;

$processDark = curl_init($api_urlDark);
curl_setopt($processDark, CURLOPT_USERAGENT, 1);
curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
$returnDark = curl_exec($processDark);
$resultsDark = json_decode($returnDark, true);
//var_dump($resultsDark);
curl_close($process);

$city3 = $_GET['city'];
//$city2 = "galway";
$temperature3 = round(($resultsDark[currently][temperature] - 32) / 1.8, 0);

// getting data from php object
$condition3 = $resultsDark[hourly][summary];
$humidity3 = ($resultsDark[currently][humidity]) * 100 . "%";
$wind3 = round(($resultsDark[currently][windSpeed] * 3.6), 0); // round the number
$direction3 = $resultsDark[currently][windBearing];
$icon = $resultsDark[hourly][icon];

//$icon = "clear-day";

curl_close($processDark);

/**
 * @param $icon
 * @return string
 */
function imageIcon($icon): string
{
    switch ($icon) {
        case "rain":
            $image = "<img src=\"img/svg/rainy-6.svg\"  alt=\"Mountain View\"  ";
            break;
        case "clear-day":
            $image = "<img src=\"img/svg/day.svg\" alt=\"Mountain View\" ";
            break;
        case "clear-night":
            $image = "<img class=\"img-responsive \"  src=\"img/clear_night.png\" alt=\"Mountain View\" ";
            break;
        case "snow":
            $image = "<img class=\"img-responsive \"  src=\"img/svg/snow-1.svg\" alt=\"Mountain View\" ";
            break;
        case "sleet":
            $image = "<img class=\"img-responsive \"  src=\"img/sleet.png\" alt=\"Mountain View\" ";
            break;
        case "wind":
            $image = "<img class=\"img-responsive \"  src=\"img/wind.png\" alt=\"Mountain View\" ";
            break;
        case "cloudy":
            $image = "<img class=\"img-responsive \"  src=\"img/cloudy.png\" alt=\"Mountain View\" ";
            break;
        case "hail":
            $image = "<img class=\"img-responsive \"  src=\"img/hail.png\" alt=\"Mountain View\" ";
            break;
        case "partly-cloudy-day":
            $image = "<img src=\"img/svg/cloudy-day-3.svg\" alt=\"Mountain View\" ";
            break;
        case "partly-cloudy-night":
            $image = "<img src=\"img/svg/cloudy-night-1.svg\" alt=\"Mountain View\" ";
            break;
        case "thunderstorm":
            $image = "<img class=\"img-responsive \"  src=\"img/rain-cloud-icon-5.png\" alt=\"Mountain View\" ";
            break;
        case "tornado":
            $image = "<img class=\"img-responsive \"  src=\"img/rain-cloud-icon-5.png\" alt=\"Mountain View\" ";
            break;
        case "sunny":
            $image = "<img class=\"img-responsive \"  src=\"img/svg/day.svg\" alt=\"Mountain View\" ";
            break;
        default:
            $image = "<img class=\"img-responsive \"  src=\"img/sunny.png\" alt=\"Mountain View\" ";;
    }
    return $image;
//clear-day, clear-night, rain, snow, sleet, wind, fog, cloudy, partly-cloudy-day, or partly-cloudy-night.  hail, thunderstorm, tornado,
}

$image = imageIcon($icon);
//echo "</br>lat: ".$lat. " lon: ". $long;
require 'curl.view.php';
?>


