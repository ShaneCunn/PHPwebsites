<?php
/**
 * Created by PhpStorm.
 * User: MTA USER
 * Date: 31/05/2017
 * Time: 13:58
 */

require __DIR__ . '/vendor/autoload.php';
$api  = new Milo\Github\Api;

$url = 'https://api.github.com/users/shanecunn';
$response = $api->get($url);

$user = $api -> decode($response);

echo '<img src="' . $user->avatar_url . '" />';
