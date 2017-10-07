<?php
class controller extends model{
    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
    public function loadTemplate($viewName, $viewData = array()){
        extract($viewData);
        require 'views/template.php';
    }

    public function loadTemplateCMS($viewName, $viewData = array()){
        extract($viewData);
        require 'views/templateCMS.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }

    public function tirarAcentos($string){
        return str_replace("ç", "c", preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string));
    }
}