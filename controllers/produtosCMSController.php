<?php
class produtosCMSController extends controller{
    public function index(){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $p = new Produtos();
        $produtos = $p->getProdutos();
        $dados = array(
            'titulo' => 'Administrador',
            'usuario' => $u,
            'tipo' => 2,
            'produtos' => $produtos,
        );
        $this->loadTemplateCMS('produtosCMS', $dados);
    }

    public function addProduto(){
        $dados = array();
        $p = new Produtos();
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $dados['usuario'] = $u;
        $dados['tipo'] = 2;
        $dados['titulo'] = 'Cadastrando Produto';
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $categoria = addslashes($_POST['categoria']);
            $descricao = addslashes($_POST['descricao']);
            if($nome != '' || $categoria != ''){
                $p->addProduto($nome, $categoria, $descricao);
                header("Location: ".BASE_URL."/produtosCMS");
            }else{
                echo "<div class='alert alert-danger'>Preencha Nome e a Descrição</div>";
            }
        }
        $c = new Categorias();
        $dados['cats'] = $c->getLista();
        $this->loadTemplateCMS('addProdutoCMS', $dados);
    }

    public function editarProduto($id){
        $dados = array();
        $p = new Produtos();
        $dados['id'] = addslashes($id);
        $dados['titulo'] = 'Editando Produto';
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $dados['usuario'] = $u;
        $dados['tipo'] = 2;
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."/login");
        }
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $nome = addslashes($_POST['nome']);
            $categoria = addslashes($_POST['categoria']);
            $descricao = addslashes($_POST['descricao']);
            $id = base64_decode(base64_decode(addslashes($id)));


            $p->editarProduto($nome, $categoria, $descricao, $id);
            header("Location: ".BASE_URL."/produtosCMS");
        }
        if(isset($id) && !empty($id)){
            $dados['info']= $p->getProduto(base64_decode(base64_decode(addslashes($id))));
        }else{
            header("Location: ".BASE_URL);
        }
        $c = new Categorias();
        $dados['cats'] = $c->getLista();
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
        $id_anuncio = new Anuncios();
        if(isset($id) && !empty($id)){
            $id_anuncio = $id_anuncio->excluirFoto(base64_decode(base64_decode(addslashes($id))));
        }

        if(isset($id_anuncio)){
            header ("Location: ".BASE_URL."/home/editarAnuncio/".base64_encode(base64_encode($id_anuncio))."");
        }else{
            header("Location: ".BASE_URL."home/meusAnuncios");
        }
    }

    public function excluirAnuncio($id){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL."/login");
            exit;
        }
        $a = new Anuncios();
        if(isset($id) && !empty($id)){
            $a->excluirAnuncio(base64_decode(base64_decode(addslashes($id))));
        }
        header("Location: ".BASE_URL."/home/meusAnuncios");
    }

}