<?php

namespace Core;
use Core\Page;

class View{


    //Подготовка вывода страницы
    public function renderPage(Page $page) : string{
        $pagePath = $_SERVER['DOCUMENT_ROOT'].'/mini-website/src/app/views/'.$page->view.'.php';

        if (file_exists($pagePath)) {
            ob_start();
                if(gettype($page->data) == 'array'){
                    extract($data);
                }
                include $pagePath; 
            return ob_get_clean();
        }
    }
}