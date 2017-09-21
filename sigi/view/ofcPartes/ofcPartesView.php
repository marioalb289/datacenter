

<!-- Modal -->
<div class="modal fade" id="warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="glyphicon glyphicon-exclamation-sign"></i> Advertencia</h1>
            </div>
            <div class="modal-body">
            	<p>Este oficio se encuentra en Estatus cerrado. Al responder se cambiara su estatus a abierto. </p>
            	<p><strong>¿Deseas continuar?</strong></p>
            </div>
            <div class="modal-footer">
            <a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='#' type="button" class="btn btn-primary pull-left" name="btn-cancelar" id="btn-responder" data-dismiss="modal" role="button">Cancelar</a>
                <a style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='ofcpartes/response/<?php echo $data['oficio']->id_oficio ?>' type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Reabrir Oficio</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="warning2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="glyphicon glyphicon-exclamation-sign"></i> Advertencia</h1>
            </div>
            <div class="modal-body">
            	<p>Aún no se ha revisado el documento adjunto a esta solicitud.</p>
            </div>
            <div class="modal-footer">
                <button type="button" style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<h1 class="page-header">Oficialía de Partes ver Detalle Oficio</h1>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-6">
					<h4 style="display: inline-block;"><strong>N° Oficio : </strong><?php echo $data['oficio']->folio_iepc ?> <strong>Estatus Final:</strong> </h4> 
					<?php if ($data['oficio']->estatus_final == "Cerrado") echo "<button type='button' class='btn btn-success btn-xs' style='width:70px;margin-top: -5px;'>Cerrado</button>";?>
					<?php if ($data['oficio']->estatus_final == "Abierto") echo "<button type='button' class='btn btn-warning btn-xs' style='width:70px;margin-top: -5px;'>Abierto</button>";?>
					<?php if ($data['oficio']->estatus_final == "Cancelado") echo "<button type='button' class='btn btn-danger btn-xs' style='width:70px;margin-top: -5px;'>Cancelado</button>";?>
					<?php if ($data['oficio']->estatus_final == "Revision") echo "<button type='button' class='btn btn-info btn-xs' style='width:70px;margin-top: -5px;'>Revisión</button>";?>
			</div>
			<div class="col-md-6 text-right">
				<?php if( ($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2) && $data['oficio']->tipo_oficio == "SOLICITUD" && $data['oficio']->id_usuario_emisor == $_SESSION['data_user']['id'] && $data['oficio']->ccp == 0 && $data['oficio']->estatus_final == 'Cerrado'){ ?>
				<a style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href="#warning" data-toggle="modal" type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Reabrir Oficio</a>
				
				<?php } elseif ( ($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2) && $data['oficio']->respuesta && $data['oficio']->id_usuario_receptor == $_SESSION['data_user']['id'] && $data['oficio']->ccp == 0 &&  $data['oficio']->respondido == 0 ){ ?>
				<a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" <?php if($data['oficio']->fecha_visto != '0000-00-00 00:00:00') {echo "href='ofcpartes/response/".$data['oficio']->id_oficio."'";} else {echo "href='#warning2' data-toggle='modal'";} ?> type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Responder</a>
				
				<?php } ?>	
				<?php if ( ($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2) && $data['oficio']->tipo_oficio == 'SOLICITUD' && $data['oficio']->id_usuario_receptor == $_SESSION['data_user']['id'] && $data['oficio']->ccp == 0 &&  $data['oficio']->respondido == 0 ){  ?>
				<a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" <?php echo "href='ofcpartes/vincular/".$data['oficio']->id_oficio."'"; ?> type="button" class="btn btn-primary" name="btn-cancelar" id="btn-vincular" role="button">Vincular</a>
				<?php } ?>	

				<?php if( $data['oficio']->id_usuario_emisor == $_SESSION['data_user']['id'] && $data['oficio']->tipo_oficio <> 'ALCANCE' ){ ?>
				<a style="width: 145px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" type="button" <?php  {echo "href='ofcpartes/anexar/".$data['oficio']->id_oficio."'";}	 ?> class="btn btn-primary" id="btn-anexar" role="button">Añadir Alcance</a>
				<?php } ?>	

				<?php if( $data['oficio']->tipo_oficio <> 'SOLICITUD' ){ ?>
				<a style="width: 145px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" type="button" <?php  {echo "href='ofcpartes/view/".$data['oficio']->parent_id."'";}	 ?> class="btn btn-primary" id="btn-anexar" role="button">Oficio Original</a>
				<?php } ?>	

				<button style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="button" class="btn btn-primary" id="btn_regresar">Regresar</button>

			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-6 ">
				

				<div class="form-group">
				    <label for="recepciones_nombreEmisor" class="required">Origen:</label>
				    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->origen; ?>" />
				    <span class="text-danger"></span>
				</div>
				<?php 	if ($data['oficio']->origen == "INTERNO") { ?>
				<div id="formInterno" >
					<div class="form-group">
					   <label for="recepciones_nombreEmisor" class="required">Área Origen:</label>
					    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['usuario_emisor']->area; ?>" />
					    <span class="text-danger"></span>
					</div>
					
					<div class="form-group">
					   <label for="recepciones_nombreEmisor" class="required">Usuario Origen:</label>
					    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php echo ucwords(mb_strtolower($data['usuario_emisor']->nombre_formal,'UTF-8')) ; ?>" />
					    <span class="text-danger"></span>
					</div>

				</div>
				
				<?php } 	if($data['oficio']->origen == "EXTERNO" || $data['oficio']->destino == "EXTERNO") {?>
				<div id="formExterno">

					<div class="form-group">
					    <label ><?php if($data['oficio']->destino == "EXTERNO") echo "Nombre Destino:"; else echo "Nombre de quien Suscribe:" ?></label>
					    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->nombre_emisor; ?>" />
					    <span class="text-danger"></span>
					</div>



					<div class="form-group">
					   <label for="recepciones_nombreEmisor" class="required">Cargo:</label>
					    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->cargo; ?>" />
					    <span class="text-danger"></span>
					</div>

					<div class="form-group">
					   <label for="recepciones_nombreEmisor" class="required"><?php if($data['oficio']->destino == "EXTERNO") echo "Institución	Destino:"; else echo "Institución:" ?></label>
					    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->institucion_emisor; ?>" />
					    <span class="text-danger"></span>
					</div>
					<?php if($data['oficio']->origen == "EXTERNO") { ?>
					<div class="form-group">
				        <label for="institucion_emisor" id="lbl_institucion_emisor" class="required">Fecha y Hora de Recepción:</label>
				        <div class="row">
		        	        <div class="col-md-6">
		        	        	<input type="date" id="fecha_recepcion" readonly name="fecha_recepcion"  class="form-control input-sm" placeholder="Fecha de Recepción" value="<?php echo $data['oficio']->fecha_recepcion ; ?>"/>
		        	        </div>
		        	        <div class="col-md-6">
		        		        <input type="time" id="hora_recepcion" readonly name="hora_recepcion"  class="form-control input-sm" placeholder="Fecha de Recepción" value="<?php echo $data['oficio']->hora_recepcion; ?>"/>
		        	        </div>
				        </div>
				        
				        <span class="text-danger"></span>
				    </div>
				    <?php } ?>
				</div>
				<?php 	} ?>

				<?php  if($data['oficio']->destino != "EXTERNO") { ?>
				<div class="form-group">
				   <label for="recepciones_nombreEmisor" class="required">Área Destino:</label>
				    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php if(empty($data['usuario_receptor'])) {echo "";} else {echo $data['usuario_receptor']->area;} ?>" />
				    <span class="text-danger"></span>
				</div>

				<div class="form-group">
				   <label for="recepciones_nombreEmisor" class="required">Usuario Destino:</label>
				    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php if(empty($data['usuario_receptor'])) {echo "";} else {echo ucwords(mb_strtolower($data['usuario_receptor']->nombre_formal,'UTF-8'));} ?>" />
				    <span class="text-danger"></span>
				</div>
				<?php } ?>

				
				<div class="form-group">
					<div class="radio"  >
						<label>
							<input type="radio" name="respuesta" id="respuesta" value="0" <?php if(!$data['oficio']->respuesta) echo "checked"?> disabled>
							Para su Conocimiento y Archivo
						</label>
					</div>

					<div class="radio"  >
						<label>
							<input type="radio" name="respuesta" id="respuesta" value="1" <?php if($data['oficio']->respuesta) echo "checked"?>  disabled>
							Para el tramite que corresponda	
						</label>
					</div>
				</div>
				
				
			</div>

			<div class="col-md-6">

				<?php if($data['oficio']->folio_iepc != '') { ?>
			    <div class="form-group" id="box_cargo">
			        <label for="recepciones_institucionEmisor" class="required">Número de Oficio:</label>
			        <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php echo $data['oficio']->folio_iepc; ?>" />
			        <span class="text-danger"></span>
			    </div>
			    <?php } ?>					
			    
			    <div class="form-group">
			      <label for="exampleInputFile">Asunto:</label>			      
			      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
			      <textarea class="form-control input-sm"  name="asunto_oficio" readonly placeholder="Asunto del Oficio" style="height: 100px;"><?php echo $data['oficio']->asunto_emisor ?></textarea>
			    </div>

			    <div class="form-group">
			      <label for="exampleInputFile">Comentarios:</label>			      
			      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
			      <textarea class="form-control input-sm"  name="comentarios" readonly placeholder="Asunto del Oficio" style="height: 100px;"><?php echo $data['oficio']->comentarios ?></textarea>
			    </div>

			    
				<?php if(!$data['oficio']->vinculado){ ?>
			    <div class="form-group">
			    
			      <img src="AI/image/pdf.jpg" class="img-responsive" alt="Responsive image" style="margin-left:auto;margin-right: auto; height: 82px; ">
			    </div>
			    <div class="form-group" style="text-align: center; ">
			      <a href='ofcpartes/viewFile/<?php echo $data['oficio']->id_documento ?>/<?php  echo $data['oficio']->id_oficio?>' class='btn btn-default'  style="width: 100px;">Ver</a>
				  <a href='ofcpartes/downloadFile/<?php echo $data['oficio']->id_documento ?>' class='btn btn-default' style="width: 100px;">Descargar</a>
			    </div>
			    <div class="form-group" style="text-align: center;">
			    	<span class="fileinput-filename"></span><span class="fileinput-new" style="font-weight: 700;"><?php echo $data['oficio']->doc_nombre ?></span>
			    	
			    </div>
			    <?php } ?>
				
			</div>
		</div>
	</div>
