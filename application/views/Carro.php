
<!-- Page Features -->
<div class="row text-center">
            <?php if(isset($articulos)) :?>
             
                <table class="table table-hover">
                    <thead> 
                        <tr><!--tabla de tareas-->                        
                            <td><b>Titulo</b></td>  
                            <td><b>Descripción</b></td>
                            <td><b>Precio</b></td>
                            <td><b>Cantidad</b></td>
                            <td><b>Portada</b></td>  
                            <td><b>Eliminar</b></td>
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($articulos as $articulo): ?>     
                            <tr>
                                <td> <?php echo $articulo['nombre']; ?> </td>
                                <td> <?php echo substr($articulo['descripcion'], 0, 84).'...'?> </td>
                                <td> <?php echo $articulo['precio']; ?> </td>
                                <td> <a href="<?=base_url().'index.php/Compras/compra/'.$articulo['idproducto'];?>">
                                        <span class="glyphicon glyphicon-arrow-up"></span></a>
                                            <?php echo $articulo['cantidad']; ?> 
                        </td>                              
                                <td>
                                    <img width="100" height="150" src="<?= base_url() ?>Assets/img/<?= $articulo['imagen'] ?>"  alt="">
                                </td>
                                <td>
                                    &nbsp;&nbsp;<a href="<?=base_url().'index.php/Compras/eliminar/'.$articulo['unique_id'];?>">
                                        <span class="glyphicon glyphicon-remove"></span></a>
                                </td>
                            <?php endforeach; ?> 
                        </tr>
                    </tbody>
                </table>
                <!-- BOTONES CARRITO -->
                <center> <a href="<?= base_url() . 'index.php/Compras/vaciar/' ?>" class="btn btn-warning">Vaciar carrito </a>
                <a href="<?=base_url()?>" class="btn btn-default">Seguir comprando </a>
                <a href="<?=base_url().'index.php/Compras'?>" class="btn btn-primary">Realizar pedido </a></center>
               
              <?php else :?><center>
                        <div class="alert alert-info">Tu carrito se encuentra vacio, a que esperas para llenarlo con algún ejemplar!</div></center>
            <?php endif;?> 

</div>

