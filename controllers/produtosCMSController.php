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
                $p->addProduto($nome, $categoria, $descricao, $tags1, $tags2, $tags3);
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

            $p->editarProduto($nome, $categoria, $descricao, $id, $tags1, $tags2, $tags3);
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