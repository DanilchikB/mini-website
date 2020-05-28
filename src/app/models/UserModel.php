<?php
namespace App\Models;

use Core\Model;

class UserModel extends Model{
    public function view(){
        $this->openAndCloseConnection(function(){
            foreach($this->dbconnection->query('SELECT * from test') as $row) {
                print_r($row);
            }
        });
    }

    public function registration($data){
        if($this->checkRegistration($data)){
            $result = $this->queryNoReturn('INSERT INTO users (login, password) VALUES (?, ?)', 
                array($data['login'], 
                password_hash($data['password'],PASSWORD_DEFAULT)));
            if($result){
                header('Location: /user/auth');
            }else{
                return 404;
            }
        }
    }

    public function checkLoginAndPassword($data){
        $result = $this->queryOneRowReturn('SELECT id, password FROM users WHERE login = ?', 
            array($data['login']));
        if($result !== null){
            if(password_verify($data['password'],$result['password'])){
                return $result['id'];
            }else{
                return null;
            }
        }
        return $result;
    }

    public function checkLogin(string $login):?bool{
        if($login===null){return null;}
        $result = $this->openAndCloseConnection(function() use ($login){
            $preparation=$this->dbconnection->prepare('SELECT COUNT(*) FROM users WHERE login = ?');
            $preparation->execute(array($login));
            $result = $preparation->fetchColumn(); 
            $preparation = null;
            return $result;
        });
        if($result != 0){
            return true;
        }
        return false;
    }

    private function checkRegistration($data):bool{
        if(mb_strlen($data["login"])<5 || mb_strlen($data["password"])<5 || $this->checkLogin($data['login'])){
            return false;
        }
        return true;
    }
} 