<?php
class Usuarios extends model{
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $foto;
    private $permissao;

    public function cadastrar($nome, $email, $senha, $permissao){
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($email));

        if($sql->rowCount() == 0){
            $sql = "INSERT INTO usuarios SET email = ?, senha = ?, nome = ?, permissao = ?";
            $sql = $this->db->prepare($sql);
            $sql->execute(array($email, $senha, $nome, $permissao));
            return true;
        }else{
            return false;
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

    public function getFuncao(){
        if($this->permissao == '1'){
            return "Administrador";
        }
    }
}
?>