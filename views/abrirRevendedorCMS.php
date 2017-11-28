<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=y8hlkeav3umi8rivoexdtcih73qwo8lmbfosa7g1o7yv5jwx"></script>
<style>
    button{
        cursor: pointer;
    }
    #bgbox{
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        z-index: 10;
    }

    #confirm{
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
    .loading{
        display: none;
    }
    .loading2{
        display: none;
    }
    .loading3{
        display: none;
    }
    .msg-completo{
        display: none;
    }
    .botao{
        color: white;
        margin-left: 15px;
        padding: 20px;
        padding-left: 30px;
        padding-right: 30px;
        background-color: rgb(30, 53, 74);
        border-color: rgb(30, 53, 74);
    }
</style>
<div class="container main">
    <h1 style='margin-bottom: 20px'>Contato de Revendedor</h1>
    <a href="javascript:window.history.go(-1)" class="btn btn-primary">Voltar</a>
    <button class="btn btn-secondary" onclick="location.href = '<?php echo BASE_URL;?>/revendedoresCMS/editar/<?php echo base64_encode(base64_encode($revendedor['id']))?>'">Editar</button>
    <button class="btn btn-success" id="btnresponder" data-id="<?php echo base64_encode(base64_encode($revendedor['id']))?>" data-nome="<?php echo $revendedor['nome'] ?>" data-email="<?php echo $revendedor['email'] ?>" onclick="responder()">Enviar E-mail</button>
    <div class="box" style="margin-top: 10px">
        <div class="box-title">Detalhes do contato</div>
        <div class="box-body">
            <p>Data do Contato: <?php echo date_format(date_create($revendedor['dt_criacao']), 'd/m/Y \à\s H:i:s');?></p>
            <p>Status do Pedido: <?php if($revendedor['status'] == "1") echo "Em aberto"; elseif($revendedor['status'] == '2') echo "Em processamento";else echo "Respondido" ?></p>
            <p>Nome: <?php echo $revendedor['nome'] ?></p>
            <p>CPF: <?php echo $revendedor['cpf'] ?></p>
            <p>RG: <?php echo $revendedor['rg'] ?></p>
            <p>Celular: <?php echo $revendedor['celular'] ?></p>
            <p>Telefone: <?php echo $revendedor['telefone'] ?></p>
            <p>E-mail: <?php echo $revendedor['email'] ?></p>
            <p>Endereço: <?php echo $revendedor['endereco'] ?></p>
            <p>Bairro: <?php echo $revendedor['bairro'] ?></p>
            <p>Cidade: <?php echo $revendedor['cidade'] ?></p>
            <p>CEP: <?php echo $revendedor['cep'] ?></p>
            <p>Estado: <?php echo $revendedor['estado'] ?></p>
        </div>
    </div>
    <div id='retorno' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
        <ul class="list-group">
            <li class="list-group-item">
            </li>
        </ul>
    </div>
    <div id="bgbox" style="display: none"></div>
    <div id="confirm" style="display: none">
        <div class="msg-alerta" style="text-align: center">
            <p>Tem certeza que deseja enviar o E-mail?</p>
            <div class="loading2">
                <div class="loader loader--style3" title="2">
                    <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
  <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
      <animateTransform attributeType="xml"
                        attributeName="transform"
                        type="rotate"
                        from="0 25 25"
                        to="360 25 25"
                        dur="0.6s"
                        repeatCount="indefinite"/>
  </path>
  </svg>
                </div></div>
            <button class="btn btn-success" onclick="enviar()">Sim</button>
            <button class="btn btn-danger" onclick="nenviar()">Não</button>
        </div>
        <div class="msg-completo" style="text-align: center;height: 100px;background-color: green;color: white;line-height: 100px;padding-right: 20px;padding-left: 20px;border-radius: 10px">
            E-mail enviado com sucesso!
        </div>
    </div>
    <div class="box" style="margin-top: 10px;display: none" id="caixatexto">
        <div class="box-title">Respondendo - <?php echo $revendedor['email'] ?>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label><span class="obrigatorio">*</span>Assunto</label>
                <input type="text" id="assunto" name="assunto" alt="Assunto" data-ob="1" class="form-control">
            </div>
            <textarea></textarea>
        </div>
    </div>
    <div id='retorno2' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
        <ul class="list-group">
            <li class="list-group-item">
            </li>
        </ul>
    </div>
    <button class="btn btn-default botao" id="btnenvia" onclick="enviarResposta()" style="display: none;margin-bottom: 20px"><div class="loading3">
            <div class="loader loader--style3" title="2">
                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
  <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
      <animateTransform attributeType="xml"
                        attributeName="transform"
                        type="rotate"
                        from="0 25 25"
                        to="360 25 25"
                        dur="0.6s"
                        repeatCount="indefinite"/>
  </path>
  </svg>
            </div></div>Enviar Mensagem</button>
<script>
    function responder() {
        $("#caixatexto").slideToggle();
        $("#btnenvia").slideToggle();
        setTimeout(descer, 600);
    }
    function descer() {
        window.scrollTo(0,document.body.scrollHeight);
    }

    function enviarResposta() {
        $('.loading3').slideDown();
        msg = '<ul class="list-group">';
        var id = $("#btnresponder").attr("data-id");
        var nome = $("#btnresponder").attr("data-nome");
        var email = $("#btnresponder").attr("data-email");
        var assunto = $("#assunto").val();
        var mensagem = tinyMCE.activeEditor.getContent();
        if(validaForm() == -1){
            $('.loading3').hide();
            $("#retorno2").slideDown().html(msg);
        } else if (validaForm() == 0){
            $.post('<?php echo BASE_URL;?>/revendedoresCMS/responder', {id:id, nome: nome, email: email, assunto: assunto, mensagem:mensagem}, function (get_retorno) {
                complete:
                    if(get_retorno == "1"){
                        window.location="<?php echo BASE_URL;?>/revendedoresCMS";
                    } else{
                        $('.loading3').hide();
                        $("#retorno2").show("slow").html("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+get_retorno);
                    }
            });
        }
    }
    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
        ],
        toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
</script>