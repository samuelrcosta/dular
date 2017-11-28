<?php
class homeController extends controller{
    public function index($p = 1){
        $this->registraAcesso('Home');
        $dados = array(
            'titulo' => 'Home',
        );
        $this->loadTemplate('home', $dados);
    }
}