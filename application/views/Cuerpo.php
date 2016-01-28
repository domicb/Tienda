        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Destacados</h3> <div class="btn-group btn-group-lg"></div>
            </div>
        </div>
        <hr>
        <!-- /.row -->
   
        <!-- Page Features -->
        <div class="row text-center">

             <?php foreach ($libros as $key => $libro) {
           echo '<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <span class="help-block">Quedan '.$libro['cantidad'].' libros</span>
                    <img width="150" height="100" src=Assets/img/'.$libro['imagen'].' alt="">
                    <div class="caption">';
                    echo ' <h3>'.$libro['nombre'].'</h3>';
                    echo ' <p>'.substr($libro['descripcion'], 0, 205).'</p>';
                      echo'  <p>
                            <a href="#" class="btn btn-primary">Comprar</a> <a href="#" class="btn btn-default">Más Información</a>
                        </p>
                    </div>
                </div>
            </div>';
               }   ?>      <!-- FIN FOREACH -->   
            

        </div>