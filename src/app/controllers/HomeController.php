<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller{
    public function addPage($d,$a){

        $this->title = 'test';

        
        


        return $this->View('index', 'asd');
    }

}