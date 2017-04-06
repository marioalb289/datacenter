<?php
  include('detalles/class/classAsistencias.php');
  $clase = new sistema;
  $clase->conexion();
  $id = $_GET['NS'];
  $estado = $_GET['esado'];
  date_default_timezone_set("Etc/GMT-6");
  $hoy=date("Y-m-d H:i:s");

  $sql = mysql_query("SELECT * FROM solicitudes WHERE id = '".$id."'");
  if(mysql_num_rows($sql)>0){
    while($mostrarx = mysql_fetch_array($sql)){
      if ($estado == '0') {
        $mensaje = "----- La solicitud fue cancelada el ".$hoy." por el usuario ".$_COOKIE['nom']." ".$_COOKIE['ape']." <br> \n";
      }
      if ($estado == '9') {
        $mensaje = "----- La solicitud fue aceptada el ".$hoy." por el usuario ".$_COOKIE['nom']." ".$_COOKIE['ape']." <br> \n";
      }
      $mensajeF = $mostrarx['ediciones'].$mensaje;
      $sqlx = mysql_query("UPDATE solicitudes SET estado = '".$estado."', ediciones = '".$mensajeF."' WHERE id = '".$id."'");
      if($sqlx){
        header('Location: solicitudes.php');
      }
      else{
        header('Location: solicitudes.php');
      }
    }
  }
  else{
    header('Location: index.php');
  }
?>

