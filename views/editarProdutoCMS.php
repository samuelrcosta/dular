<div class="container" style="margin-left:180px;padding:30px;transition: all 0.5s;">
    <h1>Editar Produto</h1>
    <a href="javascript:window.history.go(-1)" class="btn btn-primary" style="margin-top:10px"><img style="margin-right: 5px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACGSURBVEhLYxiZ4P////z//v0LgXKpD6AWnAJiEEiCClMPwCwA0iDwAcg2gUpRBwANpZ8FQPr9qAUYYHhZAAJA9k4g1UEBboAajQBAQ6cBJagJPkCNRgCgIO19AgJACdrGCQyMWkQ2GBCLgID6pTAMAA2nr0VADALUrxlhAGoR7er4QQ4YGAD5xQxMLz1UIwAAAABJRU5ErkJggg=="> Voltar</a>
    <form method="POST" enctype="multipart/form-data" style="margin-bottom: 20px;margin-top: 20px" role="form">
        <div class="form-group">
            <label form="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php
                foreach ($cats as $cat):?>
                    <option value="<?php echo $cat['id'] ?>" <?php echo ($info['categoria'] == $cat['id'])?'selected="selected"':"";?>><?php echo $cat['nome'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label form="prioridade">Prioridade</label>
            <select name="prioridade" id="prioridade" class="form-control">
                <option value="1" <?php echo ($info['prioridade'] == 1)?'selected="selected"':"";?>>Baixa</option>
                <option value="2" <?php echo ($info['prioridade'] == 2)?'selected="selected"':"";?>>Média</option>
                <option value="3" <?php echo ($info['prioridade'] == 3)?'selected="selected"':"";?>>Alta</option>
            </select>
        </div>
        <div class="form-group tags tags1">
            <label form="tags1">Tamanho</label>
            <select name="tags1" id="tags1" class="form-control">
                <option value="null"></option>
                <?php
                foreach ($tags1 as $tag1):?>
                    <option value="<?php echo $tag1['id'] ?>" <?php if(gettype(strpos($info['tag_id'], $tag1['id'])) == "integer") echo 'selected="selected"'?>><?php echo $tag1['nome'] ?></option>
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
                    <option value="<?php echo $tag2['id'] ?>" <?php if(gettype(strpos($info['tag_id'], $tag2['id'])) == "integer") echo 'selected="selected"'?>><?php echo $tag2['nome'] ?></option>
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
                    <option value="<?php echo $tag3['id'] ?>" <?php if(gettype(strpos($info['tag_id'], $tag3['id'])) == "integer") echo 'selected="selected"'?>><?php echo $tag3['nome'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label form="titulo">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $info['nome']; ?>">
        </div>
        <div class="form-group">
            <label form="titulo">Descrição</label>
            <textarea class="form-control" name="descricao" rows="5" id="descricao"><?php echo $info['descricao']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="add_foto">Foto do produto</label>
            <div class="progress">
                <div id="progresso" data-id="<?php echo $id; ?>" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0"
                     aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
            <input style="margin-top: 10px" name="imagem" id="imagem" type="file" accept="image/*" class="form-control" multiple />
            <div class="card card-default" style="margin-top: 20px">
                <div class="card-header">Fotos do Anúncio</div>
                <div class="card-block">
                    <?php if($info['url'] != 'default'):?>
                        <div class="foto-itens">
                            <div class="foto-itens-imagem" style="width: fit-content;text-align: center;">
                                <img style="max-width: 200px" src="<?php echo BASE_URL;?>/assets/imgs/produtos/<?php echo $info['url']; ?>.jpg" class="img-thumbnail"><br>
                                <a style="margin-top: 5px" href="<?php echo BASE_URL;?>/produtosCMS/excluirFoto/<?php echo base64_encode(base64_encode($info['id'])); ?>" class="btn btn-warning"><img style="margin-right: 5px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHVSURBVEhL7ZS7SgNhFITjpfEWQcFYiJeIoGKhRC1EFCwUtRbLPEEqn8BOfAGx8I538BETvznMFlkTdqMWFg4M55z5Z/5d/z9r4c+hXq+PNhqNsqql3wUbb8BnHnJGfdHspe+DTQ7Z8JZ6aT7CO/eqmpO1G3joaDYwr8Nj+ADnkuMR3bfUoPzKrXmr1sCwIDPBI+oUVHgGasMR9+20KeeUn/eWX8HiMKYn+AGTo+iEyilf9JbtwcNu3XaEjnK8yZ3rFsH+EA20pgtm7oPb7iOXC5ivXVfhSIgG877bALPuJi6bGrlcwHzvOgaHQjSYZ90GmIvyuY9cLmC+gDqGEmy6ROYFtwGtc6Tj9l9YzgbmU6ifpL6B9KYHbgN45tFm5YenlrOBuQZX9YawYjmAnn5IBU1/se6vZjkbBPVR7VMHqSuWA2ibbgPMy3gG7D+ynA0CO7BKqIs6YTmANuk2wLqOVb6qcpazgXkJnhDuhU3HxZz+Syryya+c5Wxg1hmfu98L0WBuuhPm+G7kh6UQ84A36yFwpZ6a/sLbPeRKuRDzglDy1S+GYDCnf9Kxnvg7AqF33kwXOmMpgFZ2G2Ceht3wzVJ+sPkefIWt/qWnKd+uo//4CQqFT0nmeWbSQNtVAAAAAElFTkSuQmCC"> Excluir Imagem</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-lg btn-success" style="cursor: pointer;margin-top: 20px" value="Salvar">
    </form>
</div>
<script>
    var categoria = $('#categoria');
    $(function () {
        if(categoria.val() != "1"){
            $(".tags1").slideUp();
            $(".tags2").slideUp();
            $(".tags3").slideUp();
        }
    });

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