<!DOCTYPE html>
<!--<html manifest="manifest.appcache">-->
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="cache-control" content="no-cache" />

<meta Http-Equiv="Cache" content="no-cache">
<meta Http-Equiv="Pragma-Control" content="no-cache">
<meta Http-Equiv="Cache-directive" Content="no-cache">
<meta Http-Equiv="Pragma-directive" Content="no-cache">
<meta Http-Equiv="Cache-Control" Content="no-cache">
<meta Http-Equiv="Pragma" Content="no-cache">
<meta Http-Equiv="Expires" Content="0">
<meta Http-Equiv="Pragma-directive: no-cache">
<meta Http-Equiv="Cache-directive: no-cache">

<title>Agenda Institucional y Electoral</title>
<meta http-equiv="refresh" content="1800" />
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <script type="text/javascript">
    function myFunction() {
        if (document.all) 
window.resizeTo(screen.width, screen.height); 
else window.resizeTo(screen.availableWidth, screen.availableHeight);

setInterval('location.reload()',5400000)

      }
</script>
    <meta charset="utf-8">
    <style type="text/css">
        body {
    margin:0;
    padding:0px;
}
#slider {
    position:relative;
}
#slider .slider {
    height:100%;
    width:100%;
    display:none;
    position:absolute;
}
#slider .slider p {
    text-align:center;
    font-size:630%;
    font-weight:bold;
    -webkit-text-fill-color: white;
    /*-webkit-text-stroke: 1px black;*/
    font-family: 'Baloo Bhaina', cursive;
    font-family: 'Oswald', sans-serif;
}

#slider>div {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
<?php 
    include('AI/detalles/class/classAsistencias.php');
    $clase = new sistema;
    $clase->conexion();
    $hoy=date("Y-m-d");
    $semana = date( "Y-m-d", strtotime( "+7 day", strtotime( $hoy ) ) );
    $sqlimg = mysql_query("SELECT * FROM solicitudes WHERE (estado = '9' AND publica = '1' AND (fecha_evento_fin BETWEEN '".$hoy."' AND '".$semana."')) OR (estado = '9' AND publica = '1' AND fecha_evento < '".$hoy."' AND fecha_evento_fin > '".$semana."') ORDER BY fecha_evento ASC");
    if(mysql_num_rows($sqlimg)==1){
        while($mostrarx = mysql_fetch_array($sqlimg)){
        echo "
                .s".$mostrarx['id']." {
                    background:url('pantallav21.png') no-repeat center center fixed;

                    background-size: 100% auto !important;
                    background-attachment: fixed !important;
                    -o-background-size: 100% 100%, auto !important;
                    -moz-background-size: 100%, auto !important;
                    -webkit-background-size: 100%, auto !important;
                    background-size: 100% auto !important;
                    margin: 0;
                    font-family: 'Pathway Gothic One', sans-serif;

                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    color:#fff;
                }

                .sno {
                    background:url('AI/img/noevent.jpg') no-repeat center center fixed;

                    background-size: 100% auto !important;
                    background-attachment: fixed !important;
                    -o-background-size: 100% 100%, auto !important;
                    -moz-background-size: 100%, auto !important;
                    -webkit-background-size: 100%, auto !important;
                    background-size: 100% auto !important;
                    margin: 0;
                    font-family: 'Pathway Gothic One', sans-serif;

                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    color:#fff;
                }
                ";
        }
    }

    elseif(mysql_num_rows($sqlimg)>1){
        while($mostrarx = mysql_fetch_array($sqlimg)){

            echo "
                .s".$mostrarx['id']." {
                    background:url('pantallav21.png') no-repeat center center fixed;

                    background-size: 100% auto !important;
                    background-attachment: fixed !important;
                    -o-background-size: 100% 100%, auto !important;
                    -moz-background-size: 100%, auto !important;
                    -webkit-background-size: 100%, auto !important;
                    background-size: 100% auto !important;
                    margin: 0;
                    font-family: 'Pathway Gothic One', sans-serif;

                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    color:#fff;
                }
                ";
        }
    }

    else{
        echo "
                .sno {
                    background:url('AI/img/noevent.jpg') no-repeat center center fixed;

                    background-size: 100% auto !important;
                    background-attachment: fixed !important;
                    -o-background-size: 100% 100%, auto !important;
                    -moz-background-size: 100%, auto !important;
                    -webkit-background-size: 100%, auto !important;
                    background-size: 100% auto !important;
                    margin: 0;
                    font-family: 'Pathway Gothic One', sans-serif;

                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    color:#fff;
                }

                .sno1 {
                    background:url('AI/img/noevent1.jpg') no-repeat center center fixed;

                    background-size: 100% auto !important;
                    background-attachment: fixed !important;
                    -o-background-size: 100% 100%, auto !important;
                    -moz-background-size: 100%, auto !important;
                    -webkit-background-size: 100%, auto !important;
                    background-size: 100% auto !important;
                    margin: 0;
                    font-family: 'Pathway Gothic One', sans-serif;

                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    color:#fff;
                }
                ";
    }
