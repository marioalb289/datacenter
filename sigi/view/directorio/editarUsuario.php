<div class="col-md-10 col-md-offset-1">
	<h1 class="page-header">Directorio de Usuarios</h1>
	<form name="recepciones" method="post" action="" role="form" enctype="multipart/form-data">
		<div class="panel panel-default">
		  <div class="panel-heading">
		  	<div class="row">
		  		<div class="col-md-4"><h4>Editar Usuario</h4></div>
		  		<div class="col-md-8 text-right">
		  		    <input style="width: 150px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" id="btn_guardar_usuario" name="btn_guardar_usuario" class="btn btn-primary" name="btn_guardar_usuario" value="Guardar" />
		  		</div>
		  	</div>
		  </div>
		  <div class="panel-body">
		  	
		  		<div class="form-group">
		  		    <label for="recepciones_nombreEmisor" class="required">Nombre Formal</label>
		  		    <input type="text" id="nombre_formal" name="nombre_formal"  maxlength="50" class="form-control input-md" placeholder="Nombre Formal" data-validacion-tipo="alfa|requerido|min:5" value="<?php  echo $data['usuario']->nombre_formal; ?>"/>
		  		    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php  echo $data['usuario']->id_usuario; ?>">
		  		    <span class="text-danger"></span>
		  		</div>
		  		<div class="form-group">
		  		    <label for="recepciones_nombreEmisor" class="required">Correo</label>
			        <div class="row">
	        	        <div class="col-sm-12 col-md-12" style="display: inline-flex;">
	        	        	<input type="text" id="nombre" name="nombre"  class="form-control input-md" placeholder="" data-validacion-tipo="alfa-wws|requerido|min:3" value="<?php  echo $data['usuario']->nombre; ?>"/>
	        	        	<b style="padding-top: 10px;padding-left: 3px;padding-right: 3px;">.</b>
	        	        	<input type="text" id="apellido" name="apellido"  class="form-control input-md" placeholder="" data-validacion-tipo="alfa-wws|requerido|min:3" value="<?php  echo $data['usuario']->apellido; ?>"/>
	        	        	<b style="padding: 5px 5px">@iepcdurango.mx</b>
	        	        	
	        	        </div>

			        </div>
		  		    <span class="text-danger"></span>
		  		</div>
		  		<div class="form-group">
		  		    <label for="recepciones_nombreEmisor" class="required">Puesto</label>
		  		    <input type="text" id="puesto" name="puesto"  maxlength="50" class="form-control input-md" placeholder="Nombre Formal" data-validacion-tipo="alfa|requerido|min:5" value="<?php  echo $data['usuario']->puesto; ?>"/>
		  		    <span class="text-danger"></span>
		  		</div>
		  		<div class="form-group">
			        <label for="" class="required">Área </label>
			        <select class="form-control input-md selectpicker" data-live-search="true" id="area" name="area" data-validacion-tipo="requerido">
	    			    <option value="">Selecccionar Área</option>
			        	<?php foreach($data['areas'] as $area): ?>
	    			        <option value="<?php echo $area->id; ?>" <?php if($area->id == $data['usuario']->id_area) {echo "selected";} ?> ><?php echo $area->nombre; ?></option>
			        	<?php endforeach; ?>		          
	                </select>
			        <span class="text-danger"></span>
			    </div>
			    <div class="form-group">
			        <label for="" class="required">Titular </label>
			        <select class="form-control input-md" id="titular" name="titular" data-validacion-tipo="requerido">
	    			    <option value="1" <?php if($data['usuario']->titular) {echo "selected";} ?>>Si</option>
	    			    <option value="0"<?php if(!$data['usuario']->titular) {echo "selected";} ?>>No</option>	          
	                </select>
			        <span class="text-danger"></span>
			    </div>
			    <div class="form-group">
			        <label for="" class="required">Privilegios de Administración </label>
			        <select class="form-control input-md" id="privilegios" name="privilegios" data-validacion-tipo="requerido">
	    			    <option value="1" <?php if($data['usuario']->privilegios == 1) {echo "selected";} ?>>Administrador</option>
	    			    <option value="2" <?php if($data['usuario']->privilegios >= 2) {echo "selected";} ?>>Usuario</option>         
	                </select>
			        <span class="text-danger"></span>
			    </div>
			    <div class="form-group">
			        <label for="" class="required">Privilegios SIGI </label>
			        <select class="form-control input-md" id="priv_sigi" name="priv_sigi" data-validacion-tipo="requerido">
	    			    <option value="1" <?php if($data['usuario']->priv_sigi == 1) {echo "selected";} ?>>Oficialia</option>
	    			    <option value="2" <?php if($data['usuario']->priv_sigi == 2) {echo "selected";} ?>>Ejecutivo</option>         
	    			    <option value="3" <?php if($data['usuario']->priv_sigi == 3) {echo "selected";} ?>>Operativo</option>         
	    			    <option value="4" <?php if($data['usuario']->priv_sigi >= 4) {echo "selected";} ?>>Desactivado</option>         
	                </select>
			        <span class="text-danger"></span>
			    </div>

			    <div class="form-group">
			        <label for="" class="required">Estado </label>
			        <select class="form-control input-md" id="estado" name="estado" data-validacion-tipo="requerido">
	    			    <option value="1" <?php if($data['usuario']->estado == 1) {echo "selected";} ?>>Activo</option>
	    			    <option value="0"<?php if($data['usuario']->estado == 0) {echo "selected";} ?>>Desactivado</option>	          
	                </select>
			        <span class="text-danger"></span>
			    </div>
		  </div>
		</div>
		
	</form>
	
