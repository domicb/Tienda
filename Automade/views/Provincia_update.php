           
            <?=form_open(base_url()."Provincia/Provinciaprocess_update/id/".$uri_segment_index)?>
            <table>
            <tr>
    <td><label for='. idprovincia .' class='sr-only'>idprovincia</label></td>
    <td><?php echo form_input($field['idprovincia']); ?></td>
</tr>
<tr>
    <td><label for='. nombre .' class='sr-only'>nombre</label></td>
    <td><?php echo form_input($field['nombre']); ?></td>
</tr>

            </table>
            <?=form_submit("submit", "Update")?>