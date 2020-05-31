<?php
/*
  В get заросах можно использовать переменные в url вида '/test/$variables', в post - нельзя!
*/

use Core\Route;
use Core\Router;

//Router::get('path', 'controller', 'action');

Router::get('/', 'Home', 'index');

//Router::get('/user/$name/$id', 'User', 'addPage');




//Пользователи
//регистрация 
//get
Router::get('/user/registration', 'User', 'formRegistration');
//post
Router::post('/check/registration', 'User', 'registration');
Router::json('/check/login', 'User', 'checkLogin');

//Авторизация

Router::get('/user/auth', 'User', 'formAuthorization');
Router::post('/check/authorization', 'User', 'authorization');
Router::json('/check/user', 'User', 'checkUser');

Router::get('/user/logout', 'User', 'logout');
Router::get('/user/$id', 'User', 'user');





