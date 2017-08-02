<?php



// Location section
//$ip=$_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP']: ($_SERVER['HTTP_X_FORWARDE‌​D_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR']: $_SERVER['REMOTE_ADDR']);
$ip=getenv('REMOTE_ADDR')
? getenv('REMOTE_ADDR')
: ($_SERVER['HTTP_X_FORWARDED_FOR'] ?
$_SERVER['HTTP_X_FORWARDED_FOR']: getenv('REMOTE_ADDR')
);

//$_SERVER['HTTP_CLIENT_IP'];
//$_SERVER['HTTP_X_FORWARDED_FOR'];
//You then use these arrays on localhost:

//getenv('REMOTE_ADDR');
//getenv('HTTP_X_FORWARDED_FOR');

//$icon = "clear-day";
//echo $ip;
$IPLoc=$ip;
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_url_Loc="https://ipapi.co/$IPLoc/json/";
$processLoc=curl_init($api_url_Loc);
curl_setopt($processLoc, CURLOPT_USERAGENT, 1);
curl_setopt($processLoc, CURLOPT_RETURNTRANSFER, 1);
$returnLoc=curl_exec($processLoc);
$resultLoc=json_decode($returnLoc, true);
//$returnDark = curl_exec($processDark);
//$resultsDark = json_decode($returnDark, true);
//var_dump($resultLoc);
$city=$resultLoc['city'];
echo 'City is : ' . $city4;
curl_close($processLoc);
//$city = "BRASÍLIA";
//$city = $_GET['city'];

// API open weather curl
$country="ireland";
$appID="&appid=775158c1c823e0fc9aa77299bc16461c";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_url="http://api.openweathermap.org/data/2.5/weather?q=" . $city . $appID;
$process=curl_init($api_url);
curl_setopt($process, CURLOPT_USERAGENT, 1);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return=curl_exec($process);
$results=json_decode($return);
// var_dump($results);
$temperature=$results->main->temp - 273.15;
//$city =  $results->main->id->name;
// getting data from php object
$condition=$results->weather[0]->description;
$humidity=$results->main->humidity . "%";
$wind=$results->wind->speed * 3.6;
$direction=$results->wind->deg;
$city1=$results->name;
// getting data from associative array
$results2=json_decode($return, true);
//var_dump($results2); // dump out to screen for debugging the array and object positions
// $lat =  $results[lat;
//$long = $results[lon];
//$lat = "53.2707";
//$long = "-9.0568";
$city2=$_GET['city'];
//$city2 = "galway";
$temperature2=$results2[main][temp] - 273.15;
// getting data from php object
$condition2=$results2[weather][0][description];
$humidity2=$results2[main][humidity] . "%";
$wind2=round(($results2[wind][speed] * 3.6), 0); // round the number
$direction2=$results2[wind][deg];
$lat=$results2[coord][lat]; // get the lat and long for the darksky api
$long=$results2[coord][lon];

$bearing=$direction;

/**
 * @param $bearing
 * @return int|string
 */

function degreeToString($bearing) {
    $cardinalDirections=array( 'North'=> array(337.5, 22.5), 'North East'=> array(22.5, 67.5), 'East'=> array(67.5, 112.5), 'South East'=> array(112.5, 157.5), 'South'=> array(157.5, 202.5), 'South West'=> array(202.5, 247.5), 'West'=> array(247.5, 292.5), 'North West'=> array(292.5, 337.5));
    // for statement to convert degree to wind direction eg west
    foreach ($cardinalDirections as $dir=> $angles) {
        // convert degrees into wind direction
        if ($bearing >=$angles[0] && $bearing < $angles[1]) {
            $direction=$dir;
            break;
        }
    }
    return $direction;
}

$direction=degreeToString($bearing);
//echo $direction;


