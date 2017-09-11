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
          console.log(dash_localVar);
          if(dash_localVar){
   
              $(".dashboard_tabs_cl > li").removeClass("active");
              $(".tab-content > div").removeClass("active");
   
              var hrefAttr = "a[href=\'"+dash_localVar+"\']";
              console.log($(""+dash_localVar+""));
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
        //console.log(params);
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
      // console.log('aqui datos button', recipient);
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
                console.log(d);
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
                    return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row.fecha_visto).format('DD/MM/YYYY, HH:mm')+"'>";

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
          //console.log( 'DataTables has finished its initialisation.' );
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
                    return  "<img src='AI/image/9.png' style='width:25px' title='Visto "+moment(row.fecha_visto).format('DD/MM/YYYY, HH:mm')+"'>";

                },
            },
            {
                "targets": -1,
                "data": null, 
                //"visible": ocultarColumnas(USER_PRIV),
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    if(row.tipo_oficio=="RESPUESTA")
                      return "";
                    else
                      return  "<a data-toggle='modal' data-target='#cancelar_solicitud' data-whatever='"+GLOBAL_PATH+"ofcpartes/cancel/"+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Cancelar</a>";
                },
            },
            {
                "targets": -1,
                "data": null, 
                //"visible": ocultarColumnas(USER_PRIV),
                "orderable" : false,
                "className": "dt-center",
                "render": function ( data, type, row ) {
                    // if(row.estatus_final == "Revision")
                    if(1==1)
                      return  "<a href='"+GLOBAL_PATH+"ofcpartes/edit/"+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs edit' style='width:60px'>Editar</a>";
                    else
                      return "";
                },
            }
        ] ,       
      language: language,
      "order": [[ 7, 'desc' ]],
      "createdRow": function( row, data, dataIndex ) {
        $(row).click(function(e) {
          console.log(e.target);
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
          //console.log( 'DataTables has finished its initialisation.' );
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
          console.log(data);
          $(row).click(function(e) {
            if($(e.target).is('a')){
              e.preventDefault();
              return;
            }
            window.location.href = GLOBAL_PATH+"ofcpartes/view/"+parseInt( data[1]);
          });
        },

      });

     

    //Evento del paginador de oficios con destino externo a los que se les puede vincular un ofocio
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
            { "data": "emisor", "searchable": false,"orderable": false },
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
                    return  "<a href='"+GLOBAL_PATH+"ofcpartes/view/"+parseInt( row.DT_RowId.substring(4))+"' class='btn btn-default btn-xs' style='width:60px'>Ver</a>";
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
    var flag = false;
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
          console.log( 'DataTables has finished its initialisation.' );
          $( "#example_filter" ).prepend( "<button type='button' class='btn btn-default btn-md' id='btn_enviar_todos' style='float: right;height: 30px;font-size: 12px;margin-left: 5px;'><span class='glyphicon glyphicon-ok' style='color: #5cb85c;font-weight: 900;'></span>Seleccionar Todo</button>" );
          $( "#btn_enviar_todos" ).click(function() {
            var count = $('#example').DataTable().$('tr').length;
            var i = 1;
            $('#example').DataTable().$('tr').each(function (){
              $(this).removeClass( "success" );
              if(!flag){
                $(this).addClass("success");
                if(i++ == count){
                  flag = true;
                }
              }
              if(i++ == count){
                flag = false;
              }
            });
          });
        }

    });

    

    $('#example tbody').on( 'click', 'tr', function () {
          $(this).toggleClass('success');
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
          console.log( 'DataTables has finished its initialisation.' );
        }

    });

    t2.on( 'order.dt search.dt', function () {
        t2.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#lista_usuarios_recibidos tbody').on( 'click', 'tr', function () {
        areaM = $( "#area_destino option:selected" )[0].text; 
        select = $('#lista_usuarios_recibidos').dataTable().fnGetData( this );
        console.log(select);
        if( areaM == select[4] && parseInt(select[2]) == 1){
          //Mensaje de error
          bootbox.alert({ 
            title: "Error",
            message: select[3]+" es un usuario titular del Área destino, seleccione otra area para cambiarlo.",
            type: "danger"
          })
          return;
        }
        $(this).toggleClass('danger');
      } );

    

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
          // url: "?c=OfcPartes&a=buscarUsuario",
          url: GLOBAL_PATH+"ofcpartes/buscarUsuario",
          data: { id_area : id_area }
        })
          .done(function( res ) {

            
            
            var respuesta = JSON.parse(res);
            // console.log(respuesta);
            if(respuesta.success){
                console.log(respuesta);
                $("#"+selector).val(respuesta.data[0].nombre_formal);
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

    // $( "#btn-cancelar" ).click(function() {
    //   location.href = "sigi.php";
    // });

    

    
    



})

