<?php
class homeController extends controller{
    public function index($p = 1){
        $this->registraAcesso('Home');
        $dados = array(
            'titulo' => 'Enxovais DuLar - Cama Mesa Banho e Deceoração',
        );
        $this->loadTemplate('home', $dados);
    }
}