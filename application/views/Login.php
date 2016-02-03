<?php echo form_open('php/login'); ?>
<div class="Info">
    <p class="Titulo">Demo: ¿cómo hacer un login de usuarios en php?</p>
    <p>&nbsp;</p>    
</div>
<div id="LoginUsuarios">
    <div class="fila">
        <div class="LoginUsuariosCabecera">E-mail:</div>
        <div class="LoginUsuariosDato"><input type="text" name="maillogin" value="<?= set_value('maillogin'); ?>" size="25" /></div>
        <div class="LoginUsuariosError">
        <?php
        if(isset($error)){
            echo "<p>".$error."</p>";
        }
        echo form_error('maillogin');
        ?>
        </div>
    </div>        
    <div class="fila">
        <div class="LoginUsuariosCabecera">Contraseña:</div>
        <div class="LoginUsuariosDato"><input type="password" name="passwordlogin" value="<?= set_value('passwordlogin'); ?>" size="25" /></div>
        <div class="LoginUsuariosError"><?= form_error('passwordlogin');?></div>
    </div>
    <div class="fila">
        <div class="LoginUsuariosCabecera"></div>
        <div class="LoginUsuariosDato"></div>
    </div>        
    <div class="fila">
        <div class="LoginUsuariosCabecera"><input type="submit" value="Ingresar"></div>
        <div class="LoginUsuariosDato"></div>
    </div>        
</div>
<p>&nbsp;</p>    
<p>&nbsp;</p>    

<div class="Info">
   <p><a href="<?=base_url()?>">volver a página inicio</a></p>
</div>

