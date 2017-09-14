<?php
class homeController extends controller{
    public function index($p = 1){
        $dados = array(
            'titulo' => 'Home',
        );
        $this->loadTemplate('home', $dados);
    }
}