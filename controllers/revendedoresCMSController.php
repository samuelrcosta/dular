<?php
class revendedoresCMSController extends controller{
    public function index()
    {
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $r = new Revendedores();
        $revendedores = $r->getRevendedores();
        $dados = array(
            'titulo' => 'ADM - Revendedores',
            'usuario' => $u,
            'tipo' => 3,
            'revendedores' => $revendedores,
        );
        $this->loadTemplateCMS('revendedoresCMS', $dados);
    }

    public function abrir($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $r = new Revendedores();
        $revendedor = $r->getRevendedor(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'ADM - Revendedores',
            'usuario' => $u,
            'tipo' => 3,
            'revendedor' => $revendedor,
        );
        $this->loadTemplateCMS('abrirRevendedorCMS', $dados);
    }

    public function editar($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $r = new Revendedores();
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $rg = addslashes($_POST['rg']);
            $celular = addslashes($_POST['celular']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $endereco = addslashes($_POST['endereco']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $cep = addslashes($_POST['cep']);
            $estado = addslashes($_POST['estado']);
            $status = addslashes($_POST['status']);
            $r->editarRevendedor(base64_decode(base64_decode($id)), $nome, $cpf, $rg, $celular, $telefone, $email, $endereco, $bairro, $cidade, $cep, $estado, $status);
            header("Location: ".BASE_URL."/revendedoresCMS/abrir/".$id);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $revendedor = $r->getRevendedor(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'ADM - Revendedores',
            'usuario' => $u,
            'tipo' => 3,
            'revendedor' => $revendedor,
        );
        $this->loadTemplateCMS('editarRevendedorCMS', $dados);
    }

    public function responder(){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $assunto = addslashes($_POST['assunto']);
        $mensagem = addslashes(nl2br($_POST['mensagem']));
        $r = new Revendedores();
        if($r->enviarEmailComTemplate($nome, $email, $assunto, $mensagem) == True){
            echo "1";
        }else{
            echo "Erro";
        }

    }

    public function excluir($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $r = new Revendedores();
        $r->excluirRevendedor(base64_decode(base64_decode($id)));
        echo "1";
    }
}