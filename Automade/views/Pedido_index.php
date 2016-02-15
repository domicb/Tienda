
    
    <div class="content"><a class="btn btn-primary" role="button" href="<?php echo base_url().'Pedido/Pedido_new/'; ?>">New</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>                
                    <tr>                       
                          <th>idpedido</th>
<th>usuario_idusuario</th>
<th>importe</th>
<th>estado</th>
<th>fecha</th>
<th>direccion</th>
<th>cp</th>
<th>cod_provincia</th>
<th>nombre_persona</th>
<th>apellidos_persona</th>
<th>dni</th>
<th>email</th>

                              <th></th>
                              <th></th>
                    <tr>
                </thead>
                <tbody>
                    <?php if($dataLists!=null){ foreach($dataLists as $dataList) : ?> 
                    <tr>
                         <td><?php echo $dataList->idpedido; ?></td>
<td><?php echo $dataList->usuario_idusuario; ?></td>
<td><?php echo $dataList->importe; ?></td>
<td><?php echo $dataList->estado; ?></td>
<td><?php echo $dataList->fecha; ?></td>
<td><?php echo $dataList->direccion; ?></td>
<td><?php echo $dataList->cp; ?></td>
<td><?php echo $dataList->cod_provincia; ?></td>
<td><?php echo $dataList->nombre_persona; ?></td>
<td><?php echo $dataList->apellidos_persona; ?></td>
<td><?php echo $dataList->dni; ?></td>
<td><?php echo $dataList->email; ?></td>

                        <td>                   
                            <a class="btn btn-warning" role="button" href="<?php echo base_url().'Pedido/Pedido_update/id/'.$dataList->id; ?>">Update</a>
                        </td>
                        <td>                   
                            <a class="btn btn-danger" role="button" href="<?php echo base_url().'Pedido/Pedido_delete/id/'.$dataList->id; ?>">Delete</a>
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