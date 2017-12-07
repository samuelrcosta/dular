<?php
class produtosController extends controller{
    public function index(){
        $this->registraAcesso('Produtos');
        $p = new Produtos();
        $c = new Categorias();
        if(isset($_GET['q']) && !empty($_GET['q'])){
            $produtos = $p->pesquisaProdutos(addslashes($_GET['q']));
            $returnName = "Resultados de: ".$_GET['q'];
            $localDoSite = "PESQUISA";
        }else{
            $produtos = $p->getProdutos(1, 10000);
            $totalProdutos = count($produtos);
            $returnName = 'Todos os Produtos';
            $localDoSite = "TODOS OS PRODUTOS";
        }
        $totalProdutos = count($produtos);
        $dados = array(
            'titulo' => 'Enxovais DuLar - Produtos',
            'produtos' => $produtos,
            'totalProdutos' => $totalProdutos,
            'returnName' => $returnName,
            'localDoSite' => $localDoSite,
            'description' => 'Conheça os produtos DuLar, uma variedade de peças, estampas e cores. Ideais para o uso pessoal e para revenda. Todos os produtos são 100% algodão para trazer mais conforto aos nossos clientes.'
        );
        $this->loadTemplate('produtos', $dados);
    }

    public function categorias($nome){
        $this->registraAcesso('Produtos');
        $dados = array();
        $c = new Categorias();
        if($nome == "Cama"){
            $tag1 = $c->getTags(1);
            $tag2 = $c->getTags(2);
            $tag3 = $c->getTags(3);
            $dados['tag1'] = $tag1;
            $dados['tag2'] = $tag2;
            $dados['tag3'] = $tag3;
        }
        $p = new Produtos();
        $localDoSite = "<a href='".BASE_URL."/produtos/categorias/".$nome."'>".strtoupper($this->tirarAcentos($nome))."</a>";
        if(isset($nome) && !empty($nome)){
            $c = $c->getLista();
            $id = 0;
            foreach ($c as $cats){
                if($cats['nome'] == $nome){
                    $id = $cats['id'];
                }
            }
            if($id == 0){
                $returnName = "Categoria Não encontrada!";
                $produtos = array();
            }else{
                $produtos = $p->getProdutosComCat($id);
                $returnName = $nome;
            }
        }else{
            header("Location: ".BASE_URL."/produtos");
        }
        $totalProdutos = count($produtos);
        $dados['titulo'] = 'Produtos';
        $dados['produtos'] = $produtos;
        $dados['totalProdutos'] = $totalProdutos;
        $dados['returnName'] = $returnName;
        $dados['localDoSite'] = $localDoSite;
        $this->loadTemplate('produtos', $dados);
    }

    public function tag($nome){
        $this->registraAcesso('Produtos');
        $dados = array();
        $c = new Categorias();
        $tag1 = $c->getTags(1);
        $tag2 = $c->getTags(2);
        $tag3 = $c->getTags(3);
        $dados['tag1'] = $tag1;
        $dados['tag2'] = $tag2;
        $dados['tag3'] = $tag3;
        $p = new Produtos();
        $localDoSite = "<a href='".BASE_URL."/produtos/categorias/Cama'>CAMA</a> > <a href='".BASE_URL."/produtos/tag/".$nome."'>".strtoupper($this->tirarAcentos($nome))."</a>";
        if(isset($nome) && !empty($nome)){
            $produtos = $p->getProdutosComTag($nome);
            $returnName = $nome;
        }else{
            header("Location: ".BASE_URL."/produtos");
        }
        $totalProdutos = count($produtos);
        $dados['titulo'] = 'Produtos';
        $dados['produtos'] = $produtos;
        $dados['totalProdutos'] = $totalProdutos;
        $dados['returnName'] = $returnName;
        $dados['localDoSite'] = $localDoSite;
        $this->loadTemplate('produtos', $dados);
    }

    public function abrir($id){
        $this->registraAcesso('Produtos');
        $p = new Produtos();
        $p->registraAcesso(addslashes(base64_decode(base64_decode($id))));
        if(isset($id) && !empty($id)){
            $produto = $p->getProduto(addslashes(base64_decode(base64_decode($id))));
            if(isset($produto['nome'])){
                $localDoSite = "<a href='".BASE_URL."/produtos/abrir/".$id."'>".strtoupper($produto['nome'])."</a>";
                $dados = array(
                    'titulo' => 'Produto - '.$produto['nome'],
                    'produto' => $produto,
                    'localDoSite' => $localDoSite
                );
                $this->loadTemplate('verProduto', $dados);
            }else{
                header("Location: ".BASE_URL."/produtos");
            }
        }else{
            header("Location: ".BASE_URL."/produtos");
        }
    }
}
