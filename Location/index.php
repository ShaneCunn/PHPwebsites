
<?php $api_key = "AIzaSyAnqhc-BZsicxhFbb09gT-dOPVUFywr93I"; //Your API KEY. Make one here: https://developers.google.com/maps/documentation/javascript/get-api-key#key?>
<!DOCTYPE>
<html>
<head>
    <title>Get Visitor's Current Location using PHP and JQuery</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maps.google.com/maps/api/js?key=<?=$api_key ?>"></script>
    <script src="javascript/gmaps.js"></script>
    <style type="text/css">
        #container{ color:  #116997; border: 2px solid #0b557b; border-radius: 5px;}
        p{ font-size: 15px; font-weight: bold;}
        #map {
            width: 400px;
            height: 400px;
        }
    </style>
</head>
<body>
<script type="text/javascript">
    function getlocation() {
        if (navigator.geolocation) {
            if(document.getElementById('location').innerHTML == '') {
                navigator.geolocation.getCurrentPosition(visitorLocation);
            }
        } else {
            $('#location').html('This browser does not support Geolocation Service.');
        }
    }
    function visitorLocation(position) {
        var lat = position.coords.latitude;
        var long = position.coords.longitude;
        $.ajax({
            type:'POST',
            url:'get_location.php',
            data:'latitude='+lat+'&longitude='+long,
            success:function(address){
                if(address){
                    $("#location").html(address);
                }else{
                    $("#location").html('Not Available');
                }
            }
        });
        var map = new GMaps({
            el: '#map',
            lat: lat,
            lng: long,
            zoom: 16
        });

    }



</script>



<div id="container"><p>Your Current Location: <span id="location"></span></p></div>
<br>
<div id="map"></div>

</body>

<script>window.onload = getlocation();</script>
</html>
