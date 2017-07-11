<!-- Modal -->
<div class="modal fade" id="cancelar_solicitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><i class="glyphicon glyphicon-question-sign"></i> Advertencia</h1>
            </div>
            <div class="modal-body">
              <p>Al cancelar la solicitud, ningun usuario podrá verlo. </p>
              <p>Los cambios no se pondrán deshacer. </p>
              <p><strong>¿Deseas continuar?</strong></p>
            </div>
            <div class="modal-footer">
            <a style="width: 100px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='#' type="button" class="btn btn-primary pull-left" name="btn-cancelar" id="btn-responder" data-dismiss="modal" role="button">No</a>
                <a style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;padding: 9px 12px;" href='' type="button" class="btn btn-primary" name="btn-cancelar" id="btn-confirmar" role="button">Si</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Modal -->

<div class=" jumbotron sigi-welcome" style="margin-top: 10px; padding: 30px 15px; background-color: #8c1b67;">
  <img src="AI/image/sigi_blanco.png" style="height: 75px;">
</div>
<div class="row">

  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-4"><h4>Filtros</h4></div>
            <div class="col-md-8 text-right">
                <button style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="button" class="btn btn-primary" id="btn_remove_filtros">Quitar Filtros</button>
                <button style="width: 120px;height:40px;background: #8c1b67;border-color: #8c1b67;" type="button" class="btn btn-primary" id="btn_rep_todo"><span class='glyphicon glyphicon-print' style='letter-spacing: 3px;color: #fff;font-weight: 900;'></span>Imprimir</button>
            </div>
          </div>    
        </div>
        <div class="panel-body">
        
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="institucion_emisor" id="lbl_institucion_emisor" class="required">Filtrar por Fecha:</label>
                    <div class="row">
                          <div class="col-md-6">
                            <label for="">Desde:</label>
                            <input type="text" id="fecha_inicio" name="fecha_inicio"  class="form-control input-sm" placeholder="Fecha Inicio" tabindex="-1" style="cursor: auto;display: inline; width: 70%; margin-left: 10px;" />                                  
                          </div>
                          <div class="col-md-6">
                            <label for="">Hasta:</label>
                            <input type="text" id="fecha_fin" name="fecha_fin"  class="form-control input-sm" placeholder="Fecha Fin" tabindex="-1" style="cursor:auto;display: inline; width: 70%; margin-left: 10px;" />
                          </div>
                    </div>
                    
                    <span class="text-danger"></span>
                </div>  
              </div>
              <div class="col-md-3">        
                  
                <div class="form-group">
                    <label for="" class="required">Filtrar por Área:</label>
                    <select class="form-control input-sm" id="filtro_area"  >
                      <option value="">Selecccionar Area</option>
                      <option value="0">Todas</option>
                      <?php foreach($data['areas'] as $area): ?>
                          <option value="<?php echo $area->id; ?>"><?php echo $area->nombre; ?></option>
                      <?php endforeach; ?>              
                         </select>
                    <span class="text-danger"></span>
                </div> 
                
              </div>
              <div class="col-md-3">        
                  
                <div class="form-group">
                    <label for="" class="required">Filtrar por Estatus Final:</label>
                    <select class="form-control input-sm" id="filtro_estatus_final"  >
                        <option value="">Selecccionar</option>
                        <option value="1">Cerrado</option>
                        <option value="2">Abierto</option>
                        <option value="3">Cancelado</option>
                        <span class="text-danger"></span>
                      </select>
                    <span class="text-danger"></span>
                </div> 
                
              </div>               
            </div>
        </div>
      </div>
    <div class="panel with-nav-tabs panel-default">
      <div class="panel-heading">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab1default" data-toggle="tab">Listar Oficios Externos</a></li>
          <li><a href="#tab2default" data-toggle="tab">Listar Oficios Internos</a></li>
          
          <li><a href="#oficios_destino_externo" data-toggle="tab">Listar Oficios con Destino Externo</a></li>
          <?php if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2){ ?>
          <li><a href="#respuestas_enviadas" data-toggle="tab">Respuestas Enviadas</a></li>
          <?php } ?>
          <li><a href="#tab_sol_entrantes" data-toggle="tab">Solicitudes Entrantes</a></li>
          <li><a href="#tab_sol_salietes" data-toggle="tab">Solicitudes Salientes</a></li>
        </ul>
      </div>
      <div class="panel-body">
        <div class="tab-content">
          <div class="tab-pane fade in active" id="tab1default">
            <!-- contenido tab externo -->
            <!-- <div class="col-md-12" style="text-align: center; top: 30px; display: none;" id="div_recargar_externos">
              <button style="" type="button" class="btn btn-default btn-md" name="btn_recargar" id="btn_recargar_externos" style="float: right;height: 30px;font-size: 12px;"><span class="glyphicon glyphicon-refresh" style="color: #5cb85c;font-weight: 900;"></span>Recargar</button>
            </div> -->

            <div class="col-md-12">
              <table id="lista_oficios_externos" class="table  table-bordered table-hover display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>N° Oficio</th>
                        <th>Nombre Suscribe</th>
                        <th>Institucion</th>
                        <th>Asunto</th>
                        <th>Area Destino</th>
                        <th>Estatus Inicial</th>
                        <th>Estatus Final</th>
                        <th>Fecha Recibido</th>
                        <th>Visto</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
              </table>
            </div>
            
          </div>
          <div class="tab-pane fade" id="tab2default">
            <!-- contenido tab interno -->
            <div class="col-md-12">
              <table id="lista_oficios_internos" class="table  table-bordered table-hover display dt-center " cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Folio</th>
                      <th>N° Oficio</th>
                      <th>Area Origen</th>
                      <th>Usuario</th>
                      <th>Asunto</th>
                      <th>Estatus Inicial</th>
                      <th>Estatus Final</th>
                      <th>Fecha Recibido</th>
                      <th>Visto</th>
                      <th ></th>
                      <th ></th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
          
          <div class="tab-pane fade" id="oficios_destino_externo">
            <!-- contenido tab oficios externos -->
            <div class="col-md-12">
              <table id="lista_oficios_destino_externo" class="table  table-bordered table-hover display dt-center " cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Folio</th>
                      <th>N° Oficio</th>
                      <th>Area Origen</th>
                      <th>Usuario</th>
                      <th>Dependencia</th>
                      <th>Asunto</th>
                      <th>Estatus Inicial</th>
                      <th>Estatus Final</th>
                      <th>Fecha Recibido</th>
                      <th>Visto</th>
                      <th ></th>
                      <th ></th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="respuestas_enviadas">
            <!-- contenido tab respuestas enviadas -->
            <div class="col-md-12">
              <table id="lista_respuestas" class="table table-bordered table-hover display compact" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Folio</th>
                      <th>N° Oficio</th>
                      <th>Origen</th>
                      <th>Persona que Recibe</th>
                      <th>Asunto</th>
                      <th>Estatus</th>
                      <th>Fecha Enviado</th>
                      <th>Visto</th>
                      <th style="width: 60px;"></th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>

          <div class="tab-pane fade" id="tab_sol_entrantes">
            <!-- contenido tab respuestas enviadas -->
            <div class="col-md-12">
              <table id="lista_solicitudes_entrantes" class="table  table-bordered table-hover display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>N° Oficio</th>
                        <th>Emisor</th>
                        <th>Asunto Emisor</th>
                        <th>Estatus Inicial</th>
                        <th>Estatus Final</th>
                        <th>Fecha Recibido</th>
                        <th>Visto</th>
                        <th></th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>

          <div class="tab-pane fade" id="tab_sol_salietes">
            <!-- contenido tab respuestas enviadas -->
            <div class="col-md-12">
              <table id="lista_solicitudes_salientes" class="table  table-bordered table-hover display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>N° Oficio</th>
                        <th>Receptor</th>
                        <th>Asunto Receptor</th>
                        <th>Estatus Inicial</th>
                        <th>Estatus Final</th>
                        <th>Fecha Recibido</th>
                        <th>Visto</th>
                        <th></th>
                    </tr>
                </thead>
              </table>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){

    var currentDate = new Date();

    $("#fecha_inicio").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 0,
        changeYear: false,
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]
    }).attr('readonly', 'readonly');

    $("#fecha_fin").datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: 0,
        changeYear: false,
        monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]
    }).attr('readonly', 'readonly');
    //$("#fecha_inicio").datepicker("setDate", "yy-mm-dd");

    var fehca_inicio = document.getElementById('fecha_inicio');
    var fecha_fin = document.getElementById('fecha_fin');

    fehca_inicio.onchange = function(){
          // console.log(fecha_inicio);
          // console.log(moment(fehca_inicio.value));
       if(fecha_fin.value != ""){
          if(!moment(moment(fecha_fin.value)).isBefore(moment(fecha_inicio.value))){
            // console.log('filtrar');
            filtrar();
          }
          else{
            bootbox.alert({ 
              title: "Error",
              message: "La fecha de Inicio debe ser Menor a la fecha Final",
              type: "danger"
            })
          }
       }
    }
    fecha_fin.onchange = function(){
       if(fecha_inicio.value != ""){
          if(!moment(moment(fecha_fin.value)).isBefore(moment(fecha_inicio.value))){
            // console.log('filtrar');
            filtrar();
          }
          else{
            bootbox.alert({ 
              title: "Error",
              message: "La fecha de Inicio debe ser Menor a la fecha Final",
              type: "danger"
            })
          }
       }
    }
    
    //Evento para filtrar por area
    var filtro_area = document.getElementById('filtro_area');
    $( "#filtro_area" )
      .change(function () {
        var str = "";
        $( "#filtro_area option:selected" ).each(function() {
           opc = parseInt($(this)[0].value);
           if(opc >= 0) {
            
            filtrar();
            // console.log('opc',opc);
            //cargarUsuario(opc,"usuario_receptor","id_usuario_receptor")
           }
        });
      })
      .change();
    //Evento para filtrar por estatus
    var filtro_estatus_final = document.getElementById('filtro_estatus_final');
    $( "#filtro_estatus_final" )
      .change(function () {
        var str = "";
        $( "#filtro_estatus_final option:selected" ).each(function() {
           opc = parseInt($(this)[0].value);
           if(opc >= 0) {
            
            filtrar();
            // console.log('opc',opc);
            //cargarUsuario(opc,"usuario_receptor","id_usuario_receptor")
           }
        });
      })
      .change();
    function filtrar(){
      $('#lista_oficios_internos').DataTable().ajax.reload();
      $('#lista_oficios_externos').DataTable().ajax.reload();
      $('#lista_oficios_destino_externo').DataTable().ajax.reload();
    }

    $("#btn_remove_filtros").click(function(){
      $("#fecha_fin").val("");
      $("#fecha_inicio").val("");
      $("#filtro_area").val("");
      $("#filtro_estatus_final").val("");
      filtrar();
    })

  })

  

</script>