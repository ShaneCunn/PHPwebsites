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

require '../Core/Router.php';

$router = new Router();

echo  get_class($router);

$router->add('',['controller'=>'Home', 'action' => 'index']);
$router->add('posts',['controller'=>'Post', 'action' => 'index']);
$router->add('posts/new',['controller'=>'Post', 'action' => 'index']);

echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';