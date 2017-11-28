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
            if(!empty($dadosOrcamento['url_comprovante'])){
                $dados = array(
                    'titulo' => 'DuLar - Comprovante Enviado',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento,
                );
                $this->loadTemplate('comprovanteEnviado', $dados);
            }elseif($dt_vencimento >= $today){
                $dados = array(
                    'titulo' => 'DuLar - Realizar Pagamento',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento,
                    'produtosOrcamento' => $produtosOrcamento
                );
                $this->loadTemplate('realizarPagamento', $dados);
            }else{
                $dados = array(
                    'titulo' => 'DuLar - Orçamento vencido',
                    'css' => 'style-CadastroOrcamento',
                    'id' => $id,
                    'dadosOrcamento' => $dadosOrcamento
                );
                $this->loadTemplate('orcamentoVencido', $dados);
            }
        }
    }

    public function gerarBoleto($id){
        $id = addslashes($id);
        $o = new Orcamentos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $dt_vencimento = date("Y-m-d", strtotime($dadosOrcamento["dt_vencimento"]));
        $today = date("Y-m-d");
        if(!empty($dadosOrcamento['url_comprovante'])){
            $dados = array(
                'titulo' => 'DuLar - Comprovante Enviado',
                'css' => 'style-CadastroOrcamento',
                'id' => $id,
                'dadosOrcamento' => $dadosOrcamento,
            );
            $this->loadTemplate('comprovanteEnviado', $dados);
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
}