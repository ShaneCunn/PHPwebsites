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
    for (i = list.length; i--;) {
        var weatherType = list[i],
            elements = document.getElementsByClassName(weatherType);
        console.log(elements);
        for (e = elements.length; e--;) {
            icons.set(elements[e], weatherType);
        }
    }
    icons.play();
</script>
<script>
    var icons = new Skycons({"color": "#FFFFFF"}),
        list = [
            "clear-night", "partly-cloudy-day", "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind", "fog"
        ],
        j;
    for (j = list.length; j--;) {
        var weatherType = list[j],
            elements = document.getElementsByClassName(weatherType);
        console.log(elements);
        for (e = elements.length; e--;) {
            icons.set(elements[e], weatherType);
        }
    }
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