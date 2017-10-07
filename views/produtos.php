<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/assets/css/style-produtos.css">
<div class="menu-produtos">
    <div class="container">
        <div>
            <h5><a href="<?php echo BASE_URL;?>">HOME</a> > <a href="<?php echo BASE_URL;?>/produtos">PRODUTOS</a> > &nbsp;&nbsp;<?php echo $localDoSite ?></h5>
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
            <div class="cols clearfix">
                <?php if(isset($tag1)):?>
                    <div class="col col-6">
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
                    <div class="col col-6" style="border-right: 0px solid #e6e6e6;">
                        <div class="call">
                            <div class="t1 light black-80">
                                <?php echo $returnName;?></div><!-- /.t1 -->
                            <div class="t2 mt15 black-60">
                                Produtos para cama casal e solteiro produzidos diretamente da fábrica. Confeccionado com tecidos de alta qualidade.
                            </div><!-- /.t2 -->
                        </div><!-- /.call -->
                    </div><!-- /.col -->
                <?php else: ?>
                    <div class="col col-6">
                        <div class="call">
                            <div class="t1 light black-80">
                                <?php echo $returnName;?></div><!-- /.t1 -->
                            <div class="t2 mt15 black-60">
                                Produtos para cama casal e solteiro produzidos diretamente da fábrica. Confeccionado com tecidos de alta qualidade.
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
                <?php endif; ?>
            </div><!-- /.cols -->
        </div><!-- /.container -->
    </div>
    <div class="div-lista-produtos">
        <div class="container">
            <div class="row">
                <?php foreach($produtos as $produto):?>
                    <div class="col-md-4">
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