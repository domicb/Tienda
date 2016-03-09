
<!-- Title -->
<div class="row">
    <div class="col-lg-12">
        <center>
            <a href="<?= base_url() ?>"><button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-star">        
                    </span>Destacados</button> </a>
            <!-- Si existen las categoria las mostramos sino tenemos que lanzar error-->
            <?php if (isset($categorias)):
                foreach ($categorias as $key => $categoria):
                    ?>

                    <a href="<?= site_url() . '/' . $categoria['nombre'] ?>"><button type="button" class="btn btn-default"><?= $categoria['nombre'] ?></button></a>
                <?php endforeach; ?> 
<?php endif; ?>
        </center>
    </div>

</div>
<hr>

<!-- Page Features -->
<div class="row text-center">
    <div id="menu">
    <?php $contador = 0; foreach ($libros as $key => $libro):  $contador ++;?>       
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <span class="help-block">Quedan  <?= $libro['cantidad'] ?> libros</span>
                <img width="150"<?php if($libro['categoria_idcategoria']==1){echo 'class="img-rounded"';}?> height="100" src="<?= base_url() ?>Assets/img/<?= $libro['imagen'] ?>"  alt="">
                <div class="caption">
                    <h3> <?= $libro['nombre'] ?></h3>
                    <p>  <?= substr($libro['descripcion'], 0, 200) ?> </p>
                    <p>
                        <a href="<?= base_url() . 'index.php/Compras/compra/' . $libro['idproducto'] ?>" class="btn btn-primary">Comprar <?= $libro['precio'] ?> &euro; </a></p><p> 
                        <a href="<?= base_url() . 'Assets/pagina1.php?cod=' . $libro['idproducto'] ?>" class="btn btn-default" id="enlace<?=$contador?>">Más Información</a>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach;?>
        
          </div>
<div id="detalles"></div>
</div>
<div class="row text-center">
    <?php echo $this->pagination->create_links() ?></div>


