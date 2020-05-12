<?php

namespace Core;

class Page{

    private $title;
    private $data;
    private $view;

    public function __construct($view, $data, $title)
    {
        $this->title = $title;
        $this->view = $view;
        $this->data = $data;
    }
        
    public function __get($property)
    {
        return $this->$property;
    }


}