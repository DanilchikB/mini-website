<?php


namespace App\Controllers;

use Core\Controller;
use App\Models\UserModel;

class UserController extends Controller{

    //GET
    public function user(){
        session_start([
            'read_and_close' => true
        ]);
        if(empty($_SESSION['auth'])){
            header('Location: /user/auth');
        }
        $this->title = 'user'.$_SESSION['id'];
        return $this->view('user');
    }

    //GET
    public function formAuthorization(){
        $this->title = 'Авторизация';
        return $this->view('auth');
    }



    //GET
    public function formRegistration(){
        $this->title = 'Регистрация';
        return $this->view('registration');
    }
    

    //POST
    public function registration($data){
        $db = new UserModel();
        $db -> registration($data);
    }

    //POST
    public function authorization($data){
        session_start();
        $db=new UserModel();
        $result = $db->checkLoginAndPassword($data);
        if($result === null){
            header('Location: /user/auth');
        }else{
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $result;
            header('Location: /user');
        }
        session_write_close();
    }

    //POST
    public function checkLogin($data){

        $db=new UserModel();
        $result = $db->checkLogin($data['login']);
        return json_encode($result);

    }
    //POST
    public function checkUser($data){
        $db=new UserModel();
        $result = $db->checkLoginAndPassword($data);
        if($result !== null){
            $result = true;
        }else{
            $result = false;
        }
        return json_encode($result);
    }
}