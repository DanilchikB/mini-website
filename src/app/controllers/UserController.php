<?php


namespace App\Controllers;

use Core\Controller;
use App\Models\UserModel;

class UserController extends Controller{
    public function auth(){


        return $this->view('auth');
    }
    //GET
    public function formRegistration(){
        return $this->view('registration');
    }
    //POST
    public function registration($data){
        $db = new UserModel();
        $db -> registration($data);
    }
    //POST
    public function checkLogin($data){

        $db=new UserModel();
        $result = $db->checkLogin($data['login']);
        return json_encode($result);

    }
}