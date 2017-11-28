<?php
class contatoController extends controller{
    public function index()
    {
        $this->registraAcesso('Fale Conosco');
        if(isset($_POST['nome']) && !empty($_POST['nome'])){
            $c = new Contatos();
            $nome = addslashes($_POST['nome']);
            $celular = addslashes($_POST['celular']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            /*
            $endereco = addslashes($_POST['endereco']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $cep = addslashes($_POST['cep']);
            $estado = addslashes($_POST['estado']);
            */
            $assunto = addslashes($_POST['assunto']);
            $mensagem = addslashes(nl2br($_POST['mensagem']));
            $c->inscreverMailChimp($email, $nome);

            $c->cadastrarNovoContato($nome, $celular, $telefone, $email, $assunto, $mensagem);
            $assunto = "Novo contato recebido no site";
            $msg = "Nome: ".$nome."<br>"."E-mail: ".$email."<br>"."Telefone: ".$telefone."<br>"."Celular: ".$celular."<br>"."Mensagem:<br>".$mensagem;
            $c->enviarEmailComTemplate($this->MailName, $this->MailUsername, $assunto, $msg);
            $assunto = "Recebemos sua mensagem - Enxovais DuLar";
            $msg = "Olá ".$nome."<br>Recebemos sua mensagem de contato<br>Responderemos o mais rápido possível.";
            $c->enviarEmailComTemplate($nome, $email, $assunto, $msg);
            header("Location: ".BASE_URL."/contato/sucesso/".$nome);
        }
        $dados = array(
            'titulo' => 'Nos envie uma mensagem de contato',
            'css' => 'style-CadastroContato',
        );
        $this->loadTemplate('CadastroContato', $dados);
    }

    public function sucesso($nome){
        $this->registraAcesso('Fale Conosco');
        $dados = array(
            'nome' => $nome,
            'titulo' => 'Recebemos seu contato',
            'css' => 'style-CadastroContato',
        );
        $this->loadTemplate('ContatoCadSucesso', $dados);
    }
}