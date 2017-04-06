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
    unset($_SESSION['data_user']);
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="AI/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="AI/css/main.css" rel="stylesheet" media="screen">
  </head>

  <body style="background: rgba(255, 255, 255, 0.67);text-align: center;background: url('https://www.toptal.com/designers/subtlepatterns/patterns/crossword.png');">
    
    <img src="AI/image/iepc.png" style="width: 40%;margin: 0 auto;">
    <br><br>
      <form class="form-signin" name="form1" method="post" action="checklogin.php">
        <input name="username" id="username" type="email" class="form-control" placeholder="Correo Electronico" autofocus required=""><br>
        <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" required=""><br>
        <button name="Submit" style="background: #9a0000; border-color: #9a0000;" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>

        <div id="message"></div>
      </form>




  </body>
</html>