
<!-- Page Features -->

    <div class="col-md-10">
        <p><h3>Lista de pedidos realizados</h3></p>
    <hr>
                    <?php if(isset($articulos)) :?>
             
                <table class="table table-bordered">
                    <thead> 
                        <tr><!--tabla de tareas-->                        
                            <td><b>Número de pedido</b></td>  
                            <td><b>Fecha</b></td>
                            <td><b>Estado</b></td>   
                            <td><b>Importe</b></td>  
                            <td><b>Acciones</b></td> 
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($articulos as $articulo): ?>     
                            <tr>
                                <td> <?php echo '120'.$articulo['idpedido']; ?> </td>
                                <td> <?php echo $articulo['fecha']; ?> </td>                             
                                <td> <?php if($articulo['estado']=='1'){echo 'Pendiente';}else{echo 'En Tramite';}  ?></td>     
                                <td> <?php echo $articulo['importe']; ?></td> 
                                <?php if($articulo['estado']=='1'):?><!-- SOlo podremos borrar el pedido sinó se ha enviado -->
                                <td><a href="<?=base_url().'index.php/Compras/borraPedido/'.$articulo['idpedido']?>">Anular</a> | <a href="#"> Ver en PDF</a></td>
                                <?php else :?>
                                 <td><a href="#">Anular</a> | <a href="#"> Ver en PDF</a></td>
                                <?php endif;?>
                            <?php endforeach; ?> 
                        </tr>
                            
                    </tbody>
                </table>
                      
              <?php else :?><center>
                        <div class="alert alert-info">Tu carrito se encuentra vacio, a que esperas para llenarlo con algún ejemplar!</div></center>
            <?php endif;?> 
        
    </div>

</div>
<div class="row">
    <center>         
        <a href="<?=base_url()?>" class="btn btn-primary"> Volver</a>
    </center>
</div>