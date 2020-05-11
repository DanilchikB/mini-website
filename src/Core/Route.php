<?php

namespace Core;

class Route{

    private $routes = [];
    
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