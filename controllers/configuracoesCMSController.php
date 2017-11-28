<?php
class configuracoesCMSController extends controller{
    public function index(){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $dados = array();
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '6')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $quantidadePorPaginas = 30;
        $paginaAtual = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $paginaAtual = addslashes($_GET['p']);
        }
        if(isset($_GET['find']) && !empty($_GET['find'])){
            $termoPesquisa = addslashes($_GET['find']);
            $usuarios = $u->pesquisarUsuarios($termoPesquisa, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($u->pesquisaUsuarios($termoPesquisa)) / $quantidadePorPaginas);
            $totalUsuarios = count($u->pesquisaUsuarios($termoPesquisa));
            $dados['termoPesquisa'] = $termoPesquisa;
        }else{
            $usuarios = $u->getUsuarios($paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil($u->getTotalUsuarios() / $quantidadePorPaginas);
            $totalUsuarios = $u->getTotalUsuarios();
        }

        $dados['titulo'] = 'DuLar - Lista de Usuários';
        $dados['usuario'] = $u;
        $dados['tipo'] = 6;
        $dados['usuarios'] = $usuarios;
        $dados['paginaAtual'] = $paginaAtual;
        $dados['totalPaginas'] = $totalPaginas;
        $dados['totalUsuarios'] = $totalUsuarios;
        $this->loadTemplateCMS('usuariosCMS', $dados);
    }

    public function cadastrarUsuario(){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '6')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $funcao = addslashes($_POST['funcao']);
            $permissaoUsuario = "";
            if(isset($_POST['menuOrcamentos']))
            {
                $permissaoUsuario .= "1";
            }
            if(isset($_POST['menuProdutos']))
            {
                $permissaoUsuario .= "2";
            }
            if(isset($_POST['menuRevendedores']))
            {
                $permissaoUsuario .= "3";
            }
            if(isset($_POST['menuContatos']))
            {
                $permissaoUsuario .= "4";
            }
            if(isset($_POST['menuPerfil']))
            {
                $permissaoUsuario .= "5";
            }
            if(isset($_POST['menuConfiguracoes']))
            {
                $permissaoUsuario .= "6";
            }
            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($funcao)){
                $u->cadastrar($nome, $email, $senha, $permissaoUsuario, $funcao);
                header("Location: ".BASE_URL."/configuracoesCMS");
            }else{
                echo "<div class='alert alert-danger'>Preencha todos os campos obrigatórios!</div>";
            }
        }
        $dados = array(
            'titulo' => 'DuLar - Cadastrando Usuário',
            'usuario' => $u,
            'tipo' => 6,
        );
        $this->loadTemplateCMS('cadastrarUsuariosCMS', $dados);
    }

    public function editarUsuario($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $id = addslashes($id);
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $usuario = $u->getUsuario(base64_decode(base64_decode($id)));
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '6')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $funcao = addslashes($_POST['funcao']);
            $permissaoUsuario = "";
            if(isset($_POST['menuOrcamentos']))
            {
                $permissaoUsuario .= "1";
            }
            if(isset($_POST['menuProdutos']))
            {
                $permissaoUsuario .= "2";
            }
            if(isset($_POST['menuRevendedores']))
            {
                $permissaoUsuario .= "3";
            }
            if(isset($_POST['menuContatos']))
            {
                $permissaoUsuario .= "4";
            }
            if(isset($_POST['menuPerfil']))
            {
                $permissaoUsuario .= "5";
            }
            if(isset($_POST['menuConfiguracoes']))
            {
                $permissaoUsuario .= "6";
            }
            if(!empty($nome) && !empty($email) && !empty($senha) && !empty($funcao)){
                if($u->editar(base64_decode(base64_decode($id)), $nome, $email, $senha, $permissaoUsuario, $funcao))
                    header("Location: ".BASE_URL."/configuracoesCMS");
                else
                    echo "<div class='main alert alert-danger' style='padding: 15px; height: auto'>E-mail já cadastrado com outro usuário!</div>";
            }else{
                echo "<div class='main alert alert-danger' style='padding: 15px; height: auto'>Preencha todos os campos obrigatórios!</div>";
            }
        }
        $dados = array(
            'titulo' => 'DuLar - Editando Usuário',
            'usuario' => $u,
            'user' => $usuario,
            'tipo' => 6,
        );
        $this->loadTemplateCMS('editarUsuarioCMS', $dados);
    }

    public function excluirUsuario($id){
        $id = addslashes($id);
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."/login");
            exit;
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '6')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        if(isset($id) && !empty($id)){
            $u->excluir(base64_decode(base64_decode(addslashes($id))));
        }
        header("Location: ".BASE_URL."/configuracoesCMS");
    }
}