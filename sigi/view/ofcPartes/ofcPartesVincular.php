<div>
	<!-- Modal -->
<div class="modal fade" id="cancelar_solicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="glyphicon glyphicon-info-sign"></i> Advertencia</h1>
            </div>
            <div class="modal-body">
              <p>Al vincular un oficio se haran cambos en la solicitud que recibio. </p>
              <p>Los cambios no se pondrán deshacer. </p>
              <p><strong>¿Deseas continuar?</strong></p>
            </div>
            <div class="modal-footer">
            	<a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='#' type="button" class="btn btn-primary pull-left" name="btn-cancelar" id="btn-responder" data-dismiss="modal" role="button">No</a>
                <a style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='' type="button" class="btn btn-primary" name="btn-cancelar" id="btn-confirmar" role="button">Si</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->


	<h1 class="page-header">Vincular Oficio</h1>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-4"><h4><strong>Folio : <?php echo $data['oficio']->folio ?></strong></h4></div>
				<div class="col-md-8 text-right">
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
					    <input type="hidden" name="id_oficio" id="id_oficio" value = "<?php echo $data['oficio']->id_oficio;?>">
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

				    

				   
					
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-4"><h4><strong>Lista de Oficios</strong></h4></div>
			</div>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
              <table id="lista_oficios_destino_externo_vincular" class="table  table-bordered table-hover display dt-center " cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Folio</th>
                      <th>N° Oficio</th>
                      <th>Area</th>
                      <th>Usuario</th>
                      <th>Dependencia</th>
                      <th>Asunto</th>
                      <th>Estatus Inicial</th>
                      <th>Estatus Final</th>
                      <th>Fecha Recibido</th>
                      <th>Visto</th>
                      <th ></th>
                      <th ></th>
                    </tr>
                </thead>
              </table>
            </div>
		</div>
            
	</div>
</div>
<script>
	$(document).ready(function(){
		$( "#btn_regresar" ).click(function() {
	    	window.history.go(-1);
	    });
	})
</script>