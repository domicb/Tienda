
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

                            <td><b>Acciones</b></td>
                        </tr>
                    <tbody>
                        <tr>
                            <?php foreach ($datos as $key => $dato): ?>                           
                            <tr>
                                <td><img width="100" height="100" src="<?= base_url() ?>Assets/img/<?= $dato['imagen'] ?>"  alt="">
                                </td>
                                <td> <?php echo $dato['nombre']; ?> </td>
                                <td> <?php echo $dato['precio']; ?> </td>
                                <td> <?php echo $dato['cantidad']; ?> </td>
                                <td>
                                    <a href="../controllers/modificar_tarea.php?id=<?php echo $dato['idproducto']; ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>&nbsp;&nbsp;<a href="../controllers/completar_tarea.php?id=<?php echo $dato['idproducto']; ?>">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </a>&nbsp;&nbsp;<a href="borrar_tarea.php?id=<?php echo $dato['idproducto']; ?>">
                                        <span class="glyphicon glyphicon-remove"></span></a>

                                </td>
                            <?php endforeach; ?> 
                        </tr>

                    </tbody>
                </table>                         

            </div>

        </div>
        <?php foreach ($datos as $key => $dato): ?> 


    <?= $dato['precio']; ?>

        <?php endforeach; ?>
        <?php foreach ($resultado as $key => $res): ?> 


    <?= $res['precio']; ?>

        <?php endforeach; ?>
    </div>

</div>

