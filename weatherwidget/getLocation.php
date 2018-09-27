<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 10/10/2017
 * Time: 15:20
 */


if (!isset($_SESSION)) {
    session_start();
}
/*
$test = $_GET['latitude'];
echo 'test hello and lat is: '. $test;
if(!empty($_GET['latitude']) && !empty($_GET['longitude'])){
    //Send request and receive latitude and longitude
    $long = trim($_POST['latitude']);
    $latPOS = trim($_POST['longitude']);
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;

    if($status=="OK"){
        $location = $data->results[0]->formatted_address;
    }else{
        $location =  'No location found.';
    }
    echo $location;

    echo  "<br>Long is: ". $long;
    echo  "<br>LAt is: ". $latPOS;

}
*/


//print_r($_SESSION);

if (!empty($_POST['latitude']) && !empty($_POST['longitude'])) {
    //Send request and receive json data by latitude and longitude
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($_POST['latitude']) . ',' . trim($_POST['longitude']) . '&sensor=false';
    $json = @file_get_contents($url);
    $data = json_decode($json);
    $status = $data->status;
    if ($status == "OK") {
        //Get address from json data
        // $location = $data->results[0]->formatted_address;
        $location = trim($_POST['latitude']) . '<br>' . trim($_POST['longitude']);
    } else {
        $location = '';
    }
//Print address
    //  echo $location;
    echo $_SESSION["lat"] = round(trim($_POST['latitude']), 5);
    echo $_SESSION["long"] = round(trim($_POST['longitude']), 5);


    /*    //echo $country;
    // Darkskies API Section

    // Darkskies api Key
        $appID = "2457a1a06421272ba3217d68bf4f47fa"; // sets the api key

    //$lat = "53.2707"; // latitude location for testing
    //$long = "-9.0568"; // longitude location for testing
    //$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
        $api_URL = "https://api.darksky.net/forecast/" . $appID . "/" . $_SESSION["lat"] . "," . $_SESSION["long"]; // set the api url

        $processDark = curl_init($api_URL); // open the curl process and calls the
        curl_setopt($processDark, CURLOPT_USERAGENT, 1);
        curl_setopt($processDark, CURLOPT_RETURNTRANSFER, 1);
        $returnDark = curl_exec($processDark);
        $resultsDark = json_decode($returnDark, true);
      //  var_dump($resultsDark);*/

}
