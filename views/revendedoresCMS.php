<div class="container main">
    <h1>Revendedores (<?php echo count($revendedores)?>)</h1>
    <div class="discussionarea">
        <div class="row">
            <div class="col-sm-9">
                <div id='div-find'>
                    <input class='form-control' onKeyPress="pesquisarTeclado();" style="margin-bottom: 10px" type='text' name='find' id='find' placeholder='Busque por Código, Nome ou Email'/>
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
                                <div class='dis_title1'><?php if($rev['status'] == "1") echo "Recebido"; elseif($rev['status'] == "2") echo "Em processamento"; else echo "Respondido"; ?></div>
                            </div>
                            <div class="dis_author dis_author1">
                                <span><strong>Número: <?php echo $rev['id'];?></strong></span>
                                &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<img src="<?php echo BASE_URL;?>/assets/imgs/time.png" border="0" width="13" height="13"> em <?php echo date_format(date_create($rev['dt_criacao']), 'd/m/Y \à\s H:i:s');?>
                            </div>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script>
    function pesquisar(){
        var str = window.location.href;
        if(str.indexOf("find") != -1){
            var res = str.replace('?find=', "EXX");
            var pos = res.indexOf("EXX");
            var final = res.substring(0, pos);
        }else{
            var final = window.location.href;
        }
        if(final.indexOf('filtro') != -1){
            window.location.href = final+"&find="+$("#find").val();
        }else{
            window.location.href = final+"?find="+$("#find").val();
        }
    }

    function pesquisarTeclado() {
        if(event.keyCode == "13"){
            pesquisar();
        }
    }
</script>