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
      $tususigi = $mostrarx['priv_sigi'];
      $tususiu = $mostrarx['priv_sui'];
      $tususia = $mostrarx['priv_sia'];


      $nombre = $mostrarx['nombre'];
      $apelli = $mostrarx['apellido'];
      $idx = $mostrarx['id'];
      $are = $mostrarx['area'];

      $_SESSION['loggedin'] = true;
      $_SESSION['nom'] = $nombre;
      $_SESSION['ape'] = $apelli;
      $_SESSION['cor'] = $user;
      $_SESSION['prv'] = $tusu;

      $_SESSION['prvsigi'] = $tususigi;
      $_SESSION['prvsiu'] = $tususiu;
      $_SESSION['prvsia'] = $tususia;

      $_SESSION['idx'] = $idx;
      $_SESSION['are'] = $are;
      $_SESSION['con'] = md5($_POST['password']);

      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'];
      $nombre_formal = ucwords(mb_strtolower(utf8_encode($mostrarx['nombre_formal']),'UTF-8'));

      // print_r($nombre_formal);exit;

      $ip = '';
      if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown"))
         $ip = getenv("HTTP_CLIENT_IP");
      else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
         $ip = getenv("HTTP_X_FORWARDED_FOR");
      else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
         $ip = getenv("REMOTE_ADDR");
      else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
         $ip = $_SERVER['REMOTE_ADDR'];
      else
         header("Location: https://www.google.com.mx");

      $_SESSION['data_user'] = array(
          'nombre_formal' => $nombre_formal ,
          'nombre' =>  $nombre,
          'apellido' =>  $apelli,
          'correo' =>  $user,
          'privilegios' => $mostrarx['priv_sigi'],
          'id' =>  $idx,
          'area' =>  $are,
          'titular' => $mostrarx['titular'],
          'ip' => $ip
      );

      $time = time();
      $secret_key = 'Sdw1s9x8784455gtykifd335@';
      $secret_keySession = 'SSsgi1s9x8784455gtykifd335@';

      $token = array(
           'iat' => $time,
           'exp' => $time + (60*60*12),
           'data' => $_SESSION['data_user']
       );
      
      $dataSession = array(
          'iat' => $time,
          'exp' => $time + (60*60*12),
          'ip' => $ip
      );

      $tokenSession = JWT::encode($dataSession, $secret_keySession);
      $_SESSION[$tokenSession] = true;
      $_SESSION['token'] = JWT::encode($token, $secret_key);

      /*
      Setcookie(nombre , valor, duracion, ruta, dominio, seguridad)
      Setcookie("nombre", "Juancito", false);
      setcookie('nombr', $nomb, false, '/account', 'www.example.com);
      setcookie('corre', $user, false, '/account', 'www.example.com);
      setcookie('privi', $tusu, false, '/account', 'www.example.com);
      setcookie('contr', md5($_POST['password']), false, '/account', 'www.example.com);*/
      
      $host  = $_SERVER['HTTP_HOST'];
      $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'menu_inicial';

      // print_r($uri);exit; 
      header("Location: http://$host$uri/$extra");
    }
  }
  else{

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'menu_inicial';
      
    header("Location: http://$host$uri/$extra");
  }
?>