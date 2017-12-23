<?php
class pagamentoController extends controller{
    public function pagar($id){
        $this->registraAcesso('Pagamento');
        $id = addslashes($id);
        $o = new Orcamentos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $produtosOrcamento = $o->getOrcamentoProdutos(base64_decode(base64_decode($id)));
        $dt_vencimento = date("Y-m-d", strtotime($dadosOrcamento["dt_vencimento"]));
        $today = date("Y-m-d");
        if(isset($_FILES['arquivo'])){
            if($o->salvarComprovante(base64_decode(base64_decode($id)))){
                $dados = array(
                    'titulo' => 'Comprovante Enviado',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento
                );
                $assunto = "Comprovante de Depósito enviado no site";
                $mensagem = "Orçamento: ".$dadosOrcamento['id']."<br>Nome: ".$dadosOrcamento['nome']."<br>"."E-mail: ".$dadosOrcamento['email'];
                $o->enviarEmailComTemplate($this->MailName, $this->MailUsername, $assunto, $mensagem);
                $this->loadTemplate('comprovanteEnviado', $dados);
            }else{
                $dados = array(
                    'titulo' => 'DuLar - Arquivo muito extenso',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento
                );
                $this->loadTemplate('arquivoMuitoGrande', $dados);
            }
        }else{
            if(!empty($dadosOrcamento['url_comprovante']) && $dadosOrcamento['tipo_pagamento'] == 3){
                $dados = array(
                    'titulo' => 'DuLar - Comprovante Enviado',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento,
                );
                $this->loadTemplate('comprovanteEnviado', $dados);
            }elseif($dt_vencimento <= $today){
                $dados = array(
                    'titulo' => 'DuLar - Orçamento vencido',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento
                );
                $this->loadTemplate('orcamentoVencido', $dados);
            }elseif(!empty($dadosOrcamento['url_comprovante']) && $dadosOrcamento['tipo_pagamento'] == 2){
                $dados = array(
                    'titulo' => 'DuLar - Boleto Pronto',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento,
                );
                $this->loadTemplate('boletoPronto', $dados);
            }else{
                $dados = array(
                    'titulo' => 'DuLar - Realizar Pagamento',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento,
                    'produtosOrcamento' => $produtosOrcamento
                );
                $this->loadTemplate('realizarPagamento', $dados);
            }
        }
    }

    public function gerarBoleto($id){
        $id = addslashes($id);
        $o = new Orcamentos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $dt_vencimento = date("Y-m-d", strtotime($dadosOrcamento["dt_vencimento"]));
        $today = date("Y-m-d");
        if(!empty($dadosOrcamento['url_comprovante']) && $dadosOrcamento['tipo_pagamento'] == 3){
            $dados = array(
                'titulo' => 'DuLar - Comprovante Enviado',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento,
            );
            $this->loadTemplate('comprovanteEnviado', $dados);
        }elseif(!empty($dadosOrcamento['url_comprovante']) && $dadosOrcamento['tipo_pagamento'] == 2){
            $dados = array(
                'titulo' => 'DuLar - Boleto Pronto',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento,
            );
            $this->loadTemplate('boletoPronto', $dados);
        }elseif($dt_vencimento < $today){
            $dados = array(
                'titulo' => 'DuLar - Orçamento vencido',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento
            );
            $this->loadTemplate('orcamentoVencido', $dados);
        }else{
            $o->gerarBoleto(base64_decode(base64_decode($id)));
        }
    }

    public function solicitarBoleto($id){
        $id = addslashes($id);
        $o = new Orcamentos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $dt_vencimento = date("Y-m-d", strtotime($dadosOrcamento["dt_vencimento"]));
        $today = date("Y-m-d");
        if(!empty($dadosOrcamento['url_comprovante']) && $dadosOrcamento['tipo_pagamento'] == 3){
            $dados = array(
                'titulo' => 'DuLar - Comprovante Enviado',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento,
            );
            $this->loadTemplate('comprovanteEnviado', $dados);
        }elseif(!empty($dadosOrcamento['url_comprovante']) && $dadosOrcamento['tipo_pagamento'] == 2){
            $dados = array(
                'titulo' => 'DuLar - Boleto Pronto',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento,
            );
            $this->loadTemplate('boletoPronto', $dados);
        }elseif($dt_vencimento < $today){
            $dados = array(
                'titulo' => 'DuLar - Orçamento vencido',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento
            );
            $this->loadTemplate('orcamentoVencido', $dados);
        }else{
            $o->setTipoPag(base64_decode(base64_decode($id)), 2);
            $o->setStatusPag(base64_decode(base64_decode($id)), 3);
            $assunto = "Boleto solicitado no site";
            $mensagem = "Orçamento: ".$dadosOrcamento['id']."<br>Nome: ".$dadosOrcamento['nome']."<br>"."E-mail: ".$dadosOrcamento['email'];
            $o->enviarEmailComTemplate($this->MailName, $this->MailUsername, $assunto, $mensagem);
            $dados = array(
                'titulo' => 'DuLar - Boleto Solicitado',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento
            );
            $this->loadTemplate('boletoSolicitado', $dados);
        }
    }
}