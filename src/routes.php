<?php
/*
  В get заросах можно использовать переменные в url вида '/test/$variables', в post - нельзя!
*/

use Core\Router;

//Router::get('path', 'controller', 'action');

Router::get('/', 'Home', 'addPage');

Router::get('/user/$name','User','addPage');





