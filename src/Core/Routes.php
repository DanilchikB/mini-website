<?php
namespace Core;

use Core\Route;

class Routes{
    private static $routes = [];
    
    private function __construct() {}


    public static function get(string $url, string $controller, string $action) : void{
            self::$routes[] = new Route($url, $controller, $action);
    }
    
    public static function getRoutes() : array{
        return self::$routes;
    }
    public static function getNeededRoute(string $url) : Route{
        foreach(self::$routes as $routes){
            if($routes->url == $url){
                return $routes;
            }
            return null;
        }
    }
}