</div>
<?php if(!empty($data['usuarios'])) { ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-12"><h4><strong>Usuarios que recibierón copia</strong></h4></div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<table id="lista_usuarios_recibidos" class="table table-striped table-bordered no-select" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th>Nombre</th>
							<th>Area</th>
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
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if(!empty($data['usuarios_turnar']) && $data['oficio']->estatus_final!= 'Cerrado' &&  $data['oficio']->tipo_oficio == 'SOLICITUD' && ($data['oficio']->id_usuario_receptor == $_SESSION['data_user']['id'] || $data['oficio']->id_usuario_emisor == $_SESSION['data_user']['id'])) { ?>
<form name="recepciones" method="post" action="" role="form" enctype="multipart/form-data">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-4"><h4><strong>Seleccionar a otros usuarios que recibiran copia</strong></h4></div>
			<div class="col-md-8 text-right">
				<input style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" id="btn_enviar_oficio" name="btn_enviar_oficio" class="btn btn-primary" name="btn_busca" value="Enviar" />
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">		

			<div class="col-md-12">
				<div class="form-group">
					
					<div class="form-group" id="lista_usuarios" >
						<input type="hidden" name="id_oficio" id="id_oficio" value = "<?php echo $data['oficio']->id_oficio ?>">
						<input type="hidden" name="id_documento" value = "<?php echo $data['oficio']->id_documento ?>">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th></th>
									<th></th>
			    	            	<th></th>
			    	                <th>Nombre</th>
			    	                <th>Area</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($data['usuarios_turnar'] as $u): ?>
									<tr>
										<td></td>
										<td class="usuario_select"><?php echo $u->id_usuario; ?></td>
										<td ><?php echo $u->titular; ?></td>
									    <td><?php echo ucwords(mb_strtolower($u->nombre_formal,'UTF-8')) ?></td>
									    <td><?php echo $u->area; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<?php } ?>
<?php if(!empty($data['respuestas_recibidas']) ) { ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-4"><h4><strong>Seguimiento de Solicitud</strong></h4></div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">		

			<div class="col-md-12">
				<div class="form-group">
					
					<div class="form-group" id="lista_usuarios" >
						<input type="hidden" name="id_oficio" value = "<?php echo $data['oficio']->id_oficio ?>">
						<input type="hidden" name="id_documento" value = "<?php echo $data['oficio']->id_documento ?>">
						<table id="lista_respuestas_recibidas" class="table table-hover display" cellspacing="0" width="100%">
						  <thead>
						      <tr>
						      	<th></th>
						      	<th></th>
						        <th>N° Oficio</th>
						        <th><?php if($data['oficio']->destino == "EXTERNO")echo "Área Receptora"; else echo "Área";?></th>
						        <th><?php if($data['oficio']->destino == "EXTERNO")echo "Persona que Gestiona"; else echo "Persona que Responde";?></th>
						        <th>Asunto</th>
						        <th>Fecha Enviado</th>
						        <th>Visto</th>
						      </tr>
						  </thead>
						  <tbody>
								<?php foreach($data['respuestas_recibidas'] as $r): ?>
									<tr>
										<td class="dt-center"><span class='glyphicon glyphicon-envelope' aria-hidden='true' style='color:#00bcd4;font-size: 15px;'></span></td>
										<td><?php echo $r->id_oficio; ?></td>
										<td><?php echo $r->folio_institucion; ?></td>
										<td><?php echo $r->area; ?></td>
										<td><?php echo ucwords( $r->persona_responde); ?></td>
										<td><?php echo $r->asunto_emisor; ?></td>
										<td><?php echo $r->fecha_recibido; ?></td>
										<td><?php echo $r->fecha_visto; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<script>
	$(document).ready(function(){      //Add this line (and it's closing line)

	    $( "#btn_regresar" ).click(function() {
	    	window.history.go(-1);
	    });

	    $("form").submit(function( event ) {

			var formData = new FormData($(this)[0]);
			var arrCheck = [];
			var arrDelete = [];

			$('#example').DataTable().$('tr, td').each(function (){
				if($(this).hasClass('success-usuarios') == true){
					console.log($('#example').dataTable().fnGetData( this ));
					arrCheck.push(parseInt($('#example').dataTable().fnGetData( this )[1]));	    					
				}
			});

			var id_oficio = $("#id_oficio").val();


			formData.append('check', arrCheck);


		    $.ajax({
		        // url: '?c=OfcPartes&a=Guardar',
		        url: GLOBAL_PATH+"ofcpartes/turnar",
		        type: 'POST',
		        data: formData,
		        async: false,
		        success: function (data) {
		        	event.preventDefault();
		        	respuesta = JSON.parse(data); 
		        	console.log('aqui respuesta',respuesta);
		        	if(respuesta.success){
		        		socket.emit( 'notification', respuesta.notificacion );
		        		window.location.href = GLOBAL_PATH+"ofcpartes/view/"+id_oficio
		        	}
		        	else{
		        		window.location.href = GLOBAL_PATH+"ofcpartes/view/"+id_oficio;
		        	}
		        },
		        cache: false,
		        contentType: false,
		        processData: false
		    });   		

    	    // event.preventDefault();
        });
	})
</script>