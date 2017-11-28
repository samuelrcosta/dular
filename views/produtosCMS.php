<style>
    p{
        line-height: normal;
    }
    button{
        cursor: pointer;
    }
    #fundo-escuro{
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        z-index: 10;
    }

    #confirmacao-exclusao{
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
<div class="container main">
    <h1>Produtos (<?php echo count($produtos);?> de <?php echo $totalProdutos;?>)</h1>
    <div class="discussionarea">
        <div class="row">
            <div class="col-sm-9">
                <a href="<?php echo BASE_URL;?>/produtosCMS/addProduto" class="btn btn-success" style="margin-top:10px">Novo Produto</a>
                <div id='div-find'>
                    <input class='form-control' onKeyPress="pesquisarTeclado();" <?php if(isset($termoPesquisa)) echo "Value='".$termoPesquisa."'"; ?> style="margin-bottom: 10px;margin-top: 10px" type='text' name='find' id='find' placeholder='Busque um produto'/>
                </div>
                <table class="table table-striped table-bordered" style="margin-top: 20px;margin-bottom: 10px">
                    <thead>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Categorias</th>
                    <th>Ações</th>
                    </thead>
                    <tbody>
                    <?php foreach($produtos as $produto):?>
                        <tr>
                            <?php if(!empty($produto['url'])): ?>
                                <td><img src="<?php echo BASE_URL;?>/assets/imgs/produtos/<?php echo $produto['url'] ?>.jpg" style="height: 60px"></td>
                            <?php else: ?>
                                <td><img src="<?php echo BASE_URL;?>/assets/imgs/default.jpg" style="height: 60px"></td>
                            <?php endif; ?>
                            <td><?php echo $produto['nome'] ?></td>
                            <td><p style="white-space: pre;margin: 0;line-height: normal"><?php echo $produto['descricao'] ?></p></td>
                            <td>
                                <p style="margin-bottom: 5px"><strong>Categoria:</strong><br><?php echo $produto['NomeCategoria'] ?></p>
                                <p><strong>Sub-Categorias:</strong> <br><?php echo str_replace(",", "<br>", $produto['tag_name']) ?></p>
                            </td>
                            <td>
                                <a class="btn btn-info" style="margin-top: 5px" href="<?php echo BASE_URL;?>/produtosCMS/editarProduto/<?php echo base64_encode(base64_encode($produto['id'])) ?>">Editar</a>
                                <button class="btn btn-danger" style="margin-top: 5px" onclick="exProduto('<?php echo base64_encode(base64_encode($produto['id'])) ?>')">Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div id='div-pagina' style="margin-bottom: 10px;text-align: right">
                    Página <input style="width: 30px;text-align: center" type='text' maxlength='3' id='pagina' onkeyup='somenteNumeros(this)' value='<?php echo $paginaAtual ?>'> de <span id='total-paginas'><?php echo $totalPaginas ?></span> <button class='btn btn-secondary btn-sm botao-pag' id='mudarPag' onclick='mudarPagina()'> Ir </button> <button class='btn btn-secondary btn-sm botao-pag' id='btn-anterior' onclick='anteriorPagina()'>< Anterior</button> <button class='btn btn-secondary btn-sm botao-pag' id='btn-proximo' onclick='proximaPagina()'>Próxima ></button>
                </div>
            </div>
            <div class="col-sm-3">
                <h4>Filtrar por</h4>
                <br>
                <div id='0' class="dis_filtro_item"><a href="<?php echo BASE_URL;?>/produtosCMS">Todos</a></div>
                <h5 class="tipo-filtro">Categoria: </h5>
                <div id='1' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/produtosCMS?filtro=1">Cama</a></div>
                <div id='2' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/produtosCMS?filtro=2">Mesa</a></div>
                <div id='3' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/produtosCMS?filtro=3">Banho</a></div>
                <div id='4' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/produtosCMS?filtro=4">Decoração</a></div>
                <h5 class="tipo-filtro">Sub-Categoria:</h5>
                <?php
                $count = 5;
                foreach ($tags1 as $tag1):?>
                    <div id='<?php echo $count;?>' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/produtosCMS?tag=<?php echo $tag1['id'];?>"><?php echo $tag1['nome'];?></a></div>
                    <?php $count++ ?>
                <?php endforeach; ?>
                <?php foreach ($tags2 as $tag2):?>
                    <div id='<?php echo $count;?>' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/produtosCMS?tag=<?php echo $tag2['id'];?>"><?php echo $tag2['nome'];?></a></div>
                    <?php $count++ ?>
                <?php endforeach; ?>
                <?php foreach ($tags3 as $tag3):?>
                    <div id='<?php echo $count;?>' class="dis_filtro_item "><a href="<?php echo BASE_URL;?>/produtosCMS?tag=<?php echo $tag3['id'];?>"><?php echo $tag3['nome'];?></a></div>
                    <?php $count++ ?>
                <?php endforeach; ?>
            </div>
</div>
<div id="fundo-escuro" style="display: none"></div>
<div id="confirmacao-exclusao" style="display: none">
    <p>Tem certeza que deseja excluir o produto?</p>
    <button class="btn btn-danger" onclick="sexcluir()">Sim</button>
    <button class="btn btn-success" onclick="nexcluir()">Não</button>
</div>
<script>
    var idUsu;
    function exProduto(id){
        $("#fundo-escuro").show();
        $("#confirmacao-exclusao").show('fast');
        idUsu = id;
    }
    function nexcluir() {
        $("#confirmacao-exclusao").hide('fast');
        $("#fundo-escuro").hide();
    }

    function sexcluir(){
        window.location.href = '<?php echo BASE_URL ?>/produtosCMS/excluirProduto/' + idUsu;
    }
</script>