// Darkskies api feed
$appDarksky="2457a1a06421272ba3217d68bf4f47fa";
//$lat = "53.2707";
//$long = "-9.0568";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_urlDark="https://api.darksky.net/forecast/" . $appDarksky . "/" . $lat . "," . $long;
$processDark=curl_init($api_urlDark);
curl_setopt($processDark, CURLOPT_USERAGENT, 1);
curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
$returnDark=curl_exec($processDark);
$resultsDark=json_decode($returnDark, true);
//var_dump($resultsDark);
curl_close($process);
//$city3 = $_GET['city'];
$city3=$city;
$temperature3=round(($resultsDark[currently][temperature] - 32) / 1.8, 0);
// getting data from php object
$condition3=$resultsDark[hourly][summary];
$humidity3=($resultsDark[currently][humidity]) * 100 . "%";
//$wind3 = round(($resultsDark[currently][windSpeed] * 3.6), 0); // round the number
$wind3=round(($resultsDark[currently][windSpeed]) * 0.44704, 1); // round the number
$direction3=$resultsDark[currently][windBearing];
$icon=$resultsDark[hourly][icon];
$daily="test output";
$daily=$resultsDark[daily][summary];
curl_close($processDark);

/**
 * @param $icon
 * @return string
 */

function imageIcon($icon): string {
    $first="<img src=\"img/svg/";
    $second="Width=\"100px\"//>";
    switch ($icon) {
        case "rain": $image="rainy-6.svg";
        break;
        case "clear-day": $image='day.svg';
        break;
        case "clear-night": $image="clear_night,svg";
        break;
        case "snow": $image="snow-1.svg";
        break;
        case "sleet": $image="sleet.png";
        break;
        case "wind": $image="wind.png";
        break;
        case "cloudy": $image="cloudy.png";
        break;
        case "hail": $image="hail.png";
        break;
        case "partly-cloudy-day": $image='cloudy-day-3.svg"';
        break;
        case "partly-cloudy-night": $image="cloudy-night-1.svg";
        break;
        case "thunderstorm": $image="thunder.svg";
        break;
        case "tornado": $image="rain-cloud-icon-5.png";
        break;
        case "sunny": $image="day.svg";
        break;
        default: $image="weather.svg";
    }
    return $image;
    //clear-day, clear-night, rain, snow, sleet, wind, fog, cloudy, partly-cloudy-day, or partly-cloudy-night.  hail, thunderstorm, tornado,
}

$image=imageIcon($icon);
//echo "</br>lat: " . $lat . " lon: " . $long;
//require 'curl.view.php';
//require 'weatherapp.php';
//require 'wea3.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weather App by Shane Cunningham</title>

    <meta name="description" content="Weather app">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--    <link href="css/style.css" rel="stylesheet">-->
    <link href="css/titatoggle-dist.css" rel="stylesheet">
    <link href="css/weather-icons.min.css" rel="stylesheet">
    <link href="css/weather-icons-wind.min.css" rel="stylesheet">
    <style>
        body {

            background-color: #ff9800 !important;
        }

        body {
            font-family: 'Roboto', sans-serif;
            font-size: 110%;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .icon {
            width: 25%;
        }

        .bgcolor {
            background-color: #FF9800;
        }

        .wi {
            line-height: 1.4;
            font-size: 50px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            display: none;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #673AB7;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #3F51B5;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn1").click(function(){
                $("#temperature").text("Hello world!");
            });
            $("#btn2").click(function(){
                $("#test2").html("<b>Hello world!</b>");
            });
            $("#btn3").click(function(){
                $("#test3").val("Dolly Duck");
            });
        });
    </script>

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">
                <? echo ucfirst($city3); ?>

            </h3>
            <h3 class="text-center">

                <p style="font-size:50px" id="temperature"><? echo $temperature ?> °C</p>
            </h3>
            <h3 class="text-center">

                <img src="img/svg/<? echo $image; ?>"  width="100px">
            </h3>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">

                        <i class="wi wi-humidity"></i>
                        <br><br>
                        <p><? echo "Humidity: " . $humidity3 . ""; ?></p>
                    </h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">

                        <i class="wi wi-forecast-io-wind"></i>
                        <br>
                        <br>
                        <p><? echo "Wind: " . $wind3 . " m/s"; ?></p>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <button id ="#btn1" type="button" class="btn btn-lg">
                        Temp changes
                    </button>

                    <button id="btn1">Set Text</button>
                    <p id="test1">This is a paragraph.</p>sql index
                </div>
            </div>
            <div class="col-lg-12 text-center">

                <div class="checkbox checkbox-slider--c-weight checkbox-slider-lg">
                    <label>
                        <span>Toggle1</span> <input type="checkbox"><span>Toggle2</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--<script src="js/scripts.js"></script>-->
</body>
</html>