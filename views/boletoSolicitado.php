</div>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
<style>
    .home-back-img {
        height: 115px;
    }
</style>
<div class="container">
    <h1 style="text-align: center;margin-top: 40px;font-size: 32px;margin-bottom: 25px">Solicitação do Boleto recebida!</h1>
    <p>Olá <?php echo $dadosOrcamento['nome'];?>, recebemos a solicitação do boleto bancário.<br>
        Enviaremos um e-mail em breve com o boleto para o pagamento.<br>
        Qualquer dúvida estamos a disposição.<br>
        <a style="margin: 0;color: black" href="<?php echo BASE_URL;?>/contato">Clique aqui</a> para nos enviar uma mensagem de contato.
    </p>
    <div class="botoes">
        <a href="<?php echo BASE_URL;?>"><button id="btn1">Home</button></a>
        <a href="<?php echo BASE_URL;?>/produtos"><button id="btn2">Produtos</button></a>
    </div>
</div>