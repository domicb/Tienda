

<!-- Page Features -->
<div class="row text-center">
            <?php if(isset($articulos)) :?>
    <div class="col-md-3 col-sm-6 hero-feature">

        <div class="row">

            <div class="col-md-3 .col-md-offset-3">             
                <table class="table table-striped">
                    <thead> 
                        <tr><!--tabla de tareas-->                        
                            <td><b>Titulo</b></td>                        
                            <td><b>Precio</b></td>
                            <td><b>Cantidad</b></td>
                            <td><b>Descuento</b></td>
                            <td><b>Portada</b></td>  
                            <td><b>Eliminar</b></td>
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($articulos as $articulo): ?>     
                            <tr>
                                <td> <?php echo $articulo['nombre']; ?> </td>
                                <td> <?php echo $articulo['precio']; ?> </td>
                                <td> <?php echo $articulo['cantidad']; ?> </td>
                                <td> <?php echo $articulo['descuento']; ?> </td>
                                <td>
                                    <img width="100" height="150" src="<?= base_url() ?>Assets/img/<?= $articulo['imagen'] ?>"  alt="">
                                </td>
                                <td>
                                    &nbsp;&nbsp;<a href="<?=base_url().'index.php/Compras/eliminar/'.$articulo['idproducto'];?>">
                                        <span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            <?php endforeach; ?> 

                        </tr>

                    </tbody>
                </table>                         
                <a href="<?= base_url() . 'index.php/Compras/vaciar/' ?>" class="btn btn-primary">Vaciar carrito </a>
              <?php else :?><center>
                        <div class="alert alert-info">Tu carrito se encuentra vacio, a que esperas para llenarlo con algún ejemplar!</div></center>
            <?php endif;?>
            </div>

        </div>

    </div>

</div>

