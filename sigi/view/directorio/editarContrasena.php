<div class="col-md-10 col-md-offset-1">
	<h1 class="page-header">Directorio de Usuarios</h1>
	<form name="recepciones" method="post" action="" role="form" enctype="multipart/form-data">
		<div class="panel panel-default">
		  <div class="panel-heading">
		  	<div class="row">
		  		<div class="col-md-4"><h4>Editar Contraseña</h4></div>
		  		<div class="col-md-8 text-right">
		  		    <input style="width: 150px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="submit" id="btn_guardar_usuario" name="btn_guardar_usuario" class="btn btn-primary" name="btn_guardar_usuario" value="Guardar" />
		  		</div>
		  	</div>
		  </div>
		  <div class="panel-body">
		  	
		  		<div class="form-group">
		  		    <label for="recepciones_nombreEmisor" class="required">Nombre Formal</label>
		  		    <input type="text" id="nombre_formal"  name="nombre_formal"  maxlength="50" class="form-control input-md" placeholder="Nombre Formal" value="<?php  echo $data['usuario']->nombre_formal; ?>" readonly />
		  		    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php  echo $data['usuario']->id_usuario; ?>">
		  		    <span class="text-danger"></span>
		  		</div>
		  		<div class="form-group">
		  		    <label for="recepciones_nombreEmisor" class="required">Contraseña</label>
		  		    <input type="password" id="password1" name="password1"  maxlength="50" class="form-control input-md" placeholder="Contraseña" data-validacion-tipo="alfa-numerico|requerido|min:5" value=""/>
		  		    <span class="text-danger"></span>
		  		</div>
		  		<div class="form-group">
		  		    <label for="recepciones_nombreEmisor" class="required">Confirmar Contraseña</label>
		  		    <input type="password" id="password2" name="password2"  maxlength="50" class="form-control input-md" placeholder="Repite Contraseña" data-validacion-tipo="alfa-numerico|requerido|min:5" value=""/>
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
    		    url: GLOBAL_PATH+"ofcpartes/guardarEditarContrasena",
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
	                      	window.location.href = GLOBAL_PATH+"ofcpartes/directorioList"
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