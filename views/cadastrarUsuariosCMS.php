<div class="container" style="margin-left:180px;padding:30px;transition: all 0.5s;">
    <h1>Cadastrar Usuário</h1>
    <a href="javascript:window.history.go(-1)" class="btn btn-primary" style="margin-top:10px"><img style="margin-right: 5px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAACGSURBVEhLYxiZ4P////z//v0LgXKpD6AWnAJiEEiCClMPwCwA0iDwAcg2gUpRBwANpZ8FQPr9qAUYYHhZAAJA9k4g1UEBboAajQBAQ6cBJagJPkCNRgCgIO19AgJACdrGCQyMWkQ2GBCLgID6pTAMAA2nr0VADALUrxlhAGoR7er4QQ4YGAD5xQxMLz1UIwAAAABJRU5ErkJggg=="> Voltar</a>
    <form method="POST" onsubmit="return validar(this)" style="margin-bottom: 20px;margin-top: 20px">
        <div class="form-group">
            <label form="titulo"><span class="obrigatorio">*</span>Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" data-ob="1" data-alt="Nome">
        </div>
        <div class="form-group">
            <label form="titulo"><span class="obrigatorio">*</span>E-mail</label>
            <input type="text" name="email" id="email" class="form-control" data-ob="1" data-alt="E-mail">
        </div>
        <div class="form-group">
            <label form="titulo"><span class="obrigatorio">*</span>Senha</label>
            <input type="text" name="senha" id="senha" class="form-control" data-ob="1" data-alt="Senha">
        </div>
        <div class="form-group">
            <label form="titulo"><span class="obrigatorio">*</span>Função</label>
            <input type="text" name="funcao" id="funcao" class="form-control" data-ob="1" data-alt="Função">
        </div>
        <h4 style="margin-bottom: 15px;margin-top: 30px">Menus de acesso</h4>
        <div class="checkbox">
            <label><input type="checkbox" name="menuOrcamentos" id="menuOrcamentos" value="True">Orçamentos</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="menuProdutos" id="menuProdutos" value="True">Produtos</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="menuRevendedores" id="menuRevendedores" value="True">Revendedores</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="menuContatos" id="menuContatos" value="True">Contatos</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="menuPerfil" id="menuPerfil" value="True">Meu Perfil</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="menuConfiguracoes" id="menuConfiguracoes" value="True">Configurações</label>
        </div>
        <input type="submit" class="btn btn-success" style="cursor: pointer;margin-top: 20px;margin-top: 20px" value="Cadastrar">
    </form>
</div>