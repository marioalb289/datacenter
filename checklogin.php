<?php
session_start();
  include('AI/detalles/class/classAsistencias.php');
  require __DIR__ . '/vendor/autoload.php';
  use Firebase\JWT\JWT;
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
          'privilegios' => $mostrarx['priv_sigi'],
          'id' =>  $idx,
          'area' =>  $are,
      );

      $time = time();
      $secret_key = 'Sdw1s9x8784455gtykifd335@';
      
      $token = array(
          'iat' => $time,
          'exp' => $time + (60*60*12),
          'data' => $_SESSION['data_user']
      );

      $_SESSION['token'] = JWT::encode($token, $secret_key);


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