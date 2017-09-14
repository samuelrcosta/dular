<html lang="pt-br">
    <head>
        <title><?php echo $titulo ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo BASE_URL;?>/assets/imgs/logo.png" type="image/png" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-template.css">
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/tether.min.js"></script>
        <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL;?>'</script>
        <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    </head>
    <body>
        <div class="topo-topo">
            <div class="container">
                <div class="topo-topo-right">Televendas (62) 3514-5771</div>
            </div>
        </div>
        <nav class="navbar navbar-inverse bg-inverse navbar-toggleable-md navbar-light topo">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo BASE_URL;?>">DuLar Exovais</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/produtos">Produtos</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/revendedor">Seja um Revendedor</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/orcamento">Orçamento</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/contato">Fale Conosco</a></li>
                </ul>
            </div>
        </nav>
        <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-logo"></div>
                        <h5>Onde estamos</h5>
                        <p>Avenida Bernado Sayão 000</p>
                        <h5>Contatos</h5>
                        <p>(62) 3514-5771<br>
                            (62) 3514-5771<br>
                            (62) 3514-5771<br>
                            dular@dularexovais.com.br</p>
                    </div>
                    <div class="col-md-9">
                        <h5>Atendimento</h5>
                        <p>Segunda a sexta das 8 às 18h<br>
                            sábado das 8 às 12h</p>
                    </div>
                </div>
                <div class="rodape">
                    <a href="<?php echo BASE_URL;?>/contato">Entre em contato</a> - <a href="<?php echo BASE_URL;?>/login">Acesso restrito</a></p>
                    <p style="margin-bottom: 0;">2017 ® DuLar Enxovais - Todos os direitos reservados</p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/canvas-to-blob.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/resize.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/script.js"></script>
    </body>
</html>