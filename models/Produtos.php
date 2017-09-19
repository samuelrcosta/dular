<?php
class Produtos extends model{
    public function getProdutos(){
        $sql = $this->db->prepare("SELECT *, (SELECT categorias.nome FROM categorias WHERE categorias.id = produtos.categoria limit 1) as NomeCategoria FROM produtos");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function addProduto($nome, $categoria, $descricao){
        $sql = $this->db->prepare("INSERT INTO produtos SET nome = ?, categoria = ?, descricao = ?, url = ?");
        $sql->execute(array($nome, $categoria, $descricao, 'default'));
    }

    public function editarProduto($nome, $categoria, $descricao, $id){
        $sql = $this->db->prepare("UPDATE produtos SET nome = ?, categoria = ?, descricao = ? WHERE id = ?");
        $sql->execute(array($nome, $categoria, $descricao, $id));
    }

    public function excluirProduto($id){
        $sql = $this->db->prepare("DELETE FROM produtos WHERE id = ?");
        $sql->execute(array($id));
    }

    public function getProduto($id){
        $array = array();
        $array['fotos'] = array();
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = ?");
        $sql->execute(array($id));
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;
    }

    public function excluirFoto($id){
        $id_anuncio = 0;
        $sql = $this->db->prepare("SELECT * FROM anuncios_imagens WHERE id = ?");
        $sql->execute(array($id));
        if($sql->rowCount() > 0){
            $row = $sql->fetch();
            $id_anuncio = $row['id_anuncios'];
            unlink("assets/imgs/anuncios/".$row['url']);
        }

        $sql = $this->db->prepare("DELETE FROM anuncios_imagens WHERE id = ?");
        $sql->execute(array($id));

        return $id_anuncio;
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
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/php/dular/assets/imgs/produtos/'.$nome.'.jpg', $dados);

        echo "1";
    }
}