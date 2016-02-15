           
            <?=form_open(base_url()."Usuario/Usuarioprocess_update/id/".$uri_segment_index)?>
            <table>
            <tr>
    <td><label for='. idusuario .' class='sr-only'>idusuario</label></td>
    <td><?php echo form_input($field['idusuario']); ?></td>
</tr>
<tr>
    <td><label for='. provincia .' class='sr-only'>provincia</label></td>
    <td><?php echo form_input($field['provincia']); ?></td>
</tr>
<tr>
    <td><label for='. username .' class='sr-only'>username</label></td>
    <td><?php echo form_input($field['username']); ?></td>
</tr>
<tr>
    <td><label for='. password .' class='sr-only'>password</label></td>
    <td><?php echo form_input($field['password']); ?></td>
</tr>
<tr>
    <td><label for='. dni .' class='sr-only'>dni</label></td>
    <td><?php echo form_input($field['dni']); ?></td>
</tr>
<tr>
    <td><label for='. email .' class='sr-only'>email</label></td>
    <td><?php echo form_input($field['email']); ?></td>
</tr>
<tr>
    <td><label for='. nombre .' class='sr-only'>nombre</label></td>
    <td><?php echo form_input($field['nombre']); ?></td>
</tr>
<tr>
    <td><label for='. apellidos .' class='sr-only'>apellidos</label></td>
    <td><?php echo form_input($field['apellidos']); ?></td>
</tr>
<tr>
    <td><label for='. direccion .' class='sr-only'>direccion</label></td>
    <td><?php echo form_input($field['direccion']); ?></td>
</tr>
<tr>
    <td><label for='. cp .' class='sr-only'>cp</label></td>
    <td><?php echo form_input($field['cp']); ?></td>
</tr>
<tr>
    <td><label for='. estado .' class='sr-only'>estado</label></td>
    <td><?php echo form_input($field['estado']); ?></td>
</tr>

            </table>
            <?=form_submit("submit", "Update")?>