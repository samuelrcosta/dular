</div>
<style>
    #div-botao-boleto{
        display: none;
    }

    #div-botao-deposito{
        display: none;
    }
    .home-back-img {
        height: 115px;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
<div class="container">
    <h1 style="text-align: center;margin-top: 45px;font-size: 32px;margin-bottom: 40px">Comprovante de Depósito recebido com sucesso!</h1>
    <p><?php echo $dadosOrcamento['nome'];?>, recebemos seu comprovante<br>
        Iremos analisar o mesmo e entraremos em contato para a confirmação do envio.
    </p>
    <p>Qualquer dúvida entre em contato conosco<br>
        E-mail: dular@dularexovais.com.br<br>
        Telefone: (62) 3514-5771<br>
        Ou <strong><a style="margin: 0;color: black" href="<?php echo BASE_URL ?>/contato">clique aqui</a></strong> para enviar uma mensagem de contato.
    </p>
    <div class="botoes">
        <a href="<?php echo BASE_URL;?>"><button id="btn1">Home</button></a>
        <a href="<?php echo BASE_URL;?>/produtos"><button id="btn2">Produtos</button></a>
    </div>
</div>