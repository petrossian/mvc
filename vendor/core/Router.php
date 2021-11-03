<?php

namespace vendor\core;

use Exception;

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
                return true;
            }
        }
        return false;
    }

    public function dispatcher(){
        $controller_path =  ROOT . '/app/controllers/' . $this->route['controller'];
        require $controller_path . '.php';
        $controller = $this->route['controller'];
        if(class_exists($controller)){
            $c_obj = new $controller();  
            $action = $this->route['action'];
            if(method_exists($c_obj, $action)){
                $c_obj->$action();
                $c_obj->getView($this->route);
            }else{
                echo "false route [action]";
            }
        }else{
            echo "false route [controller]";
        }
    }

}