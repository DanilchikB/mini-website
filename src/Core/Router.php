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

            $partsUrl['partsUrl'] = [];
            $partsUrl['variables'] = [];

            if(Helpers::checkCharacterInString($url, '$')){
                $partsUrl = self::getVariablesInRequestAndPartsUrl($url);
            }else{
                $partsUrl['partsUrl'] = explode('/',$url);
                $partsUrl['partsUrl'] = Helpers::removeElementFromArray($partsUrl['partsUrl']);
            }
            if(count($partsUrl['variables']) == 0){
                $partsUrl['variables'] = null;
            }

            self::$Routes[] = new Route($partsUrl['partsUrl'], 
                $controller, 
                $action, 
                'GET', 
                $partsUrl['variables']);

    }

    public static function post(string $url, string $controller, string $action){
        $partsUrl = explode('/',$url);
        $partsUrl = Helpers::removeElementFromArray($partsUrl);
        self::$Routes[] = new Route($partsUrl, $controller, $action, 'POST');
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
                return $route;
            }

        }
        return null;
    }

    //проверить роутер
    private static function checkRoute(array $partsInputUrl, array $partsRouteUrl): bool {
        if(count($partsInputUrl)!=count($partsRouteUrl)){
            return false;
        }
        for($i = 0; $i < count($partsRouteUrl); $i++){
            if($partsRouteUrl[$i] == null){
                continue;
            }
            if($partsRouteUrl[$i] != $partsInputUrl[$i]){
                return false;
            }
        }
        return true;
    }

    //разграничение url и переменных
    private static function getVariablesInRequestAndPartsUrl(string $url) : array{
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
    }

    
}