<?php
session_start();
    if (isset($_SESSION['nom']) && isset($_SESSION['cor']) && isset($_SESSION['prv']) && isset($_SESSION['con'])){
		include('../detalles/class/classAsistencias.php');
		$clase = new sistema;
		$clase->conexion();

		$hoy=date("Y-m-d");  
		$hoym1 = date( "Y-m-d", strtotime( "+1 day", strtotime( $hoy ) ) );
		$hoym2 = date( "Y-m-d", strtotime( "+2 day", strtotime( $hoy ) ) );
		$hoym3 = date( "Y-m-d", strtotime( "+3 day", strtotime( $hoy ) ) );
		$hoym4 = date( "Y-m-d", strtotime( "+4 day", strtotime( $hoy ) ) );
		$hoym5 = date( "Y-m-d", strtotime( "+5 day", strtotime( $hoy ) ) );
		$hoym6 = date( "Y-m-d", strtotime( "+6 day", strtotime( $hoy ) ) );
		$hoym7 = date( "Y-m-d", strtotime( "+7 day", strtotime( $hoy ) ) );

	 	
		$sqlsolicitudes1 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND '".$hoym1."' BETWEEN fecha_evento AND fecha_evento_fin");
		$sqlsolicitudes2 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND '".$hoym2."' BETWEEN fecha_evento AND fecha_evento_fin");
		$sqlsolicitudes3 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND '".$hoym3."' BETWEEN fecha_evento AND fecha_evento_fin");
		$sqlsolicitudes4 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND '".$hoym4."' BETWEEN fecha_evento AND fecha_evento_fin");
		$sqlsolicitudes5 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND '".$hoym5."' BETWEEN fecha_evento AND fecha_evento_fin");
		$sqlsolicitudes6 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND '".$hoym6."' BETWEEN fecha_evento AND fecha_evento_fin");
		$sqlsolicitudes7 = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND '".$hoym7."' BETWEEN fecha_evento AND fecha_evento_fin");

		$fechats = strtotime($hoym1); 
		$fechats2 = strtotime($hoym7); 

		$aNOx = substr($hoy,0,4);
		$mNOx = substr($hoy,5,2);
		$dNOx = substr($hoy,8,2);

		$aNOx2 = substr($hoym7,0,4);
		$mNOx2 = substr($hoym7,5,2);
		$dNOx2 = substr($hoym7,8,2);

		$dname = 'a';
		switch (date('w', $fechats)){ 
			case 0: $dname = "Domingo"; break; 
		    case 1: $dname = "Lunes"; break; 
		    case 2: $dname = "Martes"; break; 
		    case 3: $dname = "Miércoles"; break; 
		    case 4: $dname = "Jueves"; break; 
		    case 5: $dname = "Viernes"; break; 
		    case 6: $dname = "Sábado"; break; 
		}
		$dname2 = 'a';
		switch (date('w', $fechats2)){ 
			case 0: $dname2 = "Domingo"; break; 
		    case 1: $dname2 = "Lunes"; break; 
		    case 2: $dname2 = "Martes"; break; 
		    case 3: $dname2 = "Miércoles"; break; 
		    case 4: $dname2 = "Jueves"; break; 
		    case 5: $dname2 = "Viernes"; break; 
		    case 6: $dname2 = "Sábado"; break; 
		}
		switch ($mNOx){ 
		    case 1: $mNOx = "enero"; break; 
		    case 2: $mNOx = "febrero"; break; 
		    case 3: $mNOx = "marzo"; break; 
		    case 4: $mNOx = "abril"; break; 
		    case 5: $mNOx = "mayo"; break; 
		    case 6: $mNOx = "junio"; break; 
		    case 7: $mNOx = "julio"; break; 
		    case 8: $mNOx = "agosto"; break; 
		    case 9: $mNOx = "septiembre"; break; 
		    case 10: $mNOx = "octubre"; break; 
		    case 11: $mNOx = "noviembre"; break; 
		    case 12: $mNOx = "diciembre"; break; 
		}
		switch ($mNOx2){ 
		    case 1: $mNOx2 = "Enero"; break; 
		    case 2: $mNOx2 = "Febrero"; break; 
		    case 3: $mNOx2 = "Marzo"; break; 
		    case 4: $mNOx2 = "Abril"; break; 
		    case 5: $mNOx2 = "Mayo"; break; 
		    case 6: $mNOx2 = "Junio"; break; 
		    case 7: $mNOx2 = "Julio"; break; 
		    case 8: $mNOx2 = "Agosto"; break; 
		    case 9: $mNOx2 = "Septiembre"; break; 
		    case 10: $mNOx2 = "Octubre"; break; 
		    case 11: $mNOx2 = "Noviembre"; break; 
		    case 12: $mNOx2 = "Diciembre"; break; 
		}
		$cabecera = "";

		$cuerpo = "
			<html>
				<style>

					@page {
	    				background:url(p20.jpg) no-repeat; 
	    				background-image-resolution:300dpi; 
	    				background-image-resize:6;
	    				margin-top: 1.9cm;
	    				margin-bottom: 1.0cm;
	    				margin-left: 1.0cm;
	    				margin-right: 1.0cm;
					}
					@page :first {
	    				background:url(p10.jpg) no-repeat; 
	    				background-image-resolution:300dpi; 
	    				background-image-resize:6;
	    				margin-top: 3.2cm;
	    				margin-bottom: 1.0cm;
					}
				</style>

				<body>
					<h3 style='text-align: center;'>Actividades correspondientes al periodo: <br> ".$dname." ".$dNOx." de ".$mNOx." de ".$aNOx." al ".$dname2." ".$dNOx2." de ".$mNOx2." de ".$aNOx2."</h3>
					<div>";
							$fechats = strtotime($hoym1); 
							$aNOx = substr($hoym1,0,4);
					        $mNOx = substr($hoym1,5,2);
		        			$dNOx = substr($hoym1,8,2);

							switch ($mNOx){ 
							    case 1: $mNOx = "enero"; break; 
							    case 2: $mNOx = "febrero"; break; 
							    case 3: $mNOx = "marzo"; break; 
							    case 4: $mNOx = "abril"; break; 
							    case 5: $mNOx = "mayo"; break; 
							    case 6: $mNOx = "junio"; break; 
							    case 7: $mNOx = "julio"; break; 
							    case 8: $mNOx = "agosto"; break; 
							    case 9: $mNOx = "septiembre"; break; 
							    case 10: $mNOx = "octubre"; break; 
							    case 11: $mNOx = "noviembre"; break; 
							    case 12: $mNOx = "diciembre"; break; 
							}
				

							$cuerpo = $cuerpo."
							<h4 style='margin-bottom: -5px; text-align: center;'>".$dNOx." de ".$mNOx."</h4>
							<HR SIZE=5 NOSHADE></hr>
							<ul type = disk >";
								
								if(mysql_num_rows($sqlsolicitudes1)>0){
									while($mostrarsolicitudes = mysql_fetch_array($sqlsolicitudes1)){
										$TEV = 'm';
										switch ($mostrarsolicitudes['publica']){ 
											case 0: $TEV = "Privado"; break;
											case 1: $TEV = "Público"; break;
										}
										$hi = $aNOx = substr($mostrarsolicitudes['hora_evento_ini'],0,5);
										$hf = $aNOx = substr($mostrarsolicitudes['hora_evento_fin'],0,5);
										$sqlusuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$mostrarsolicitudes['usuario_solicita']."'");
										if(mysql_num_rows($sqlusuarios)>0){
											while($mostrarusuarios = mysql_fetch_array($sqlusuarios)){
												$sqlareas = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarsolicitudes['area_evento']."'");
												if(mysql_num_rows($sqlareas)>0){
													while($mostrarareas = mysql_fetch_array($sqlareas)){
														if ($mostrarsolicitudes['tipo_agenda'] == '1') {
															$TE = 'Institucional';
														}
														if ($mostrarsolicitudes['tipo_agenda'] == '2') {
															$TE = 'Electoral';
														}
														$cuerpo = $cuerpo."
														<li><b>".utf8_encode($mostrarsolicitudes['nombre_evento'])."</b></li>
														<ul>
															<li><b>Hora:</b> de ".$hi." hrs. a ".$hf." hrs.</li>
															<li><b>Lugar:</b> ".utf8_encode($mostrarsolicitudes['lugar_evento'])."</li>
															<li><b>Evento:</b> ".utf8_encode($TE)."</li>
															<li><b>Convoca:</b> ".utf8_encode($mostrarareas['nombre'])."</li>
															<li><b>Tipo de evento:</b> ".$TEV."</li>
															<li><b>Programado por:</b> ".ucwords(mb_strtolower(utf8_encode($mostrarusuarios['nombre_formal'])))."</li>
														</ul>
														<br>
														<br>";
													}
												}
											}
										}
									}
								$cuerpo = $cuerpo."</ul>";		
								}
								
								else{
									$cuerpo = $cuerpo."
									<li><b>Sin actividades programadas</b></li>
									<br>
									</ul>";
								}

							$fechats = strtotime($hoym2); 
							$aNOx = substr($hoym2,0,4);
					        $mNOx = substr($hoym2,5,2);
		        			$dNOx = substr($hoym2,8,2);

							switch ($mNOx){ 
							    case 1: $mNOx = "enero"; break; 
							    case 2: $mNOx = "febrero"; break; 
							    case 3: $mNOx = "marzo"; break; 
							    case 4: $mNOx = "abril"; break; 
							    case 5: $mNOx = "mayo"; break; 
							    case 6: $mNOx = "junio"; break; 
							    case 7: $mNOx = "julio"; break; 
							    case 8: $mNOx = "agosto"; break; 
							    case 9: $mNOx = "septiembre"; break; 
							    case 10: $mNOx = "octubre"; break; 
							    case 11: $mNOx = "noviembre"; break; 
							    case 12: $mNOx = "diciembre"; break; 
							}
				

							$cuerpo = $cuerpo."
							<h4 style='margin-bottom: -5px; text-align: center;'>".$dNOx." de ".$mNOx."</h4>
							<HR SIZE=5 NOSHADE></hr>
							<ul type = disk >";
								
								if(mysql_num_rows($sqlsolicitudes2)>0){
									while($mostrarsolicitudes = mysql_fetch_array($sqlsolicitudes2)){
										$TEV = 'm';
										switch ($mostrarsolicitudes['publica']){ 
											case 0: $TEV = "Privado"; break;
											case 1: $TEV = "Público"; break;
										}
										$hi = $aNOx = substr($mostrarsolicitudes['hora_evento_ini'],0,5);
										$hf = $aNOx = substr($mostrarsolicitudes['hora_evento_fin'],0,5);
										$sqlusuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$mostrarsolicitudes['usuario_solicita']."'");
										if(mysql_num_rows($sqlusuarios)>0){
											while($mostrarusuarios = mysql_fetch_array($sqlusuarios)){
												$sqlareas = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarsolicitudes['area_evento']."'");
												if(mysql_num_rows($sqlareas)>0){
													while($mostrarareas = mysql_fetch_array($sqlareas)){
														if ($mostrarsolicitudes['tipo_agenda'] == '1') {
															$TE = 'Institucional';
														}
														if ($mostrarsolicitudes['tipo_agenda'] == '2') {
															$TE = 'Electoral';
														}
														$cuerpo = $cuerpo."
														<li><b>".utf8_encode($mostrarsolicitudes['nombre_evento'])."</b></li>
														<ul>
															<li><b>Hora:</b> de ".$hi." hrs. a ".$hf." hrs.</li>
															<li><b>Lugar:</b> ".utf8_encode($mostrarsolicitudes['lugar_evento'])."</li>
															<li><b>Evento:</b> ".utf8_encode($TE)."</li>
															<li><b>Convoca:</b> ".utf8_encode($mostrarareas['nombre'])."</li>
															<li><b>Tipo de evento:</b> ".$TEV."</li>
															<li><b>Programado por:</b> ".ucwords(mb_strtolower(utf8_encode($mostrarusuarios['nombre_formal'])))."</li>
														</ul>
														<br>
														<br>";
													}
												}
											}
										}
									}
								$cuerpo = $cuerpo."</ul>";		
								}
								
								else{
									$cuerpo = $cuerpo."
									<li><b>Sin actividades programadas</b></li>
									<br>
									</ul>";
								}

							$fechats = strtotime($hoym3); 
							$aNOx = substr($hoym3,0,4);
					        $mNOx = substr($hoym3,5,2);
		        			$dNOx = substr($hoym3,8,2);

							switch ($mNOx){ 
							    case 1: $mNOx = "enero"; break; 
							    case 2: $mNOx = "febrero"; break; 
							    case 3: $mNOx = "marzo"; break; 
							    case 4: $mNOx = "abril"; break; 
							    case 5: $mNOx = "mayo"; break; 
							    case 6: $mNOx = "junio"; break; 
							    case 7: $mNOx = "julio"; break; 
							    case 8: $mNOx = "agosto"; break; 
							    case 9: $mNOx = "septiembre"; break; 
							    case 10: $mNOx = "octubre"; break; 
							    case 11: $mNOx = "noviembre"; break; 
							    case 12: $mNOx = "diciembre"; break; 
							}
				

							$cuerpo = $cuerpo."
							<h4 style='margin-bottom: -5px; text-align: center;'>".$dNOx." de ".$mNOx."</h4>
							<HR SIZE=5 NOSHADE></hr>
							<ul type = disk >";
								
								if(mysql_num_rows($sqlsolicitudes3)>0){
									while($mostrarsolicitudes = mysql_fetch_array($sqlsolicitudes3)){
										$TEV = 'm';
										switch ($mostrarsolicitudes['publica']){ 
											case 0: $TEV = "Privado"; break;
											case 1: $TEV = "Público"; break;
										}
										$hi = $aNOx = substr($mostrarsolicitudes['hora_evento_ini'],0,5);
										$hf = $aNOx = substr($mostrarsolicitudes['hora_evento_fin'],0,5);
										$sqlusuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$mostrarsolicitudes['usuario_solicita']."'");
										if(mysql_num_rows($sqlusuarios)>0){
											while($mostrarusuarios = mysql_fetch_array($sqlusuarios)){
												$sqlareas = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarsolicitudes['area_evento']."'");
												if(mysql_num_rows($sqlareas)>0){
													while($mostrarareas = mysql_fetch_array($sqlareas)){
														if ($mostrarsolicitudes['tipo_agenda'] == '1') {
															$TE = 'Institucional';
														}
														if ($mostrarsolicitudes['tipo_agenda'] == '2') {
															$TE = 'Electoral';
														}
														$cuerpo = $cuerpo."
														<li><b>".utf8_encode($mostrarsolicitudes['nombre_evento'])."</b></li>
														<ul>
															<li><b>Hora:</b> de ".$hi." hrs. a ".$hf." hrs.</li>
															<li><b>Lugar:</b> ".utf8_encode($mostrarsolicitudes['lugar_evento'])."</li>
															<li><b>Evento:</b> ".utf8_encode($TE)."</li>
															<li><b>Convoca:</b> ".utf8_encode($mostrarareas['nombre'])."</li>
															<li><b>Tipo de evento:</b> ".$TEV."</li>
															<li><b>Programado por:</b> ".ucwords(mb_strtolower(utf8_encode($mostrarusuarios['nombre_formal'])))."</li>
														</ul>
														<br>
														<br>";
													}
												}
											}
										}
									}
								$cuerpo = $cuerpo."</ul>";		
								}
								
								else{
									$cuerpo = $cuerpo."
									<li><b>Sin actividades programadas</b></li>
									<br>
									</ul>";
								}

							$fechats = strtotime($hoym4); 
							$aNOx = substr($hoym4,0,4);
					        $mNOx = substr($hoym4,5,2);
		        			$dNOx = substr($hoym4,8,2);

							switch ($mNOx){ 
							    case 1: $mNOx = "enero"; break; 
							    case 2: $mNOx = "febrero"; break; 
							    case 3: $mNOx = "marzo"; break; 
							    case 4: $mNOx = "abril"; break; 
							    case 5: $mNOx = "mayo"; break; 
							    case 6: $mNOx = "junio"; break; 
							    case 7: $mNOx = "julio"; break; 
							    case 8: $mNOx = "agosto"; break; 
							    case 9: $mNOx = "septiembre"; break; 
							    case 10: $mNOx = "octubre"; break; 
							    case 11: $mNOx = "noviembre"; break; 
							    case 12: $mNOx = "diciembre"; break; 
							}
				

							$cuerpo = $cuerpo."
							<h4 style='margin-bottom: -5px; text-align: center;'>".$dNOx." de ".$mNOx."</h4>
							<HR SIZE=5 NOSHADE></hr>
							<ul type = disk >";
								
								if(mysql_num_rows($sqlsolicitudes4)>0){
									while($mostrarsolicitudes = mysql_fetch_array($sqlsolicitudes4)){
										$TEV = 'm';
										switch ($mostrarsolicitudes['publica']){ 
											case 0: $TEV = "Privado"; break;
											case 1: $TEV = "Público"; break;
										}
										$hi = $aNOx = substr($mostrarsolicitudes['hora_evento_ini'],0,5);
										$hf = $aNOx = substr($mostrarsolicitudes['hora_evento_fin'],0,5);
										$sqlusuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$mostrarsolicitudes['usuario_solicita']."'");
										if(mysql_num_rows($sqlusuarios)>0){
											while($mostrarusuarios = mysql_fetch_array($sqlusuarios)){
												$sqlareas = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarsolicitudes['area_evento']."'");
												if(mysql_num_rows($sqlareas)>0){
													while($mostrarareas = mysql_fetch_array($sqlareas)){
														if ($mostrarsolicitudes['tipo_agenda'] == '1') {
															$TE = 'Institucional';
														}
														if ($mostrarsolicitudes['tipo_agenda'] == '2') {
															$TE = 'Electoral';
														}
														$cuerpo = $cuerpo."
														<li><b>".utf8_encode($mostrarsolicitudes['nombre_evento'])."</b></li>
														<ul>
															<li><b>Hora:</b> de ".$hi." hrs. a ".$hf." hrs.</li>
															<li><b>Lugar:</b> ".utf8_encode($mostrarsolicitudes['lugar_evento'])."</li>
															<li><b>Evento:</b> ".utf8_encode($TE)."</li>
															<li><b>Convoca:</b> ".utf8_encode($mostrarareas['nombre'])."</li>
															<li><b>Tipo de evento:</b> ".$TEV."</li>
															<li><b>Programado por:</b> ".ucwords(mb_strtolower(utf8_encode($mostrarusuarios['nombre_formal'])))."</li>
														</ul>
														<br>
														<br>";
													}
												}
											}
										}
									}
								$cuerpo = $cuerpo."</ul>";		
								}
								
								else{
									$cuerpo = $cuerpo."
									<li><b>Sin actividades programadas</b></li>
									<br>
									</ul>";
								}
							$fechats = strtotime($hoym5); 
							$aNOx = substr($hoym5,0,4);
					        $mNOx = substr($hoym5,5,2);
		        			$dNOx = substr($hoym5,8,2);

							switch ($mNOx){ 
							    case 1: $mNOx = "enero"; break; 
							    case 2: $mNOx = "febrero"; break; 
							    case 3: $mNOx = "marzo"; break; 
							    case 4: $mNOx = "abril"; break; 
							    case 5: $mNOx = "mayo"; break; 
							    case 6: $mNOx = "junio"; break; 
							    case 7: $mNOx = "julio"; break; 
							    case 8: $mNOx = "agosto"; break; 
							    case 9: $mNOx = "septiembre"; break; 
							    case 10: $mNOx = "octubre"; break; 
							    case 11: $mNOx = "noviembre"; break; 
							    case 12: $mNOx = "diciembre"; break; 
							}
				

							$cuerpo = $cuerpo."
							<h4 style='margin-bottom: -5px; text-align: center;'>".$dNOx." de ".$mNOx."</h4>
							<HR SIZE=5 NOSHADE></hr>
							<ul type = disk >";
								
								if(mysql_num_rows($sqlsolicitudes5)>0){
									while($mostrarsolicitudes = mysql_fetch_array($sqlsolicitudes5)){
										$TEV = 'm';
										switch ($mostrarsolicitudes['publica']){ 
											case 0: $TEV = "Privado"; break;
											case 1: $TEV = "Público"; break;
										}
										$hi = $aNOx = substr($mostrarsolicitudes['hora_evento_ini'],0,5);
										$hf = $aNOx = substr($mostrarsolicitudes['hora_evento_fin'],0,5);
										$sqlusuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$mostrarsolicitudes['usuario_solicita']."'");
										if(mysql_num_rows($sqlusuarios)>0){
											while($mostrarusuarios = mysql_fetch_array($sqlusuarios)){
												$sqlareas = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarsolicitudes['area_evento']."'");
												if(mysql_num_rows($sqlareas)>0){
													while($mostrarareas = mysql_fetch_array($sqlareas)){
														if ($mostrarsolicitudes['tipo_agenda'] == '1') {
															$TE = 'Institucional';
														}
														if ($mostrarsolicitudes['tipo_agenda'] == '2') {
															$TE = 'Electoral';
														}
														$cuerpo = $cuerpo."
														<li><b>".utf8_encode($mostrarsolicitudes['nombre_evento'])."</b></li>
														<ul>
															<li><b>Hora:</b> de ".$hi." hrs. a ".$hf." hrs.</li>
															<li><b>Lugar:</b> ".utf8_encode($mostrarsolicitudes['lugar_evento'])."</li>
															<li><b>Evento:</b> ".utf8_encode($TE)."</li>
															<li><b>Convoca:</b> ".utf8_encode($mostrarareas['nombre'])."</li>
															<li><b>Tipo de evento:</b> ".$TEV."</li>
															<li><b>Programado por:</b> ".ucwords(mb_strtolower(utf8_encode($mostrarusuarios['nombre_formal'])))."</li>
														</ul>
														<br>
														<br>";
													}
												}
											}
										}
									}
								$cuerpo = $cuerpo."</ul>";		
								}
								
								else{
									$cuerpo = $cuerpo."
									<li><b>Sin actividades programadas</b></li>
									<br>
									</ul>";
								}

							$fechats = strtotime($hoym6); 
							$aNOx = substr($hoym6,0,4);
					        $mNOx = substr($hoym6,5,2);
		        			$dNOx = substr($hoym6,8,2);

							switch ($mNOx){ 
							    case 1: $mNOx = "enero"; break; 
							    case 2: $mNOx = "febrero"; break; 
							    case 3: $mNOx = "marzo"; break; 
							    case 4: $mNOx = "abril"; break; 
							    case 5: $mNOx = "mayo"; break; 
							    case 6: $mNOx = "junio"; break; 
							    case 7: $mNOx = "julio"; break; 
							    case 8: $mNOx = "agosto"; break; 
							    case 9: $mNOx = "septiembre"; break; 
							    case 10: $mNOx = "octubre"; break; 
							    case 11: $mNOx = "noviembre"; break; 
							    case 12: $mNOx = "diciembre"; break; 
							}
				

							$cuerpo = $cuerpo."
							<h4 style='margin-bottom: -5px; text-align: center;'>".$dNOx." de ".$mNOx."</h4>
							<HR SIZE=5 NOSHADE></hr>
							<ul type = disk >";
								
								if(mysql_num_rows($sqlsolicitudes6)>0){
									while($mostrarsolicitudes = mysql_fetch_array($sqlsolicitudes6)){
										$TEV = 'm';
										switch ($mostrarsolicitudes['publica']){ 
											case 0: $TEV = "Privado"; break;
											case 1: $TEV = "Público"; break;
										}
										$hi = $aNOx = substr($mostrarsolicitudes['hora_evento_ini'],0,5);
										$hf = $aNOx = substr($mostrarsolicitudes['hora_evento_fin'],0,5);
										$sqlusuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$mostrarsolicitudes['usuario_solicita']."'");
										if(mysql_num_rows($sqlusuarios)>0){
											while($mostrarusuarios = mysql_fetch_array($sqlusuarios)){
												$sqlareas = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarsolicitudes['area_evento']."'");
												if(mysql_num_rows($sqlareas)>0){
													while($mostrarareas = mysql_fetch_array($sqlareas)){
														if ($mostrarsolicitudes['tipo_agenda'] == '1') {
															$TE = 'Institucional';
														}
														if ($mostrarsolicitudes['tipo_agenda'] == '2') {
															$TE = 'Electoral';
														}
														$cuerpo = $cuerpo."
														<li><b>".utf8_encode($mostrarsolicitudes['nombre_evento'])."</b></li>
														<ul>
															<li><b>Hora:</b> de ".$hi." hrs. a ".$hf." hrs.</li>
															<li><b>Lugar:</b> ".utf8_encode($mostrarsolicitudes['lugar_evento'])."</li>
															<li><b>Evento:</b> ".utf8_encode($TE)."</li>
															<li><b>Convoca:</b> ".utf8_encode($mostrarareas['nombre'])."</li>
															<li><b>Tipo de evento:</b> ".$TEV."</li>
															<li><b>Programado por:</b> ".ucwords(mb_strtolower(utf8_encode($mostrarusuarios['nombre_formal'])))."</li>
														</ul>
														<br>
														<br>";
													}
												}
											}
										}
									}
								$cuerpo = $cuerpo."</ul>";		
								}
								
								else{
									$cuerpo = $cuerpo."
									<li><b>Sin actividades programadas</b></li>
									<br>
									</ul>";
								}

							$fechats = strtotime($hoym7); 
							$aNOx = substr($hoym7,0,4);
					        $mNOx = substr($hoym7,5,2);
		        			$dNOx = substr($hoym7,8,2);

							switch ($mNOx){ 
							    case 1: $mNOx = "enero"; break; 
							    case 2: $mNOx = "febrero"; break; 
							    case 3: $mNOx = "marzo"; break; 
							    case 4: $mNOx = "abril"; break; 
							    case 5: $mNOx = "mayo"; break; 
							    case 6: $mNOx = "junio"; break; 
							    case 7: $mNOx = "julio"; break; 
							    case 8: $mNOx = "agosto"; break; 
							    case 9: $mNOx = "septiembre"; break; 
							    case 10: $mNOx = "octubre"; break; 
							    case 11: $mNOx = "noviembre"; break; 
							    case 12: $mNOx = "diciembre"; break; 
							}
				

							$cuerpo = $cuerpo."
							<h4 style='margin-bottom: -5px; text-align: center;'>".$dNOx." de ".$mNOx."</h4>
							<HR SIZE=5 NOSHADE></hr>
							<ul type = disk >";
								
								if(mysql_num_rows($sqlsolicitudes7)>0){
									while($mostrarsolicitudes = mysql_fetch_array($sqlsolicitudes7)){
										$TEV = 'm';
										switch ($mostrarsolicitudes['publica']){ 
											case 0: $TEV = "Privado"; break;
											case 1: $TEV = "Público"; break;
										}
										$hi = $aNOx = substr($mostrarsolicitudes['hora_evento_ini'],0,5);
										$hf = $aNOx = substr($mostrarsolicitudes['hora_evento_fin'],0,5);
										$sqlusuarios = mysql_query("SELECT * FROM usuarios WHERE id = '".$mostrarsolicitudes['usuario_solicita']."'");
										if(mysql_num_rows($sqlusuarios)>0){
											while($mostrarusuarios = mysql_fetch_array($sqlusuarios)){
												$sqlareas = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarsolicitudes['area_evento']."'");
												if(mysql_num_rows($sqlareas)>0){
													while($mostrarareas = mysql_fetch_array($sqlareas)){
														if ($mostrarsolicitudes['tipo_agenda'] == '1') {
															$TE = 'Institucional';
														}
														if ($mostrarsolicitudes['tipo_agenda'] == '2') {
															$TE = 'Electoral';
														}
														$cuerpo = $cuerpo."
														<li><b>".utf8_encode($mostrarsolicitudes['nombre_evento'])."</b></li>
														<ul>
															<li><b>Hora:</b> de ".$hi." hrs. a ".$hf." hrs.</li>
															<li><b>Lugar:</b> ".utf8_encode($mostrarsolicitudes['lugar_evento'])."</li>
															<li><b>Evento:</b> ".utf8_encode($TE)."</li>
															<li><b>Convoca:</b> ".utf8_encode($mostrarareas['nombre'])."</li>
															<li><b>Tipo de evento:</b> ".$TEV."</li>
															<li><b>Programado por:</b> ".ucwords(mb_strtolower(utf8_encode($mostrarusuarios['nombre_formal'])))."</li>
														</ul>
														<br>
														<br>";
													}
												}
											}
										}
									}
								$cuerpo = $cuerpo."</ul>";		
								}
								
								else{
									$cuerpo = $cuerpo."
									<li><b>Sin actividades programadas</b></li>
									<br>
									</ul>";
								}
					$cuerpo = $cuerpo."
					</div>
				</body>
			</html>";
			$pie = "";
	 
			include("mpdf/mpdf.php");
			$mpdf=new mPDF();
			$mpdf->SetTitle('Reporte semanal de actividades');
			$mpdf->SetHTMLHeader($cabecera);
			$mpdf->SetHTMLFooter($pie);
			$mpdf->WriteHTML($cuerpo);
			$mpdf->Output('Reporte semanal de actividades.pdf', 'I');
			$mpdf->Output(); 

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
            header('Location: ../../');
        }
    ?>