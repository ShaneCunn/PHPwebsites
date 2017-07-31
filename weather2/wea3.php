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

                    <button type="button" class="btn btn-lg">
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