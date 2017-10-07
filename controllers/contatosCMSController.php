<?php
class contatosCMSController extends controller{
    public function index()
    {
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $c = new Contatos();
        $contatos = $c->getContatos();
        $dados = array(
            'titulo' => 'ADM - Contatos',
            'usuario' => $u,
            'tipo' => 4,
            'contatos' => $contatos,
        );
        $this->loadTemplateCMS('ContatosCMS', $dados);
    }

    public function abrir($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $c = new Contatos();
        $contato = $c->getContato(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'ADM - Contatos',
            'usuario' => $u,
            'tipo' => 4,
            'contato' => $contato,
        );
        $this->loadTemplateCMS('abrirContatoCMS', $dados);
    }

    public function editar($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $c = new Contatos();
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $celular = addslashes($_POST['celular']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $assunto = addslashes($_POST['assunto']);
            $mensagem = addslashes($_POST['mensagem']);
            $status = addslashes($_POST['status']);
            $c->editarContato(base64_decode(base64_decode($id)), $nome, $celular, $telefone, $email, $assunto, $mensagem, $status);
            header("Location: ".BASE_URL."/contatosCMS/abrir/".$id);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $contato = $c->getContato(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'ADM - Contatos',
            'usuario' => $u,
            'tipo' => 4,
            'contato' => $contato,
        );
        $this->loadTemplateCMS('editarContatoCMS', $dados);
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
        $mensagem = nl2br(addslashes($_POST['mensagem']));
        $c = new Contatos();
        if($c->enviarEmailComTemplate($nome, $email, $assunto, $mensagem) == True){
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
        $c = new Contatos();
        $c->excluirContato(base64_decode(base64_decode($id)));
        echo "1";
    }
}