<?php

spl_autoload_register(function($class) {
    $dir = __DIR__ . '/' .str_replace('\\', '/', $class) . '.php';
    if(!file_exists($dir)){
        $dirArr = explode('\\', $class);
        for($i = 0; $i < count($dirArr) - 1; $i++){
            $dirArr[$i] = lcfirst($dirArr[$i]);
        }
        $class=implode('/', $dirArr);
        $dir = __DIR__. '/' . $class . '.php';
    }
    
    //echo $dir.'<br>';

    require $dir;
});
