<?php

namespace App\Controllers;

use Core\Controller;

class NotFoundController extends Controller{
    public function notFound(){
        return $this->view('NotFound');
    }
}