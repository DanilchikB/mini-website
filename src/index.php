<?php
    
    namespace Core;

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    spl_autoload_register(function($class) {
        $dir = __DIR__ . '/' .str_replace('\\', '/', $class) . '.php';
        //var_dump($filename);
        require $dir;

    });

    
    

    use Core\Routes;

    

    require_once __DIR__.'/routes.php';
    $b = new Route('a', 'b', 'c');
    $a = Routes::getRoutes();
    
    var_dump($a);
    
    

    
    
