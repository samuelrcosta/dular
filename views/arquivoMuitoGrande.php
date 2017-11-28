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
    <h1 style="text-align: center;margin-top: 45px;font-size: 32px;margin-bottom: 40px">Erro no envio do comprovante</h1>
    <p><?php echo $dadosOrcamento['nome'];?>, ocorreu um erro ao fazer o envio do comprovante<br>
        Verifique se o arquivo está em algum dos formatos permitidos<br>
        Ou se o arquivo não ultrapassa o limite de tamanho <strong>(4 Megabytes)</strong><br>
        Clique no botão abaixo para tentar novamente:
    </p>
    <a href="javascript:window.history.go(-1)" class="btn btn-lg btn-primary" style="margin-top:10px;margin-bottom: 40px;">Tentar novamente</a>
    <p>Qualquer dúvida entre em contato conosco<br>
        E-mail: dular@dularexovais.com.br<br>
        Telefone: (62) 3514-5771<br>
        Ou <strong><a style="margin: 0;color: black" href="<?php echo BASE_URL ?>/contato">clique aqui</a></strong> para enviar uma mensagem de contato.
    </p>
</div>