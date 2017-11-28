<html lang="pt-br">
<head>
    <title><?php echo $titulo ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo BASE_URL;?>/assets/imgs/logo.png" type="image/png" />
    <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-CMS.css">
    <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/tether.min.js"></script>
    <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL;?>'</script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato%3A400%2C700%7CArimo%3A700&subset=latin&ver=1480945793
" type="text/css">
</head>
<body>
<sidebar class='sidebar'>
    <div class='logo'>
        <a href='/'><img src='<?php echo BASE_URL;?>/assets/imgs/logo.png' border='0' width='35' /></a>
    </div>
    <div class='userinfo'>
        <div class='userinfo_photo'>
            <?php if($usuario->getFoto() == "default"): ?>
            <img class='img-responsive rounded-circle' src='<?php echo BASE_URL;?>/assets/media/avatar/default.jpg'/>
            <?php else: ?>
            <img class='img-responsive rounded-circle' src='<?php echo BASE_URL;?>/assets/media/avatar/<?php echo "logo".$usuario->getFoto() ?>.jpg'/>
            <?php endif; ?>
        </div>
        <div class='userinfo_info'>
            <p><?php echo $usuario->getNome();?></p>
            <small><?php echo $usuario->getFuncao();?></small>
        </div>
        <div style='clear:both'></div>
    </div>
    <menu>
        <ul>
            <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/dashboard.png')" <?php if($tipo == 0) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/homeCMS'>Dashboard</a></li>
            <?php if(gettype(strpos($usuario->getPermissao(), '1')) == 'integer'):?>
                <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/four-black-squares.png')" <?php if($tipo == 1) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/orcamentosCMS'>Orçamentos</a></li>
            <?php endif; ?>
            <?php if(gettype(strpos($usuario->getPermissao(), '2')) == 'integer'):?>
                <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/logo-produtos.png')" <?php if($tipo == 2) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/produtosCMS'>Produtos</a></li>
            <?php endif; ?>
            <?php if(gettype(strpos($usuario->getPermissao(), '3')) == 'integer'):?>
                <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/logo-revendedores.png')" <?php if($tipo == 3) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/revendedoresCMS'>Revendedores</a></li>
            <?php endif; ?>
            <?php if(gettype(strpos($usuario->getPermissao(), '4')) == 'integer'):?>
                <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/logo-contatos.png')" <?php if($tipo == 4) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/contatosCMS'>Contatos</a></li>
            <?php endif; ?>
            <?php if(gettype(strpos($usuario->getPermissao(), '5')) == 'integer'):?>
                <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/user-shape.png')" <?php if($tipo == 5) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/perfilCMS'>Meu Perfil</a></li>
            <?php endif; ?>
            <?php if(gettype(strpos($usuario->getPermissao(), '6')) == 'integer'):?>
                <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/settings.png')" <?php if($tipo == 6) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/configuracoesCMS'>Configurações</a></li>
            <?php endif; ?>
            <li style="background-image:url('<?php echo BASE_URL;?>/assets/imgs/sign-out-option.png')" <?php if($tipo == 7) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/login/logout'>Sair</a></li>
        </ul>
    </menu>
</sidebar>
<?php $this->loadViewInTemplate($viewName, $viewData) ?>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/canvas-to-blob.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/resize.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/script.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/scriptCMS.js"></script>
</body>
</html>