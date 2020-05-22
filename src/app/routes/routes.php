<?php
/*
  В get заросах можно использовать переменные в url вида '/test/$variables', в post - нельзя!
*/

use Core\Route;
use Core\Router;

//Router::get('path', 'controller', 'action');

Router::get('/home/', 'Home', 'addPage');

Router::get('/user/$name/$id', 'User', 'addPage');

Router::get('/user/auth', 'User', 'auth');


//Пользователи
//регистрация 
//get
Router::get('/user/registration', 'User', 'formRegistration');
//post
Router::post('/check/registration', 'User', 'registration');
Router::json('/check/login', 'User', 'checkLogin');





