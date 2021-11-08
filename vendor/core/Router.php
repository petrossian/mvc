<?php

namespace vendor\core;

use Exception;

class Router{

    public $routes = [];
    public $route = [];
    public $currentKey;

    public function add($key, $route){
        $this->currentKey = $key;
        $this->routes[$key] = $route;

        return $this;
    }

    public function match($regexp) {
        $this->routes[$this->currentKey]['match'] = $regexp;

        $this->currentKey = null;
        return $this;
    }

    public function getRoute(){
        return $this->route;
    }
    public function getRoutes(){
        return $this->routes;
    }

    public function compare($url){
        foreach($this->routes as $key => $value){
            if(preg_match("~$key~", $url, $matches)){
                $this->route = $value;
                if(isset($matches['alias'])){
                    $this->route['alias'] = $matches['alias'];
                }else{
                    $this->route['alias'] = "";
                }
                
                return true;
            }
        }
        // foreach($this->routes as $key => $value){
        //     if(isset($value['match'])){
        //         debug($key);
        //         debug($value['match']);
        //         if(preg_match($key, $url, $matches)){
        //             $this->route = $value;
        //             debug($matches);
        //             return true;
        //         }
        //     }
        // }
        return false;
    }

    public function dispatcher(){
        $controller_path =  ROOT . '/app/controllers/' . $this->route['controller'];
        require $controller_path . '.php';
        $controller = $this->route['controller'];
        if(class_exists($controller)){
            $c_obj = new $controller();  
            $action = $this->lowerCamelCase($this->route['action']);
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

    protected function lowerCamelCase($action){
        return $action = lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $action))));
    }

}