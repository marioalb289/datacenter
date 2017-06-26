<div>
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



	<h1 class="page-header">Responder Oficio <?php echo $data['oficio']->origen ?></h1>
	<form name="recepciones" method="post" action="" role="form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-4"><h4><strong>Folio: <?php echo $data['oficio']->folio ?></strong></h4></div>
					<div class="col-md-8 text-right">
						<button style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" id="btn_guardar_oficio" name="btn_guardar_oficio" class="btn btn-primary" name="btn_enviar">Enviar</button>
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
						    <input type="hidden" name="origen" value = "<?php echo $data['oficio']->origen ?>">
							<input type="hidden" name="id_oficio" value = "<?php echo $data['oficio']->id_oficio;?>">
						</div>

						<?php 	if($data['oficio']->origen == "INTERNO") { ?>
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
						<?php }	if($data['oficio']->origen == "EXTERNO" || $data['oficio']->destino == "EXTERNO") {?>
						<div id="formExterno">

							<div class="form-group">
							    <label ><?php if($data['oficio']->destino == "EXTERNO") echo "Nombre Destino:"; else echo "Nombre de quien Suscribe:" ?></label>
							    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->nombre_emisor; ?>" />
							    <span class="text-danger"></span>
							</div>



							<div class="form-group">
							   <label for="recepciones_nombreEmisor" class="required"><?php if($data['oficio']->destino == "EXTERNO") echo "Institución	Destino:"; else echo "Institución:" ?></label>
							    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->cargo; ?>" />
							    <span class="text-danger"></span>
							</div>

							<div class="form-group">
							   <label for="recepciones_nombreEmisor" class="required">Institución:</label>
							    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->institucion_emisor; ?>" />
							    <span class="text-danger"></span>
							</div>
						</div>

						<?php } ?>
						

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

						<?php if($data['oficio']->folio_iepc != '') { ?>
					    <div class="form-group" id="box_cargo">
					        <label for="recepciones_institucionEmisor" class="required">Número de Oficio:</label>
					        <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php echo $data['oficio']->folio_iepc; ?>" />
					        <span class="text-danger"></span>
					    </div>
					    <?php } ?>

					    <div class="form-group">
							   <label for="recepciones_nombreEmisor" class="required">Comentarios:</label>
							    <textarea type="text" id="usuario_receptor" readonly="" class="form-control input-sm" ><?php  echo $data['oficio']->comentarios; ?></textarea>
							    <span class="text-danger"></span>
						</div>


						<div class="form-group">
							   <label for="recepciones_nombreEmisor" class="required">Asunto Emisor:</label>
							    <textarea type="text" id="usuario_receptor" readonly="" class="form-control input-sm" ><?php  echo $data['oficio']->asunto_emisor; ?></textarea>
							    <span class="text-danger"></span>
						</div>
						
					</div>


					<div class="col-md-6">					
					    
					    <div class="form-group has-feedback" id="box_num_oficio" >
					        <label for="recepciones_institucionEmisor" class="required">Número de Oficio:</label>
					        <input type="text" id="folio_iepc" name="folio_iepc"  maxlength="20" class="form-control input-sm" placeholder="Número de Oficio"  data-validacion-tipo="min:3" value="S/N"/>
					        <span class="text-danger"></span>
					    </div>
					    
					    <!-- <div class="form-group">
					        <label for="institucion_emisor" id="lbl_institucion_emisor" class="required">Número de Oficio:</label>
					        <div class="row">
			        	        <div class="col-md-8">
			        	        	<input type="text" id="folio_iepc" name="folio_iepc"  maxlength="50" class="form-control input-sm" placeholder="Número de Oficio"  data-validacion-tipo="min:3" value="S/N"/>
			        	        </div>
			        	        <div class="col-md-4">
			        		        <div class="checkbox" style="margin-top: 0px;margin-bottom: 0px;"  >
			        		        	<label>
			        		        		<input type="checkbox" id="ofc_vinculado" name="ofc_vinculado" value="1">
			        		        		<strong>Oficio ya vinculado</strong>
			        		        	</label>
			        		        </div>
			        	        </div>
					        </div>
					        
					        <span class="text-danger"></span>
					    </div> -->
					    <div class="form-group">
					      <label for="exampleInputFile">Asunto:</label><span style="font-size: 9px;"> Máximo 50 carácteres</span>				      
					      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
					      <textarea class="form-control input-sm"  name="asunto_oficio" id="asunto_oficio" placeholder="Asunto del Oficio" maxlength="50" style="height: 100px;" data-validacion-tipo="alfa-numerico|requerido|min:10"></textarea>
					    </div>

					    <div class="form-group">
					      <label for="exampleInputFile">Comentarios:</label><span style="font-size: 9px;"> Máximo 255 carácteres</span>				      
					      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
					      <textarea class="form-control input-sm"  name="comentarios" id="comentarios" placeholder="Asunto del Oficio" maxlength="255" style="height: 100px;" data-validacion-tipo="alfa-numerico"></textarea>
					    </div>
					    <div class="form-group" style="text-align: center;">
					    	<div class="checkbox" style="margin-top: 0px;margin-bottom: 0px;"  >
					    		<label>
					    			<input type="checkbox" id="ofc_vinculado" name="ofc_vinculado" value="1">
					    			<strong>Oficio ya vinculado</strong>
					    		</label>
					    	</div>
					    </div>

						<div id="cargar_archivo">
						    <div class="form-group" >
						    
						      <img src="AI/image/pdf.jpg" class="img-responsive" alt="Responsive image" style="margin-left:auto;margin-right: auto; height: 82px; ">
						    </div>
						    <div class="form-group"  style="text-align: center; ">
						      <span class="btn btn-default btn-file"><span>Seleccionar Archivo</span><input type="file" accept="application/pdf" name="archivo" id="documento_iepc" required /></span>
						      <button id="verPdf" type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">Visualizar</button>
						    </div>
						    <div class="form-group"  style="text-align: center;">
						    	<span class="fileinput-filename"></span><span class="fileinput-new" style="font-weight: 700;">No se eligió archivo</span>
						    	
						    </div>							
						</div>
						
					</div>

					<!-- <div class="col-md-12">
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
			        </div> -->
			        

			    </div>
			</div>
		</div>
	</div>
	</form>
	
