<?php
class produtosController extends controller{
    public function index(){
        $dados = array(
            'titulo' => 'Produtos',
        );
        $this->loadTemplate('produtos', $dados);
    }
}
