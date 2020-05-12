<?php

namespace Core;

use App\Controllers\NotFoundController;
use Core\Route;

class PageService{



    //метод показа страницы
    public function getNeededPage(?Route $route, $inputData){
        if($route === null){
            $controller = new NotFoundController;
            return $controller->notFound();
        }else{
            $nameController = 'App\\Controllers\\' . $route->controller . 'Controller';
            $controller = new $nameController;
            if(method_exists($controller, $route->action)){
                return $controller->{$route->action}($inputData);
            }else{
                return "Нет такого метода";
            }

        }
        
    }

}