<?php
class homeController extends controller{
    public function index($p = 1){
        $this->registraAcesso('Home');
        $dados = array(
            'titulo' => 'Enxovais DuLar - Cama Mesa Banho e Deceoração',
            'description' => 'Seja um revendedor DuLar, os melhores preços nas melhores condições de pagamento, produtos diretos da fábrica. Indústria localizada em Inhumas-GO, tudo de cama, mesa, banho e decoração. Sua família merece!.'
        );
        $this->loadTemplate('home', $dados);
    }
}