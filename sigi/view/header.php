<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Sistema de Gestion de Información</title>
        
        <meta charset="utf-8" />
        
        <link rel="stylesheet" href="sigi/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="sigi/assets/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="sigi/assets/css/jasny-bootstrap.css" />
        <!-- <link rel="stylesheet" href="sigi/assets/css/bootstrap-theme.min.css" />         -->
        <link rel="stylesheet" href="sigi/assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="sigi/assets/css/style.css" />
        
        <script src="sigi/assets/js/jquery.js"></script>
        <script src="sigi/assets/js/jquery-ui/jquery-ui.min.js"></script>
	</head>
    <body style="min-width: 960px !important;">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container" style="width: auto;">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a style="display: block; font-weight: 600; color: white; margin-top: 10px; text-decoration: none;" href="sigi.php">
            <img src="AI/image/sigi_blanco.png" style="width: 100px;padding-top: 7px;">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="sigi.php">Listar Oficios</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrar Oficio <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="?c=OfcPartes&a=add">Crear Oficio</a></li>
                <?php if($_SESSION['data_user']['privilegios'] == 3){ ?>
                  <li><a href="?c=OfcPartes&a=addExterno">Crear Oficio con destino Externo</a></li>
                <?php } ?>
              </ul>
            </li>
            <li style="float: left;" class="men">
                <a  href="menu_inicial.php">Menú Principal</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right"> 
            <li style="float: left;" class="men">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <span class="glyphicon glyphicon-user"></span> 
                   <strong><?php echo $_SESSION['data_user']['nombre'].' '.$_SESSION['data_user']['apellido']?></strong>
                   <span class="glyphicon glyphicon-chevron-down"></span>
               </a>
                
            </li>           
            <li style="float: left;" class="men">
                <a href="index.php"><strong>Cerrar Sessión</strong></a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
        
    <div class="container" style="width: auto;">
    <?php //print_r($_SESSION); ?>

    <script type="text/javascript">
    var USER_PRIV = <?php echo $_SESSION['data_user']['privilegios']; ?>;
    var ID_USER = <?php echo $_SESSION['data_user']['id']; ?>;

  </script>
    <!-- <div class="alert alert-success">
      <strong>Success!</strong> This alert box could indicate a successful or positive action.
    </div> -->
    <!-- <div class="alert alert-danger">
      <strong>Danger!</strong> This alert box could indicate a dangerous or potentially negative action.
    </div> -->

    <?php if( isset($_SESSION["flash-message-error"]) && $_SESSION["flash-message-error"] != ''){
        ?>
        <div class="alert alert-danger">
            <strong>Atencion!</strong> <?php echo $_SESSION["flash-message-error"]; ?>
          </div>
      <?php  $_SESSION["flash-message-error"] = '';
      } ?>
    <?php if( isset($_SESSION["flash-message-success"]) && $_SESSION["flash-message-success"] != ''){
        ?>
        <div class="alert alert-success">
          <strong>Atención!</strong> <?php echo $_SESSION["flash-message-success"] ?>
        </div>
      <?php  $_SESSION["flash-message-success"] = '';
      } ?>

        

