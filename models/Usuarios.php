<?php
class Usuarios extends model{
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $foto;
    private $permissao;
    private $funcao;

    public function cadastrar($nome, $email, $senha, $permissao, $funcao){
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($email));

        if($sql->rowCount() == 0){
            $sql = "INSERT INTO usuarios SET email = ?, senha = ?, nome = ?, permissao = ?, funcao = ?, url = ?";
            $sql = $this->db->prepare($sql);
            $sql->execute(array($email, $senha, $nome, $permissao, $funcao, "default"));
            return true;
        }else{
            return false;
        }
    }

    public function editar($id, $nome, $email, $senha, $permissao, $funcao){
        $sql = "SELECT * FROM usuarios WHERE email = ? AND id != ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($email, $id));

        if($sql->rowCount() > 0){
            return false;
        }else{
            $sql = "UPDATE usuarios SET email = ?, senha = ?, nome = ?, permissao = ?, funcao = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->execute(array($email, $senha, $nome, $permissao, $funcao, $id));
            return true;
        }
    }

    public function login($email, $senha){
        $sql = "SELECT id FROM usuarios WHERE email = ? AND senha = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($email, $senha));
        if($sql->rowCount() > 0 ){
            $dado = $sql->fetch();
            $_SESSION['cLogin'] = $dado['id'];
            return true;
        }else{
            return false;
        }
    }

    public function iniciar($id){
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));

        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $this->email = $data['email'];
            $this->senha = $data['senha'];
            $this->nome = $data['nome'];
            $this->permissao = $data['permissao'];
            $this->foto = $data['url'];
            $this->id = $data['id'];
            $this->funcao = $data['funcao'];
        }
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getId()
    {
        return $this->id;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function getPermissao()
    {
        return $this->permissao;
    }

    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($id, $url){
        $sql = "UPDATE usuarios SET url = ? WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($url, $id));
    }

    public function setNome($nome){
        $sql = "UPDATE usuarios SET nome = ? WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($nome, $this->id));
    }

    public function setEmail($email){
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($email));
        if($sql->rowCount() == 0){
            $sql = "UPDATE usuarios SET email = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->execute(array($email, $this->id));
        }
    }

    public function setSenha($senha){
        $sql = "UPDATE usuarios SET senha = ? WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($senha, $this->id));
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function getTotalUsuarios(){
        $sql = $this->db->prepare("SELECT id FROM usuarios");
        $sql->execute();
        $sql = $sql->rowCount();
        return $sql;
    }

    public function getUsuarios($pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM usuarios ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function getUsuario($id){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = ?");
        $sql->execute(array($id));
        $sql = $sql->fetch();
        return $sql;
    }

    public function pesquisarUsuarios($termo, $pagina, $limite){
        $p = ($pagina - 1) * $limite;
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ? ORDER BY id DESC LIMIT ".$p.",  ".$limite." ");
        $sql->execute(array("%".strtolower($termo)."%", "%".strtolower($termo)."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function pesquisaUsuarios($termo){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ? ORDER BY id DESC");
        $sql->execute(array("%".strtolower($termo)."%", "%".strtolower($termo)."%"));
        $sql = $sql->fetchAll();
        return $sql;
    }

    public function excluir($id){
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        $sql->execute(array($id));
        return $sql;
    }
}
?>