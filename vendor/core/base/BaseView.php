<?php

namespace vendor\core\base;

class BaseView{

    public $view = "";
    public $layout = "";
    public $controller = "";

    public function __construct($view = "", $layout = "", $controller = ""){
        $this->view = $view;
        $this->layout = $layout;
        $this->controller = $controller;
    }
   
    public function render($data){

        $view = ROOT . '/app/views/' . $this->controller . '/' . $this->view . '.php';
        ob_start();
        if(is_file($view)){
            require $view;
        }else{
            echo "404";
        }
        $content = ob_get_clean();

        $layout = ROOT . '/app/views/layouts/layout.php';
        if(is_file($layout)){
            require $layout;
        }else{
            echo "404";
        }
        
    }

}