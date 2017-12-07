<style>
    .box{
        margin-top: 15px;
    }
    .row1{
        margin-right: 0;
        margin-left: 0;
    }
    .informacao{
        padding-left: 15px;
        margin-top: 15px;
        width: 100%;
    }
    .box-title h3{
        margin-top: 17px;
    }
    hr{
        margin-top: 7px;
    }
    .obrigatorio{
        color:red;
    }
</style>
<div class="main">
    <a href="javascript:window.history.go(-1)" class="btn btn-primary" style="margin-top:10px"><img style="margin-right: 5px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACGSURBVEhLYxiZ4P////z//v0LgXKpD6AWnAJiEEiCClMPwCwA0iDwAcg2gUpRBwANpZ8FQPr9qAUYYHhZAAJA9k4g1UEBboAajQBAQ6cBJagJPkCNRgCgIO19AgJACdrGCQyMWkQ2GBCLgID6pTAMAA2nr0VADALUrxlhAGoR7er4QQ4YGAD5xQxMLz1UIwAAAABJRU5ErkJggg=="> Voltar</a>
    <div class="box">
        <div class="box-title" data-n="<?php echo $user['id'] ?>"><h3>Alterando Usuário</h3></div>
        <div class="box-body">
            <form id="form-usuario" method="POST" onsubmit="return validar(this)">
                <div class="conteudo">
                    <div class="informacao">
                        <h4>Dados Cadastrados</h4>
                        <hr>
                    </div>
                    <div class="row row1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><span class="obrigatorio">*</span>Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" data-alt="Nome" data-ob="1" value="<?php echo $user['nome'];?>">
                            </div>
                            <div class="form-group">
                                <label form="titulo"><span class="obrigatorio">*</span>E-mail</label>
                                <input type="text" name="email" id="email" class="form-control" data-ob="1" data-alt="E-mail" value="<?php echo $user['email'];?>">
                            </div>
                            <div class="form-group">
                                <label form="titulo"><span class="obrigatorio">*</span>Senha</label>
                                <input type="text" name="senha" id="senha" class="form-control" data-ob="1" data-alt="Senha" value="<?php echo $user['senha'];?>">
                            </div>
                            <div class="form-group">
                                <label form="titulo"><span class="obrigatorio">*</span>Função</label>
                                <input type="text" name="funcao" id="funcao" class="form-control" data-ob="1" data-alt="Função" value="<?php echo $user['funcao'];?>">
                            </div>
                            <h4 style="margin-bottom: 15px;margin-top: 30px">Menus de acesso</h4>
                            <div class="checkbox">
                                <label><input type="checkbox" name="menuOrcamentos" id="menuOrcamentos" <?php if(gettype(strpos($user['permissao'], '1')) == 'integer') echo 'checked' ?> value="True">Orçamentos</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="menuProdutos" id="menuProdutos" <?php if(gettype(strpos($user['permissao'], '2')) == 'integer') echo 'checked' ?> value="True">Produtos</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="menuRevendedores" id="menuRevendedores" <?php if(gettype(strpos($user['permissao'], '3')) == 'integer') echo 'checked' ?> value="True">Revendedores</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="menuContatos" id="menuContatos" <?php if(gettype(strpos($user['permissao'], '4')) == 'integer') echo 'checked' ?> value="True">Contatos</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="menuPerfil" id="menuPerfil" <?php if(gettype(strpos($user['permissao'], '5')) == 'integer') echo 'checked' ?> value="True">Meu Perfil</label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="menuConfiguracoes" id="menuConfiguracoes" <?php if(gettype(strpos($user['permissao'], '6')) == 'integer') echo 'checked' ?> value="True">Configurações</label>
                            </div>
                    </div>
                    <div id='retorno' style='margin-bottom: 15px;margin-top: 5px;display: none' class='alert alert-danger'>
                        <ul class="list-group">
                            <li class="list-group-item">
                            </li>
                        </ul>
                    </div>
                </div>
                <input type="submit" value="Salvar" style="margin-left: 20px;cursor: pointer;margin-top: 20px" class="btn-lg btn-success" />
            </form>
        </div>
    </div>
</div>