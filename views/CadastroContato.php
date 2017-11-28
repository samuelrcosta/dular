<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
<style>
    .home-back-img{
        background-image: url("../../assets/imgs/fundo.jpg");
        background-repeat: no-repeat;
        background-position: center;
        height: 155px;
        width: 100%;
        padding-top: 115px;
    }

    .menu-produtos{
        /*background-color: #F5F5F5;*/
        background-color: rgba(255, 255, 255, 0.9);
        width: 100%;
        height: 100%;
    }

    .menu-produtos .container{
        padding-top: 15px;
        height: 40px;
    }

    .menu-produtos .container h5{
        font-size: 12px;
        color: #4d4d4d;
    }

    .menu-produtos .container a{
        color: #4d4d4d;
        margin: 10px 10px;
        font-weight: 700;
    }

    .menu-produtos .container a:hover{
        text-decoration: underline;
    }

</style>
<div class="menu-produtos">
    <div class="container">
        <div>
            <h5><a href="<?php echo BASE_URL;?>">HOME</a> > <a href="<?php echo BASE_URL;?>/contato">FALE CONOSCO</a></h5>
        </div>
    </div>
</div>
    <div class="container contato-cadastro-box">
        <div class="row" style="margin-top:0px;margin-bottom: 0px;padding-bottom: 40px">
            <div class="col-md-6" style="text-align: center;">
                <div style="height: 50px;line-height: 50px;width: 230px;margin: auto;margin-top: 40px;margin-bottom: 30px;">
                    <div style="float: left;">
                        <svg fill="#FDF21C" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </div>
                    <h2 style="text-align: center;margin-top: 0px;font-size: 28px;margin-bottom: 0px;height: 50px;line-height: 50px">Onde Estamos</h2>
                </div>
                <iframe class="iframe-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3828.475125029426!2d-49.51231206341763!3d-16.34974171576393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935dd7e1d7521103%3A0x1644e2e377076424!2sAv.+Bernardo+Say%C3%A3o%2C+604%2C+Inhumas+-+GO%2C+75400-000!5e0!3m2!1spt-BR!2sbr!4v1506397133603" width="400" height="465" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="col-md-6 div-atendimento-facebook">
                <div style="height: 50px;line-height: 50px;width: 230px;margin: auto;margin-top: 40px;margin-bottom: 30px;">
                    <div style="float: left;">
                        <svg fill="#FDF21C" height="48" viewBox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                    </div>
                    <h2 style="text-align: center;margin-top: 0px;font-size: 28px;margin-bottom: 0px;height: 50px;line-height: 50px">Atendimento</h2>
                </div>
                <p style="padding-left: 40px;padding-top: 5px;margin-bottom: 25px">Entre em contato no nosso telefone: <strong>(62) 3514 - 5771</strong><br>
                O atendimento funciona de Segunda à Sexta, das 08:00 às 18:00<br>
                    Nos sábados das 08:00 as 12:00</p>
                <h3><img style="width: 42px;margin-right: 15px;margin-top: -5px" src="<?php echo BASE_URL;?>/assets/imgs/facebook.png" alt="Logo Facebook">Facebook</h3>
                <iframe class="iframe-facebook" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fjorliane&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" height="300" style="border:none;overflow:hidden;margin-top: 20px" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
            </div>
        </div>
        <h1 style="text-align: center;margin-top: 40px;font-size: 32px">Envie uma mensagem de contato</h1>
        <p style="text-align: center">Preencha os campos abaixo. Após o envio dos dados iremos entrar em contato o mais rápido possível</p>
        <form id="form-contato" method="POST" onsubmit="return validar(this)" style="margin-bottom: 60px">
            <div class="form-group">
                <label><span class="obrigatorio">*</span>Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" data-alt="Nome" data-ob="1">
            </div>
            <div class="form-group">
                <label>Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" data-alt="Telefone" data-ob="0">
            </div>
            <div class="form-group">
                <label><span class="obrigatorio">*</span>Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" data-alt="Celular" data-ob="1">
            </div>
            <div class="form-group">
                <label><span class="obrigatorio">*</span>Endereço de e-mail:</label>
                <input type="text" class="form-control" id="email" name="email" data-alt="E-mail" data-ob="1">
            </div>
            <div class="form-group">
                <label><span class="obrigatorio">*</span>Assunto:</label>
                <input type="text" class="form-control" id="assunto" name="assunto" data-alt="Assunto" data-ob="1">
            </div>
            <div class="form-group">
                <label><span class="obrigatorio">*</span>Mensagem:</label>
                <textarea class="form-control" rows="5" id="mensagem" name="mensagem" data-alt="Mensagem" data-ob="1"></textarea>
            </div>
            <p id="infocampos">Obs.: Campos com <label><span>*</span></label> são de preenchimento obrigatório.</p>
            <div id='retorno' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
                <ul class="list-group">
                    <li class="list-group-item">
                    </li>
                </ul>
            </div>
            <input type="submit" id="submit" class="btn-lg btn-success" style="cursor: pointer" value="Enviar">
        </form>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery.mask.js"></script>
<script>
    $('#celular').mask('(00) 0000-#0000');
    $('#telefone').mask('(00) 0000-0000');
</script>