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

    public function registration(){
        
    }
    public function checkLogin($login){
        if($login===null){return null;}
        $result = $this->openAndCloseConnection(function(){
            $preparation->$this->dbconnection->prepare('SELECT COUNT(*) FROM users WHERE login = ?');
            $prepartaion->execute($login);
            $result = $preparation->fetchColumn(); 
            $preparation = null;
            return $result;
        });
        return $result;
    }
} 