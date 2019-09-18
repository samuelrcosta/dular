<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-home.css?v=1.2">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<style>
    .compartilhar{
        margin-bottom: 20px;
    }
    .compartilhar a{
        margin: 0;
    }
</style>
    <div class="home-cap-img">
        <h1>Enxovais DuLar</h1>
        <p>SEJA UM REVENDEDOR<br>CONHEÇA AS VANTAGENS!</p>
        <div id="botao-transparente"><a href="<?php echo BASE_URL;?>/revendedor">Conheça</a></div>
        <div id="div-branca"></div>
    </div>
    <div style="float: right;margin-top: 115px;margin-right: 10px;">
        Imagens ilustrativas
    </div>
</div>
<div class="container-fluid home-preferencias">
    <h2>Aqui temos o que a sua casa precisa<br>E o que a sua família merece!</h2>
    <div class="row imagens-modelo" style="text-align: center">
        <div class="col-md-6 div-esquerda" >
            <div class="div-img-modelo" id="img-cama" style="margin-bottom: 40px">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Cama"><h3>Cama</h3></a></span>
            </div>
            <div class="div-img-modelo" id="img-mesa">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Mesa"><h3>Mesa</h3></a></span>
            </div>
        </div>
        <div  class="col-md-6 div-direita">
            <div class="div-img-modelo" id="img-banho" style="margin-bottom: 40px">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Banho"><h3>Banho</h3></a></span>
            </div>
            <div class="div-img-modelo" id="img-decoracao">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Decoração"><h3>Decoração</h3></a></span>
            </div>
        </div>
    </div>
</div>
<div class="container compartilhar">
    <h3 style="margin-bottom: 15px"><img style="width: 40px;margin-right: 10px" src="<?php echo BASE_URL ?>/assets/imgs/share.png" alt="Logo compartilhar">Compartilhar</h3>
    <div id="share"></div>
</div>
<script>
    $("#share").jsSocials({
        showLabel: false,
        showCount: false,
        shares: ["twitter", "facebook", "whatsapp"]
    });
</script>

