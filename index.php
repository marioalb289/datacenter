<?php
session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['nom']);
    unset($_SESSION['ape']);
    unset($_SESSION['cor']);
    unset($_SESSION['prv']);
    unset($_SESSION['idx']);
    unset($_SESSION['are']);
    unset($_SESSION['con']);
    unset($_SESSION['start']);
    unset($_SESSION['expire']);
    unset($_SESSION['prvsigi']);
    unset($_SESSION['prvsiu']);
    unset($_SESSION['prvsia']);
    session_destroy();


      // $httpsURL = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
      // if( count( $_POST )>0 )
      //   die( 'Page should be accessed with HTTPS, but a POST Submission has been sent here. Adjust the form to point to '.$httpsURL );
      // if( !isset( $_SERVER['HTTPS'] ) || $_SERVER['HTTPS']!=='on' ){
      //   if( !headers_sent() ){
      //     header( "Status: 301 Moved Permanently" );
      //     header( "Location: $httpsURL" );
      //     exit();
      //   }else{
      //     die( '<script type="javascript">document.location.href="'.$httpsURL.'";</script>' );
      //   }
      // }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Agenda Institucional</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="AI/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="AI/css/main.css" rel="stylesheet" media="screen">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/perspectiveRules.css" rel="stylesheet" />
</head>
<style>
  .fullpage {
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:3;
  }

  .login-con {
    width:100%;
    position:absolute;
    top:50%;
    text-align:center;
    z-index:inherit;
  }

  .login {
    position: absolute;
    display: inline-block;
    width: 300px;
    height: 210px;
    margin-top: -205px;
    margin-left: -150px;
    background:#f1f1f1;
    color:#222;
    text-align: left;
    border-radius: 2px;
    box-shadow: 22px 21px 15px rgba(0, 0, 0, 0.75);
    padding: 32px;
    z-index:inherit;
  }

  .title {
    font-size: 32px;
    padding-bottom: 20px;
    display:block;
  }

  input {
    width: 100%;
  }

</style>
<body>

  

  <div id="demo1">
      <img alt="background" src="image/f3ondoindex.jpg" />
      <img alt="ui" src="" />
      <img alt="ui-2" src="" />
  </div>
  
        <div class="fullpage">
        <div class="login-con">
          <div class="login" style="height: auto; background: rgba(255, 255, 255, 0.52); border-radius: 21px;">
            
            <img src="image/iepc.png" style="width: 100%;margin: 0 auto;">
            <br><br>
            <form class="form-signin" name="form1" method="post" action="checklogin.php">
                <input name="username" id="username" type="email" class="form-control" placeholder="Correo Electronico" autofocus required=""><br>
                <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" required=""><br>
                <button name="Submit" style="background: #9a0000; border-color: #9a0000;" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
                <div id="message"></div>
            </form>

          </div>
        </div>
      </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="jquery.logosDistort.js"></script>
  <script src="assets/js/jquery.particleground.min.js"></script>
  <script>
      var distort = new logosDistort(
        document.getElementById('demo1'),
        {perspectiveMulti: 1.0}
      );
  </script>

</body>
</html>
