</div>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
<div class="container">
    <h1 style="text-align: center;margin-top: 40px;font-size: 32px;margin-bottom: 25px">Orçamento vencido</h1>
    <p>Olá <?php echo $dadosOrcamento['nome'];?>, infelizmente esse orçamento já está vencido.<br>
        Entre em contato conosco solicitando a atualização da data de vencimento ou faça uma nova solicitação de orçamento.<br>
        Qualquer dúvida estamos a disposição.<br>
        <a style="margin: 0;color: black" href="<?php echo BASE_URL;?>/contato">Clique aqui</a> para nos enviar uma mensagem de contato.
    </p>
    <div class="botoes">
        <a href="<?php echo BASE_URL;?>"><button id="btn1">Home</button></a>
        <a href="<?php echo BASE_URL;?>/produtos"><button id="btn2">Produtos</button></a>
    </div>
</div>