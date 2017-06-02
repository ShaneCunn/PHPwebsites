<?php
/**
 * Created by PhpStorm.
 * User: MTA USER
 * Date: 02/06/2017
 * Time: 11:36
 */

 $city = "galway";
//$country = $_GET['country'];
$country = "ireland";

$appID = "&appid=775158c1c823e0fc9aa77299bc16461c";
$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country . $appID;
$username = 'mikethefrog';
$url = 'https://api.github.com/users/treehouse';
$process = curl_init($api_url);
curl_setopt($process, CURLOPT_USERAGENT, 1);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
$return = curl_exec($process);
$results = json_decode($return);
var_dump($results);
echo '<h1>"' . $results-> . '" <h1/>';
curl_close($process);