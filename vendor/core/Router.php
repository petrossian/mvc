<?php

namespace vendor\core;

class Router{

    public $routes = [];
    public $route = [];

    public function add($key, $route){
        $this->routes[$key] = $route;
    }

    public function getRoute(){
        return $this->route;
    }
    public function getRoutes(){
        return $this->routes;
    }

    public function compare($url){
        foreach($this->routes as $key => $value){
            if($url === $key){
                $this->route = $value;
                $this->dispatcher($this->route);
            }
        }
    }

    public function dispatcher($route = []){
        $controller =  '../../app/controllers/'.$route['controller']  . 'Controller.php';
        var_dump( $controller);
        die;
        require $controller;
        new $controller(); 
    }

}