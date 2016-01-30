<!-- Title -->
<div class="row">
    <div class="col-lg-12">

        <button type="button" class="btn btn-default">Destacados</button>
        <button type="button" class="btn btn-default">Filosofía</button>
        <button type="button" class="btn btn-default">Historia</button>
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
                            <a href="#" class="btn btn-primary">Comprar <?=$libro['precio']?> &euro; </a></p><p> 
                            <a href="#" class="btn btn-default">Más Información</a>
                        </p>
                    </div>
                </div>
            </div>
   <?php endforeach;?>
   
</div>
<div class="row text-center">
    <?php echo $this->pagination->create_links() ?></div>


