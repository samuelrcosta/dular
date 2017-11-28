<style>
    button{
        cursor: pointer;
    }
    .btn{
        cursor: pointer;
    }
</style>
<div class="container main">
    <h1 style='margin-bottom: 20px'>Definir Preço</h1>
    <button class="btn btn-primary" onclick="location.href = '<?php echo BASE_URL;?>/orcamentosCMS/abrir/<?php echo base64_encode(base64_encode($dadosOrcamento['id']));?>'">Voltar</button>
    <div class="box" style="margin-top: 10px">
        <div class="box-title">Detalhes do Orçamento</div>
        <div class="box-body">
            <form method="POST">
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
                            <td><input class="form-control" name="qt-<?php echo base64_encode(base64_encode($produto['produto_id'])) ?>" id="qt-<?php echo base64_encode(base64_encode($produto['produto_id'])) ?>" value="<?php echo $produto['quantidade'] ?>"></td>
                            <td><?php echo $produto['obs'] ?></td>
                            <td><input class="form-control" name="obs-<?php echo base64_encode(base64_encode($produto['produto_id'])) ?>" id="obs-<?php echo base64_encode(base64_encode($produto['produto_id'])) ?>" value="<?php echo $produto['obs_adm'] ?>"></td>
                            <td><input class="form-control preco-produtos" name="pr-<?php echo base64_encode(base64_encode($produto['produto_id'])) ?>" id="pr-<?php echo base64_encode(base64_encode($produto['produto_id'])) ?>" value="<?php echo str_replace(".", ",",number_format($produto['preco'], 2)) ?>"></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <div class="form-group">
                    <label style="font-weight: bold"><span class="obrigatorio">*</span>Data de vencimento do Orçamento</label>
                    <input class="form-control" style="width: 200px" name="dt_vencimento" id="dt_vencimento" value="<?php if($dadosOrcamento['dt_vencimento'] != '') echo date_format(date_create($dadosOrcamento['dt_vencimento']), 'd/m/Y')?>">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Preço do Frete</label>
                    <input class="form-control" style="width: 200px" name="preco_frete" id="preco_frete" value="<?php echo str_replace(".", ",", number_format($dadosOrcamento['preco_frete'], 2))?>">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Tipo do Frete</label>
                    <input class="form-control" style="width: 200px" name="tipo_frete" id="tipo_frete" value="<?php echo $dadosOrcamento['tipo_frete']?>">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Prazo de Entrega</label>
                    <input class="form-control" style="width: 200px" name="prazo_frete" id="prazo_frete" value="<?php echo $dadosOrcamento['prazo_frete']?>">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Código de Rastreio do frete</label>
                    <input class="form-control" style="width: 300px" name="codigo_frete" id="codigo_frete" value="<?php echo $dadosOrcamento['codigo_frete']?>">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Desconto R$</label>
                    <input class="form-control" style="width: 200px" name="desconto" id="desconto" value="<?php echo str_replace(".", ",", number_format($dadosOrcamento['desconto'], 2))?>">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Observações para o Orçamento</label>
                    <textarea rows="5" class="form-control" id="observacao" name="observacao"><?php echo $dadosOrcamento['observacao']?></textarea>
                </div>
                <input type="submit" value="Salvar" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery.mask.js"></script>
<script>
    $("#dt_vencimento").mask("00/00/0000");
    $("#preco_frete").mask("#0,00", {reverse: true});
    $("#desconto").mask("#0,00", {reverse: true});
    $(".preco-produtos").mask("#0,00", {reverse: true});
</script>