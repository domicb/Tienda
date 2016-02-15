
    
    <div class="content"><a class="btn btn-primary" role="button" href="<?php echo base_url().'Producto/Producto_new/'; ?>">New</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>                
                    <tr>                       
                          <th>idproducto</th>
<th>categoria_idcategoria</th>
<th>nombre</th>
<th>cantidad</th>
<th>precio</th>
<th>descuento</th>
<th>imagen</th>
<th>iva</th>
<th>descripcion</th>
<th>anuncio</th>
<th>seleccion</th>
<th>mostrar</th>
<th>inicio</th>
<th>fin</th>

                              <th></th>
                              <th></th>
                    <tr>
                </thead>
                <tbody>
                    <?php if($dataLists!=null){ foreach($dataLists as $dataList) : ?> 
                    <tr>
                         <td><?php echo $dataList->idproducto; ?></td>
<td><?php echo $dataList->categoria_idcategoria; ?></td>
<td><?php echo $dataList->nombre; ?></td>
<td><?php echo $dataList->cantidad; ?></td>
<td><?php echo $dataList->precio; ?></td>
<td><?php echo $dataList->descuento; ?></td>
<td><?php echo $dataList->imagen; ?></td>
<td><?php echo $dataList->iva; ?></td>
<td><?php echo $dataList->descripcion; ?></td>
<td><?php echo $dataList->anuncio; ?></td>
<td><?php echo $dataList->seleccion; ?></td>
<td><?php echo $dataList->mostrar; ?></td>
<td><?php echo $dataList->inicio; ?></td>
<td><?php echo $dataList->fin; ?></td>

                        <td>                   
                            <a class="btn btn-warning" role="button" href="<?php echo base_url().'Producto/Producto_update/id/'.$dataList->id; ?>">Update</a>
                        </td>
                        <td>                   
                            <a class="btn btn-danger" role="button" href="<?php echo base_url().'Producto/Producto_delete/id/'.$dataList->id; ?>">Delete</a>
                        </td>
                    </tr>     
                    <?php endforeach; } ?>
                </tbody>        
            </table>
            <div class="pagination">
                <?php //echo pagination ?>
                <?=$this->pagination->create_links();?>		
            </div>
        </div>
    </div>