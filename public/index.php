<?php

use vendor\core\ErrorHandler;
use vendor\core\Router;
require '../vendor/functions.php';

session_start();

define('ROOT', dirname(__DIR__));
define('WWW', __DIR__);
define('LAYOUT', 'main');
define("DEBUG", false);
define('E_FATAL',  E_ERROR | E_USER_ERROR | E_PARSE | E_CORE_ERROR | 
        E_COMPILE_ERROR | E_RECOVERABLE_ERROR);

$url = $_SERVER['QUERY_STRING'];
// $url = rtrim($_SERVER['QUERY_STRING'], '/');

spl_autoload_register(function ($class) {
    $file = dirname(__DIR__). '/' . str_replace('\\', '/', $class) . '.php';
    if(file_exists($file)){
        require $file;
    }
});

$router = new Router();   

$router->add('^$', ['controller'=>'Main', 'action'=>'index']);
$router->add('user/sign-in', ['controller'=>'User', 'action'=>'sign-in']);
$router->add('user/sign-up', ['controller'=>'User', 'action'=>'sign-up']);
$router->add('user/do-sign-in', ['controller'=>'User', 'action'=>'do-sign-in']);
$router->add('user/do-sign-up', ['controller'=>'User', 'action'=>'do-sign-up']);
$router->add('^user/home/?(?P<alias>[0-9]+)$', ['controller'=>'User', 'action'=>'home']);
$router->add('^user/account/?(?P<alias>[0-9]+)?$', ['controller'=>'User', 'action'=>'account']);
$router->add('user/sign-out', ['controller'=>'User', 'action'=>'sign-out']);
$router->add('user/upload', ['controller'=>'User', 'action'=>'upload']);
$router->add('user/new-post', ['controller'=>'User', 'action'=>'new-post']);
$router->add('user/add-new-post', ['controller'=>'User', 'action'=>'add-new-post']);

// $router->add('user/home/[id]', ['controller'=>'User', 'action'=>'home'])->match('[0-9]');
new ErrorHandler();

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
        if(DEBUG){
            require "404.php";die;
        }else{
            require "user_404.php";die;
        }
    }
}

