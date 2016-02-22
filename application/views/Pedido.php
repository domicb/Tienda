
<!-- Page Features -->
<div class="row">
    <div class="col-md-4">
        <p><h3>Datos de identificacion</h3></p>
            <?php if(isset($usuarios)) :?>
             
                <table class="table table-bordered">                        
                    <thead> 
                        <tr><!--tabla de USUARIO-->
                     
                            <td><b>Nombre</b></td>  
                            <td><b>Direccion</b></td>
                            <td><b>Provincia</b></td>
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($usuarios as $usuario): ?>     
      
                                <td> <?=$usuario['nombre']; ?> </td>        
                                <td> <?=$usuario['direccion']; ?> </td>  
                                <td> <?=$usuario['provincia']; ?> </td>  
                             
                        </tr>   
                        <tr>
                             <td> <?=$usuario['apellidos']; ?> </td>  
                             <td><?=$usuario['direccion']; ?></td>
                             <td> <?=$usuario['cp']; ?></td>
                        </tr>
                        <tr>
                            <td><?=$usuario['dni']; ?> </td>
                        </tr>
                           <?php endforeach; ?> 
                    </tbody>
                </table>
                <!-- BOTONES CARRITO -->
                <center> 
                    </center>
               
              <?php else :?><center>
                        <div class="alert alert-info">Tu carrito se encuentra vacio, a que esperas para llenarlo con algún ejemplar!</div></center>
            <?php endif;?> 
    </div>
    <div class="col-md-8">
        <p><h3>Descripcion del pedido</h3></p>
                    <?php if(isset($articulos)) :?>
             
                <table class="table table-bordered">
                    <thead> 
                        <tr><!--tabla de tareas-->                        
                            <td><b>Libro</b></td>  
                            <td><b>Precio</b></td>
                            <td><b>Cantidad</b></td>                    
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($articulos as $articulo): ?>     
                            <tr>
                                <td> <?php echo $articulo['nombre']; ?> </td>
                                <td> <?php echo $articulo['precio']; ?> </td>
                                <td> <?php echo $articulo['cantidad']; ?></td>                              
    
                            <?php endforeach; ?> 
                        </tr>
                            
                    </tbody>
                </table>
                
    <center> <p class="text-primary">El precio total del pedido asciende a <?=$total?> Euros.</p></center>
               
              <?php else :?><center>
                        <div class="alert alert-info">Tu carrito se encuentra vacio, a que esperas para llenarlo con algún ejemplar!</div></center>
            <?php endif;?> 
        
    </div>

</div>
<div class="row">
    <center> <a href="<?=base_url().'index.php/Compras'?>" class="btn btn-primary"> Confirmar</a></center>
</div>