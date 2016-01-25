        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Destacados</h3>
            </div>
        </div>
        <!-- /.row -->
<!-- AQUI VA EL CUERPO CON PHP -->
   
        <!-- Page Features -->
        <div class="row text-center">
           
                    
           
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                        <h3>Tituto</h3>
                        <p>Anuncio.</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
             <?php foreach ($libros as $key => $libro) {
           echo '<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src=Assets/img/'.$libro['imagen'].' alt="">
                    <div class="caption">';
                    echo ' <h3>'.$libro['nombre'].'</h3>';
                    echo ' <p>'.$libro['anuncio'].'</p>';
                      echo'  <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>';
               }   ?>      
        

            

        </div>