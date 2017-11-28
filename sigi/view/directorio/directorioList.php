<div id="content" class="col-md-10 col-md-offset-1">
	<h1 class="page-header">Directorio de Usuarios</h1>
	<div class="panel panel-default">
	  <div class="panel-heading">
	  	<div class="row">
	  		<div class="col-md-4"><h4>Lista de Usuarios Registrados</h4></div>
	  		<div class="col-md-8 text-right">
	  		   <a style="width: 145px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" type="button" href='ofcpartes/nuevoUsuario' class="btn btn-primary" id="btn-anexar" role="button">Nuevo Usuario</a>
	  		</div>
	  	</div>
	  </div>
	  <div class="panel-body">
			<table id="usuarios_conf" class="table table-striped table-bordered" cellspacing="0" width="100%">
    	        <thead>
    	            <tr>
    	            	<th></th>
    	            	<th></th>
    	            	<th></th>
    	                <th>Nombre</th>
    	                <th>Area</th>
    	                <th>Correo</th>
    	                <th>Contraseña</th>
    	                <th>Editar</th>
    	            </tr>
    	        </thead>
    	        <tbody>
    	        	<?php foreach($data['usuarios'] as $u): ?>
    	        	   <tr>
							<td></td>
							<td class="usuario_select"><?php echo $u->id_usuario; ?></td>
							<td ><?php echo $u->titular; ?></td>
						    <td><?php echo ucwords(mb_strtolower($u->nombre_formal,'UTF-8')) ?></td>
						    <td><?php echo $u->area; ?></td>
						    <td><?php echo $u->email2; ?></td>
						    <td></td>
						    <td></td>
						</tr>
    	        	<?php endforeach; ?>
    	        </tbody>
	    	</table>
	  </div>
	</div>
</div>