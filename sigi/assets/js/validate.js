/* Mensajes por defecto */
var _mensaje = {
    campo_obligatorio: 'Este campo es obligatorio',
    campo_numerico: 'Este campo no es numérico',
    campo_alfa: 'Este campo sólo debe contener letras',
    campo_alfa_numerico: 'Este campo sólo debe contener letras y números',
    folio_repetido: 'Este folio ya esta dado de alta en el Sistema',
    campo_correo: 'Este campo no es un correo',
    campo_longitud: 'Este campo debe tener una longitud de {0} caracteres',
    campo_min: 'Este campo debe tener como mínimo {0} caracteres',
    campo_max: 'Este campo debe tener como máximo {0} caracteres',
    campo_valido: 'Este campo no es válido',
    campo_ip: 'Este campo no es una IP válida',
    campo_url: 'Este campo no es una URL válida',
    campo_social_twitter: 'Este campo no es una URL válida de Twitter',
    campo_social_facebook: 'Este campo no es una URL válida de Facebook',
    campo_social_youtube: 'Este campo no es una URL válida de Youtube',
    error_procesar: 'Error al procesar la información',
};

var errores = 0;

jQuery.fn.validate = function ()
{
   

    var form = $(this);

    try {
        /* Cuenta los posibles errores encontrados */
        errores = 0;

        /* Los controles encontrados por nuestra Clase de CSS */
        var controles = $('[data-validacion-tipo]', form);
        var flagRadio = false;
        /* Comenzamos a validar cada control */
        $.each(controles, function () {
             // temp = $(this).attr('id');
             // if(temp == "respuesta" && !flagRadio){
             //    flagRadio = true;
             //     validarObjetoForm($(this));
             // }
             // else if(temp == "respuesta" && flagRadio){
             //    flagRadio = false;
             // }
             // else{
             //    validarObjetoForm($(this));
             // }
             validarObjetoForm($(this));
        })

        /* Verificamos si ha sido validado */
        return (errores == 0);
    } catch (e) {
        console.error(e);
        return false;
    }
}

