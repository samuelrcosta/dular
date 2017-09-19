<div class="container" style="margin-left:180px;padding:30px;transition: all 0.5s;">
    <h1>Cadastrar Produto</h1>
    <form method="POST" enctype="multipart/form-data" style="margin-bottom: 20px;margin-top: 20px">
        <div class="form-group">
            <label form="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php
                foreach ($cats as $cat):?>
                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['nome'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label form="titulo">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label form="titulo">Descrição</label>
            <textarea class="form-control" name="descricao" rows="5" id="descricao"></textarea>
        </div>
            <input type="submit" class="btn btn-success" style="cursor: pointer;margin-top: 20px" value="Adicionar">
            <a class="btn btn-default" style="cursor: pointer;margin-top: 20px;background-color: #cccccc" href="<?php echo BASE_URL;?>/produtosCMS">Voltar</a>
    </form>
</div>