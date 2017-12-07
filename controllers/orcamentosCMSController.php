<?php
class orcamentosCMSController extends controller{
    public function index(){
        if(!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])){
            header("Location: ".BASE_URL);
        }
        $dados = array();
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '1')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $quantidadePorPaginas = 30;
        $paginaAtual = 1;
        $o = new Orcamentos();
        if(isset($_GET['p']) && !empty($_GET['p'])){
            $paginaAtual = addslashes($_GET['p']);
        }
        if(isset($_GET['find']) && !empty($_GET['find'])){
            $termoPesquisa = addslashes($_GET['find']);
            $orcamentos = $o->pesquisarOrcamentos($termoPesquisa, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($o->pesquisaOrcamentos($termoPesquisa)) / $quantidadePorPaginas);
            $totalOrcamentos = count($o->pesquisaOrcamentos($termoPesquisa));
            $dados['termoPesquisa'] = $termoPesquisa;
        }else if(isset($_GET['filtro']) && !empty($_GET['filtro'])){
            $filtro = addslashes($_GET['filtro']);
            $orcamentos = $o->getOrcamentosComStatus($filtro, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($o->getOrcamentosStatus($filtro)) / $quantidadePorPaginas);
            $totalOrcamentos = count($o->getOrcamentosStatus($filtro));
        }else if(isset($_GET['filtroPag']) && !empty($_GET['filtroPag'])){
            $filtro = addslashes($_GET['filtroPag']);
            $orcamentos = $o->getOrcamentosComStatusPag($filtro, $paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil(count($o->getOrcamentosStatusPag($filtro)) / $quantidadePorPaginas);
            $totalOrcamentos = count($o->getOrcamentosStatusPag($filtro));
        }else{
            $orcamentos = $o->getOrcamentos($paginaAtual, $quantidadePorPaginas);
            $totalPaginas = ceil($o->getTotalOrcamentos() / $quantidadePorPaginas);
            $totalOrcamentos = $o->getTotalOrcamentos();
        }
        $dados['titulo'] = 'DuLar - Lista de Orçamentos';
        $dados['usuario'] = $u;
        $dados['tipo'] = 1;
        $dados['orcamentos'] = $orcamentos;
        $dados['paginaAtual'] = $paginaAtual;
        $dados['totalPaginas'] = $totalPaginas;
        $dados['totalOrcamentos'] = $totalOrcamentos;
        $this->loadTemplateCMS('orcamentosCMS', $dados);
    }

    public function abrir($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '1')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $o = new Orcamentos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $produtosOrcamento = $o->getOrcamentoProdutos(base64_decode(base64_decode($id)));
        if(isset($_FILES['arquivo'])){
            $o->salvarBoleto(base64_decode(base64_decode($id)));
            header("Location: ".BASE_URL."/orcamentosCMS/abrir/".$id);
        }
        $dados = array(
            'titulo' => 'DuLar - Detalhes Orçamento',
            'usuario' => $u,
            'tipo' => 1,
            'dadosOrcamento' => $dadosOrcamento,
            'produtosOrcamento' => $produtosOrcamento
        );
        if(isset($_GET['retorno']))
            if($_GET['retorno'] == "email")
                $dados['retorno'] = "email";
        $this->loadTemplateCMS('abrirOrcamentoCMS', $dados);
    }

    public function definirPrecos($id){
        $id = addslashes($id);
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $o = new Orcamentos();
        $p = new Produtos();
        if(!empty($_POST)){
            $produtos = array();
            $listaProdutos = $p->getProdutos(1, 10000);
            for($i = 0; $i < count($listaProdutos); $i++){
                if(isset($_POST['qt-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))])){
                    $preco = addslashes(str_replace(",", ".", str_replace(".", "", $_POST['pr-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))])));
                    $registro = array(
                        'id' => $listaProdutos[$i]["id"],
                        'qt' => addslashes($_POST['qt-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))]),
                        'obs' => addslashes($_POST['obs-'.base64_encode(base64_encode($listaProdutos[$i]["id"]))]),
                        'pr' => $preco,
                    );
                    array_push($produtos, $registro);
                }
            }
            $observacao = addslashes($_POST['observacao']);
            $tipo_frete = addslashes($_POST['tipo_frete']);
            $preco_frete = str_replace(",", ".", addslashes($_POST['preco_frete']));
            $prazo_frete = addslashes($_POST['prazo_frete']);
            $codigo_frete = addslashes($_POST['codigo_frete']);
            $desconto = str_replace(",", ".", addslashes($_POST['desconto']));
            $dt_vencimento = date("Y-m-d",strtotime(str_replace('/','-',$_POST['dt_vencimento'])));
            $o->definirPrecos(base64_decode(base64_decode($id)), $produtos, $observacao, $tipo_frete, $preco_frete, $prazo_frete, $codigo_frete, $desconto, $dt_vencimento);
            header("Location: ".BASE_URL."/orcamentosCMS/abrir/".$id);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '1')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $produtosOrcamento = $o->getOrcamentoProdutos(base64_decode(base64_decode($id)));
        $dados = array(
            'titulo' => 'DuLar - Definir Preços',
            'usuario' => $u,
            'tipo' => 1,
            'dadosOrcamento' => $dadosOrcamento,
            'produtosOrcamento' => $produtosOrcamento
        );
        $this->loadTemplateCMS('definirPrecoCMS', $dados);
    }

    public function editar($id){
        $id = addslashes($id);
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $o = new Orcamentos();
        $p = new Produtos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $produtosOrcamento = $o->getOrcamentoProdutos(base64_decode(base64_decode($id)));
        if((isset($_POST['nome']) && !empty($_POST['nome'])) && (isset($_POST['cpf-cnpj']) && !empty($_POST['cpf-cnpj'])) && (isset($_POST['rg-ie']) && !empty($_POST['rg-ie'])) && (isset($_POST['celular']) && !empty($_POST['celular'])) && (isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['endereco']) && !empty($_POST['endereco'])) && (isset($_POST['bairro']) && !empty($_POST['bairro'])) && (isset($_POST['cidade']) && !empty($_POST['cidade'])) && (isset($_POST['cep']) && !empty($_POST['cep'])) && (isset($_POST['estado']) && !empty($_POST['estado']))  ){
            $nome = addslashes($_POST['nome']);
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
            $status = addslashes($_POST['status']);
            $status_pag = addslashes($_POST['status_pag']);
            $tipo_pagamento = addslashes($_POST['tipo_pagamento']);
            $o->setTipoPag(base64_decode(base64_decode($id)), $tipo_pagamento);
            if($dadosOrcamento['status_pag'] != $status_pag){
                $o->setStatusPag(base64_decode(base64_decode($id)), $status_pag);
                if($status_pag == '2'){
                    $o->setDataProcessamento(base64_decode(base64_decode($id)));
                }elseif($status_pag == '3'){
                    $o->setDataConfirmacao(base64_decode(base64_decode($id)));
                }
            }
            $o->editarOrcamento(base64_decode(base64_decode($id)), $nome, $cpf_cnpj, $rg_ie, $celular, $telefone, $email, $endereco, $bairro, $cidade, $cep, $estado, $status);
            header("Location: ".BASE_URL."/orcamentosCMS/abrir/".$id);

        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '1')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $dados = array(
            'titulo' => 'DuLar - Editar Orçamento',
            'usuario' => $u,
            'tipo' => 1,
            'dadosOrcamento' => $dadosOrcamento,
            'produtosOrcamento' => $produtosOrcamento
        );
        $this->loadTemplateCMS('editarOrcamentoCMS', $dados);
    }

    public function excluir($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $o = new Orcamentos();
        $o->excluir(base64_decode(base64_decode($id)));
        echo "1";
    }

    public function responder(){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        if (gettype(strpos($permissao, '1')) != 'integer') {
            header("Location: ".BASE_URL."/homeCMS");
        }
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $assunto = addslashes($_POST['assunto']);
        $mensagem = nl2br(addslashes($_POST['mensagem']));
        $o = new Orcamentos();
        if($o->enviarEmailComTemplate($nome, $email, $assunto, $mensagem) == True){
            echo "1";
        }else{
            echo "Erro";
        }

    }

    public function enviarPagamento($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $permissao = $u->getPermissao();
        $o = new Orcamentos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $produtosOrcamento = $o->getOrcamentoProdutos(base64_decode(base64_decode($id)));
        $o->setStatus(base64_decode(base64_decode($id)), 3);
        $o->setDTenvioPreco(base64_decode(base64_decode($id)));
        $mensagem = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='text-align: center'>
                        <tbody>

                            <tr>
                                <td><h2>Olá ".$dadosOrcamento['nome']."!</h2></td>
                            </tr>
                            <tr>
                                <td><h3>Segue abaixo a relação do seu orçamento</h3></td>
                            </tr>
                            <tr>
                                <td height='20'></td>
                            </tr>
                        </tbody>
                      </table>
                     <table width='100%' border='1' cellspacing='1' cellpadding='0' style='text-align: center'>
                      <thead>
                        <tr height='30'>
                            <th>Foto</th>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Quantidade</th>
                            <th>Observação</th>
                            <th>Preço Unitário</th>
                        </tr>
                      </thead>
                      <tbody>";
        foreach ($produtosOrcamento as $produto){
            $mensagem .= "<tr>
                        <td><img width='50px' src='".BASE_URL."/assets/imgs/produtos/".$produto['url'].".jpg'></td>
                            <td>".$produto['nome']."</td>
                            <td>".$produto['NomeCategoria']."</td>
                            <td>".$produto['quantidade']."</td>
                            <td>".$produto['obs_adm']."</td>
                            <td>".str_replace(".", ",", number_format($produto['preco'],2))."</td>
                            </tr>";
        }
        if($dadosOrcamento['preco_frete'] != ""){
            $mensagem .= "<tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>FRETE</strong></td>
                        <td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_frete'],2))."</strong></td>
                      </tr>";
        }
        if($dadosOrcamento['desconto'] != ""){
            $mensagem .= "<tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL</strong></td>";
            $mensagem .= "<td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_total'],2))."</strong></td>
                      </tr>
                      <tr>
                        <td colspan='5' style='text-align: right;color: red'><strong style='margin-right: 5px'>DESCONTO</strong></td>
                        <td height='25' style='color: red'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['desconto'],2))."</strong></td>
                      </tr>
                      <tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL FINAL</strong></td>
                        <td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_final'],2))."</strong></td>
                      </tr>";
        }else{
            $mensagem .= "<tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL</strong></td>";
            $mensagem .= "<td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_total'],2))."</strong></td>
                      </tr>";
        }

         $mensagem .= "</tbody>
                    </table>";
        $mensagem .= "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='text-align: center'>
                        <tbody>";
        if($dadosOrcamento['observacao'] != "")
            $mensagem .= "<tr style='text-align: left; color: red;height: 30px'>
                            <td><strong>Observações</strong></td>
                          </tr>
                          <tr style='text-align: left;color: red'>
                            <td><pre style='margin: 0'>".$dadosOrcamento['observacao']."</pre></td>
                          </tr>";
        if($dadosOrcamento['tipo_frete'] != '')
            $mensagem .= "<tr style='text-align: left;height: 30px'>
                            <td><strong>Tipo do Frete</strong></td>
                          </tr>
                          <tr style='text-align: left;'>
                            <td>".$dadosOrcamento['tipo_frete']."</td>
                          </tr>";
        if($dadosOrcamento['prazo_frete'] != '')
            $mensagem .= "<tr style='text-align: left;height: 30px'>
                            <td><strong>Prazo de Entrega</strong></td>
                          </tr>
                          <tr style='text-align: left;'>
                            <td>".$dadosOrcamento['prazo_frete']."</td>
                          </tr>";
            $mensagem .= "
                    <tr>
                        <td height='40'></td>
                    </tr>
                    <tr>
                        <td height='60'><a href='".BASE_URL."/pagamento/pagar/".$id."' target='_blank' style='padding: 15px; border: 1px solid;border-radius: 5px;background-color: #0b0b0b;color: white'>Pagar Agora!</a></td>
                    </tr>        
                    </tbody>
                </table>";
        if($o->enviarEmailComTemplate2($dadosOrcamento['nome'], $dadosOrcamento['email'], "Orçamento Definido - Enxovais DuLar", $mensagem) == True){
            header("Location: ".BASE_URL."/orcamentosCMS/abrir/".$id."?retorno=email");
        }else{
            echo "<script>alert('erro')</script>";
        }
    }

    public function enviarBoleto($id){
        if (!isset($_SESSION['cLogin']) || empty($_SESSION['cLogin'])) {
            header("Location: " . BASE_URL);
        }
        $u = new Usuarios();
        $u->iniciar($_SESSION['cLogin']);
        $o = new Orcamentos();
        $dadosOrcamento = $o->getOrcamento(base64_decode(base64_decode($id)));
        $produtosOrcamento = $o->getOrcamentoProdutos(base64_decode(base64_decode($id)));
        $o->setStatus(base64_decode(base64_decode($id)), 3);
        $o->setStatusPag(base64_decode(base64_decode($id)), 4);
        $mensagem = "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='text-align: center'>
                        <tbody>

                            <tr>
                                <td><h2>Olá ".$dadosOrcamento['nome']."!</h2></td>
                            </tr>
                            <tr>
                                <td><h3>Segue em anexo o boleto para pagamento</h3></td>
                            </tr>
                            <tr>
                                <td height='20'></td>
                            </tr>
                        </tbody>
                      </table>
                     <table width='100%' border='1' cellspacing='1' cellpadding='0' style='text-align: center'>
                      <thead>
                        <tr height='30'>
                            <th>Foto</th>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th>Quantidade</th>
                            <th>Observação</th>
                            <th>Preço Unitário</th>
                        </tr>
                      </thead>
                      <tbody>";
        foreach ($produtosOrcamento as $produto){
            $mensagem .= "<tr>
                        <td><img width='50px' src='".BASE_URL."/assets/imgs/produtos/".$produto['url'].".jpg'></td>
                            <td>".$produto['nome']."</td>
                            <td>".$produto['NomeCategoria']."</td>
                            <td>".$produto['quantidade']."</td>
                            <td>".$produto['obs_adm']."</td>
                            <td>".str_replace(".", ",", number_format($produto['preco'],2))."</td>
                            </tr>";
        }
        if($dadosOrcamento['preco_frete'] != ""){
            $mensagem .= "<tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>FRETE</strong></td>
                        <td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_frete'],2))."</strong></td>
                      </tr>";
        }
        if($dadosOrcamento['desconto'] != ""){
            $mensagem .= "<tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL</strong></td>";
            $mensagem .= "<td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_total'],2))."</strong></td>
                      </tr>
                      <tr>
                        <td colspan='5' style='text-align: right;color: red'><strong style='margin-right: 5px'>DESCONTO</strong></td>
                        <td height='25' style='color: red'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['desconto'],2))."</strong></td>
                      </tr>
                      <tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL FINAL</strong></td>
                        <td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_final'],2))."</strong></td>
                      </tr>";
        }else{
            $mensagem .= "<tr>
                        <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL</strong></td>";
            $mensagem .= "<td height='25'><strong>R$ ".str_replace(".", ",", number_format($dadosOrcamento['preco_total'],2))."</strong></td>
                      </tr>";
        }

        $mensagem .= "</tbody>
                    </table>";
        $mensagem .= "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='text-align: center'>
                        <tbody>";
        if($dadosOrcamento['observacao'] != "")
            $mensagem .= "<tr style='text-align: left; color: red;height: 30px'>
                            <td><strong>Observações</strong></td>
                          </tr>
                          <tr style='text-align: left;color: red'>
                            <td><pre style='margin: 0'>".$dadosOrcamento['observacao']."</pre></td>
                          </tr>";
        if($dadosOrcamento['tipo_frete'] != '')
            $mensagem .= "<tr style='text-align: left;height: 30px'>
                            <td><strong>Tipo do Frete</strong></td>
                          </tr>
                          <tr style='text-align: left;'>
                            <td>".$dadosOrcamento['tipo_frete']."</td>
                          </tr>";
        if($dadosOrcamento['prazo_frete'] != '')
            $mensagem .= "<tr style='text-align: left;height: 30px'>
                            <td><strong>Prazo de Entrega</strong></td>
                          </tr>
                          <tr style='text-align: left;'>
                            <td>".$dadosOrcamento['prazo_frete']."</td>
                          </tr>";
        $mensagem .= "</tbody>
                </table>";
        if($o->enviarEmailComTemplate2Anexo(base64_decode(base64_decode($id)), $dadosOrcamento['nome'], $dadosOrcamento['email'], "Boleto - Enxovais DuLar", $mensagem) == True){
            header("Location: ".BASE_URL."/orcamentosCMS/abrir/".$id."?retorno=email");
        }else{
            echo "<script>alert('erro')</script>";
        }
    }
}