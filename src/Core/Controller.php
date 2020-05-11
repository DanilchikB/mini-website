<?php

namespace Core;

use Core\View;

abstract class Controller{

    protected $page;

    protected function view(){
        return new View;
    }
    public function getPage(){
        return $this->page;
    }

}