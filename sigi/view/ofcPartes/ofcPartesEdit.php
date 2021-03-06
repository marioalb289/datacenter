

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



<h1 class="page-header">Oficialia de Partes ver Detalle Oficio <?php echo $data['oficio']->origen ?></h1>
<form name="recepciones" method="post" action="?c=OfcPartes&a=guardarRespuesta" role="form" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-4"><h4><strong>Folio de Oficio: <?php echo $data['oficio']->folio ?></strong></h4></div>
				<div class="col-md-8 text-right">
					<?php if($_SESSION['data_user']['privilegios'] == 3){ ?>
					<button style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" class="btn btn-primary" name="btn_enviar">Enviar</button>
					<button style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="button" class="btn btn-primary" name="btn-cancelar" id="btn-cancelar">Cancelar</button>
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
					    <input type="hidden" name="origen" value = "<?php echo $data['oficio']->origen ?>">
						<input type="hidden" name="id_oficio" value = "<?php echo $data['oficio']->id_oficio;?>">
					</div>

					<?php 	if($data['oficio']->origen == "EXTERNO") {?>
					<div id="formExterno">

						<div class="form-group">
						    <label >Nombre de quien Suscribe:</label>
						    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->nombre_emisor; ?>" />
						    <span class="text-danger"></span>
						</div>



						<div class="form-group">
						   <label for="recepciones_nombreEmisor" class="required">Cargo:</label>
						    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->cargo; ?>" />
						    <span class="text-danger"></span>
						</div>

						<div class="form-group">
						   <label for="recepciones_nombreEmisor" class="required">Institución:</label>
						    <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php  echo $data['oficio']->institucion_emisor; ?>" />
						    <span class="text-danger"></span>
						</div>
					</div>
					<?php 	} else { ?>
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
					<?php 	} ?>

					
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

					<?php if($data['oficio']->folio_iepc != '') { ?>
				    <div class="form-group" id="box_cargo">
				        <label for="recepciones_institucionEmisor" class="required">Folio Institucional:</label>
				        <input type="text" id="usuario_receptor" readonly="" class="form-control input-sm" value="<?php echo $data['oficio']->folio_iepc; ?>" />
				        <span class="text-danger"></span>
				    </div>
				    <?php } ?>


					<div class="form-group">
						   <label for="recepciones_nombreEmisor" class="required">Asunto Emisor:</label>
						    <textarea type="text" id="usuario_receptor" readonly="" class="form-control input-sm" ><?php  echo $data['oficio']->asunto_emisor; ?></textarea>
						    <span class="text-danger"></span>
						</div>
					
				</div>


				<div class="col-md-6">					
				    
				    <div class="form-group">
				      <label for="exampleInputFile">Asunto:</label>			      
				      <!-- <input type="file" name="archivo" id="documento_iepc" required="required"> -->
				      <textarea class="form-control input-sm"  name="asunto_oficio" id="asunto_oficio" placeholder="Asunto del Oficio" maxlength="50" style="height: 108px;"></textarea>
				    </div>

				    <?php if($data['privilegios'] == 3) { ?>
				    <div class="form-group" id="box_cargo">
				        <label for="recepciones_institucionEmisor" class="required">Folio Institucional:</label>
				        <input type="text" id="folio_iepc" name="folio_iepc"  maxlength="50" required class="form-control input-sm" placeholder="Folio Institucional" />
				        <span class="text-danger"></span>
				    </div>
				    <?php } ?>

				    <div class="form-group">
				    
				      <img src="AI/image/pdf.jpg" class="img-responsive" alt="Responsive image" style="margin-left:auto;margin-right: auto; height: 82px; ">
				    </div>
				    <div class="form-group" style="text-align: center; ">
				      <span class="btn btn-default btn-file"><span>Seleccionar Archivo</span><input type="file" accept="application/pdf" name="archivo" id="documento_iepc" required="required" /></span>
				      <button id="verPdf" type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">Visualizar</button>
				    </div>
				    <div class="form-group" style="text-align: center;">
				    	<span class="fileinput-filename"></span><span class="fileinput-new" style="font-weight: 700;">No se eligió archivo</span>
				    	
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
		        				<th>Area</th>
		        			</tr>
		        		</thead>
		        		<tbody>
		        			<?php foreach($data['usuarios'] as $u): ?>
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
</form>
<script>
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
 </script>