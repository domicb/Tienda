<!-- Title -->
<div class="row">
    <div class="col-lg-12">
              <a href="<?=base_url()?>"><button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-star">        
                </span>Destacados</button> </a>
                <!-- Si existen las categoria las mostramos sino tenemos que lanzar error-->
        <?php if(isset($categorias)):
    foreach ($categorias as $key => $categoria):?>

        <a href="<?='index.php/'.$categoria['nombre']?>"><button type="button" class="btn btn-default"><?=$categoria['nombre']?></button></a>
       <?php endforeach;?> 
        <?php endif;?>
    </div>

</div>
<hr>
<!-- /.row -->
<h3>Destacados</h3> 

<!-- Page Features -->
<div class="row text-center">

    <?php
    foreach ($libros as $key => $libro):?> 
        <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <span class="help-block">Quedan  <?=$libro['cantidad']?> libros</span>
                    <img width="150" height="100" src="<?=base_url()?>Assets/img/<?=$libro['imagen']?>"  alt="">
                    <div class="caption">
       <h3> <?= $libro['nombre']?></h3>
       <p>  <?=substr($libro['descripcion'], 0, 205)?> </p>
       <p>
                            <a href="<?=base_url().'index.php/Compras/compra/'.$libro['idproducto']?>" class="btn btn-primary">Comprar <?=$libro['precio']?> &euro; </a></p><p> 
                            <a href="#" class="btn btn-default" data-toggle="modal" data-target="#<?=$libro['idproducto']?>" id="<?=$libro['idproducto']?>">Más Información</a>
                        </p>
                    </div>
                </div>
            </div>
    <!-- MODAL -->
    <div class="modal fade" id="<?=$libro['idproducto']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Información del libro</h3>
                </div>
                <div class="modal-body">
                    <?=$libro['anuncio']?>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
   <?php endforeach;?>
   
</div>
<div class="row text-center">
    <?php echo $this->pagination->create_links() ?></div>


