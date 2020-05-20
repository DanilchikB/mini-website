<?php

namespace Core;

use Core\Route;
use Helpers\Helpers;

class Router{
    private static $Routes = [];
    
    private function __construct() {}


    public static function get(string $url, 
                               string $controller, 
                               string $action ) : void{

        self::formationRoute($url, $controller, $action, 'GET');

    }

    public static function post(string $url, string $controller, string $action){
        self::formationRoute($url, $controller, $action, 'POST');
    }

    public static function json(string $url, string $controller, string $action){
        
        self::formationRoute($url, $controller, $action, 'REQUEST_BODY');
    }
    
    public static function getRoutes() : array{
        return self::$Routes;
    }
    //получить нужный роутер
    public static function getNeededRoute(string $url) : ?Route{
        $partsInputUrl = explode('/',$url);
        $partsInputUrl = Helpers::removeElementFromArray($partsInputUrl);
        foreach(self::$Routes as $route){
            if(self::checkRoute($partsInputUrl, $route->url)){
                self::addVariablesInRequest($route, $partsInputUrl);
                return $route;
            }

        }
        return null;
    }
    //Формирование роутера
    private static function formationRoute(string $url, string $controller, string $action, string $request){
        $partsUrl = explode('/',$url);
        $partsUrl = Helpers::removeElementFromArray($partsUrl);
        self::$Routes[] = new Route($partsUrl, $controller, $action, $request);
    }
    //передача переменных из url
    private static function addVariablesInRequest(Route $route, array $partsUrl) : void{
        for($i=0;$i < count($route->url); $i++){
            if( $route->url[$i] == $partsUrl[$i]){
                continue;
            }else{
                $key = str_replace('$', '', $route->url[$i]);
                $route->setVariablesInRequest($key, $partsUrl[$i]);
            }
        }
    }
    //проверить роутер
    private static function checkRoute(array $partsInputUrl, array $partsRouteUrl): bool {
        if(count($partsInputUrl)!=count($partsRouteUrl)){
            return false;
        }
        for($i = 0; $i < count($partsRouteUrl); $i++){
            if(Helpers::checkCharacterInString($partsRouteUrl[$i], '$')){
                continue;
            }
            if($partsRouteUrl[$i] != $partsInputUrl[$i]){
                return false;
            }
        }
        return true;
    }

    //разграничение url и переменных
    /*private static function getVariablesInRequestAndPartsUrl(string $url) : array{
        $array['variables'] = [];
        $array['partsUrl'] = [];
        $partsUrl = explode('/',$url);
        foreach($partsUrl as $part){
            if(Helpers::checkCharacterInString($part, '$')){
                $array['variables'][] = str_replace('$', '', $part);
                $array['partsUrl'][] = null;
            }else if($part != ''){
                $array['partsUrl'][] = $part;
            }
        }
        return $array;
    }*/

    
}