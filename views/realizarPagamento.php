</div>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/<?php echo $css;?>.css">
<style>
    #div-botao-boleto{
        display: none;
    }

    #div-botao-deposito{
        display: none;
    }
    .home-back-img {
        height: 115px;
    }
</style>
<div class="container">
    <h1 style="text-align: center;margin-top: 45px;font-size: 32px;margin-bottom: 40px">Realizar pagamento agora</h1>
    <p>Olá <?php echo $dadosOrcamento['nome'];?> segue abaixo os detalhes do orçamento solicitado:</p>
    <h5 style="margin-bottom: 15px;margin-top: 25px;">Produtos e Valores</h5>
    <table style="border-radius: 0" class="table table-bordered table-stripped table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th style="font-weight: 500;">Foto</th>
                <th style="font-weight: 500;">Nome do Produto</th>
                <th style="font-weight: 500;">Categoria</th>
                <th style="font-weight: 500;">Quantidade</th>
                <th style="font-weight: 500;">Observações</th>
                <th style="font-weight: 500;">Preço Unitário</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($produtosOrcamento as $produto):?>
        <tr>
            <td><img width='50px' src='<?php echo BASE_URL?>/assets/imgs/produtos/<?php echo $produto['url']?>.jpg'></td>
            <td><?php echo $produto['nome']?></td>
            <td><?php echo $produto['NomeCategoria']?></td>
            <td><?php echo $produto['quantidade']?></td>
            <td><?php echo $produto['obs_adm']?></td>
            <td>R$ <?php echo str_replace(".", ",", number_format($produto['preco'],2))?></td>
        </tr>
    <?php endforeach;?>
    <?php if($dadosOrcamento['preco_frete'] != ""):?>
        <tr>
            <td colspan='5' style='text-align: right'>FRETE</td>
            <td height='25'>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_frete'],2))?></td>
        </tr>
    <?php endif;?>
    <?php if($dadosOrcamento['desconto'] != ""):?>
        <tr>
            <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL</strong></td>
            <td height='25'><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_total'],2))?></strong></td>
        </tr>
        <tr>
            <td colspan='5' style='text-align: right;color: red'><strong style='margin-right: 5px'>DESCONTO</strong></td>
            <td height='25' style='color: red'><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['desconto'],2))?></strong></td>
        </tr>
        <tr>
            <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL FINAL</strong></td>
            <td height='25'><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_final'],2))?></strong></td>
        </tr>
    <?php else:?>
        <tr>
            <td colspan='5' style='text-align: right'><strong style='margin-right: 5px'>TOTAL</strong></td>
            <td height='25'><strong>R$ <?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_total'],2))?></strong></td>
        </tr>
    <?php endif;?>
    </tbody>
    </table>
    <?php if($dadosOrcamento['observacao'] != ""): ?>
        <h6>Observações</h6>
        <p><?php echo $dadosOrcamento['observacao']?></p>
    <?php endif;?>
    <?php if($dadosOrcamento['tipo_frete'] != ''):?>
        <h6>Tipo do Frete</h6>
        <p><?php echo $dadosOrcamento['tipo_frete']?></p>
    <?php endif;?>
    <?php if($dadosOrcamento['prazo_frete'] != ''):?>
        <h6>Prazo de Entrega</h6>
        <p><?php echo $dadosOrcamento['prazo_frete']?></p>
    <?php endif;?>
    <hr>
    <h5 style="margin-top: 25px;margin-bottom: 18px"><img style="width: 45px;" alt="Icon Hand-down" src="<?php echo BASE_URL?>/assets/imgs/hand-down.png"> Escolha uma das opções de pagamento abaixo</h5>
    <div style="margin-left: 15px;margin-bottom: 30px">
        <div class="form-check" style="padding: 20px;background-color: #ccc;width: 200px;">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="opcaoPag" id="boleto" value="boleto">
                Boleto Bancário
            </label>
        </div>
        <div class="form-check" style="margin-top: 5px;padding: 20px;background-color: #FEE;width: 200px;">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="opcaoPag" id="deposito" value="deposito">
                Depósito Bancário
            </label>
        </div>
    </div>
    <div id="div-botao-boleto" style="margin-bottom: 40px">
        <h5>Pagamento via boleto</h5>
        <p style="margin-left: 10px">Para gerar o boleto bancário basta apertar no botão abaixo:<br><br>
        <a href="<?php echo BASE_URL ?>/pagamento/gerarBoleto/<?php echo $id ?>" class="btn btn-lg btn-success" style="cursor:pointer;margin-left: 20px">Gerar Boleto</a>
    </div>
    <div id="div-botao-deposito" style="margin-top: 30px;margin-bottom: 40px">
        <h5>Pagamento via depósito</h5>
        <p style="margin-left: 10px">Os dados para depósito estão abaixo:<br><br>
            <strong>Banco: Itaú (Cód: 341) </strong><br>
            <strong>Conta: 36313-2</strong><br>
            <strong>Agência: 4286</strong><br>
            <strong>Nome: Enxovais Dular Eireli-ME</strong><br>
        </p>
        <p>Após o depósito, envie o comprovante abaixo que iremos analisar e entrar em contato para envio das mercadorias</p>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>São aceitos arquivo em PDF, JPG, PNG e DOC<br>
                    O arquivo não pode ultrapassar 4Mb
                </label>
                <input type="file" class="form-control" name="arquivo" />
            </div>
            <input style="margin-top: 15px;cursor: pointer" type="submit" class="btn btn-lg btn-success" value="Enviar Comprovante">
        </form>
    </div>
    <p style="margin-bottom: 30px">Qualquer dúvida <strong><a style="margin: 0;color: black" href="<?php echo BASE_URL ?>/contato">clique aqui</a></strong> para enviar uma mensagem de contato.
    </p>
</div>
<script>
    $(function () {
        $("#boleto").on("click", function () {
            $("#div-botao-deposito").slideUp();
            $("#div-botao-boleto").slideDown();
        });

        $("#deposito").on("click", function () {
            $("#div-botao-boleto").slideUp();
            $("#div-botao-deposito").slideDown();
        });
    })
</script>