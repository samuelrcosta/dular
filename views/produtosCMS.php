<div class="container" style="margin-left:180px;padding:30px;transition: all 0.5s;">
    <h1>Produtos</h1>
    <a href="<?php echo BASE_URL;?>/produtosCMS/addProduto" class="btn btn-success" style="margin-top:10px">Novo Produto</a>
    <table class="table table-striped" style="margin-top: 20px">
        <thead>
        <th>Foto</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
        </thead>
        <?php foreach($produtos as $produto):?>
            <tr style="line-height: 55px">
                <?php if(!empty($produto['url'])): ?>
                    <td><img src="<?php echo BASE_URL;?>/assets/imgs/produtos/<?php echo $produto['url'] ?>.jpg" style="height: 60px"></td>
                <?php else: ?>
                    <td><img src="<?php echo BASE_URL;?>/assets/imgs/default.jpg" style="height: 60px"></td>
                <?php endif; ?>
                <td><?php echo $produto['nome'] ?></td>
                <td><p style="white-space: pre;margin: 0;line-height: normal"><?php echo $produto['descricao'] ?></p></td>
                <td>
                    <a class="btn btn-info" href="<?php echo BASE_URL;?>/produtosCMS/editarProduto/<?php echo base64_encode(base64_encode($produto['id'])) ?>">Editar</a>
                    <a class="btn btn-warning" href="<?php echo BASE_URL;?>/produtosCMS/excluirProduto/<?php echo base64_encode(base64_encode($produto['id'])) ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>