</div>
<script>
	$(document).ready(function(){      //Add this line (and it's closing line)
	    var currentDate = new Date();
	    var enviar = false;

	    $(this).setFolioOriginal($("#folio_iepc").val());

	    $( "#btn_regresar" ).click(function() {
	    	window.history.go(-1);
	    });

	    $('.form-control').bind('blur', function () {
	        return $(this).validateBlur();
	    });   

    	//Evento para validar campos y enviar notificaciones por sokect io
    	$("form").submit(function( event ) {

    		var res = $(this).validate();
    		if(res){

    			var formData = new FormData($(this)[0]);
				bootbox.confirm({
				    title: "Advertencia",
				    message: "¿Guardar datos del Usuario?",
				    buttons: {              
				        cancel: {
				            label: 'No',
				            className: 'btn-danger'
				        },
				        confirm: {
				            label: 'Si',
				            className: 'btn-success'
				        }
				    },
				    type: "warning",
				    callback: function (result) {
				        if(result){
				        	enviarSolicitud(formData);
				        }
				    }
				});

    		}
    	    event.preventDefault();
        });
        function enviarSolicitud(formData){
    		$.ajax({
    		    // url: '?c=OfcPartes&a=Guardar',
    		    url: GLOBAL_PATH+"ofcpartes/guardarUsuario",
    		    type: 'POST',
    		    data: formData,
    		    beforeSend: function(){
    		    	CustomLoadingShow("Guardando...");
    		    },
    		    success: function (data) {
    		    	// event.preventDefault();
    		    	
    		    	respuesta = JSON.parse(data); 
    		    	if(respuesta.success){
		    			CustomLoadingClose();
			    		bootbox.alert({ 
	                      title: "Atención",
	                      message: "Usuario guardado correctamente",
	                      type: "success",
	                      callback: function(){ 
	                      	// window.location.href = GLOBAL_PATH+"ofcpartes/index"
	                      }
	                    })	    		    		
    		    	}
    		    	else{
    		    		CustomLoadingClose();
    		    		bootbox.alert({ 
                          title: "Advertencia",
                          message: respuesta.msg_error,
                          type: "danger",
                          callback: function(){ 
                          	// window.location.href = GLOBAL_PATH+"ofcpartes/index";
                          }
                        })    		    		
    		    	}
    		    },
    		    cache: false,
    		    contentType: false,
    		    processData: false
    		});

    	}
    	

	});
</script>