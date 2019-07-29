<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-produtos.css?v=1.1">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<style>
	.home-back-img {
    height: 157px;
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
			</div><!-- /.cols -->
		</div><!-- /.container -->
	</div>
	<div class="div-lista-produtos">
		<div class="container">
			<div class="row bloco-categoria">
        <div class="col-lg-6">
          <div class="row">
            <div class="col-md-6">
              <a href="<?php echo BASE_URL;?>/produtos/categorias/Cama">
                <img src="<?php echo BASE_URL;?>/assets/imgs/cama.svg">
                <p>CAMA</p>
              </a>
            </div>
            <div class="col-md-6">
              <a href="<?php echo BASE_URL;?>/produtos/categorias/Mesa">
                <img src="<?php echo BASE_URL;?>/assets/imgs/mesa.svg">
                <p>MESA</p>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="col-md-6">
              <a href="<?php echo BASE_URL;?>/produtos/categorias/Banho">
                <img src="<?php echo BASE_URL;?>/assets/imgs/banho.svg">
                <p>BANHO</p>
              </a>
            </div>
            <div class="col-md-6">
              <a href="<?php echo BASE_URL;?>/produtos/categorias/Decoração">
                <img src="<?php echo BASE_URL;?>/assets/imgs/decoracao.svg">
                <p>DECORAÇÃO</p>
              </a>
            </div>
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