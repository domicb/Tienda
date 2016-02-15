
    
    <div class="content"><a class="btn btn-primary" role="button" href="<?php echo base_url().'Usuario/Usuario_new/'; ?>">New</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>                
                    <tr>                       
                          <th>idusuario</th>
<th>provincia</th>
<th>username</th>
<th>password</th>
<th>dni</th>
<th>email</th>
<th>nombre</th>
<th>apellidos</th>
<th>direccion</th>
<th>cp</th>
<th>estado</th>

                              <th></th>
                              <th></th>
                    <tr>
                </thead>
                <tbody>
                    <?php if($dataLists!=null){ foreach($dataLists as $dataList) : ?> 
                    <tr>
                         <td><?php echo $dataList->idusuario; ?></td>
<td><?php echo $dataList->provincia; ?></td>
<td><?php echo $dataList->username; ?></td>
<td><?php echo $dataList->password; ?></td>
<td><?php echo $dataList->dni; ?></td>
<td><?php echo $dataList->email; ?></td>
<td><?php echo $dataList->nombre; ?></td>
<td><?php echo $dataList->apellidos; ?></td>
<td><?php echo $dataList->direccion; ?></td>
<td><?php echo $dataList->cp; ?></td>
<td><?php echo $dataList->estado; ?></td>

                        <td>                   
                            <a class="btn btn-warning" role="button" href="<?php echo base_url().'Usuario/Usuario_update/id/'.$dataList->id; ?>">Update</a>
                        </td>
                        <td>                   
                            <a class="btn btn-danger" role="button" href="<?php echo base_url().'Usuario/Usuario_delete/id/'.$dataList->id; ?>">Delete</a>
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