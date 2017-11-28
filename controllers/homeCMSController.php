<?php
class homeCMSController extends controller{
    public function index(){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $a = new Acessos();
        $p = new Produtos();
        $permissao = $u->getPermissao();
        $acessosPorPagina = $a->getAcessosPorPagina();
        $acessosProdutosPorPaginaCama = $a->getAcessosProdutos(1,5);
        $acessosProdutosPorPaginaMesa = $a->getAcessosProdutos(2,5);
        $acessosProdutosPorPaginaBanho = $a->getAcessosProdutos(3,5);
        $produtosOrcamentados = $a->getProdutosOrcamentados(5);
        $paginas = [];
        $prodsOrcamentos = [];
        $acessosPorIpPorPagina = [];
        $acessosProdutosPorIpPorPaginaCama = [];
        $acessosProdutosPorIpPorPaginaMesa = [];
        $acessosProdutosPorIpPorPaginaBanho = [];
        foreach ($acessosPorPagina as $acesso){
            array_push($paginas, $acesso['pagina']);
        }
        foreach ($paginas as $pagina){
            array_push($acessosPorIpPorPagina, count($a->getAcessosPorIpPorPagina($pagina)));
        }
        foreach ($acessosProdutosPorPaginaCama as $produto){
            array_push($acessosProdutosPorIpPorPaginaCama, count($a->getAcessosProduto($produto['produto_id'], 5)));
        }
        foreach ($acessosProdutosPorPaginaMesa as $produto){
            array_push($acessosProdutosPorIpPorPaginaMesa, count($a->getAcessosProduto($produto['produto_id'], 5)));
        }
        foreach ($acessosProdutosPorPaginaBanho as $produto){
            array_push($acessosProdutosPorIpPorPaginaBanho, count($a->getAcessosProduto($produto['produto_id'], 5)));
        }
        foreach ($produtosOrcamentados as $produto){
            array_push($prodsOrcamentos, $p->getProduto($produto['produto_id'])['nome']);
        }

        $dados = array(
            'titulo' => 'DuLar - Dashboard',
            'usuario' => $u,
            'tipo' => 0,
            'paginas' => $paginas,
            'prodsOrcamentos' => $prodsOrcamentos,
            'produtosOrcamentados' => $produtosOrcamentados,
            'acessosProdutosPorPaginaCama' => $acessosProdutosPorPaginaCama,
            'acessosProdutosPorPaginaMesa' => $acessosProdutosPorPaginaMesa,
            'acessosProdutosPorPaginaBanho' => $acessosProdutosPorPaginaBanho,
            'acessosPorPagina' => $acessosPorPagina,
            'totalAcessos' => $a->getTotalAcessos(),
            'acessosPorIp' => $a->getAcessosPorIp(),
            'acessosPorIpPorPagina' => $acessosPorIpPorPagina,
            'acessosProdutosPorIpPorPaginaCama' => $acessosProdutosPorIpPorPaginaCama,
            'acessosProdutosPorIpPorPaginaMesa' => $acessosProdutosPorIpPorPaginaMesa,
            'acessosProdutosPorIpPorPaginaBanho' => $acessosProdutosPorIpPorPaginaBanho
        );
        $this->loadTemplateCMS('homeCMS', $dados);
    }


}