<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 10/10/2017
 * Time: 15:20
 */
if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    //Send request and receive latitude and longitude
    $long = trim($_POST['latitude']);
    $latPOS = trim($_POST['longitude']);
    $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&sensor=false';
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




?>