function validarObjetoForm (control){


    /* El control actual del arreglo */
    var obj = control;
    


    /* No nos interesa validar controles con el estado readonly/disabled */
    if (!obj.prop('readonly') || !obj.prop('disabled'))
    {
        if (obj.data('validacion-tipo') != undefined) {
            /* El tipo de validacion asignado a este control */
            $.each(obj.data('validacion-tipo').split('|'), function (i, v) {

                /* El control donde vamos agregar el texto */
                var small = $('<small />');

                /* El contenedor del control */
                var form_group = obj.closest('.form-group');
                form_group.removeClass('has-error'); /* Limpiamos el estado de error */

                /* Capturamos el label donde queremos mostrar el mensaje */
                var label = form_group.find('label');
                label.find('small').remove(); /* Eliminamos el mensaje anterior */
                label.append(small);

                /* Validamos si es requerido */
                if (v == 'requerido') {
                    // console.log("aqui",obj.val());
                    // console.log("aqui",$(obj).attr('type'));
                    var radio = (typeof $(obj).attr('type') != 'undefined') ? $(obj).attr('type') : '';
                    if(radio == 'radio'){
                        var nameRadio = $(obj).attr("name");
                        var selector = "input[name="+nameRadio+"]";
                        if($(selector).is(':checked') == false){
                            /* Contamos que hay un error */
                            errores++;

                            /* Agregamos la clase de bootstrap de errores */
                            form_group.addClass('has-error');

                            /* Mostramos el mensaje */
                            if (obj.data('validacion-mensaje') == undefined) {
                                small.text(_mensaje.campo_obligatorio);
                            } else {
                                small.text(obj.data('validacion-mensaje'));
                            }

                            return false; /* Rompe el bucle */
                        }

                        
                    }  
                    else if (obj.val().length == 0) {

                        /* Contamos que hay un error */
                        errores++;

                        /* Agregamos la clase de bootstrap de errores */
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_obligatorio);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Validamos si es numérico */
                if (v == 'numero') {
                    if (!obj.val().match(/^([0-9])*[.]?[0-9]*$/) && obj.val().length > 0) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_numerico);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Validamos si es solo letras */
                if (v == 'alfa') {
                    if (!obj.val().match(/^[a-zA-Z \u00e1 \u00e9 \u00ed \u00f3 \u00fa \u00c1 \u00c9 \u00cd \u00d3 \u00da \u00f1 \u00d1]+$/i) && obj.val().length > 0) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_alfa);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Validamos si es solo letras y numeros */
                if (v == 'alfa-numerico') {
                    if (!obj.val().match(/^[a-zA-Z \n \u00e1 \u00e9 \u00ed \u00f3 \u00fa \u00c1 \u00c9 \u00cd \u00d3 \u00da \u00f1 \u00d1 0-9- .,() - /]+$/i) && obj.val().length > 0) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_alfa_numerico);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Validamos si es un email */
                if (v == 'email') {
                    if (!obj.val().match(/^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,4}$/i) && obj.val().length > 0) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_correo);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Longitud de caracteres a tener */
                if (v.indexOf('longitud') > -1 && obj.val().length > 0) {

                    // Necesitamos saber la longitud máxima
                    var _longitud = v.split(':');
                    if (obj.val().length != _longitud[1]) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_longitud.replace('{0}', _longitud[1]));
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Cantidad minima de caracteres */
                if (v.indexOf('min') > -1 && obj.val().length > 0) {

                    // Necesitamos saber la longitud máxima
                    var _min = v.split(':');
                    if (obj.val().length < _min[1]) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_min.replace('{0}', _min[1]));
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Cantidad maxima de caracteres */
                if (v.indexOf('max') > -1 && obj.val().length > 0) {

                    // Necesitamos saber la longitud máxima
                    var _min = v.split(':');
                    if (obj.val().length > _min[1]) {

                        errores++;
                        form_group.addClass('has-error');

                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_max.replace('{0}', _min[1]));
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Validación mediante una funcion personalizada */
                if (v.indexOf('funcion') > -1 && obj.val().length > 0) {

                    // Necesitamos saber la longitud máxima
                    var _funcion = v.split(':');

                    // Respuesta de la funcion
                    var _respuesta = false;

                    // Espera parámetros
                    if (_funcion.length >= 3) {
                        _respuesta = window[_funcion[1]].apply(this, _funcion[2].split(','));
                    } else {
                        _respuesta = window[_funcion[1]]();
                    }

                    /* Mostramos el mensaje */
                    if (!_respuesta || _respuesta == undefined) {

                        errores++;
                        form_group.addClass('has-error');

                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_valido);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false;
                    }
                }

                /* Válidamos una IP */
                if (v == 'ip') {
                    if (!obj.val().match(/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/) && obj.val().length > 0) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_ip);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Válidamos una URL válida */
                if (v == 'url') {
                    if (!obj.val().match(/^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/) && obj.val().length > 0) {

                        errores++;
                        form_group.addClass('has-error');

                        /* Mostramos el mensaje */
                        if (obj.data('validacion-mensaje') == undefined) {
                            small.text(_mensaje.campo_url);
                        } else {
                            small.text(obj.data('validacion-mensaje'));
                        }

                        return false; /* Rompe el bucle */
                    }
                }

                /* Comparamos con otro control */
                if (v.indexOf('compara') > -1 && obj.val().length > 0) {
                    var _comparacion = true;
                    var _aComparar = v.split(':');

                    $(_aComparar[1], form).each(function () {
                        if (obj.val() != $(this).val()) {

                            errores++;
                            form_group.addClass('has-error');

                            if (obj.data('validacion-mensaje') == undefined) {
                                small.text(_mensaje.campo_valido);
                            } else {
                                small.text(obj.data('validacion-mensaje'));
                            }
                        }
                    })
                }

            })
        }                
    }
    

}

