</div>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
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
<div class="container">
    <h1 style="text-align: center;margin-top: 45px;font-size: 32px;margin-bottom: 40px">Boleto pronto para download</h1>
    <p>Olá <?php echo $dadosOrcamento['nome'];?>, o seu boleto está pronto<br>
        Para fazer o download, clique no botão abaixo:
    </p>
    <p style="margin-left: 15px"><a class="btn btn-success" style="color: white" href="<?php echo BASE_URL?>/assets/media/boletos/<?php echo $dadosOrcamento['url_comprovante']?>" download="Boleto-DuLar-<?php echo date_format(date_create($dadosOrcamento['dt_vencimento']), 'd-m-Y')?>"><img style="margin-right: 5px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADLSURBVEhL7ZXBDYJAEEWhA+iExFgJZXiwEc4mVmE1nqUCw9UL+gZ+ZCGECMzBKC/52ezOzIOwB6L/o67rgtyDFCr5gfT0DLC9Sn5sD5nF9pBJkOTkHOQqf4PtB/Vco5+DJ2Xw1iqnUV+q0XkwvCePVjWO1a1PI8tAcJRvFKurdTl4YkSXVtlH57Fa14EoQdi7H+0TtfiA9H0/ttpeJV8QN/djq478wW/3c7BVR18Ib5eRnWMyqTs4rIgnldQdfOuShP/wtSml/hmi6AXmspBi8tjyHQAAAABJRU5ErkJggg=="> Baixar boleto</a></p>
    <p style="margin-top: 30px">Qualquer dúvida entre em contato conosco<br>
        E-mail: dular@dularexovais.com.br<br>
        Telefone: (62) 3514-5771<br>
        Ou <strong><a style="margin: 0;color: black" href="<?php echo BASE_URL ?>/contato">clique aqui</a></strong> para enviar uma mensagem de contato.
    </p>
    <div class="botoes">
        <a href="<?php echo BASE_URL;?>"><button id="btn1">Home</button></a>
        <a href="<?php echo BASE_URL;?>/produtos"><button id="btn2">Produtos</button></a>
    </div>
</div>