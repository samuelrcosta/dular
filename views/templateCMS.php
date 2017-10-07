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
            <?php if($usuario->getFoto() == ""): ?>
            <img class='img-responsive rounded-circle' src='<?php echo BASE_URL;?>/assets/media/avatar/default.jpg'/>
            <?php else: ?>
            <img class='img-responsive rounded-circle' src='<?php echo BASE_URL;?>/assets/media/avatar/<?php echo "logo".$usuario->getFoto() ?>'/>
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
            <li <?php if($tipo == 0) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/homeCMS'>Dashboard</a></li>
            <li <?php if($tipo == 1) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/orcamentosCMS'>Orçamentos</a></li>
            <li <?php if($tipo == 2) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/produtosCMS'>Produtos</a></li>
            <li <?php if($tipo == 3) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/revendedoresCMS'>Revendedores</a></li>
            <li <?php if($tipo == 4) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/contatosCMS'>Contatos</a></li>
            <li <?php if($tipo == 5) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/perfil'>Meu Perfil</a></li>
            <li <?php if($tipo == 6) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/configuracoes'>Configurações</a></li>
            <li <?php if($tipo == 7) echo "class='active'";?> ><a href='<?php echo BASE_URL;?>/login/logout'>Sair</a></li>
        </ul>
    </menu>
</sidebar>
<?php $this->loadViewInTemplate($viewName, $viewData) ?>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/canvas-to-blob.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/resize.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/script.js"></script>
</body>
</html>