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
                <a href="<?php echo BASE_URL;?>/configuracoesCMS/cadastrarUsuario" class="btn btn-success" style="margin-top:10px">Novo Usuário</a>
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
                                <a class="btn btn-info" href="<?php echo BASE_URL;?>/configuracoesCMS/editarUsuario/<?php echo base64_encode(base64_encode($usuario['id'])) ?>">Editar</a>
                                <button class="btn btn-danger" onclick="exProduto('<?php echo base64_encode(base64_encode($usuario['id'])) ?>')">Excluir</button>
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