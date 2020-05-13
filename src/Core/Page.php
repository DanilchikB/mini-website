<?php

namespace Core;

class Page{

    private $title;
    private $data;
    private $view;
    private $baseTemplate;

    public function __construct($view, $data, $title, $baseTemplate)
    {
        $this->title = $title;
        $this->view = $view;
        $this->data = $data;
        $this->baseTemplate = $baseTemplate;
    }
        
    public function __get($property)
    {
        return $this->$property;
    }


}