<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller{
    public function Index(){

        $this->title = 'Hello!';

        
        


        return $this->view('index');
    }

}