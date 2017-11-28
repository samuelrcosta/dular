<?php
class revendedoresCMSController extends controller{
    public function index()
    {
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $dados = array();
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '3')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $quantidadePorPaginas = 30;
        $paginaAtual = 1;
        $r = new Revendedores();
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $paginaAtual = addslashes($_GET['p']);
        }
        if(isset($_GET['find']) && !empty($_GET['find'])){
            $termoPesquisa = addslashes($_GET['find']);
            $revendedores = $r->pesquisarRevendedores($termoPesquisa, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($r->pesquisaRevendedores($termoPesquisa)) / $quantidadePorPaginas);
            $totalRevendedores = count($r->pesquisaRevendedores($termoPesquisa));
            $dados['termoPesquisa'] = $termoPesquisa;
        }else if(isset($_GET['filtro']) && !empty($_GET['filtro'])){
            $filtro = addslashes($_GET['filtro']);
            $revendedores = $r->getRevendedoresComStatus($filtro, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($r->getRevendedoresStatus($filtro)) / $quantidadePorPaginas);
            $totalRevendedores = count($r->getRevendedoresStatus($filtro));
        }else{
            $revendedores = $r->getRevendedores($paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil($r->getTotalRevendedores() / $quantidadePorPaginas);
            $totalRevendedores = $r->getTotalRevendedores();
        }
        $dados['titulo'] = 'DuLar - Lista de Revendedores';
        $dados['usuario'] = $u;
        $dados['tipo'] = 3;
        $dados['revendedores'] = $revendedores;
        $dados['paginaAtual'] = $paginaAtual;
        $dados['totalPaginas'] = $totalPaginas;
        $dados['totalRevendedores'] = $totalRevendedores;
        $this->loadTemplateCMS('revendedoresCMS', $dados);
    }

    public function abrir($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '3')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $r = new Revendedores();
        $revendedor = $r->getRevendedor(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'DuLar - Detalhes do Revendedor',
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
        if (gettype(strpos($permissao, '3')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $revendedor = $r->getRevendedor(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'DuLar - Editando Revendedor',
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
        if (gettype(strpos($permissao, '3')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $assunto = addslashes($_POST['assunto']);
        $mensagem = addslashes(nl2br($_POST['mensagem']));
        $r = new Revendedores();
        $r->setStatus(base64_decode(base64_decode(addslashes($_POST['id']))), 3);
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
        if (gettype(strpos($permissao, '3')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $r = new Revendedores();
        $r->excluirRevendedor(base64_decode(base64_decode($id)));
        echo "1";
    }
}