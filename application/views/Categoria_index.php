
    
    <div class="content"><a class="btn btn-primary" role="button" href="<?php echo base_url().'Categoria/Categoria_new/'; ?>">New</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>                
                    <tr>                       
                          <th>idcategoria</th>
<th>cod_categoria</th>
<th>nombre</th>
<th>descripcion</th>
<th>anuncio</th>

                              <th></th>
                              <th></th>
                    <tr>
                </thead>
                <tbody>
                    <?php if($dataLists!=null){ foreach($dataLists as $dataList) : ?> 
                    <tr>
                         <td><?php echo $dataList->idcategoria; ?></td>
<td><?php echo $dataList->cod_categoria; ?></td>
<td><?php echo $dataList->nombre; ?></td>
<td><?php echo $dataList->descripcion; ?></td>
<td><?php echo $dataList->anuncio; ?></td>

                        <td>                   
                            <a class="btn btn-warning" role="button" href="<?php echo base_url().'Categoria/Categoria_update/id/'.$dataList->id; ?>">Update</a>
                        </td>
                        <td>                   
                            <a class="btn btn-danger" role="button" href="<?php echo base_url().'Categoria/Categoria_delete/id/'.$dataList->id; ?>">Delete</a>
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