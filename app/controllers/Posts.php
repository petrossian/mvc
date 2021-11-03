<?php

use vendor\core\base\BaseController;

class Posts extends BaseController{

    public function index(){
        
    }

    public function new(){
        $this->setData(['name'=>'Arshak', 'id'=>1]);
    }

}
