<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-home.css">
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
        <h3>Enxovais DuLar</h3>
        <p>SEJA UM REVENDEDOR<br>CONHEÇA AS VANTAGENS!</p>
        <div id="botao-transparente"><a href="<?php echo BASE_URL;?>/revendedor">Conheça</a></div>
        <div id="div-branca"></div>
    </div>
    <div style="float: right;margin-top: 115px;margin-right: 10px;">
        Imagens ilustrativas
    </div>
</div>
<div class="container-fluid home-preferencias">
    <h3>Aqui temos o que a sua casa precisa<br>E o que a sua família merece!</h3>
    <div class="row imagens-modelo" style="text-align: center">
        <div class="col-md-6 div-esquerda" >
            <div class="div-img-modelo" id="img-cama" style="margin-bottom: 40px">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Cama">Cama</a></span>
            </div>
            <div class="div-img-modelo" id="img-mesa">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Mesa">Mesa</a></span>
            </div>
        </div>
        <div  class="col-md-6 div-direita">
            <div class="div-img-modelo" id="img-banho" style="margin-bottom: 40px">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Banho">Banho</a></span>
            </div>
            <div class="div-img-modelo" id="img-decoracao">
                <span><a href="<?php echo BASE_URL;?>/produtos/categorias/Decoracao">Decoração</a></span>
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
        shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "whatsapp"]
    });
</script>

