<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recuperar Contraseña</title>

     <link href="<?=base_url()?>Assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>Assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?=base_url()?>Assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="login"><?php if(isset($noen)){echo $noen;}?>
                <h3>Introduce la nueva contraseña</h3>
                <form class="form-signin" role="form" action="<?=base_url()?>index.php/Usuarios_ci/cambiar" method="POST">
                    <div class="text-center">
                        <img id="avatar" src="<?=base_url()?>Assets/img/nadie.png" alt="avatar">
                    </div><!-- hay que corregir el método oculto la id parece que no llega si nos fijamso noen si-->
                    <input type="hidden" name="id" class="form-control" value="<?php if(isset($id)){ echo $id;}?>" />
                    <input type="hidden" name="ale" class="form-control" value="<?php if(isset($ale)){ echo $ale;}?>" />
                    <input id="txtEmail" type="password" name="nueva" class="form-control" placeholder="contraseña">     
                    <input id="txtEmail" type="password" name="nueva1" class="form-control" placeholder="contraseña">   
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Restablecer contraseña</button>
                </form>
            </div>
        </div>
    </div>
    <div id="nebaris">
        <a href="<?=base_url()?>">Volver a inicio</a>   
    </div>
    <script src="<?=base_url()?>Assets/js/jquery.js"></script>
    <script src="<?=base_url()?>Assets/js/jquery.md5.min.js"></script>
     <script src="<?=base_url()?>Assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>Assets/js/script.js"></script>
</body>