<?php
class contatosCMSController extends controller{
    public function index()
    {
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $dados = array();
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '4')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $quantidadePorPaginas = 30;
        $paginaAtual = 1;
        $c = new Contatos();
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $paginaAtual = addslashes($_GET['p']);
        }
        if(isset($_GET['find']) && !empty($_GET['find'])){
            $termoPesquisa = addslashes($_GET['find']);
            $contatos = $c->pesquisarContatos($termoPesquisa, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($c->pesquisaContatos($termoPesquisa)) / $quantidadePorPaginas);
            $totalContatos = count($c->pesquisaContatos($termoPesquisa));
            $dados['termoPesquisa'] = $termoPesquisa;
        }else if(isset($_GET['filtro']) && !empty($_GET['filtro'])){
            $filtro = addslashes($_GET['filtro']);
            $contatos = $c->getContatoComStatus($filtro, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($c->getContatosStatus($filtro)) / $quantidadePorPaginas);
            $totalContatos = count($c->getContatosStatus($filtro));
        }else{
            $contatos = $c->getContatos($paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil($c->getTotalContatos() / $quantidadePorPaginas);
            $totalContatos = $c->getTotalContatos();
        }
        $dados['titulo'] = 'DuLar - Lista de Contatos';
        $dados['usuario'] = $u;
        $dados['tipo'] = 4;
        $dados['contatos'] = $contatos;
        $dados['paginaAtual'] = $paginaAtual;
        $dados['totalPaginas'] = $totalPaginas;
        $dados['totalContatos'] = $totalContatos;
        $this->loadTemplateCMS('ContatosCMS', $dados);
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
        if (gettype(strpos($permissao, '4')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $contato = $c->getContato(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'DuLar - Editando Contato',
            'usuario' => $u,
            'tipo' => 4,
            'contato' => $contato,
        );
        $this->loadTemplateCMS('editarContatoCMS', $dados);
    }

    public function responder()
    {
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '4')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $assunto = addslashes($_POST['assunto']);
        $mensagem = nl2br(addslashes($_POST['mensagem']));
        $c = new Contatos();
        $c->setStatus(base64_decode(base64_decode(addslashes($_POST['id']))), 3);
        $c->enviarEmailComTemplate($nome, $email, $assunto, $mensagem);
        echo "1";
    }

    public function abrir($id){
            if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
                header("Location: " . BASE_URL);
            }
            $u = new Usuarios();
            $u->iniciar($_SESSION['cLogin']);
            $permissao = $u->getPermissao();
            if (gettype(strpos($permissao, '4')) != 'integer') {
                header("Location: ".BASE_URL."/homeCMS");
            }
            $c = new Contatos();
            $contato = $c->getContato(base64_decode(base64_decode($id)));
            $dados = array(
                'titulo' => 'DuLar - Detalhes do Contato',
                'usuario' => $u,
                'tipo' => 4,
                'contato' => $contato,
            );
            $this->loadTemplateCMS('abrirContatoCMS', $dados);
    }

    public function excluir($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '4')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $c = new Contatos();
        $c->excluirContato(base64_decode(base64_decode($id)));
        echo "1";
    }
}