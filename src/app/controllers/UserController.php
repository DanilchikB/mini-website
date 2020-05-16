<?php


namespace App\Controllers;

use Core\Controller;

class UserController extends Controller{
    public function auth(){
        return $this->View('auth');
    }
}