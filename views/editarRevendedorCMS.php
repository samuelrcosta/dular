<style>
    .row1{
        margin-right: 0;
        margin-left: 0;
    }
    .informacao{
        padding-left: 15px;
        margin-top: 15px;
        width: 100%;
    }
    .botao2{
        margin-left: 15px;
    }
    .box-title h3{
        margin-top: 17px;
    }
    hr{
        margin-top: 7px;
    }
    .obrigatorio{
        color:red;
    }
    #bgbox{
        display: none;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        z-index: 10;
    }

    #confirm{
        display: none;
        border-radius: 10px;
        position: fixed;
        left: 50%;
        top: 50%;
        width: auto;
        background-color: white;
        padding: 20px;
        transform: translate(-50%, -50%);
        z-index: 11;
    }
</style>
<div class="main">
    <a href="javascript:window.history.go(-1)" class="btn btn-primary" style="margin-bottom: 10px"><img style="margin-right: 5px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACGSURBVEhLYxiZ4P////z//v0LgXKpD6AWnAJiEEiCClMPwCwA0iDwAcg2gUpRBwANpZ8FQPr9qAUYYHhZAAJA9k4g1UEBboAajQBAQ6cBJagJPkCNRgCgIO19AgJACdrGCQyMWkQ2GBCLgID6pTAMAA2nr0VADALUrxlhAGoR7er4QQ4YGAD5xQxMLz1UIwAAAABJRU5ErkJggg=="> Voltar</a>
    <button class="btn btn-danger botao2" style="margin-bottom: 10px;cursor: pointer" id="excluir"><img style="margin-right: 5px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHVSURBVEhL7ZS7SgNhFITjpfEWQcFYiJeIoGKhRC1EFCwUtRbLPEEqn8BOfAGx8I538BETvznMFlkTdqMWFg4M55z5Z/5d/z9r4c+hXq+PNhqNsqql3wUbb8BnHnJGfdHspe+DTQ7Z8JZ6aT7CO/eqmpO1G3joaDYwr8Nj+ADnkuMR3bfUoPzKrXmr1sCwIDPBI+oUVHgGasMR9+20KeeUn/eWX8HiMKYn+AGTo+iEyilf9JbtwcNu3XaEjnK8yZ3rFsH+EA20pgtm7oPb7iOXC5ivXVfhSIgG877bALPuJi6bGrlcwHzvOgaHQjSYZ90GmIvyuY9cLmC+gDqGEmy6ROYFtwGtc6Tj9l9YzgbmU6ifpL6B9KYHbgN45tFm5YenlrOBuQZX9YawYjmAnn5IBU1/se6vZjkbBPVR7VMHqSuWA2ibbgPMy3gG7D+ynA0CO7BKqIs6YTmANuk2wLqOVb6qcpazgXkJnhDuhU3HxZz+Syryya+c5Wxg1hmfu98L0WBuuhPm+G7kh6UQ84A36yFwpZ6a/sLbPeRKuRDzglDy1S+GYDCnf9Kxnvg7AqF33kwXOmMpgFZ2G2Ceht3wzVJ+sPkefIWt/qWnKd+uo//4CQqFT0nmeWbSQNtVAAAAAElFTkSuQmCC"> Excluir</button>
    <div class="box">
        <div class="box-title" data-n="<?php echo $revendedor['id'] ?>"><h3>Alterando Revendedor</h3></div>
        <div class="box-body">
            <form id="form-revendedor" method="POST" onsubmit="return validar(this)">
                    <div class="conteudo">
                        <div class="informacao">
                            <h4>Dados Gerais</h4>
                            <hr>
                        </div>
                        <div class="row row1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>Status:</label>
                                    <select class="form-control" id="status" name="status" data-alt="Status Interno" data-ob="1">
                                        <?php
                                        if($revendedor['status'] == '1' || $revendedor['status'] == 1)
                                            echo "<option value='1' selected>Recebido</option>
                                                <option value='2'>Processando</option>
                                                <option value='3'>Concluído</option>";
                                        if($revendedor['status'] == '2' || $revendedor['status'] == 2)
                                            echo "<option value='1'>Recebido</option>
                                                <option value='2' selected>Processando</option>
                                                <option value='3'>Concluído</option>";
                                        if($revendedor['status'] == '3' || $revendedor['status'] == 3)
                                            echo "<option value='1'>Recebido</option>
                                                <option value='2'>Processando</option>
                                                <option value='3' selected>Concluído</option>";
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row row1">
                            <div class="informacao">
                                <h4>Dados do Revendedor</h4>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>Nome Completo:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" data-alt="Nome" data-ob="1" value="<?php echo $revendedor['nome'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>CPF:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" data-alt="CPF" data-ob="1" value="<?php echo $revendedor['cpf'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>RG:</label>
                                    <input type="text" class="form-control" id="rg" name="rg" data-alt="RG" data-ob="1" value="<?php echo $revendedor['rg'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>E-mail:</label>
                                    <input type="text" class="form-control" id="email" name="email" data-alt="Email" data-ob="1" value="<?php echo $revendedor['email'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" data-alt="Telefone" data-ob="0" value="<?php echo $revendedor['telefone'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" data-alt="Celular" data-ob="1" value="<?php echo $revendedor['celular'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>Endereço:</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" data-alt="Endereço" data-ob="1" value="<?php echo $revendedor['endereco'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>Bairro:</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" data-alt="Bairro" data-ob="1" value="<?php echo $revendedor['bairro'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>Cidade:</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" data-alt="Cidade" data-ob="1" value="<?php echo $revendedor['cidade'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>CEP:</label>
                                    <input type="text" class="form-control" id="cep" name="cep" data-alt="CEP" data-ob="1" value="<?php echo $revendedor['cep'];?>">
                                </div>
                                <div class="form-group">
                                    <label id="estado" data-value="<?php echo $revendedor['estado']; ?>"><span class="obrigatorio">*</span>Estado:</label>
                                    <input type="text" class="form-control" id="estado" name="estado" data-alt="Estado" data-ob="1" value="<?php echo $revendedor['estado'];?>">
                                </div>

                            </div>
                        </div>
                        <div id='retorno' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
                            <ul class="list-group">
                                <li class="list-group-item">
                                </li>
                            </ul>
                        </div>
                        <div id="bgbox"></div>
                        <div id="confirm">
                            <p>Tem certeza que deseja excluir o cadastro de revendedor?</p>
                            <span id="n" style="display: none"><?php echo $revendedor['id'] ?>></span>
                            <button class="btn btn-danger" style="cursor: pointer" onclick="sexcluir()">Sim</button>
                            <button class="btn btn-danger" style="cursor: pointer" onclick="nexcluir()">Não</button>
                        </div>
                    </div>
                    <input type="submit" value="Salvar" style="margin-left: 20px;cursor: pointer" class="btn-lg btn-success" />
            </form>
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
    $('#dt_criacao').mask('00/00/0000 às 00:00:00');

    $(function () {
        $("#excluir").bind("click", function () {
            $("#bgbox").show();
            $("#confirm").show('fast');
        })
    })
    function nexcluir() {
        $("#confirm").hide('fast');
        $("#bgbox").hide();
    }
    function sexcluir() {
        var n = $("#n").html();
        n = btoa(btoa(n));
        $.ajax(
            {
                url: "<?php echo BASE_URL;?>/revendedoresCMS/excluir/"+n,
                cache: false
            })
            .done(function(result)
            {
                var resp = result;
                if(resp == 1){
                    window.location="<?php echo BASE_URL;?>/revendedoresCMS";
                } else{
                    alert("Erro");
                }
            });
        $("#confirm").hide('fast');
    }
</script>
