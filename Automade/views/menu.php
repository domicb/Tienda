<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="" class="navbar-brand">Name System</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">                
                <li class="dropdown">
                    <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Profile<span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">                        
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="#">View Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Sign out</a></li>
                    </ul>
                </li>
                <li><a href="#">Help</a></li>
            </ul>
            <?php search($active); ?>
        </div>
    </div><!--/.container-fluid -->
</nav>
      <div class="container-fluid">
          <div class="row">
          
          <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li id="categoria_dashboard" class="<?php if ($active == 'Categoria') { echo 'active'; } ?>"><a class="dark" href="<?php echo base_url(); ?>Categoria">Categoria</a></li> 
<li id="linea_dashboard" class="<?php if ($active == 'Linea') { echo 'active'; } ?>"><a class="dark" href="<?php echo base_url(); ?>Linea">Linea</a></li> 
<li id="pedido_dashboard" class="<?php if ($active == 'Pedido') { echo 'active'; } ?>"><a class="dark" href="<?php echo base_url(); ?>Pedido">Pedido</a></li> 
<li id="producto_dashboard" class="<?php if ($active == 'Producto') { echo 'active'; } ?>"><a class="dark" href="<?php echo base_url(); ?>Producto">Producto</a></li> 
<li id="provincia_dashboard" class="<?php if ($active == 'Provincia') { echo 'active'; } ?>"><a class="dark" href="<?php echo base_url(); ?>Provincia">Provincia</a></li> 
<li id="usuario_dashboard" class="<?php if ($active == 'Usuario') { echo 'active'; } ?>"><a class="dark" href="<?php echo base_url(); ?>Usuario">Usuario</a></li> 

          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-color: #ffffff">
            <h1 class="page-header" style="float:left"><?php echo $h1 ?></h1>
            <h2 class="sub-header"  style="float:left"><?php echo $h2 ?></h2>
            <div style="clear:both"></div>
            <?php echo error_boostrap(validation_errors("",""));  ?>   