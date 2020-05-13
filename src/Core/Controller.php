<?php

namespace Core;

use Core\View;
use Core\Page;

abstract class Controller{

    protected $title = null;
    protected $baseTemplate = 'default';

    protected function view($page, $data = null){
        return (new View())->render(new Page($page, $data, $this->title, $this->baseTemplate));
    }
    

}