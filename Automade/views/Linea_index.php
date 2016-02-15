
    
    <div class="content"><a class="btn btn-primary" role="button" href="<?php echo base_url().'Linea/Linea_new/'; ?>">New</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>                
                    <tr>                       
                          <th>idlinea</th>
<th>pedido_idpedido</th>
<th>iva</th>
<th>precio</th>
<th>cantidad</th>
<th>producto_idproducto</th>

                              <th></th>
                              <th></th>
                    <tr>
                </thead>
                <tbody>
                    <?php if($dataLists!=null){ foreach($dataLists as $dataList) : ?> 
                    <tr>
                         <td><?php echo $dataList->idlinea; ?></td>
<td><?php echo $dataList->pedido_idpedido; ?></td>
<td><?php echo $dataList->iva; ?></td>
<td><?php echo $dataList->precio; ?></td>
<td><?php echo $dataList->cantidad; ?></td>
<td><?php echo $dataList->producto_idproducto; ?></td>

                        <td>                   
                            <a class="btn btn-warning" role="button" href="<?php echo base_url().'Linea/Linea_update/id/'.$dataList->id; ?>">Update</a>
                        </td>
                        <td>                   
                            <a class="btn btn-danger" role="button" href="<?php echo base_url().'Linea/Linea_delete/id/'.$dataList->id; ?>">Delete</a>
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