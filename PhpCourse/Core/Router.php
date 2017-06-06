<?php

/**
 * Created by PhpStorm.
 * User: MTA USER
 * Date: 06/06/2017
 * Time: 13:53
 */
class Router
{
 protected  $routes = [];


 public function add($route, $params){

     $this-> routes[$route] = $params;
 }


    /**
     *
     *  get
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}