?>


#selector {
    position:absolute;
    text-align:center;
    bottom:0px;
    width:100%;
}

.lo{
    text-shadow: 1px -1px 0 rgba(118, 118, 118, 0.43),
                -1px 2px 1px rgba(115, 114, 114, 0.43),
                -2px 4px 1px rgba(118, 116, 116, 0.43),
                -3px 6px 1px rgba(120, 119, 119, 0.43),
                -4px 8px 1px rgba(123, 122, 122, 0.43),
                -5px 10px 1px rgba(127, 125, 125, 0.43);
    }

.lop{
    text-shadow: 1px -1px 0 rgba(118, 118, 118, 0.43),
                -1px 2px 1px rgba(115, 114, 114, 0.43),
                -2px 4px 1px rgba(118, 116, 116, 0.43),
                -3px 6px 1px rgba(120, 119, 119, 0.43)  ;
    }

#selector>span {
    width:8px;height:8px;
    border-radius: 7px;
    display:inline-block;
    border:3px solid #000;
    margin:2px;
    cursor:pointer;
}
#selector .selectorSelected {
    background-color:#8c1b67;
}
    </style>
</head>
 
<body onload="myFunction()" style="background: url('pantallav21.png') center center fixed !important; background-size: 100% auto !important; background-attachment: fixed !important;">

