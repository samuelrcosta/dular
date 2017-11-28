<style>
    .tags{
        display: none;
    }
</style>
<div class="container" style="margin-left:180px;padding:30px;transition: all 0.5s;">
    <h1>Cadastrar Produto</h1>
    <a href="javascript:window.history.go(-1)" class="btn btn-primary" style="margin-top:10px">Voltar</a>
    <form method="POST" enctype="multipart/form-data" style="margin-bottom: 20px;margin-top: 20px">
        <div class="form-group">
            <label form="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="form-control">
                <option value="0"></option>
                <?php
                foreach ($cats as $cat):?>
                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['nome'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label form="prioridade">Proridade na Lista</label>
            <select name="prioridade" id="prioridade" class="form-control">
                <option value="1">Baixa</option>
                <option value="2">Média</option>
                <option value="3">Alta</option>
            </select>
        </div>
        <div class="form-group tags tags1">
            <label form="tags1">Tamanho</label>
            <select name="tags1" id="tags1" class="form-control">
                <option value="null"></option>
                <?php
                foreach ($tags1 as $tag1):?>
                    <option value="<?php echo $tag1['id'] ?>"><?php echo $tag1['nome'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group tags tags2">
            <label form="tags2">Tipo</label>
            <select name="tags2" id="tags2" class="form-control">
                <option value="null"></option>
                <?php
                foreach ($tags2 as $tag2):?>
                    <option value="<?php echo $tag2['id'] ?>"><?php echo $tag2['nome'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group tags tags3">
            <label form="tags3">Estampa</label>
            <select name="tags3" id="tags3" class="form-control">
                <option value="null"></option>
                <?php
                foreach ($tags3 as $tag3):?>
                    <option value="<?php echo $tag3['id'] ?>"><?php echo $tag3['nome'] ?></option>
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
    </form>
</div>
<script>
    var categoria = $('#categoria');

    categoria.change(function () {
        if(categoria.val() == "1"){
            $(".tags1").slideDown();
            $(".tags2").slideDown();
            $(".tags3").slideDown();
        }else{
            $("#tags1").val("");
            $("#tags2").val("");
            $("#tags3").val("");
            $(".tags1").slideUp();
            $(".tags2").slideUp();
            $(".tags3").slideUp();
        }
    });
</script>