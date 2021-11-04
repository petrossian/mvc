<?php

namespace vendor\core;
use PDO;

class Db{

    public $pdo;
    protected static $instance;

    protected function __construct(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=arshak', "root", "");
    }

    public static function instance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}