<?php

namespace Core;

use Core\View;
use Core\Page;

abstract class Controller{

    protected $title = null;

    protected function view($page, $data = null){
        return (new View())->renderPage(new Page($page, $data, $this->title));
    }
    

}