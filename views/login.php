<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-login.css">
<div class="container-login">
        <form method="POST" style="margin-top: 20px">
            <div id="caixa" class="form-group">
                <img style="margin-bottom: 15px;float: left;width: 100px" src="assets/imgs/logo.png"/><h2>Acesso seguro</h2>
                <div class="form-group">
                    <input onKeyPress="teclarTeclado();" type="text" name="email" placeholder="Digite seu email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <input onKeyPress="teclarTeclado();" type="password" name="senha" placeholder="Digite sua senha" id="senha" class="form-control">
                </div>
                <?php
                if(!empty($aviso)){
                    echo "<div class='alert alert-danger'>".$aviso."</div>";
                }
                ?>
                <input type="submit" value="Entrar" class="btn btn-success" style="cursor: pointer">
            </div>
        </form>
    </div>
</div>