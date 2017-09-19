<?php
class homeCMSController extends controller{
    public function index(){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $dados = array(
            'titulo' => 'Administrador',
            'usuario' => $u,
            'tipo' => 0,
        );
        $this->loadTemplateCMS('homeCMS', $dados);
    }


}