<?php


namespace App\Controllers;

use Core\Controller;
use App\Models\UserModel;

class UserController extends Controller{

    //GET
    public function user($request){
        if(empty($_SESSION['auth'])){
            header('Location: /user/auth');
        }
        $db = new UserModel();
        $id = $request['id'];
        $error = null;
        $login = null;
        if(is_numeric($request['id'])){
            $result = $db->getLogin($id);
            if($result !== null){
                $login = $result['login'];
                $this->title = $login;
            }else{
                $error = "Нет такого пользователя";
                $this->title = "Неизвестный пользователь";
            }
        }else{
            $error = "id не должен быть строкой";
            $this->title = "Неизвестный пользователь";
        }
        
        return $this->view('user', array('username'=> $login,
                                         'id'=> $id,
                                         'error'=>$error));
    }

    //GET
    public function formAuthorization(){
        if(!empty($_SESSION['auth'])){
            header('Location: /user/'.$_SESSION['id']);
        }
        $this->title = 'Авторизация';
        return $this->view('auth');
    }



    //GET
    public function formRegistration(){
        if(!empty($_SESSION['auth'])){
            
        }
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
        $db=new UserModel();
        $result = $db->checkLoginAndPassword($data);
        if($result === null){
            header('Location: /user/auth');
        }else{
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $result;
            header('Location: /user/'.$result);
        }
    }
    public function logout(){
        $_SESSION['auth'] = null;
        $_SESSION['id'] = null;
        header('Location: /user/auth');
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
