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
        "deferRender": true,
        searchDelay: 1000,
        ajax: {
            "url": "?c=OfcPartes&a=listarOficiosExternos",
            "type": "POST"
        },
        "columns": [
            { "data": "folio","searchable": true,"orderable": true },
            { "data": "folio_institucion","searchable": true,"orderable": false },
            { "data": "nombre_emisor","searchable": true,"orderable": true },
            { "data": "institucion_emisor","searchable": true,"orderable": true },
            { "data": "asunto_emisor" ,"searchable": true,"orderable": false},
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
      "order": [[ 7, 'desc' ]],
      "initComplete": function(settings, json) {
          //console.log( 'DataTables has finished its initialisation.' );
          //$("#div_recargar_externos").show();
          $( "#lista_oficios_externos_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' name='btn_recargar' id='btn_recargar_externos' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#btn_recargar_externos" ).click(function() {
            $('#lista_oficios_externos').DataTable().ajax.reload();
          });
        }


    });

    //Evento del paginador de oficios internos
    var internos =  $('#lista_oficios_internos').DataTable({
      processing: true,
        serverSide: true,
        "autoWidth": false,
        "deferRender": true,
        searchDelay: 1000,
        ajax: {
            "url": "?c=OfcPartes&a=listarOficiosInternos",
            "type": "POST"
        },
        "columns": [
            { "data": "folio", "searchable": true,"orderable": true},
            { "data": "folio_institucion", "searchable": true,"orderable": false},
            { "data": "area", "searchable": true,"orderable": true },
            { "data": "usuario", "searchable": true,"orderable": true },
            { "data": "asunto_emisor", "searchable": true,"orderable": false },
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
      "order": [[ 7, 'desc' ]],
      "initComplete": function(settings, json) {
          //console.log( 'DataTables has finished its initialisation.' );
          //$("#div_recargar_externos").show();
          $( "#lista_oficios_internos_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' name='btn_recargar' id='btn_recargar_internos' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#btn_recargar_internos" ).click(function() {
            $('#lista_oficios_internos').DataTable().ajax.reload();
          });
        }

    });

    //Evento del paginador de oficios con destino externo
    var destino_externo =  $('#lista_oficios_destino_externo').DataTable({
      processing: true,
        serverSide: true,
        "autoWidth": false,
        "deferRender": true,
        searchDelay: 1000,
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
            { "data": "asunto_emisor", "searchable": true,"orderable": false },
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
      "order": [[ 8, 'desc' ]],
      "initComplete": function(settings, json) {
          //console.log( 'DataTables has finished its initialisation.' );
          //$("#div_recargar_externos").show();
          $( "#lista_oficios_destino_externo_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' name='btn_recargar' id='btn_recargar_destino_externo' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#btn_recargar_destino_externo" ).click(function() {
            $('#lista_oficios_destino_externo').DataTable().ajax.reload();
          });
        }

    });

    if(USER_PRIV == 3 || USER_PRIV == 2){
      //Evento del paginador de respuestas enviadas externos
      var respuestas =  $('#lista_respuestas').DataTable({
        processing: true,
          serverSide: true,
          "autoWidth": false,
          "deferRender": true,
        searchDelay: 1000,
          ajax: {
              "url": "?c=OfcPartes&a=listarRespuestasEnviadas",
              "type": "POST"
          },
          "columns": [
              { "data": "folio", "searchable": true,"orderable": true},
              { "data": "folio_institucion", "searchable": true,"orderable": false},
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
        "order": [[ 6, 'desc' ]],
        "initComplete": function(settings, json) {
          //console.log( 'DataTables has finished its initialisation.' );
          //$("#div_recargar_externos").show();
          $( "#lista_respuestas_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' name='btn_recargar' id='btn_recargar_respuestas' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#btn_recargar_respuestas" ).click(function() {
            $('#lista_respuestas').DataTable().ajax.reload();
          });
        }        

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
          "targets": 6,
          "orderable": false,
          "className": "capitalize",
          "render": function ( data, type, row ) {
                moment.locale('es');
                return  moment(row[6]).format('MMMM Do YYYY, h:mm:ss a');
            },
        },
        {
          "targets": 7,
          "visible": true,
          "orderable" : false,
          "className": "dt-center",
          "render": function ( data, type, row ) {
            moment.locale('es');
            if(row[7] == "0000-00-00 00:00:00")
              return  "<img src='AI/image/1.png' style='width:25px' title='Sin Revisar'>";
            else 
              return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row[7]).format('MMMM Do YYYY, h:mm:ss a')+"'>";

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

    //Evento del paginador de oficios con destino externo a los que se les puede vincular un ofocio
    var destino_externo_vincular =  $('#lista_oficios_destino_externo_vincular').DataTable({
      processing: true,
        serverSide: true,
        "autoWidth": false,
        "deferRender": true,
        searchDelay: 1000,
        ajax: {
            "url": "?c=OfcPartes&a=listarOficiosExternosVincular",
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
            { "data": "asunto_emisor", "searchable": true,"orderable": false },
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
                      return  "<a data-toggle='modal' data-target='#cancelar_solicitud' data-whatever='?c=OfcPartes&a=guardarVinculacion&idVincular="+parseInt( $("#id_oficio").val())+"&id="+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Vincular</a>";
                },
            }
        ],
      language: language,
      "order": [[ 8, 'desc' ]],
      "initComplete": function(settings, json) {
          //console.log( 'DataTables has finished its initialisation.' );
          //$("#div_recargar_externos").show();
          $( "#lista_oficios_destino_externo_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' name='btn_recargar' id='btn_recargar_destino_externo' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#btn_recargar_destino_externo" ).click(function() {
            $('#lista_oficios_destino_externo').DataTable().ajax.reload();
          });
        }

    });


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
    var temp = [];
    var t =  $('#example').DataTable({
    	language: language,

    	"columnDefs": [ 
        {
    	    "searchable": false,
    	    "orderable": false,
    	    "targets": 0
    	  },
        {
            "targets": [ 1 ],
            "className": "dt-center",
        },{
            "targets": [ 2 ],
            "visible": true,
            "searchable": true
        },

       ],
    	"order": [[ 1, 'asc' ]]

    });


    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    

    function ocultarUsuarios(data){
      var arr_remove = [];
      $('#example').DataTable().rows().flatten().each( function ( colIdx ) {

        var row = $('#example').DataTable().row(colIdx).data();
        if (typeof row != 'undefined'){

          for (var i = data.length - 1; i >= 0; i--) {
            if( parseInt(row[2]) == parseInt( data[i].id_usuario)){
              //Es igual
              // $('#example').DataTable().row(colIdx).node().remove();
              // if(prueba < 2){
                temp.push( $('#example').DataTable().row(colIdx).data() );
                arr_remove.push(colIdx);
                // $('#example').DataTable().row(colIdx).remove().draw( true );
                
              // }
              
            }
          }
          
          
        }


      });

      for (var i = arr_remove.length - 1; i >= 0; i--) {
        $('#example').DataTable().row(arr_remove[i]).remove().draw( false );
      }



    }





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
           opc = parseInt($(this)[0].value);
           if(opc > 0) {
            if(temp.length > 0){
              for (var i = temp.length - 1; i >= 0; i--) {
                $('#example').DataTable().row.add(temp[i]).draw( false );
                temp.pop();
              }
              // temp = [];          
            }
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
    // console.log(temp);
    function cargarUsuario(id_area,selector,selector2){
        $.ajax({
          method: "POST",
          url: "?c=OfcPartes&a=buscarUsuario",
          data: { id_area : id_area }
        })
          .done(function( res ) {

            
            
            var respuesta = JSON.parse(res);
            // console.log(respuesta);
            if(respuesta.success){
                console.log(respuesta);
                $("#"+selector).val(respuesta.data[0].nombre + " " + respuesta.data[0].apellido);
                $("#"+selector2).val(respuesta.data[0].id_usuario);
                ocultarUsuarios(respuesta.data);
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

