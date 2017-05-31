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
curl_exec($process);
curl_close($process);