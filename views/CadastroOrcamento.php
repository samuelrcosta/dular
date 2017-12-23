<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
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

</style>
<div class="menu-produtos">
    <div class="container">
        <div>
            <h5><a href="<?php echo BASE_URL;?>">HOME</a> > <a href="<?php echo BASE_URL;?>/orcamento">ORCAMENTO</a></h5>
        </div>
    </div>
</div>
<div class="container">
    <h1 style="text-align: center;margin-top: 40px;font-size: 32px">Faça seu orçamento conosco!</h1>
        <div class="revendedor-cadastro-box">
        <p style="text-align: center">Preencha os campos abaixo. Após o envio dos dados iremos entrar em contato e fornecer maiores informações</p>
        <form id="form-revendedor" method="POST" onsubmit="return validar(this)">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome <span>*</span></label>
                        <input type="text" id="nome" name="nome" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['nome'].'"' ?> class="form-control" data-ob="1" data-alt="Nome">
                    </div>
                    <div class="form-group">
                        <label class="radio-inline"><input id="pf" value="pf" type="radio" name="tipo-pessoa"> Pessoa Física</label>
                        <label class="radio-inline" style="margin-left: 15px"><input id="pj" value="pj" type="radio" name="tipo-pessoa"> Pessoa Jurídica</label>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CPF <span>*</span></label>
                                <input type="text" id="cpf-cnpj" name="cpf-cnpj" class="form-control" data-ob="1" data-alt="CPF" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['cpf-cnpj'].'"' ?>>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>RG <span>*</span></label>
                                <input type="text" id="rg-ie" name="rg-ie" class="form-control" data-ob="1" data-alt="RG" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['rg-ie'].'"' ?>>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Celular <span>*</span></label>
                        <input type="text" id="celular" name="celular" class="form-control" data-ob="1" data-alt="Celular" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['celular'].'"' ?>>
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" data-ob="0" data-alt="Telefone" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['telefone'].'"' ?>>
                    </div>
                    <div class="form-group">
                        <label>E-mail <span>*</span></label>
                        <input type="text" id="email" name="email" class="form-control" data-ob="1" data-alt="E-mail" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['email'].'"' ?>>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Endereço <span>*</span></label>
                        <input type="text" id="endereco" name="endereco" class="form-control" data-ob="1" data-alt="Endereço" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['endereco'].'"' ?>>
                    </div>
                    <div class="form-group">
                        <label>Bairro <span>*</span></label>
                        <input type="text" id="bairro" name="bairro" class="form-control" data-ob="1" data-alt="Bairro" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['bairro'].'"' ?>>
                    </div>
                    <div class="form-group">
                        <label>Cidade <span>*</span></label>
                        <input type="text" id="cidade" name="cidade" class="form-control" data-ob="1" data-alt="Cidade" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['cidade'].'"' ?>>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CEP <span>*</span></label>
                                <input type="text" id="cep" name="cep" class="form-control" data-ob="1" data-alt="CEP" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['cep'].'"' ?>>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Estado <span>*</span></label>
                                <input type="text" id="estado" name="estado" class="form-control" data-ob="1" data-alt="Estado" <?php if(!empty($dadosForm)) echo 'Value="'.$dadosForm['estado'].'"' ?>>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Os campos marcados com <label><span>*</span> são de preenchimento obrigatório</label></p><br>
            </div>
            <h1 style="text-align: center;margin-top: 10px;margin-bottom: 30px;;font-size: 32px">Escolha os produtos</h1>
            <div class="box-lista-produtos">
                <ul>
                    <li class="item-categoria">Cama
                        <div class="img-add-produtos">
                        </div>
                        <div class="bloco-produtos">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Produto</th>
                                        <th>Quantidade</th>
                                        <th>Observação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($camas as $cama):?>
                                    <tr>
                                        <td><img style="width:50px;" src="<?php echo BASE_URL?>/assets/imgs/produtos/<?php echo $cama['url']?>.jpg"></td>
                                        <td><a target="_blank" href="<?php echo BASE_URL?>/produtos/abrir/<?php echo base64_encode(base64_encode($cama['id']))?>"><?php echo $cama['nome']?></a></td>
                                        <td><input class="form-control quant-prod" id="qt-<?php echo base64_encode(base64_encode($cama['id']))?>" name="qt-<?php echo base64_encode(base64_encode($cama['id']))?>"></td>
                                        <td><input class="form-control obs-prod" id="obs-<?php echo base64_encode(base64_encode($cama['id']))?>" name="obs-<?php echo base64_encode(base64_encode($cama['id']))?>"></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="item-categoria">
                        Mesa
                        <div class="img-add-produtos">
                        </div>
                        <div class="bloco-produtos">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Observação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($mesas as $mesa):?>
                                    <tr>
                                        <td><img style="width:50px;" src="<?php echo BASE_URL?>/assets/imgs/produtos/<?php echo $mesa['url']?>.jpg"></td>
                                        <td><a target="_blank" href="<?php echo BASE_URL?>/produtos/abrir/<?php echo base64_encode(base64_encode($mesa['id']))?>"><?php echo $mesa['nome']?></a></td>
                                        <td><input class="form-control quant-prod" id="qt-<?php echo base64_encode(base64_encode($mesa['id']))?>" name="qt-<?php echo base64_encode(base64_encode($mesa['id']))?>"></td>
                                        <td><input class="form-control obs-prod" id="obs-<?php echo base64_encode(base64_encode($mesa['id']))?>" name="obs-<?php echo base64_encode(base64_encode($mesa['id']))?>"></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="item-categoria">
                        Banho
                        <div class="img-add-produtos">
                        </div>
                        <div class="bloco-produtos">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Observação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($banhos as $banho):?>
                                    <tr>
                                        <td><img style="width:50px;" src="<?php echo BASE_URL?>/assets/imgs/produtos/<?php echo $banho['url']?>.jpg"></td>
                                        <td><a target="_blank" href="<?php echo BASE_URL?>/produtos/abrir/<?php echo base64_encode(base64_encode($banho['id']))?>"><?php echo $banho['nome']?></a></td>
                                        <td><input class="form-control quant-prod" id="qt-<?php echo base64_encode(base64_encode($banho['id']))?>" name="qt-<?php echo base64_encode(base64_encode($banho['id']))?>"></td>
                                        <td><input class="form-control obs-prod" id="obs-<?php echo base64_encode(base64_encode($banho['id']))?>" name="obs-<?php echo base64_encode(base64_encode($banho['id']))?>"></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li class="item-categoria">
                        Decoração
                        <div class="img-add-produtos">
                        </div>
                        <div class="bloco-produtos">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Observação</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($decoracoes as $decoracao):?>
                                    <tr>
                                        <td><img style="width:50px;" src="<?php echo BASE_URL?>/assets/imgs/produtos/<?php echo $decoracao['url']?>.jpg"></td>
                                        <td><a target="_blank" href="<?php echo BASE_URL?>/produtos/abrir/<?php echo base64_encode(base64_encode($decoracao['id']))?>"><?php echo $decoracao['nome']?></a></td>
                                        <td><input class="form-control quant-prod" name="qt-<?php echo base64_encode(base64_encode($decoracao['id']))?>" id="qt-<?php echo base64_encode(base64_encode($decoracao['id']))?>"></td>
                                        <td><input class="form-control obs-prod" name="obs-<?php echo base64_encode(base64_encode($decoracao['id']))?>" id="obs-<?php echo base64_encode(base64_encode($decoracao['id']))?>"></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                </ul>
            </div>
            <?php if(isset($_SESSION['msg'])): ?>
                <?php echo $_SESSION['msg']; ?>
            <?php endif;?>
            <div id="retorno" style="margin-bottom: 10px;display: none">
            </div>
            <p style="font-size: 14px">Ao enviar um orçamento automaticamente estará de acordo com a nossa <a style="color: black;margin: 0;" target="_blank" href="<?php echo BASE_URL;?>/orcamento/TermoDeCompra">Política de Compra, Venda e Devolução</a>.</p>
            <input id="submit" role="button" type="submit" class="btn-lg btn-success" style="cursor: pointer" value="Enviar">
        </form>
    </div>
    <div class="duvida-nao-encontrada" style="text-align: center;margin-top: 30px;margin-bottom: 10px">
        Não encontrou sua dúvida?<br>
        <a href="<?php echo BASE_URL;?>/contato">Clique aqui</a> para enviar uma mensagem de contato.
    </div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery.mask.js"></script>
