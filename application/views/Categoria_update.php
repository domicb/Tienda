           
            <?=form_open(base_url()."Categoria/Categoriaprocess_update/id/".$uri_segment_index)?>
            <table>
            <tr>
    <td><label for='. idcategoria .' class='sr-only'>idcategoria</label></td>
    <td><?php echo form_input($field['idcategoria']); ?></td>
</tr>
<tr>
    <td><label for='. cod_categoria .' class='sr-only'>cod_categoria</label></td>
    <td><?php echo form_input($field['cod_categoria']); ?></td>
</tr>
<tr>
    <td><label for='. nombre .' class='sr-only'>nombre</label></td>
    <td><?php echo form_input($field['nombre']); ?></td>
</tr>
<tr>
    <td><label for='. descripcion .' class='sr-only'>descripcion</label></td>
    <td><?php echo form_input($field['descripcion']); ?></td>
</tr>
<tr>
    <td><label for='. anuncio .' class='sr-only'>anuncio</label></td>
    <td><?php echo form_input($field['anuncio']); ?></td>
</tr>

            </table>
            <?=form_submit("submit", "Update")?>