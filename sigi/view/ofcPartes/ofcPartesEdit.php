

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Verificar PDF</h4>
      </div>
      <div class="modal-body" id="modal-pdf-body">
      	<div>
      	  <button id="prev">Previous</button>
      	  <button id="next">Next</button>
      	  &nbsp; &nbsp;
      	  <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
      	</div>
        <canvas id="the-canvas" style="width: 100%;"></canvas>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<h1 class="page-header">Oficialia de Partes</h1>
<form name="recepciones" method="post" action="?c=OfcPartes&a=Guardar" role="form" enctype="multipart/form-data">
<div class="panel panel-default">
	<div class="panel-heading"><h4>Registro de Documentos</h4>
		<p>
		    <button type="submit" id="recepciones_save" name="recepciones[save]" class="btn btn-success">Crear Registro</button>
		</p>
	</div>
	<div class="panel-body">
		<?php
			if($result != ''){
				echo $result;
			} 
		?>
		
			<div class="row">
				<div class="col-md-6">
		            <div class="form-group">
		                <label for="recepciones_nombreEmisor" class="required">Origen</label>
		                <select class="form-control" name="origen" id="select_origen" >
		                  <option value="2">Externo</option>
		                  <option value="1">Interno</option>
		                </select>
		                <span class="text-danger"></span>
		            </div>
					
		            <div id="formExterno">
			            <div class="form-group">
			                <label for="recepciones_nombreEmisor" class="required" id="lbl_nombre_emisor">Nombre Titular:</label>
			                <input type="text" id="nombre_emisor" name="nombre_emisor"  maxlength="50" class="form-control" placeholder="Nombre del Titular del Oficio" />
			                <span class="text-danger"></span>
			            </div>
			            
					    <div class="form-group" id="box_cargo">
					        <label for="recepciones_institucionEmisor" class="required">Cargo titular:</label>
					        <input type="text" id="cargo_emisor" name="cargo_emisor"  maxlength="50" class="form-control" placeholder="Nombre del cargo del Titular" />
					        <span class="text-danger"></span>
					    </div>

					    <div class="form-group">
					        <label for="recepciones_institucionEmisor" id="lbl_institucion_emisor" class="required">Institucion titular:</label>
					        <input type="text" id="institucion_emisor" name="institucion_emisor"  maxlength="50" class="form-control" placeholder="Institucion del Titular" />
					        <span class="text-danger"></span>
					    </div>
		            </div>

		            <div id="formInterno" style="display: none;">
		    		    <div class="form-group">
		    		        <label for="" class="required">Area Origen:</label>
		    		        <select class="form-control" name="area_origen" id="area_origen">
		        			    <option value="">Selecccionar Area de Destino</option>
		    		        	<?php foreach($data['areas'] as $area): ?>
		        			        <option value="<?php echo $area->id; ?>"><?php echo $area->nombre; ?></option>
		    		        	<?php endforeach; ?>		          
		                    </select>
		    		        <span class="text-danger"></span>
		    		    </div>

					    <div class="form-group">
					        <label for="recepciones_institucionEmisor" class="required">Usuario Origen:</label>
					        <input type="text" id="usuario_origen" name="usuario_origen" readonly="" required="required" maxlength="50" class="form-control" placeholder="Usuario Destino" />
					        <input type="hidden" id="id_usuario_origen" name="id_usuario_origen">
					        <span class="text-danger"></span>
					    </div>
		            </div>


				    <div class="form-group">
				        <label for="" class="required">Area Destino:</label>
				        <select class="form-control" id="area_destino" name="area_destino">
		    			    <option value="">Selecccionar Area de Destino</option>
				        	<?php foreach($data['areas'] as $area): ?>
		    			        <option value="<?php echo $area->id; ?>"><?php echo $area->nombre; ?></option>
				        	<?php endforeach; ?>		          
		                </select>
				        <span class="text-danger"></span>
				    </div>

				    <div class="form-group">
				        <label for="recepciones_institucionEmisor" class="required">Usuario Destino:</label>
				        <input type="text" id="usuario_receptor" name="usuario_receptor" readonly="" required="required" maxlength="50" class="form-control" placeholder="Usuario Destino" />
				        <input type="hidden" id="id_usuario_receptor" name="id_usuario_receptor">
				        <span class="text-danger"></span>
				    </div>
				</div>
				<div class="col-md-6">					
				    <div class="form-group">
				      <img src="/admin/image/pdf.jpg" class="img-responsive" alt="Responsive image" style="margin-left:auto;margin-right: auto; width: 108px;height: 108px; ">
				    </div>
				    <div class="form-group" style="text-align: center; ">
				      <span class="btn btn-default btn-file"><span>Seleccionar Archivo</span><input type="file" accept="application/pdf" name="archivo" id="documento_iepc" required="required" /></span>
				      <!-- <span class="fileinput-filename"></span><span class="fileinput-new">No se eligió archivo</span>
				      <button id="verPdf" type="button" class="btn btn-default" data-dismiss="modal">Ver</button> -->
				      <!-- <p class="help-block">Example block-level help text here.</p> -->
				    </div>
				    <div class="form-group" style="text-align: center;">
				    	<span class="fileinput-filename"></span><span class="fileinput-new">No se eligió archivo</span>
				    	
				    </div>
				    <div class="form-group" style="text-align: center;">
				    	<button id="verPdf" type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">Ver</button>
				    </div>
				    <div class="form-group">
				      <label for="exampleInputFile">Asunto:</label>			      
				      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
				      <textarea class="form-control" rows="5" name="asunto_oficio" id="asunto_oficio" placeholder="Asunto del Oficio"></textarea>
				    </div>
					
				</div>

				<div class="col-md-12">
				    <div class="form-group">
				    	<div class="radio"  >
				    	  <label>
				    	    <input type="radio" name="respuesta" id="respuesta" value="0" checked>
				    	    Para su Conocimiento y Archivo
				    	  </label>
				    	</div>

				    	<div class="radio"  >
				    	  <label>
				    	    <input type="radio" name="respuesta" id="respuesta" value="1" checked>
				    	    	Para el tramite que corresponda	
				    	  </label>
				    	</div>

				    	<div class="checkbox"  >
				    	  <label>
				    	    <input type="checkbox" id="ccp">
				    	   	Para acuerdo con:
				    	  </label>
				    	</div>

				        <!-- <input type="radio" name="respuesta" value="1" checked> Para su Conocimiento y Archivo<br>
			            <input type="radio" name="respuesta" value="1"> Para el tramite que corresponda<br>
			            <input type="checkbox" name="ccp" value="1"> Para acuerdo con:	 -->
				        <!-- <span class="text-danger"></span> -->
				    </div>
				    <div class="form-group" id="lista_usuarios" style="display: none">
				    	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			    	        <thead>
			    	            <tr>
			    	            	<th></th>
			    	            	<th></th>
			    	                <th>Nombre</th>
			    	                <th>Email</th>
			    	                <th>Area</th>
			    	            </tr>
			    	        </thead>
			    	        <tbody>
			    	        	<?php foreach($data['usuarios'] as $u): ?>
			    	        	    <tr>
			    	        	    	<td></td>
			    	        	    	<td style="text-align: center;"><input type="checkbox" id="row-1-age" name="check_list_user[]" value="<?php echo $u->id_usuario; ?>"></td>
			    	        	        <td><?php echo $u->nombre_usuario." ".$u->apellido_usuario; ?></td>
			    	        	        <td><?php echo $u->email; ?></td>
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
</form>