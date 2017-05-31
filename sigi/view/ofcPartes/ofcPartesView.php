

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
                <a style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='?c=OfcPartes&a=response&id=<?php echo $data['oficio']->id_oficio ?>' type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Reabrir Oficio</a>
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


<h1 class="page-header">Oficialia de Partes ver Detalle Oficio</h1>
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-4"><h4><strong>Folio : <?php echo $data['oficio']->folio ?></strong></h4></div>
			<div class="col-md-8 text-right">
				<?php if( ($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2) && $data['oficio']->tipo_oficio == "SOLICITUD" && $data['oficio']->id_usuario_emisor == $_SESSION['data_user']['id'] && $data['oficio']->ccp == 0 && $data['oficio']->estatus_final == 'Cerrado'){ ?>
				<a style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href="#warning" data-toggle="modal" type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Reabrir Oficio</a>
				<a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='#' type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Cancelar</a>
				<?php } elseif ( ($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2) && $data['oficio']->respuesta && $data['oficio']->id_usuario_receptor == $_SESSION['data_user']['id'] && $data['oficio']->ccp == 0 &&  $data['oficio']->respondido == 0 ){ ?>
				<a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" <?php if($data['oficio']->fecha_visto != '0000-00-00 00:00:00') {echo "href='?c=OfcPartes&a=response&id=".$data['oficio']->id_oficio."'";} else {echo "href='#warning2' data-toggle='modal'";} ?> type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Responder</a>
				<a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='#' type="button" class="btn btn-primary" name="btn-cancelar" id="btn-responder" role="button">Cancelar</a>
				<?php } ?>	
				<?php if ( ($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2) && $data['oficio']->tipo_oficio == 'SOLICITUD' && $data['oficio']->id_usuario_receptor == $_SESSION['data_user']['id'] && $data['oficio']->ccp == 0 &&  $data['oficio']->respondido == 0 ){  ?>
				<a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" <?php echo "href='?c=OfcPartes&a=vincular&id=".$data['oficio']->id_oficio."'"; ?> type="button" class="btn btn-primary" name="btn-cancelar" id="btn-vincular" role="button">Vincular</a>
				<?php } ?>	

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
					    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php echo $data['usuario_emisor']->nombre_usuario. ' '. $data['usuario_emisor']->apellido_usuario ; ?>" />
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
				    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php if(empty($data['usuario_receptor'])) {echo "";} else {echo $data['usuario_receptor']->nombre_usuario. ' '. $data['usuario_receptor']->apellido_usuario ;} ?>" />
				    <span class="text-danger"></span>
				</div>
				<?php } ?>
				
				
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
			      <a href='?c=OfcPartes&a=viewFile&id=<?php echo $data['oficio']->id_documento ?>&idofc=<?php  echo $data['oficio']->id_oficio?>' class='btn btn-default'  style="width: 100px;">Ver</a>
				  <a href='?c=OfcPartes&a=downloadFile&id=<?php echo $data['oficio']->id_documento ?>' class='btn btn-default' style="width: 100px;">Descargar</a>
			    </div>
			    <div class="form-group" style="text-align: center;">
			    	<span class="fileinput-filename"></span><span class="fileinput-new" style="font-weight: 700;"><?php echo $data['oficio']->doc_nombre ?></span>
			    	
			    </div>
			    <?php } ?>
				
			</div>

			<div class="col-md-12">
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

					<div class="checkbox"  >
						<label>
							<input type="checkbox" <?php if(!empty($data['usuarios'])) echo "checked" ?>  >
							<strong>Para acuerdo con:</strong>
						</label>
					</div>
				</div>
				<?php if(!empty($data['usuarios'])) { ?>
				<div class="form-group" id="lista_usuarios" >
					<table id="table_ccp" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Area</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data['usuarios'] as $u): ?>
								<tr>
									<td><?php echo $u->nombre_usuario." ".$u->apellido_usuario; ?></td>
									<td><?php echo $u->area; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php } ?>
			</div>
			<div class="col-md-12">
				
			</div>
		</div>
	</div>
</div>
<?php if(!empty($data['usuarios_turnar']) && $data['oficio']->estatus_final!= 'Cerrado' &&  $data['oficio']->tipo_oficio == 'SOLICITUD' && $data['oficio']->id_usuario_receptor == $_SESSION['data_user']['id']) { ?>
<form name="recepciones" method="post" action="?c=OfcPartes&a=Turnar" role="form" enctype="multipart/form-data">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-4"><h4><strong>Turnar a otros usuarios</strong></h4></div>
			<div class="col-md-8 text-right">
				<button style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" class="btn btn-primary" name="btn_turnar">Enviar</button>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">		

			<div class="col-md-12">
				<div class="form-group">
					
					<div class="form-group" id="lista_usuarios" >
						<input type="hidden" name="id_oficio" value = "<?php echo $data['oficio']->id_oficio ?>">
						<input type="hidden" name="id_documento" value = "<?php echo $data['oficio']->id_documento ?>">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
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
										<td style="text-align: center;"><input type="checkbox" id="row-1-age" name="check_list_user[]" value="<?php echo $u->id_usuario; ?>"></td>
										<td><?php echo $u->nombre_usuario." ".$u->apellido_usuario; ?></td>
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
			<div class="col-md-4"><h4><strong>Lista de Respuestas a este Oficio</strong></h4></div>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">		

			<div class="col-md-12">
				<div class="form-group">
					
					<div class="form-group" id="lista_usuarios" >
						<input type="hidden" name="id_oficio" value = "<?php echo $data['oficio']->id_oficio ?>">
						<input type="hidden" name="id_documento" value = "<?php echo $data['oficio']->id_documento ?>">
						<table id="lista_respuestas_recibidas" class="table table-bordered table-hover display compact" cellspacing="0" width="100%">
						  <thead>
						      <tr>
						      	<th></th>
						        <th>Folio</th>
						        <th>N° Oficio</th>
						        <th>Area</th>
						        <th>Persona que Responde</th>
						        <th>Asunto</th>
						        <th>Fecha Enviado</th>
						        <th>Visto</th>
						        <th></th>
						      </tr>
						  </thead>
						  <tbody>
								<?php foreach($data['respuestas_recibidas'] as $r): ?>
									<tr>
										<td><?php echo $r->id_oficio; ?></td>
										<td><?php echo $r->folio; ?></td>
										<td><?php echo $r->folio_institucion; ?></td>
										<td><?php echo $r->area; ?></td>
										<td><?php echo $r->persona_responde; ?></td>
										<td><?php echo $r->asunto_emisor; ?></td>
										<td><?php echo $r->fecha_recibido; ?></td>
										<td><?php echo $r->fecha_visto; ?></td>
										<td></td>
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