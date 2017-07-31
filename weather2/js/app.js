/**
 * Created by shane on 31/07/2017.
 */
/*
var app = angular.module("weatherApp", ['geolocation']);
app.controller("weatherCtrl", function ($scope, $http, geolocation) {
    $.getJSON('https://ipinfo.io/geo', function (response) {
        var loc = response.loc.split(',');
        var coordsy = {latitude: loc[0], longitude: loc[1]};
        var APIKEY = "749a75bb456c097a2535c0631a2b7973";
        var url = "https://api.openweathermap.org/data/2.5/weather?lat=" + coordsy.latitude + "&lon=" + coordsy.longitude + "&APPID=" + APIKEY;
        $http.get(url).then(function (result) {
            $scope.address = result.data;
            var add$ = $scope.address;
            $scope.temperatureC = add$.main.temp - 273.15;
            $scope.temperatureF = add$.main.temp * (9 / 5) - 459.67;
            $scope.cityName = response.city;
            $scope.countryName = add$.sys.country;
            $scope.weatherDesc = add$.weather[0].description;
            $scope.weatherMain = add$.weather[0].main;
            $scope.celsius = "Â°C";
            $scope.fahrenheit = "Â°F";
            $scope.humidity = "Humidity: " + add$.main.humidity + "%";
            $scope.wind = "Wind: " + add$.wind.speed + " m/s";
            $scope.humidityIcon = "wi-humidity";
            $scope.windIcon = "wi-forecast-io-wind";
            $scope.iconCode = add$.weather[0].icon;
            $scope.iconGif = "wi-owm-" + add$.weather[0].id;
            $scope.iconUrl = "http://openweathermap.org/img/w/" + $scope.iconCode + ".png";
            $scope.wiFahrenheit = "wi-fahrenheit";
            $scope.wiCelsius = "wi-celsius";
            $scope.sliderRound = "slider round";
            $scope.changedC = Math.round($scope.temperatureC) + " " + $scope.celsius;
            $scope.changedF = Math.round($scope.temperatureF) + " " + $scope.fahrenheit;
            $scope.changeTemp = function () {
                if (angular.element('input:checked').val() === 'on') {
                    angular.element("#temperature").fadeOut("fast").fadeIn("slow").html($scope.changedC);
                } else {
                    angular.element("#temperature").fadeOut(250).fadeIn("slow").text($scope.changedF);
                }
            };
            $('#info').hide();
        });
    });
});*/
