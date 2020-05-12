<?php

namespace Core;

class Route{

    private $url;
    private $controller;
    private $action;
    private $request;
    
    public function __construct($url, $controller, $action, $request){
        $this->url = $url;
        $this->controller = $controller;
        $this->action = $action;
        $this->request = $request;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}