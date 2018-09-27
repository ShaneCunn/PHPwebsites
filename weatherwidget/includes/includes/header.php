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

    <!-- //Font-Awesome-File-Links -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showLocation);
                // console.log(  navigator.geolocation.getCurrentPosition(showLocation));
            } else {
                $('#location').html('Geolocation is not supported by this browser.');
            }
        });

        function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
          //  console.log(latitude);
         //   console.log(longitude);

            $.ajax({
                type: 'POST',
                url: 'getLocation.php',
                data: 'latitude=' + latitude + '&longitude=' + longitude,
                success: function (msg) {
                    if (msg) {
                      //  $("#location").html(msg);
                        console.log(msg);
                    } else {
                       // $("#location").html('Not Available');
                    }
                }
            });
        }
    </script>

</head>
<!-- Head -->
