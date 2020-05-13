<?php

namespace Core;

class Route{

    private $url = [];
    private $controller;
    private $action;
    private $variablesInRequest;
    private $request;
    
    public function __construct(array $url, string $controller, string $action, string $request, ?array $var = null){
        $this->url = $url;
        $this->controller = $controller;
        $this->action = $action;
        $this->request = $request;
        $this->variablesInRequest = $var;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}