<?php

spl_autoload_register(function($class) {
    $dir = str_replace('tests', '', __DIR__) . 'src/' .str_replace('\\', '/', $class) . '.php';
    require $dir;

});