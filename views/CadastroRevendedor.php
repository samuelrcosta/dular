<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<style>
    .home-back-img{
        background-image: url("assets/imgs/fundo.jpg");
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

    .menu-produtos .container ol{
      list-style: none;
      display: inline;
      font-size: 12px;
      color: #4d4d4d;
    }
    .menu-produtos .container ol li{
      display: inline;
    }
</style>
<div class="menu-produtos">
    <div class="container">
        <div>
          <ol vocab="https://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage"
                 href="<?php echo BASE_URL;?>">
                <span property="name">HOME</span></a>
              <meta property="position" content="1">
            </li>
            >
            <li property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage"
                 href="<?php echo BASE_URL;?>/revendedor">
                <span property="name">SEJA UM REVENDEDOR</span></a>
              <meta property="position" content="2">
            </li>
          </ol>
        </div>
    </div>
</div>
<div class="container">
    <h1 style="text-align: center;margin-top: 40px;font-size: 32px;margin-bottom: 20px;">Seja um Revendedor DuLar<br>Conheça as vantagens!</h1>
    <ul>
        <li>
            <img class="icon icons8-Cash-in-Hand" width="56" height="56" src="data:image/png;base64,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">
            Consiga independência financeira</li>
        <li>
            <img class="icon icons8-Low-Price" width="56" height="56" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAE/klEQVRoQ+2Z33MTVRTHz/5IbGkiaW07ptXOlKqAhVKkvwwDrQ/tg/oXMIJF0Vd9oD7ra/vCsyJUOuNfoDzAA6hD7S8dSpti0baDTNOxLU0gAWKy2eWetbds0uzu3c2GrAz3pc3uybnns99z9p57w8EzMjhWjuPnBrpZbZ20G/lo6CcWf8wgJ85+obA4dNrmwqlBphiZjDA4BAn4/NC+e4/Tseb1Nzn/B8QScSgKSG2gEvraOp4KyKWpCViNRZ+D6D5tTK3nithIRtel1u6q18Hv8cF89E+IpxLMSK4DaXv5Lah8IQBT//wO0WTs/wlSJpZBa00L+L1EkQ1UJA7Rf9lgXKFInS8Iu3Y2QjkByTcwxeajtwwVKjlIc/VeqKsImqbQ4r0lWIgt6dqVFKQp0KgqkTswnbBOtMPVIO80HAWRE9V4JUWC66s3stJH5EWo3VEDmHrRZNSdimBBdwWftC9mTxyhJFlyX2rhG+pIfWgrsMiDFQiv3zStFT2DktbIkVdCUCY8eVNhMaMydkZJQTD3m1/amxX3IylJamER1h6tG6ZSLmxJQTAYbEka/K9uEwHr4fb9O/B3/A4TUMlBkKBmRzXsqXojK80oGQLN3p2DtYfrhhnnChAaIaYari3auqH3wndvQiSx4r63ltHj1QP6ZXkUkqSG8g1bivSf/zyQkTzDwMFOvYA44HoK3Vjlti9Gaw0FUUC5qvuQFLgniOn+4ZNnYluHDx98c7qH5/grRk+2UBBcBPEVTVd/fJPh6m+kiFE8kqwc/P7Toetok3WKcvzbgX5O4c6T0xKlr62d84oeS0sA1sMGaT309h25q78RSL6JU1IaLk1NKuR0hYSpnBz5eGiY2m07DioEhm6icO3AXgrbddyD4PB7/WrhoyqsBa+FMYLYpgj9IoWp9Pmglxz/sCpDQVhkjKcTMBaZYDEFhLhMjoeiiQTkKqGrCL1x4uzAGZJ5nyHMe12HmSZsrW2BmvJqU1uECK/PMe/hfxy7pkKAAl9d+GTwy3wTGJ40kiMgzMEPdwXrINS83zRANKgsC6hterlYrm5xaWEnM0k18NWHa4brR+4ko+EZWFyJ4OXvyKljv14QpkemdmC0k9k9fEAfrBC6NZJLXQiMXRArEMwg6oKZ8V4l8h3Y39gEB5peY0ozNFLPtcgba37jFnNNTC/8BTNLC6QkYHrk1GAry2SmqUWdaGHebt4HTcF6Fv+WbRZWluHX8KwKIQipHly1WZwwg6AzhJEzXvzhpaUYMBSC+L/BC6luVgjm1NI+kU2YaXKtwUmYLQgFZngxddQKhC0Q/NKxrwdaRZ4nyigvvtsZgiq/n0V9XZuNeBwujo+S+9x9SZa7af9kxaml1NI6pjAegff1tnXydmEQ4vLUuJzOyAm7ELYVoUAqDMf97PGIFb2HOizDOAVRMAg6oO2/RxSU3kOdHKsyKsRv40paynDadtxKOmltbaeW1ommY86Q9l8wazLVTnZyIhN7kBD0mkCrQI6A4KRbMBU+ua+9g9eD2YSQCQTvFIQjqaWjTN6NmdmewqoKjqeW1iFt/3GX+X5XKEvxH8ZG1d2dUTtuF8ax1MqG+a/9b6yrVw6/uU+d49rcrLIUWcb/DdtxV4FgMNqOGT+z7CnsQjheI7mBUJjN60VRgs5ZlNSizmnHjJ9Z23G7qhQVBINCGPxrtQm0ClR0EKsB2bV/DCYZG2C5do+aAAAAAElFTkSuQmCC">
            Baixo investimento inicial</li>
        <li>
            <img class="icon icons8-Time-Span" width="56" height="56" src="data:image/png;base64,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">
            Liberdade de horário</li>
        <li>
            <img class="icon icons8-Color-Wheel" width="56" height="56" src="data:image/png;base64,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">
            Grande variedade de produtos e estampas</li>
        <li>
            <img class="icon icons8-Home" width="56" height="56" src="data:image/png;base64,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">
            Trabalhe em casa, seja dono do seu tempo</li>
        <li><!-- Profit icon by Icons8 -->
            <img class="icon icons8-Increase" width="56" height="56" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABs0lEQVRoQ+2WzVHDMBCFJSaFUIaHGjiQDqCEQB0MJYQOkgMlMIy7SCrBWAENlq39s6TIyWyuilfve/tWkjUX/rMXrt8oQO0Oage0A4kOaIQSDQw+b17vHo292WI12+fPwPTFdYCCWDyAcx+DWATASWD/a1++3mNx+V23W2OnAakOELjbfT+NIcL1rucIIaoCRKMxgIivhxDVANDh7CFOUYqdQKO1KgDUyQIem5HuZAOgBtGLyiF+WGs8M7PuAWoQSfFYZNzHkeGGuiQGoAaRI967yK2F3cwiAGoQUWGAs9xuJneAlWXiNMEvLvhiS+4ASzy2iyDT4zL3u4f+Ivj/faz3ssccKJ4aRL9ngnhXIgkAE0/mHcg8JShbBzji0RMHcP4sABLxUQgkNsUBmrfm1nSrw2QmGVnm3M7FAZzwSQcY4rFDaLh2FoAAIqN47FSBwChg9CZ2cWo37ZHrLsdpqdAkAI4gCC6XUAXwDpd2VFrf62K/RqUblP4/CFB641z1FcA/a3M5Kq2jHdAO/GVgrhEaobnOSYdV/JTItUHpOtcboTlP55rfsN9CNUVieytA7c78ACghsE92++xeAAAAAElFTkSuQmCC">
            Lucre mais, ganhe de 45% até 100% sobre as vendas</li>
    </ul>
    <div class="revendedor-cadastro-box">
        <h1 style="text-align: center;margin-top: 40px;font-size: 32px">Faça seu cadastro agora mesmo!</h1>
        <p style="text-align: center">Preencha os campos abaixo. Após o envio dos dados iremos entrar em contato e fornecer todas as informações</p>
        <form id="form-revendedor" method="POST" onsubmit="return validar(this)">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome <span>*</span></label>
                        <input type="text" id="nome" name="nome" class="form-control" data-ob="1" data-alt="Nome">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CPF <span>*</span></label>
                                <input type="text" id="cpf" name="cpf" class="form-control" data-ob="1" data-alt="CPF">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RG <span>*</span></label>
                                <input type="text" id="rg" name="rg" class="form-control" data-ob="1" data-alt="RG">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Celular <span>*</span></label>
                        <input type="text" id="celular" name="celular" class="form-control" data-ob="1" data-alt="Celular">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" data-ob="0" data-alt="Telefone">
                    </div>
                    <div class="form-group">
                        <label>E-mail <span>*</span></label>
                        <input type="text" id="email" name="email" class="form-control" data-ob="1" data-alt="E-mail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Endereço <span>*</span></label>
                        <input type="text" id="endereco" name="endereco" class="form-control" data-ob="1" data-alt="Endereço">
                    </div>
                    <div class="form-group">
                        <label>Bairro <span>*</span></label>
                        <input type="text" id="bairro" name="bairro" class="form-control" data-ob="1" data-alt="Bairro">
                    </div>
                    <div class="form-group">
                        <label>Cidade <span>*</span></label>
                        <input type="text" id="cidade" name="cidade" class="form-control" data-ob="1" data-alt="Cidade">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CEP <span>*</span></label>
                                <input type="text" id="cep" name="cep" class="form-control" data-ob="1" data-alt="CEP">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado <span>*</span></label>
                                <input type="text" id="estado" name="estado" class="form-control" data-ob="1" data-alt="Estado">
                            </div>
                        </div>
                    </div>
                </div>
                <p>Os campos marcados com <label><span>*</span> são de preenchimento obrigatório</label></p>
            </div>
            <div id="retorno" style="margin-bottom: 10px;display: none">

            </div>
            <input type="submit" id="submit" class="btn-lg btn-success" style="cursor: pointer" value="Enviar">
        </form>
    </div>
    <div class="container compartilhar" style="margin-top: 20px">
        <h4 style="margin-bottom: -10px"><img style="width: 35px;margin-right: 10px" src="<?php echo BASE_URL ?>/assets/imgs/share.png" alt="Logo compartilhar">Compartilhar</h4>
        <div id="share" style="margin-left: 20px"></div>
    </div>
    <h2 style="text-align: center;margin-top: 20px;font-size: 27px">Algumas Dicas</h2>
    <div class="corpo">
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">1</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Revenda e Lucro</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                &ensp;&ensp;&ensp;&ensp;Os produtos tem ótimos preços e poderão ser revendidos com excelente margem de lucro.<br>
            </div>
        </div>
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">2</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Investimento inicial</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                &ensp;&ensp;&ensp;&ensp;O investimento inicial é de R$ 600,00, o que traz oportunidade de iniciar o seu negócio.<br>
            </div>
        </div>
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">3</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Horário de Trabalho</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                &ensp;&ensp;&ensp;&ensp;Na sua casa ou onde preferir e no horário que quiser, você poderá estar apresentando os produtos com qualidade e preços que facilitarão as vendas.<br>
            </div>
        </div>
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">4</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Tempo de entrega</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                &ensp;&ensp;&ensp;&ensp;Confirmado o pagamento, a mercadoria será despachada e o tempo de entrega irá depender da transportadora ou dos correios.
            </div>
        </div>
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">5</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Como lavar seu lençol de malha</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                &ensp;&ensp;&ensp;&ensp;100% Algodão<br>
                &ensp;&ensp;&ensp;&ensp;<img src="<?php echo BASE_URL;?>/assets/imgs/Lavar01.png" class="img-icone-lavagem" alt="Ícone Lavagem" title="Lavagem">
                    <img src="<?php echo BASE_URL;?>/assets/imgs/Lavar02.png" class="img-icone-lavagem" alt="Ícone Alvejamento" title="Alvejamento">
                    <img src="<?php echo BASE_URL;?>/assets/imgs/Lavar03.png" class="img-icone-lavagem" alt="Ícone Secagem em Tambor" title="Secagem em Tambor">
                    <img src="<?php echo BASE_URL;?>/assets/imgs/Lavar04.png" class="img-icone-lavagem" alt="Ícone Passagem" title="Passagem">
                    <img src="<?php echo BASE_URL;?>/assets/imgs/Lavar05.png" class="img-icone-lavagem" alt="Ícone Limpeza" title="Limpeza"><br>
                &ensp;&ensp;&ensp;&ensp;- Não usar água quente (evita encolhimento)<br>
                &ensp;&ensp;&ensp;&ensp;- Usar sabão neutro<br>
                &ensp;&ensp;&ensp;&ensp;- Não é necessário o uso de amaciantes<br>
            </div>
        </div>
        <div class="duvida-nao-encontrada" style="text-align: center;margin-top: 30px;margin-bottom: 10px">
            Ainda tem alguma dúvida?<br>
            <a href="<?php echo BASE_URL;?>/contato">Clique aqui</a> para enviar uma mensagem de contato.
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery.mask.js"></script>
<script>
    $("#cpf").mask("000.000.000-00");
    $("#rg").mask("0000000");
    $('#celular').mask('(00) 0000-#0000');
    $('#telefone').mask('(00) 0000-0000');
    $('#cep').mask('00000-000');

    $(function () {
        $(".duvida-box").bind('click', function () {
            $(this).parent().find('.duvida-corpo').slideToggle();
            setTimeout(resize, 500);
        })
    });

    $("#share").jsSocials({
        showLabel: false,
        showCount: false,
        shares: ["twitter", "facebook", "whatsapp"]
    });
</script>