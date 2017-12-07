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
    <h1>Usuários (<?php echo count($usuarios);?> de <?php echo $totalUsuarios;?>)</h1>
    <div class="discussionarea">
        <div class="row">
            <div class="col-sm-9">
                <a href="<?php echo BASE_URL;?>/configuracoesCMS/cadastrarUsuario" class="btn btn-success" style="margin-top:10px"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACsSURBVEhL7ZVRCoMwEESDN+i/eJr+9R6FnsBCD+btks7DERSL0qglBR8s0ZnsDipqOMkmpVSpLjtU5ZFzZDaqPWg8cg4mO2KMnarNqI5+sR4inpa+gr6+vfQQ6fh3VksT6FNBfoju+Q2T1dIE+vBFgSEaWOv8Sun4hel10Gpv3RTysPYRfG8t/ErGaOAfP/gx0vGPfU/WoK9vLyVE9/wnX+GtLIYc/2c8WSaEN4s3OtweHF5rAAAAAElFTkSuQmCC"> Novo Usuário</a>
                <div id='div-find' style="margin-top: 15px">
                    <input class='form-control' onKeyPress="pesquisarTeclado();" style="margin-bottom: 10px" type='text' <?php if(isset($termoPesquisa)) echo "Value='".$termoPesquisa."'"; ?> name='find' id='find' placeholder='Busque por Nome ou Email'/>
                </div>
                <table class="table table-striped table-bordered" style="margin-top: 20px;margin-bottom: 10px">
                    <thead>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Função</th>
                    <th>Ações</th>
                    </thead>
                    <tbody>
                    <?php foreach($usuarios as $usuario):?>
                        <tr style="line-height: 55px">
                            <td><?php echo $usuario['nome'] ?></td>
                            <td><?php echo $usuario['email'] ?></td>
                            <td><?php echo $usuario['funcao'] ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo BASE_URL;?>/configuracoesCMS/editarUsuario/<?php echo base64_encode(base64_encode($usuario['id'])) ?>"><img style="margin-right: 5px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGiSURBVDhPpZM5SwNRFEZjYRTcavc12on4A8SIlXZxKSRgLyoqcesEGwuxkVhY2djZuVb6HwTBJYq4VIKgYBGFGc993gmDPJNJ/OBw30y+e5zRGCokjuNUwDacua7bq7cLD6JVRCac0zCgH+UXFhshiaecefSjzEgHtRY87K6oYB/ktY/lWqLSTq1mD8VqdnaYlbClApt0Tlf+DqUauIRndlqgiLNfKj/kBD6gQ9fsoVALV/AE7ThGmKdQBhkpo4rZrWv2UKiDazAyGIYvlcQZ/icd1TV7KNRDCh4hAn7ZMqMU1jjL60Z1zR6KDZRuwS/7FBlZ4lwC5g/BjOuaPXSaKN2ByNpgCIyMuQh+2YKu2UOhGe5BZK0gsrS3DCIzX2ZmQtfsoSC/C3myBxBZDDIyRpjpyQJ918akTLo4+2XzDJEdgmRGV7KH4i6k9DwOL5D4JZs25VxhqZjyK2zqLZH2qOwAJJP6Ue5QjrIsrxeTaxX1gfw7SSZMMWhYWFfhBezBm16/Q/An88LSuQgknG9gg2M/hLWSXxBMwSxE9NY/Egp9A3flly2oRu2RAAAAAElFTkSuQmCC"> Editar</a>
                                <button class="btn btn-danger" onclick="exProduto('<?php echo base64_encode(base64_encode($usuario['id'])) ?>')"><img style="margin-right: 5px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADVSURBVDhP7Y5NDsFQFEZLiLFI7KJCrUJqIzaCLZhYAUaGEhJrMDIQIRJjZpLWafM1oU/avplBT3Jye3/7nCyCIGhgLwzDfiTfHWJFbXs4sMI5zuQSx2pnw59rDHvJa/SiYyr3cZ+quTrxDY0Wbhmygp2FTpjQHGmuMOz4WjdJHyTfKB7whi/SXVRLoGZ10FWc4BrP6MdNEeVaN6FZHiwP/t1B6CpOdfCCQ9VirA6SnxTv+PysJZBbvTAXdgZaN6Hp4UOzuTB7xbbWf8NcHZsFrWpNOM4boILOrcn+MiEAAAAASUVORK5CYII="> Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div id='div-pagina' style="margin-bottom: 10px;text-align: right">
                    Página <input style="width: 30px;text-align: center" type='text' maxlength='3' id='pagina' onkeyup='somenteNumeros(this)' value='<?php echo $paginaAtual ?>'> de <span id='total-paginas'><?php echo $totalPaginas ?></span> <button class='btn btn-secondary btn-sm botao-pag' id='mudarPag' onclick='mudarPagina()'> Ir </button> <button class='btn btn-secondary btn-sm botao-pag' id='btn-anterior' onclick='anteriorPagina()'>< Anterior</button> <button class='btn btn-secondary btn-sm botao-pag' id='btn-proximo' onclick='proximaPagina()'>Próxima ></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fundo-escuro" style="display: none"></div>
<div id="confirmacao-exclusao" style="display: none">
    <p>Tem certeza que deseja excluir o usuário?</p>
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
        window.location.href = '<?php echo BASE_URL ?>/configuracoesCMS/excluirUsuario/' + idUsu;
    }
</script>