<?php

namespace Core;

class Route{

    private $url;
    private $controller;
    private $action;
    
    public function __construct($url, $controller, $action){
        $this->url = $url;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}