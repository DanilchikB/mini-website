<?php

namespace Core;
use Core\Page;

class View{
    public function render(Page $page){
        return $this->renderBaseTemplate($page, $this->renderPage($page));
    }

    //Подготовка вывода страницы
    private function renderPage(Page $page) : string{
        $pagePath = $_SERVER['DOCUMENT_ROOT'].'/mini-website/src/app/views/'.$page->view.'.php';

        if(file_exists($pagePath)) {
            ob_start();
                if(gettype($page->data) == 'array'){
                    extract($data);
                }
                include $pagePath; 
            return ob_get_clean();
        }
    }
    private function renderBaseTemplate(Page $page, string $content) : string{
        $pagePath = $_SERVER['DOCUMENT_ROOT'].'/mini-website/src/app/templates/'.$page->baseTemplate.'.php';
        if(file_exists($pagePath)){
            ob_start();
                include $pagePath; 
            return ob_get_clean();
        }else{
            return $content;
        }
    }
}