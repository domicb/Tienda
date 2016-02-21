
<!-- Page Features -->
<div class="row">
    <div class="col-md-4">
        <p>Datos Usuario</p>
            <?php if(isset($articulos)) :?>
             
                <table class="table table-hover">                        
                    <thead> 
                        <tr><!--tabla de USUARIO-->
                     
                            <td><b>Nombre</b></td>  
                            <td><b>Direccion</b></td>
                            <td><b>Provincia</b></td>
                            <!--<td><b>Cantidad</b></td>
                            <td><b>Portada</b></td>  -->
                            <td><b>Eliminar</b></td>
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($articulos as $articulo): ?>     
                            <tr>
                                <td> <?php echo $articulo['nombre']; ?> </td>
                                <td> <?php echo substr($articulo['descripcion'], 0, 84).'...'?> </td>
                                <td> <?php echo $articulo['precio']; ?> </td>
                                 <!--<td> <a><span class="glyphicon glyphicon-arrow-up"></span></a><?php echo $articulo['cantidad']; ?> <a><span class="glyphicon glyphicon-arrow-down"></span></a></td>                              
                               <td>
                                    <img width="100" height="150" src="<?= base_url() ?>Assets/img/<?= $articulo['imagen'] ?>"  alt="">
                                </td>-->
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
    <div class="col-md-8">
        <p>Articulos a comprar</p>
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
                                <td> <a><span class="glyphicon glyphicon-arrow-up"></span></a><?php echo $articulo['cantidad']; ?> <a><span class="glyphicon glyphicon-arrow-down"></span></a></td>                              
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

</div>