jQuery.fn.validateBlur = function ()
{
    try {
        /* Cuenta los posibles errores encontrados */
        console.log("edit");
        errores = 0;

        /* Comenzamos a validar cada control */

        /* El control actual del arreglo y validar */
        validarObjetoForm($(this));        

        /* Verificamos si ha sido validado */
        return (errores == 0);
    } catch (e) {
        console.error(e);
        return false;
    }
}

var folioOriginal = '';

jQuery.fn.setFolioOriginal = function (valor)
{
    folioOriginal = valor;
}

jQuery.fn.validateNumOficio = function ()
{
    try {

        var obj = $(this);
        /* El control donde vamos agregar el texto */
        var small = $('<small />');

        /* El contenedor del control */
        var form_group = obj.closest('.form-group');
        form_group.removeClass('has-error'); /* Limpiamos el estado de error */

        $( "#icon-valido" ).remove();

        /* Capturamos el label donde queremos mostrar el mensaje */
        var label = form_group.find('label');
        label.find('small').remove(); /* Eliminamos el mensaje anterior */
        label.append(small);

        if(obj.val().trim() == '' || obj.val().toLowerCase().trim() == 's-n' || obj.val().toLowerCase().trim() == 's/n' || obj.val().trim().length <= 8 ){
            $("#folio_iepc").val("S/N");
            $("#btn_guardar_oficio").prop('disabled', false);
            obj.parent().append($("<span id='icon-valido' class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>") );
            return;
        }


        if (!obj.val().match(/^[a-zA-Z \u00e1 \u00e9 \u00ed \u00f3 \u00fa \u00c1 \u00c9 \u00cd \u00d3 \u00da \u00f1 \u00d1 0-9- .,() - /]+$/i) && obj.val().length > 0) {

            errores++;
            form_group.addClass('has-error');

            /* Mostramos el mensaje */
            if (obj.data('validacion-mensaje') == undefined) {
                small.text(_mensaje.campo_alfa_numerico);
            } else {
                small.text(obj.data('validacion-mensaje'));
            }

            return false; /* Rompe el bucle */
        }
        if(folioOriginal == obj.val()){
            //Num de oficio valido
            $("#btn_guardar_oficio").prop('disabled', false);
            form_group.addClass('has-success');
            obj.parent().append($("<span id='icon-valido' class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>") );
            return;
        }

        $.ajax({
          method: "POST",
          // url: "?c=OfcPartes&a=buscarNumOficio",
          url: GLOBAL_PATH+"ofcpartes/buscarNumOficio",
          data: { folio_iepc : obj.val() },
          beforeSend: function( xhr ) {
              $("#btn_guardar_oficio").prop('disabled', true);
            }
        })
          .done(function( res ) {
            data = JSON.parse(res);
            if(data.success){
                if(data.opc == 1){
                    //Num de oficio valido
                    $("#btn_guardar_oficio").prop('disabled', false);
                    form_group.addClass('has-success');
                    obj.parent().append($("<span id='icon-valido' class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>") );
                }
                else{
                    //Numero de oficio no valido
                    errores++;
                    form_group.addClass('has-error');
                    obj.parent().append($("<span id='icon-valido' class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>") );

                    /* Mostramos el mensaje */
                    if (obj.data('validacion-mensaje') == undefined) {
                        small.text(_mensaje.folio_repetido);
                    } else {
                        small.text(obj.data('validacion-mensaje'));
                    }

                    return false; /* Rompe el bucle */

                }
            }
            else{
                //Mensaje de error
                //Numero de oficio no valido
                errores++;
                form_group.addClass('has-error');

                /* Mostramos el mensaje */
                if (obj.data('validacion-mensaje') == undefined) {
                    small.text(_mensaje.error_procesar);
                } else {
                    small.text(obj.data('validacion-mensaje'));
                }

                return false; /* Rompe el bucle */
            }
          })
          .fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
        });


    } catch (e) {
        console.error(e);
        return false;
    }
}