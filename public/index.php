<?php

use vendor\core\Router;
require '../vendor/functions.php';

var_dump(__FILE__);

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
$router->add('posts/index', ['controller'=>'Posts', 'action'=>'index']);
$router->add('posts/new', ['controller'=>'Posts', 'action'=>'new']);


if($router->compare($url)){
    $router->dispatcher();
}else{
    echo '404';
}


