<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 31/05/2017
 * Time: 10:51
 */


$username = 'shanecunn';
$url = 'https://api.github.com/users/shanecunn';
$process = curl_init($url);
curl_setopt($process, CURLOPT_USERAGENT, $username);
curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);

$return = curl_exec($process);
$results = json_decode($return);
//var_dump($results);
echo '<img src="' . $results->avatar_url . '" />';
curl_close($process);