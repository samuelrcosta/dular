<div class="container main">
    <div class="box">
        <div class="box-title">
            Informações Pessoais
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="userphoto">
                        <img src="assets/media/avatar/<?php echo $usuario->getFoto() ?>.jpg" border="0" width="100%">
                        <input type="file" id="foto" name="foto" data-ob="0" style="margin-top: 15px;
    margin-bottom: 5px;">
                        <input class="btn btn-primary" type="button" id="trocarfoto" style="cursor: pointer" value="Trocar foto" />
                    </div>
                </div>
                <form method="POST" onsubmit="return validar(this)" style="width: 65%">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label><span class="obrigatorio">*</span>Nome Completo:</label>
                            <input type="text" class="form-control" id="nome" data-id="<?php echo base64_encode(base64_encode($usuario->getId())) ?>" name="nome" alt="Nome" data-ob="1" value="<?php echo $usuario->getNome();?>">
                        </div>
                        <div class="form-group">
                            <label><span class="obrigatorio">*</span>Email:</label>
                            <input type="text" class="form-control" id="email" name="email" alt="Email" data-ob="1" value="<?php echo $usuario->getEmail();?>">
                        </div>
                        <div class="form-group">
                            <label>Digite a nova senha:</label>
                            <input type="password" class="form-control" id="senha" name="senha" alt="Senha" data-ob="0">
                        </div>
                        <div class="form-group">
                            <label>Confirme a nova senha:</label>
                            <input type="password" class="form-control" id="senha2" name="senha2" alt="Confirmação de senha" data-ob="0">
                        </div>
                    </div>
                    <input type="submit" value="Salvar" class="btn-lg btn-success" style="cursor: pointer;margin-top: 15px">
                </form>
            </div>
        </div>
    </div>
    <div id='retorno' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
        <ul class="list-group">
            <li class="list-group-item">
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    var id = $(".box-title").attr('data-n');
    window.onload = function () {
        resize();
    }

    var form;
    $('#foto').change(function (event) {
        form = new FormData();
        form.append('foto', event.target.files[0]); // para apenas 1 arquivo
        //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção
    });


    $('#trocarfoto').click(function () {
        $.ajax({
            url: '<?php echo BASE_URL ?>/perfilCMS/alterarFoto/' + $("#nome").attr('data-id'),
            data: form,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
                if(data == 1){
                    location.reload(true);
                } else {
                    $("#retorno").show("slow").html("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" + data);
                }
            }
        });
    });
</script>