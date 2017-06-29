<!DOCTYPE html>
<html lang="es">
	<head>
    <base href="/datacenter/" >
		<title>Sistema de Gestion de Información</title>
        
        <meta charset="utf-8" />
        
        <link rel="icon" type="image/png" href="AI/image/logo.png" />
        <link rel="stylesheet" href="sigi/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="sigi/assets/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="sigi/assets/css/jasny-bootstrap.css" />
        <!-- <link rel="stylesheet" href="sigi/assets/css/bootstrap-theme.min.css" />         -->
        <link rel="stylesheet" href="sigi/assets/js/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" href="sigi/assets/css/style.css" />
        <link rel="stylesheet" href="sigi/assets/css/jquery.gritter.css" />
        <link rel="stylesheet" href="sigi/assets/css/wickedpicker.min.css" />

        <script src="sigi/assets/js/moment.min.js"></script>
        
        <script src="sigi/assets/js/jquery.js"></script>
        <script src="sigi/assets/js/jquery-ui/jquery-ui.min.js"></script>
        <!-- <script src="sigi/assets/js/node_modules/socket.io/node_modules/socket.io-client/dist/socket.io.js"></script> -->
        <script src="sigi/assets/js/socket.io.js"></script>
        <script src="sigi/assets/js/wickedpicker.js"></script>

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
          <a style="display: block; font-weight: 600; color: white; margin-top: 10px; text-decoration: none;" href="ofcpartes/index">
            <img src="AI/image/sigi_blanco.png" style="width: 100px;padding-top: 7px;">
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="ofcpartes/index">Listar Oficios</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registrar Oficio <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="ofcpartes/add">Crear Oficio</a></li>
                <?php if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2){ ?>
                  <li><a href="ofcpartes/addExterno">Crear Oficio con destino Externo</a></li>
                <?php } ?>
              </ul>
            </li>
            <li style="float: left;" class="men">
                <a  href="menu_inicial">Menú Principal</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right"> 
            <li style="float: left;" class="men">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                   <span class="glyphicon glyphicon-user"></span> 
                   <strong><?php echo ucwords(strtolower($_SESSION['data_user']['nombre_formal']))?></strong>
                   <span class="glyphicon glyphicon-chevron-down"></span>
               </a>
                
            </li>           
            <li style="float: left;" class="men">
                <a href="index"><strong>Cerrar Sessión</strong></a>
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
    var GLOBAL_PATH = <?php echo "'http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/'."'"; ?>;

    var audio = new Audio('AI/image/presence_changed.mp3');

    var socket = io('<?php echo $_ENV['HOST_NOTF'] ?>',{secure: false});

    socket.on('connect', function () {
      //send the jwt
      // console.log('send jwt');
      socket.emit('authenticate', {token: '<?php echo $_SESSION['token'] ?>'});
    });

    socket.on('connect', function () {
      console.log('authenticated');
    });

    socket.on( 'notification', function( data ) {
      // console.log(data);
      var actualuser = ID_USER;
      for (var i = data.ids_usuario_receptor.length - 1; i >= 0; i--) {
        if(actualuser==data.ids_usuario_receptor[i])
        {
           notifyMe(data.asunto,'AI/image/nuevoEmblema-753118.JPG',data.nombre_usuario,data.asunto,data.id_oficio); 

           if(data.origen == "EXTERNO" && data.destino == "INTERNO"){
            $('#lista_oficios_externos').DataTable().ajax.reload();
           }
           if(data.origen == "INTERNO" && data.destino == "INTERNO"){
            $('#lista_oficios_internos').DataTable().ajax.reload();

           }
           if(data.origen == "INTERNO" && data.destino == "EXTERNO"){
            $('#lista_oficios_destino_externo').DataTable().ajax.reload();
           }

        }
      }

      
      
    });


    // socket.on('news', function (data) {
    //   console.log(data);
    //   socket.emit('my other event', { my: 'data' });
    // });

    // var socket = io.connect( 'http://localhost:8181' );

    // socket.on( 'notification', function( data ) {
    //   // console.log(data);
    //   var actualuser = ID_USER;
    //   for (var i = data.ids_usuario_receptor.length - 1; i >= 0; i--) {
    //     if(actualuser==data.ids_usuario_receptor[i])
    //     {
    //        notifyMe(data.asunto,'AI/image/nuevoEmblema-753118.JPG',data.nombre_usuario,data.asunto,data.id_oficio); 

    //        if(data.origen == "EXTERNO" && data.destino == "INTERNO"){
    //         $('#lista_oficios_externos').DataTable().ajax.reload();
    //        }
    //        if(data.origen == "INTERNO" && data.destino == "INTERNO"){
    //         $('#lista_oficios_internos').DataTable().ajax.reload();

    //        }
    //        if(data.origen == "INTERNO" && data.destino == "EXTERNO"){
    //         $('#lista_oficios_destino_externo').DataTable().ajax.reload();
    //        }

    //     }
    //   }

      
      
    // });

    function notifyMe(theBody,theIcon,theTitle,theText,id_oficio) {
      // Let's check if the browser supports notifications
      if (!("Notification" in window)) {
       notiIE(theIcon,theTitle,theText,id_oficio);
      }

      // Let's check whether notification permissions have already been granted
      else if (Notification.permission === "granted") {
        // If it's okay let's create a notification
        spawnNotification(theBody,theIcon,theTitle,id_oficio);
      }

      // Otherwise, we need to ask the user for permission
      else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
          // If the user accepts, let's create a notification
          if (permission === "granted") {
            var notification = new Notification("Hi there!");
          }
        });
      }

      // At last, if the user has denied notifications, and you 
      // want to be respectful there is no need to bother them any more.
    }Notification.requestPermission().then(function(result) {
      console.log(result);
    });
    function spawnNotification(theBody,theIcon,theTitle,id_oficio) {
      var options = {
          body: theBody,
          icon: theIcon,
          sound: 'AI/image/presence_changed.wav'
      }
      var n = new Notification(theTitle,options);


      audio.play();

      n.onclick = function(event) {
        //event.preventDefault(); // prevent the browser from focusing the Notification's tab
        window.focus();
        //console.log(GLOBAL_PATH+"ofcpartes/view/"+id_oficio);
        window.location.href = GLOBAL_PATH+"ofcpartes/view/"+id_oficio;   

        n.close();
      }
      //n.sound;
    }

    function notiIE(image,theTitle,theText,id_oficio)
    {
         $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: theTitle,
            // (string | mandatory) the text inside the notification
            text:theText,
            // (string | optional) the image to display on the left
            image: image,
            // (int | optional) the time you want it to be alive for before fading out (milliseconds)
            time: 8000,
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (function) before the gritter notice is opened
            before_open: function(){
                if($('.gritter-item-wrapper').length == 3)
                {
                    // Returning false prevents a new gritter from opening
                    return false;
                }
            },
            // (function | optional) function called after it opens
            after_open: function(e){
              audio.play();
              console.log($(e));
              $(e).click(function() {
                window.location.href = GLOBAL_PATH+"ofcpartes/view/"+id_oficio;  
              });
              // $.gritter.onclick = function () {
              //      window.location.href = "sigi.php?c=OfcPartes&a=view&id="+id_oficio;      
              //    };
            },
        });
    }

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

        

