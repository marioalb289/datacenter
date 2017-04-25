<?php
session_start();
  include('AI/detalles/class/classAsistencias.php');
  $clase = new sistema;
  $clase->conexion();
  $u = md5($_POST['username']);
  $p = md5($_POST['password']);

  $sql = mysql_query("SELECT * FROM usuarios WHERE estado = '1' AND correo = '".$u."' AND contrasena = '".$p."'");
  if(mysql_num_rows($sql)>0){
    while($mostrarx = mysql_fetch_array($sql)){

      
      $user = $mostrarx['correo'];
      $tusu = $mostrarx['privilegios'];
      $nombre = $mostrarx['nombre'];
      $apelli = $mostrarx['apellido'];
      $idx = $mostrarx['id'];
      $are = $mostrarx['area'];
      $_SESSION['loggedin'] = true;
      $_SESSION['nom'] = $nombre;
      $_SESSION['ape'] = $apelli;
      $_SESSION['cor'] = $user;
      $_SESSION['prv'] = $tusu;
      $_SESSION['idx'] = $idx;
      $_SESSION['are'] = $idx;
      $_SESSION['con'] = md5($_POST['password']);

      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'];

      $_SESSION['data_user'] = array(
          'nombre' =>  $nombre,
          'apellido' =>  $apelli,
          'correo' =>  $user,
          'privilegios' =>  $tusu,
          'id' =>  $idx,
          'area' =>  $are,
      );


      /*
      Setcookie(nombre , valor, duracion, ruta, dominio, seguridad)
      Setcookie("nombre", "Juancito", false);
      setcookie('nombr', $nomb, false, '/account', 'www.example.com);
      setcookie('corre', $user, false, '/account', 'www.example.com);
      setcookie('privi', $tusu, false, '/account', 'www.example.com);
      setcookie('contr', md5($_POST['password']), false, '/account', 'www.example.com);*/
        
      header('Location: menu_inicial.php');
    }
  }
  else{
      
    header('Location: index.php');
  }
?>