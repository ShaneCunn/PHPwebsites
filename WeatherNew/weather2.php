<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 01/08/2017
 * Time: 12:23
 */

//$image = 'weather.svg';
$image = null;
$humidity = '0.56';
$wind ='45';
$city="galway";
$temperature = 16;

// Darkskies api feed
$appDarksky = "2457a1a06421272ba3217d68bf4f47fa";
$lat = "53.2707";
$long = "-9.0568";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_urlDark = "https://api.darksky.net/forecast/" . $appDarksky . "/" . $lat . "," . $long;
$processDark = curl_init($api_urlDark);
curl_setopt($processDark, CURLOPT_USERAGENT, 1);
curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
$returnDark = curl_exec($processDark);
$resultsDark = json_decode($returnDark, true);
//var_dump($resultsDark);

$city3 = $city;
$temperature = round(($resultsDark['currently']['temperature'] - 32) / 1.8, 0);
// getting data from php object
$condition = $resultsDark['hourly']['summary'];
$humidity = ($resultsDark['currently']['humidity']) * 100 . "%";
//$wind3 = round(($resultsDark[currently][windSpeed] * 3.6), 0); // round the number
//$wind = round(($resultsDark['currently']['windSpeed']) * 0.44704, 1); // round the number
$wind = round(($resultsDark['currently']['windSpeed']), 1); // round the number

$direction = $resultsDark['currently']['windBearing'];
$icon = $resultsDark['hourly']['icon'];
$daily = "test output";
$daily = $resultsDark['daily']['summary'];
$hourly = $resultsDark['hourly']['summary'];
curl_close($processDark);

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
    //clear-day, clear-night, rain, snow, sleet, wind, fog, cloudy, partly-cloudy-day, or partly-cloudy-night.  hail, thunderstorm, tornado,
}
$image = imageIcon($icon);


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
    <script language="JavaScript">
        $(document).ready(function(){
            $("#btn1").click(function(){
                $("#temperature").text("<?php $temperature * 2 ?>");
            });
            $("#btn2").click(function(){
                $("#test2").html("<b><?php $temperature * 9 / 5 + 32?></b>");
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
                <?php echo ucfirst($city); ?>

            </h3>
            <h3 class="text-center">

                <p style="font-size:50px" id="temperature"><?php echo  $temperature ?>°C</p>
            </h3>
            <h3 class="text-center">

              <img src="img/svg/<?php echo $image; ?>"  width="100px">

<!--                               <img src="img/svg/weather.svg"  width="100px">
-->
            </h3>
            <h3 class="text-center"><?php echo $hourly; ?></h3>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">

                        <i class="wi wi-humidity"></i>
                        <br><br>
                        <p><?php echo "Humidity: " . $humidity; ?></p>
                    </h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">

                        <i class="wi wi-forecast-io-wind"></i>
                        <br>
                        <br>
                        <p><?php echo "Wind: " . $wind . " m/s"; ?></p>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <button id ="btn1" type="button" class="btn btn-lg">
                        Temp changes
                    </button>


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