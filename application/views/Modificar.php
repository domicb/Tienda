<center>
<fieldset>
	<legend>Modificando perfil</legend>
		<?php echo form_open(base_url()."index.php/Usuarios_ci/updateUsuario") ?>
			<table>
				<tr>
					<td>
						Nombre:
					</td>
					<td>
						<input type="text" class="form-control" name="name" value="<?php echo set_value('name') ?>" />
					</td>
				</tr>
				<tr><input type="hidden" name="modificar" class="form-control" value="si" />
					<td>
						Email:
					</td>
					<td>
						<input type="text" name="email" class="form-control" class="form-control" value="<?php echo set_value('email') ?>" />
					</td>
				</tr>
				<tr>
					<td>
						Usuario:
					</td>
					<td>
						<input type="text" name="username" class="form-control" value="<?php echo set_value('username') ?> "/>
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
					<td>
						<input type="password" class="form-control" name="password" />
					</td>
				</tr>
                                <tr>
					<td>
						Apellidos:
					</td>
					<td>
						<input type="text" name="ape" class="form-control" value="<?php echo set_value('ape') ?>"/>
					</td>
				</tr>
                                <tr>
					<td>
						Direccion:
					</td>
					<td>
						<input type="text" class="form-control" name="addres" alue="<?php echo set_value('addres') ?>"/>
					</td>
				</tr>
                                <tr>
					<td>
						Código postal:
					</td>
					<td>
						<input type="text" name="cp" class="form-control" alue="<?php echo set_value('cp') ?>"/>
					</td>
				</tr>
                                <tr>
					<td>
						DNI:
					</td>
					<td>
						<input type="text" name="dni" class="form-control" alue="<?php echo set_value('dni') ?>"/>
					</td>
				</tr>
				<tr>
				<td></td>
				<td>
					 <font color="red" style="font-weight: bold; font-size: 14px; text-decoration: underline"><?php echo validation_errors(); ?></font>
				</td>
			</tr>
				<tr>
					<td>
                                            
					</td>
					<td>
                                                 <a href="<?=site_url().'index.php/Productos/'?>"><button type="button" class="btn btn-primary">Volver</button></a>
						<input type="submit" class="btn btn-success" value="Registrarme" title="Registrarme" />
					</td>
				</tr>
			</table>
		<?php echo form_close() ?>
</fieldset>
</center>