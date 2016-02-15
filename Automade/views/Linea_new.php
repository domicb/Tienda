    
            <?=form_open(base_url()."Linea/Lineaprocess_new/")?>
            <table>
             <tr>
    <td><label for='. idlinea .' class='sr-only'>idlinea</label></td>
    <td><?php echo form_input($field['idlinea']); ?></td>
</tr>
<tr>
    <td><label for='pedido_idpedido' class='sr-only'>pedido_idpedido</label></td>
    <td><?php echo form_dropdown('pedido_idpedido', $options_2['pedido_idpedido'], ''); ?></td>
</tr>
<tr>
    <td><label for='. iva .' class='sr-only'>iva</label></td>
    <td><?php echo form_input($field['iva']); ?></td>
</tr>
<tr>
    <td><label for='. precio .' class='sr-only'>precio</label></td>
    <td><?php echo form_input($field['precio']); ?></td>
</tr>
<tr>
    <td><label for='. cantidad .' class='sr-only'>cantidad</label></td>
    <td><?php echo form_input($field['cantidad']); ?></td>
</tr>
<tr>
    <td><label for='producto_idproducto' class='sr-only'>producto_idproducto</label></td>
    <td><?php echo form_dropdown('producto_idproducto', $options_6['producto_idproducto'], ''); ?></td>
</tr>

             </table>
            <?=form_submit("submit", "Create")?>