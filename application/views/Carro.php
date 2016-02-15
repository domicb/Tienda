
<!-- Title -->
<hr>

<!-- Page Features -->
<div class="row text-center">

    <div class="col-md-3 col-sm-6 hero-feature">

        <div class="row">
            <div class="col-md-3 .col-md-offset-3">
                <table class="table table-striped">
                    <thead>
                        <tr><!--tabla de tareas-->
                            <td><b></b></td>  
                            <td><b>Titulo</b></td>
                            <td><b>Precio</b></td>
                            <td><b>Cantidad</b></td>

                            <td><b>Eliminar</b></td>
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($articulos as $articulo): ?>     

                            <tr>
                                <td><img width="100" height="100" src="<?= base_url() ?>Assets/img/<?= $articulo['imagen'] ?>"  alt="">
                                </td>
                                <td> <?php echo $articulo['nombre']; ?> </td>
                                <td> <?php echo $articulo['precio']; ?> </td>
                                <td> <?php echo $articulo['cantidad']; ?> </td>
                                <td>

                                    &nbsp;&nbsp;<a href="borrar_tarea.php?id=<?php echo $articulo['idproducto']; ?>">
                                        <span class="glyphicon glyphicon-remove"></span></a>

                                </td>
                            <?php endforeach; ?> 

                        </tr>

                    </tbody>
                </table>                         
                <a href="<?= base_url() . 'index.php/Compras/vaciar/' ?>" class="btn btn-primary">Vaciar carrito </a>
            </div>

        </div>

    </div>

</div>

