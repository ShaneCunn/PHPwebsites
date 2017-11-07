<head>
    <title>PHP Weather Widget </title>

    <!-- For-Mobile-Apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="PHP Weather Widget Responsive"/>
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
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico'/>
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
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
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
            });}</script>

</head>
<!-- Head -->
