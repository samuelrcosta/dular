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
    <?php if(isset($retorno)): ?>
        <div class="alert alert-success alerta" role="alert">
            <strong>Email enviado com Sucesso!</strong>
        </div>
    <?php endif;?>
    <h1 style='margin-bottom: 20px'>Orçamento</h1>
    <a href="javascript:window.history.go(-1)" class="btn btn-primary">Voltar</a>
    <button class="btn btn-secondary" onclick="location.href = '<?php echo BASE_URL;?>/orcamentosCMS/editar/<?php echo base64_encode(base64_encode($dadosOrcamento['id']))?>'">Editar</button>
    <button class="btn btn-success" id="btnresponder" onclick="responder()">Enviar E-mail</button>
    <div class="box" style="margin-top: 10px">
        <div class="box-title">Detalhes do Orçamento</div>
        <div class="box-body">
            <p>Data de criação: <?php echo date_format(date_create($dadosOrcamento['dt_criacao']), 'd/m/Y \à\s H:i:s');?></p>
            <p>Status interno do Orçamento: <?php if($dadosOrcamento['status'] == "1") echo "Em aberto";elseif($dadosOrcamento['status'] == "2") echo "Em Processamento" ; elseif($dadosOrcamento['status'] == "3") echo "Enviado"; else echo "Concluído" ?></p>
            <p>Nome: <?php echo $dadosOrcamento['nome'] ?></p>
            <p>Celular: <?php echo $dadosOrcamento['celular'] ?></p>
            <p>Telefone: <?php echo $dadosOrcamento['telefone'] ?></p>
            <p>E-mail: <?php echo $dadosOrcamento['email'] ?></p>
            <p>Endereço: <?php echo $dadosOrcamento['endereco'] ?></p>
            <p>Bairro: <?php echo $dadosOrcamento['bairro'] ?></p>
            <p>Cidade: <?php echo $dadosOrcamento['cidade'] ?></p>
            <p>CEP: <?php echo $dadosOrcamento['cep'] ?></p>
            <p>Estado: <?php echo $dadosOrcamento['estado'] ?></p>
        </div>
    </div>
    <div class="box" style="margin-top: 10px">
        <div class="box-title">Detalhes do Pagamento</div>
        <div class="box-body">
            <p>Tipo de Pagamento: <?php if($dadosOrcamento['tipo_pagamento'] == "1") echo "Não escolhido ainda";elseif($dadosOrcamento['tipo_pagamento'] == "2") echo "Boleto Bancário"; else echo "Depósito Bancário" ?></p>
            <p>Status Pagamento: <strong><?php if($dadosOrcamento['status_pag'] == "1") echo "Em aberto";elseif($dadosOrcamento['status_pag'] == "2"){ if($dadosOrcamento['tipo_pagamento'] == 3) echo "Comprovante Enviado"; else echo "Processando";} else echo "Confirmado" ?></strong></p>
            <?php if(!empty($dadosOrcamento['dt_processamento']) && $dadosOrcamento['tipo_pagamento'] == 3):?>
                <p>Data de envio do Comprovante: <?php echo date_format(date_create($dadosOrcamento['dt_processamento']), 'd/m/Y \à\s H:i:s');?></p>
            <?php endif;?>
            <?php if(!empty($dadosOrcamento['dt_processamento']) && ($dadosOrcamento['tipo_pagamento'] == 2)):?>
                <p>Data de Processamento do Pagamento: <?php echo date_format(date_create($dadosOrcamento['dt_processamento']), 'd/m/Y \à\s H:i:s');?></p>
            <?php endif;?>
            <?php if(!empty($dadosOrcamento['dt_confirmacao'])):?>
                <p>Data de Confirmação do Pagamento: <?php echo date_format(date_create($dadosOrcamento['dt_confirmacao']), 'd/m/Y \à\s H:i:s');?></p>
            <?php endif;?>
            <?php if($dadosOrcamento['tipo_pagamento'] == 3 && ($dadosOrcamento['status_pag'] == 2 || $dadosOrcamento['status_pag'] == 3)):?>
                <p style="margin-left: 15px"><a href="<?php echo BASE_URL?>/assets/media/comprovantes/<?php echo $dadosOrcamento['url_comprovante']?>" download="Comprovante-N<?php echo $dadosOrcamento['id']?>-<?php echo $dadosOrcamento['nome']?>"><img style="margin-right: 5px" class="icon icons8-Download" width="30" height="25" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAABk0lEQVRoQ+2ZsS5EURCGv1UoVEqlVjQ6jUTPM/AIPAIegUfgGeglmu00olUqVQoF8slKluy699wzp1iZv54zM/8/c2cmuSPi8dHhchQZMtTZJLEkUFKhrMAMtbKFsoVKFMgWqlQrp1C2ULZQpQLZQpUC5hTKFsoWqlRgUVvoEjgI5n4FHJb6HDqFVoAHYL004Bz7J2ATeC31N5SAcbaAMbBcGvSX/RuwDdwP8VNDwHhHwPmQwFNvjoGLoT5qCRj3GtgbmMANsD/w7dezCAKrwCOwVpjIM7ABvBS++2EeQUCHO8AtsNQzmXdgF7jraT/XLIqAAU6Bk54JnU3se5rPN4skoPpWwWr8BVVXfatQjUgCJuN34PfgdzEL9rt9b/+HIJqASTmRnEyz4MRx8oShBQGTcze4I6bhrHfmh6IVAbezW9ptLdyyblu3bihaETBJ7yTvJeGd470TjpYETPb7YvXSbILWBJokPe00CTSXuCNAViArUKlAtlClgNXP/0UFuv7rVqvU0oEVSAItFe7yvfAV+AQ+oDwtEhtsNwAAAABJRU5ErkJggg=="> Baixar comprovante Enviado</a></p>
            <?php endif;?>
        </div>
    </div>
    <button class="btn btn-primary" onclick="location.href = '<?php echo BASE_URL;?>/orcamentosCMS/definirPrecos/<?php echo base64_encode(base64_encode($dadosOrcamento['id']))?>'">Definir Preços</button>
    <button class="btn btn-primary" onclick="location.href = '<?php echo BASE_URL;?>/orcamentosCMS/enviarPagamento/<?php echo base64_encode(base64_encode($dadosOrcamento['id']))?>'">Enviar Orçamento</button>
    <div class="box" style="margin-top: 10px">
        <div class="box-title">Produtos do Orçamento</div>
        <div class="box-body">
            <?php if($dadosOrcamento['dt_vencimento'] != ""):?>
                <p><strong>Data de Vencimento: <?php echo date_format(date_create($dadosOrcamento['dt_vencimento']), 'd/m/Y') ?></strong></p>
            <?php endif; ?>
            <?php if($dadosOrcamento['dt_envioPrecos'] != ""):?>
                <p><strong>Data Envio dos Preços: <?php echo date_format(date_create($dadosOrcamento['dt_envioPrecos']), 'd/m/Y H:i:s') ?></strong></p>
            <?php endif; ?>
            <?php if($dadosOrcamento['prazo_frete'] != ""):?>
                <p>Prazo de Entrega: <?php echo $dadosOrcamento['prazo_frete'] ?></p>
            <?php endif; ?>
            <?php if($dadosOrcamento['codigo_frete'] != ""):?>
                <p>Código de rastreio do frete: <?php echo $dadosOrcamento['codigo_frete'] ?></p>
            <?php endif; ?>
            <?php if($dadosOrcamento['prazo_frete'] != ""):?>
                <p>Tipo do Frete: <?php echo $dadosOrcamento['tipo_frete'] ?></p>
            <?php endif; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome do Produto</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Obs Comprador</th>
                        <th>Obs Venda</th>
                        <th>Preço Unitário</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtosOrcamento as $produto): ?>
                        <tr>
                            <td><img width="50px" src="<?php echo BASE_URL ?>/assets/imgs/produtos/<?php echo $produto['url'] ?>.jpg"></td>
                            <td><?php echo $produto['nome'] ?></td>
                            <td><?php echo $produto['NomeCategoria'] ?></td>
                            <td><?php echo $produto['quantidade'] ?></td>
                            <td><?php echo $produto['obs'] ?></td>
                            <td><?php echo $produto['obs_adm'] ?></td>
                            <td><?php echo str_replace(".", ",", number_format($produto['preco'],2)) ?></td>
                        </tr>
                    <?php endforeach;?>
                    <?php if($dadosOrcamento['preco_frete'] != ""):?>
                        <tr>
                            <td colspan="6" style="text-align: right"><strong>FRETE</strong></td>
                            <td><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_frete'],2)) ?></strong></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($dadosOrcamento['preco_total'] != ""):?>
                        <tr>
                            <td colspan="6" style="text-align: right"><strong>TOTAL</strong></td>
                            <td><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_total'],2)) ?></strong></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($dadosOrcamento['desconto'] != ""):?>
                        <tr>
                            <td colspan="6" style="text-align: right;color: red"><strong>DESCONTO</strong></td>
                            <td style="color: red"><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['desconto'],2)) ?></strong></td>
                        </tr>
                    <?php endif; ?>
                    <?php if($dadosOrcamento['preco_final'] != ""):?>
                        <tr>
                            <td colspan="6" style="text-align: right"><strong>TOTAL FINAL</strong></td>
                            <td><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_final'],2)) ?></strong></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if($dadosOrcamento['observacao'] != ""):?>
                <p><strong>Observações:</strong> <pre><?php echo $dadosOrcamento['observacao'] ?></pre></p>
            <?php endif; ?>
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
        <div class="box-title">Respondendo - <?php echo $dadosOrcamento['email'] ?>
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
            var id = '<?php echo $dadosOrcamento['id'];?>';
            var nome = '<?php echo $dadosOrcamento['nome'];?>';
            var email = '<?php echo $dadosOrcamento['email'];?>';
            var assunto = $("#assunto").val();
            var mensagem = tinyMCE.activeEditor.getContent();
            if(validaForm() == -1){
                $('.loading3').hide();
                $("#retorno2").slideDown().html(msg);
            } else if (validaForm() == 0){
                $.post('<?php echo BASE_URL;?>/orcamentosCMS/responder', {id:id, nome: nome, email: email, assunto: assunto, mensagem:mensagem}, function (get_retorno) {
                    complete:
                        if(get_retorno == "1"){
                            window.location="<?php echo BASE_URL;?>/orcamentosCMS";
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