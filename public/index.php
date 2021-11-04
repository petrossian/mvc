<?php

use vendor\core\Router;
require '../vendor/functions.php';

define('ROOT', dirname(__DIR__));
define('LAYOUT', 'main');

$url = rtrim($_SERVER['QUERY_STRING'], '/');

spl_autoload_register(function ($class) {
    $file = dirname(__DIR__). '/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($file)){
        require $file;
    }
});

$router = new Router();   

$router->add('', ['controller'=>'Main', 'action'=>'index']);
$router->add('user/sign-in', ['controller'=>'User', 'action'=>'sign-in']);
$router->add('user/sign-up', ['controller'=>'User', 'action'=>'sign-up']);


if($router->compare($url)){
    $router->dispatcher();
}else{
    try{
        throw new Exception("false route", 404);
    }catch(Exception $e){
        $error_text = $e->getMessage();
        $error_line = $e->getLine();
        $error_file = $e->getFile();
        $error_code = $e->getCode();
        require '404.php';
    }
}


