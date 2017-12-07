<?php
class orcamentoController extends controller{
    public function index()
    {
        $this->registraAcesso('Orçamento');
        $p = new Produtos();
        $camas = $p->getProdutosComCat(1);
        $mesas = $p->getProdutosComCat(2);
        $banhos = $p->getProdutosComCat(3);
        $decoracoes = $p->getProdutosComCat(4);
        if((isset($_POST['nome']) && !empty($_POST['nome'])) && (isset($_POST['cpf-cnpj']) && !empty($_POST['cpf-cnpj'])) && (isset($_POST['rg-ie']) && !empty($_POST['rg-ie'])) && (isset($_POST['celular']) && !empty($_POST['celular'])) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['endereco']) && !empty($_POST['endereco'])) && (isset($_POST['bairro']) && !empty($_POST['bairro'])) && (isset($_POST['cidade']) && !empty($_POST['cidade'])) && (isset($_POST['cep']) && !empty($_POST['cep'])) && (isset($_POST['estado']) && !empty($_POST['estado']))  ){
            $o = new Orcamentos();
            $nome = addslashes($_POST['nome']);
            $tipopessoa = addslashes($_POST['tipo-pessoa']);
            $cpf_cnpj = addslashes($_POST['cpf-cnpj']);
            $rg_ie = addslashes($_POST['rg-ie']);
            $celular = addslashes($_POST['celular']);
            $telefone = addslashes($_POST['telefone']);
            $email = addslashes($_POST['email']);
            $endereco = addslashes($_POST['endereco']);
            $bairro = addslashes($_POST['bairro']);
            $cidade = addslashes($_POST['cidade']);
            $cep = addslashes($_POST['cep']);
            $estado = addslashes($_POST['estado']);
            $produtos = array();
            $listaProdutos = $p->getProdutos(1, 10000);

            for($i = 0; $i < count($listaProdutos); $i++){
                if(isset($_POST['qt-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))]) && !empty($_POST['qt-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))])){
                    $registro = array(
                        'id' => $listaProdutos[$i]["id"],
                        'qt' => addslashes($_POST['qt-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))]),
                        'obs' => addslashes($_POST['obs-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))])
                    );
                    array_push($produtos, $registro);
                }
            }
            $o->inscreverMailChimp($email, $nome);
            $o->cadastrarOrcamento($nome, $tipopessoa, $cpf_cnpj, $rg_ie, $celular, $telefone, $email, $endereco, $bairro, $cidade, $cep, $estado, $produtos);


            $assunto = "Novo orçamento recebido no site";
            $mensagem = "Nome: ".$nome."<br>"."E-mail: ".$email;
            $o->enviarEmailComTemplate($this->MailName, $this->MailUsername, $assunto, $mensagem);
            $assunto = "Recebemos sua solicitação de orçamento - Enxovais DuLar";
            $msg = "Olá ".$nome."<br>Recebemos sua solicitação de orçamento.<br>Iremos analisar e responderemos o mais rápido possível.";
            $o->enviarEmailComTemplate($nome, $email, $assunto, $msg);
            header("Location: ".BASE_URL."/orcamento/sucesso/".$nome);

        }
        $dados = array(
            'titulo' => 'Faça um orçamento conosco',
            'css' => 'style-CadastroOrcamento',
            'description' => 'Explore nossos produtos e faça de forma simples e rápida um orçamento, em um ambiente totalmente seguro.',
            'camas' => $camas,
            'mesas' => $mesas,
            'banhos' => $banhos,
            'decoracoes' => $decoracoes
        );
        $this->loadTemplate('CadastroOrcamento', $dados);
    }

    public function TermoDeCompra(){
        $this->registraAcesso('Orçamento');
        $dados = array(
            'titulo' => 'DuLar - Termo de Compra',
            'css' => 'style-CadastroOrcamento',
        );
        $this->loadTemplate('TermoDeCompra', $dados);
    }

    public function sucesso($nome){
        $this->registraAcesso('Orçamento');
        $dados = array(
            'titulo' => 'Orçamento recebido',
            'css' => 'style-CadastroOrcamento',
            'nome' => $nome
        );
        $this->loadTemplate('OrcamentoCadSucesso', $dados);
    }

}
?>