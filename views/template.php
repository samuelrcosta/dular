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
          <meta name="description" content="<?php echo $produto['descricao'];?>"/>
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
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-template.css?v=1.3">
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/tether.min.js"></script>
        <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL;?>'</script>
        <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148041203-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-148041203-1');
        </script>
    </head>
    <body>
        <div class="topo-topo">
            <div class="container">
              <div class="topo-topo-right"><a href="tel:+55623514-5771">Televendas (62) 3514-5771</a> - <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank">Whatsapp (62) 98484-5771</a></div>
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
                                  <p style="margin-left: 25px;padding-bottom: 5px;margin-bottom: 5px;border-bottom: 1px solid white;width: fit-content;padding-right: 10px;display: block;"><img alt="Logo Phone" style="width: 25px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDM0LjU0NiAzNC41NDYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDM0LjU0NiAzNC41NDY7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8cGF0aCBkPSJNMjkuMzMsMTkuMzM5Yy0yLjMyNi0wLjU0NS01LjMtMS45NjktNi4zNzctMy43MzdjLTAuNjAzLTAuOTg0LTAuNjY2LTIuMDk0LTAuMTc5LTMuMDQyICAgYzAuMDI3LTAuMDUxLDAuMDc0LTAuMTI4LDAuMTA5LTAuMTg4Yy0wLjAyOC0wLjIwOSwwLjAyMS0wLjQ4NiwwLjE3Mi0wLjg0N2MwLjAxMS0wLjAyNCwwLjAxMi0wLjAyNywwLjAyLTAuMDQ0SDExLjEyMiAgIGMwLjAwNiwwLjAxNCwwLjAwNiwwLjAxNCwwLjAxNCwwLjAzMmMwLDAsMC4wMDEsMC4wMDEsMC4wMDEsMC4wMDJjMC4yNjgsMC40MTgsMC41MDIsMC43OTIsMC42MjcsMS4wMzMgICBjMC40OTUsMC45NjEsMC40MzEsMi4wNy0wLjE3LDMuMDU1Yy0xLjA4LDEuNzctNC4wNTMsMy4xOTMtNi4zODEsMy43MzhMNC41NywzMC4xMjRjLTAuMDcsMS4xODMsMC43MDUsMi4xNDksMS43MjMsMi4xNDloMjEuOTU4ICAgYzEuMDE4LDAsMS43OTItMC45NjcsMS43MjEtMi4xNDlMMjkuMzMsMTkuMzM5eiBNMTMuNjgzLDI2Ljc2NWgtMi4wNjJjLTAuMzgsMC0wLjY4OC0wLjMwOS0wLjY4OC0wLjY4OHMwLjMwOC0wLjY4OCwwLjY4OC0wLjY4OCAgIGgyLjA2MmMwLjM3OSwwLDAuNjg4LDAuMzA5LDAuNjg4LDAuNjg4UzE0LjA2MiwyNi43NjUsMTMuNjgzLDI2Ljc2NXogTTEzLjY4MywyNC4xNDNoLTIuMDYyYy0wLjM4LDAtMC42ODgtMC4zMDgtMC42ODgtMC42ODcgICBjMC0wLjM4MiwwLjMwOC0wLjY4OCwwLjY4OC0wLjY4OGgyLjA2MmMwLjM3OSwwLDAuNjg4LDAuMzA2LDAuNjg4LDAuNjg4QzE0LjM3MSwyMy44MzUsMTQuMDYyLDI0LjE0MywxMy42ODMsMjQuMTQzeiAgICBNMTMuNjgzLDIxLjUyMWgtMi4wNjJjLTAuMzgsMC0wLjY4OC0wLjMwOC0wLjY4OC0wLjY4OGMwLTAuMzc5LDAuMzA4LTAuNjg4LDAuNjg4LTAuNjg4aDIuMDYyYzAuMzc5LDAsMC42ODgsMC4zMDksMC42ODgsMC42ODggICBTMTQuMDYyLDIxLjUyMSwxMy42ODMsMjEuNTIxeiBNMTguMzA0LDI2Ljc2NWgtMi4wNjFjLTAuMzgsMC0wLjY4OC0wLjMwOS0wLjY4OC0wLjY4OHMwLjMwOS0wLjY4OCwwLjY4OC0wLjY4OGgyLjA2MiAgIGMwLjM3OSwwLDAuNjg4LDAuMzA5LDAuNjg4LDAuNjg4QzE4Ljk5MSwyNi40NTYsMTguNjgzLDI2Ljc2NSwxOC4zMDQsMjYuNzY1eiBNMTguMzA0LDI0LjE0M2gtMi4wNjEgICBjLTAuMzgsMC0wLjY4OC0wLjMwOC0wLjY4OC0wLjY4N2MwLTAuMzgyLDAuMzA5LTAuNjg4LDAuNjg4LTAuNjg4aDIuMDYyYzAuMzc5LDAsMC42ODgsMC4zMDYsMC42ODgsMC42ODggICBDMTguOTkxLDIzLjgzNSwxOC42ODMsMjQuMTQzLDE4LjMwNCwyNC4xNDN6IE0xOC4zMDQsMjEuNTIxaC0yLjA2MWMtMC4zOCwwLTAuNjg4LTAuMzA4LTAuNjg4LTAuNjg4ICAgYzAtMC4zNzksMC4zMDktMC42ODgsMC42ODgtMC42ODhoMi4wNjJjMC4zNzksMCwwLjY4OCwwLjMwOSwwLjY4OCwwLjY4OEMxOC45OTEsMjEuMjEyLDE4LjY4MywyMS41MjEsMTguMzA0LDIxLjUyMXogICAgTTIyLjkyNCwyNi43NjVoLTIuMDYyYy0wLjM3OSwwLTAuNjg3LTAuMzA5LTAuNjg3LTAuNjg4czAuMzA4LTAuNjg4LDAuNjg3LTAuNjg4aDIuMDYyYzAuMzgxLDAsMC42ODgsMC4zMDksMC42ODgsMC42ODggICBDMjMuNjEyLDI2LjQ1NiwyMy4zMDYsMjYuNzY1LDIyLjkyNCwyNi43NjV6IE0yMi45MjQsMjQuMTQzaC0yLjA2MmMtMC4zNzksMC0wLjY4Ny0wLjMwOC0wLjY4Ny0wLjY4NyAgIGMwLTAuMzgyLDAuMzA4LTAuNjg4LDAuNjg3LTAuNjg4aDIuMDYyYzAuMzgxLDAsMC42ODgsMC4zMDYsMC42ODgsMC42ODhDMjMuNjEyLDIzLjgzNSwyMy4zMDYsMjQuMTQzLDIyLjkyNCwyNC4xNDN6ICAgIE0yMi45MjQsMjEuNTIxaC0yLjA2MmMtMC4zNzksMC0wLjY4Ny0wLjMwOC0wLjY4Ny0wLjY4OGMwLTAuMzc5LDAuMzA4LTAuNjg4LDAuNjg3LTAuNjg4aDIuMDYyYzAuMzgxLDAsMC42ODgsMC4zMDksMC42ODgsMC42ODggICBDMjMuNjEyLDIxLjIxMiwyMy4zMDYsMjEuNTIxLDIyLjkyNCwyMS41MjF6IE0zNC4zNzIsMTMuMTE0Yy0wLjA0MywwLjIxNi0wLjA0NSwwLjQ0MS0wLjEzLDAuNjQ2ICAgYy0wLjQ5NywxLjIwMi0xLjQyOSwyLjE5Ny0yLjExNSwzLjMwNWMtMC44ODUsMS40MTQtOC40MDYtMS42MzQtNy40MzctMy41MjFjMC4zNjUtMC42OTgsMS43ODktMi42MjYsMS44OTYtMy40MDEgICBjMC4wOTgtMC42OTItMC44MTgtMS4yMzMtMS42NjQtMS4zMDJjLTIuMjMyLTAuMTgxLTUuMDgzLTAuMDE3LTcuNDUyLTAuMDAydjAuMDAyYy0wLjA2MywwLTAuMTMzLTAuMDAxLTAuMTk4LTAuMDAxICAgYy0wLjA2NCwwLTAuMTM0LDAuMDAxLTAuMTk3LDAuMDAxVjguODM5Yy0yLjM2OS0wLjAxNS01LjIyLTAuMTc4LTcuNDUyLDAuMDAyYy0wLjg0NiwwLjA2OS0xLjc2MiwwLjYxLTEuNjY1LDEuMzAyICAgYzAuMTA4LDAuNzc1LDEuNTMxLDIuNzAzLDEuODk2LDMuNDAxYzAuOTcxLDEuODg3LTYuNTUsNC45MzUtNy40MzUsMy41MjFjLTAuNjg4LTEuMTA4LTEuNjE4LTIuMTAzLTIuMTE2LTMuMzA1ICAgYy0wLjA4NC0wLjIwNS0wLjA4Ni0wLjQzLTAuMTI5LTAuNjQ2Yy0xLjEwNC00LjkzLDMuMTQ4LTkuOTYsOS41NTEtMTAuNDc2YzIuNDQ1LTAuMTk4LDQuODk2LTAuMzEsNy4zNS0wLjM1NFYyLjI3MiAgIGMwLjA2NiwwLjAwMSwwLjEzMSwwLjAwNSwwLjE5NywwLjAwNmMwLjA2NS0wLjAwMSwwLjEzMS0wLjAwNSwwLjE5OC0wLjAwNnYwLjAxMmMyLjQ1MiwwLjA0NCw0LjkwMywwLjE1Niw3LjM1LDAuMzU0ICAgQzMxLjIyMiwzLjE1MywzNS40NzQsOC4xODUsMzQuMzcyLDEzLjExNHoiIGZpbGw9IiNmZGYyMWMiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> <a href="tel:+55623514-5771" style="margin: 0;">(62) 3514-5771</a></p>
                                  <p style="margin-left: 25px;padding-bottom: 5px;margin-bottom: 5px;border-bottom: 1px solid white;width: fit-content;padding-right: 10px;display: block;"><img alt="Logo Whatsapp" style="width: 25px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggc3R5bGU9ImZpbGw6I0VERURFRDsiIGQ9Ik0wLDUxMmwzNS4zMS0xMjhDMTIuMzU5LDM0NC4yNzYsMCwzMDAuMTM4LDAsMjU0LjIzNEMwLDExNC43NTksMTE0Ljc1OSwwLDI1NS4xMTcsMCAgUzUxMiwxMTQuNzU5LDUxMiwyNTQuMjM0UzM5NS40NzYsNTEyLDI1NS4xMTcsNTEyYy00NC4xMzgsMC04Ni41MS0xNC4xMjQtMTI0LjQ2OS0zNS4zMUwwLDUxMnoiLz4KPHBhdGggc3R5bGU9ImZpbGw6IzU1Q0Q2QzsiIGQ9Ik0xMzcuNzEsNDMwLjc4Nmw3Ljk0NSw0LjQxNGMzMi42NjIsMjAuMzAzLDcwLjYyMSwzMi42NjIsMTEwLjM0NSwzMi42NjIgIGMxMTUuNjQxLDAsMjExLjg2Mi05Ni4yMjEsMjExLjg2Mi0yMTMuNjI4UzM3MS42NDEsNDQuMTM4LDI1NS4xMTcsNDQuMTM4UzQ0LjEzOCwxMzcuNzEsNDQuMTM4LDI1NC4yMzQgIGMwLDQwLjYwNywxMS40NzYsODAuMzMxLDMyLjY2MiwxMTMuODc2bDUuMjk3LDcuOTQ1bC0yMC4zMDMsNzQuMTUyTDEzNy43MSw0MzAuNzg2eiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRkVGRUZFOyIgZD0iTTE4Ny4xNDUsMTM1Ljk0NWwtMTYuNzcyLTAuODgzYy01LjI5NywwLTEwLjU5MywxLjc2Ni0xNC4xMjQsNS4yOTcgIGMtNy45NDUsNy4wNjItMjEuMTg2LDIwLjMwMy0yNC43MTcsMzcuOTU5Yy02LjE3OSwyNi40ODMsMy41MzEsNTguMjYyLDI2LjQ4Myw5MC4wNDFzNjcuMDksODIuOTc5LDE0NC43NzIsMTA1LjA0OCAgYzI0LjcxNyw3LjA2Miw0NC4xMzgsMi42NDgsNjAuMDI4LTcuMDYyYzEyLjM1OS03Ljk0NSwyMC4zMDMtMjAuMzAzLDIyLjk1Mi0zMy41NDVsMi42NDgtMTIuMzU5ICBjMC44ODMtMy41MzEtMC44ODMtNy45NDUtNC40MTQtOS43MWwtNTUuNjE0LTI1LjZjLTMuNTMxLTEuNzY2LTcuOTQ1LTAuODgzLTEwLjU5MywyLjY0OGwtMjIuMDY5LDI4LjI0OCAgYy0xLjc2NiwxLjc2Ni00LjQxNCwyLjY0OC03LjA2MiwxLjc2NmMtMTUuMDA3LTUuMjk3LTY1LjMyNC0yNi40ODMtOTIuNjktNzkuNDQ4Yy0wLjg4My0yLjY0OC0wLjg4My01LjI5NywwLjg4My03LjA2MiAgbDIxLjE4Ni0yMy44MzRjMS43NjYtMi42NDgsMi42NDgtNi4xNzksMS43NjYtOC44MjhsLTI1LjYtNTcuMzc5QzE5My4zMjQsMTM4LjU5MywxOTAuNjc2LDEzNS45NDUsMTg3LjE0NSwxMzUuOTQ1Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /> <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5562984845771" target="_blank" style="margin: 0;">(62) 98484-5771</a></p>
                                    <p style="margin-left: 25px;padding-bottom: 5px;margin-bottom: 5px;border-bottom: 1px solid white;width: fit-content;padding-right: 10px;display: block;"><img alt="Logo Mail" style="width: 25px" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTguMS4xLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDE0IDE0IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNCAxNDsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIzMnB4IiBoZWlnaHQ9IjMycHgiPgo8Zz4KCTxnPgoJCTxwYXRoIGQ9Ik03LDlMNS4yNjgsNy40ODRsLTQuOTUyLDQuMjQ1QzAuNDk2LDExLjg5NiwwLjczOSwxMiwxLjAwNywxMmgxMS45ODYgICAgYzAuMjY3LDAsMC41MDktMC4xMDQsMC42ODgtMC4yNzFMOC43MzIsNy40ODRMNyw5eiIgZmlsbD0iI2ZkZjIxYyIvPgoJCTxwYXRoIGQ9Ik0xMy42ODQsMi4yNzFDMTMuNTA0LDIuMTAzLDEzLjI2MiwyLDEyLjk5MywySDEuMDA3QzAuNzQsMiwwLjQ5OCwyLjEwNCwwLjMxOCwyLjI3M0w3LDggICAgTDEzLjY4NCwyLjI3MXoiIGZpbGw9IiNmZGYyMWMiLz4KCQk8cG9seWdvbiBwb2ludHM9IjAsMi44NzggMCwxMS4xODYgNC44MzMsNy4wNzkgICAiIGZpbGw9IiNmZGYyMWMiLz4KCQk8cG9seWdvbiBwb2ludHM9IjkuMTY3LDcuMDc5IDE0LDExLjE4NiAxNCwyLjg3NSAgICIgZmlsbD0iI2ZkZjIxYyIvPgoJPC9nPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /> dular@dularenxovais.com.br</p>
                                    <p style="margin-left: 25px;padding-bottom: 5px;margin-bottom: 5px;width: fit-content;padding-right: 10px;display: block;"><a href="https://www.facebook.com/jorliane/" style="margin: 0;" target="_blank"><img style="width: 25px" src="<?php echo BASE_URL;?>/assets/imgs/facebook.png" alt="Logo Facebook"> Facebook</a></p>
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
                                    <p>Segunda a sexta das 07:30 às 11:30 / 13:30 às 17:30</p>
                                    <p>Sábado das 08:00 às 12:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rodape">
                    <a href="<?php echo BASE_URL;?>/contato">Entre em contato</a> - <a href="<?php echo BASE_URL;?>/login">Acesso restrito</a></p>
                    <p style="margin-bottom: 0;">2018 ® Enxovais DuLar - Todos os direitos reservados</p>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/canvas-to-blob.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/resize.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/script.min.js?v=1.2"></script>
    </body>
</html>