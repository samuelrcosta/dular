<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
<div class="container">
    <h1 style="text-align: center;margin-top: 40px;font-size: 32px">Seja um Revendedor DuLar<br>Conheça as vantagens!</h1>
    <ul>
        <li>Consiga a independência financeira</li>
        <li>Ganhe 100% de lucro sobre as vendas</li>
        <li>vantagem 3</li>
        <li>Vantagem 4</li>
    </ul>
    <div class="revendedor-cadastro-box">
        <h1 style="text-align: center;margin-top: 40px;font-size: 32px">Faça seu cadastro agora mesmo!</h1>
        <p style="text-align: center">Preencha os campos abaixo. Após o envio dos dados iremos entrar em contato e fornecer maiores informações</p>
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
            <input type="submit" class="btn-lg btn-success" style="cursor: pointer" value="Enviar">
        </form>
    </div>
    <h2 style="text-align: center;margin-top: 20px;font-size: 27px">Perguntas Frequentes</h2>
    <div class="corpo">
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">1</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Pergunta 1</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                &ensp;&ensp;&ensp;&ensp;oasmajfaspojfaspojfsaopfjsaopfjsaopjfpoasjfpaosjfaspojfaspofjaspojfsaopjfoaspjfospajfopajfopasj faosjfasopjfsaop fasjopfajsopfj saas fpo fapsojsafop asaasfpfsfspoa fsa jpofas jopassfaopjsafosafjopsafsafopasf saf sfas fasfojasfpoasjpsaojfsaopjfsapojfsaopjsofapjfsoapjsfaosfajsfopa sf sao fjaospjospajafsosjafopsafjopasfjsfopjsfaposajfopasjasopjfsaopajsfosaf fasfkalnfaskl asfn slakf asknf salkf safsklsa fnklasfnkfsa lka akslfnaskl fnaklfas nfa a sakn asf asnf kas fkf.<br>
            </div>
        </div>
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">2</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Pergunta 2</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                <strong>Título</strong><br>
                &ensp;&ensp;&ensp;&ensp;oasmajfaspojfaspojfsaopfjsaopfjsaopjfpoasjfpaosjfaspojfaspofjaspojfsaopjfoaspjfospajfopajfopasj faosjfasopjfsaop fasjopfajsopfj saas fpo fapsojsafop asaasfpfsfspoa fsa jpofas jopassfaopjsafosafjopsafsafopasf saf sfas fasfojasfpoasjpsaojfsaopjfsapojfsaopjsofapjfsoapjsfaosfajsfopa sf sao fjaospjospajafsosjafopsafjopasfjsfopjsfaposajfopasjasopjfsaopajsfosaf fasfkalnfaskl asfn slakf asknf salkf safsklsa fnklasfnkfsa lka akslfnaskl fnaklfas nfa a sakn asf asnf kas fkf.<br>
            </div>
        </div>
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">3</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Pergunta 3</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                &ensp;&ensp;&ensp;&ensp;oasmajfaspojfaspojfsaopfjsaopfjsaopjfpoasjfpaosjfaspojfaspofjaspojfsaopjfoaspjfospajfopajfopasj faosjfasopjfsaop fasjopfajsopfj saas fpo fapsojsafop asaasfpfsfspoa fsa jpofas jopassfaopjsafosafjopsafsafopasf saf sfas fasfojasfpoasjpsaojfsaopjfsapojfsaopjsofapjfsoapjsfaosfajsfopa sf sao fjaospjospajafsosjafopsafjopasfjsfopjsfaposajfopasjasopjfsaopajsfosaf fasfkalnfaskl asfn slakf asknf salkf safsklsa fnklasfnkfsa lka akslfnaskl fnaklfas nfa a sakn asf asnf kas fkf.<br>
            </div>
        </div>
        <div class="duvida">
            <div class="duvida-box">
                <div class="duvida-numero">4</div>
                <div class="duvida-container-titulo">
                    <div class="duvida-titulo">Pergunta 4</div>
                    <div class="duvida-icon"><img src="<?php echo BASE_URL;?>/assets/imgs/arrow-down.png" alt="Seta para baixo"/></div>
                </div>
            </div>
            <div class="duvida-corpo">
                <strong>Título</strong><br><br>
                oasmajfaspojfaspojfsaopfjsaopfjsaopjfpoasjfpaosjfaspojfaspofjaspojfsaopjfoaspjfospajfopajfopasj faosjfasopjfsaop fasjopfajsopfj saas fpo fapsojsafop asaasfpfsfspoa fsa jpofas jopassfaopjsafosafjopsafsafopasf saf sfas fasfojasfpoasjpsaojfsaopjfsapojfsaopjsofapjfsoapjsfaosfajsfopa sf sao fjaospjospajafsosjafopsafjopasfjsfopjsfaposajfopasjasopjfsaopajsfosaf fasfkalnfaskl asfn slakf asknf salkf safsklsa fnklasfnkfsa lka akslfnaskl fnaklfas nfa a sakn asf asnf kas fkf.
            </div>
        </div>
        <div class="duvida-nao-encontrada" style="text-align: center;margin-top: 30px;margin-bottom: 10px">
            Não encontrou sua dúvida?<br>
            <a href="<?php echo BASE_URL;?>/contato">Clique aqui</a> para enviar uma mensagem de contato.
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery.mask.js"></script>
<script>
    window.onload = function () {
        $("#cpf").mask("000.000.000-00");
        $("#rg").mask("0000000");
        $("#investimentoinicial").mask("#.##0,00", {reverse: true});
        $('#celular').mask('(00) 0000-#0000');
        $('#telefone').mask('(00) 0000-0000');
        $('#cep').mask('00000-000');
    }
    $(function () {
        $(".duvida-box").bind('click', function () {
            $(this).parent().find('.duvida-corpo').slideToggle();
            setTimeout(resize, 500);
        })
    })
</script>