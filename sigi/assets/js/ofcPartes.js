$(document).ready(function(){


    //Variable de configuracion de idioma para paginadores
    var language = {
          processing:     "Buscando...",
          search:         "Buscar:",
          lengthMenu:    "Mostrar _MENU_ elementos",
          info:           "Mostrando _START_ a _END_ de _TOTAL_ elementos",
          infoEmpty:      "No se han encontrado registros para mostrar",
          infoFiltered:   "(Filtrado de _MAX_ elementos en total)",
          infoPostFix:    "",
          loadingRecords: "Cargado registros...",
          zeroRecords:    "No se encontraron registros",
          emptyTable:     "Sin datos ",
          paginate: {
              first:      "Primera",
              previous:   "Anterior",
              next:       "Siguiente",
              last:       "Ultima"
          },
          aria: {
              sortAscending:  ": activer pour trier la colonne par ordre croissant",
              sortDescending: ": activer pour trier la colonne par ordre décroissant"
          }

      };

      //formato del datepicker
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    });	

    /*Evento que ejecuta el modal de cancelar solicitd*/
    $('#cancelar_solicitud').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // console.log('aqui datos button', recipient);
      $('#btn-confirmar').attr("href", recipient);
      // // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      // var modal = $(this)
      // modal.find('.modal-title').text('New message to ' + recipient)
      // modal.find('.modal-body input').val(recipient)
    })

    /*Evento que muestra los campos necesarios para un oficio externo o interno*/
    /*$( "#select_origen" )
      .change(function () {
        var str = "";
        $( "#select_origen option:selected" ).each(function() {
          str += $( this ).text();
        });
        if(str != ""){
            form_tipo_origen(str.trim());  
        }
      })
      .change();*/


    //Evento del paginador de oficios externos
    var externos =  $('#lista_oficios_externos').DataTable({
        "ordering": true,
        "autoWidth": false,
        processing: true,
        serverSide: true,
        ajax: {
            "url": "?c=OfcPartes&a=listarOficiosExternos",
            "type": "POST"
        },
        "columns": [
            { "data": "folio","searchable": true,"orderable": true },
            { "data": "nombre_emisor","searchable": true,"orderable": true },
            { "data": "institucion_emisor","searchable": true,"orderable": true },
            { "data": "asunto_emisor" ,"searchable": false,"orderable": false},
            { "data": "estatus_inicial", "searchable": true,"orderable": false },
            { 
              "data": "estatus_final" ,
              "searchable": false,
              "orderable": true,
              "className": "dt-center",
              "render": function ( data, type, row ) {
                    if(row.estatus_final == 'Cerrado')
                      return  "<button type='button' class='btn btn-success btn-xs' style='width:70px'>"+row.estatus_final+"</button>";
                    else if(row.estatus_final == 'Cancelado')
                      return  "<button type='button' class='btn btn-danger btn-xs' style='width:70px'>"+row.estatus_final+"</button>";
                    else
                      return  "<button type='button' class='btn btn-warning btn-xs' style='width:70px'>"+row.estatus_final+"</button>";  
                },
            },
            { "data": "fecha_recibido",
              "className": "capitalize",
              "render": function ( data, type, row ) {
                    moment.locale('es');
                    return  moment(row.fecha_recibido).format('MMMM Do YYYY, h:mm:ss a');
                },
            },
            {
                "targets": -1,
                "data": null, 
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                  if(row.fecha_visto == "0000-00-00 00:00:00")
                    return  "<img src='AI/image/1.png' style='width:25px' title='Sin Revisar'>";
                  else 
                    return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row.fecha_visto).format('MMMM Do YYYY, h:mm:ss a')+"'>";

                },
            },
            {
                "targets": -1,
                "data": null,
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    return  "<a href='?c=OfcPartes&a=view&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Ver</a>";
                },
            },
            // {
            //     "targets": -1,
            //     "data": null, 
            //     "visible": ocultarColumnas(USER_PRIV),
            //     "orderable" : false,
            //     "className": "dt-center",
            //     "render": function ( data, type, row ) {
            //         console.log(row);
            //         if(row.tipo_oficio=="RESPUESTA")
            //           return "";
            //         else
            //           return  "<a href='?c=OfcPartes&a=edit&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Editar</a>";
            //     },
            // },
            {
                "targets": -1,
                "data": null, 
                "visible": ocultarColumnas(USER_PRIV),
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    if(row.tipo_oficio=="RESPUESTA")
                      return "";
                    else
                      return  "<a data-toggle='modal' data-target='#cancelar_solicitud' data-whatever='?c=OfcPartes&a=cancel&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Cancelar</a>";
                },
            }
        ] ,       
      language: language,
      "order": [[ 6, 'desc' ]]

    });

    //Evento del paginador de oficios internos
    var internos =  $('#lista_oficios_internos').DataTable({
      processing: true,
        serverSide: true,
        "autoWidth": false,
        ajax: {
            "url": "?c=OfcPartes&a=listarOficiosInternos",
            "type": "POST"
        },
        "columns": [
            { "data": "folio", "searchable": true,"orderable": true},
            { "data": "area", "searchable": true,"orderable": true },
            { "data": "usuario", "searchable": true,"orderable": true },
            { "data": "asunto_emisor", "searchable": false,"orderable": false },
            { "data": "estatus_inicial", "searchable": false,"orderable": false },
            { 
              "data": "estatus_final" , 
              "searchable": false,
              "orderable": true,
              "className": "dt-center",
              "render": function ( data, type, row ) {
                    if(row.estatus_final == 'Cerrado')
                      return  "<button type='button' class='btn btn-success btn-xs' style='width:70px'>"+row.estatus_final+"</button>";
                    else if(row.estatus_final == 'Cancelado')
                      return  "<button type='button' class='btn btn-danger btn-xs' style='width:70px'>"+row.estatus_final+"</button>";
                    else
                      return  "<button type='button' class='btn btn-warning btn-xs' style='width:70px'>"+row.estatus_final+"</button>";  
                },
            },
            { "data": "fecha_recibido",
              "className": "capitalize",
              "render": function ( data, type, row ) {
                    moment.locale('es');
                    return  moment(row.fecha_recibido).format('MMMM Do YYYY, h:mm:ss a');
                },
            },
            {
                "targets": -1,
                "data": null, 
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                  if(row.fecha_visto == "0000-00-00 00:00:00")
                    return  "<img src='AI/image/1.png' style='width:25px' title='Sin Revisar'>";
                  else 
                    return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row.fecha_visto).format('MMMM Do YYYY, h:mm:ss a')+"'>";

                },
            },
            {
                "targets": -1,
                "data": null, 
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    return  "<a href='?c=OfcPartes&a=view&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Ver</a>";
                },
            },
            // {
            //     "targets": -1,
            //     "data": "", 
            //     "visible": true,
            //     "orderable" : false,
            //     "render": function ( data, type, row ) {
            //         if(row.id_usuario_emisor==ID_USER)
            //           return "<a href='?c=OfcPartes&a=edit&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Editar</a>";
            //         else
            //           return  "";
            //     },
            // },
            {
                "targets": -1,
                "data": null,
                "visible": true,
                "orderable" : false,
                "className": "dt-center", 
                "render": function ( data, type, row ) {
                    if(parseInt(row.id_usuario_emisor)!=ID_USER)
                      return "";
                    else
                      return  "<a data-toggle='modal' data-target='#cancelar_solicitud' data-whatever='?c=OfcPartes&a=cancel&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Cancelar</a>";
                },
            }
        ],
      language: language,
      "order": [[ 6, 'desc' ]]

    });

    //Evento del paginador de oficios con destino externo
    var destino_externo =  $('#lista_oficios_destino_externo').DataTable({
      processing: true,
        serverSide: true,
        "autoWidth": false,
        ajax: {
            "url": "?c=OfcPartes&a=listarOficiosDestinoExterno",
            "type": "POST"
        },
        "columns": [
            { "data": "folio", "searchable": true,"orderable": true},
            { "data": "folio_institucion", "searchable": true,"orderable": false},
            { "data": "area", "searchable": false,"orderable": false },
            { "data": "usuario", "searchable": false,"orderable": false },
            { 
              "data": "institucion_destino", 
              "searchable": false,
              "orderable": false,
              "render": function ( data, type, row ) {
                return  row.nombre_destino + " " + row.cargo_destino + " de " + row.institucion_destino;
              },

            },
            { "data": "asunto_emisor", "searchable": false,"orderable": false },
            //{ "data": "estatus_inicial", "searchable": false,"orderable": false },
            { 
              "data": "estatus_final" , 
              "searchable": false,
              "orderable": true,
              "className": "dt-center",
              "render": function ( data, type, row ) {
                    if(row.estatus_final == 'Cerrado')
                      return  "<button type='button' class='btn btn-success btn-xs' style='width:70px'>"+row.estatus_final+"</button>";
                    else if(row.estatus_final == 'Cancelado')
                      return  "<button type='button' class='btn btn-danger btn-xs' style='width:70px'>"+row.estatus_final+"</button>";
                    else
                      return  "<button type='button' class='btn btn-warning btn-xs' style='width:70px'>"+row.estatus_final+"</button>";  
                },
            },
            { "data": "fecha_recibido",
              "className": "capitalize",
              "render": function ( data, type, row ) {
                    moment.locale('es');
                    return  moment(row.fecha_recibido).format('MMMM Do YYYY, h:mm:ss a');
                },
            },
            {
                "targets": -1,
                "data": null, 
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                  if(row.fecha_visto == "0000-00-00 00:00:00")
                    return  "<img src='AI/image/1.png' style='width:25px' title='Sin Revisar'>";
                  else 
                    return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row.fecha_visto).format('MMMM Do YYYY, h:mm:ss a')+"'>";

                },
            },
            {
                "targets": -1,
                "data": null, 
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    return  "<a href='?c=OfcPartes&a=view&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Ver</a>";
                },
            },
            {
                "targets": -1,
                "data": null,
                "visible": true,
                "orderable" : false, 
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    if(parseInt(row.id_usuario_emisor)!=ID_USER)
                      return "";
                    else
                      return  "<a data-toggle='modal' data-target='#cancelar_solicitud' data-whatever='?c=OfcPartes&a=cancel&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Cancelar</a>";
                },
            }
        ],
      language: language,
      "order": [[ 7, 'desc' ]]

    });

    if(USER_PRIV == 3 || USER_PRIV == 2){
      //Evento del paginador de respuestas enviadas externos
      var respuestas =  $('#lista_respuestas').DataTable({
        processing: true,
          serverSide: true,
          "autoWidth": false,
          ajax: {
              "url": "?c=OfcPartes&a=listarRespuestasEnviadas",
              "type": "POST"
          },
          "columns": [
              { "data": "folio", "searchable": true,"orderable": true},
              { "data": "origen","searchable": true,"orderable": true },
              { "data": "persona_recibe", "searchable": true,"orderable": true },
              { "data": "asunto_emisor", "searchable": true,"orderable": true },
              { "data": "estatus_inicial", "searchable": false,"orderable": false },
              { "data": "fecha_enviado"},
              {
                "targets": -1,
                "data": null, 
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                  if(row.fecha_visto == "0000-00-00 00:00:00")
                    return  "<img src='AI/image/1.png' style='width:25px' title='Sin Revisar'>";
                  else 
                    return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row.fecha_visto).format('MMMM Do YYYY, h:mm:ss a')+"'>";

                  },
              },

              {
                  "targets": -1,
                  "data": null, 
                  "visible": true,
                  "orderable" : false,
                  "className": "dt-center",
                  "render": function ( data, type, row ) {
                      return  "<a href='?c=OfcPartes&a=view&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Ver</a>";
                  },
              }
          ],
        language: language,
        "order": [[ 5, 'desc' ]]

      });

          
    }

    //Evento de respuestas recibidas
      var respuestas_recibidas =  $('#lista_respuestas_recibidas').DataTable({
        language: language,

        "columnDefs": [ 
        {
            "visible" : false,
            "searchable": false,
            "orderable": false,
            "targets": 0
        },
        { 
          "targets": 5,
          "orderable": false,
          "className": "capitalize",
          "render": function ( data, type, row ) {
                moment.locale('es');
                return  moment(row[5]).format('MMMM Do YYYY, h:mm:ss a');
            },
        },
        {
          "targets": 6,
          "visible": true,
          "orderable" : false,
          "className": "dt-center",
          "render": function ( data, type, row ) {
            moment.locale('es');
            if(row[6] == "0000-00-00 00:00:00")
              return  "<img src='AI/image/1.png' style='width:25px' title='Sin Revisar'>";
            else 
              return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row[6]).format('MMMM Do YYYY, h:mm:ss a')+"'>";

            },
        },
        {
            "targets": -1,
            "data": null, 
            "visible": true,
            "orderable" : false,
            "className": "dt-center",
            "render": function ( data, type, row ) {
                return  "<a href='?c=OfcPartes&a=view&id="+parseInt( row[0])+"' class='btn btn-default btn-xs' style='width:60px'>Ver</a>";
            },
        }, 
        ],
        "order": [[ 1, 'desc' ]]

      });

      respuestas_recibidas.on( 'order.dt search.dt', function () {
          respuestas_recibidas.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
              cell.innerHTML = i+1;
          } );
      } ).draw(); 


    //Funcion para habilitar columnas en paginadores dependiendo de los privilegios
    function ocultarColumnas(privilegios){
      console.log(privilegios);
      var res= false
      if (privilegios == 1) {
          res = true;
      }
      if (privilegios == 3) {
          res = false;
      }
      return res;

    }

    function ocultarColumnasInternos($id_usua){
      console.log(privilegios);
      var res= false
      if (privilegios == 1) {
          res = true;
      }
      if (privilegios == 3) {
          res = false;
      }
      return res;

    }



    

    /*Configuracion inicial de la tabla de usuarios*/
    var t =  $('#example').DataTable({
    	language: language,

    	"columnDefs": [ {
    	    "searchable": false,
    	    "orderable": false,
    	    "targets": 0
    	} ],
    	"order": [[ 1, 'asc' ]]

    });

    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    /*Evento que muestra los ususarios en caso de que sea con copia*/
    $('#ccp').change(function () {
        if ($(this).is(':checked')) {
            //Mostrar lista de usuarios
            $('#lista_usuarios').show();
        }
        else{
        	//No mostrar
        	$('#lista_usuarios').hide();
        }
     });

    /*Evento para la seleccion de area en caso de un oficio interno*/
    $( "#area_origen" )
      .change(function () {
        var str = "";
        $( "#area_origen option:selected" ).each(function() {
          //console.log($(this)[0].value);
           opc = parseInt($(this)[0].value);
           if(opc > 0) {
            cargarUsuario(opc,"usuario_origen","id_usuario_origen")
           }
        });
      })
      .change();

    /*Evento de seleccion de area*/
    $( "#area_destino" )
      .change(function () {
        var str = "";
        $( "#area_destino option:selected" ).each(function() {
          //console.log($(this)[0].value);
           opc = parseInt($(this)[0].value);
           if(opc > 0) {
            cargarUsuario(opc,"usuario_receptor","id_usuario_receptor")
           }
        });
      })
      .change();

    //Agrega campos extras dependiendo del tipo de origen
    function form_tipo_origen(origen){
    	console.log(origen);
    	if(origen == "Externo"){
    		/*Cargar form de oficio externo*/
    		$('#formExterno').show();
    		$('#formInterno').hide();

    	}
    	else if(origen == "Interno"){
    		/*Cargar form de oficio interno*/
    		//console.log('entro aqui');
    		$('#formExterno').hide();
    		$('#formInterno').show();
    	}

    }
    //Carga el usuario correspondiente
    function cargarUsuario(id_area,selector,selector2){
        $.ajax({
          method: "POST",
          url: "?c=OfcPartes&a=buscarUsuario",
          data: { id_area : id_area }
        })
          .done(function( res ) {
            var respuesta = jQuery.parseJSON(res);
            if(respuesta.success){
                // console.log(respuesta);
                $("#"+selector).val(respuesta.data.usuario);
                $("#"+selector2).val(respuesta.data.id_usuario);
            }
            else{
                //mensaje de error
                 $("#"+selector).val("");
            }
            // console.log(respuesta.success);
          })
          .fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
        });
    }

    $( "#btn-cancelar" ).click(function() {
      location.href = "sigi.php";
    });

    
    


})

