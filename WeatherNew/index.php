<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 01/08/2017
 * Time: 12:23
 */

// Report all errors
//error_reporting(E_ALL);

// call the
include 'WeatherModel.php';


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
    <link href="css/custom.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row row-centered">
        <div class="col-md-12">
            <h1>PHP Weather App</h1>
            <h3 class="text-center">
                <?php echo ucfirst($city); ?>
            </h3>
            <h3 class="text-center">


                <p style="font-size:50px" id="temperatureOutput">test output</p>

            </h3>
            <h3 class="text-center">

                <img src="img/svg/<?php echo $image; ?>" width="100px">

                <!--                               <img src="img/svg/weather.svg"  width="100px">
                -->
            </h3>
            <h3 class="text-center"><?php echo $hourly; ?></h3>

            <div class="container">
                <div class="row row-centered">
                    <div class="col-md-3"></div>

                    <div class="col-md-3 col-max col-centered">
                        <h3 class="text-center">

                            <i class="wi wi-humidity"></i>
                            <br><br>
                            <p><?php echo "Humidity: " . $humidity; ?></p>
                        </h3>
                    </div>
                    <div class="col-md-3 col-max col-centered">
                        <h3 class="text-center">

                            <i class="wi wi-forecast-io-wind"></i>
                            <br>
                            <br>
                            <!--  <p><?php /*echo "Wind: " . $wind . " m/s"; */ ?></p>-->
                            <p id="windSpeed">wind output</p>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row row-centered">
            </div>
            <div class="col-lg-12 text-center">
                <h3 class="text-center">


                    <span class="testout"></span><br>


                    <div class="checkbox checkbox-slider--b-flat checkbox-slider-lg">
                        <label> <span>  <strong style="margin-right: 28px!important;">Metric</strong></span>
                            <input id="toggletest" type="checkbox" data-toggle="toggle" onclick="changeTemp() "
                                   data-style="ios"><span><strong> Imperial</strong></span>
                        </label>
                    </div>


            </div>
        </div>
    </div>

    <div class="col-lg-12 text-center ">Made with <i class="fa fa-heart"></i> by <a
                href="https://www.linkedin.com/in/cunninghamshane/" target="_blank">@ShaneC</a></div>


</div>


<script language="JavaScript">

    var tempc = '<?php echo round($temperature) . "°C"?>';
    var tempf = '<?php echo round($temperature * 9 / 5 + 32) . "°F";?>';
    var windMetric = '<?php echo "Wind: " . round($wind * 3.6) . " Kph"?>';
    var windImperial = '<?php echo "Wind: " . round($wind / 0.44704) . " Mph"?>';


    changeTemp = function () {
        if (!$("#toggletest").parent().hasClass('off')) {
            console.log('hasclass off = false');
            $("#temperatureOutput").empty();
            $("#windSpeed").empty();

            $("#temperatureOutput").append('' + tempc);
            $("#windSpeed").append('' + windMetric);

            $("#toggletest").parent().addClass('off');
        }
        else if ($("#toggletest").parent().hasClass('off')) {
            console.log('hasclass off = true');
            $("#temperatureOutput").empty();
            $("#windSpeed").empty();

            $("#temperatureOutput").append('' + tempf);
            $("#windSpeed").append('' + windImperial);

            $("#toggletest").parent().removeClass('off');
        }
        else {
            return false;
        }
    };

    $("#toggletest").parent().attr('onclick', 'changeTemp();');


    $(function () {
        $('#toggletest').bootstrapToggle({
            off: '',
            on: '',
            onclick: changeTemp()
        });
    });

</script>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--<script src="js/scripts.js"></script>-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-switch.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap-switch.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>
</html>