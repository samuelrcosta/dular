<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-produtos.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
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
    <div class="menu-ex-categorias">
        <ul class="menu-categorias">
            <li><a href="<?php echo BASE_URL;?>/produtos/categorias/Cama"><div><img src="<?php echo BASE_URL;?>/assets/imgs/logo-cama.png"></div><p>CAMA</p></a></li>
            <li><a href="<?php echo BASE_URL;?>/produtos/categorias/Mesa"><div><img src="<?php echo BASE_URL;?>/assets/imgs/logo-mesa.png"></div><p>MESA</p></a></li>
            <li><a href="<?php echo BASE_URL;?>/produtos/categorias/Banho"><div><img src="<?php echo BASE_URL;?>/assets/imgs/logo-banho.png"></div><p>BANHO</p></a></li>
            <li><a href="<?php echo BASE_URL;?>/produtos/categorias/Decoração"><div><img src="<?php echo BASE_URL;?>/assets/imgs/logo-decoracao.png"></div><p>DECORAÇÃO</p></a></li>
        </ul>
    </div>
</div>
</div>
<div class="div-produtos">
    <div class="banner-category">
        <div class="container">
            <div class="row cols clearfix">
                <?php if(isset($tag1)):?>
                    <div class="col-lg-6">
                        <h5><strong>Categorias:</strong></h5>
                        <div class="lista-tags lista-tags-1">
                            <ul>
                                <?php foreach ($tag1 as $tag): ?>
                                    <li><a href="<?php echo BASE_URL ?>/produtos/tag/<?php echo $tag['nome'] ?>"><?php echo $tag['nome'] ?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="lista-tags lista-tags-borda">

                        </div>
                        <div class="lista-tags lista-tags-2">
                            <ul>
                                <?php foreach ($tag2 as $tag): ?>
                                    <li><a href="<?php echo BASE_URL ?>/produtos/tag/<?php echo $tag['nome'] ?>"><?php echo $tag['nome'] ?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="lista-tags lista-tags-borda">

                        </div>
                        <div class="lista-tags lista-tags-3">
                            <ul>
                                <?php foreach ($tag3 as $tag): ?>
                                    <li><a href="<?php echo BASE_URL ?>/produtos/tag/<?php echo $tag['nome'] ?>"><?php echo $tag['nome'] ?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-lg-6 coluna-abaixo " style="border-right: 0px solid #e6e6e6;">
                        <div class="call">
                            <div class="t1 light black-80">
                                <?php echo $returnName;?></div><!-- /.t1 -->
                            <div class="t2 mt15 black-60">
                                Produtos para cama casal e solteiro confeccionados com tecidos de alta qualidade produzidos diretamente da fábrica.
                                <div class="container compartilhar" style="margin-top: 15px">
                                    <h3 style="margin-bottom: 15px"><img style="width: 40px;margin-right: 10px" src="<?php echo BASE_URL ?>/assets/imgs/share.png" alt="Logo compartilhar">Compartilhar</h3>
                                    <div id="share"></div>
                                </div>
                            </div><!-- /.t2 -->
                        </div><!-- /.call -->
                    </div><!-- /.col -->
                <?php else: ?>
                    <div class="col-lg-6">
                        <div class="call">
                            <div class="t1 light black-80">
                                <?php echo $returnName;?></div><!-- /.t1 -->
                            <div class="t2 mt15 black-60">
                                Produtos para cama casal e solteiro confeccionados com tecidos de alta qualidade produzidos diretamente da fábrica.
                            </div><!-- /.t2 -->
                        </div><!-- /.call -->
                    </div><!-- /.col -->
                    <div class="col-lg-6 coluna-abaixo col-compartihar" style="border-right: 0px solid #e6e6e6;">
                        <div class="container compartilhar">
                            <h3 style="margin-bottom: 15px"><img style="width: 40px;margin-right: 10px" src="<?php echo BASE_URL ?>/assets/imgs/share.png" alt="Logo compartilhar">Compartilhar</h3>
                            <div id="share"></div>
                        </div>
                    </div><!-- /.col -->
                <?php endif; ?>
            </div><!-- /.cols -->
        </div><!-- /.container -->
    </div>
    <div class="div-lista-produtos">
        <div class="container">
            <div class="row">
                <?php foreach($produtos as $produto):?>
                    <div class="col-lg-4 box-produto">
                        <div class="item-produto" title="<?php echo $produto['descricao'] ?>"><a href="<?php echo BASE_URL;?>/produtos/abrir/<?php echo base64_encode(base64_encode($produto['id'])) ?>">
                            <div class="item-produto-foto">
                                <?php if($produto['url'] != 'default'): ?>
                                    <img src="<?php echo BASE_URL;?>/assets/imgs/produtos/<?php echo $produto['url'] ?>.jpg">
                                <?php else: ?>
                                    <img src="<?php echo BASE_URL;?>/assets/imgs/default.jpg">
                                <?php endif; ?>
                            </div>
                            <div class="item-produto-nome">
                                <?php echo $produto['nome'] ?>
                            </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
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