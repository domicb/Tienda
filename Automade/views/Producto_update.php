           
            <?=form_open(base_url()."Producto/Productoprocess_update/id/".$uri_segment_index)?>
            <table>
            <tr>
    <td><label for='. idproducto .' class='sr-only'>idproducto</label></td>
    <td><?php echo form_input($field['idproducto']); ?></td>
</tr>
<tr>
    <td><label for='categoria_idcategoria' class='sr-only'>categoria_idcategoria</label></td>
    <td><?php echo form_dropdown('categoria_idcategoria', $options_2['categoria_idcategoria'], $data->categoria_idcategoria); ?></td>
</tr>
<tr>
    <td><label for='. nombre .' class='sr-only'>nombre</label></td>
    <td><?php echo form_input($field['nombre']); ?></td>
</tr>
<tr>
    <td><label for='. cantidad .' class='sr-only'>cantidad</label></td>
    <td><?php echo form_input($field['cantidad']); ?></td>
</tr>
<tr>
    <td><label for='. precio .' class='sr-only'>precio</label></td>
    <td><?php echo form_input($field['precio']); ?></td>
</tr>
<tr>
    <td><label for='. descuento .' class='sr-only'>descuento</label></td>
    <td><?php echo form_input($field['descuento']); ?></td>
</tr>
<tr>
    <td><label for='. imagen .' class='sr-only'>imagen</label></td>
    <td><?php echo form_input($field['imagen']); ?></td>
</tr>
<tr>
    <td><label for='. iva .' class='sr-only'>iva</label></td>
    <td><?php echo form_input($field['iva']); ?></td>
</tr>
<tr>
    <td><label for='. descripcion .' class='sr-only'>descripcion</label></td>
    <td><?php echo form_input($field['descripcion']); ?></td>
</tr>
<tr>
    <td><label for='. anuncio .' class='sr-only'>anuncio</label></td>
    <td><?php echo form_input($field['anuncio']); ?></td>
</tr>
<tr>
    <td><label for='. seleccion .' class='sr-only'>seleccion</label></td>
    <td><?php echo form_input($field['seleccion']); ?></td>
</tr>
<tr>
    <td><label for='. mostrar .' class='sr-only'>mostrar</label></td>
    <td><?php echo form_input($field['mostrar']); ?></td>
</tr>
<tr>
    <td><label for='. inicio .' class='sr-only'>inicio</label></td>
    <td><?php echo form_input($field['inicio']); ?></td>
</tr>
<tr>
    <td><label for='. fin .' class='sr-only'>fin</label></td>
    <td><?php echo form_input($field['fin']); ?></td>
</tr>

            </table>
            <?=form_submit("submit", "Update")?>