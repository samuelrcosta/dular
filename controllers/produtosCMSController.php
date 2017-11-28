<?php
class produtosCMSController extends controller{
    public function index(){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $dados = array();
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '2')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $p = new Produtos();
        $c = new Categorias();
        $quantidadePorPaginas = 30;
        $paginaAtual = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $paginaAtual = addslashes($_GET['p']);
        }
        if(isset($_GET['find']) && !empty($_GET['find'])){
            $termoPesquisa = addslashes($_GET['find']);
            $produtos = $p->pesquisarProdutos($termoPesquisa, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($p->pesquisaProdutos($termoPesquisa)) / $quantidadePorPaginas);
            $totalProdutos = count($p->pesquisaProdutos($termoPesquisa));
            $dados['termoPesquisa'] = $termoPesquisa;
        }else if(isset($_GET['filtro']) && !empty($_GET['filtro'])){
            $filtro = addslashes($_GET['filtro']);
            $produtos = $p->getProdutosComCategoria($filtro, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($p->getProdutosComCat($filtro)) / $quantidadePorPaginas);
            $totalProdutos = count($p->getProdutosComCat($filtro));
        }else if(isset($_GET['tag']) && !empty($_GET['tag'])){
            $filtro = addslashes($_GET['tag']);
            $produtos = $p->getProdutosComTags($filtro, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil($p->getTotalProdutosTag($filtro) / $quantidadePorPaginas);
            $totalProdutos = $p->getTotalProdutosTag($filtro);
        }else{
            $produtos = $p->getProdutos($paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil($p->getTotalProdutos() / $quantidadePorPaginas);
            $totalProdutos = $p->getTotalProdutos();
        }
        $dados['titulo'] = 'DuLar - Lista de Produtos';
        $dados['usuario'] = $u;
        $dados['tipo'] = 2;
        $dados['produtos'] = $produtos;
        $dados['paginaAtual'] = $paginaAtual;
        $dados['totalPaginas'] = $totalPaginas;
        $dados['totalProdutos'] = $totalProdutos;
        $dados['tags1'] = $c->getTags(1);
        $dados['tags2'] = $c->getTags(2);
        $dados['tags3'] = $c->getTags(3);
        $this->loadTemplateCMS('produtosCMS', $dados);
    }

    public function addProduto(){
        $dados = array();
        $p = new Produtos();
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '2')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $dados['usuario'] = $u;
        $dados['tipo'] = 2;
        $dados['titulo'] = 'DuLar - Cadastrando Produto';
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $categoria = addslashes($_POST['categoria']);
            $descricao = addslashes($_POST['descricao']);
            $prioridade = addslashes($_POST['prioridade']);
            if(isset($_POST['tags1']) && !empty($_POST['tags1'])){
                $tags1 = addslashes($_POST['tags1']);
            }else{
                $tags1 = "null";
            }
            if(isset($_POST['tags2']) && !empty($_POST['tags2'])){
                $tags2 = addslashes($_POST['tags2']);
            }else{
                $tags2 = "null";
            }
            if(isset($_POST['tags3']) && !empty($_POST['tags3'])){
                $tags3 = addslashes($_POST['tags3']);
            }else{
                $tags3 = "null";
            }
            if($nome != '' || $categoria != ''){
                $p->addProduto($nome, $categoria, $descricao, $tags1, $tags2, $tags3, $prioridade);
                header("Location: ".BASE_URL."/produtosCMS");
            }else{
                echo "<div class='alert alert-danger'>Preencha Nome e a Descrição</div>";
            }
        }
        $c = new Categorias();
        $dados['cats'] = $c->getLista();
        $dados['tags1'] = $c->getTags(1);
        $dados['tags2'] = $c->getTags(2);
        $dados['tags3'] = $c->getTags(3);
        $this->loadTemplateCMS('addProdutoCMS', $dados);
    }

    public function editarProduto($id){
        $dados = array();
        $p = new Produtos();
        $dados['id'] = addslashes($id);
        $dados['titulo'] = 'DuLar - Editando Produto';
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '2')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $dados['usuario'] = $u;
        $dados['tipo'] = 2;
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."/login");
        }
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $categoria = addslashes($_POST['categoria']);
            $descricao = addslashes($_POST['descricao']);
            $prioridade = addslashes($_POST['prioridade']);
            $id = base64_decode(base64_decode(addslashes($id)));

            if(isset($_POST['tags1']) && !empty($_POST['tags1'])){
                $tags1 = addslashes($_POST['tags1']);
            }else{
                $tags1 = "null";
            }
            if(isset($_POST['tags2']) && !empty($_POST['tags2'])){
                $tags2 = addslashes($_POST['tags2']);
            }else{
                $tags2 = "null";
            }
            if(isset($_POST['tags3']) && !empty($_POST['tags3'])){
                $tags3 = addslashes($_POST['tags3']);
            }else{
                $tags3 = "null";
            }

            $p->editarProduto($nome, $categoria, $descricao, $id, $tags1, $tags2, $tags3, $prioridade);
            header("Location: ".BASE_URL."/produtosCMS");
        }
        if(isset($id) && !empty($id)){
            $dados['info']= $p->getProduto(base64_decode(base64_decode(addslashes($id))));
        }else{
            header("Location: ".BASE_URL);
        }
        $c = new Categorias();
        $dados['cats'] = $c->getLista();
        $dados['tags1'] = $c->getTags(1);
        $dados['tags2'] = $c->getTags(2);
        $dados['tags3'] = $c->getTags(3);
        $this->loadTemplateCMS('editarProdutoCMS', $dados);
    }

    public function salvarFoto(){
        $p = new Produtos();
        $p->salvarFoto();
    }

    public function excluirFoto($id){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."/login");
            exit;
        }
        $p = new Produtos();
        if(isset($id) && !empty($id)){
            $p = $p->excluirFoto(base64_decode(base64_decode(addslashes($id))));
        }

        if(isset($p)){
            header ("Location: ".BASE_URL."/produtosCMS/editarProduto/".base64_encode(base64_encode($p))."");
        }else{
            header("Location: ".BASE_URL."/produtosCMS");
        }
    }

    public function excluirProduto($id){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."/login");
            exit;
        }
        $p = new Produtos();
        if(isset($id) && !empty($id)){
            $p->excluirProduto(base64_decode(base64_decode(addslashes($id))));
        }
        header("Location: ".BASE_URL."/produtosCMS");
    }

}