</div>

<script>
	$(document).ready(function (){
		$( "#btn_regresar" ).click(function() {
	    	window.history.go(-1);
	    });
			/*Evento para deshabilitar la carga de archivos*/
		    $('#ofc_vinculado').change(function () {
		        if ($(this).is(':checked')) {
		            //Mostrar lista de usuarios
		            $('#cargar_archivo').hide();
		            $("#documento_iepc").prop('required', false);
		            $("#documento_iepc").val('');
		            $(".fileinput-new").text('')
		        }
		        else{
		        	//No mostrar
		        	$('#cargar_archivo').show();
		        	$("#documento_iepc").prop('required', true);
		        	$(".fileinput-new").text('No se eligió archivo')
		        }
		     });

			//Evento para validar campos
			$("form").submit(function( event ) {
				var res = $(this).validate();
				console.log(res);
				if(res){

					var formData = new FormData($(this)[0]);

				    $.ajax({
				        url: '?c=OfcPartes&a=guardarRespuesta',
				        type: 'POST',
				        data: formData,
				        async: false,
				        success: function (data) {
				        	event.preventDefault();
				        	respuesta = JSON.parse(data); 
				        	console.log('aqui respuesta',respuesta);
				        	if(respuesta.success){
				        		socket.emit( 'notification', respuesta.notificacion );
				        		window.location.href = "sigi.php";
				        	}
				        	else{
				        		window.location.href = "sigi.php?c=OfcPartes&a=response";
				        	}
				        },
				        cache: false,
				        contentType: false,
				        processData: false
				    });

				}

				

			    event.preventDefault();
		    });
			$('.form-control').bind('blur', function () {
			    return $(this).validateBlur();
			});
			$('#folio_iepc').bind('blur', function () {
			    return $(this).validateNumOficio();
			});
			//Evento para visualizar pdf al crear registro
			$(function(){
				$("#verPdf").click(loadPreviews_click);
			})

			function loadPreviews_click(e) {
				$("#documento_iepc").each(function() {
					var $input = $(this);
					var files = this.files;
					console.log(files);
					if(files == undefined || files.length == 0) return;
		            //var files = files[0];            
		            
		            // FileReader support
		            //if (FileReader && files && files.length) {
		                  //console.log('aquiiiiiiiiiiiiiii');
		                  var fr = new FileReader();
		                  var extension = files[0].name.split('.').pop().toLowerCase();
		                  fr.onload = function(e) {
		                  	success = fileTypes.indexOf(extension) > -1;
		                  	if (success) {

		                  		PDFJS.getDocument(e.target.result).then(function(pdfDoc_) {
		                  			pdfDoc = pdfDoc_;
		                  			document.getElementById('page_count').textContent = pdfDoc.numPages;

		                        // Initial/first page rendering
		                        renderPage(pageNum);
		                    });
		                  	}

		                  }
		                  fr.onloadend = function(e) {
		                  	console.debug("Load End");
		                  }
		                  fr.readAsArrayBuffer(files[0]);
		             //}

		             
		         });
			}


		    var fileTypes = ['pdf'];  //acceptable file types
		    
		    $("input:file").change(function (evt) {
		      /*var parentEl = $("#modal-pdf-body");
		      console.log(parentEl);*/     
		      var tgt = evt.target || window.event.srcElement,
		      files = tgt.files;
		      console.log(files[0].name); 

		      $(".fileinput-new").text(files[0].name)
		      
		  });


		    var pdfDoc = null,
		    pageNum = 1,
		    pageRendering = false,
		    pageNumPending = null,
		    scale = 2,
		    canvas = document.getElementById('the-canvas');
		    ctx = canvas.getContext('2d');

		    /**
		     * Get page info from document, resize canvas accordingly, and render page.
		     * @param num Page number.
		     */
		     function renderPage(num) {
		     	pageRendering = true;
		      // Using promise to fetch the page
		      pdfDoc.getPage(num).then(function(page) {
		      	var viewport = page.getViewport(scale);
		      	canvas.height = viewport.height;
		      	canvas.width = viewport.width;

		        // Render PDF page into canvas context
		        var renderContext = {
		        	canvasContext: ctx,
		        	viewport: viewport
		        };
		        var renderTask = page.render(renderContext);

		        // Wait for rendering to finish
		        renderTask.promise.then(function() {
		        	console.log("termino de cargar");

		        	$('#myModal').modal({
		        		show:true,
		        		backdrop:'static',
		        	});
		        	pageRendering = false;
		        	if (pageNumPending !== null) {
		            // New page rendering is pending
		            renderPage(pageNumPending);
		            pageNumPending = null;
		        }
		    });
		    });

		      // Update page counters
		      document.getElementById('page_num').textContent = pageNum;
		  }

		    /**
		     * If another page rendering in progress, waits until the rendering is
		     * finised. Otherwise, executes rendering immediately.
		     */
		     function queueRenderPage(num) {
		     	if (pageRendering) {
		     		pageNumPending = num;
		     	} else {
		     		renderPage(num);
		     	}
		     }

		    /**
		     * Displays previous page.
		     */
		     function onPrevPage() {
		     	if (pageNum <= 1) {
		     		return;
		     	}
		     	pageNum--;
		     	queueRenderPage(pageNum);
		     }
		     document.getElementById('prev').addEventListener('click', onPrevPage);

		    /**
		     * Displays next page.
		     */
		     function onNextPage() {
		     	if (pageNum >= pdfDoc.numPages) {
		     		return;
		     	}
		     	pageNum++;
		     	queueRenderPage(pageNum);
		     }
		     document.getElementById('next').addEventListener('click', onNextPage);
	})
	
 </script>