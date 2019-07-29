<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-produtos.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<style>
    .home-back-img{
        height: 155px;
    }
</style>
<div class="menu-produtos">
    <div class="container">
        <div>
          <ol vocab="https://schema.org/" typeof="BreadcrumbList">
            <li property="itemListElement" typeof="ListItem">
              <a property="item" typeof="WebPage"
                 href="<?php echo BASE_URL;?>">
                <span property="name">HOME</span></a>
              <meta property="position" content="1">
            </li>
	          <?php for($i = 0; $i < count($breadcrumbs); $i++): ?>
                >
                <li property="itemListElement" typeof="ListItem">
                  <a property="item" typeof="WebPage"
                     href="<?php echo $breadcrumbs[$i]['url']; ?>">
                    <span property="name"><?php echo $breadcrumbs[$i]['titulo']; ?></span></a>
                  <meta property="position" content="<?php echo $i + 2; ?>">
                </li>
	          <?php endfor; ?>
          </ol>
        </div>
    </div>
</div>
</div>
<div class="div-produtos">
    <div class="banner-category">
        <div class="container">
            <div class="row cols clearfix">
                <div class="col col-md-6">
                    <div class="call">
                        <div class="t1 light black-80">
                            <strong><?php echo $produto['nome'];?></strong></div><!-- /.t1 -->
                        <div class="t2 mt15 black-60">
                            Categoria: <?php echo $produto['NomeCategoria']?>
                        </div><!-- /.t2 -->
                    </div><!-- /.call -->
                </div><!-- /.col -->
                <div class="col col-md-6 col-compartihar" style="border: 0">
                    <div class="container compartilhar">
                        <h3 style="margin-bottom: 15px"><img style="width: 40px;margin-right: 10px" src="<?php echo BASE_URL ?>/assets/imgs/share.png" alt="Logo compartilhar">Compartilhar</h3>
                        <div id="share"></div>
                    </div>
                </div>
            </div><!-- /.cols -->
        </div><!-- /.container -->
    </div>
    <div class="div-detalhes-produto">
        <div class="container" style="margin-bottom: 40px">
            <div class="row">
                <div class="col-md-7">
                    <div class="imagem-do-produto">
                        <img title="<?php echo $produto['nome']?>" alt="<?php echo $produto['nome']?>" class="img-fluid rounded" style="max-width: 100%;height: auto" src="<?php echo BASE_URL;?>/assets/imgs/produtos/<?php echo $produto['url']?>.jpg">
                    </div>
                </div>
                <div class="col-md-5">
                    <h3 style="margin-top: 15px">Descrição</h3>
                    <div style="white-space: pre-line">
                        <?php echo $produto['descricao']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#share").jsSocials({
        showLabel: false,
        showCount: false,
        shares: ["twitter", "facebook", "whatsapp"]
    });
</script>