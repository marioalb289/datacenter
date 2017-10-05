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
      //Funcion para almacenar tab active
      if (typeof(Storage) !== "undefined") {
          var dash_localVar = localStorage.getItem("dash_activ_tab"+getUrlPath());
          if(dash_localVar){
   
              $(".dashboard_tabs_cl > li").removeClass("active");
              $(".tab-content > div").removeClass("active");
   
              var hrefAttr = "a[href=\'"+dash_localVar+"\']";
              if( $(hrefAttr).parent() ){
                  $(hrefAttr).parent().addClass("in active");
                  $(""+dash_localVar+"").addClass("in active");
              }
   
          }
   
          $(".dashboard_tabs_cl a").click(function (e) {
              e.preventDefault();
              localStorage.setItem("dash_activ_tab"+getUrlPath(), $( this ).attr( "href" ));
          });
          function getUrlPath(){
              var returnVar = "_indexpg";
              var splitStr = window.location.href;
              var asdf = splitStr.split("?r=");
              if(asdf[1]){
                  var furthrSplt = asdf[1].split("&");
                  if(furthrSplt[0]){
                      returnVar = furthrSplt[0];
                  }else{
                      returnVar = asdf[1];
                  }
              }
              return returnVar;
          }
      }

      $( "#btn_rep_todo" ).click(function() {
        var params = {
          externo : $('#lista_oficios_externos').DataTable().ajax.params(),
          interno : $('#lista_oficios_internos').DataTable().ajax.params(),
          des_externo : $('#lista_oficios_destino_externo').DataTable().ajax.params(),
          sol_entrantes : $('#lista_solicitudes_entrantes').DataTable().ajax.params(),
          sol_salientes : $('#lista_solicitudes_salientes').DataTable().ajax.params(),
        };
        $.ajax({
          method: "POST",
          url: GLOBAL_PATH+"ofcpartes/createReportParam",
          data: params
        })
          .done(function( res ) {                
            
            var respuesta = JSON.parse(res);
            if(respuesta.success){
              url = GLOBAL_PATH+"ofcpartes/imprimirReporte";
              window.open(url, '_blank');
            }
            else{
              //mensaje de error
              bootbox.alert({ 
                title: "Error",
                message: "No se pudo Imprimir el Reporte",
                type: "danger"
              })
            }
          })
          .fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
        });
      });

      //formato del datepicker
    $(".datepicker").datepicker({
        dateFormat: 'yy-mm-dd'
    }); 

    /*Evento que ejecuta el modal de cancelar solicitd*/
    $('#cancelar_solicitud').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      $('#btn-confirmar').attr("href", recipient);
    })

    //Evento del paginador de solicitudes entrantes
    var sol_entrantes =  $('#lista_solicitudes_entrantes').DataTable({
        "ordering": true,
        "autoWidth": false,
        processing: true,
        serverSide: true,
        "deferRender": true,
        searchDelay: 1000,
        ajax: {
            "url": GLOBAL_PATH+"ofcpartes/listarSolicitudesEntrantes",
            "type": "POST",
            "data": function ( d ) {
                d.fecha_inicio = fecha_inicio.value,
                d.fecha_fin = fecha_fin.value,
                d.area = filtro_area.value,
                d.estatus_final = filtro_estatus_final.value,
                d.tipo_oficio = filtro_tipo_oficio.value,
                d.usuario = (typeof filtro_usuario != 'undefined') ? filtro_usuario.value : ''

            }            
        },
        "columns": [
            {
                "data": null,
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    return  "<span class='glyphicon glyphicon-envelope' aria-hidden='true' style='color:#00bcd4;font-size: 15px;'></span>";
                },
            },
            { "data": "tipo_oficio","searchable": false,"orderable": false },
            { "data": "folio_institucion","searchable": true,"orderable": false },
            { "data": "emisor","searchable": true,"orderable": true },
            { "data": "asunto_emisor" ,"searchable": true,"orderable": false},
            { "data": "estatus_inicial", "searchable": false,"orderable": false },
            { 
              "data": "estatus_final" ,
              "searchable": false,
              "orderable": true,
              "className": "dt-center",
              "render": function ( data, type, row ) {
                    if(row.estatus_final == 'Cerrado')
                      return  "<button type='button' class='btn btn-success btn-xs' style='width:80px;font-size:14px;'>"+row.estatus_final+"</button>";
                    else if(row.estatus_final == 'Cancelado')
                      return  "<button type='button' class='btn btn-danger btn-xs' style='width:80px;font-size:14px;'>"+row.estatus_final+"</button>";
                    else
                      return  "<button type='button' class='btn btn-warning btn-xs' style='width:80px;font-size:14px;'>"+row.estatus_final+"</button>";  
                },
            },
            { "data": "fecha_recibido",
              "className": "capitalize",
              "render": function ( data, type, row ) {
                    moment.locale('es');
                    return  moment(row.fecha_recibido).format('DD/MM/YYYY, HH:mm');
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
                    return  "<img src='AI/image/1.png' style='width:35px' title='Sin Revisar'>";
                  else 
                    return  "<img src='AI/image/9.png' style='width:35px' title='Visto "+moment(row.fecha_visto).format('DD/MM/YYYY, HH:mm')+"'>";

                },
            }            
        ] ,       
      language: language,
      "order": [[ 7, 'desc' ]],
      "createdRow": function( row, data, dataIndex ) {
        $(row).click(function() {
          window.location.href = GLOBAL_PATH+"ofcpartes/view/"+parseInt( data.DT_RowId.substring(4));
        });
        if(data.fecha_visto == "0000-00-00 00:00:00")
          $(row).addClass( 'solicitud_no_vista' );
      },
      "initComplete": function(settings, json) {
          //$("#div_recargar_externos").show();
          $( "#lista_solicitudes_entrantes_filter" ).prepend( "<button type='button' class='btn btn-default btn-md'  id='btn_recargar_entrantes' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#lista_solicitudes_entrantes_filter" ).prepend( "<button type='button' class='btn btn-default btn-md'  id='btn_imprimir_rep_entrantes' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-print' style='color: #818481;font-weight: 900;'></span>Imprimir</button>" );
          $( "#btn_recargar_entrantes" ).click(function() {
            $('#lista_solicitudes_entrantes').DataTable().ajax.reload();
          });
          $( "#btn_imprimir_rep_entrantes" ).click(function() {
            var params = {
              sol_entrantes : $('#lista_solicitudes_entrantes').DataTable().ajax.params()
            };
            $.ajax({
              method: "POST",
              // url: "?c=OfcPartes&a=createReportParam",
              url: GLOBAL_PATH+"ofcpartes/createReportParam",
              data: params
            })
              .done(function( res ) {                
                
                var respuesta = JSON.parse(res);
                if(respuesta.success){
                  url = GLOBAL_PATH+"ofcpartes/imprimirReporte",
                  window.open(url, '_blank');                 
                }
                else{
                  //mensaje de error
                  bootbox.alert({ 
                    title: "Error",
                    message: "No se pudo Imprimir el Reporte",
                    type: "danger"
                  })
                }
              })
              .fail(function( jqXHR, textStatus ) {
                  alert( "Request failed: " + textStatus );
            });
          });
        }


    });

    //Evento del paginador de solicitudes salientes
    var sol_salientes =  $('#lista_solicitudes_salientes').DataTable({
        "ordering": true,
        "autoWidth": false,
        processing: true,
        serverSide: true,
        "deferRender": true,
        searchDelay: 1000,
        ajax: {
            "url": GLOBAL_PATH+"ofcpartes/listarSolicitudesSalientes",
            "type": "POST",
            "data": function ( d ) {
                d.fecha_inicio = fecha_inicio.value,
                d.fecha_fin = fecha_fin.value,
                d.area = filtro_area.value,
                d.estatus_final = filtro_estatus_final.value,
                d.tipo_oficio = filtro_tipo_oficio.value,
                d.usuario = (typeof filtro_usuario != 'undefined') ? filtro_usuario.value : ''
            }            
        },
        "columns": [
            {
                "data": null,
                "visible": true,
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    return  "<span class='glyphicon glyphicon-file' aria-hidden='true' style='color:#5cb85c;font-size: 15px;'></span>";
                },
            },
            { "data": "tipo_oficio","searchable": false,"orderable": false },
            { "data": "folio_institucion","searchable": true,"orderable": false },
            { "data": "receptor","searchable": true,"orderable": true },
            { "data": "asunto_receptor" ,"searchable": true,"orderable": false},
            { "data": "estatus_inicial", "searchable": false,"orderable": false },
            { "data": "respondido", "searchable": false,"orderable": false,"visible": false },
            { 
              "data": "estatus_final" ,
              "searchable": false,
              "orderable": true,
              "className": "dt-center",
              "render": function ( data, type, row ) {
                    if(row.estatus_final == 'Cerrado')
                      return  "<button type='button' class='btn btn-success btn-xs' style='width:80px;font-size:14px;'>"+row.estatus_final+"</button>";
                    else if(row.estatus_final == 'Cancelado')
                      return  "<button type='button' class='btn btn-danger btn-xs' style='width:80px;font-size:14px;'>"+row.estatus_final+"</button>";
                    else if(row.estatus_final == 'Revision')
                      return  "<button type='button' class='btn btn-info btn-xs' style='width:80px;font-size:14px;'>"+row.estatus_final+"</button>";
                    else
                      return  "<button type='button' class='btn btn-warning btn-xs' style='width:80px;font-size:14px;'>"+row.estatus_final+"</button>";  
                },
            },
            { "data": "fecha_recibido",
              "className": "capitalize",
              "render": function ( data, type, row ) {
                    moment.locale('es');
                    return  moment(row.fecha_recibido).format('DD/MM/YYYY, HH:mm');
                },
            },
            {
                "targets": -1,
                "data": null, 
                //"visible": ocultarColumnas(USER_PRIV),
                "orderable" : false,
                "className": "dt-center-icon",
                "render": function ( data, type, row ) {
                    var ren = "";
                    if(row.fecha_visto == "0000-00-00 00:00:00")
                      ren =  "<a style= 'padding: 0px 5px;'><img src='AI/image/1.png' style='width:35px' title='Sin Revisar'></a>";
                    else 
                      ren =  "<a style='padding: 0px 5px;'><img src='AI/image/9.png' style='width:35px' title='Visto "+moment(row.fecha_visto).format('DD/MM/YYYY, HH:mm')+"'></a>";

                    


                    if( (row.tipo_oficio=="SOLICITUD" && row.estatus_final == 'Abierto' && row.respondido != 1)||(row.tipo_oficio=="SOLICITUD" && row.estatus_final == 'Revision'))
                      // ren = "<a data-toggle='modal' data-target='#cancelar_solicitud' data-whatever='"+GLOBAL_PATH+"ofcpartes/cancel/"+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Cancelar</a>";
                      ren = ren + "<a style='padding: 0px 5px;' ><img class='cancelar' id='cancel_"+parseInt( row.DT_RowId.substring(4))+"' src='AI/image/0.png' style='width:35px' title='Cancelar Solicitud'></a>";
                    else
                      ren = ren + "<a style='padding: 0px 5px; cursor: no-drop;' ><img src='AI/image/0.png' style='width:35px;-webkit-filter: grayscale(100%);filter: grayscale(100%);' title='Cancelar Solicitud'></a>";

                    if(row.estatus_final == 'Revision')
                      ren = ren +"<a href='"+GLOBAL_PATH+"ofcpartes/edit/"+parseInt( row.DT_RowId.substring(4))+"' style='padding: 0px 5px;' ><img class='edit' src='AI/image/editar.png' style='width:35px' title='Editar Oficio'></a>"
                      +"<a style='padding: 0px 5px;' ><img id='env_"+parseInt( row.DT_RowId.substring(4))+"' class='enviar' src='AI/image/enviar2.png' style='width:35px' title='Enviar Oficio'></a>";
                    else
                      ren = ren +"<a style='padding: 0px 5px;cursor: no-drop;' ><img class='edit' src='AI/image/editar.png' style='width:35px;-webkit-filter: grayscale(100%);filter: grayscale(100%);' title='Editar Oficio'></a>"
                      +"<a style='padding: 0px 5px;cursor: no-drop;' ><img class='edit' src='AI/image/enviar2.png' style='width:35px;-webkit-filter: grayscale(100%);filter: grayscale(100%);' title='Enviar Oficio'></a>";;

                    return ren;
                },
            }
            // {
            //     "targets": -1,
            //     "data": null, 
            //     //"visible": ocultarColumnas(USER_PRIV),
            //     "orderable" : false,
            //     "className": "dt-center",
            //     "render": function ( data, type, row ) {
            //         // if(row.estatus_final == "Revision")
            //         if(row.estatus_final == 'Revision')
            //           return  "<a href='"+GLOBAL_PATH+"ofcpartes/edit/"+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs edit' style='width:60px'>Editar</a>";
            //         else
            //           return "";
            //     },
            // }
        ] ,       
      language: language,
      "order": [[ 8, 'desc' ]],
      "createdRow": function( row, data, dataIndex ) {
        $(row).click(function(e) {
          if($(e.target).is('a') || $(e.target).is('img')){
            if($(e.target).is('.edit')){
              return;
            }
            else if($(e.target).is('.enviar')){
              // console.log(e.target);
              e.preventDefault();
              var id = $(e.target).attr('id');
              confirmarEnvio(parseInt(id.substring(4)));
              return;

            }            
            else if($(e.target).is('.cancelar')){
              // console.log(e.target);
              e.preventDefault();
              var id = $(e.target).attr('id');
              confirmarCancelar(parseInt(id.substring(7)));
              return;

            }
            else{
              e.preventDefault();
              return;              
            }
          }
          window.location.href = GLOBAL_PATH+"ofcpartes/view/"+parseInt( data.DT_RowId.substring(4));
        });
      },
      "initComplete": function(settings, json) {
          //$("#div_recargar_externos").show();
          $( "#lista_solicitudes_salientes_filter" ).prepend( "<button type='button' class='btn btn-default btn-md'  id='btn_recargar_salientes' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#lista_solicitudes_salientes_filter" ).prepend( "<button type='button' class='btn btn-default btn-md'  id='btn_imprimir_rep_salientes' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-print' style='color: #818481;font-weight: 900;'></span>Imprimir</button>" );
          $( "#btn_recargar_salientes" ).click(function() {
            $('#lista_solicitudes_salientes').DataTable().ajax.reload();
          });
          $( "#btn_imprimir_rep_salientes" ).click(function() {
            var params = {
              sol_salientes : $('#lista_solicitudes_salientes').DataTable().ajax.params()
            };
            $.ajax({
              method: "POST",
              // url: "?c=OfcPartes&a=createReportParam",
              url: GLOBAL_PATH+"ofcpartes/createReportParam",
              data: params
            })
              .done(function( res ) {                
                
                var respuesta = JSON.parse(res);
                if(respuesta.success){
                  url = GLOBAL_PATH+"ofcpartes/imprimirReporte",
                  window.open(url, '_blank');                 
                }
                else{
                  //mensaje de error
                  bootbox.alert({ 
                    title: "Error",
                    message: "No se pudo Imprimir el Reporte",
                    type: "danger"
                  })
                }
              })
              .fail(function( jqXHR, textStatus ) {
                  alert( "Request failed: " + textStatus );
            });
          });
        }


    });

    function confirmarCancelar(id){
      bootbox.confirm({
          title: "Advertencia",
          message: "Al cancelar la solicitud, ningun usuario podrá verlo. Los cambios no se pondrán deshacer. <br> ¿Deseas continuar?",
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
                //alert("peticion ajax:" +id);
                $.ajax({
                  method: "POST",
                  // url: "?c=OfcPartes&a=createReportParam",
                  url: GLOBAL_PATH+"ofcpartes/cancel",
                  data: {id_oficio: id}
                })
                  .done(function( res ) {                
                    
                    var respuesta = JSON.parse(res);
                    if(respuesta.success){
                       $('#lista_solicitudes_salientes').DataTable().ajax.reload();
                       bootbox.alert({ 
                          title: "Atención",
                          message: "Solicitud cancelada correctamente",
                          type: "success"
                        })
                                     
                    }
                    else{
                      //mensaje de error
                      bootbox.alert({ 
                        title: "Error",
                        message: "No se pudo Cancelar el oficio",
                        type: "danger"
                      })
                    }
                  })
                  .fail(function( jqXHR, textStatus ) {
                      bootbox.alert({ 
                        title: "Error",
                        message: "No se pudo Cancelar el oficio: " +textStatus,
                        type: "danger"
                      })
                });

              }
          }
      });

    }

    function confirmarEnvio(id){
      // alert(id);
      bootbox.confirm({
          title: "Advertencia",
          message: "El mensaje será enviado a todos los destinatarios. Los cambios no se pondrán deshacer.<br> ¿Desea continuar?",
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
                $.ajax({
                  method: "POST",
                  // url: "?c=OfcPartes&a=createReportParam",
                  url: GLOBAL_PATH+"ofcpartes/EnviarSolicitud",
                  data: {id_oficio: id}
                })
                  .done(function( res ) {                
                    
                    var respuesta = JSON.parse(res);
                    if(respuesta.success){
                      console.log(respuesta);
                      if(respuesta.msgEstatus != ''){
                        $('#lista_solicitudes_salientes').DataTable().ajax.reload();
                        bootbox.alert({ 
                          title: "Advertencia",
                          message: respuesta.msgEstatus,
                          type: "warning"
                        })

                      }else{
                        $('#lista_solicitudes_salientes').DataTable().ajax.reload();
                        $('#lista_solicitudes_entrantes').DataTable().ajax.reload();
                        socket.emit( 'notification', respuesta.notificacion );  
                        bootbox.alert({ 
                          title: "Atención",
                          message: "Solicitud enviada",
                          type: "success"
                        })
                      }
                                     
                    }
                    else{
                      //mensaje de error
                      bootbox.alert({ 
                        title: "Error",
                        message: "No se pudo enviar el oficio",
                        type: "danger"
                      })
                    }
                  })
                  .fail(function( jqXHR, textStatus ) {
                      alert( "Request failed: " + textStatus );
                });
              }
          }
      });
    }
    

    //Evento de respuestas recibidas
      var respuestas_recibidas =  $('#lista_respuestas_recibidas').DataTable({
        language: language,

        "columnDefs": [
        {
            "visible" : true,
            "searchable": false,
            "orderable": false,
            "targets": 0
        },
        {
            "visible" : false,
            "searchable": false,
            "orderable": false,
            "targets": 1
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
        ],
        "order": [[ 1, 'desc' ]],
        "createdRow": function( row, data, dataIndex ) {
          $(row).click(function(e) {
            if($(e.target).is('a')){
              e.preventDefault();
              return;
            }
            window.location.href = GLOBAL_PATH+"ofcpartes/view/"+parseInt( data[1]);
          });
        },

      });

    var destino_externo_vincular =  $('#lista_oficios_destino_externo_vincular').DataTable({
      processing: true,
        serverSide: true,
        "autoWidth": false,
        "deferRender": true,
        searchDelay: 1000,
        ajax: {
            // "url": "?c=OfcPartes&a=listarOficiosExternosVincular",
            "url": GLOBAL_PATH+"ofcpartes/listarOficiosExternosVincular",
            "type": "POST"
        },
        "columns": [
            { "data": "folio_institucion", "searchable": true,"orderable": false},
            { "data": "dependencia", "searchable": true,"orderable": false },
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
                    return  moment(row.fecha_recibido).format('DD/MM/YYYY, HH:mm');
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
                    if(parseInt(row.id_usuario_emisor)!=ID_USER)
                      return "";
                    else
                      return  "<a data-toggle='modal' data-target='#cancelar_solicitud' data-whatever='"+GLOBAL_PATH+"ofcpartes/guardarVinculacion/"+parseInt( $("#id_oficio").val())+"/"+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Vincular</a>";
                },
            }
        ],
      language: language,
      "order": [[ 5, 'desc' ]],
      "createdRow": function( row, data, dataIndex ) {
        $(row).click(function(e) {
          if($(e.target).is('a')){
            if($(e.target).is('.edit')){
              return;
            }
            else{
              e.preventDefault();
              return;              
            }
          }
          window.location.href = GLOBAL_PATH+"ofcpartes/view/"+parseInt( data.DT_RowId.substring(4));
        });
      },
      "initComplete": function(settings, json) {
          //$("#div_recargar_externos").show();
          $( "#lista_oficios_destino_externo_vincular_filter" ).prepend( "<button type='button' class='btn btn-default btn-md'  id='btn_recargar_vincular' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-refresh' style='color: #5cb85c;font-weight: 900;'></span>Recargar</button>" );
          $( "#btn_recargar_vincular" ).click(function() {
            $('#lista_oficios_destino_externo_vincular').DataTable().ajax.reload();
          });
        }

    });


    //Funcion para habilitar columnas en paginadores dependiendo de los privilegios
    function ocultarColumnas(privilegios){
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
    var flag = false;
    var flag2 = false;
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
            "visible": false
        },
         {
            "targets": [ 2 ],
            "visible": false
        },
         {
            "targets": [ 3 ],
            "visible": true,
        },
        {
            "targets": [ 4 ],
            "visible": true,
            "searchable": true
        },

       ],
      "initComplete": function(settings, json) {
          $( "#example_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' id='btn_enviar_todos' style='float: right;height: 30px;width: 80px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-ok' style='color: #5cb85c;font-weight: 900;'></span>Todo</button>" );
          $( "#example_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' id='btn_enviar_todos_titulares' style='float: right;height: 30px;width: 80px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-ok' style='color: #5cb85c;font-weight: 900;'></span>Titulares</button>" );
          $( "#btn_enviar_todos" ).click(function() {
            var count = $('#example').DataTable().$('tr').length;
            var i = 1;
            $('#example').DataTable().$('tr').each(function (){
              $(this).removeClass( "success-usuarios" );
              if(!flag){
                $(this).addClass("success-usuarios");
                if(i == count){
                  flag = true;
                  return;
                }
              }
              if(i == count){
                flag = false;
                return;
              }
              i++;
            });
          });
          $( "#btn_enviar_todos_titulares" ).click(function() {
            arrData= $('#example').dataTable().fnGetData();
            totalTitulares = 0;
            for (var i = arrData.length - 1; i >= 0; i--) {
              if(parseInt(arrData[i][2])){
                totalTitulares++;
              }
            }

            var count = totalTitulares;
            var i = 1;
            $('#example').DataTable().$('tr').each(function (){
              var titular = parseInt($('#example').dataTable().fnGetData( this )[2]);
              if(titular){
                $(this).removeClass( "success-usuarios" );
                if(!flag2){
                  $(this).addClass("success-usuarios");
                  if(i == count){
                    flag2 = true;
                    return;
                  }
                }
                if(i == count){
                  flag2 = false;
                  return;
                }
                i++;
              }
            });
          });
        }

    });

    

    $('#example tbody').on( 'click', 'tr', function () {
          $(this).toggleClass('success-usuarios');
          _this = this;

          // var count = $('#lista_usuarios_recibidos').DataTable().$('tr').length;
          // var i = 1;
          // $('#lista_usuarios_recibidos').DataTable().$('tr').each(function (){
          //   intId1 = parseInt( $('#lista_usuarios_recibidos').dataTable().fnGetData( this )[1]);
          //   intId2 = parseInt( $('#example').dataTable().fnGetData( _this )[1]);
          //   if(intId1 == intId2){
          //     t2.row($(this)).remove().draw();
          //     return;
          //   }
          //   if(i == count){
          //     t2.row.add($('#example').dataTable().fnGetData( _this )).draw( true );
          //   }
          //   i++;

          // });

         

      } );

    $('#lista_usuarios_recibidos tbody').click();




    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    var t2 =  $('#lista_usuarios_recibidos').DataTable({
      language: language,

      "columnDefs": [ 
        {
          "searchable": false,
          "orderable": false,
          "targets": 0
        },
         {
            "targets": [ 1 ],
            "visible": false
        },
         {
            "targets": [ 2 ],
            "visible": false
        },
         {
            "targets": [ 3 ],
            "visible": true,
        },
        {
            "targets": [ 4 ],
            "visible": true,
            "searchable": true
        },

       ],
      "initComplete": function(settings, json) {
        }

    });

    t2.on( 'order.dt search.dt', function () {
        t2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#lista_usuarios_recibidos tbody').on( 'click', 'tr', function () {
        if($("#lista_usuarios_recibidos").hasClass('no-select')){
          return;
        }

        areaM = (typeof $( "#area_destino option:selected" )[0] != 'undefined') ? $( "#area_destino option:selected" )[0].text : ''; 
        select = $('#lista_usuarios_recibidos').dataTable().fnGetData( this );
        if( areaM == select[4] && parseInt(select[2]) == 1){
          //Mensaje de error
          bootbox.alert({ 
            title: "Error",
            message: select[3]+" es un usuario titular del Área destino, seleccione otra area para cambiarlo.",
            type: "danger"
          })
          return;
        }
        if(!$(this).hasClass('delete')){
          $(this).toggleClass('danger-usuarios-delete');
        }
        
      } );

    

    function ocultarUsuarios(data){
      console.log(data);
      var arr_remove = [];
      $('#example').DataTable().rows().flatten().each( function ( colIdx ) {

        var row = $('#example').DataTable().row(colIdx).data();
        if (typeof row != 'undefined'){

          for (var i = data.length - 1; i >= 0; i--) {
            if( parseInt(row[1]) == parseInt( data[i].id_usuario)){
              //Es igual
                temp.push( $('#example').DataTable().row(colIdx).data() );
                arr_remove.push(colIdx);
                
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
    var flagSelect = 1;
    var opcOriginal = (typeof $( "#area_destino option:selected" )[0] != 'undefined') ? $( "#area_destino option:selected" )[0].text : ''; 
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
            
            //Marcar usuarios que seran removidos de la lista de usuarios que ya recibieron copia
            count =$('#lista_usuarios_recibidos').DataTable().$('tr').length;
            if(count > 0 && flagSelect > 1){
              selected =  $(this)[0].text;
              if(selected != opcOriginal){
                $('#lista_usuarios_recibidos').DataTable().$('tr').each(function (){
                  list = $('#lista_usuarios_recibidos').dataTable().fnGetData( this )[4];
                  titular = parseInt($('#lista_usuarios_recibidos').dataTable().fnGetData( this )[2]);
                  if(list == opcOriginal && titular == 1 && $(this).hasClass("danger-usuarios-delete delete") == false){
                    $(this).toggleClass('danger-usuarios-delete delete');
                    t.row.add($('#lista_usuarios_recibidos').dataTable().fnGetData( this )).draw( true );
                  }
                });
              }
              else{
                $('#lista_usuarios_recibidos').DataTable().$('tr').each(function (){
                  list = $('#lista_usuarios_recibidos').dataTable().fnGetData( this )[4];
                  titular = parseInt($('#lista_usuarios_recibidos').dataTable().fnGetData( this )[2]);
                  if(opcOriginal == selected && titular == 1){
                    $(this).removeClass('danger-usuarios-delete delete');
                    idRemove = parseInt($('#lista_usuarios_recibidos').dataTable().fnGetData( this )[1])
                    $('#example').DataTable().$('tr').each(function (){
                      idActual = parseInt($('#example').dataTable().fnGetData( this )[1]);
                      if(idActual == idRemove){
                        t.row($(this)).remove().draw();                        
                      }
                    });
                  }
                });
              }              
            }
            cargarUsuario(opc,"usuario_receptor","id_usuario_receptor");
            flagSelect++;
           }
        });
      })
      .change();


    //Agrega campos extras dependiendo del tipo de origen
    function form_tipo_origen(origen){
      if(origen == "Externo"){
        /*Cargar form de oficio externo*/
        $('#formExterno').show();
        $('#formInterno').hide();

      }
      else if(origen == "Interno"){
        /*Cargar form de oficio interno*/
        $('#formExterno').hide();
        $('#formInterno').show();
      }

    }
    //Carga el usuario correspondiente
    function cargarUsuario(id_area,selector,selector2){
        $.ajax({
          method: "POST",
          // url: "?c=OfcPartes&a=buscarUsuario",
          url: GLOBAL_PATH+"ofcpartes/buscarUsuario",
          data: { id_area : id_area }
        })
          .done(function( res ) {

            
            
            var respuesta = JSON.parse(res);
            if(respuesta.success){
                $("#"+selector).val(respuesta.data[0].nombre_formal);
                $("#"+selector2).val(respuesta.data[0].id_usuario);
                ocultarUsuarios(respuesta.data);
            }
            else{
                //mensaje de error
                 $("#"+selector).val("");
            }
          })
          .fail(function( jqXHR, textStatus ) {
              alert( "Request failed: " + textStatus );
        });
    }

    // $( "#btn-cancelar" ).click(function() {
    //   location.href = "sigi.php";
    // });

    

    
    



})

