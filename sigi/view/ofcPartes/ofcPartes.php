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

<div class=" jumbotron sigi-welcome" style="margin-top: 25px;">
  <h1>SIGI</h1>
  <p>Sistema de Gestion de Información</p>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel with-nav-tabs panel-default">
      <div class="panel-heading">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab1default" data-toggle="tab">Listar Oficios Externos</a></li>
          <li><a href="#tab2default" data-toggle="tab">Listar Oficios Internos</a></li>
          <?php if($_SESSION['data_user']['privilegios'] == 3){ ?>
          <li><a href="#respuestas_enviadas" data-toggle="tab">Respuestas Enviadas</a></li>
          <?php } ?>
          <li><a href="#oficios_destino_externo" data-toggle="tab">Listar Oficios con Destino Externo</a></li>
        </ul>
      </div>
      <div class="panel-body">
        <div class="tab-content">
          <div class="tab-pane fade in active" id="tab1default">
            <!-- contenido tab externo -->
            <div class="col-md-12">
              <table id="lista_oficios_externos" class="table  table-bordered table-hover display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Nombre Suscribe</th>
                        <th>Institucion</th>
                        <th>Asunto</th>
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
                      <th>Area</th>
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
          <div class="tab-pane fade" id="respuestas_enviadas">
            <!-- contenido tab interno -->
            <div class="col-md-12">
              <table id="lista_respuestas" class="table table-bordered table-hover display compact" cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Folio</th>
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
          <div class="tab-pane fade" id="oficios_destino_externo">
            <!-- contenido tab interno -->
            <div class="col-md-12">
              <table id="lista_oficios_destino_externo" class="table  table-bordered table-hover display dt-center " cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th>Folio</th>
                      <th>Folio Institucional</th>
                      <th>Area</th>
                      <th>Usuario</th>
                      <th>Dependencia</th>
                      <th>Asunto</th>
                      <!-- <th>Estatus Inicial</th> -->
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
        </div>
      </div>
    </div>
  </div>
</div>