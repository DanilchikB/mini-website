<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    require_once __DIR__.'/autoload.php';
    require_once __DIR__.'/routes.php';
    
    use Core\Router;
    use Core\Route;

    use Controllers\HomeController;

    $url=explode('?', $_SERVER['REQUEST_URI']);
 

    $nowRoute = Router::getNeededRoute($url[0]);
    if($nowRoute !== null){
        echo 'ok';
        echo $nowRoute->controller;
        $nameController = $nowRoute->controller . 'Controller';
        $controller = new HomeController;
        $action = $nowRoute->action;
        echo $action;
        $controller->addPage();
        echo $controller->{$nowRoute->action}();
    }else{
        echo '404';
    }

    
    

    
    
