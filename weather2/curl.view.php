<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Weather app</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
            background: linear-gradient(45deg, #02A3BF 0%, #38F8FF 100%);
        }

        weather {

            color: #ccc !important;
        }

        red {
            background-color: #f00;
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

    </form>
</div>
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
                <h1>Weather 2</h1>

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

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Weather 3 using darksky</h1>

                <p><?php //foreach($results2 as $x => $x_value) {
                    //                echo "<p>Key=" . $x . ", Value=" . $x_value."</p>";
                    //                echo "<br>";

                    echo "<Strong>City: </Strong>" . ucfirst($city3) . "<br />"; // using ucfirst to uppercase first letter of city var
                    echo "<Strong>Condition are:</Strong> " . $condition3 . "<br />";
                    echo "<Strong>Temperature:</Strong> " . $temperature3 . " &#8451;<br />";
                    echo "<Strong>Humidity:</Strong> " . $humidity3 . "<br />";
                    echo "<Strong>Wind Speed:</Strong> " . $wind3 . " KPH<br />";
                    echo "<Strong>Wind Direction:</Strong> " . $direction3 . "&deg;<br />";
                    echo "<Strong>icon: </Strong> " . $icon . "<br />";
                    echo "<Strong> Weather icon:" . $image . "</Strong>";

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
