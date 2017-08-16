<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 16/08/2017
 * Time: 08:39
 */


include 'WeatherModel.php';

//$city = "galway";

//echo "Test".ucfirst($city);
$country_name = "dub";
echo "Test" . ucfirst($country_name) . $direction;


?>


<!DOCTYPE html>
<html>


<!-- Head -->
<head>

    <title>PHP Weather Widget </title>

    <!-- For-Mobile-Apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="PHP Weather Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //For-Mobile-Apps -->

    <!-- Index-Page-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <!-- Owl-Carousel-CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all">
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <!-- Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" type="text/css" media="all">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900"
          type="text/css" media="all">
    <!-- //Fonts -->

    <!-- Font-Awesome-File-Links -->
    <!-- CSS -->
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css" media="all">
    <!-- TTF -->
    <link rel="stylesheet" href="fonts/fontawesome-webfont.ttf" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->


</head>
<!-- Head -->


<!-- Body -->
<body onload="startTime()">


<!-- Heading -->
<h1>PHP WEATHER WIDGET</h1>
<!-- //Headng -->


<!-- Container -->
<div class="container">

    <!-- Current-Weather-Widget -->
    <div class="weather-widget agileits w3layouts">
        <div class="place agileits w3layouts">

            <div class="city agileits-w3layouts agileits w3layouts">
                <p> <?php echo ucfirst($city) . ", " . ($country); ?></p>
            </div>

            <div class="dmy agileits w3-agile w3layouts">
                <script type="text/javascript">
                    var mydate = new Date()
                    var year = mydate.getYear()
                    if (year < 1000)
                        year += 1900
                    var day = mydate.getDay()
                    var month = mydate.getMonth()
                    var daym = mydate.getDate()
                    if (daym < 10)
                        daym = "0" + daym
                    var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")
                    var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")
                    document.write("" + dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year + "")
                </script>
            </div>

            <div id="txt"></div>

            <div class="w3temperatureaits agileits w3-agileits">
                <div class="w3temperatureaits-grid w3-agileits wthreetemp">
                    <p><?php echo $temperature; ?>° C</p>
                </div>
                <div class="w3temperatureaits-grid w3tempimg">
                    <figure class="icons agileits w3layouts">
                        <canvas id="<?php echo $icon ?>" width="70" class="w3-agileits" height="70"></canvas>
                    </figure>
                </div>
                <div class="w3temperatureaits-grid w3-agile wthreestats">
                    <ul>
                        <li class="agiletemp agiletemppressure"><?php  echo round($airPressure); ?> mBar</li>
                        <li class="agiletemp wthree agiletemphumidity w3-agile"><?php echo $humidity; ?> Humidity</li>
                        <li class="agiletemp agileits-w3layouts agileinfo agiletempwind"><?php echo $wind . " Mph " . $direction; ?></li>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>

            <div id="owl-demo" class="owl-carousel agileits text-center">
                <?php
                echo '<div class="item w3threeitem w3threeitem1">
                    <h4>SUN</h4>
                    <figure class="icons agileits-w3layouts agileits w3layouts">
                        <canvas id="wind" width="50" height="50"></canvas>
                    </figure>
                    <h5>18°C</h5>
                    <h6>12°C</h6>';


                ?>
             <!--   <div class="item w3threeitem w3threeitem1">
                    <h4>SUN</h4>
                    <figure class="icons agileits-w3layouts agileits w3layouts">
                        <canvas id="wind" width="50" height="50"></canvas>
                    </figure>
                    <h5>18°C</h5>
                    <h6>12°C</h6>
                </div>


                <div class="item w3threeitem agileinfo w3threeitem2">
                    <h4>MON</h4>
                    <figure class="icons wthree agileits w3layouts">
                        <canvas id="sleet" width="50" class="w3ls" height="50"></canvas>
                    </figure>
                    <h5>17°C</h5>
                    <h6>12°C</h6>
                </div>
                <div class="item w3 w3threeitem w3threeitem3">
                    <h4>TUE</h4>
                    <figure class="icons agileits w3layouts">
                        <canvas id="rain" width="50" height="50"></canvas>
                    </figure>
                    <h5>17°C</h5>
                    <h6>10°C</h6>
                </div>
                <div class="item w3threeitem w3threeitem4">
                    <h4>WED</h4>
                    <figure class="icons agileits w3layouts">
                        <canvas id="fog" width="50" class="w3ls" height="50"></canvas>
                    </figure>
                    <h5>17°C</h5>
                    <h6>10°C</h6>
                </div>
                <div class="item w3threeitem wthree agileinfo w3threeitem5">
                    <h4>THU</h4>
                    <figure class="icons agileits w3layouts">
                        <canvas id="partly-cloudy-day" width="50" height="50"></canvas>
                    </figure>
                    <h5>17°C</h5>
                    <h6>10°C</h6>
                </div>
                <div class="item w3 w3threeitem w3threeitem6">
                    <h4>FRI</h4>
                    <figure class="icons agileits w3layouts">
                        <canvas id="snow" width="50" height="50"></canvas>
                    </figure>
                    <h5>12°C</h5>
                    <h6>10°C</h6>
                </div>
                <div class="item w3l w3threeitem w3threeitem7">
                    <h4>SAT</h4>
                    <figure class="icons agileits w3layouts">
                        <canvas id="cloudy" class="agileits-w3layouts" width="50" height="50"></canvas>
                    </figure>
                    <h5>20°C</h5>
                    <h6>15°C</h6>
                </div>-->
            </div>

        </div>
    </div>
    <!-- //Current-Weather-Widget -->

</div>
<!-- //Container -->


<!-- Footer -->
<div class="footer">

    <!-- Copyright -->
    <div class="copyright ">
        <p> &copy; 2017 Shane Cunningham Weather Widget. All Rights Reserved</p>
    </div>
    <!-- //Copyright -->

</div>
<!-- //Footer -->


<!-- Custom-JavaScript-File-Links -->

<!-- Default-JavaScript -->
<script type="text/javascript" src="js/jquery-3.1.1.js"></script>

<!-- Time-JavaScript -->
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;
        return i;
    }
</script>
<!-- //Time-JavaScript -->

<!-- Weather-Widget-JavaScript -->
<script src="js/skycons.js"></script>
<script>
    var icons = new Skycons({"color": "#FFFFFF"}),
        list = [
            "clear-day"
        ],
        i;
    for (i = list.length; i--;)
        icons.set(list[i], list[i]);
    icons.play();
</script>
<script>
    var icons = new Skycons({"color": "#FFFFFF"}),
        list = [
            "clear-night", "partly-cloudy-day", "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind", "fog"
        ],
        j;
    for (j = list.length; j--;)
        icons.set(list[j], list[j]);
    icons.play();
</script>
<!--//Weather-Widget-JavaScript -->

<!-- Owl-Carousel-JavaScript -->
<script src="js/owl.carousel.js"></script>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            autoPlay: 3000,
            items: 5,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [640, 3]
        });
    });
</script>
<!-- //Owl-Carousel-JavaScript -->

<!-- //Custom-JavaScript-File-Links -->


</body>
<!-- //Body -->


</html>

