<?php

/**
 * Created by PhpStorm.
 * User: shane
 * Date: 15/08/2017
 * Time: 11:23
 */

//$image = 'weather.svg';
$image = null;
$humidity = '0.56';
$wind = '45';
$city = "galway";
$temperature = 300;
$Test = 'bob';
/**
 * @param $city
 * @return array
 */


/* Location section
 localhost ip address not for website
$ip = $_SERVER['HTTP_CLIENT_IP'] ?
 $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDE‌​D_FOR'] ?
 $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);

 remote ip address*/
/**
 * @return array|false|string
 */
function GetRemoteIP()
{
    $ip = getenv('REMOTE_ADDR')
        ? getenv('REMOTE_ADDR')
        : ($_SERVER['HTTP_X_FORWARDED_FOR'] ?
            $_SERVER['HTTP_X_FORWARDED_FOR'] : getenv('REMOTE_ADDR')
        );
//$icon = "clear-day";
    // echo "test out: " . $ip;
    return $ip;
}

$ip = GetRemoteIP();


/**
 * @param $ip
 * @return mixed
 */

function GetCity($ip): array
{
    $IPLoc = $ip;
    $api_url_Loc = "https://ipapi.co/$IPLoc/json/";
    $processLoc = curl_init($api_url_Loc);
    curl_setopt($processLoc, CURLOPT_USERAGENT, 1);
    curl_setopt($processLoc, CURLOPT_RETURNTRANSFER, 1);
    $returnLoc = curl_exec($processLoc);
    $resultLoc = json_decode($returnLoc, true);

//  var_dump($resultLoc);
    $city = $resultLoc['city'];

    $lat = $resultLoc['latitude'];
    $long = $resultLoc['longitude'];


    curl_close($processLoc);
    return array($city, $lat, $long);
}

list($city, $lat, $long) = GetCity($ip);


// Darkskies api feed
$appDarksky = "2457a1a06421272ba3217d68bf4f47fa";

//$lat = "53.2707";
//$long = "-9.0568";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_urlDark = "https://api.darksky.net/forecast/" . $appDarksky . "/" . $lat . "," . $long;
/**
 * @param $api_urlDark
 * @return array
 */
function GetAPI($api_urlDark): array
{
    $processDark = curl_init($api_urlDark);
    curl_setopt($processDark, CURLOPT_USERAGENT, 1);
    curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
    $returnDark = curl_exec($processDark);
    $resultsDark = json_decode($returnDark, true);
    return array($processDark, $resultsDark);
}

list($processDark, $resultsDark) = GetAPI($api_urlDark);
//var_dump($resultsDark);
curl_close($processDark);


// getting data from php object
$temperature = round(($resultsDark['currently']['temperature'] - 32 / 1.8), 0);
$condition = $resultsDark['hourly']['summary'];
$humidity = ($resultsDark['currently']['humidity']) * 100 . "%";
$wind = round(($resultsDark['currently']['windSpeed']), 1); // round the number
$direction = $resultsDark['currently']['windBearing'];
$icon = $resultsDark['hourly']['icon'];
$daily = $resultsDark['daily']['summary'];
$hourly = $resultsDark['hourly']['summary'];


function imageIcon($icon): string
{
    $first = "<img src=\"img/svg/";
    $second = "Width=\"100px\"//>";
    switch ($icon) {
        case "rain":
            $image = "rainy-6.svg";
            break;
        case "clear-day":
            $image = 'day.svg';
            break;
        case "clear-night":
            $image = "clear_night,svg";
            break;
        case "snow":
            $image = "snow-1.svg";
            break;
        case "sleet":
            $image = "sleet.png";
            break;
        case "wind":
            $image = "wind.png";
            break;
        case "cloudy":
            $image = "cloudy.png";
            break;
        case "hail":
            $image = "hail.png";
            break;
        case "partly-cloudy-day":
            $image = 'cloudy-day-3.svg"';
            break;
        case "partly-cloudy-night":
            $image = "cloudy-night-1.svg";
            break;
        case "thunderstorm":
            $image = "thunder.svg";
            break;
        case "tornado":
            $image = "rain-cloud-icon-5.png";
            break;
        case "sunny":
            $image = "day.svg";
            break;
        default:
            $image = "weather.svg";
    }
    return $image;
    //clear-day, clear-night, rain, snow, sleet, wind, fog, cloudy, partly-cloudy-day,
    // or partly-cloudy-night.  hail, thunderstorm, tornado,
}

$image = imageIcon($icon);
