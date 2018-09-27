<?php

/**
 * Created by PhpStorm.
 * User: shane
 * Date: 15/08/2017
 * Time: 11:23
 */

if (!isset($_SESSION)) {
    session_start();
}
$image = null;
$humidity = '0.56';
$wind = '45';
$city = "galway";
$temperature = 300;
$country = null;


if (isset($_SESSION['lat']) && isset($_SESSION['long'])) {
    // logged in !
    echo "Session working";
    echo $_SESSION['lat'];
    echo $_SESSION['long'];
    $lat = $_SESSION['lat'];
    $long = $_SESSION['long'];
} else {

    $ip = GetRemoteIP();
    list($city, $lat, $long, $country) = GetCity($ip);

}

/*if (!empty($_POST['latitude']) && !empty($_POST['longitude'])) {
    //Send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($_POST['latitude']) . ',' . trim($_POST['longitude']) . '&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if ($status == "OK") {
        //Get address from json data
        // $location = $data->results[0]->formatted_address;
        $location = trim($_POST['latitude']) . '<br>' . trim($_POST['longitude']);
    } else {
        $location = '';
    }
//Print address
    echo $location;
    $_SESSION["lat"] = trim($_POST['latitude']);
    $_SESSION["long"] = trim($_POST['longitude']);

// Darkskies API Section

// Darkskies api Key
    $appID = "2457a1a06421272ba3217d68bf4f47fa"; // sets the api key

    $api_URL = "https://api.darksky.net/forecast/" . $appID . "/" . $_SESSION["lat"] . "," . $_SESSION["long"]; // set the api url

    $processDark = curl_init($api_URL); // open the curl process and calls the
    curl_setopt($processDark, CURLOPT_USERAGENT, 1);
    curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
    $returnDark = curl_exec($processDark);
    $resultsDark = json_decode($returnDark, true);
    //  var_dump($resultsDark);

}*/


/* Get Location IP section
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

//$ip = GetRemoteIP();


/**
 * @param $ip
 * @return mixed
 */

function GetCity($ip): array
{

    //     pass the IP address of the remote request to ip API
    //     which pass back the city and lat and long co-ordinates
    $IPLoc = $ip;
    $api_url_Loc = "https://ipapi.co/$IPLoc/json/"; // set the ip address to a variable
    $processLoc = curl_init($api_url_Loc); // call the curl init and pass in the api url variable
    curl_setopt($processLoc, CURLOPT_USERAGENT, 1); // set the variable we want to load
    curl_setopt($processLoc, CURLOPT_RETURNTRANSFER, 1);
    $returnLoc = curl_exec($processLoc); // retrieve and print the url and set it to variable
    $resultLoc = json_decode($returnLoc, true); // convert a json encode string  and
    // true convert object to associative array ie key value pairs

    //  var_dump($resultLoc);
    $city = $resultLoc['city']; // get the city name from the array

    $lat = $resultLoc['latitude']; // get the latitude from array
    $long = $resultLoc['longitude']; // gets the longitude from the array
    $country = $resultLoc['country']; // gets the longitude from the array

    curl_close($processLoc); // closes the curl process
    return array($city, $lat, $long, $country);
}

//list($city, $lat, $long, $country) = GetCity($ip); // calls the getcity function and pass in ip variable

//echo $country;
// Darkskies API Section

// Darkskies api Key
$appID = "2457a1a06421272ba3217d68bf4f47fa"; // sets the api key

//$lat = "53.2707"; // latitude location for testing
//$long = "-9.0568"; // longitude location for testing
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_URL = "https://api.darksky.net/forecast/" . $appID . "/" . $lat . "," . $long; // set the api url
/**
 * @param $api_URL
 * @return array
 */
function GetAPI($api_URL): array
{
    $processDark = curl_init($api_URL); // open the curl process and calls the
    curl_setopt($processDark, CURLOPT_USERAGENT, 1);
    curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
    $returnDark = curl_exec($processDark);
    $resultsDark = json_decode($returnDark, true);
    return array($processDark, $resultsDark);
}

list($processDark, $resultsDark) = GetAPI($api_URL);
//var_dump($resultsDark);
curl_close($processDark); // closes the curl init process


// Getting data from the associative array
$temperature = round(($resultsDark['currently']['temperature'] - 32) / 1.8, 0);
$condition = $resultsDark['hourly']['summary'];
$humidity = ($resultsDark['currently']['humidity']) * 100 . "%";
$wind = round(($resultsDark['currently']['windSpeed']), 1); // round the number
$direction = $resultsDark['currently']['windBearing'];
$daily = $resultsDark['daily']['summary'];
$hourly = $resultsDark['hourly']['summary'];
$airPressure = $resultsDark['currently']['pressure'];
$icon = $resultsDark['currently']['icon'];


$bearing = $direction; // set the wind direction variable to bearing variable


function windRose($item)
{
    $winddir[] = "N";
    $winddir[] = "NNE";
    $winddir[] = "NE";
    $winddir[] = "ENE";
    $winddir[] = "E";
    $winddir[] = "ESE";
    $winddir[] = "SE";
    $winddir[] = "SSE";
    $winddir[] = "S";
    $winddir[] = "SSW";
    $winddir[] = "SW";
    $winddir[] = "WSW";
    $winddir[] = "W";
    $winddir[] = "WNW";
    $winddir[] = "NW";
    $winddir[] = "NNW";
    $winddir[] = "N";
    return $winddir[round($item * 16 / 360)];
}


$direction = windRose($bearing);

//Daily Forecast
$dailySummary = $resultsDark['daily']['summary'];
$dailyIcon = $resultsDark['daily']['icon'];
$dailyCond = array();
foreach ($resultsDark['daily']['data'] as $d) { // for loop through array to find  Key daily and value data,
    // set that as a new array dailycond
    $dailyCond[] = $d;
}


foreach ($dailyCond as $cond) {

    $wTempHigh = round($cond['temperatureMax']);
    $wTempLow = round($cond['temperatureMin']);
    $wTime = $cond['time'];
    $wIcon = $cond['icon'];
    // echo date("l, M jS", $wTime)." high is: " . $wTempHigh . " low is: " . $wTempLow ." icon is ".$wIcon. "<br>";

}

