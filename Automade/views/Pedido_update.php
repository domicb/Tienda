           
            <?=form_open(base_url()."Pedido/Pedidoprocess_update/id/".$uri_segment_index)?>
            <table>
            <tr>
    <td><label for='. idpedido .' class='sr-only'>idpedido</label></td>
    <td><?php echo form_input($field['idpedido']); ?></td>
</tr>
<tr>
    <td><label for='usuario_idusuario' class='sr-only'>usuario_idusuario</label></td>
    <td><?php echo form_dropdown('usuario_idusuario', $options_2['usuario_idusuario'], $data->usuario_idusuario); ?></td>
</tr>
<tr>
    <td><label for='. importe .' class='sr-only'>importe</label></td>
    <td><?php echo form_input($field['importe']); ?></td>
</tr>
<tr>
    <td><label for='. estado .' class='sr-only'>estado</label></td>
    <td><?php echo form_input($field['estado']); ?></td>
</tr>
<tr>
    <td><label for='. fecha .' class='sr-only'>fecha</label></td>
    <td><?php echo form_input($field['fecha']); ?></td>
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
    <td><label for='. cod_provincia .' class='sr-only'>cod_provincia</label></td>
    <td><?php echo form_input($field['cod_provincia']); ?></td>
</tr>
<tr>
    <td><label for='. nombre_persona .' class='sr-only'>nombre_persona</label></td>
    <td><?php echo form_input($field['nombre_persona']); ?></td>
</tr>
<tr>
    <td><label for='. apellidos_persona .' class='sr-only'>apellidos_persona</label></td>
    <td><?php echo form_input($field['apellidos_persona']); ?></td>
</tr>
<tr>
    <td><label for='. dni .' class='sr-only'>dni</label></td>
    <td><?php echo form_input($field['dni']); ?></td>
</tr>
<tr>
    <td><label for='. email .' class='sr-only'>email</label></td>
    <td><?php echo form_input($field['email']); ?></td>
</tr>

            </table>
            <?=form_submit("submit", "Update")?>