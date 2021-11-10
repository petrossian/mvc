<?php

namespace vendor\core;

class ErrorHandler{

    public static $route = [];

    public function __construct(){
        if(DEBUG){
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_error_handler([$this, "ErrorHandler"]);
        ob_start();
        register_shutdown_function([$this, "FatalErrorHandler"]);
    }

    public static function getRoute($route){
        self::$route = $route;
    }

    public function ErrorHandler($error_code, $error_text, $error_file, $error_line){
        if(DEBUG){
            require dirname(__DIR__)."/../public/404.php";
        }else{
            require dirname(__DIR__)."/../public/user_404.php";
        }
    }

    public function FatalErrorHandler(){
        $error = error_get_last();
        $error_code = $error['type'];
        $error_text = $error['message'];
        $error_line = $error['line'];
        $error_file = $error['file'];
        debug($error);
        if(!empty($error) && ($error['type'] & E_FATAL)){
            ob_end_clean();
            if(DEBUG){
                require dirname(__DIR__)."/../public/404.php";
            }else{
                require dirname(__DIR__)."/../public/user_404.php";
            }
        }else{
            ob_end_flush();
        }
        
    }

}

