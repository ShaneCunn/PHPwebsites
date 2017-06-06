<?php
/**
 * Created by PhpStorm.
 * User: MTA USER
 * Date: 06/06/2017
 * Time: 12:39
 *
 * Front Controller
 *
 */
//echo "Requested URL= ". $_SERVER['QUERY_STRING'];
//echo "hello shane";
// Routing
require '../Core/Router.php';

$router = new Router();

echo get_class($router);

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

//echo '<pre>';
//var_dump($router->getRoutes());
//echo '</pre>';

$url = $_SERVER['QUERY_STRING'];

if ($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams);
    echo '</pre>';
} else {
    echo "No route found for url '$url'";
}