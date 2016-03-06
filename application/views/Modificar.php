<div class="container">
            <center><h3>Modificando datos del usuario</h3></center>
    <div class="row">

        <div class="col-md-3">
            <?php echo form_open(base_url() . "index.php/Usuarios_ci/updateUsuario") ?>
            <table>
                <tr>
                    <td>
                       <label> Nombre:</label> 
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name" value="<?php echo set_value('name') ?>" />
                    </td>
                </tr>
            <input type="hidden" name="modificar" class="form-control" value="si" />
                                     
                <tr>
                    <td>
                       <label> Password:</label> 
                    </td>
                    <td>
                        <input type="password" class="form-control" name="password" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Apellidos:</label> 
                    </td>
                    <td>
                        <input type="text" name="ape" class="form-control" value="<?php echo set_value('ape') ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label> Direccion:</label> 
                    </td>
                    <td>
                        <input type="text" class="form-control" name="addres" alue="<?php echo set_value('addres') ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Código postal:</label> 
                    </td>
                    <td>
                        <input type="text" name="cp" class="form-control" alue="<?php echo set_value('cp') ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label> DNI:</label> 
                    </td>
                    <td>
                        <input type="text" name="dni" class="form-control" alue="<?php echo set_value('dni') ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                       <label> Provincia:</label> 
                    </td>
                    <td>
                        <select name="provincia" class="form-control">
                            <option></option>
                            <option value='alava'>Álava</option>
                            <option value='albacete'>Albacete</option>
                            <option value='alicante'>Alicante/Alacant</option>
                            <option value='almeria'>Almería</option>
                            <option value='asturias'>Asturias</option>
                            <option value='avila'>Ávila</option>
                            <option value='badajoz'>Badajoz</option>
                            <option value='barcelona'>Barcelona</option>
                            <option value='burgos'>Burgos</option>
                            <option value='caceres'>Cáceres</option>
                            <option value='cadiz'>Cádiz</option>
                            <option value='cantabria'>Cantabria</option>
                            <option value='castellon'>Castellón/Castelló</option>
                            <option value='ceuta'>Ceuta</option>
                            <option value='ciudadreal'>Ciudad Real</option>
                            <option value='cordoba'>Córdoba</option>
                            <option value='cuenca'>Cuenca</option>
                            <option value='girona'>Girona</option>
                            <option value='laspalmas'>Las Palmas</option>
                            <option value='granada'>Granada</option>
                            <option value='guadalajara'>Guadalajara</option>
                            <option value='guipuzcoa'>Guipúzcoa</option>
                            <option value='huelva'>Huelva</option>
                            <option value='huesca'>Huesca</option>
                            <option value='illesbalears'>Illes Balears</option>
                            <option value='jaen'>Jaén</option>
                            <option value='acoruña'>A Coruña</option>
                            <option value='larioja'>La Rioja</option>
                            <option value='leon'>León</option>
                            <option value='lleida'>Lleida</option>
                            <option value='lugo'>Lugo</option>
                            <option value='madrid'>Madrid</option>
                            <option value='malaga'>Málaga</option>
                            <option value='melilla'>Melilla</option>
                            <option value='murcia'>Murcia</option>
                            <option value='navarra'>Navarra</option>
                            <option value='ourense'>Ourense</option>
                            <option value='palencia'>Palencia</option>
                            <option value='pontevedra'>Pontevedra</option>
                            <option value='salamanca'>Salamanca</option>
                            <option value='segovia'>Segovia</option>
                            <option value='sevilla'>Sevilla</option>
                            <option value='soria'>Soria</option>
                            <option value='tarragona'>Tarragona</option>
                            <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                            <option value='teruel'>Teruel</option>
                            <option value='toledo'>Toledo</option>
                            <option value='valencia'>Valencia/Valéncia</option>
                            <option value='valladolid'>Valladolid</option>
                            <option value='vizcaya'>Vizcaya</option>
                            <option value='zamora'>Zamora</option>
                            <option value='zaragoza'>Zaragoza</option>

                        </select>
                    </td>
                </tr>

            </table><br>

        </div>
          <div class="col-md-6">
              <table class="table">
                    <thead> 
                        <tr><!--tabla de tareas-->                        
                            <td><b>Nombre</b></td>  
                            <td><b>Apellidos</b></td>
                            <td><b>Direcccion</b></td>  
                            <td><b>Codigo Postal</b></td>
                            <td><b>DNI</b></td>
                            <td><b>Provincia</b></td>
                        </tr>
                    <tbody>
                        
                 <tr>        
            <?php foreach ($usuarios as $usuario) :?>
               
               <td> <?php echo $usuario['nombre']; ?> </td>
               <td> <?php echo $usuario['apellidos']; ?> </td>
               <td> <?php echo $usuario['direccion']; ?> </td>
               <td> <?php echo $usuario['cp']; ?> </td>
               <td> <?php echo $usuario['dni']; ?> </td>
               <td> <?php echo $usuario['provincia']; ?> </td>
                
            <?php endforeach; ?>
               </tr>     
             </table>
        </div>
        <div class="col-md-3">   <font color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline"><?php echo validation_errors(); ?></font></div>
 
    </div>
                <center><a href="<?= site_url() . 'index.php/Productos/' ?>"><button type="button" class="btn btn-primary">Volver</button></a>
                <input type="submit" class="btn btn-success" value="Guardar" title="Guardar" /></center>
    <?php echo form_close() ?>
</div>