<?php

namespace Core;

use Core\Route;

class Router{
    private static $Router = [];
    
    private function __construct() {}


    public static function get(string $url, string $controller, string $action) : void{
            self::$Router[] = new Route($url, $controller, $action, 'GET');
    }

    public static function post(string $url, string $controller, string $action){
        self::$Router[] = new Route($url, $controller, $action, 'POST');
    }
    
    public static function getRouter() : array{
        return self::$Router;
    }
    public static function getNeededRoute(string $url) : ?Route{
        foreach(self::$Router as $Router){
            if($Router->url == $url){
                return $Router;
            }
        }
        return null;
    }
}