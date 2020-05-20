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