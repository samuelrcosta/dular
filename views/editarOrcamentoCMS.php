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
    <button class="btn btn-primary" style="margin-bottom: 10px;cursor: pointer" onclick="location.href = '<?php echo BASE_URL ?>/orcamentosCMS/abrir/<?php echo base64_encode(base64_encode($dadosOrcamento['id'])) ?>'">Voltar</button>
    <button class="btn btn-danger botao2" style="margin-bottom: 10px;cursor: pointer" id="excluir">Excluir</button>
    <div class="box">
        <div class="box-title" data-n="<?php echo $dadosOrcamento['id'] ?>"><h3>Alterando Orçamento</h3></div>
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
                                <label><span class="obrigatorio">*</span>Status Interno:</label>
                                <select class="form-control" id="status" name="status" data-alt="Status Interno" data-ob="1">
                                    <?php
                                    if($dadosOrcamento['status'] == '1' || $dadosOrcamento['status'] == 1)
                                        echo "<option value='1' selected>Recebido</option>
                                                <option value='2'>Processando</option>
                                                <option value='3'>Enviado</option>
                                                <option value='4'>Concluído</option>";
                                    if($dadosOrcamento['status'] == '2' || $dadosOrcamento['status'] == 2)
                                        echo "<option value='1'>Recebido</option>
                                                <option value='2' selected>Processando</option>
                                                <option value='3'>Enviado</option>
                                                <option value='4'>Concluído</option>";
                                    if($dadosOrcamento['status'] == '3' || $dadosOrcamento['status'] == 3)
                                        echo "<option value='1'>Recebido</option>
                                                <option value='2'>Processando</option>
                                                <option value='3' selected>Enviado</option>
                                                <option value='4'>Concluído</option>";
                                    if($dadosOrcamento['status'] == '4' || $dadosOrcamento['status'] == 4)
                                        echo "<option value='1'>Recebido</option>
                                                <option value='2'>Processando</option>
                                                <option value='3'>Enviado</option>
                                                <option value='4' selected>Concluído</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Status Pagamento:</label>
                                <select class="form-control" id="status_pag" name="status_pag" data-alt="Status Pagamento" data-ob="1">
                                    <?php
                                    if($dadosOrcamento['status_pag'] == '1' || $dadosOrcamento['status_pag'] == 1)
                                        echo "<option value='1' selected>Em aberto</option>
                                                <option value='2'>Processando / Comprovante Enviado</option>
                                                <option value='3'>Confirmado</option>";
                                    if($dadosOrcamento['status_pag'] == '2' || $dadosOrcamento['status_pag'] == 2)
                                        echo "<option value='1'>Em aberto</option>
                                                <option value='2' selected>Processando / Comprovante Enviado</option>
                                                <option value='3'>Confirmado</option>";
                                    if($dadosOrcamento['status_pag'] == '3' || $dadosOrcamento['status_pag'] == 3)
                                        echo "<option value='1'>Em aberto</option>
                                                <option value='2'>Processando / Comprovante Enviado</option>
                                                <option value='3' selected>Confirmado</option>";
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row1">
                        <div class="informacao">
                            <h4>Dados do Contato</h4>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Nome Completo:</label>
                                <input type="text" class="form-control" id="nome" name="nome" data-alt="Nome" data-ob="1" value="<?php echo $dadosOrcamento['nome'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>E-mail:</label>
                                <input type="text" class="form-control" id="email" name="email" data-alt="Email" data-ob="1" value="<?php echo $dadosOrcamento['email'];?>">
                            </div>
                            <div class="form-group">
                                <label>Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" data-alt="Telefone" data-ob="0" value="<?php echo $dadosOrcamento['telefone'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Celular:</label>
                                <input type="text" class="form-control" id="celular" name="celular" data-alt="Celular" data-ob="1" value="<?php echo $dadosOrcamento['celular'];?>">
                            </div>
                            <?php if($dadosOrcamento['tipo_pessoa'] == "pj"):?>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>CNPJ</label>
                                    <input type="text" id="cpf-cnpj" name="cpf-cnpj" class="form-control" data-ob="1" data-alt="CNPJ" value="<?php echo $dadosOrcamento['cpf_cnpj'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>IE</label>
                                    <input type="text" id="rg-ie" name="rg-ie" class="form-control" data-ob="1" data-alt="IE" value="<?php echo $dadosOrcamento['rg_ie'];?>">
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>CPF</label>
                                    <input type="text" id="cpf-cnpj" name="cpf-cnpj" class="form-control" data-ob="1" data-alt="CPF" value="<?php echo $dadosOrcamento['cpf_cnpj'];?>">
                                </div>
                                <div class="form-group">
                                    <label><span class="obrigatorio">*</span>RG</label>
                                    <input type="text" id="rg-ie" name="rg-ie" class="form-control" data-ob="1" data-alt="RG" value="<?php echo $dadosOrcamento['rg_ie'];?>">
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Endereço</label>
                                <input type="text" id="endereco" name="endereco" class="form-control" data-ob="1" data-alt="Endereço" value="<?php echo $dadosOrcamento['endereco'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Bairro</label>
                                <input type="text" id="bairro" name="bairro" class="form-control" data-ob="1" data-alt="Bairro" value="<?php echo $dadosOrcamento['bairro'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Cidade</label>
                                <input type="text" id="cidade" name="cidade" class="form-control" data-ob="1" data-alt="Cidade" value="<?php echo $dadosOrcamento['cidade'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>CEP</label>
                                <input type="text" id="cep" name="cep" class="form-control" data-ob="1" data-alt="CEP" value="<?php echo $dadosOrcamento['cep'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Estado</label>
                                <input type="text" id="estado" name="estado" class="form-control" data-ob="1" data-alt="Estado" value="<?php echo $dadosOrcamento['estado'];?>">
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
                        <p>Tem certeza que deseja excluir o orçamento?</p>
                        <span id="n" style="display: none"><?php echo $dadosOrcamento['id'] ?>></span>
                        <button class="btn btn-danger" style="cursor: pointer" onclick="sexcluir()">Sim</button>
                        <button class="btn btn-danger" style="cursor: pointer" onclick="nexcluir()">Não</button>
                    </div>
                </div>
                <input type="submit" id="submit" value="Salvar" style="margin-left: 20px;cursor: pointer" class="btn-lg btn-success" />
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery.mask.js"></script>
<script>
    $('#celular').mask('(00) 0000-#0000');
    $('#telefone').mask('(00) 0000-0000');

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
                url: "<?php echo BASE_URL;?>/orcamentosCMS/excluir/"+n,
                cache: false
            })
            .done(function(result)
            {
                var resp = result;
                if(resp == 1){
                    window.location="<?php echo BASE_URL;?>/orcamentosCMS";
                } else{
                    alert("Erro");
                }
            });
        $("#confirm").hide('fast');
    }
</script>