<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    require_once __DIR__.'/autoload.php';
    require_once __DIR__.'/routes.php';
    
    use Core\Router;
    use Core\Route;
    use Core\PageService;

    

    $url=explode('?', $_SERVER['REQUEST_URI']);


    
    $nowRoute = Router::getNeededRoute($url[0]);
    $service = new PageService();

    $data=null;
    if($nowRoute->request == 'GET'){
        $data = $_GET;
    }elseif($nowRoute->request == 'POST'){
        $data = $_POST;
    }
    echo $service->getNeededPage($nowRoute, $data);

    
    //echo $_SERVER['DOCUMENT_ROOT'];

    /*if($nowRoute !== null){
        //echo 'ok';
        //echo $nowRoute->controller;
        $nameController = 'Controllers\\'.$nowRoute->controller . 'Controller';
        $controller = new $nameController;
        //echo $controller;
        $action = $nowRoute->action;
        //echo $action;
        $controller->addPage();
        echo $controller->{$nowRoute->action}();
    }else{
        echo '404';
    }*/

    
    

    
    
