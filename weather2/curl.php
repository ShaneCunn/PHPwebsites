<?php
/**
 * Created by PhpStorm.
 * User: MTA USER
 * Date: 02/06/2017
 * Time: 11:36
 */

//$city = "galway";
$city = $_GET['city'];
$country = "ireland";

$appID = "&appid=775158c1c823e0fc9aa77299bc16461c";
//$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . $appID;
$username = 'mikethefrog';
$url = 'https://api.github.com/users/treehouse';
$process = curl_init($api_url);
curl_setopt($process, CURLOPT_USERAGENT, 1);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($process);
$results = json_decode($return);
//var_dump($results);

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

$city2 = $_GET['city'];
//$city2 = "galway";
$temperature2 = $results2[main][temp] - 273.15;

// getting data from php object
$condition2 = $results2[weather][0][description];
$humidity2 = $results2[main][humidity] . "%";
$wind2 = round(($results2[wind][speed] * 3.6), 0); // round the number
$direction2 = $results2[wind][deg];
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

foreach ($cardinalDirections as $dir => $angles) { // convert degrees into wind direction
    if ($bearing >= $angles[0] && $bearing < $angles[1]) {
        $direction = $dir;
        break;
    }
}

echo $direction;
curl_close($process);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Simple Weather app</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <h1>What's the Weather?</h1>

    <form>
        <div class="form-group">
            <label for="city">Enter the name of a city.</label>
            <input type="text" class="form-control" id="city" name="city" aria-describedby="city"
                   placeholder="E.g. New York, Tokyo" value="<?php echo $_GET['city']; ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form></div>
<div class="container">



    <div class="row">

        <div class="col-lg-12 text-center">
            <h1>Weather</h1>
            <p><?php
                echo "<Strong>City: </Strong>" . $city1 . "<br />";
                echo "<Strong>Condition are:</Strong> " . $condition . "<br />";
                echo "<Strong>Temperature:</Strong> " . $temperature . " &#8451;<br />";
                echo "<Strong>Humidity:</Strong> " . $humidity . "<br />";
                echo "<Strong>Wind Speed:</Strong> " . $wind . " KPH<br />";
                echo "<Strong>Wind Direction:</Strong> " . $direction . "<br />";


                ?></p>

        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Weather2</h1>

                <p><?php //foreach($results2 as $x => $x_value) {
                    //                echo "<p>Key=" . $x . ", Value=" . $x_value."</p>";
                    //                echo "<br>";

                    echo "<Strong>City: </Strong>" . $city2 . "<br />";
                    echo "<Strong>Condition are:</Strong> " . $condition2 . "<br />";
                    echo "<Strong>Temperature:</Strong> " . $temperature2 . " &#8451;<br />";
                    echo "<Strong>Humidity:</Strong> " . $humidity2 . "<br />";
                    echo "<Strong>Wind Speed:</Strong> " . $wind2 . " KPH<br />";
                    echo "<Strong>Wind Direction:</Strong> " . $direction2 . "&deg;<br />";
                    ?></p>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

