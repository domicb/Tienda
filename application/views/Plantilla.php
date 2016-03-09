<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tienda</title>
        <link rel="icon" type="image/png" href="<?= base_url() ?>Assets/css/img/libro.png"/>
        <script src="<?=base_url() ?>Assets/js/funciones.js" language="JavaScript"></script>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>Assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?= base_url() ?>Assets/js/jquery2.min.js"></script>
        <!-- Custom CSS -->
        <link href="<?= base_url() ?>Assets/css/heroic-features.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url() ?>">Inicio</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">About</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>      
                        <li>
                            <a href="#">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </a>
                        </li>
                        <?php if ($this->session->userdata('username')): ?>
                            <li>
                                <a href="<?= base_url() . 'index.php/Usuarios_ci/mostrar' ?>"><img src="<?= base_url() ?>Assets/img/user.png"></a>
                            </li>

                            <li>  <a href="<?= base_url() . 'index.php/Usuarios_ci/mostrar' ?>"><?= $this->session->userdata('username') ?></a></li>
                        <?php else: ?>
                            <li>  <a href="<?= base_url() . 'index.php/Login/' ?>">Identificate</a></li>                                                                 
                        <?php endif; ?>  
                        <li>
                            <a href="<?= base_url() . 'index.php/Compras/micarro/' ?>"> <img src="<?= base_url() ?>Assets/img/carrito.png">
                                </li>
                                <li>
                                    Ver carrito!</a>
                        </li>
                        <?php if ($this->session->userdata('username')): ?>
                            <li>
                                <a href="<?= base_url() . 'index.php/Compras/pedidos/' ?>"> <img src="<?= base_url() ?>Assets/img/pedido.png">
                                    </li>
                                    <li>
                                        Ver Pedidos</a>
                            </li>
                        <?php endif; ?>

                        <?php if ($this->session->userdata('username') == 'serujio@serujio.com'): ?>
                            <li>                            
                                <a href="<?= base_url() . 'index.php/scaffolding/' ?>">Panel de control</a>
                            </li>
                        <?php endif; ?>  
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="container">

            <!-- Jumbotron Header -->
            <header class="jumbotron hero-spacer">
                <h1>Bienvenido!</h1>
                <p>Tan solo por la educación puede el hombre llegar a ser hombre. El hombre no es más que lo que la educación hace de él.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Immanuel Kant.</p>
                <p><a class="btn btn-primary btn-large" id="des">Ver catálogo!</a>
                </p> 

                <script type="text/javascript">
                    $("#des").click(function () {
                        var posicion = $("#aqui").offset().top;
                        $("html, body").animate({scrollTop: posicion});
                    });
                </script>
            </header>

            <hr>

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active" align="center">
                        <img width="250" height="150" src="<?= base_url() ?>Assets/img/c1/amos_del_mundo.jpg" alt="Chania">
                    </div>

                    <div class="item" align="center">
                        <img width="250" height="150" src="<?= base_url() ?>Assets/img/c1/contra_la_ceguera.jpg" alt="Chania">
                    </div>

                    <div class="item" align="center">
                        <img  width="250" height="150" src="<?= base_url() ?>Assets/img/c1/hombres_buenos.jpg" alt="Flower">
                    </div>

                    <div class="item" align="center">
                        <img  width="250" height="150" src="<?= base_url() ?>Assets/img/c1/espana.jpg" alt="Flower">
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>           
            <!-- calendarios -->
            <hr>
    
            <span id="aqui">
                <!-- AQUI VA EL CUERPO CON PHP -->
                <?php
                if (isset($cuerpo)) {
                    echo $cuerpo;
                } else {
                    echo 'array vacio';
                }
                ?>
            </span>

            <hr>
            <!-- PAGINACION -->
            <center><a class="btn btn-primary btn-large" id="arri">Volver Arriba!</a>                

                <script type="text/javascript">
                    $("#arri").click(function () {
                        $('body,html').animate({scrollTop: 0}, 500);
                    });
                </script>
                <hr>

                <!-- Footer -->
                <footer>
                    <div class="row">
                        <div class="col-lg-12">
                            <center><p>Copyright &copy; Carrasco Domingo 2016</p></center>
                        </div>
                    </div>
                </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="<?= base_url() ?>Assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() ?>Assets/js/bootstrap.min.js"></script>

    </body>

</html>
