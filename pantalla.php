<!DOCTYPE html>
<!--<html manifest="manifest.appcache">-->
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta http-equiv="cache-control" content="no-cache" />
<title>Agenda Institcional y Electoral</title>
<meta http-equiv="refresh" content="1800" />
<link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<script type="text/javascript">
	function myFunction() {
        if (document.all) 
window.resizeTo(screen.width, screen.height); 
else window.resizeTo(screen.availableWidth, screen.availableHeight);
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
  	$sqlimg = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND fecha_evento_fin BETWEEN '".$hoy."'  AND '".$semana."' ORDER BY fecha_evento ASC");
  	if(mysql_num_rows($sqlimg)==1){
        while($mostrarx = mysql_fetch_array($sqlimg)){
        echo "
                .s".$mostrarx['id']." {
                    background:url('AI/img/agendas/".$mostrarx['imagen']."') no-repeat center center fixed;

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
					background:url('AI/img/agendas/".$mostrarx['imagen']."') no-repeat center center fixed;

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
	border:3px solid #fff;
	margin:2px;
	cursor:pointer;
}
#selector .selectorSelected {
	background-color:#fff;
}
	</style>
</head>
 
<body onload="myFunction()" style="background: url('http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/footer_lodyas.png') !important;">

<div id="slider" style="min-height: 100vh;max-height: 100vh;overflow: hidden;">

	<?php 
  	$semana = date( "Y-m-d", strtotime( "+7 day", strtotime( $hoy ) ) );
    $sqlimg2 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND fecha_evento_fin BETWEEN '".$hoy."'  AND '".$semana."' ORDER BY fecha_evento ASC");
  	if(mysql_num_rows($sqlimg2)==1){

        while($mostrarx = mysql_fetch_array($sqlimg2)){
            $aNOx = substr($mostrarx['fecha_evento'],0,4);
            $mNOx = substr($mostrarx['fecha_evento'],5,2);
            $dNOx = substr($mostrarx['fecha_evento'],8,2);
            $aNOT = substr($mostrarx['fecha_evento_fin'],0,4);
            $mNOT = substr($mostrarx['fecha_evento_fin'],5,2);
            $dNOT = substr($mostrarx['fecha_evento_fin'],8,2);

            if ($mNOx == 1) {
                $mNOx = 'Enero';
            }
            
            elseif ($mNOx == 2) {
                $mNOx = 'Febrero';
            }

            elseif ($mNOx == 3) {
                $mNOx = 'Marzo';
            }

            elseif ($mNOx == 4) {
                $mNOx = 'Abril';
            }

            elseif ($mNOx == 5) {
                $mNOx = 'Mayo';
            }

            elseif ($mNOx == 6) {
                $mNOx = 'Junio';
            }

            elseif ($mNOx == 7) {
                $mNOx = 'Julio';
            }

            elseif ($mNOx == 8) {
                $mNOx = 'Agosto';
            }

            elseif ($mNOx == 9) {
                $mNOx = 'Septiembre';
            }

            elseif ($mNOx == 10){
                $mNOx = 'Octubre';
            }

            elseif ($mNOx == 11) {
                $mNOx = 'Noviembre';
            }

            elseif ($mNOx == 12) {
                $mNOx = 'Diciembre';
            }

            if ($mNOT == 1) {
                $mNOT = 'Enero';
            }
            
            elseif ($mNOT == 2) {
                $mNOT = 'Febrero';
            }

            elseif ($mNOT == 3) {
                $mNOT = 'Marzo';
            }

            elseif ($mNOT == 4) {
                $mNOT = 'Abril';
            }

            elseif ($mNOT == 5) {
                $mNOT = 'Mayo';
            }

            elseif ($mNOT == 6) {
                $mNOT = 'Junio';
            }

            elseif ($mNOT == 7) {
                $mNOT = 'Julio';
            }

            elseif ($mNOT == 8) {
                $mNOT = 'Agosto';
            }

            elseif ($mNOT == 9) {
                $mNOT = 'Septiembre';
            }

            elseif ($mNOT == 10){
                $mNOT = 'Octubre';
            }

            elseif ($mNOT == 11) {
                $mNOT = 'Noviembre';
            }

            elseif ($mNOT == 12) {
                $mNOT = 'Diciembre';
            }

            $hrx = substr($mostrarx['hora_evento_ini'],0,5);
            $hrT = substr($mostrarx['hora_evento_fin'],0,5);
            $hora = date( "h:i" );

            echo "
                <div class='slider s".$mostrarx['id']."'>
                    <p class='lo'>
                        ".utf8_encode($mostrarx['nombre_evento'])."
                    </p>
                    <p style='font-size: 360%;' class='lop'>
                        
                        ".$dNOx." de ".$mNOx." de ".utf8_encode($hrx)." hrs. a ".utf8_encode($hrT)." hrs.<br>
                        Lugar: ".utf8_encode($mostrarx['lugar_evento'])."
                    </p>
                </div>
                ";
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
    			$mNOx = 'Enero';
    		}
    		
    		elseif ($mNOx == 2) {
    			$mNOx = 'Febrero';
    		}

    		elseif ($mNOx == 3) {
    			$mNOx = 'Marzo';
    		}

    		elseif ($mNOx == 4) {
    			$mNOx = 'Abril';
    		}

    		elseif ($mNOx == 5) {
    			$mNOx = 'Mayo';
    		}

    		elseif ($mNOx == 6) {
    			$mNOx = 'Junio';
    		}

    		elseif ($mNOx == 7) {
    			$mNOx = 'Julio';
    		}

    		elseif ($mNOx == 8) {
    			$mNOx = 'Agosto';
    		}

    		elseif ($mNOx == 9) {
    			$mNOx = 'Septiembre';
    		}

    		elseif ($mNOx == 10){
    			$mNOx = 'Octubre';
    		}

    		elseif ($mNOx == 11) {
    			$mNOx = 'Noviembre';
    		}

    		elseif ($mNOx == 12) {
    			$mNOx = 'Diciembre';
    		}

    		if ($mNOT == 1) {
    			$mNOT = 'Enero';
    		}
    		
    		elseif ($mNOT == 2) {
    			$mNOT = 'Febrero';
    		}

    		elseif ($mNOT == 3) {
    			$mNOT = 'Marzo';
    		}

    		elseif ($mNOT == 4) {
    			$mNOT = 'Abril';
    		}

    		elseif ($mNOT == 5) {
    			$mNOT = 'Mayo';
    		}

    		elseif ($mNOT == 6) {
    			$mNOT = 'Junio';
    		}

    		elseif ($mNOT == 7) {
    			$mNOT = 'Julio';
    		}

    		elseif ($mNOT == 8) {
    			$mNOT = 'Agosto';
    		}

    		elseif ($mNOT == 9) {
    			$mNOT = 'Septiembre';
    		}

    		elseif ($mNOT == 10){
    			$mNOT = 'Octubre';
    		}

    		elseif ($mNOT == 11) {
    			$mNOT = 'Noviembre';
    		}

    		elseif ($mNOT == 12) {
    			$mNOT = 'Diciembre';
    		}

			$hrx = substr($mostrarx['hora_evento_ini'],0,5);
    		$hrT = substr($mostrarx['hora_evento_fin'],0,5);
            $hora = date( "h:i" );
            if ($mostrarx['tipo_agenda'] == '1') {
                echo "
                <div class='slider s".$mostrarx['id']."'>
                    <p class='lo'>
                        ".utf8_encode($mostrarx['nombre_evento'])."
                    </p>
                    <p style='font-size: 360%;' class='lop'>
                        
                        ".$dNOx." de ".$mNOx." de ".utf8_encode($hrx)." hrs. a ".utf8_encode($hrT)." hrs.<br>
                        Lugar: ".utf8_encode($mostrarx['lugar_evento'])."
                    </p>
                </div>
                ";
            }

            elseif ($mostrarx['tipo_agenda'] == '2') {
                echo "
                <div class='slider s".$mostrarx['id']."'>
                    <p class='lo'>
                        ".utf8_encode($mostrarx['nombre_evento'])."
                    </p>
                    <p style='font-size: 360%;' class='lop'>
                        
                        Del ".$dNOx." de ".$mNOx." al ".$dNOT." de ".$mNOT." <br>
                    </p>
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
