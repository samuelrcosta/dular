<html lang="pt-br">
    <head>
        <!--=============================================================================================================
Criado por : Samuel Rocha Costa | email: samu.rcosta@gmail.com
=====================================================================================================================-->
        <title><?php echo $titulo ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="<?php echo $titulo ?>"/>
        <meta property="og:site_name" content="Enxovais DuLar"/>
        <meta name="keywords" content="Enxovais, Inhumas, Goiás, DuLar Enxovais, Indústria, Fábrica, Cama, Mesa, Banho, Lençol, Lençois, Fronhas, Toalhas, Colchas, Estampa, Floral, Geométrica">
        <?php if(isset($produto)):?>
        <meta property="og:description" content="<?php echo $produto['descricao'];?>"/>
        <meta property="og:image" content="<?php echo BASE_URL;?>/assets/imgs/produtos/<?php echo $produto['url']?>.jpg"/>
        <?php endif;?>
        <?php if(isset($description)):?>
        <meta name="description" content="<?php echo $description ?>">
        <meta name="Distribution" content="Global">
        <meta name="Rating" content="General">
        <meta name="author" content="Samuel R. Costa">
        <meta name="robots" content="index, follow">
        <meta name="robots" content="all">
        <?php endif;?>
        <link rel="shortcut icon" href="<?php echo BASE_URL;?>/assets/imgs/favicon.ico" />
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-template.css">
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/tether.min.js"></script>
        <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL;?>'</script>
        <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    </head>
    <body>
        <div class="topo-topo">
            <div class="container">
                <div class="topo-topo-right">Televendas (62) 3514-5771</div>
            </div>
        </div>
        <nav class="navbar navbar-default navbar-toggleable-md navbar-light topo">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo BASE_URL;?>"><img style="height: 70px;" src="<?php echo BASE_URL;?>/assets/imgs/logomarca.png"></a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/produtos">Produtos</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/revendedor">Seja um Revendedor</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/orcamento">Orçamento</a></li>
                        <li class="nav-item"><a class="nav-link" id="nav-link" href="<?php echo BASE_URL;?>/contato">Fale Conosco</a></li>
                </ul>
            </div>
        </nav>
        <div class="home-back-img">
        <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="footer-logo"></div>
                        <div class="area-contato-box">
                            <div class="area-titulo">
                                <div class="area-titulo-imagem">
                                    <img src="<?php echo BASE_URL;?>/assets/imgs/location-icon.png" alt="Logo Phone">
                                </div>
                                <h5 class="area-titulo-texto">Onde estamos</h5>
                                <div class="area-descricao">
                                    Av. Bernardo Sayão Qd 01 Lt. 19<br>Residencial Tereza Lima<br>Inhumas - GO
                                </div>
                                <iframe style="margin-top: 10px;margin-bottom: 10px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3828.475125029426!2d-49.51231206341763!3d-16.34974171576393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935dd7e1d7521103%3A0x1644e2e377076424!2sAv.+Bernardo+Say%C3%A3o%2C+604%2C+Inhumas+-+GO%2C+75400-000!5e0!3m2!1spt-BR!2sbr!4v1506397133603" width="350" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="area-contato-box" style="margin-bottom: 10px">
                            <div class="area-titulo">
                                <div class="area-titulo-imagem">
                                    <img src="<?php echo BASE_URL;?>/assets/imgs/phone-icon.png" alt="Logo Phone">
                                </div>
                                <h5 class="area-titulo-texto">Contatos</h5>
                                <div class="area-descricao">
                                    <p>(62) 3514-5771<br>
                                        dular@dularenxovais.com.br<br>
                                        <a href="https://www.facebook.com/jorliane/" style="margin: 0;" target="_blank"><img style="margin-top: 5px" src="<?php echo BASE_URL;?>/assets/imgs/facebook.png" alt="Logo Facebook"></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="area-contato-box" style="margin-top: 30px">
                            <div class="area-titulo">
                                <div class="area-titulo-imagem">
                                    <img src="<?php echo BASE_URL;?>/assets/imgs/info-icon.png" alt="Logo Phone">
                                </div>
                                <h5 class="area-titulo-texto">Atendimento</h5>
                                <div class="area-descricao">
                                    <p>Segunda a sexta das 14h às 18h</p>
                                </div>
                            </div>
                        </div>
                        <div class="area-contato-box" style="margin-top: 30px">
                            <img width="100" style="float: right" src="<?php echo BASE_URL;?>/assets/imgs/ssl.png" alt="SSL Security logo">
                        </div>
                    </div>
                </div>
                <div class="rodape">
                    <a href="<?php echo BASE_URL;?>/contato">Entre em contato</a> - <a href="<?php echo BASE_URL;?>/login">Acesso restrito</a></p>
                    <p style="margin-bottom: 0;">2017 ® Exovais DuLar - Todos os direitos reservados</p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/canvas-to-blob.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/resize.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/script.js"></script>

    </body>
</html>