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
    <button class="btn btn-primary" style="margin-bottom: 10px;cursor: pointer" onclick="location.href = '<?php echo BASE_URL ?>/contatosCMS/abrir/<?php echo base64_encode(base64_encode($contato['id'])) ?>'">Voltar</button>
    <button class="btn btn-danger botao2" style="margin-bottom: 10px;cursor: pointer" id="excluir">Excluir</button>
    <div class="box">
        <div class="box-title" data-n="<?php echo $contato['id'] ?>"><h3>Alterando Contato</h3></div>
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
                                    if($contato['status'] == '1' || $contato['status'] == 1)
                                        echo "<option value='1' selected>Recebido</option>
                                                <option value='2'>Processando</option>
                                                <option value='3'>Concluído</option>";
                                    if($contato['status'] == '2' || $contato['status'] == 2)
                                        echo "<option value='1'>Recebido</option>
                                                <option value='2' selected>Processando</option>
                                                <option value='3'>Concluído</option>";
                                    if($contato['status'] == '3' || $contato['status'] == 3)
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
                            <h4>Dados do Contato</h4>
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Nome Completo:</label>
                                <input type="text" class="form-control" id="nome" name="nome" data-alt="Nome" data-ob="1" value="<?php echo $contato['nome'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>E-mail:</label>
                                <input type="text" class="form-control" id="email" name="email" data-alt="Email" data-ob="1" value="<?php echo $contato['email'];?>">
                            </div>
                            <div class="form-group">
                                <label>Telefone:</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" data-alt="Telefone" data-ob="0" value="<?php echo $contato['telefone'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Celular:</label>
                                <input type="text" class="form-control" id="celular" name="celular" data-alt="Celular" data-ob="1" value="<?php echo $contato['celular'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Assunto:</label>
                                <input type="text" class="form-control" id="assunto" name="assunto" data-alt="Assunto" data-ob="1" value="<?php echo $contato['assunto'];?>">
                            </div>
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Mensagem:</label>
                                <textarea class="form-control" rows="3" id="mensagem" name="mensagem" data-alt="Mensagem" data-ob="1">
                                    <?php echo $contato['mensagem'];?>
                                </textarea>
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
                        <span id="n" style="display: none"><?php echo $contato['id'] ?>></span>
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
    window.onload = function () {
        $('#celular').mask('(00) 0000-#0000');
        $('#telefone').mask('(00) 0000-0000');
    }

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
                url: "<?php echo BASE_URL;?>/contatosCMS/excluir/"+n,
                cache: false
            })
            .done(function(result)
            {
                var resp = result;
                if(resp == 1){
                    window.location="<?php echo BASE_URL;?>/contatosCMS";
                } else{
                    alert("Erro");
                }
            });
        $("#confirm").hide('fast');
    }
</script>