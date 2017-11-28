<?php
class Acessos extends model{
    public function getAcessosPorPagina(){
        $sql = $this->db->query("SELECT *, count(pagina) as acessos FROM acessos GROUP BY pagina ORDER BY acessos DESC");
        return $sql->fetchAll();
    }

    public function getAcessosPorIpPorPagina($pagina){
        $sql = $this->db->prepare("SELECT *, count(ip) as repeticoes FROM acessos WHERE pagina = ? GROUP BY ip");
        $sql->execute(array($pagina));
        return $sql->fetchAll();
    }

    public function getTotalAcessos(){
        $sql = $this->db->query("SELECT * FROM acessos ORDER BY data DESC");
        return $sql->fetchAll();
    }

    public function getAcessosPorIp(){
        $sql = $this->db->query("SELECT *, count(ip) as repeticoes, MAX(data) as max FROM acessos GROUP BY ip ORDER BY `max` DESC");
        return $sql->fetchAll();
    }

    public function getAcessosProdutos($id_categoria, $limite){
        $sql = $this->db->prepare("SELECT *, count(produto_id) as acessos FROM acessos_produtos LEFT JOIN produtos ON produtos.id = acessos_produtos.produto_id WHERE categoria = ? GROUP BY produto_id ORDER BY acessos DESC LIMIT ".$limite." ");
        $sql->execute(array($id_categoria));
        return $sql->fetchAll();
    }

    public function getAcessosProduto($id_produto, $limite){
        $sql = $this->db->prepare("SELECT *, count(ip) as repeticoes FROM acessos_produtos WHERE produto_id = ? GROUP BY ip LIMIT ".$limite." ");
        $sql->execute(array($id_produto));
        return $sql->fetchAll();
    }

    public function getTotalAcessosProdutos($limite){
        $sql = $this->db->query("SELECT * FROM acessos_produtos ORDER BY data DESC LIMIT ".$limite." ");
        return $sql->fetchAll();
    }

    public function getAcessosProdutosPorIp($id_categoria, $limite){
        $sql = $this->db->prepare("SELECT *, count(ip) as repeticoes, MAX(data) as max FROM acessos_produtos LEFT JOIN produtos ON produtos.id = acessos_produtos.produto_id WHERE categoria = ? GROUP BY ip ORDER BY `max` DESC LIMIT ".$limite." ");
        $sql->execute(array($id_categoria));
        return $sql->fetchAll();
    }

    public function getProdutosOrcamentados($limite){
        $sql = $this->db->query("SELECT *, count(produto_id) as QuantidadeOrcamentos FROM orcamentos_prod GROUP BY produto_id ORDER BY QuantidadeOrcamentos DESC LIMIT ".$limite." ");
        return $sql->fetchAll();
    }
}