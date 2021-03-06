<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    require_once __DIR__.'/autoload.php';
    require_once __DIR__.'/app/routes/routes.php';
    
    use Core\Router;
    use Core\Route;
    use Core\PageService;

    

    $url=explode('?', $_SERVER['REQUEST_URI']);

    //echo $url[0];
    
    $nowRoute = Router::getNeededRoute($url[0]);
    $service = new PageService();
    $data=null;

    if($nowRoute != null){
        if($nowRoute->request == 'GET'){
            if($_GET){
                $data = $_GET;
            }else{
                $data = null;
            }
        }elseif($nowRoute->request == 'POST'){
            $data = $_POST;
        }elseif($nowRoute->request == 'REQUEST_BODY'){
            $data = json_decode(file_get_contents('php://input'), true);
        }
    }
    $result = $service->getNeededPage($nowRoute, $data);
    if($result!=null){
        echo $result;
    }
    
    
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

    
    

    
    
