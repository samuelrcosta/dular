<?php
class Produtos extends model{
    public function getTotalProdutos(){
        $sql = $this->db->prepare("
SELECT id FROM produtos WHERE status_interno = ?");
        $sql->execute(array(1));
        $sql = $sql->rowCount();
        return $sql;
    }

    public function getProdutos($pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("
SELECT produtos.id,produtos.nome, produtos.descricao, produtos.url, produtos.categoria, produtos.prioridade, 
GROUP_CONCAT(tag_name.nome) AS tag_name, 
GROUP_CONCAT(tag_name.id) AS tag_id, 
(SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria
FROM produtos 
LEFT JOIN tags 
ON tags.id_produto = produtos.id
LEFT JOIN tag_name
ON tags.id_tag = tag_name.id 
WHERE status_interno = 1
GROUP BY produtos.id
ORDER BY produtos.prioridade DESC, produtos.id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getProdutosComCategoria($categoria, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("
SELECT produtos.id,produtos.nome, produtos.descricao, produtos.url, produtos.categoria, produtos.prioridade,
GROUP_CONCAT(tag_name.nome) AS tag_name, 
GROUP_CONCAT(tag_name.id) AS tag_id, 
(SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria
FROM produtos 
LEFT JOIN tags 
ON tags.id_produto = produtos.id
LEFT JOIN tag_name
ON tags.id_tag = tag_name.id 
WHERE produtos.categoria = ? AND status_interno = 1
GROUP BY produtos.id 
ORDER BY produtos.prioridade DESC, produtos.id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array($categoria));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getProdutosComTags($tag, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("
SELECT produtos.id,produtos.nome, produtos.descricao, produtos.url, produtos.categoria, produtos.prioridade,
GROUP_CONCAT(tag_name.nome) AS tag_name, 
GROUP_CONCAT(tag_name.id) AS tag_id, 
(SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria
FROM produtos 
LEFT JOIN tags 
ON tags.id_produto = produtos.id
LEFT JOIN tag_name
ON tags.id_tag = tag_name.id 
WHERE status_interno = 1
GROUP BY produtos.id
ORDER BY produtos.prioridade DESC, produtos.id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute();
        $sql = $sql->fetchAll();
        $retorno = array();
        for($i = 0; $i < count($sql); $i = $i + 1){
            if(gettype(strpos($sql[$i]['tag_id'], $tag)) == 'integer'){
                array_push($retorno, $sql[$i]);
            }
        }
        return $retorno;
    }

    public function pesquisarProdutos($termo, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("
SELECT produtos.id,produtos.nome, produtos.descricao, produtos.url, produtos.categoria, produtos.prioridade,
GROUP_CONCAT(tag_name.nome) AS tag_name, 
GROUP_CONCAT(tag_name.id) AS tag_id, 
(SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria
FROM produtos 
LEFT JOIN tags 
ON tags.id_produto = produtos.id
LEFT JOIN tag_name
ON tags.id_tag = tag_name.id 
WHERE produtos.nome LIKE ? AND status_interno = 1
GROUP BY produtos.id
ORDER BY produtos.prioridade DESC, produtos.id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array("%".strtolower($termo)."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getTotalProdutosTag($tag){
        $sql = $this->db->prepare("SELECT * FROM tags WHERE id_tag = ?");
        $sql->execute(array($tag));
        return count($sql->fetchAll());
    }

    public function getProdutosComTag($tag){
        $sql = $this->db->prepare("SELECT produtos.id,produtos.nome, produtos.descricao, produtos.url, produtos.categoria, produtos.prioridade, 
GROUP_CONCAT(tag_name.nome) AS tag_name, 
GROUP_CONCAT(tag_name.id) AS tag_id, 
(SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria
FROM produtos
LEFT JOIN tags 
ON tags.id_produto = produtos.id
LEFT JOIN tag_name
ON tags.id_tag = tag_name.id 
WHERE tag_name.nome = ? AND status_interno = 1
GROUP BY produtos.id
ORDER BY produtos.prioridade DESC, produtos.id DESC");
        $sql->execute(array($tag));
        return $sql->fetchAll();
    }

    public function pesquisaProdutos($termo){
        $sql = $this->db->prepare("SELECT *, (SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria FROM produtos WHERE nome LIKE ? AND status_interno = 1 ORDER BY prioridade DESC");
        $sql->execute(array("%".$termo."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getProdutosComCat($categoria){
        $sql = $this->db->prepare("SELECT *, (SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria FROM produtos WHERE categoria = ? AND status_interno = 1 ORDER BY prioridade DESC");
        $sql->execute(array($categoria));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function addProduto($nome, $categoria, $descricao, $tags1, $tags2, $tags3, $prioridade){
        $sql = $this->db->prepare("INSERT INTO produtos SET nome = ?, categoria = ?, descricao = ?, url = ?, status_interno = 1, prioridade = ?");
        $sql->execute(array($nome, $categoria, $descricao, 'default', $prioridade));
        $sql = $this->db->query("SELECT id FROM produtos ORDER BY id DESC LIMIT 1");
        $id_produto =  $sql->fetch()['id'];
        if($tags1 != "null"){
            $sql = $this->db->prepare("INSERT INTO tags SET id_produto = ?, id_tag = ?");
            $sql->execute(array($id_produto, $tags1));
        }
        if($tags2 != "null"){
            $sql = $this->db->prepare("INSERT INTO tags SET id_produto = ?, id_tag = ?");
            $sql->execute(array($id_produto, $tags2));
        }
        if($tags3 != "null"){
            $sql = $this->db->prepare("INSERT INTO tags SET id_produto = ?, id_tag = ?");
            $sql->execute(array($id_produto, $tags3));
        }
    }

    public function editarProduto($nome, $categoria, $descricao, $id, $tags1, $tags2, $tags3, $prioridade){
        $sql = $this->db->prepare("UPDATE produtos SET nome = ?, categoria = ?, descricao = ?, prioridade = ? WHERE id = ?");
        $sql->execute(array($nome, $categoria, $descricao, $prioridade, $id));
        $sql = $this->db->prepare("DELETE FROM tags WHERE id_produto = ?");
        $sql->execute(array($id));
        if($tags1 != "null"){
            $sql = $this->db->prepare("INSERT INTO tags SET id_produto = ?, id_tag = ?");
            $sql->execute(array($id, $tags1));
        }
        if($tags2 != "null"){
            $sql = $this->db->prepare("INSERT INTO tags SET id_produto = ?, id_tag = ?");
            $sql->execute(array($id, $tags2));
        }
        if($tags3 != "null"){
            $sql = $this->db->prepare("INSERT INTO tags SET id_produto = ?, id_tag = ?");
            $sql->execute(array($id, $tags3));
        }
    }

    public function excluirProduto($id){
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = ?");
        $sql->execute(array($id));
        $sql = $sql->fetch();
        if($sql['url'] != 'default'){
            unlink($_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/imgs/produtos/".$sql['url'].".jpg");
        }
        $sql = $this->db->prepare("UPDATE produtos SET status_interno = 2 WHERE id = ?");
        $sql->execute(array($id));
    }

    public function getProduto($id){
        $array = array();
        $array['fotos'] = array();
        $sql = $this->db->prepare("
SELECT produtos.id,produtos.nome, produtos.descricao, produtos.url, produtos.categoria, produtos.prioridade, 
GROUP_CONCAT(tag_name.nome) AS tag_name, 
GROUP_CONCAT(tag_name.id) AS tag_id, 
(SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria
FROM produtos 
LEFT JOIN tags 
ON tags.id_produto = produtos.id
LEFT JOIN tag_name
ON tags.id_tag = tag_name.id 
WHERE produtos.id = ?
GROUP BY produtos.id
ORDER BY produtos.prioridade DESC, produtos.id DESC");
        $sql->execute(array($id));
        if($sql->rowCount() > 0){
            return $sql->fetch();
        }else{
            return $array;
        }
    }

    public function excluirFoto($id){
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = ?");
        $sql->execute(array($id));
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            unlink($_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/imgs/produtos/".$row['url'].".jpg");
        }

        $sql = $this->db->prepare("UPDATE produtos SET url = ? WHERE id = ?");
        $sql->execute(array('default', $id));
        return $id;
    }

    function registraAcesso($id){
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = $this->db->prepare("INSERT INTO acessos_produtos SET ip = ?, data = NOW(), produto_id = ?");
        $sql->execute(array($ip, $id));
    }

    public function salvarFoto(){
        // Recuperando imagem em base64
        // Exemplo: data:image/png;base64,AAAFBfj42Pj4
        $imagem = $_POST['imagem'];
        $id = addslashes($_POST['id']);

        // Separando tipo dos dados da imagem
        // $tipo: data:image/png
        // $dados: base64,AAAFBfj42Pj4
        list($tipo, $dados) = explode(';', $imagem);

        // Isolando apenas o tipo da imagem
        // $tipo: image/png
        list(, $tipo) = explode(':', $tipo);

        // Isolando apenas os dados da imagem
        // $dados: AAAFBfj42Pj4
        list(, $dados) = explode(',', $dados);

        // Convertendo base64 para imagem
        $dados = base64_decode($dados);

        // Gerando nome aleatório para a imagem
        $nome = md5(time().rand(0,9999));
        $nome_bd = $nome;

        $sql = $this->db->prepare("UPDATE produtos SET url = ? WHERE id = ?");
        $sql->execute(array($nome_bd, $id));

        // Salvando imagem em disco
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . SERVER_URL . 'assets/imgs/produtos/'.$nome.'.jpg', $dados);

        echo "1";
    }
}