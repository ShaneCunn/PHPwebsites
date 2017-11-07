<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 01/06/2017
 * Time: 18:19
 */

if (isset($_GET)) {

    $city = $_GET['city'];
    // $city = "galway";
    //$country = $_GET['country'];
    $country = "ireland";

    //http://api.openweathermap.org/data/2.5/weather?q=galway,&appid=775158c1c823e0fc9aa77299bc16461c
    $appID = "&appid=775158c1c823e0fc9aa77299bc16461c";
    $api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
    $weather_info = file_get_contents($api_url);
    $jsonData = json_decode($weather_info, true);


    $humidity = $jsonData['main']['humidity'];
    $condition = $jsonData['weather'][0]['main'];
    $wind = $jsonData['wind']['speed'] * 3.6;
    $direction = $jsonData['wind']['deg'];

    // echo "City = ". $city."";

    // echo "condition are: ". $condition;
}


?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
            .row.content {
                height: 450px
            }

            /* Set gray background color and 100% height */
            .sidenav {
                padding-top: 20px;
                background-color: #f1f1f1;
                height: 100%;
            }

            /* Set black background color, white text and some padding */
            footer {
                background-color: #555;
                color: white;
                padding: 15px;
            }

            /* On small screens, set height to 'auto' for sidenav and grid */
            @media screen and (max-width: 767px) {
                .sidenav {
                    height: auto;
                    padding: 15px;
                }

                .row.content {
                    height: auto;
                }
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Projects</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
                <p><a href="#">Link</a></p>
            </div>
            <div class="col-sm-8 text-left">
                <h1>Welcome</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. </p>
                <hr>
                <h3>Test</h3>

                <form>
                    <div class="form-group">
                        <label for="City">City:</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City"
                               value="<?php echo $_GET['city']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <p>Lorem ipsum...</p>
                <p><?php echo "<Strong>City: </Strong>" . $city . "<br />";

                    echo "<Strong>Condition are:</Strong> " . $condition . "<br />";

                    echo "<Strong>Temperature:</Strong> " . $user_temp . " &#8451;<br />";
                    echo "<Strong>Humidity:</Strong> " . $humidity . "<br />";
                    echo "<Strong>Wind Speed:</Strong> " . $wind . " KPH<br />";
                    echo "<Strong>Wind Direction:</Strong> " . $direction . "&deg;<br />";


                    ?></p>


            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p>ADS</p>
                </div>
                <div class="well">
                    <p>ADS</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>Footer Text</p>
    </footer>

    </body>
    </html>

<?php
//
//if (isset($jsonData['city'])) {
//    $jsonData = $jsonData['city'];
//} elseif ($jsonData == null) {
//
//    echo '<div class="alert alert-danger" role="alert">Sorry, Enter a city.</div>';
//} else if ($jsonData) {
//
//    echo '<div class="alert alert-success" role="alert">' . $jsonData . '</div>';
//
//} else {
//
//    if ($city != "") {
//
//        echo '<div class="alert alert-danger" role="alert">Sorry, that city could not be found.</div>';
//    }
//}
