<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-produtos.css">
<style>
    .home-back-img{
        height: 140px;
    }
</style>
<div class="menu-produtos">
    <div class="container">
        <div>
            <h5><a href="<?php echo BASE_URL;?>">HOME</a> > <a href="<?php echo BASE_URL;?>/produtos">PRODUTOS</a> > &nbsp;&nbsp;<?php echo $localDoSite ?></h5>
        </div>
    </div>
</div>
</div>
<div class="div-produtos">
    <div class="banner-category">
        <div class="container">
            <div class="cols clearfix">
                <div class="col col-6">
                    <div class="call">
                        <div class="t1 light black-80">
                            <?php echo $produto['nome'];?></div><!-- /.t1 -->
                        <div class="t2 mt15 black-60">
                            <?php echo $produto['NomeCategoria']?>
                        </div><!-- /.t2 -->
                    </div><!-- /.call -->
                </div><!-- /.col -->
                <div class="col col-6" style="border-right: 0px solid #e6e6e6;">
                    <form action="<?php echo BASE_URL;?>/produtos" id="form-search" class="form-horizontal clearfix" data-url="<?php echo BASE_URL;?>/produtos" style="margin-top: 35px;">
                        <div class="form-group w-100">
                            <div class="holder-input">
                                <input type="text" name="q" class="input input-search placeholder" placeholder="Busque um produto" required="">

                            </div><!-- /.holder-input -->
                        </div><!-- /.form-group -->
                    </form><!-- /#form-search -->
                </div><!-- /.col -->
            </div><!-- /.cols -->
        </div><!-- /.container -->
    </div>
    <div class="div-detalhes-produto">
        <div class="container" style="margin-bottom: 40px">
            <div class="row">
                <div class="col-md-7">
                    <div class="imagem-do-produto">
                        <img alt="<?php echo $produto['nome']?>" class="img-fluid rounded" style="max-width: 100%;height: auto" src="<?php echo BASE_URL;?>/assets/imgs/produtos/<?php echo $produto['url']?>.jpg">
                    </div>
                </div>
                <div class="col-md-5">
                    <h3>Descrição</h3>
                    <div>
                      <?php echo $produto['descricao']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>