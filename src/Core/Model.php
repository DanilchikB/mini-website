<?php

namespace Core;

use PDO;

abstract class Model{
    private $connectData = null;
    protected $dbconnection = null;






    private function formationOfConnection(){
        if($this->connectData === null){
            $settings = require $_SERVER['DOCUMENT_ROOT'].'/mini-website/src/app/settings/settings.php';
            $this->connectData = 'pgsql:host='.$settings['host'].';
                                  port='.$settings['port'].';
                                  dbname='.$settings['dbname'].';
                                  user='.$settings['user'].';
                                  password='.$settings['password'];
        }
    }
    //Запрос без возврата
    protected function queryNoReturn(string $query, array $data):bool{
        if($query != '' || $query != null){
            $result = $this->openAndCloseConnection(function() use ($query, $data){
                    $preparation=$this->dbconnection->prepare($query);
                    if($preparation->execute($data)){
                        $preparation = null;
                        return true;
                    }else{
                        $preparation = null;
                        return false;
                    }
                }
            );
            return $result;
        }
        return false;
    }
    //Закрытие и открытие базы данных
    protected function openAndCloseConnection($function){
        try {
            $this->formationOfConnection();
            $this->dbconnection = new PDO($this->connectData);

            $result = $function();

            $this->dbconnection = null;
            return $result;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    
}