<script>
    <?php
        if(empty($dadosForm)){
        echo 'document.getElementById("pf").checked = true;
            $("#cpf-cnpj").mask("000.000.000-00");';
        }
        elseif(!empty($dadosForm) && $dadosForm['tipo-pessoa'] == 'pj'){
            echo 'document.getElementById("pj").checked = true;
                $("#cpf-cnpj").mask("00.000.000/0000-00");
                $("#rg-ie").mask("00000000");
                $("#cpf-cnpj").parent().find("label").html("CNPJ <span>*</span>");
                $("#cpf-cnpj").attr("data-alt", "CNPJ");
                $("#rg-ie").parent().find("label").html("IE <span>*</span>");
                $("#rg-ie").attr("data-alt", "IE");';
        }elseif(!empty($dadosForm) && $dadosForm['tipo-pessoa'] == 'pf'){
            echo 'document.getElementById("pf").checked = true;
                $("#cpf-cnpj").mask("000.000.000-00");';
        }
        if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
            echo 'document.getElementById("alertaSemProduto").scrollIntoView();';
        }
    ?>
    $("#rg-ie").mask("0000000");
    $("#investimentoinicial").mask("#.##0,00", {reverse: true});
    $('#celular').mask('(00) 0000-#0000');
    $('#telefone').mask('(00) 0000-0000');
    $('#cep').mask('00000-000');
    $('.quant-prod').mask('0000');

    $(function () {
        $(".duvida-box").bind('click', function () {
            $(this).parent().find('.duvida-corpo').slideToggle();
            setTimeout(resize, 500);
        });

        $("#pj").on("click", function () {
            $("#cpf-cnpj").mask("00.000.000/0000-00");
            $("#rg-ie").mask("00000000");
            $("#cpf-cnpj").parent().find('label').html("CNPJ <span>*</span>");
            $("#cpf-cnpj").attr('data-alt', 'CNPJ');
            $("#rg-ie").parent().find('label').html("IE <span>*</span>");
            $("#rg-ie").attr('data-alt', 'IE');
        });

        $("#pf").on("click", function () {
            $("#cpf-cnpj").mask("000.000.000-00");
            $("#rg-ie").mask("0000000");
            $("#cpf-cnpj").attr('data-alt', 'CPF');
            $("#rg-ie").attr('data-alt', 'RG');
            $("#cpf-cnpj").parent().find('label').html("CPF <span>*</span>");
            $("#rg-ie").parent().find('label').html("RG <span>*</span>");
        });

        $(".img-add-produtos").on("click", function () {
            $(this).parent().css("height", "auto");
            $(this).parent().find(".bloco-produtos").slideToggle();
        });

    })
</script>
