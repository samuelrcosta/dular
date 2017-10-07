<?php
class revendedorController extends controller{
    public function index()
    {
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $r = new Revendedores();
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $rg = addslashes($_POST['rg']);
            $celular = addslashes($_POST['celular']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $endereco = addslashes($_POST['endereco']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $cep = addslashes($_POST['cep']);
            $estado = addslashes($_POST['estado']);
            $r->cadastrar($nome, $cpf, $rg, $celular, $telefone, $email, $endereco, $bairro, $cidade, $cep, $estado);
            $assunto = "Novo revendedor cadastrado no site";
            $mensagem = "Nome: ".$nome."<br>"."E-mail: ".$email;
            $r->enviarEmailComTemplate($this->MailName, $this->MailUsername, $assunto, $mensagem);
            $assunto = "Recebemos seu contato - Enxovais DuLar";
            $msg = "Olá ".$nome."<br>Recebemos seu contato para revenda.<br>Iremos analisar e responderemos o mais rápido possível.";
            $r->enviarEmailComTemplate($nome, $email, $assunto, $msg);
            header("Location: ".BASE_URL."/revendedor/sucesso/".$nome);
        }
        $dados = array(
            'titulo' => 'Seja um de nossos revendedores!',
            'css' => 'style-CadastroRevendedor'
        );
        $this->loadTemplate('CadastroRevendedor', $dados);
    }

    public function sucesso($nome){
        $dados = array(
            'titulo' => 'Cadastro realizado',
            'css' => 'style-CadastroRevendedor',
            'nome' => $nome
        );
        $this->loadTemplate('RevendedorCadSucesso', $dados);
    }
}
?>