<?php
session_start();
    if (isset($_SESSION['nom']) && isset($_SESSION['cor']) && isset($_SESSION['prv']) && isset($_SESSION['con'])){

        include('AI/detalles/class/classAsistencias.php');
        $clase = new sistema;
        /*
        $_SESSION['nom'];
        $_SESSION['cor'];
        $_SESSION['prv'];
        $_SESSION['con'];
        */
        if ($_SESSION['prv'] == 7) {
            $tipUSU = 1;
        }
        if ($_SESSION['prv'] == 1) {
            $tipUSU = 0;
        }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Elige un sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="AI/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="AI/css/main.css" rel="stylesheet" media="screen">
    <style type="text/css">
        .if-image {
            filter: grayscale(90%);
            -webkit-filter: grayscale(90%);
            transition:filter 9s;
            -webkit-transition:-webkit-filter 9s;

        }

        .if-image {
            filter: grayscale(90%);
            -webkit-filter: grayscale(90%);
            transition:filter 9s;
            -webkit-transition:-webkit-filter 9s;
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
            transition:transform 0.9s;
            -webkit-transition:-webkit-transform 0.9s;
            border-radius: 25px;
            -webkit-transition:-webkit-transform 1s;
            -webkit-box-shadow: 0px 0px 46px -1px rgba(0,0,0,0.4);
            -moz-box-shadow: 0px 0px 46px -1px rgba(0,0,0,0.4);
            box-shadow: 0px 0px 46px -1px rgba(0,0,0,0.4); 

        }

        .if-image:hover {
            -webkit-transition:-webkit-transform 2.5s;
            -webkit-box-shadow: 0px 19px 46px -1px rgba(0,0,0,1);
            -moz-box-shadow: 0px 19px 46px -1px rgba(0,0,0,1);
            box-shadow: 0px 19px 46px -1px rgba(0,0,0,1);
            filter: grayscale(0);
            -webkit-filter: grayscale(0);
            -webkit-transform: scale(1);
            transition:filter 9s;
            transform: scale(1);
            transition:transform 0.9s;
        }
    .men:hover {
        background-color: #ab207d;
    }
    </style>
  </head>

  <body style="background: url('https://www.toptal.com/designers/subtlepatterns/patterns/crossword.png');">
                <ul style="list-style-type: none;margin: 0;padding: 0;overflow: hidden;background-color: #8c1b67;top: 0;width: 100%;margin-top: -40px;">
                    <li style="float: left;" class="men">
                        <a style="display: block; font-weight: 600; color: white; padding: 16px; text-decoration: none;" href="#info">
                            Bienvenido <?php echo utf8_encode($_SESSION['nom']).' '.utf8_encode($_SESSION['ape']);?>
                        </a>
                    </li>
                    <li style="float: left;" class="men">
                        <a style="display: block; font-weight: 600; color: white; padding: 16px; text-decoration: none;" href="index.php">
                           Cerrar Sessión
                        </a>
                    </li>
                </ul>
    <div class="container" style="text-align: center;background: rgba(255, 255, 255, 0.67); margin: 0 auto; padding: 1%;border-radius: 35px;">
        <h2 class="form-signin-heading"><b>Elige un sistema</b></h2>
        <a style="text-decoration: none; color: white;" href="AI/solicitudes.php">
            <img src="AI/image/iconoAI.png" class="if-image" title="Agenda Institucional" style="width: 25%; margin: 2% auto;">
        </a>
        <a style="text-decoration: none; color: white;" href="http://www.iepcdurango.mx/SIU/1003150041/iepc/2/inicio?0409199127032017=<?echo $_SESSION['cor'];?> ">
            <img src="AI/image/iconoSIU.png" class="if-image" title="Soporte Informatico a Usuarios" style="width: 25%; margin: 2% auto;">
        </a>
        <a style="text-decoration: none; color: white;" href="#">
            <img src="AI/image/iconoSIA.png" class="if-image" title="Sistema de Inventario y Administración" style="width: 25%; margin: 2% auto;">
        </a>
        <a style="text-decoration: none; color: white;" href="#">
            <img src="AI/image/iconoAE.png" class="if-image" title="Agenda Electoral" style="width: 25%; margin: 2% auto;">
        </a>
        <a style="text-decoration: none; color: white;" href="sigi.php">
            <img src="AI/image/iconoSIGI.png" class="if-image" title="Sistema de Gestión de Información" style="width: 25%; margin: 2% auto;">
        </a>

    </div>
    <script src="AI/js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="AI/js/bootstrap.js"></script>
    <script src="AI/js/login.js"></script>

  </body>
</html>
    <?php
                }
        else{

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
            session_destroy();

            header('Location: index.php');
        }
    ?>