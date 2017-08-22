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
                        <canvas class="<?php echo $icon ?>" width="70" class="w3-agileits" height="70"></canvas>
                    </figure>
                </div>
                <div class="w3temperatureaits-grid w3-agile wthreestats">
                    <ul>
                        <li class="agiletemp agiletemppressure"><?php echo round($airPressure); ?> mBar</li>
                        <li class="agiletemp wthree agiletemphumidity w3-agile"><?php echo $humidity; ?> Humidity</li>
                        <li class="agiletemp agileits-w3layouts agileinfo agiletempwind"><?php echo $wind . " Mph " . $direction; ?></li>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>

            <div id="owl-demo" class="owl-carousel agileits text-center">
                <?php
                $count = 1;
                array_shift($dailyCond); // removes the first element from the array
                foreach ($dailyCond as $cond) {
                    if ($count == 1) {
                        $var1 = " agileinfo "; // change value of the first day to a different css property
                    } else {
                        $var1 = ""; // change it back to nothing for the rest of the for loops
                    }
                    $wTempHigh = round(($cond['temperatureMax'] - 32) / 1.8, 0); // sets the variable and convert temperature from fahrenheit
                    $wTempLow = round(($cond['temperatureMin'] - 32) / 1.8, 0);
                    $wTime = $cond['time'];
                    $wIcon = $cond['icon'];
                    echo '<div class="item w3threeitem ' . $var1 . ' w3threeitem' . $count . '">
                    <h4>' . date("l", $wTime) . '</h4>
                    <figure class="icons agileits w3layouts">
                        <canvas class="' . $wIcon . '" width="50" height="50"></canvas>
                    </figure>
                    <h5>' . $wTempHigh . '°C</h5>
                    <h6>' . $wTempLow . '°C</h6></div>';
                    $count++;

                }

                ?>


            </div>

        </div>
    </div>
    <!-- //Current-Weather-Widget -->

</div>
<!-- //Container -->