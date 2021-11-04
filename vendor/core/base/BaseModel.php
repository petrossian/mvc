<?php

namespace vendor\core\base;

use vendor\core\Db;

class BaseModel{

    public $pdo;

    public function __construct(){
        $this->pdo = Db::instance();
    }

}