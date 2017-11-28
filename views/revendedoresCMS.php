<div class="container main">
    <h1>Revendedores (<?php echo count($revendedores);?> de <?php echo $totalRevendedores;?>)</h1>
    <div class="discussionarea">
        <div class="row">
            <div class="col-sm-9">
                <div id='div-find'>
                    <input class='form-control' onKeyPress="pesquisarTeclado();" <?php if(isset($termoPesquisa)) echo "Value='".$termoPesquisa."'"; ?> style="margin-bottom: 10px" type='text' name='find' id='find' placeholder='Busque por Nome ou Email'/>
                </div>
                <?php foreach($revendedores as $rev):?>
                <a href='<?php echo BASE_URL;?>/revendedoresCMS/abrir/<?php echo base64_encode(base64_encode($rev['id']));?>'>
                    <div class="discussion_item">
                        <div class="dis_img">
                            <img src='<?php echo BASE_URL;?>/assets/imgs/revendedor.png' border='0' width='25' height='25'>
                        </div>
                        <div class="dis_info">
                            <div class="dis-numero">
                                Revendedor: <span><?php echo $rev['nome'];?></span>
                            </div>
                            <div class="dis_title">
                                <div class='dis_title1' <?php if($rev['status'] == "1") echo ""; elseif($rev['status'] == "2") echo "style='background-color: #FDF21C;color: black'"; else echo "style='background-color: green'"; ?>><?php if($rev['status'] == "1") echo "Recebido"; elseif($rev['status'] == "2") echo "Em processamento"; else echo "Respondido"; ?></div>
                            </div>
                            <div class="dis_author dis_author1">
                                <span><strong>Número: <?php echo $rev['id'];?></strong></span>
                                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<img src="<?php echo BASE_URL;?>/assets/imgs/time.png" border="0" width="13" height="13"> em <?php echo date_format(date_create($rev['dt_criacao']), 'd/m/Y \à\s H:i:s');?>
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
                <div id='0' class="dis_filtro_item"><a href="<?php echo BASE_URL;?>/revendedoresCMS">Todos</a></div>
                <h5 class="tipo-filtro">Status: </h5>
                <div id='1' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/revendedoresCMS?filtro=1">Recebido</a></div>
                <div id='2' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/revendedoresCMS?filtro=2">Processando</a></div>
                <div id='3' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/revendedoresCMS?filtro=3">Respondido</a></div>
            </div>
    </div>
</div>