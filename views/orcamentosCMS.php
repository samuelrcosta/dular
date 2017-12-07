<style>
    .discussion_item {
        height: 100px;
    }
</style>
<div class="container main">
    <h1>Orçamentos (<?php echo count($orcamentos);?> de <?php echo $totalOrcamentos;?>)</h1>
    <div class="discussionarea">
        <div class="row">
            <div class="col-sm-9">
                <div id='div-find'>
                    <input class='form-control' onKeyPress="pesquisarTeclado();" style="margin-bottom: 10px" <?php if(isset($termoPesquisa)) echo "Value='".$termoPesquisa."'"; ?> type='text' name='find' id='find' placeholder='Busque por Nome ou Email'/>
                </div>
                <?php foreach($orcamentos as $cont):?>
                    <a href='<?php echo BASE_URL;?>/orcamentosCMS/abrir/<?php echo base64_encode(base64_encode($cont['id']));?>'>
                        <div class="discussion_item">
                            <div class="dis_img">
                                <img src='<?php echo BASE_URL;?>/assets/imgs/logo-compra.png' border='0' width='25' height='25'>
                            </div>
                            <div class="dis_info">
                                <div class="dis-numero">
                                    Nome: <span><?php echo $cont['nome'];?></span>
                                </div>
                                <div class="dis_title">
                                    <div class='dis_title1' <?php if($cont['status'] == "1") echo ""; elseif($cont['status'] == "2") echo "style='background-color: #FDF21C;color: black'"; elseif($cont['status'] == 3) echo ""; else echo "style='background-color: green'"; ?>><?php if($cont['status'] == "1") echo "Recebido"; elseif($cont['status'] == "2") echo "Em processamento"; elseif($cont['status'] == "3") echo "Enviado"; else echo "Concluído" ?></div>
                                </div>
                                <div class="dis_author dis_author1">
                                    <span><strong>Número: <?php echo $cont['id'];?></strong></span>
                                    &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<img src="<?php echo BASE_URL;?>/assets/imgs/time.png" border="0" width="13" height="13"> em <?php echo date_format(date_create($cont['dt_criacao']), 'd/m/Y \à\s H:i:s');?>
                                </div>
                                <div class="dis_author dis_author1">
                                    <span><strong>Status do Pagamento: <?php if($cont['status_pag'] == "1") echo "Em aberto";elseif($cont['status_pag'] == "2") echo "Comprovante Enviado";elseif($cont['status_pag'] == "3") echo "Boleto Solicitado";elseif($cont['status_pag'] == "4") echo "Boleto Enviado";else echo "Confirmado" ?></strong></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <div id='div-pagina' style="margin-bottom: 10px;text-align: right">
                    Página <input style="width: 30px;text-align: center" type='text' maxlength='3' id='pagina' onkeyup='somenteNumeros(this)' value='<?php echo $paginaAtual ?>'> de <span id='total-paginas'><?php echo $totalPaginas ?></span> <button class='btn btn-secondary btn-sm botao-pag' id='mudarPag' onclick='mudarPagina()'> Ir </button> <button class='btn btn-secondary btn-sm botao-pag' id='btn-anterior' onclick='anteriorPagina()'>< Anterior</button> <button class='btn btn-secondary btn-sm botao-pag' id='btn-proximo' onclick='proximaPagina()'>Próxima ></button>
                </div>
            </div>
            <div class="col-sm-3">
                <h4>Filtrar por</h4>
                <br>
                <div id='0' class="dis_filtro_item"><a href="<?php echo BASE_URL;?>/orcamentosCMS">Todos</a></div>
                <h5 class="tipo-filtro">Status Interno: </h5>
                <div id='1' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtro=1">Recebido</a></div>
                <div id='2' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtro=2">Processando</a></div>
                <div id='3' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtro=3">Enviado</a></div>
                <div id='4' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtro=4">Concluído</a></div>
                <h5 class="tipo-filtro">Status Pagamento: </h5>
                <div id='1' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtroPag=1">Em aberto</a></div>
                <div id='2' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtroPag=2">Comprovante Recebido</a></div>
                <div id='3' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtroPag=3">Boleto Solicitado</a></div>
                <div id='4' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtroPag=4">Boleto Enviado</a></div>
                <div id='5' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/orcamentosCMS?filtroPag=5">Confirmado</a></div>
            </div>
        </div>
    </div>
</div>