<div id="slider" style="min-height: 100vh;max-height: 100vh;overflow: hidden;">

    <?php 
    $semana = date( "Y-m-d", strtotime( "+7 day", strtotime( $hoy ) ) );
    $sqlimg2 = mysql_query("SELECT * FROM solicitudes WHERE (estado = '9' AND publica = '1' AND (fecha_evento_fin BETWEEN '".$hoy."' AND '".$semana."')) OR (estado = '9' AND publica = '1' AND fecha_evento < '".$hoy."' AND fecha_evento_fin > '".$semana."') ORDER BY fecha_evento ASC");
    if(mysql_num_rows($sqlimg2)==1){

        while($mostrarx = mysql_fetch_array($sqlimg2)){
            $aNOx = substr($mostrarx['fecha_evento'],0,4);
            $mNOx = substr($mostrarx['fecha_evento'],5,2);
            $dNOx = substr($mostrarx['fecha_evento'],8,2);
            $aNOT = substr($mostrarx['fecha_evento_fin'],0,4);
            $mNOT = substr($mostrarx['fecha_evento_fin'],5,2);
            $dNOT = substr($mostrarx['fecha_evento_fin'],8,2);

            if ($mNOx == 1) {
                $mNOx = 'Ene';
            }
            
            elseif ($mNOx == 2) {
                $mNOx = 'Feb';
            }

            elseif ($mNOx == 3) {
                $mNOx = 'Mar';
            }

            elseif ($mNOx == 4) {
                $mNOx = 'Abr';
            }

            elseif ($mNOx == 5) {
                $mNOx = 'May';
            }

            elseif ($mNOx == 6) {
                $mNOx = 'Jun';
            }

            elseif ($mNOx == 7) {
                $mNOx = 'Jul';
            }

            elseif ($mNOx == 8) {
                $mNOx = 'Ago';
            }

            elseif ($mNOx == 9) {
                $mNOx = 'Sep';
            }

            elseif ($mNOx == 10){
                $mNOx = 'Oct';
            }

            elseif ($mNOx == 11) {
                $mNOx = 'Nov';
            }

            elseif ($mNOx == 12) {
                $mNOx = 'Dic';
            }

            if ($mNOT == 1) {
                $mNOT = 'Ene';
            }
            
            elseif ($mNOT == 2) {
                $mNOT = 'Feb';
            }

            elseif ($mNOT == 3) {
                $mNOT = 'Mar';
            }

            elseif ($mNOT == 4) {
                $mNOT = 'Abr';
            }

            elseif ($mNOT == 5) {
                $mNOT = 'May';
            }

            elseif ($mNOT == 6) {
                $mNOT = 'Jun';
            }

            elseif ($mNOT == 7) {
                $mNOT = 'Jul';
            }

            elseif ($mNOT == 8) {
                $mNOT = 'Ago';
            }

            elseif ($mNOT == 9) {
                $mNOT = 'Sep';
            }

            elseif ($mNOT == 10){
                $mNOT = 'Oct';
            }

            elseif ($mNOT == 11) {
                $mNOT = 'Nov';
            }

            elseif ($mNOT == 12) {
                $mNOT = 'Dic';
            }

            $hrx = substr($mostrarx['hora_evento_ini'],0,5);
            $hrT = substr($mostrarx['hora_evento_fin'],0,5);
            $hora = date( "h:i" );

            if ($mostrarx['tipo_agenda'] == '1') {
                echo "
                <div class='slider s".$mostrarx['id']."'>
                    <div style='background-color: #8c1b67;width: 20%;top: 2%;left: 1%;position: absolute;border-radius: 10%;padding: 1%;-webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);-moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                        <p style='font-size: 1200%;line-height: 100%;overflow: hidden;margin: -25px;margin-bottom: -6%;'>".$mNOx."</p>
                        <p style='font-size: 1200%;line-height: 100%;overflow: hidden;margin: 5px;margin-bottom: 10%;'>".$dNOx."</p>
                    </div>
                    <div style='background-color: #ffffff;width: 20%;top: 52%;left: 1%;position: absolute;border-radius: 10%;padding: 1%;-webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);-moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                        <p style='-webkit-text-fill-color: black; font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: -4%;'> ".utf8_encode($hrx)." hrs. </p>
                        <p style='-webkit-text-fill-color: black; font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: 1%;'> a </p>
                        <p style='-webkit-text-fill-color: black; font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;'> ".utf8_encode($hrT)." hrs. </p>
                    </div>
                    <div style='width: 74%;top: 0%;right: 1%;position: absolute;border-radius: 10%;padding: 1%;'> 
                        <p class='lo' style='margin-top: 0;margin-left: 0%;line-height: 109%;font-size: 520%;'>
                            ".utf8_encode($mostrarx['nombre_evento'])." <br>
                            Lugar: ".utf8_encode($mostrarx['lugar_evento'])."
                        </p>
                        <p style='font-size: 360%;' class='lop'>
                            <img src='AI/img/agendas/".$mostrarx['imagen']."' style='width: 45%; box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); border-radius: 5%; -webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); -moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                        </p>
                    </div>
                </div>
                ";
            }

            elseif ($mostrarx['tipo_agenda'] == '3') {
                echo "
                    <div class='slider s".$mostrarx['id']."'>
                        <p class='lo'></p>
                        <p style='font-size: 360%;' class='lop'></p>
                    </div>
                ";  
            }

            elseif ($mostrarx['tipo_agenda'] == '2') {
                echo "
                <div class='slider s".$mostrarx['id']."'>

                    <div style='width: 85%;top: 0%;right: 1%;position: absolute;border-radius: 10%;padding: 1%;'> 
                        <p class='lo' style='margin-top: 0;margin-left: 15%;line-height: 109%;font-size: 520%;'>
                            ".utf8_encode($mostrarx['nombre_evento'])." <br>
                            Lugar: ".utf8_encode($mostrarx['lugar_evento'])."
                        </p>
                        <p style='font-size: 360%;' class='lop'>
                            <img src='AI/img/agendas/".$mostrarx['imagen']."' style='width: 45%; box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); border-radius: 5%; -webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); -moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                        </p>
                    </div>
                    <div style='background-color: #8c1b67;width: 20%;top: 2%;left: 1%;position: absolute;border-radius: 10%;padding: 1%;-webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);-moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                        <p style='font-size: 900%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: 10%;'>".$mNOx."</p>
                        <p style='font-size: 950%;line-height: 100%;overflow: hidden;margin: 5px;'>".$dNOx."</p>
                        <p style='font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: 10%;'> ".utf8_encode($hrx)." hrs. </p>
                        <p style='font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: 10%;'> a </p>
                        <p style='font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: 10%;'> ".utf8_encode($hrT)." hrs. </p>
                    </div>
                </div>
                ";
            }
        }

            echo "
                <div class='slider sno'>
                    <p class='lo'>
                        Sin más eventos programados
                    </p>
                    <p style='font-size: 360%;' class='lop'>
                        Buen día
                    </p>
                </div>
                ";
    }

    elseif(mysql_num_rows($sqlimg2)>1){
        while($mostrarx = mysql_fetch_array($sqlimg2)){
            $aNOx = substr($mostrarx['fecha_evento'],0,4);
            $mNOx = substr($mostrarx['fecha_evento'],5,2);
            $dNOx = substr($mostrarx['fecha_evento'],8,2);
            $aNOT = substr($mostrarx['fecha_evento_fin'],0,4);
            $mNOT = substr($mostrarx['fecha_evento_fin'],5,2);
            $dNOT = substr($mostrarx['fecha_evento_fin'],8,2);

            if ($mNOx == 1) {
                $mNOx = 'Ene';
            }
            
            elseif ($mNOx == 2) {
                $mNOx = 'Feb';
            }

            elseif ($mNOx == 3) {
                $mNOx = 'Mar';
            }

            elseif ($mNOx == 4) {
                $mNOx = 'Abr';
            }

            elseif ($mNOx == 5) {
                $mNOx = 'May';
            }

            elseif ($mNOx == 6) {
                $mNOx = 'Jun';
            }

            elseif ($mNOx == 7) {
                $mNOx = 'Jul';
            }

            elseif ($mNOx == 8) {
                $mNOx = 'Ago';
            }

            elseif ($mNOx == 9) {
                $mNOx = 'Sep';
            }

            elseif ($mNOx == 10){
                $mNOx = 'Oct';
            }

            elseif ($mNOx == 11) {
                $mNOx = 'Nov';
            }

            elseif ($mNOx == 12) {
                $mNOx = 'Dic';
            }

            if ($mNOT == 1) {
                $mNOT = 'Ene';
            }
            
            elseif ($mNOT == 2) {
                $mNOT = 'Feb';
            }

            elseif ($mNOT == 3) {
                $mNOT = 'Mar';
            }

            elseif ($mNOT == 4) {
                $mNOT = 'Abr';
            }

            elseif ($mNOT == 5) {
                $mNOT = 'May';
            }

            elseif ($mNOT == 6) {
                $mNOT = 'Jun';
            }

            elseif ($mNOT == 7) {
                $mNOT = 'Jul';
            }

            elseif ($mNOT == 8) {
                $mNOT = 'Ago';
            }

            elseif ($mNOT == 9) {
                $mNOT = 'Sep';
            }

            elseif ($mNOT == 10){
                $mNOT = 'Oct';
            }

            elseif ($mNOT == 11) {
                $mNOT = 'Nov';
            }

            elseif ($mNOT == 12) {
                $mNOT = 'Dic';
            }

            $hrx = substr($mostrarx['hora_evento_ini'],0,5);
            $hrT = substr($mostrarx['hora_evento_fin'],0,5);
            $hora = date( "h:i" );
            if ($mostrarx['tipo_agenda'] == '1') {
                echo "
                <div class='slider s".$mostrarx['id']."'>
                	<div style='background-color: #8c1b67;width: 20%;top: 2%;left: 1%;position: absolute;border-radius: 10%;padding: 1%;-webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);-moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                		<p style='font-size: 1200%;line-height: 100%;overflow: hidden;margin: -25px;margin-bottom: -6%;'>".$mNOx."</p>
                		<p style='font-size: 1200%;line-height: 100%;overflow: hidden;margin: 5px;margin-bottom: 10%;'>".$dNOx."</p>
                    </div>
                    <div style='background-color: #ffffff;width: 20%;top: 52%;left: 1%;position: absolute;border-radius: 10%;padding: 1%;-webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);-moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                		<p style='-webkit-text-fill-color: black; font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: -4%;'> ".utf8_encode($hrx)." hrs. </p>
                		<p style='-webkit-text-fill-color: black; font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: 1%;'> a </p>
                		<p style='-webkit-text-fill-color: black; font-size: 408%;line-height: 100%;overflow: hidden;margin: 1px;'> ".utf8_encode($hrT)." hrs. </p>
                	</div>
                	<div style='width: 74%;top: 0%;right: 1%;position: absolute;border-radius: 10%;padding: 1%;'> 
                    	<p class='lo' style='margin-top: 0;margin-left: 0%;line-height: 109%;font-size: 520%;'>
                        	".utf8_encode($mostrarx['nombre_evento'])." <br>
                        	Lugar: ".utf8_encode($mostrarx['lugar_evento'])."
                    	</p>
                    	<p style='font-size: 360%;' class='lop'>
	                        <img src='AI/img/agendas/".$mostrarx['imagen']."' style='width: 45%; box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); border-radius: 5%; -webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); -moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                    	</p>
                    </div>
                </div>
                ";
            }

            elseif ($mostrarx['tipo_agenda'] == '3') {
                echo "
                    <div class='slider s".$mostrarx['id']."'>
                        <p class='lo'></p>
                        <p style='font-size: 360%;' class='lop'></p>
                    </div>
                ";  
            }

            elseif ($mostrarx['tipo_agenda'] == '2') {
                echo "
                <div class='slider s".$mostrarx['id']."'>

                    <div style='width: 85%;top: 0%; left: 1%;position: absolute;border-radius: 10%;padding: 1%;'> 
                        <p class='lo' style='margin-top: 0;margin-right: 15%;line-height: 109%;font-size: 520%;'>
                            ".utf8_encode($mostrarx['nombre_evento'])."
                        </p>
                        <p style='font-size: 360%;' class='lop'>
                            <img src='AI/img/agendas/".$mostrarx['imagen']."' style='width: 45%; box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); border-radius: 5%; -webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75); -moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                        </p>
                    </div>
                    <div style='background-color: ".utf8_encode($mostrarx['color_fondo']).";width: 20%;top: 2%; right: 1%;position: absolute;border-radius: 10%;padding: 1%;-webkit-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);-moz-box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);box-shadow: 31px 22px 48px -6px rgba(0,0,0,0.75);'>
                        <p style='font-size: 800%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: -6%;'>".$dNOx."</p>
                        <p style='font-size: 850%;line-height: 100%;overflow: hidden;margin: 5px;'>".$mNOx."</p>
                        <p style='font-size: 400%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: -1%;'> al </p>
                        <p style='font-size: 800%;line-height: 100%;overflow: hidden;margin: 1px;margin-bottom: -5%;'>".$dNOT."</p>
                        <p style='font-size: 850%;line-height: 100%;overflow: hidden;margin: 5px;'>".$mNOT."</p>
                    </div>
                </div>
                ";
            }
            
        }
    }

    else{
        
            echo "
                <div class='slider sno'>
                    <p class='lo'>
                        Sin eventos programados
                    </p>
                    <p style='font-size: 360%;' class='lop'>
                        Buen día
                    </p>
                </div>
                
                <div class='slider sno1'>
                    <p class='lo'>
                        Sin eventos programados
                    </p>
                    <p style='font-size: 360%;' class='lop'>
                        Buen día
                    </p>
                </div>
                ";
    }
?>

    <div id="selector"></div>
</div>

</body>

<link href="AI/detalles/slider.css" type="text/css" rel="stylesheet">
<script src="AI/detalles/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="AI/detalles/slider.js"></script>

</html>
