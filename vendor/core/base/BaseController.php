<?php

namespace vendor\core\base;

abstract class BaseController{

    public $route = [];
    public $data = [];

    public function getView($route = []){
        $this->route = $route;
        $v_obj = new BaseView($this->route['action'], LAYOUT, $this->route['controller'], $this->route['alias']);
        $v_obj->render($this->data);
    }

    public function setData($data = []){
        $this->data = $data;
    }

}