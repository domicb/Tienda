
<center>
    <h3>Formulario de registro</h3></center>
<div class="row">

    <div class="col-md-4">
        <?php echo form_open(base_url() . "index.php/Envio_email/nuevo_usuario") ?>    

        <label>Nombre:</label>

        <input type="text" class="form-control" name="nom" value="<?php echo set_value('nom') ?>" />

        <input type="hidden" name="grabar" class="form-control" value="si" />

        <label>Email:</label>

        <input type="text" name="correo" class="form-control" class="form-control" value="<?php echo set_value('correo') ?>" />


        <label>Usuario:</label>

        <input type="text" name="nick" class="form-control" value="<?php echo set_value('nick') ?> "/>

        <label>Password:</label>

        <input type="password" class="form-control" name="pass" />

        <label>Apellidos:</label>

        <input type="text" name="ape" class="form-control" value="<?php echo set_value('ape') ?>"/>
    </div>

        <div class="col-md-4">
            <label>Direccion:</label>

            <input type="text" class="form-control" name="dir" value="<?php echo set_value('dir') ?>"/>

            <label>Código postal:</label>

            <input type="text" name="cp" class="form-control" value="<?php echo set_value('cp') ?>"/>

            <label> DNI:</label>

            <input type="text" name="dni" class="form-control" value="<?php echo set_value('dni') ?>"/>

            <label>Provincia:</label>

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

        </div>

    <div class="col-md-4">
        <font color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline"><?php echo validation_errors(); ?></font>
    </div>
 </div>
<br><br><center>
        <a href="<?= site_url() . 'index.php/Productos/' ?>"><button type="button" class="btn btn-primary">Volver</button></a>
        <input type="submit" class="btn btn-success" value="Registrarme" title="Registrarme" /></center>
    <?php echo form_close() ?>



