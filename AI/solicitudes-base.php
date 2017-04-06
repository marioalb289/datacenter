<?php
    include('detalles/class/classAsistencias.php');
    $clase = new sistema;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de solicitudes</title> 
<link href="detalles/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="detalles/css/estilos.css" rel="stylesheet">
<script src="detalles/js/jquery.js"></script>
<script src="detalles/js/myjava.js"></script>
<script src="detalles/bootstrap/js/bootstrap.min.js"></script>
<script src="detalles/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<section>
    <h2>Historial de soliciudes</h2>
    <br />
    <input type="button" value="GENERAR NUEVA SOLICITUD" id="nuevaAsistencia" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"/>
    <br />
    <br />
    <table class="table table-bordered table-condensed table-hover">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>LUGAR</th>
                <th>FECHA</th>
                <th>AREA</th>
                <th>USUARIO</th>
                <th>ESTADO</th>
                <th>EDITAR</th>
            </tr>
        </thead>
        <tbody>
            <?php $clase->conexion();
                     $clase->mostrarAsistencias(); ?>
        </tbody>
    </table>
</section>

<!-- MODAL DE REGISTRO -->

 <div class="modal fade" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><b>Nueva solicitud</b></h4>
            </div>
            <div class="modal-body">
            <form method="post" action="" enctype="multipart/form-data">
                <table class="tbl-registro" width="100%">
                    <tbody><tr>
                        <td><b>Nombre del evento:</b></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="form-control" rows="5" id="nombre" name="nombre" style="max-width: 549px;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Lugar del evento:</b></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="form-control" rows="5" id="lugar" name="lugar" style="max-width: 549px;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Fecha:</b></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" required class="form-control" min=<?php date_default_timezone_set("Etc/GMT-6"); $hoy=date("Y-m-d");  $ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );  echo $ayer;?> /></td>
                    </tr>
                    <tr>
                        <td><b>Hora:</b></td>
                    </tr>
                    <tr>
                        <td>

                        <input type="time" name="hora" id="hora" placeholder="Introduce una Hora" required class="form-control" /></td>
                    </tr>
                    <tr>
                        <td><b>Area</b></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="seccion" class="form-control" required>
                                <option value="" selected="">Seleccionar un area</option>
                                <?php 
                                    $clase->conexion();
                                    $clase->mostrararea(); 
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Seleccionar foto:</b></td>
                    </tr>
                    <tr>
                        <td>
                            <input name="foto1" type="file" id="foto1" style="margin: 0 auto;" required accept="image/*">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><input id="kkkkkk" name="kkkkkk" type="submit" value="Subir Nota" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
                    </tr>

                </tbody></table>
            </form>
            </div>
          </div>
        </div>
      </div> 

</body>
</html>