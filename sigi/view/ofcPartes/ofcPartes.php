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
                      <th style="width: 60px;"></th>
                      <th style="width: 60px;"></th>
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