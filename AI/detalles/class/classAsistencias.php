<?php
/*session_start();*/
class sistema{
	
		public function conexion(){

			global $host, $usuario, $password, $dataBase;

			$host      = 'localhost';
			$usuario   = 'root';
			$password  = '';
			$dataBase  = 'datacenter2';

			$conexion = mysql_connect($host, $usuario, $password);
			$seleccion = mysql_select_db($dataBase, $conexion);

			// Create connection
			$conn = new mysqli($host, $usuario, $password, $dataBase);
			$conx = new mysqli($host, $usuario, $password, $dataBase);
		}


		function mosenpantalla(){
			$sql = mysql_query("SELECT * FROM solicitudes WHERE estado = '9'") or die(mysql_error());;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
				  echo "
					.demo-1 .page-view .project:nth-child(".$mostrar['id'].") {
  						background-image: url(../img/agendas/".$mostrar['imagen'].");
					}";
				}
			}
			else{
				echo '<tr><td colspan="7">No se encontraron registros...</td></tr>';
			}
		}

		function doellog(){
			$sql = mysql_query("SELECT * FROM usuarios WHERE correo = ".$u." AND contrasena = ".$p) or die(mysql_error());;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
				  $user = $mostrar['correo'];
				  $pass = $mostrar['contrasena'];
				  $nombre = $mostrar['nombre'];
				}
			}
			else{
				echo '<tr><td colspan="7">No se encontraron registros...</td></tr>';
			}
		}	
		
		function tablamortal(){
			
					echo '
					<th>NOMBRE</th>
                    <th>LUGAR</th>
                    <th>FECHA</th>
                    <th>REQUISITOS</th>
                    <th>ESTADO</th>
                    <th>EDITAR</th>';
		}

		function tablaSU(){
			
					echo '
					<th>NOMBRE</th>
	                <th>LUGAR</th>
	                <th>FECHA</th>
	                <th>ÁREA</th>
	                <th>USUARIO</th>
	                <th>AGENDA</th>
	                <th>REQUISITOS</th>
	                <th>ESTADO</th>
	                <th>EDITAR</th>';
		}


		function menupioho(){
					echo '
				<ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #8c1b67; top: 0; width: 100%;">
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="agenda.php">
				            <img src="image/Logos Sistemas Internos/AI blanco.png" style="height: 21px;">
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="agenda.php">
				           Calendario
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="../menu_inicial.php">
				           Regresar
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="../index.php">
				           Cerrar sesión
				        </a>
				    </li>';
				    $sqlx = mysql_query("SELECT nombre_formal FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
				    if (mysql_num_rows($sqlx)>0){
				    	while($plopr = mysql_fetch_array($sqlx)){
						    echo
						    '<li style="float: right;" class="men">
						        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="contcamb.php?NU='.$_SESSION['idx'].'">'.ucwords(mb_strtolower(utf8_encode($plopr['nombre_formal']),'UTF-8')).'
						        	<img src="https://datacenter-iepcdurango.mx/registro/locales/img/partidos/IEPC.png" style="width: 42px;border-radius: 75px;margin-bottom: -16px;margin-top: -20px;">
						        </a>
						    </li>';
						}
					}
					echo '</ul>';	
		}

		function menumortal(){
					echo '
				<ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #8c1b67; top: 0; width: 100%;">
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="solicitudes.php">
				            <img src="image/Logos Sistemas Internos/AI blanco.png" style="height: 21px;">
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="solicitudes.php">
				           Solicitudes
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="agenda.php">
				           Calendario
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="../menu_inicial.php">
				           Regresar
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="../index.php">
				           Cerrar sesión
				        </a>
					</li>';
				    $sqlx = mysql_query("SELECT nombre_formal FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
				    if (mysql_num_rows($sqlx)>0){
				    	while($plopr = mysql_fetch_array($sqlx)){
						    echo
						    '<li style="float: right;" class="men">
						        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="contcamb.php?NU='.$_SESSION['idx'].'">'.ucwords(mb_strtolower(utf8_encode($plopr['nombre_formal']),'UTF-8')).'
						        	<img src="https://datacenter-iepcdurango.mx/registro/locales/img/partidos/IEPC.png" style="width: 42px;border-radius: 75px;margin-bottom: -16px;margin-top: -20px;">
						        </a>
						    </li>';
						}
					}
					echo '</ul>';
		}

		function menuSU(){
			echo '
				<ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #8c1b67; top: 0; width: 100%;">
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="solicitudes.php">
				            <img src="image/Logos Sistemas Internos/AI blanco.png" style="height: 21px;">
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="solicitudes.php?st=A">
				            Aceptadas
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="solicitudes.php?st=P">
				            Pendientes
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="solicitudes.php?st=C">
				            Canceladas
				        </a>
				    </li>
					<!-- <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="tabla.php">
				           Resumen
				        </a>
				    </li>
				    -->
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="agenda.php">
				           Calendario
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="../menu_inicial.php">
				           Regresar
				        </a>
				    </li>
				    <li style="float: left;" class="men">
				        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="../index.php">
				           Cerrar sesión
				        </a>
				    </li>';
				    $sqlx = mysql_query("SELECT nombre_formal FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
				    if (mysql_num_rows($sqlx)>0){
				    	while($plopr = mysql_fetch_array($sqlx)){
						    echo
						    '<li style="float: right;" class="men">
						        <a style="display: block !important; font-weight: 600 !important; color: white !important; padding: 16px !important; text-decoration: none !important; font-size: 14px !important;" href="contcamb.php?NU='.$_SESSION['idx'].'">'.ucwords(mb_strtolower(utf8_encode($plopr['nombre_formal']),'UTF-8')).'
						        	<img src="https://datacenter-iepcdurango.mx/registro/locales/img/partidos/IEPC.png" style="width: 42px;border-radius: 75px;margin-bottom: -16px;margin-top: -20px;">
						        </a>
						    </li>';
						}
					}
					echo '</ul>';
		}

		function mostrarAsistencias(){
			if ($_POST["fs"]){
				$sql = mysql_query("SELECT * FROM solicitudes WHERE fecha_evento LIKE '".$_POST['fs']."' and tipo_agenda < '3' order by id DESC");
			}
			else{
				if ($_GET["st"] == 'P'){
					$sql = mysql_query("SELECT * FROM solicitudes WHERE estado =  '1' and tipo_agenda < '3' order by id DESC");
				}
				elseif ($_GET["st"] == 'A'){
					$sql = mysql_query("SELECT * FROM solicitudes WHERE estado =  '9' and tipo_agenda < '3' order by id DESC");
				}
				elseif ($_GET["st"] == 'C'){
					$sql = mysql_query("SELECT * FROM solicitudes WHERE estado =  '0' and tipo_agenda < '3' order by id DESC");
				}
				elseif ($_GET["CE"] == 'ON'){
					$sql = mysql_query("SELECT * FROM solicitudes WHERE tipo_agenda = '2' order by id DESC");
				}
				else{
					$hoy=date("Y-m-d");
  					$semanp = date( "Y-m-d", strtotime( "-7 day", strtotime( $hoy ) ) );
  					$semana = date( "Y-m-d", strtotime( "+7 day", strtotime( $hoy ) ) );
					$sql = mysql_query("SELECT * FROM solicitudes WHERE tipo_agenda < '3' ORDER BY id DESC");
				}
			}
			
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$est = mysql_query("SELECT nombre_formal FROM usuarios WHERE id = '".$mostrar['usuario_solicita']."' ");
					while($mostrars = mysql_fetch_array($est)){
						if ($mostrar['estado'] == 0) {
							$significado = 'Cancelado';
						}
						if ($mostrar['estado'] == 1) {
							$significado = 'Pendiente';
						}
						if ($mostrar['estado'] == 9) {
							$significado = 'Aceptado';
						}
						$est1 = mysql_query("SELECT nombre FROM areas WHERE id = '".$mostrar['area_evento']."' ");
						while($mostrarz = mysql_fetch_array($est1)){
							if ($mostrar['tipo_agenda'] == '1') {
								$TE = '<b>Institucional</b>';
							}
							if ($mostrar['tipo_agenda'] == '2') {
								$TE = '<b>Electoral</b>';
							}
							$aSERV = substr($mostrar['fecha_evento'],0,4);
							$mSERV = substr($mostrar['fecha_evento'],5,2);
							$dSERV = substr($mostrar['fecha_evento'],8,2);
							$mosfech = $dSERV.'/'.$mSERV.'/'.$aSERV;
							echo '
								<tr title="'.$significado.'">
									<td>'.utf8_encode($mostrar['nombre_evento']).'</td>
									<td>'.utf8_encode($mostrar['lugar_evento']).'</td>
									<td>'.$mosfech.' '.$mostrar['hora_evento_ini'].' a '.$mostrar['hora_evento_fin'].'</td>
									<td>'.utf8_encode($mostrarz['nombre']).'</td>
									<td>'.ucwords(mb_strtolower(utf8_encode($mostrars['nombre_formal']),'UTF-8')).'</td>
									<td>'.utf8_encode($TE).'</td>
									<td>
										<a href="requerimientos.php?NS='.utf8_encode($mostrar['id']).'">
											<img src=image/add.png style="width: 35%;" title="AGREGAR REQUERIMIENTOS">
										</a>
									</td>
									<td>';
									if ($mostrar['tipo_agenda'] == '1') {
										echo '<a href="estado.php?NS='.utf8_encode($mostrar['id']).'"><img src=image/'.$mostrar['estado'].'.png style="width: 40%;" title="'.$significado.'"></a></td>';
									}
									elseif ($mostrar['tipo_agenda'] == '2') {
										echo '
										<a href="solicitudes.php?actidesa='.$mostrar['estado'].'&actidesaid='.$mostrar['id'].'"><img src=image/'.$mostrar['estado'].'.png style="width: 40%;" title="'.$significado.'"></a></td>';
									}
									echo '<td><a href="';
									if ($mostrar['tipo_agenda'] == '1') {
										echo 'editar.php';
									}
									
									elseif ($mostrar['tipo_agenda'] == '2') {
										echo 'edita.php';
									}

									else{

									}
									echo '?NS='.utf8_encode($mostrar['id']).'"><img src=image/editar.png style="width: 40%;"></a></td>
								</tr>';
						}
					}
				}
				mysql_free_result($sql);
			}else{
				mysql_free_result($sql);
				echo '<tr><td colspan="8">No se encontraron registros...</td></tr>';
			}
		}

		function mostrarAsistenciasmoral(){
			
			$hoy=date("Y-m-d");
			$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
			$sql = mysql_query("SELECT * FROM solicitudes WHERE fecha_evento >= '".$ayer."' and tipo_agenda < '3' AND usuario_solicita = '".$_SESSION['idx']."' order by id DESC");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){

					if ($mostrar['estado'] == 0) {
						$significado = 'Cancelado';
					}
					if ($mostrar['estado'] == 1) {
						$significado = 'Pendiente';
					}
					if ($mostrar['estado'] == 9) {
						$significado = 'Aceptado';
					}
					$aSERV = substr($mostrar['fecha_evento'],0,4);
					$mSERV = substr($mostrar['fecha_evento'],5,2);
					$dSERV = substr($mostrar['fecha_evento'],8,2);
					$mosfech = $dSERV.'/'.$mSERV.'/'.$aSERV;
					echo '<tr>
								<td>'.utf8_encode($mostrar['nombre_evento']).'</td>
								<td>'.utf8_encode($mostrar['lugar_evento']).'</td>
								<td>'.$mosfech.' '.$mostrar['hora_evento_ini'].'</td>
								<td>
									<a href="requerimientos.php?NS='.utf8_encode($mostrar['id']).'">
										<img src=image/add.png style="width: 35%;" title="AGREGAR REQUERIMIENTOS">
									</a>
								</td>
								<td><img src=image/'.$mostrar['estado'].'.png style="width: 40%;" title="'.$significado.'"></td>
								<td><a href="editar.php?NS='.utf8_encode($mostrar['id']).'"><img src=image/editar.png style="width: 40%;"></a></td>
							</tr>';
				}
				mysql_free_result($sql);
			}else{
				mysql_free_result($sql);
				echo '<tr><td colspan="6">No se encontraron registros...</td></tr>';
			}
		}

		function mostrararea(){
			$sql = mysql_query("SELECT * FROM areas WHERE estado = '1' ORDER BY nombre ASC");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					echo '<option value="'.$mostrar['id'].'">'.utf8_encode($mostrar['nombre']).'</option>';
				}
			}
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}
			mysql_free_result($sql);
		}

		function mostrarlugar(){
			$sql = mysql_query("SELECT * FROM lugares WHERE estado = '1' ORDER BY conta DESC");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					echo '<input type=radio name="lugar" onclick="lugarx.disabled = true" value="'.utf8_encode($mostrar['nombre']).'"/>'.utf8_encode($mostrar['nombre']).'<br/>';
				}
			}
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}
			mysql_free_result($sql);
		}

		function regmortal(){
				
				$hoy=date("Y-m-d");  
				$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
				$hora = date( "h:i" );
					echo '
                <form method="post" action="" enctype="multipart/form-data">
                    <table class="tbl-registro" width="100%">
                        <tbody>
                            <tr>
                                <td><b>Seleccionar foto:</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="foto1" type="file" id="foto1" style="margin: 0 auto;" required="" accept="image/*">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Nombre del evento:</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control" rows="5" id="nombre" name="nombre" maxlength="82" style="max-width: 549px;" required=""></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Lugar del evento:</b></td>
                            </tr>
                            <tr>
                                <td>
                                    <legend></legend>
		                            <fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
		                            ';
			                        	$clasezx = new sistema;
			                            $clasezx->conexion();
			                            $clasezx->mostrarlugar(); 
		                            	echo '
		                            	<input type="radio" name="lugar" value="xxx" onclick="lugarx.disabled = false" required="required" />Otro
										<input type="text" name="lugarx" style="width: 75%; float: right; margin-right: 3%;" class="form-control" disabled="disabled" />
		                            </fieldset>
		                            <legend></legend>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Fecha del evento:</b></td>
                            </tr>
                            <tr>
                                <td>
                                	<input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" required class="form-control" value="'.$hoy.'" min="'.$hoy.'" />
                                </td>
                            </tr>
		                    <tr>
		                        <td><b>Hora de inicio y finalización:</b></td>
		                    </tr>
		                    <tr>
		                        <td>
		                        	<input type="time" name="hora" id="hora" value="'.$hora.'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; margin-right: 8%; float: left;" />
		                    		<input type="time" name="horad" id="horad" value="'.$hora.'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; float: left;" />
		                    	</td>
		                    </tr>
		                    <tr>
		                        <td><b>Tipo de evento:</b></td>
		                    </tr>
		                    <tr>
		                    	<td>
		                    		<select name="tipevent" class="form-control" required>
										<option value="" selected="">Seleccionar tipo de evento</option>
		                    			<option value="1">Público</option>
		                    			<option value="0">Privado</option>
		                    	</td>
		                    </tr>
                            <tr>
                                <td colspan="4"><input id="kkkkkk" name="kkkkkk" type="submit" value="Agregar solicitud" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
					';
		}

		function valregCE(){

			if($_POST['fecha'] > $_POST['fechad']){
				?>
					<script>
						alert("Por favor Verifica tus datos, la fecha no es valida");
					</script>
				<?php
				echo '<script> window.location="solicitudes.php"; </script>';
			}
			else{
				$clasex = new sistema;
                $clasex->conexion();
                $clasex->regmortalsql();
			}
		}

		function regmortalsql(){

				    if(@$_POST['pppppp']){
				      	$nom_even = $_POST['nombre'];

				      	$lug = '---';

				      	$fec = $_POST['fecha'];
				      	$hor = '00:00:01';
				      	$hod = '23:59:59';
				      	$fed = $_POST['fechad'];
				      	

				      	$hnotx = substr($hor,0,2);
    					$mnotx = substr($hor,3,2);

				      	$hnoty = substr($hod,0,2);
    					$mnoty = substr($hod,3,2);

    					$hod = $hnoty.':'.$mnoty;

				      	$are = '11';
				      	$tip = '2';
				      	$name = "CE.jpg";

				      	$nom_even = str_replace('“', '"', $nom_even);
				      	$nom_even = str_replace('”', '"', $nom_even);
				      	$nom_even = str_replace("' ", '" ', $nom_even);
				      	$nom_even = str_replace(" '", ' "', $nom_even);
				      	$nom_even = str_replace("'", '´', $nom_even);
				      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
				      	str_replace("\n"," ",$nom_even);
				      	$nom_even = str_replace("…", '...', $nom_even);
				      	$nom_even = str_replace(" – ", " - ", $nom_even);
				      	$nom_even = str_replace("‘", '´', $nom_even);
				      	$nom_even = str_replace("’", '´', $nom_even);

						$color_fondo = $_POST['myColor'];
				      	$color_texto = $_POST['myColor1'];

				      	
				      	$fechaDR = date('Y-m-d H:i:s');
				      	$mensaje = "----- La creación de la publicación se realizo corectamente: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";

						// Check connection

				      	$sqlx = mysql_query("INSERT INTO solicitudes (imagen, nombre_evento, lugar_evento, fecha_evento, fecha_evento_fin, hora_evento_ini, hora_evento_fin, area_evento, usuario_solicita, estado, fecha_soliciud, tipo_agenda, ediciones, color_fondo, publica) VALUES ('".$name."', '".utf8_decode($nom_even)."', '".$lug."', '".$fec."', '".$fed."', '".$hor."', '".$hod."', '".$are."', '".$_SESSION['idx']."', '9', '".$fechaDR."', '".$tip."', '".$mensaje."', '".$color_fondo."', '1');");

						if(mysql_num_rows($sqlx)){
							while($mostrarx = mysql_fetch_array($sqlx)){
					  			header('Location: solicitudes.php');
							}
						}
						echo '<script> window.location="solicitudes.php"; </script>';

				    }

				    if(@$_POST['llllll']){
				    	$nombrefoto1=$_FILES['foto1']['name'];
						$ruta1=$_FILES['foto1']['tmp_name'];
						if(is_uploaded_file($ruta1)){ 
				        	if($_FILES['foto1']['type'] == 'image/png' OR $_FILES['foto1']['type'] == 'image/gif' OR $_FILES['foto1']['type'] == 'image/jpeg'){
								include "iseupdaconex.php";
								$query= mysql_query("SELECT MAX(id) AS id FROM solicitudes");
				          		mysql_free_result($query);
				          		
								$hoy=date("Y-m-d H:i:s");
								$nimg = $hoy;
								mysql_query("SET NAMES 'utf8';");
								$tips = 'jpg';
								$type = array('image/jpeg' => 'jpg');
								$name = MD5('Img'.$nimg);
				          		$name = $name.'.'.$tips;
				          		//$name = 'Img'.$nimg.'.'.$tips;
								$destino1 =  "img/agendas/".$name;
								copy($ruta1,$destino1);
								$ruta_imagen = $destino1;
								//$miniatura_ancho_maximo = 1227;
								//$miniatura_alto_maximo = 700;
								$info_imagen = getimagesize($ruta_imagen);
								$imagen_ancho = $info_imagen[0];
								$imagen_alto = $info_imagen[1];
				          		$miniatura_ancho_maximo = $imagen_ancho;
				          		$miniatura_alto_maximo = $imagen_alto;
								$imagen_tipo = $info_imagen['mime'];
								switch ( $imagen_tipo ){
				  					case "image/jpg":
				  					case "image/jpeg":
				    				  $imagen = imagecreatefromjpeg( $ruta_imagen );
				    				  break;
				  					case "image/png":
				    					$imagen = imagecreatefrompng( $ruta_imagen );
				    				  break;
				  					case "image/gif":
				    					$imagen = imagecreatefromgif( $ruta_imagen );
				    					break;
								}
								$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
								imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
								imagejpeg($lienzo, $destino1, 100);
				          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------INICIO
				          		$logo1 = $destino1;
				          		$info_imagen = getimagesize($logo1);
				          		$ancho = $info_imagen[0];
				          		$alto = $info_imagen[1];
				          		$destino=$destino1;
				          		$destino_temporal=tempnam("tmp/","tmp");
				          		$Nue_aalto = 700;
				          		$Nue_ancho = (((($Nue_aalto*100)/$alto)*$ancho)/100);
				          		function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad){
				            		$img = ImageCreateFromJPEG($img_original);
				            		$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
				            		ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img));
				            		ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
				            		ImageDestroy($img);
				          		}
				          		redimensionar_jpeg($logo1, $destino_temporal, $Nue_ancho, $Nue_aalto, 100);
				          		$fp=fopen($destino,"w");
				          		fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
				          		fclose($fp);
				          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------FIN
				          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------INICIO
				          		$logo1 =imagecreatefromstring(file_get_contents($destino1));
				          		$salida = imagecreatetruecolor(1227, 700);
				          		imagefilter($logo1, IMG_FILTER_PIXELATE, 10, true);
				          		//imagecopy($salida, $logo1, -imagesx($logo1)/2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		//imagecopy($salida, $logo1, imagesx($logo1) , 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1), 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*3, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*4, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*5, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*6, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*7, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*8, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*9, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagedestroy($logo1);
				          		$conta = 0;
				          		while ( $conta < 5) {
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		$conta = $conta + 1;
				          		}
				          		imagefilter($salida, IMG_FILTER_GRAYSCALE);
				          		//imagefilter($salida, IMG_FILTER_NEGATE);
				          		$uusuxD = $_SESSION['nom'];
				          		$fondoxD='img/agendas/retoques/retoques1'.$uusuxD.'.jpg';
				          		imagejpeg( $salida,$fondoxD,100);
				          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------FIN
				          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------INICIO
				          		$abajo = imagecreatefromjpeg($fondoxD);
				          		$marcAgua = imagecreatefrompng( "../img/noticias/aditivos/fondohpanalisisimg2.png" );
				          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
				          		imagejpeg( $abajo,$fondoxD,100);
				          		imagedestroy( $abajo );
				          		imagedestroy( $marcAgua );
				          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------FIN
				          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------INICIO
				          		$abajo = imagecreatefromjpeg( $fondoxD );
				          		$arriba = imagecreatefromjpeg( $destino1 );
				          		$pos_x = ((1227-$Nue_ancho)/2);
				          		$pos_y = 0;
				          		if ($ancho > $alto) {
				              		$pos_y = (700-$Nue_aalto)/2;
				          		}
				          		imagecopy( $abajo, $arriba, $pos_x, $pos_y, 0, 0, $Nue_ancho, $Nue_aalto );
				          		imagejpeg( $abajo,$destino1,100);
				          		imagedestroy( $abajo );
				          		imagedestroy( $arriba );
				          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------FIN
				          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------INICIO
				          		$abajo = imagecreatefromjpeg( $destino1 );
				          		$marcAgua = imagecreatefrompng( "image/marcadeagua5.png" );
				          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
				          		imagejpeg( $abajo,$destino1,100);
				          		imagedestroy( $abajo );
				          		imagedestroy( $marcAgua );
				          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------FIN
				        	}
				      	}

				      	$nom_even = $_POST['nombre'];

				      	$clase = new sistema;
				      	$clase->conexion();

				      	$lug = $_POST['lugar'];
				      	

				      	if ($lug == 'xxx') {
				      		$lug = $_POST['lugarx'];
				      		$sqlsx = mysql_query("INSERT INTO lugares (nombre, conta, estado) VALUES ('".utf8_decode($lug)."','0','1');");
		  					if(mysql_num_rows($sqlsx)){
								while($mostrarx = mysql_fetch_array($sqlsx)){
								}
							}
				      	}

				      	$fec = $_POST['fecha'];
				      	$hor = $_POST['hora'];
				      	$fed = $_POST['fecha'];
				      	$hod = $_POST['horad'];
				      	$tipevento = $_POST['tipevent'];
				      	
				      	$hnotx = substr($hor,0,2);
    					$mnotx = substr($hor,3,2);
    					
    					/*
    					if ($mnotx <= '29') {
    						$mnotx = '00';
    					}
    					if ($mnotx <= '59' && $mnotx >= '30') {
    						$mnotx = '30';
    					}
						*/

    					$hor = $hnotx.':'.$mnotx;


				      	$hnoty = substr($hod,0,2);
    					$mnoty = substr($hod,3,2);
    					
/*    					if ($mnoty <= '29') {
    						$mnoty = '00';
    					}
    					if ($mnoty <= '59' && $mnoty >= '30') {
    						$mnoty = '30';
    					}*/

    					$hod = $hnoty.':'.$mnoty;

				      	
				      	$are = $_POST['area'];
				      	$tip = '1';

				      	$nom_even = str_replace('“', '"', $nom_even);
				      	$nom_even = str_replace('”', '"', $nom_even);
				      	$nom_even = str_replace("' ", '" ', $nom_even);
				      	$nom_even = str_replace(" '", ' "', $nom_even);
				      	$nom_even = str_replace("'", '´', $nom_even);
				      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
				      	str_replace("\n"," ",$nom_even);
				      	$nom_even = str_replace("…", '...', $nom_even);
				      	$nom_even = str_replace(" – ", " - ", $nom_even);
				      	$nom_even = str_replace("‘", '´', $nom_even);
				      	$nom_even = str_replace("’", '´', $nom_even);
				      	
				      	$fechaDR = date('Y-m-d H:i:s');
				      	$mensaje = "----- La creación de la publicación se realizo corectamente: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
				      	
						// Check connection

				      	$sqlx = "INSERT INTO solicitudes (imagen, nombre_evento, lugar_evento, fecha_evento, fecha_evento_fin, hora_evento_ini, hora_evento_fin, area_evento, usuario_solicita, estado, fecha_soliciud, tipo_agenda, ediciones, color_fondo, publica) VALUES ('".$name."', '".$nom_even."', '".$lug."', '".$fec."', '".$fed."', '".$hor."', '".$hod."', '".$are."', '".$_SESSION['idx']."', '9', '".$fechaDR."', '".$tip."', '".$mensaje."', '#8c1b67', '".$tipevento."');";
							
						if(mysql_query($sqlx)){
							echo '<script> window.location="solicitudes.php"; </script>';
						}
						echo '<script> window.location="solicitudes.php"; </script>';

				    }
				    if(@$_POST['kkkkkk']){
				    	$nombrefoto1=$_FILES['foto1']['name'];
						$ruta1=$_FILES['foto1']['tmp_name'];
						if(is_uploaded_file($ruta1)){ 
				        	if($_FILES['foto1']['type'] == 'image/png' OR $_FILES['foto1']['type'] == 'image/gif' OR $_FILES['foto1']['type'] == 'image/jpeg'){
								include "iseupdaconex.php";
								$query= mysql_query("SELECT MAX(id) AS id FROM solicitudes");
								mysql_free_result($query);
				          		
								$hoy=date("Y-m-d H:i:s");  
								$nimg = $hoy;
								mysql_query("SET NAMES 'utf8';");
								$tips = 'jpg';
								$type = array('image/jpeg' => 'jpg');
								$name = MD5('Img'.$nimg);
				          		$name = $name.'.'.$tips;
				          		//$name = 'Img'.$nimg.'.'.$tips;
								$destino1 =  "img/agendas/".$name;
								copy($ruta1,$destino1);
								$ruta_imagen = $destino1;
								//$miniatura_ancho_maximo = 1227;
								//$miniatura_alto_maximo = 700;
								$info_imagen = getimagesize($ruta_imagen);
								$imagen_ancho = $info_imagen[0];
								$imagen_alto = $info_imagen[1];
				          		$miniatura_ancho_maximo = $imagen_ancho;
				          		$miniatura_alto_maximo = $imagen_alto;
								$imagen_tipo = $info_imagen['mime'];
								switch ( $imagen_tipo ){
				  					case "image/jpg":
				  					case "image/jpeg":
				    				  $imagen = imagecreatefromjpeg( $ruta_imagen );
				    				  break;
				  					case "image/png":
				    					$imagen = imagecreatefrompng( $ruta_imagen );
				    				  break;
				  					case "image/gif":
				    					$imagen = imagecreatefromgif( $ruta_imagen );
				    					break;
								}
								$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
								imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
								imagejpeg($lienzo, $destino1, 100);
				          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------INICIO
				          		$logo1 = $destino1;
				          		$info_imagen = getimagesize($logo1);
				          		$ancho = $info_imagen[0];
				          		$alto = $info_imagen[1];
				          		$destino=$destino1;
				          		$destino_temporal=tempnam("tmp/","tmp");
				          		$Nue_aalto = 700;
				          		$Nue_ancho = (((($Nue_aalto*100)/$alto)*$ancho)/100);
				          		function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad){
				            		$img = ImageCreateFromJPEG($img_original);
				            		$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
				            		ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img));
				            		ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
				            		ImageDestroy($img);
				          		}
				          		redimensionar_jpeg($logo1, $destino_temporal, $Nue_ancho, $Nue_aalto, 100);
				          		$fp=fopen($destino,"w");
				          		fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
				          		fclose($fp);
				          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------FIN
				          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------INICIO
				          		$logo1 =imagecreatefromstring(file_get_contents($destino1));
				          		$salida = imagecreatetruecolor(1227, 700);
				          		imagefilter($logo1, IMG_FILTER_PIXELATE, 10, true);
				          		//imagecopy($salida, $logo1, -imagesx($logo1)/2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		//imagecopy($salida, $logo1, imagesx($logo1) , 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1), 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*3, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*4, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*5, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*6, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*7, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*8, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagecopy($salida, $logo1, imagesx($logo1)*9, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
				          		imagedestroy($logo1);
				          		$conta = 0;
				          		while ( $conta < 5) {
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
				              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
				              		$conta = $conta + 1;
				          		}
				          		imagefilter($salida, IMG_FILTER_GRAYSCALE);
				          		//imagefilter($salida, IMG_FILTER_NEGATE);
				          		$uusuxD = $_SESSION['nom'];
				          		$fondoxD='img/agendas/retoques/retoques1'.$uusuxD.'.jpg';
				          		imagejpeg( $salida,$fondoxD,100);
				          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------FIN
				          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------INICIO
				          		$abajo = imagecreatefromjpeg($fondoxD);
				          		$marcAgua = imagecreatefrompng( "../img/noticias/aditivos/fondohpanalisisimg2.png" );
				          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
				          		imagejpeg( $abajo,$fondoxD,100);
				          		imagedestroy( $abajo );
				          		imagedestroy( $marcAgua );
				          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------FIN
				          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------INICIO
				          		$abajo = imagecreatefromjpeg( $fondoxD );
				          		$arriba = imagecreatefromjpeg( $destino1 );
				          		$pos_x = ((1227-$Nue_ancho)/2);
				          		$pos_y = 0;
				          		if ($ancho > $alto) {
				              		$pos_y = (700-$Nue_aalto)/2;
				          		}
				          		imagecopy( $abajo, $arriba, $pos_x, $pos_y, 0, 0, $Nue_ancho, $Nue_aalto );
				          		imagejpeg( $abajo,$destino1,100);
				          		imagedestroy( $abajo );
				          		imagedestroy( $arriba );
				          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------FIN
				          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------INICIO
				          		$abajo = imagecreatefromjpeg( $destino1 );
				          		$marcAgua = imagecreatefrompng( "image/marcadeagua5.png" );
				          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
				          		imagejpeg( $abajo,$destino1,100);
				          		imagedestroy( $abajo );
				          		imagedestroy( $marcAgua );
				          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------FIN
				        	}
				      	}

				      	$nom_even = $_POST['nombre'];

				      	$clase = new sistema;
				      	$clase->conexion();

				      	$lug = $_POST['lugar'];
				      	

				      	if ($lug == 'xxx') {
				      		$lug = $_POST['lugarx'];
				      		$sqlsx = mysql_query("INSERT INTO lugares (nombre, conta, estado) VALUES ('".utf8_decode($lug)."','1','1');");
		  					if(mysql_num_rows($sqlsx)){
								while($mostrarx = mysql_fetch_array($sqlsx)){
								}
							}
				      	}
				      	
				      	$fec = $_POST['fecha'];
				      	$hor = $_POST['hora'];
				      	$fed = $_POST['fecha'];
				      	$hod = $_POST['horad'];
				      	$tipevento = $_POST['tipevent'];
				      	
				      	$hnotx = substr($hor,0,2);
    					$mnotx = substr($hor,3,2);
    					
    					/*
    					if ($mnotx <= '29') {
    						$mnotx = '00';
    					}
    					if ($mnotx <= '59' && $mnotx >= '30') {
    						$mnotx = '30';
    					}
						*/

    					$hor = $hnotx.':'.$mnotx;

				      	$hnoty = substr($hod,0,2);
    					$mnoty = substr($hod,3,2);
    					
/*    					if ($mnoty <= '29') {
    						$mnoty = '00';
    					}
    					if ($mnoty <= '59' && $mnoty >= '30') {
    						$mnoty = '30';
    					}*/

    					$hod = $hnoty.':'.$mnoty;

				      	$are = $_SESSION['are'];
				      	$tip = '1';

				      	$nom_even = str_replace('“', '"', $nom_even);
				      	$nom_even = str_replace('”', '"', $nom_even);
				      	$nom_even = str_replace("' ", '" ', $nom_even);
				      	$nom_even = str_replace(" '", ' "', $nom_even);
				      	$nom_even = str_replace("'", '´', $nom_even);
				      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
				      	str_replace("\n"," ",$nom_even);
				      	$nom_even = str_replace("…", '...', $nom_even);
				      	$nom_even = str_replace(" – ", " - ", $nom_even);
				      	$nom_even = str_replace("‘", '´', $nom_even);
				      	$nom_even = str_replace("’", '´', $nom_even);
				      	
				      	$fechaDR = date('Y-m-d H:i:s');
				      	$mensaje = "----- La creación de la publicación se realizo corectamente: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
						// Check connection
						$sqlx = "INSERT INTO solicitudes (imagen, nombre_evento, lugar_evento, fecha_evento, fecha_evento_fin, hora_evento_ini, hora_evento_fin, area_evento, usuario_solicita, estado, fecha_soliciud, tipo_agenda, ediciones, color_fondo, publica) VALUES ('".$name."', '".$nom_even."', '".$lug."', '".$fec."', '".$fed."', '".$hor."', '".$hod."', '".$are."', '".$_SESSION['idx']."', '1', '".$fechaDR."', '".$tip."', '".$mensaje."', '#8c1b67', '".$tipevento."');";
						if(mysql_query($sqlx)){
							echo '<script> window.location="solicitudes.php"; </script>';
						}
						echo '<script> window.location="solicitudes.php"; </script>';
				    }
		}

	
		function valreg(){

			if($_POST['hora'] >= $_POST['horad']){
				?>
					<script>
						alert("Por favor Verifica tus datos, la hora no es valida");
					</script>
				<?php
				echo '<script> window.location="solicitudes.php"; </script>';
			}
			else{
				$clasexy = new sistema;
	            $clasexy->conexion();
				$lug_fec_igual = mysql_query("SELECT * FROM solicitudes WHERE (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND hora_evento_ini BETWEEN '".$_POST['hora']."' AND '".$_POST['horad']."') OR (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND hora_evento_fin BETWEEN '".$_POST['hora']."' AND '".$_POST['horad']."') OR (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND '".$_POST['hora']."' BETWEEN hora_evento_ini AND hora_evento_fin) OR (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND '".$_POST['horad']."' BETWEEN hora_evento_ini AND hora_evento_fin);");

				



				if(mysql_num_rows($lug_fec_igual)>0){
					while($mostrarx = mysql_fetch_array($lug_fec_igual)){
						$are_fec_igual = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarx['area_evento']."'");
						if(mysql_num_rows($are_fec_igual)>0){
							while($mostrarz = mysql_fetch_array($are_fec_igual)){
								?>
									<script>
			    						alert("La actividad que intentas registrar interfiere con el evento de <?php echo utf8_encode($mostrarz['nombre']);?>, por favor verifica el calendario.");
									</script>
								<?php
							}
						}
					}
					mysql_free_result($lug_fec_igual);
					echo '<script> window.location="solicitudes.php"; </script>';
				}
				else{
					mysql_free_result($lug_fec_igual);
					$clasex = new sistema;
	                $clasex->conexion();
	                $clasex->regmortalsql();
				}
			}
		}

		function valactcont(){

			if($_POST['contra123'] != $_POST['contra234']){
				?>
					<script>
						alert("La contraseña no coincide.");
					</script>
				<?php
				echo '<script> window.location="contcamb.php?NU='.$_POST['idusu'].'"; </script>';
			}

			if($_POST['contra123'] == $_POST['contra234']){
				$clasexy = new sistema;
	            $clasexy->conexion();



	            $sql = "UPDATE usuarios SET contrasena = MD5('".$_POST['contra123']."') WHERE id = '".$_POST['idusu']."'";

				if(mysql_query($sql)){
					?>
						<script>
							alert("La contraseña ha sido cambiada correctamente.");
						</script>
					<?php
					mysql_free_result($lug_fec_igual);

					echo '<script> window.location="../index.php"; </script>';
				}
			}
		}

		function valact(){

			if($_POST['hora'] >= $_POST['horad']){
				?>
					<script>
						alert("Por favor Verifica tus datos, la hora no es valida");
					</script>
				<?php
				echo '<script> window.location="solicitudes.php"; </script>';
			}

			else{
				$clasexy = new sistema;
	            $clasexy->conexion();
	            $lug_fec_igual = mysql_query("SELECT * FROM solicitudes WHERE (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND id != '".$_POST['idse']."' AND hora_evento_ini BETWEEN '".$_POST['hora']."' AND '".$_POST['horad']."') OR (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND id != '".$_POST['idse']."' AND hora_evento_fin BETWEEN '".$_POST['hora']."' AND '".$_POST['horad']."') OR (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND id != '".$_POST['idse']."' AND '".$_POST['hora']."' BETWEEN hora_evento_ini AND hora_evento_fin) OR (tipo_agenda = '1' AND fecha_evento = '".$_POST['fecha']."' AND lugar_evento = '".utf8_decode($_POST['lugar'])."' AND id != '".$_POST['idse']."' AND '".$_POST['horad']."' BETWEEN hora_evento_ini AND hora_evento_fin);");



				if(mysql_num_rows($lug_fec_igual)>0){
					while($mostrarx = mysql_fetch_array($lug_fec_igual)){
						$are_fec_igual = mysql_query("SELECT * FROM areas WHERE id = '".$mostrarx['area_evento']."'");
						if(mysql_num_rows($are_fec_igual)>0){
							while($mostrarz = mysql_fetch_array($are_fec_igual)){
								?>
									<script>
			    						alert("La actividad que intentas registrar interfiere con el evento de <?php echo utf8_encode($mostrarz['nombre']);?>, por favor verifica el calendario.");
									</script>
								<?php
							}
						}
					}
					mysql_free_result($lug_fec_igual);

					echo '<script> window.location="solicitudes.php"; </script>';
				}
				else{
					mysql_free_result($lug_fec_igual);
					$clasex = new sistema;
	                $clasex->conexion();
	                $clasex->regmortalsqledita();
				}
			}
		}

		function valactCE(){

			if($_POST['fecha'] > $_POST['fechad']){
				?>
					<script>
						alert("Por favor Verifica tus datos, la fecha no es valida");
					</script>
				<?php
				echo '<script> window.location="solicitudes.php"; </script>';
			}

			else{
				$clasex = new sistema;
                $clasex->conexion();
                $clasex->regmortalsqledita();
			}
		}

		

		function regmortalsqledita(){
			
		if(@$_POST['ACTRESU']){
		    $nombrefoto1=$_FILES['foto1']['name'];
			$ruta1=$_FILES['foto1']['tmp_name'];
			if(is_uploaded_file($ruta1)){
		        if($_FILES['foto1']['type'] == 'image/png' OR $_FILES['foto1']['type'] == 'image/gif' OR $_FILES['foto1']['type'] == 'image/jpeg'){
					$nimg = $_POST['solifech'];
					$tips = 'jpg';
					$type = array('image/jpeg' => 'jpg');
					$name = MD5('Img'.$nimg);
	          		$name = $name.'.'.$tips;
	          		//$name = 'Img'.$nimg.'.'.$tips;
					$destino1 =  "img/agendas/".$name;
					copy($ruta1,$destino1);
					$ruta_imagen = $destino1;
					//$miniatura_ancho_maximo = 1227;
					//$miniatura_alto_maximo = 700;
					$info_imagen = getimagesize($ruta_imagen);
					$imagen_ancho = $info_imagen[0];
					$imagen_alto = $info_imagen[1];
	          		$miniatura_ancho_maximo = $imagen_ancho;
	          		$miniatura_alto_maximo = $imagen_alto;
					$imagen_tipo = $info_imagen['mime'];
					switch ( $imagen_tipo ){
	  					case "image/jpg":
	  					case "image/jpeg":
	    				  $imagen = imagecreatefromjpeg( $ruta_imagen );
	    				  break;
	  					case "image/png":
	    					$imagen = imagecreatefrompng( $ruta_imagen );
	    				  break;
	  					case "image/gif":
	    					$imagen = imagecreatefromgif( $ruta_imagen );
	    					break;
					}
					$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
					imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
					imagejpeg($lienzo, $destino1, 100);
	          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------INICIO
	          		$logo1 = $destino1;
	          		$info_imagen = getimagesize($logo1);
	          		$ancho = $info_imagen[0];
	          		$alto = $info_imagen[1];
	          		$destino=$destino1;
	          		$destino_temporal=tempnam("tmp/","tmp");
	          		$Nue_aalto = 700;
	          		$Nue_ancho = (((($Nue_aalto*100)/$alto)*$ancho)/100);
	          		function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad){
	            		$img = ImageCreateFromJPEG($img_original);
	            		$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
	            		ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img));
	            		ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
	            		ImageDestroy($img);
	          		}
	          		redimensionar_jpeg($logo1, $destino_temporal, $Nue_ancho, $Nue_aalto, 100);
	          		$fp=fopen($destino,"w");
	          		fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
	          		fclose($fp);
	          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------FIN
	          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------INICIO
	          		$logo1 =imagecreatefromstring(file_get_contents($destino1));
	          		$salida = imagecreatetruecolor(1227, 700);
	          		imagefilter($logo1, IMG_FILTER_PIXELATE, 10, true);
	          		//imagecopy($salida, $logo1, -imagesx($logo1)/2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		//imagecopy($salida, $logo1, imagesx($logo1) , 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1), 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*3, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*4, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*5, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*6, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*7, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*8, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagecopy($salida, $logo1, imagesx($logo1)*9, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
	          		imagedestroy($logo1);
	          		$conta = 0;
	          		while ( $conta < 5) {
	              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
	              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
	              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
	              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
	              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
	              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
	              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
	              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
	              		$conta = $conta + 1;
	          		}
	          		imagefilter($salida, IMG_FILTER_GRAYSCALE);
	          		//imagefilter($salida, IMG_FILTER_NEGATE);
	          		$uusuxD = $_SESSION['nom'];
	          		$fondoxD='img/agendas/retoques/retoques1'.$uusuxD.'.jpg';
	          		imagejpeg( $salida,$fondoxD,100);
	          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------FIN
	          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------INICIO
	          		$abajo = imagecreatefromjpeg($fondoxD);
	          		$marcAgua = imagecreatefrompng( "../img/noticias/aditivos/fondohpanalisisimg2.png" );
	          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
	          		imagejpeg( $abajo,$fondoxD,100);
	          		imagedestroy( $abajo );
	          		imagedestroy( $marcAgua );
	          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------FIN
	          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------INICIO
	          		$abajo = imagecreatefromjpeg( $fondoxD );
	          		$arriba = imagecreatefromjpeg( $destino1 );
	          		$pos_x = ((1227-$Nue_ancho)/2);
	          		$pos_y = 0;
	          		if ($ancho > $alto) {
	              		$pos_y = (700-$Nue_aalto)/2;
	          		}
	          		imagecopy( $abajo, $arriba, $pos_x, $pos_y, 0, 0, $Nue_ancho, $Nue_aalto );
	          		imagejpeg( $abajo,$destino1,100);
	          		imagedestroy( $abajo );
	          		imagedestroy( $arriba );
	          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------FIN
	          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------INICIO
	          		$abajo = imagecreatefromjpeg( $destino1 );
	          		$marcAgua = imagecreatefrompng( "image/marcadeagua5.png" );
	          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
	          		imagejpeg( $abajo,$destino1,100);
	          		imagedestroy( $abajo );
	          		imagedestroy( $marcAgua );
	          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------FIN

				      	
          			$clase = new sistema;
          			$clase->conexion();
			      	
			      	$hoy=date("Y-m-d");  
					$ayer = date( "Y-m-d", strtotime( "-7 day", strtotime( $hoy ) ) );
			      	$ayeresu = date( "Y-m-d", strtotime( "7 day", strtotime( $hoy ) ) );
			      	$edic = ':v';

			      	$sqlMEN = mysql_query("SELECT * FROM solicitudes WHERE id = '".$_POST['idse']."'");
  					if(mysql_num_rows($sqlMEN)>0){
    					while($mostrarx = mysql_fetch_array($sqlMEN)){
    						$edic = $mostrarx['ediciones'];
    					}
    				}
    				mysql_free_result($sqlMEN);
	    				
			      	$fechaDR = date('Y-m-d H:i:s');

			      	$mensaje = "----- La edición se realizo corectamente en la fecha: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
			      	$mensaje = $edic.$mensaje;

			      	$sqls = mysql_query("UPDATE solicitudes SET imagen = '".$name."', fecha_evento = '".utf8_decode($hoy)."', fecha_evento_fin = '".utf8_decode($ayeresu)."', ediciones = '".utf8_decode($mensaje)."' WHERE id = '".utf8_decode($_POST['idse'])."'");


					if($sqls){
						echo '<script> window.location="solicitudes.php"; </script>';
					}


				    else{
						echo '<script> window.location="solicitudex.php"; </script>';
				    }

					mysql_query("SET NAMES 'utf8';");

					echo '<script> window.location="solicitudes.php"; </script>';
	        	}
		    }

		    else{
				echo '<script> window.location="solicitudes.php"; </script>';
		    }


		}

		    if(@$_POST['pppppp']){
		    	
		    	$nom_even = $_POST['nombre'];

		      	$fec = $_POST['fecha'];
		      	$fed = $_POST['fechad'];

		      	$nom_even = str_replace('“', '"', $nom_even);
		      	$nom_even = str_replace('”', '"', $nom_even);
		      	$nom_even = str_replace("' ", '" ', $nom_even);
		      	$nom_even = str_replace(" '", ' "', $nom_even);
		      	$nom_even = str_replace("'", '´', $nom_even);
		      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
		      	str_replace("\n"," ",$nom_even);
		      	$nom_even = str_replace("…", '...', $nom_even);
		      	$nom_even = str_replace(" – ", " - ", $nom_even);
		      	$nom_even = str_replace("‘", '´', $nom_even);
		      	$nom_even = str_replace("’", '´', $nom_even);

				$color_fondo = $_POST['myColor'];
		      	$color_texto = $_POST['myColor1'];

		      	
		      	$fechaDR = date('Y-m-d H:i:s');
		      	$edic = ':v';

		      	$sqlMEN = mysql_query("SELECT * FROM solicitudes WHERE id = '".$_POST['idse']."'");
					if(mysql_num_rows($sqlMEN)>0){
					while($mostrarx = mysql_fetch_array($sqlMEN)){
						$edic = $mostrarx['ediciones'];
					}
				}
				mysql_free_result($sqlMEN);

				$mensaje = "----- La edición se realizo corectamente en la fecha: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
		      	$mensaje = $edic.$mensaje;

				// Check connection

				$sqlx = mysql_query("UPDATE solicitudes SET color_fondo = '".$color_fondo."', nombre_evento = '".utf8_decode($nom_even)."', fecha_evento = '".utf8_decode($fec)."', fecha_evento_fin = '".utf8_decode($fed)."', ediciones = '".utf8_decode($mensaje)."', estado = '".$_POST['estate']."' WHERE id = '".utf8_decode($_POST['idse'])."'");


				if($sqlx){
												$sqly = mysql_query("select * from lugares where nombre = '".utf8_decode($lug)."'");
							if(mysql_num_rows($sqly)){
								while($mostrary = mysql_fetch_array($sqly)){
									$conta = $mostrary['conta'] + 1;
									$sqlz = mysql_query("UPDATE lugares SET conta = '".$conta."' where id = '".$mostrary['id']."'");
									if(mysql_num_rows($sqlz)){
										while($mostrarz = mysql_fetch_array($sqlz)){
											header('Location: solicitudes.php');
										}
									}
								}
							}
					if(mysql_num_rows($sqly)){
						echo '<script> window.location="solicitudes.php"; </script>';
					}
				}

				echo '<script> window.location="solicitudes.php"; </script>';

		    }

		    if(@$_POST['llllll']){
		    	$nombrefoto1=$_FILES['foto1']['name'];
				$ruta1=$_FILES['foto1']['tmp_name'];
				if(is_uploaded_file($ruta1)){ 
		        	if($_FILES['foto1']['type'] == 'image/png' OR $_FILES['foto1']['type'] == 'image/gif' OR $_FILES['foto1']['type'] == 'image/jpeg'){
						$nimg = $_POST['solifech'];
						$tips = 'jpg';
						$type = array('image/jpeg' => 'jpg');
						$name = MD5('Img'.$nimg);
		          		$name = $name.'.'.$tips;
		          		//$name = 'Img'.$nimg.'.'.$tips;
						$destino1 =  "img/agendas/".$name;
						copy($ruta1,$destino1);
						$ruta_imagen = $destino1;
						//$miniatura_ancho_maximo = 1227;
						//$miniatura_alto_maximo = 700;
						$info_imagen = getimagesize($ruta_imagen);
						$imagen_ancho = $info_imagen[0];
						$imagen_alto = $info_imagen[1];
		          		$miniatura_ancho_maximo = $imagen_ancho;
		          		$miniatura_alto_maximo = $imagen_alto;
						$imagen_tipo = $info_imagen['mime'];
						switch ( $imagen_tipo ){
		  					case "image/jpg":
		  					case "image/jpeg":
		    				  $imagen = imagecreatefromjpeg( $ruta_imagen );
		    				  break;
		  					case "image/png":
		    					$imagen = imagecreatefrompng( $ruta_imagen );
		    				  break;
		  					case "image/gif":
		    					$imagen = imagecreatefromgif( $ruta_imagen );
		    					break;
						}
						$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
						imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
						imagejpeg($lienzo, $destino1, 100);
		          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------INICIO
		          		$logo1 = $destino1;
		          		$info_imagen = getimagesize($logo1);
		          		$ancho = $info_imagen[0];
		          		$alto = $info_imagen[1];
		          		$destino=$destino1;
		          		$destino_temporal=tempnam("tmp/","tmp");
		          		$Nue_aalto = 700;
		          		$Nue_ancho = (((($Nue_aalto*100)/$alto)*$ancho)/100);
		          		function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad){
		            		$img = ImageCreateFromJPEG($img_original);
		            		$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
		            		ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img));
		            		ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
		            		ImageDestroy($img);
		          		}
		          		redimensionar_jpeg($logo1, $destino_temporal, $Nue_ancho, $Nue_aalto, 100);
		          		$fp=fopen($destino,"w");
		          		fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
		          		fclose($fp);
		          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------FIN
		          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------INICIO
		          		$logo1 =imagecreatefromstring(file_get_contents($destino1));
		          		$salida = imagecreatetruecolor(1227, 700);
		          		imagefilter($logo1, IMG_FILTER_PIXELATE, 10, true);
		          		//imagecopy($salida, $logo1, -imagesx($logo1)/2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		//imagecopy($salida, $logo1, imagesx($logo1) , 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1), 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*3, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*4, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*5, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*6, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*7, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*8, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*9, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagedestroy($logo1);
		          		$conta = 0;
		          		while ( $conta < 5) {
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		$conta = $conta + 1;
		          		}
		          		imagefilter($salida, IMG_FILTER_GRAYSCALE);
		          		//imagefilter($salida, IMG_FILTER_NEGATE);
		          		$uusuxD = $_SESSION['nom'];
		          		$fondoxD='img/agendas/retoques/retoques1'.$uusuxD.'.jpg';
		          		imagejpeg( $salida,$fondoxD,100);
		          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------FIN
		          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------INICIO
		          		$abajo = imagecreatefromjpeg($fondoxD);
		          		$marcAgua = imagecreatefrompng( "../img/noticias/aditivos/fondohpanalisisimg2.png" );
		          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
		          		imagejpeg( $abajo,$fondoxD,100);
		          		imagedestroy( $abajo );
		          		imagedestroy( $marcAgua );
		          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------FIN
		          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------INICIO
		          		$abajo = imagecreatefromjpeg( $fondoxD );
		          		$arriba = imagecreatefromjpeg( $destino1 );
		          		$pos_x = ((1227-$Nue_ancho)/2);
		          		$pos_y = 0;
		          		if ($ancho > $alto) {
		              		$pos_y = (700-$Nue_aalto)/2;
		          		}
		          		imagecopy( $abajo, $arriba, $pos_x, $pos_y, 0, 0, $Nue_ancho, $Nue_aalto );
		          		imagejpeg( $abajo,$destino1,100);
		          		imagedestroy( $abajo );
		          		imagedestroy( $arriba );
		          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------FIN
		          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------INICIO
		          		$abajo = imagecreatefromjpeg( $destino1 );
		          		$marcAgua = imagecreatefrompng( "image/marcadeagua5.png" );
		          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
		          		imagejpeg( $abajo,$destino1,100);
		          		imagedestroy( $abajo );
		          		imagedestroy( $marcAgua );
		          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------FIN

	          			$nom_even = $_POST['nombre'];
				      	
	          			$clase = new sistema;
	          			$clase->conexion();

				      	$lug = $_POST['lugar'];
				      	

				      	if ($lug == 'xxx') {
				      		$lug = $_POST['lugarx'];
				      		$sqlsx = mysql_query("INSERT INTO lugares (nombre, conta, estado) VALUES ('".utf8_decode($lug)."','1','1');");
		  					if(mysql_num_rows($sqlsx)){
								while($mostrarx = mysql_fetch_array($sqlsx)){
								}
							}
				      	}

				      	$fec = $_POST['fecha'];
				      	$hor = $_POST['hora'];
				      	$fed = $_POST['fecha'];
				      	$hod = $_POST['horad'];
				      	
				      	$hnotx = substr($hor,0,2);
    					$mnotx = substr($hor,3,2);
    					
    					/*
    					if ($mnotx <= '29') {
    						$mnotx = '00';
    					}
    					if ($mnotx <= '59' && $mnotx >= '30') {
    						$mnotx = '30';
    					}
						*/

    					$hor = $hnotx.':'.$mnotx;


				      	$hnoty = substr($hod,0,2);
    					$mnoty = substr($hod,3,2);
    					
/*    					if ($mnoty <= '29') {
    						$mnoty = '00';
    					}
    					if ($mnoty <= '59' && $mnoty >= '30') {
    						$mnoty = '30';
    					}*/

    					$hod = $hnoty.':'.$mnoty;

				      	$are = $_POST['area'];
				      	$tip = '1';
				      	$tipevento = $_POST['tipevent'];

				      	$nom_even = str_replace('“', '"', $nom_even);
				      	$nom_even = str_replace('”', '"', $nom_even);
				      	$nom_even = str_replace("' ", '" ', $nom_even);
				      	$nom_even = str_replace(" '", ' "', $nom_even);
				      	$nom_even = str_replace("'", '´', $nom_even);
				      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
				      	str_replace("\n"," ",$nom_even);
				      	$nom_even = str_replace("…", '...', $nom_even);
				      	$nom_even = str_replace(" – ", " - ", $nom_even);
				      	$nom_even = str_replace("‘", '´', $nom_even);
				      	$nom_even = str_replace("’", '´', $nom_even);
				      	
				      	$fechaDR = date('Y-m-d H:i:s');
				      	
				      	$edic = ':v';

				      	$sqlMEN = mysql_query("SELECT * FROM solicitudes WHERE id = '".$_POST['idse']."'");
	  					if(mysql_num_rows($sqlMEN)>0){
	    					while($mostrarx = mysql_fetch_array($sqlMEN)){
	    						$edic = $mostrarx['ediciones'];
	    					}
	    				}
	    				mysql_free_result($sqlMEN);
	    				
				      	$fechaDR = date('Y-m-d H:i:s');

				      	$mensaje = "----- La edición se realizo corectamente en la fecha: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
				      	$mensaje = $edic.$mensaje;

				      	$sqls = mysql_query("UPDATE solicitudes SET imagen = '".$name."', nombre_evento = '".utf8_decode($nom_even)."', lugar_evento = '".utf8_decode($lug)."', fecha_evento = '".utf8_decode($fec)."', fecha_evento_fin = '".utf8_decode($fed)."', hora_evento_ini = '".utf8_decode($hor)."', hora_evento_fin = '".utf8_decode($hod)."', area_evento = '".utf8_decode($are)."', estado = '9', tipo_agenda = '".utf8_decode($tip)."', ediciones = '".utf8_decode($mensaje)."', publica = '".$tipevento."' WHERE id = '".utf8_decode($_POST['idse'])."'");

						if($sqls){
							echo '<script> window.location="solicitudes.php"; </script>';
						}
					    else{
							echo '<script> window.location="solicitudex.php"; </script>';
					    }

						mysql_query("SET NAMES 'utf8';");

						echo '<script> window.location="solicitudes.php"; </script>';
		        	}
		      	}
		      	else{
		      		$nimg = $_POST['solifech'];
					$tips = 'jpg';
					$name = MD5('Img'.$nimg);
					$name = $name.'.'.$tips;
			      	$nom_even = $_POST['nombre'];
			      	$tipevento = $_POST['tipevent'];
			      	
			      	$clase = new sistema;
			      	$clase->conexion();

				      	$lug = $_POST['lugar'];
				      	

				      	if ($lug == 'xxx') {
				      		$lug = $_POST['lugarx'];
				      		$sqlsx = mysql_query("INSERT INTO lugares (nombre, conta, estado) VALUES ('".utf8_decode($lug)."','1','1');");
		  					if(mysql_num_rows($sqlsx)>0){
		    				}
				      	}

				      	$fec = $_POST['fecha'];
				      	$hor = $_POST['hora'];
				      	$fed = $_POST['fecha'];
				      	$hod = $_POST['horad'];
				      	
				      	$hnotx = substr($hor,0,2);
    					$mnotx = substr($hor,3,2);
    					
    					/*
    					if ($mnotx <= '29') {
    						$mnotx = '00';
    					}
    					if ($mnotx <= '59' && $mnotx >= '30') {
    						$mnotx = '30';
    					}
						*/

    					$hor = $hnotx.':'.$mnotx;


				      	$hnoty = substr($hod,0,2);
    					$mnoty = substr($hod,3,2);
    					
/*    					if ($mnoty <= '29') {
    						$mnoty = '00';
    					}
    					if ($mnoty <= '59' && $mnoty >= '30') {
    						$mnoty = '30';
    					}*/

    					$hod = $hnoty.':'.$mnoty;

			      	$are = $_POST['area'];
			      	$tip = '1';

			      	$nom_even = str_replace('“', '"', $nom_even);
			      	$nom_even = str_replace('”', '"', $nom_even);
			      	$nom_even = str_replace("' ", '" ', $nom_even);
			      	$nom_even = str_replace(" '", ' "', $nom_even);
			      	$nom_even = str_replace("'", '´', $nom_even);
			      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
			      	str_replace("\n"," ",$nom_even);
			      	$nom_even = str_replace("…", '...', $nom_even);
			      	$nom_even = str_replace(" – ", " - ", $nom_even);
			      	$nom_even = str_replace("‘", '´', $nom_even);
			      	$nom_even = str_replace("’", '´', $nom_even);
			      	
			      	$fechaDR = date('Y-m-d H:i:s');

			      	$edic = ':v';

			      	$sqlMEN = mysql_query("SELECT * FROM solicitudes WHERE id = '".$_POST['idse']."'");
  					if(mysql_num_rows($sqlMEN)>0){
    					while($mostrarx = mysql_fetch_array($sqlMEN)){
    						$edic = $mostrarx['ediciones'];
    					}
    				}
    				mysql_free_result($sqlMEN);
    				
				      	$fechaDR = date('Y-m-d H:i:s');

			      	$mensaje = "----- La edición se realizo corectamente en la fecha: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
			      	$mensaje = $edic.$mensaje;

			      	$sqls = mysql_query("UPDATE solicitudes SET nombre_evento = '".utf8_decode($nom_even)."', lugar_evento = '".utf8_decode($lug)."', fecha_evento = '".utf8_decode($fec)."', fecha_evento_fin = '".utf8_decode($fed)."', hora_evento_ini = '".utf8_decode($hor)."', hora_evento_fin = '".utf8_decode($hod)."', area_evento = '".utf8_decode($are)."', estado = '9', tipo_agenda = '".utf8_decode($tip)."', ediciones = '".utf8_decode($mensaje)."', publica = '".$tipevento."' WHERE id = '".utf8_decode($_POST['idse'])."'");
					if($sqls){
						echo '<script> window.location="solicitudes.php"; </script>';
					}
				    else{
						echo '<script> window.location="solicitudes.php"; </script>';
				    }
		      	}


		    }
		    if(@$_POST['kkkkkk']){
		    	$nombrefoto1=$_FILES['foto1']['name'];
				$ruta1=$_FILES['foto1']['tmp_name'];
				if(is_uploaded_file($ruta1)){ 
		        	if($_FILES['foto1']['type'] == 'image/png' OR $_FILES['foto1']['type'] == 'image/gif' OR $_FILES['foto1']['type'] == 'image/jpeg'){
						$nimg = $_POST['solifech'];
						$tips = 'jpg';
						$type = array('image/jpeg' => 'jpg');
						$name = MD5('Img'.$nimg);
		          		$name = $name.'.'.$tips;
		          		//$name = 'Img'.$nimg.'.'.$tips;
						$destino1 =  "img/agendas/".$name;
						copy($ruta1,$destino1);
						$ruta_imagen = $destino1;
						//$miniatura_ancho_maximo = 1227;
						//$miniatura_alto_maximo = 700;
						$info_imagen = getimagesize($ruta_imagen);
						$imagen_ancho = $info_imagen[0];
						$imagen_alto = $info_imagen[1];
		          		$miniatura_ancho_maximo = $imagen_ancho;
		          		$miniatura_alto_maximo = $imagen_alto;
						$imagen_tipo = $info_imagen['mime'];
						switch ( $imagen_tipo ){
		  					case "image/jpg":
		  					case "image/jpeg":
		    				  $imagen = imagecreatefromjpeg( $ruta_imagen );
		    				  break;
		  					case "image/png":
		    					$imagen = imagecreatefrompng( $ruta_imagen );
		    				  break;
		  					case "image/gif":
		    					$imagen = imagecreatefromgif( $ruta_imagen );
		    					break;
						}
						$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
						imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
						imagejpeg($lienzo, $destino1, 100);
		          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------INICIO
		          		$logo1 = $destino1;
		          		$info_imagen = getimagesize($logo1);
		          		$ancho = $info_imagen[0];
		          		$alto = $info_imagen[1];
		          		$destino=$destino1;
		          		$destino_temporal=tempnam("tmp/","tmp");
		          		$Nue_aalto = 700;
		          		$Nue_ancho = (((($Nue_aalto*100)/$alto)*$ancho)/100);
		          		function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad){
		            		$img = ImageCreateFromJPEG($img_original);
		            		$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura);
		            		ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img));
		            		ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
		            		ImageDestroy($img);
		          		}
		          		redimensionar_jpeg($logo1, $destino_temporal, $Nue_ancho, $Nue_aalto, 100);
		          		$fp=fopen($destino,"w");
		          		fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
		          		fclose($fp);
		          		//----------------------------------------------Redimencionar IMAGEN PRINCIPAL ----------------------FIN
		          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------INICIO
		          		$logo1 =imagecreatefromstring(file_get_contents($destino1));
		          		$salida = imagecreatetruecolor(1227, 700);
		          		imagefilter($logo1, IMG_FILTER_PIXELATE, 10, true);
		          		//imagecopy($salida, $logo1, -imagesx($logo1)/2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		//imagecopy($salida, $logo1, imagesx($logo1) , 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1), 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*2, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*3, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*4, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*5, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*6, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*7, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*8, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagecopy($salida, $logo1, imagesx($logo1)*9, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
		          		imagedestroy($logo1);
		          		$conta = 0;
		          		while ( $conta < 5) {
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		imagefilter($salida, IMG_FILTER_GAUSSIAN_BLUR);
		              		imagefilter($salida, IMG_FILTER_SELECTIVE_BLUR);
		              		$conta = $conta + 1;
		          		}
		          		imagefilter($salida, IMG_FILTER_GRAYSCALE);
		          		//imagefilter($salida, IMG_FILTER_NEGATE);
		          		$uusuxD = $_SESSION['nom'];
		          		$fondoxD='img/agendas/retoques/retoques1'.$uusuxD.'.jpg';
		          		imagejpeg( $salida,$fondoxD,100);
		          		//----------------------------------------------HACER FONDO DESENFOCADO----------------------FIN
		          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------INICIO
		          		$abajo = imagecreatefromjpeg($fondoxD);
		          		$marcAgua = imagecreatefrompng( "../img/noticias/aditivos/fondohpanalisisimg2.png" );
		          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
		          		imagejpeg( $abajo,$fondoxD,100);
		          		imagedestroy( $abajo );
		          		imagedestroy( $marcAgua );
		          		//----------------------------------------------AGREGAR MARCA DE AGUA AL FONDO----------------------FIN
		          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------INICIO
		          		$abajo = imagecreatefromjpeg( $fondoxD );
		          		$arriba = imagecreatefromjpeg( $destino1 );
		          		$pos_x = ((1227-$Nue_ancho)/2);
		          		$pos_y = 0;
		          		if ($ancho > $alto) {
		              		$pos_y = (700-$Nue_aalto)/2;
		          		}
		          		imagecopy( $abajo, $arriba, $pos_x, $pos_y, 0, 0, $Nue_ancho, $Nue_aalto );
		          		imagejpeg( $abajo,$destino1,100);
		          		imagedestroy( $abajo );
		          		imagedestroy( $arriba );
		          		//----------------------------------------------AGREGAR IMAGEN PRINCIPAL SOBRE EL FONDO----------------------FIN
		          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------INICIO
		          		$abajo = imagecreatefromjpeg( $destino1 );
		          		$marcAgua = imagecreatefrompng( "image/marcadeagua5.png" );
		          		imagecopy( $abajo, $marcAgua, 0, 0, 0, 0, 1227, 700 );
		          		imagejpeg( $abajo,$destino1,100);
		          		imagedestroy( $abajo );
		          		imagedestroy( $marcAgua );
		          		//----------------------------------------------AGREGAR MARCA DE AGUA----------------------FIN

	          			$nom_even = $_POST['nombre'];
				      	

			      		$clase = new sistema;
			      		$clase->conexion();

				      	$lug = $_POST['lugar'];
				      	

				      	if ($lug == 'xxx') {
				      		$lug = $_POST['lugarx'];
				      		$sqlsx = mysql_query("INSERT INTO lugares (nombre, conta, estado) VALUES ('".utf8_decode($lug)."','1','1');");
		  					if(mysql_num_rows($sqlsx)>0){
		    				}
				      	}
				      	$sqlMEN = mysql_query("SELECT * FROM solicitudes WHERE id = '".$_POST['idse']."'");
	  					if(mysql_num_rows($sqlMEN)>0){
	    					while($mostrarx = mysql_fetch_array($sqlMEN)){
	    						$edic = $mostrarx['ediciones'];
	    					}
	    				}
	    				mysql_free_result($sqlMEN);
	    				
				      	$fechaDR = date('Y-m-d H:i:s');

				      	$mensaje = "----- La edición se realizo corectamente en la fecha: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
				      	$mensaje = $edic.$mensaje;



				      	$fec = $_POST['fecha'];
				      	$hor = $_POST['hora'];
				      	$fed = $_POST['fecha'];
				      	$hod = $_POST['horad'];
				      	
				      	$hnotx = substr($hor,0,2);
    					$mnotx = substr($hor,3,2);
    					
    					/*
    					if ($mnotx <= '29') {
    						$mnotx = '00';
    					}
    					if ($mnotx <= '59' && $mnotx >= '30') {
    						$mnotx = '30';
    					}
						*/

    					$hor = $hnotx.':'.$mnotx;


				      	$hnoty = substr($hod,0,2);
    					$mnoty = substr($hod,3,2);
    					
/*    					if ($mnoty <= '29') {
    						$mnoty = '00';
    					}
    					if ($mnoty <= '59' && $mnoty >= '30') {
    						$mnoty = '30';
    					}*/

    					$hod = $hnoty.':'.$mnoty;

				      	$are = $_POST['area'];
				      	$tip = '1';

				      	$nom_even = str_replace('“', '"', $nom_even);
				      	$nom_even = str_replace('”', '"', $nom_even);
				      	$nom_even = str_replace("' ", '" ', $nom_even);
				      	$nom_even = str_replace(" '", ' "', $nom_even);
				      	$nom_even = str_replace("'", '´', $nom_even);
				      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
				      	str_replace("\n"," ",$nom_even);
				      	$nom_even = str_replace("…", '...', $nom_even);
				      	$nom_even = str_replace(" – ", " - ", $nom_even);
				      	$nom_even = str_replace("‘", '´', $nom_even);
				      	$nom_even = str_replace("’", '´', $nom_even);
				      	
				      	$fechaDR = date('Y-m-d H:i:s');
				      	$tipevento = $_POST['tipevent'];

						$clase = new sistema;
						$clase->conexion();
				      	$sqls = mysql_query("UPDATE solicitudes SET imagen = '".utf8_decode($name)."', nombre_evento = '".utf8_decode($nom_even)."', lugar_evento = '".utf8_decode($lug)."', fecha_evento = '".utf8_decode($fec)."', fecha_evento_fin = '".utf8_decode($fed)."', hora_evento_ini = '".utf8_decode($hor)."', hora_evento_fin = '".utf8_decode($hod)."', estado = '1', tipo_agenda = '".utf8_decode($tip)."', ediciones = '".utf8_decode($mensaje)."', publica = '".$tipevento."' WHERE id = '".utf8_decode($_POST['idse'])."'");
							
				      	
	      				if(mysql_num_rows($sqls)){
	        				while($mostrarx = mysql_fetch_array($sqls)){
	        					echo '<script> window.location="solicitudes.php"; </script>';
	        				}
	        			}
					    else{
							echo '<script> window.location="solicitudes.php"; </script>';
					    }
		        	}
		      	}
		      	else{
		      		$nimg = $_POST['solifech'];
					$tips = 'jpg';
					$name = MD5('Img'.$nimg);
					$name = $name.'.'.$tips;
			      	$nom_even = $_POST['nombre'];
			      	$tipevento = $_POST['tipevent'];

			      	$clase = new sistema;
			      	$clase->conexion();

				      	$lug = $_POST['lugar'];
				      	

				      	if ($lug == 'xxx') {
				      		$lug = $_POST['lugarx'];
				      		$sqlsx = mysql_query("INSERT INTO lugares (nombre, conta, estado) VALUES ('".utf8_decode($lug)."','0','1');");
		  					if(mysql_num_rows($sqlsx)>0){
		    				}
				      	}
			      	$sqlMEN = mysql_query("SELECT * FROM solicitudes WHERE id = '".$_POST['idse']."'");
  					if(mysql_num_rows($sqlMEN)>0){
    					while($mostrarx = mysql_fetch_array($sqlMEN)){
    						$edic = $mostrarx['ediciones'];
    					}
    				}
    				mysql_free_result($sqlMEN);
    				
				      	$fechaDR = date('Y-m-d H:i:s');

			      	$mensaje = "----- La edición se realizo corectamente en la fecha: ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n"."----- La solicitud fue aceptada el ".$fechaDR." por el usuario ".$_SESSION['nom']." ".$_SESSION['ape']." <br> \n";
			      	$mensaje = $edic.$mensaje;

				      	$fec = $_POST['fecha'];
				      	$hor = $_POST['hora'];
				      	$fed = $_POST['fecha'];
				      	$hod = $_POST['horad'];
				      	
				      	$hnotx = substr($hor,0,2);
    					$mnotx = substr($hor,3,2);
    					
    					/*
    					if ($mnotx <= '29') {
    						$mnotx = '00';
    					}
    					if ($mnotx <= '59' && $mnotx >= '30') {
    						$mnotx = '30';
    					}
						*/

    					$hor = $hnotx.':'.$mnotx;


				      	$hnoty = substr($hod,0,2);
    					$mnoty = substr($hod,3,2);
    					
/*    					if ($mnoty <= '29') {
    						$mnoty = '00';
    					}
    					if ($mnoty <= '59' && $mnoty >= '30') {
    						$mnoty = '30';
    					}*/

    					$hod = $hnoty.':'.$mnoty;

			      	$are = $_POST['area'];
			      	if ($are == NULL) {
			      		$are = $_SESSION['are'];
			      	}

			      	$tip = '1';

			      	$nom_even = str_replace('“', '"', $nom_even);
			      	$nom_even = str_replace('”', '"', $nom_even);
			      	$nom_even = str_replace("' ", '" ', $nom_even);
			      	$nom_even = str_replace(" '", ' "', $nom_even);
			      	$nom_even = str_replace("'", '´', $nom_even);
			      	$nom_even = eregi_replace("[\n|\r|\n\r]", " ", $nom_even);
			      	str_replace("\n"," ",$nom_even);
			      	$nom_even = str_replace("…", '...', $nom_even);
			      	$nom_even = str_replace(" – ", " - ", $nom_even);
			      	$nom_even = str_replace("‘", '´', $nom_even);
			      	$nom_even = str_replace("’", '´', $nom_even);
			      	

					
			      	$sqls = mysql_query("UPDATE solicitudes SET nombre_evento = '".utf8_decode($nom_even)."', lugar_evento = '".utf8_decode($lug)."', fecha_evento = '".utf8_decode($fec)."', fecha_evento_fin = '".utf8_decode($fed)."', hora_evento_ini = '".utf8_decode($hor)."', hora_evento_fin = '".utf8_decode($hod)."', estado = '1', tipo_agenda = '".utf8_decode($tip)."', ediciones = '".utf8_decode($mensaje)."', publica = '".$tipevento."' WHERE id = '".utf8_decode($_POST['idse'])."'");
			      	mysql_query("SET NAMES 'utf8';");
					if($sqls){
    					echo '<script> window.location="solicitudes.php"; </script>';
    				}
					
		      	}


		    }
		}

		function regSU(){
			
				$hoy=date("Y-m-d");  
				$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
				$hora = date( "h:i" );
					echo '
            <form method="post" action="" enctype="multipart/form-data">
                <table class="tbl-registro" width="100%">
                    <tbody><tr>
                        <td><b>Nombre del evento:</b></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="form-control" rows="5" id="nombre" name="nombre" maxlength="82" style="max-width: 549px;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Lugar del evento:</b></td>
                    </tr>
                    <tr>
                        <td>
                            <legend></legend>
                            <fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
                            ';
	                        	$clasezx = new sistema;
	                            $clasezx->conexion();
	                            $clasezx->mostrarlugar(); 
                            echo '
                            <input type="radio" name="lugar" value="xxx" onclick="lugarx.disabled = false" required="required" />Otro
							<input type="text" name="lugarx" style="width: 75%; float: right; margin-right: 3%;" class="form-control" disabled="disabled" />
                            </fieldset>
                            <legend></legend>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Fecha del evento:</b></td>
                    </tr>
                    <tr>
                        <td>
                        	<input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" value="'.$hoy.'" required class="form-control" min="'.$hoy.'" />
                        </td>
                    </tr>
                    <tr>
                        <td><b>Hora de inicio y finalización:</b></td>
                    </tr>
                    <tr>
                        <td>
                        	<input type="time" name="hora" id="hora" value="'.$hora.'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; margin-right: 8%; float: left;" />
                        	<input type="time" name="horad" id="horad" value="'.$hora.'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; float: left;" />
                        </td>
                    </tr>
                    <tr>
                        <td><b>Área</b></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="area" class="form-control" required>
                                <option value="" selected="">Seleccionar una área</option>
                                ';
                                	$clase = new sistema;
                                    $clase->conexion();
                                    $clase->mostrararea(); 
                                echo '
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Tipo de evento:</b></td>
                    </tr>
                    <tr>
                    	<td>
                    		<select name="tipevent" class="form-control" required>
								<option value="" selected="">Seleccionar tipo de evento</option>
                    			<option value="1">Público</option>
                    			<option value="0">Privado</option>
                    	</td>
                    </tr>
                    <tr>
                        <td><b>Seleccionar foto:</b></td>
                    </tr>
                    <tr>
                        <td>
                            <input name="foto1" type="file" id="foto1" style="margin: 0 auto;" required accept="image/*">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4"><input id="llllll" name="llllll" type="submit" value="Agregar solicitud" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
                    </tr>

                </tbody></table>
            </form>
	                ';
		}


		function regSUCE(){
			
				$hoy=date("Y-m-d");  
				$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
				$hora = date( "h:i" );
					echo '
            <form method="post" action="" enctype="multipart/form-data">
                <table class="tbl-registro" width="100%">
                    <tbody><tr>
                        <td><b>Nombre:</b></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea class="form-control" rows="5" id="nombre" name="nombre" maxlength="82" style="max-width: 549px;" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de inicio:</b></td>
                    </tr>
                    <tr>
                        <td>
                        	<input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" value="'.$hoy.'" required class="form-control" min="'.$hoy.'" />
                        </td>
                    </tr>
                    <tr>
                        <td><b>Fecha de finalización:</b></td>
                    </tr>
                    <tr>
                        <td>
                        	<input type="date" name="fechad" id="fechad" placeholder="Introduce una fecha" value="'.$hoy.'" required class="form-control" min="'.$hoy.'" />
                        </td>
                    </tr>
                    <tr>
						<td>
							<label>Color de fondo</label><input type="color" calue value="#000000" name="myColor" required>
						</td>
					</tr>
                    <tr>
                        <td colspan="4"><input id="pppppp" name="pppppp" type="submit" value="Agregar solicitud" class="btn btn-primary" style="background: #808080; border-color: #808080;"></td>
                    </tr>
                	</tbody>
                </table>
            </form>
	                ';
		}



		function edimortal(){
			$sql = mysql_query("SELECT * FROM solicitudes WHERE usuario_solicita = '".$_SESSION['idx']."' and id = ".$_GET["NS"]."");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$fd = $mostrar['tipo_agenda'];
					$sqlx = mysql_query("SELECT * FROM areas WHERE id = ".$mostrar["area_evento"]."");
					while($mostrarx = mysql_fetch_array($sqlx)){
						if ($mostrar['estado'] == 0) {
							$significado = 'Cancelado';
						}
						if ($mostrar['estado'] == 1) {
							$significado = 'Pendiente';
						}
						if ($mostrar['estado'] == 9) {
							$significado = 'Aceptado';
						}
						mysql_free_result($sqlx);
						
						$hoy=date("Y-m-d");  
						$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
						$hora = date( "h:i" );
						echo '
				            <form method="post" action="" enctype="multipart/form-data">
				                <table class="tbl-registro" width="100%">
				                    <tbody>
				                    <tr>
				                        <td><b>Foto:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <img src=img/agendas/'.utf8_encode($mostrar['imagen']).' style="width: 40%;">
				                        </td>
				                    </tr>
		                            <tr>
		                                <td>
		                                    <input name="foto1" type="file" id="foto1" style="margin: 0 auto;" accept="image/*">
		                                </td>
		                            </tr>
				                    <tr>
				                        <td><b>Nombre del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <textarea class="form-control" rows="5" id="nombre" name="nombre" maxlength="82" style="max-width: 870px;" required>'.utf8_encode($mostrar['nombre_evento']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Lugar del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
											<legend></legend>
			                            	<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">';
				                        		$clasezx = new sistema;
				                            	$clasezx->conexion();
												$sqlA = mysql_query("SELECT * FROM lugares WHERE nombre = '".$mostrar['lugar_evento']."'");
												$item = 0;
												if(mysql_num_rows($sqlA)>0){
													while($mostrarq = mysql_fetch_array($sqlA)){
														echo '<input type="radio" name="lugar" onclick="lugarx.disabled = true" value="'.utf8_encode($mostrarq['nombre']).'" checked>'.utf8_encode($mostrarq['nombre']).'<br/>';
													}
												}
												mysql_free_result($sqlA);
												$sqlz = mysql_query("SELECT * FROM lugares WHERE estado = '1' and nombre != '".$mostrar['lugar_evento']."' ORDER BY nombre ASC");
												if(mysql_num_rows($sqlz)>0){
													while($mostrarz	 = mysql_fetch_array($sqlz)){
														echo '<input type="radio" name="lugar" onclick="lugarx.disabled = true" value="'.utf8_encode($mostrarz	['nombre']).'"/>'.utf8_encode($mostrarz	['nombre']).'<br/>';
													}
												}
												mysql_free_result($sqlz);
			                            	echo '
			                            		<input type="radio" name="lugar" value="xxx" onclick="lugarx.disabled = false" required="required" />Otro
												<input type="text" name="lugarx" class="form-control" disabled="disabled" />
			                            	</fieldset>
		                            		<legend></legend>

		                            		<textarea class="form-control" rows="5" id="solifech" name="solifech" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['fecha_soliciud']).'</textarea>
				                            <textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['id']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Fecha del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
											<input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" value="'.utf8_encode($mostrar['fecha_evento']).'" required class="form-control" min="'.$hoy.'" />
				                        </td>
				                    </tr>
									<tr>
				                        <td><b>Tipo de evento:</b></td>
				                    </tr>
				                    <tr>
				                    	<td>
				                    		<select name="tipevent" class="form-control" required>';
				                    			if ($mostrar['publica'] == 1) {
				                    				echo '
				                    				<option value="1" selected="">Público</option>
				                    	  			<option value="0">Privado</option>';
				                    			}
				                    			elseif ($mostrar['publica'] == 0) {
				                    				echo '
				                    				<option value="0" selected="">Privado</option>
				                    				<option value="1">Público</option>';
				                    			}
				                    	echo '
				                    		</select>
				                    	</td>
				                    </tr>
				                    <tr>
				                        <td><b>Hora de inicio y finalización:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	<input type="time" name="hora" id="hora" value="'.utf8_encode($mostrar['hora_evento_ini']).'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; margin-right: 8%; float: left;" />
				                        	<input type="time" name="horad" id="hora" value="'.utf8_encode($mostrar['hora_evento_fin']).'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; float: left;" />
				                        </td>
				                    </tr>
				                    <tr>
				                        <td colspan="4"><input id="kkkkkk" name="kkkkkk" type="submit" value="Guardar Cambios" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
				                    </tr>
				                </tbody></table>
				            </form>';
					}
				}
			}

			else{
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
				echo '<script> window.location="solicitudes.php"; </script>';
			}
		}

		function even(){
			$sql = mysql_query("SELECT * FROM solicitudes WHERE id = ".$_GET["s"]."");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$fd = $mostrar['tipo_agenda'];
					$sqlx = mysql_query("SELECT * FROM areas WHERE id = ".$mostrar["area_evento"]."");
					while($mostrarx = mysql_fetch_array($sqlx)){
						
						$aNOx = substr($mostrar['fecha_evento'],0,4);
			            $mNOx = substr($mostrar['fecha_evento'],5,2);
			            $dNOx = substr($mostrar['fecha_evento'],8,2);
			            
			            $aNOT = substr($mostrar['fecha_evento_fin'],0,4);
			            $mNOT = substr($mostrar['fecha_evento_fin'],5,2);
			            $dNOT = substr($mostrar['fecha_evento_fin'],8,2);

			            $hrx = substr($mostrar['hora_evento_ini'],0,5);
            			$hrT = substr($mostrar['hora_evento_fin'],0,5);

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
						
						$fd = $mostrar['tipo_agenda'];

	                    if($fd == '1'){
							$fd = 'Agenda Institucional';
							}
						elseif($fd == '2'){
							$fd = 'Agenda Electoral';
						}

						
						$hoy=date("Y-m-d");  
						$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
						$hora = date( "h:i" );
						if ($mostrar['tipo_agenda'] == 1) {
							echo '<h2 style="text-align: center;font-size: 290%;padding: 0;"><b>'.$dNOx.' de '.$mNOx.'</b></h2>';
						}
						if ($mostrar['tipo_agenda'] == 2) {
							echo '<h2 style="text-align: center;font-size: 290%;padding: 0;"><b>'.$dNOx.' de '.$mNOx.' al '.$dNOT.' de '.$mNOT.'</b></h2>';
						}
							echo '<h5 style="text-align: center;font-size: 200%;margin-bottom: 3%;padding: 0;">('.$fd.')</h5>
				            <div style="overflow: hidden;">
				            	<img src=img/agendas/'.utf8_encode($mostrar['imagen']).' style="width: 100%;float: left;margin-bottom: 1%;">
				                <h2 style="float: left;text-align: center;width: 50%;font-size: 298%;margin: 0;padding: 0; text-transform: capitalize;">'.utf8_encode($mostrar['nombre_evento']).'</h2>
				                ';
				                if ($mostrar['tipo_agenda'] == 1) {
				                	echo '<h2 style="float: left;text-align: center;width: 50%;font-size: 200%;margin-top: 2%;padding: 0;">Lugar: <b>'.utf8_encode($mostrar['lugar_evento']).'</b></h2>
				                <h2 style="float: left;text-align: center;width: 50%;font-size: 200%;margin-top: 2%;padding: 0;">de <b>'.utf8_encode($hrx).' hrs</b>. a <b>'.utf8_encode($hrT).' hrs</b>.</h2>';	
				                
				                
	                                $sql = mysql_query("SELECT * FROM areas WHERE estado = '1' AND id = '".utf8_encode($mostrar['area_evento'])."' ORDER BY nombre ASC");
									$item = 0;
									if(mysql_num_rows($sql)>0){
										while($mostrar = mysql_fetch_array($sql)){
											echo '
											<h2 style="float: left;text-align: center;width: 50%;font-size: 200%;margin-top: 2%;padding: 0;">Convoca: <b>'.utf8_encode($mostrar['nombre']).'</b>	</h2>
											';
										}
									}
								}
				            echo'</div>
				            ';
					}
					mysql_free_result($sqlX);
				}
			}
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}
			mysql_free_result($sql);
		}

		function ediSU(){
			$sql = mysql_query("SELECT * FROM solicitudes WHERE tipo_agenda = '1' AND id = ".$_GET["NS"]."");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$fd = $mostrar['tipo_agenda'];
					$sqlx = mysql_query("SELECT * FROM areas WHERE id = ".$mostrar["area_evento"]."");
					while($mostrarx = mysql_fetch_array($sqlx)){
						if ($mostrar['estado'] == 0) {
							$significado = 'Cancelado';
						}
						if ($mostrar['estado'] == 1) {
							$significado = 'Pendiente';
						}
						if ($mostrar['estado'] == 9) {
							$significado = 'Aceptado';
						}
						
						
						$hoy=date("Y-m-d");  
						$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
						$hora = date( "h:i" );
						echo '
				            <form method="post" action="" enctype="multipart/form-data">
				                <table class="tbl-registro" width="100%">
				                    <tbody>
				                    <tr>
				                        <td><b>Foto:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <img src=img/agendas/'.utf8_encode($mostrar['imagen']).' style="width: 40%;">
				                        </td>
				                    </tr>
		                            <tr>
		                                <td>
		                                    <input name="foto1" type="file" id="foto1" style="margin: 0 auto;" accept="image/*">
		                                </td>
		                            </tr>
				                    <tr>
				                        <td><b>Nombre del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <textarea class="form-control" rows="5" id="nombre" name="nombre" maxlength="82" style="max-width: 870px;" required>'.utf8_encode($mostrar['nombre_evento']).'</textarea>



				                            <textarea class="form-control" rows="5" id="solifech" name="solifech" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['fecha_soliciud']).'</textarea>
				                            <textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['id']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Lugar del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>

											<legend></legend>
			                            	<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">';
				                        		$clasezx = new sistema;
				                            	$clasezx->conexion();
												$sqlA = mysql_query("SELECT * FROM lugares WHERE nombre = '".$mostrar['lugar_evento']."'");
												$item = 0;
												if(mysql_num_rows($sqlA)>0){
													while($mostrarq = mysql_fetch_array($sqlA)){
														echo '<input type="radio" name="lugar" onclick="lugarx.disabled = true" value="'.utf8_encode($mostrarq['nombre']).'" checked>'.utf8_encode($mostrarq['nombre']).'<br/>';
													}
												}
												$clasezx->conexion();
												$sqlz = mysql_query("SELECT * FROM lugares WHERE estado = '1' and nombre != '".utf8_encode($mostrar['lugar_evento'])."' ORDER BY nombre ASC");
												if(mysql_num_rows($sqlz)>0){
													while($mostrarz	 = mysql_fetch_array($sqlz)){
														echo '<input type="radio" name="lugar" onclick="lugarx.disabled = true" value="'.utf8_encode($mostrarz	['nombre']).'"/>'.utf8_encode($mostrarz	['nombre']).'<br/>';
													}
												}
			                            	echo '
			                            		<input type="radio" name="lugar" value="xxx" onclick="lugarx.disabled = false" required="required" />Otro
												<input type="text" name="lugarx" class="form-control" disabled="disabled" />
			                            	</fieldset>
		                            		<legend></legend>

				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Fecha del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
											<input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" value="'.utf8_encode($mostrar['fecha_evento']).'" required class="form-control" min="'.$hoy.'" />
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Hora de inicio y finalización:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	<input type="time" name="hora" id="hora" value="'.utf8_encode($mostrar['hora_evento_ini']).'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; margin-right: 8%; float: left;" />
				                        	<input type="time" name="horad" id="hora" value="'.utf8_encode($mostrar['hora_evento_fin']).'" placeholder="Introduce una Hora" required class="form-control" style="width: 46%; float: left;" />
				                        </td>
				                    </tr>
									<tr>
				                        <td><b>Tipo de evento:</b></td>
				                    </tr>
				                    <tr>
				                    	<td>
				                    		<select name="tipevent" class="form-control" required>';
				                    			if ($mostrar['publica'] == 1) {
				                    				echo '
				                    				<option value="1" selected="">Público</option>
				                    	  			<option value="0">Privado</option>';
				                    			}
				                    			elseif ($mostrar['publica'] == 0) {
				                    				echo '
				                    				<option value="0" selected="">Privado</option>
				                    				<option value="1">Público</option>';
				                    			}
				                    	echo '
				                    		</select>
				                    	</td>
				                    </tr>
				                    <tr>
				                        <td><b>Área:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <select name="area" class="form-control" required>
				                                <option value="'.utf8_encode($mostrarx['id']).'" selected="">'.utf8_encode($mostrarx['nombre']).'</option>';
				                                	$clase = new sistema;
				                                    $clase->conexion();
				                                    $sql = mysql_query("SELECT * FROM areas WHERE estado = '1' AND id != '".utf8_encode($mostrarx['id'])."' ORDER BY nombre ASC");
													$item = 0;
													if(mysql_num_rows($sql)>0){
														while($mostrar = mysql_fetch_array($sql)){
															echo '<option value="'.$mostrar['id'].'">'.utf8_encode($mostrar['nombre']).'</option>';
														}
													}

													else{
														echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
													}
				                                echo '
				                            </select>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td colspan="4"><input id="llllll" name="llllll" type="submit" value="Guardar Cambios" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
				                    </tr>
				                </tbody></table>
				            </form>';
					}
					mysql_free_result($sqlX);
				}
			}
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}
			mysql_free_result($sql);
		}

		function ediSUco(){
			if ($_SESSION['prv'] == '1') {
				$sql = mysql_query("SELECT * FROM usuarios WHERE id = '".$_GET["NU"]."'");
			}
			else {
				$sql = mysql_query("SELECT * FROM usuarios WHERE id = '".$_SESSION['idx']."'"); 
			}
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$fd = $mostrar['tipo_agenda'];
						
						
						$hoy=date("Y-m-d");  
						$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
						$hora = date( "h:i" );
						echo '
				            <form method="post" action="" enctype="multipart/form-data">
				                <table class="tbl-registro" width="100%">
				                    <tbody>
				                    <tr>
				                        <td><b>Nombre:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <textarea class="form-control" rows="5" id="nombre" name="nombre" style="max-width: 870px;" required readonly>'.ucwords(mb_strtolower(utf8_encode($mostrar['nombre_formal']))).'</textarea>
				                            <textarea class="form-control" rows="5" id="idusu" name="idusu" style="max-width: 870px; display:none;" required readonly>'.$mostrar['id'].'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Contraseña:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <input type="password" name="contra123" maxlength="30" minlength="8" style="width: 100%;height: 37px;font-size: xx-large;" required="">
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Confirmar contraseña:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <input type="password" name="contra234" maxlength="30" minlength="8" style="width: 100%;height: 37px;font-size: xx-large;" required="">
				                        </td>
				                    </tr>
				                    <tr>
				                        <td colspan="4"><input id="llllll" name="llllll" type="submit" value="Guardar Cambios" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
				                    </tr>
				                </tbody></table>
				            </form>';
					}
					mysql_free_result($sqlX);
				}
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}
			mysql_free_result($sql);
		}

function valerequi(){
	if(@$_POST['jjjjjj']){
		    	
		$id_rela = $_POST['idse'];

	  	$cosa_1 = $_POST['1'];
	  	$cosa_2 = $_POST['2'];
	  	$cosa_3 = $_POST['3'];
	  	$cosa_4 = $_POST['4'];
	  	$cosa_5 = $_POST['5'];
	  	$cosa_6 = $_POST['6'];
	  	$cosa_7 = $_POST['7'];


	  	$cosa_8 = $_POST['8'];
	  	$cosa_9 = $_POST['9'];


	  	$cosa_10 = $_POST['10'];
	  	$cosa_11 = $_POST['11'];
	  	$cosa_12 = $_POST['12'];
		$cosa_13 = $_POST['13'];


		$lista_area_11 = '';
		$lista_area_10 = '';
		$lista_area_6 = '';


		if ($cosa_1 != '') {
			$lista_area_11 = $cosa_1.', ';
		}

		if ($cosa_2 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_2.', ';
		}

		if ($cosa_3 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_3.', ';
		}

		if ($cosa_4 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_4.', ';
		}

		if ($cosa_5 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_5.', ';
		}

		if ($cosa_6 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_6.', ';
		}

		if ($cosa_7 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_7.', ';
		}




		if ($cosa_8 != '') {
			$lista_area_6 = $lista_area_6.''.$cosa_8.', ';
		}

		if ($cosa_9 != '') {
			$lista_area_6 = $lista_area_6.''.$cosa_9.', ';
		}




		if ($cosa_10 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_10.', ';
		}

		if ($cosa_11 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_11.', ';
		}

		if ($cosa_12 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_12.', ';
		}

		if ($cosa_13 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_13.', ';
		}
		$clase = new sistema;
		$clase->conexion();
		
		$consul = "SELECT * FROM Requerimientos WHERE id_ref = '".$id_rela."'";
		$sqlx = mysql_query($consul);
		if(mysql_num_rows($sqlx)>0){
			$consul1 = "UPDATE Requerimientos SET lista_area_11 = '".utf8_decode($lista_area_11)."' WHERE id_ref = '".$id_rela."'";
			$sqlx1 = mysql_query($consul1);
			if($sqlx1){
				$infusu = mysql_query("SELECT nombre_formal, area FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
				    if (mysql_num_rows($infusu)>0){
				    	while($whinfusu = mysql_fetch_array($infusu)){ 
							$infosoli = mysql_query("SELECT * FROM solicitudes WHERE id = '".$id_rela."' ORDER BY id DESC");
				    		if (mysql_num_rows($infosoli)>0){
				    			while($whinfosoli = mysql_fetch_array($infosoli)){

									$infarea = mysql_query("SELECT * FROM areas WHERE id = '".$whinfosoli['area_evento']."' ORDER BY id DESC");
						    		if (mysql_num_rows($infarea)>0){
						    			while($whinfarea = mysql_fetch_array($infarea)){
						    				
						    				$nombre = $whinfusu['nombre_formal'];
											$empresa = $whinfarea['nombre'];
											$nomevent = $whinfosoli['nombre_evento'];

											$mail = 'ai_info@datacenter-iepcdurango.mx';
											$lista = '';

											if ($cosa_1 != '') {
												$lista = '° '.$cosa_1.'<br>';
											}

											if ($cosa_2 != '') {
												$lista = $lista.'° '.$cosa_2.'<br>';
											}

											if ($cosa_3 != '') {
												$lista = $lista.'° '.$cosa_3.'<br>';
											}

											if ($cosa_4 != '') {
												$lista = $lista.'° '.$cosa_4.'<br>';
											}

											if ($cosa_5 != '') {
												$lista = $lista.'° '.$cosa_5.'<br>';
											}

											if ($cosa_6 != '') {
												$lista = $lista.'° '.$cosa_6.'<br>';
											}

											if ($cosa_7 != '') {
												$lista = $lista.'° '.$cosa_7.'<br>';
											}

											$aNOx = substr($whinfosoli['fecha_evento'],0,4);
								            $mNOx = substr($whinfosoli['fecha_evento'],5,2);
								            $dNOx = substr($whinfosoli['fecha_evento'],8,2);

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

											$header = 'From: ' . $mail . " \r\n";
											$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
											$header .= "Mime-Version: 1.0 \r\n";
											$header .= "Content-Type: text/html";

											$mensaje = '<html>'.
													'<head><title>Requisición de evento</title></head>'.
													'<body><h1>Requisición para el evento '.utf8_encode($whinfosoli['nombre_evento']).'</h1>'.
													'Este mensaje fue enviado por: <b>'.ucwords(mb_strtolower(utf8_encode($nombre),'UTF-8')).'</b>'.
													'<hr>'.
													'Por medio de este mensaje, solicito de la manera más atenta el apoyo para cubrir las siguiente lista de necesidades que tendremos durante nuestro evento <b>'.utf8_encode($whinfosoli['nombre_evento']).'</b>.<br>'.
													'<br>'.
													$lista.
													'<br>'.
													'Este evento se llevara acabo el día <b>'.$dNOx.' de '.$mNOx.'</b> de las <b>'.$whinfosoli["hora_evento_ini"].' hrs.</b> a las <b>'.$whinfosoli['hora_evento_fin']." hrs.</b> en <b>".utf8_encode($whinfosoli['lugar_evento']).'</b><br>'.
													'<br>'.
													'<br>'.
													'<br>'.
													'<hr>'.
													'<b>Este mensaje es generado automáticamente desde el sistema AI (Agenda Institucional) y no requiere una respuesta'.
													'<br>'.
													'Para mayor información contacte al área responsable de este evento ('.utf8_encode($empresa).')</b>'.
													'<hr>'.
													'Enviado el ' . date('d/m/Y', time());
													'</body>'.
													'</html>';


											$para = 'larry.vargas@iepcdurango.mx';
											$asunto = 'Requisición para el evento '.utf8_decode($whinfosoli['nombre_evento']).'';

											mail(utf8_decode($para), utf8_decode($asunto), utf8_decode($mensaje), $header);

										}
									}
								}
							}
						}
					}
				echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';
			}
		}
		
		else{
			$consul1 = "INSERT INTO Requerimientos (lista_area_11, lista_area_10, lista_area_6, estado, id_ref) VALUES ('".utf8_decode($lista_area_11)."', '".utf8_decode($lista_area_10)."', '".utf8_decode($lista_area_6)."', '1', '".$id_rela."')";
			$sqlx1 = mysql_query($consul1);
			if($sqlx1){
				$infusu = mysql_query("SELECT nombre_formal, area FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
			    if (mysql_num_rows($infusu)>0){
			    	while($whinfusu = mysql_fetch_array($infusu)){ 
						$infosoli = mysql_query("SELECT * FROM solicitudes WHERE id = '".$id_rela."' ORDER BY id DESC");
			    		if (mysql_num_rows($infosoli)>0){
			    			while($whinfosoli = mysql_fetch_array($infosoli)){

								$infarea = mysql_query("SELECT * FROM areas WHERE id = '".$whinfosoli['area_evento']."' ORDER BY id DESC");
					    		if (mysql_num_rows($infarea)>0){
					    			while($whinfarea = mysql_fetch_array($infarea)){
					    				
					    				$nombre = $whinfusu['nombre_formal'];
										$empresa = $whinfarea['nombre'];
										$nomevent = $whinfosoli['nombre_evento'];

										$mail = 'ai_info@datacenter-iepcdurango.mx';
										$lista = '';

										if ($cosa_1 != '') {
											$lista = '° '.$cosa_1.'<br>';
										}

										if ($cosa_2 != '') {
											$lista = $lista.'° '.$cosa_2.'<br>';
										}

										if ($cosa_3 != '') {
											$lista = $lista.'° '.$cosa_3.'<br>';
										}

										if ($cosa_4 != '') {
											$lista = $lista.'° '.$cosa_4.'<br>';
										}

										if ($cosa_5 != '') {
											$lista = $lista.'° '.$cosa_5.'<br>';
										}

										if ($cosa_6 != '') {
											$lista = $lista.'° '.$cosa_6.'<br>';
										}

										if ($cosa_7 != '') {
											$lista = $lista.'° '.$cosa_7.'<br>';
										}

										$aNOx = substr($whinfosoli['fecha_evento'],0,4);
							            $mNOx = substr($whinfosoli['fecha_evento'],5,2);
							            $dNOx = substr($whinfosoli['fecha_evento'],8,2);

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

										$header = 'From: ' . $mail . " \r\n";
										$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
										$header .= "Mime-Version: 1.0 \r\n";
										$header .= "Content-Type: text/html";

										$mensaje = '<html>'.
													'<head><title>Requisición de evento</title></head>'.
													'<body><h1>Requisición para el evento '.utf8_encode($whinfosoli['nombre_evento']).'</h1>'.
													'Este mensaje fue enviado por: <b>'.ucwords(mb_strtolower(utf8_encode($nombre),'UTF-8')).'</b>'.
													'<hr>'.
													'Por medio de este mensaje, solicito de la manera más atenta el apoyo para cubrir las siguiente lista de necesidades que tendremos durante nuestro evento <b>'.utf8_encode($whinfosoli['nombre_evento']).'</b>.<br>'.
													'<br>'.
													$lista.
													'<br>'.
													'Este evento se llevara acabo el día <b>'.$dNOx.' de '.$mNOx.'</b> de las <b>'.$whinfosoli["hora_evento_ini"].' hrs.</b> a las <b>'.$whinfosoli['hora_evento_fin']." hrs.</b> en <b>".utf8_encode($whinfosoli['lugar_evento']).'</b><br>'.
													'<br>'.
													'<br>'.
													'<br>'.
													'<hr>'.
													'<b>Este mensaje es generado automáticamente desde el sistema AI (Agenda Institucional) y no requiere una respuesta'.
													'<br>'.
													'Para mayor información contacte al área responsable de este evento ('.utf8_encode($empresa).')</b>'.
													'<hr>'.
													'Enviado el ' . date('d/m/Y', time());
													'</body>'.
													'</html>';


										$para = 'larry.vargas@iepcdurango.mx';
										$asunto = 'Requisición para el evento '.utf8_decode($whinfosoli['nombre_evento']).'';

										mail(utf8_decode($para), utf8_decode($asunto), utf8_decode($mensaje), $header);

									}
								}
							}
						}
					}
				}
				echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';
			}
		}

		echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';

	}

	if(@$_POST['kkkkkk']){
		    	
		$id_rela = $_POST['idse'];

	  	$cosa_1 = $_POST['1'];
	  	$cosa_2 = $_POST['2'];
	  	$cosa_3 = $_POST['3'];
	  	$cosa_4 = $_POST['4'];
	  	$cosa_5 = $_POST['5'];
	  	$cosa_6 = $_POST['6'];
	  	$cosa_7 = $_POST['7'];


	  	$cosa_8 = $_POST['8'];
	  	$cosa_9 = $_POST['9'];

	  	
	  	$cosa_10 = $_POST['10'];
	  	$cosa_11 = $_POST['11'];
	  	$cosa_12 = $_POST['12'];
		$cosa_13 = $_POST['13'];


		$lista_area_11 = '';
		$lista_area_10 = '';
		$lista_area_6 = '';


		if ($cosa_1 != '') {
			$lista_area_11 = $cosa_1.', ';
		}

		if ($cosa_2 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_2.', ';
		}

		if ($cosa_3 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_3.', ';
		}

		if ($cosa_4 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_4.', ';
		}

		if ($cosa_5 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_5.', ';
		}

		if ($cosa_6 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_6.', ';
		}

		if ($cosa_7 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_7.', ';
		}





		if ($cosa_8 != '') {
			$lista_area_6 = $lista_area_6.''.$cosa_8.', ';
		}

		if ($cosa_9 != '') {
			$lista_area_6 = $lista_area_6.''.$cosa_9.', ';
		}




		if ($cosa_10 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_10.', ';
		}

		if ($cosa_11 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_11.', ';
		}

		if ($cosa_12 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_12.', ';
		}

		if ($cosa_13 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_13.', ';
		}
		$clase = new sistema;
		$clase->conexion();
		
		$consul = "SELECT * FROM Requerimientos WHERE id_ref = '".$id_rela."'";
		$sqlx = mysql_query($consul);
		if(mysql_num_rows($sqlx)>0){
			$consul1 = "UPDATE Requerimientos SET lista_area_6 = '".utf8_decode($lista_area_6)."' WHERE id_ref = '".$id_rela."'";
			if(mysql_query($consul1)){
				$infusu = mysql_query("SELECT nombre_formal, area FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
			    if (mysql_num_rows($infusu)>0){
			    	while($whinfusu = mysql_fetch_array($infusu)){ 
						$infosoli = mysql_query("SELECT * FROM solicitudes WHERE id = '".$id_rela."' ORDER BY id DESC");
			    		if (mysql_num_rows($infosoli)>0){
			    			while($whinfosoli = mysql_fetch_array($infosoli)){

								$infarea = mysql_query("SELECT * FROM areas WHERE id = '".$whinfosoli['area_evento']."' ORDER BY id DESC");
					    		if (mysql_num_rows($infarea)>0){
					    			while($whinfarea = mysql_fetch_array($infarea)){
					    				
					    				$nombre = $whinfusu['nombre_formal'];
										$empresa = $whinfarea['nombre'];
										$nomevent = $whinfosoli['nombre_evento'];

										$mail = 'ai_info@datacenter-iepcdurango.mx';
										$lista = '';

										if ($cosa_8 != '') {
											$lista = '° '.$cosa_8.'<br>';
										}

										if ($cosa_9 != '') {
											$lista = $lista.'° '.$cosa_9.'<br>';
										}

										$aNOx = substr($whinfosoli['fecha_evento'],0,4);
							            $mNOx = substr($whinfosoli['fecha_evento'],5,2);
							            $dNOx = substr($whinfosoli['fecha_evento'],8,2);

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

										$header = 'From: ' . $mail . " \r\n";
										$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
										$header .= "Mime-Version: 1.0 \r\n";
										$header .= "Content-Type: text/html";

										$mensaje = '<html>'.
													'<head><title>Requisición de evento</title></head>'.
													'<body><h1>Requisición para el evento '.utf8_encode($whinfosoli['nombre_evento']).'</h1>'.
													'Este mensaje fue enviado por: <b>'.ucwords(mb_strtolower(utf8_encode($nombre),'UTF-8')).'</b>'.
													'<hr>'.
													'Por medio de este mensaje, solicito de la manera más atenta el apoyo para cubrir las siguiente lista de necesidades que tendremos durante nuestro evento <b>'.utf8_encode($whinfosoli['nombre_evento']).'</b>.<br>'.
													'<br>'.
													$lista.
													'<br>'.
													'Este evento se llevara acabo el día <b>'.$dNOx.' de '.$mNOx.'</b> de las <b>'.$whinfosoli["hora_evento_ini"].' hrs.</b> a las <b>'.$whinfosoli['hora_evento_fin']." hrs.</b> en <b>".utf8_encode($whinfosoli['lugar_evento']).'</b><br>'.
													'<br>'.
													'<br>'.
													'<br>'.
													'<hr>'.
													'<b>Este mensaje es generado automáticamente desde el sistema AI (Agenda Institucional) y no requiere una respuesta'.
													'<br>'.
													'Para mayor información contacte al área responsable de este evento ('.utf8_encode($empresa).')</b>'.
													'<hr>'.
													'Enviado el ' . date('d/m/Y', time());
													'</body>'.
													'</html>';


										$para = 'mario.canales@iepcdurango.mx';
										$asunto = 'Requisición para el evento '.utf8_decode($whinfosoli['nombre_evento']).'';

										mail(utf8_decode($para), utf8_decode($asunto), utf8_decode($mensaje), $header);

									}
								}
							}
						}
					}
				}
				echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';
			}
		}
		else{
			$consul1 = "INSERT INTO Requerimientos (lista_area_11, lista_area_10, lista_area_6, estado, id_ref) VALUES ('".utf8_decode($lista_area_11)."', '".utf8_decode($lista_area_10)."', '".utf8_decode($lista_area_6)."', '1', '".$id_rela."')";
			$sqlx1 = mysql_query($consul1);
			if($sqlx1){			
				$infusu = mysql_query("SELECT nombre_formal, area FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
			    if (mysql_num_rows($infusu)>0){
			    	while($whinfusu = mysql_fetch_array($infusu)){ 
						$infosoli = mysql_query("SELECT * FROM solicitudes WHERE id = '".$id_rela."' ORDER BY id DESC");
			    		if (mysql_num_rows($infosoli)>0){
			    			while($whinfosoli = mysql_fetch_array($infosoli)){

								$infarea = mysql_query("SELECT * FROM areas WHERE id = '".$whinfosoli['area_evento']."' ORDER BY id DESC");
					    		if (mysql_num_rows($infarea)>0){
					    			while($whinfarea = mysql_fetch_array($infarea)){
					    				
					    				$nombre = $whinfusu['nombre_formal'];
										$empresa = $whinfarea['nombre'];
										$nomevent = $whinfosoli['nombre_evento'];

										$mail = 'ai_info@datacenter-iepcdurango.mx';
										$lista = '';

										if ($cosa_8 != '') {
											$lista = '° '.$cosa_8.'<br>';
										}

										if ($cosa_9 != '') {
											$lista = $lista.'° '.$cosa_9.'<br>';
										}

										$aNOx = substr($whinfosoli['fecha_evento'],0,4);
							            $mNOx = substr($whinfosoli['fecha_evento'],5,2);
							            $dNOx = substr($whinfosoli['fecha_evento'],8,2);

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

										$header = 'From: ' . $mail . " \r\n";
										$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
										$header .= "Mime-Version: 1.0 \r\n";
										$header .= "Content-Type: text/html";

										$mensaje = '<html>'.
													'<head><title>Requisición de evento</title></head>'.
													'<body><h1>Requisición para el evento '.utf8_encode($whinfosoli['nombre_evento']).'</h1>'.
													'Este mensaje fue enviado por: <b>'.ucwords(mb_strtolower(utf8_encode($nombre),'UTF-8')).'</b>'.
													'<hr>'.
													'Por medio de este mensaje, solicito de la manera más atenta el apoyo para cubrir las siguiente lista de necesidades que tendremos durante nuestro evento <b>'.utf8_encode($whinfosoli['nombre_evento']).'</b>.<br>'.
													'<br>'.
													$lista.
													'<br>'.
													'Este evento se llevara acabo el día <b>'.$dNOx.' de '.$mNOx.'</b> de las <b>'.$whinfosoli["hora_evento_ini"].' hrs.</b> a las <b>'.$whinfosoli['hora_evento_fin']." hrs.</b> en <b>".utf8_encode($whinfosoli['lugar_evento']).'</b><br>'.
													'<br>'.
													'<br>'.
													'<br>'.
													'<hr>'.
													'<b>Este mensaje es generado automáticamente desde el sistema AI (Agenda Institucional) y no requiere una respuesta'.
													'<br>'.
													'Para mayor información contacte al área responsable de este evento ('.utf8_encode($empresa).')</b>'.
													'<hr>'.
													'Enviado el ' . date('d/m/Y', time());
													'</body>'.
													'</html>';


										$para = 'mario.canales@iepcdurango.mx';
										$asunto = 'Requisición para el evento '.utf8_decode($whinfosoli['nombre_evento']).'';

										mail(utf8_decode($para), utf8_decode($asunto), utf8_decode($mensaje), $header);

									}
								}
							}
						}
					}
				}
				echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';
			}
		}

		echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';

	}
	if(@$_POST['llllll']){
		    	
		$id_rela = $_POST['idse'];

	  	$cosa_1 = $_POST['1'];
	  	$cosa_2 = $_POST['2'];
	  	$cosa_3 = $_POST['3'];
	  	$cosa_4 = $_POST['4'];
	  	$cosa_5 = $_POST['5'];
	  	$cosa_6 = $_POST['6'];
	  	$cosa_7 = $_POST['7'];


	  	$cosa_8 = $_POST['8'];
	  	$cosa_9 = $_POST['9'];

	  	
	  	$cosa_10 = $_POST['10'];
	  	$cosa_11 = $_POST['11'];
	  	$cosa_12 = $_POST['12'];
		$cosa_13 = $_POST['13'];


		$lista_area_11 = '';
		$lista_area_10 = '';
		$lista_area_6 = '';


		if ($cosa_1 != '') {
			$lista_area_11 = $cosa_1.', ';
		}

		if ($cosa_2 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_2.', ';
		}

		if ($cosa_3 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_3.', ';
		}

		if ($cosa_4 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_4.', ';
		}

		if ($cosa_5 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_5.', ';
		}

		if ($cosa_6 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_6.', ';
		}

		if ($cosa_7 != '') {
			$lista_area_11 = $lista_area_11.''.$cosa_7.', ';
		}





		if ($cosa_8 != '') {
			$lista_area_6 = $lista_area_6.''.$cosa_8.', ';
		}

		if ($cosa_9 != '') {
			$lista_area_6 = $lista_area_6.''.$cosa_9.', ';
		}




		if ($cosa_10 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_10.', ';
		}

		if ($cosa_11 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_11.', ';
		}

		if ($cosa_12 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_12.', ';
		}

		if ($cosa_13 != '') {
			$lista_area_10 = $lista_area_10.''.$cosa_13.', ';
		}
		$clase = new sistema;
		$clase->conexion();
		
		$consul = "SELECT * FROM Requerimientos WHERE id_ref = '".$id_rela."'";
		$sqlx = mysql_query($consul);
		if(mysql_num_rows($sqlx)>0){
			$consul1 = "UPDATE Requerimientos SET lista_area_10 = '".utf8_decode($lista_area_10)."' WHERE id_ref = '".$id_rela."'";
			$sqlx1 = mysql_query($consul1);
			if($sqlx1){		
				$infusu = mysql_query("SELECT nombre_formal, area FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
			    if (mysql_num_rows($infusu)>0){
			    	while($whinfusu = mysql_fetch_array($infusu)){ 
						$infosoli = mysql_query("SELECT * FROM solicitudes WHERE id = '".$id_rela."' ORDER BY id DESC");
			    		if (mysql_num_rows($infosoli)>0){
			    			while($whinfosoli = mysql_fetch_array($infosoli)){

								$infarea = mysql_query("SELECT * FROM areas WHERE id = '".$whinfosoli['area_evento']."' ORDER BY id DESC");
					    		if (mysql_num_rows($infarea)>0){
					    			while($whinfarea = mysql_fetch_array($infarea)){
					    				
					    				$nombre = $whinfusu['nombre_formal'];
										$empresa = $whinfarea['nombre'];
										$nomevent = $whinfosoli['nombre_evento'];

										$mail = 'ai_info@datacenter-iepcdurango.mx';
										$lista = '';

										if ($cosa_10 != '') {
											$lista = '° '.$cosa_10.'<br>';
										}

										if ($cosa_11 != '') {
											$lista = $lista.'° '.$cosa_11.'<br>';
										}

										if ($cosa_12 != '') {
											$lista = $lista.'° '.$cosa_12.'<br>';
										}

										if ($cosa_13 != '') {
											$lista = $lista.'° '.$cosa_13.'<br>';
										}

										$aNOx = substr($whinfosoli['fecha_evento'],0,4);
							            $mNOx = substr($whinfosoli['fecha_evento'],5,2);
							            $dNOx = substr($whinfosoli['fecha_evento'],8,2);

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

										$header = 'From: ' . $mail . " \r\n";
										$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
										$header .= "Mime-Version: 1.0 \r\n";
										$header .= "Content-Type: text/html";

										$mensaje = '<html>'.
													'<head><title>Requisición de evento</title></head>'.
													'<body><h1>Requisición para el evento '.utf8_encode($whinfosoli['nombre_evento']).'</h1>'.
													'Este mensaje fue enviado por: <b>'.ucwords(mb_strtolower(utf8_encode($nombre),'UTF-8')).'</b>'.
													'<hr>'.
													'Por medio de este mensaje, solicito de la manera más atenta el apoyo para cubrir las siguiente lista de necesidades que tendremos durante nuestro evento <b>'.utf8_encode($whinfosoli['nombre_evento']).'</b>.<br>'.
													'<br>'.
													$lista.
													'<br>'.
													'Este evento se llevara acabo el día <b>'.$dNOx.' de '.$mNOx.'</b> de las <b>'.$whinfosoli["hora_evento_ini"].' hrs.</b> a las <b>'.$whinfosoli['hora_evento_fin']." hrs.</b> en <b>".utf8_encode($whinfosoli['lugar_evento']).'</b><br>'.
													'<br>'.
													'<br>'.
													'<br>'.
													'<hr>'.
													'<b>Este mensaje es generado automáticamente desde el sistema AI (Agenda Institucional) y no requiere una respuesta'.
													'<br>'.
													'Para mayor información contacte al área responsable de este evento ('.utf8_encode($empresa).')</b>'.
													'<hr>'.
													'Enviado el ' . date('d/m/Y', time());
													'</body>'.
													'</html>';


										$para = 'lachxD@gmail.com';
										$asunto = 'Requisición para el evento '.utf8_decode($whinfosoli['nombre_evento']).'';

										mail(utf8_decode($para), utf8_decode($asunto), utf8_decode($mensaje), $header);

									}
								}
							}
						}
					}
				}
				echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';
			}
		}
		else{
			$consul1 = "INSERT INTO Requerimientos (lista_area_11, lista_area_10, lista_area_6, estado, id_ref) VALUES ('".utf8_decode($lista_area_11)."', '".utf8_decode($lista_area_10)."', '".utf8_decode($lista_area_6)."', '1', '".$id_rela."')";
			$sqlx1 = mysql_query($consul1);
			if($sqlx1){		
				$infusu = mysql_query("SELECT nombre_formal, area FROM usuarios WHERE id = '".$_SESSION['idx']."' ORDER BY id DESC");
			    if (mysql_num_rows($infusu)>0){
			    	while($whinfusu = mysql_fetch_array($infusu)){ 
						$infosoli = mysql_query("SELECT * FROM solicitudes WHERE id = '".$id_rela."' ORDER BY id DESC");
			    		if (mysql_num_rows($infosoli)>0){
			    			while($whinfosoli = mysql_fetch_array($infosoli)){

								$infarea = mysql_query("SELECT * FROM areas WHERE id = '".$whinfosoli['area_evento']."' ORDER BY id DESC");
					    		if (mysql_num_rows($infarea)>0){
					    			while($whinfarea = mysql_fetch_array($infarea)){
					    				
					    				$nombre = $whinfusu['nombre_formal'];
										$empresa = $whinfarea['nombre'];
										$nomevent = $whinfosoli['nombre_evento'];

										$mail = 'ai_info@datacenter-iepcdurango.mx';
										$lista = '';

										if ($cosa_10 != '') {
											$lista = '° '.$cosa_10.'<br>';
										}

										if ($cosa_11 != '') {
											$lista = $lista.'° '.$cosa_11.'<br>';
										}

										if ($cosa_12 != '') {
											$lista = $lista.'° '.$cosa_12.'<br>';
										}

										if ($cosa_13 != '') {
											$lista = $lista.'° '.$cosa_13.'<br>';
										}

										$aNOx = substr($whinfosoli['fecha_evento'],0,4);
							            $mNOx = substr($whinfosoli['fecha_evento'],5,2);
							            $dNOx = substr($whinfosoli['fecha_evento'],8,2);

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

										$header = 'From: ' . $mail . " \r\n";
										$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
										$header .= "Mime-Version: 1.0 \r\n";
										$header .= "Content-Type: text/html";

										$mensaje = '<html>'.
													'<head><title>Requisición de evento</title></head>'.
													'<body><h1>Requisición para el evento '.utf8_encode($whinfosoli['nombre_evento']).'</h1>'.
													'Este mensaje fue enviado por: <b>'.ucwords(mb_strtolower(utf8_encode($nombre),'UTF-8')).'</b>'.
													'<hr>'.
													'Por medio de este mensaje, solicito de la manera más atenta el apoyo para cubrir las siguiente lista de necesidades que tendremos durante nuestro evento <b>'.utf8_encode($whinfosoli['nombre_evento']).'</b>.<br>'.
													'<br>'.
													$lista.
													'<br>'.
													'Este evento se llevara acabo el día <b>'.$dNOx.' de '.$mNOx.'</b> de las <b>'.$whinfosoli["hora_evento_ini"].' hrs.</b> a las <b>'.$whinfosoli['hora_evento_fin']." hrs.</b> en <b>".utf8_encode($whinfosoli['lugar_evento']).'</b><br>'.
													'<br>'.
													'<br>'.
													'<br>'.
													'<hr>'.
													'<b>Este mensaje es generado automáticamente desde el sistema AI (Agenda Institucional) y no requiere una respuesta'.
													'<br>'.
													'Para mayor información contacte al área responsable de este evento ('.utf8_encode($empresa).')</b>'.
													'<hr>'.
													'Enviado el ' . date('d/m/Y', time());
													'</body>'.
													'</html>';


										$para = 'lachxD@gmail.com';
										$asunto = 'Requisición para el evento '.utf8_decode($whinfosoli['nombre_evento']).'';

										mail(utf8_decode($para), utf8_decode($asunto), utf8_decode($mensaje), $header);

									}
								}
							}
						}
					}
				}
				echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';
			}
		}

		echo '<script> window.location="requerimientos.php?NS='.$id_rela.'"; </script>';

	}

}

function requi(){
	$clase = new sistema;
	$clase->conexion();
			echo '
	                <table class="tbl-registro" width="100%">
	                    <tbody>';
		                    $sql = mysql_query("SELECT * FROM Requerimientos WHERE lista_area_11 != '' AND id_ref = '".$_GET['NS']."'");
							if(mysql_num_rows($sql)>0){
	                    			echo '
	                    		<tr>
	                        		<td><b>La solicitud para UTC ya fue enviada</b></td>
	                    		</tr>
	                    		';	
	                    		}
	                    	else{
	                    		echo '
	                    	<form method="post" action="" enctype="multipart/form-data">
	                    		<tr>
	                        		<td><b>Solicitud para UTC</b></td>
	                    		</tr>
	                    		<tr>
	                        		<td>
	                        			<legend></legend>
                            			<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
                            				<input type="checkbox" name="1" value="Proyector y Pantalla"> <label for="1">Proyector y Pantalla</label><br>
                            				<input type="checkbox" name="2" value="Computadora"> <label for="2">Computadora</label><br>
                            				<input type="checkbox" name="3" value="Pantalla Led"> <label for="3">Pantalla Led</label><br>
                            				<input type="checkbox" name="4" value="Presentador de diapositivas"> <label for="4">Presentador de diapositivas</label><br>
                            				<input type="checkbox" name="5" value="Audio multimedia"> <label for="5">Audio multimedia</label><br>
                            				<input type="checkbox" name="6" value="Cronómetro de sesión"> <label for="6">Cronómetro de sesión</label><br>
                            				<input type="checkbox" name="7" value="BAM"> <label for="7">BAM</label><br>
                            			</fieldset>
                            			<textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($_GET['NS']).'</textarea>
                        				<legend></legend>
	                        		</td>
	                    		</tr>
	                    		<tr>
	                        		<td colspan="4"><input id="jjjjjj" name="jjjjjj" type="submit" value="Enviar" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
	                    		</tr>
	                    	</form>
	                    	</tbody>
	            	</table>
	            	<table class="tbl-registro" width="100%">
	                    <tbody>
	                    <br><br><br>';
	                    	}
	                    	$sql = mysql_query("SELECT * FROM Requerimientos WHERE lista_area_6 != '' AND id_ref = '".$_GET['NS']."'");
							if(mysql_num_rows($sql)>0){
								echo '
								<tr>
	                        		<td><b>La solicitud para DA ya fue enviada</b></td>
	                    		</tr>
								';
							}
							else {
	                    		echo'
							
	                    	<form method="post" action="" enctype="multipart/form-data">
	                    		<tr>
	                        		<td><b>Solicitud para DA</b></td>
	                    		</tr>
	                    		<tr>
	                        		<td>
										<legend></legend>
                            			<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
                            				<input type="checkbox" name="8" value="Cafetería"> <label for="8">Cafetería</label><br>
  											<input type="checkbox" name="9" value="Adecuación de mobiliario"> <label for="9">Adecuación de mobiliario</label><br>
                            			</fieldset>
                            			<textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($_GET['NS']).'</textarea>
                        				<legend></legend>
	                        		</td>
	                    		</tr>
	                    		<tr>
	                        		<td colspan="4"><input id="kkkkkk" name="kkkkkk" type="submit" value="Enviar" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
	                    		</tr>
	                    		<br>
	                    	</form>
	                    	</tbody>
	            	</table>
	            	<table class="tbl-registro" width="100%">
	                    <tbody>
	                    <br><br><br>';
	                    		}
	                    	$sql = mysql_query("SELECT * FROM Requerimientos WHERE lista_area_10 != '' AND id_ref = '".$_GET['NS']."'");
							if(mysql_num_rows($sql)>0){
								echo '
								<tr>
	                        		<td><b>La solicitud para UTCS ya fue enviada</b></td>
	                    		</tr>
								';
							}
							else {
	                    		echo'
	                    	<form method="post" action="" enctype="multipart/form-data">
		                    	<tr>
		                        	<td><b>Solicitud para UTCS</b></td>
	                    		</tr>
	                    		<tr>
	                        		<td>
										<legend></legend>
                        				<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
                        					<input type="checkbox" name="10" value="Fotografía"> <label for="10">Fotografía</label><br>
                        					<input type="checkbox" name="11" value="Transmisión en vivo"> <label for="11">Transmisión en vivo</label><br>
                        					<input type="checkbox" name="12" value="Micrófono Inalámbrico"> <label for="12">Micrófono Inalámbrico</label><br>
                        					<input type="checkbox" name="13" value="Atril"> <label for="13">Atril</label><br>
                    	    			</fieldset>
                        				<textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($_GET['NS']).'</textarea>
                        				<legend></legend>
	                        		</td>
	                    		</tr>
	                    		<tr>
	                        		<td colspan="4"><input id="llllll" name="llllll" type="submit" value="Enviar" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
	                    		</tr>
	                    	</form>';
	                		}
	                    echo'	
	                	</tbody>
	            	</table>
	            	<br><br><br>';
		}

function requiusu(){
	$clase = new sistema;
	$clase->conexion();
	$sql = mysql_query("SELECT * FROM solicitudes WHERE usuario_solicita = '".$_SESSION['idx']."' and id = ".$_GET["NS"]."");
	if(mysql_num_rows($sql)>0){
			echo '
	                <table class="tbl-registro" width="100%">
	                    <tbody>';
		                    $sql = mysql_query("SELECT * FROM Requerimientos WHERE lista_area_11 != '' AND id_ref = '".$_GET['NS']."'");
							if(mysql_num_rows($sql)>0){
	                    			echo '
	                    		<tr>
	                        		<td><b>La solicitud para UTC ya fue enviada</b></td>
	                    		</tr>
	                    		';	
	                    		}
	                    	else{
	                    		echo '
	                    	<form method="post" action="" enctype="multipart/form-data">
	                    		<tr>
	                        		<td><b>Solicitud para UTC</b></td>
	                    		</tr>
	                    		<tr>
	                        		<td>
	                        			<legend></legend>
                            			<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
                            				<input type="checkbox" name="1" value="Proyector y Pantalla"> <label for="1">Proyector y Pantalla</label><br>
                            				<input type="checkbox" name="2" value="Computadora"> <label for="2">Computadora</label><br>
                            				<input type="checkbox" name="3" value="Pantalla Led"> <label for="3">Pantalla Led</label><br>
                            				<input type="checkbox" name="4" value="Presentador de diapositivas"> <label for="4">Presentador de diapositivas</label><br>
                            				<input type="checkbox" name="5" value="Audio multimedia"> <label for="5">Audio multimedia</label><br>
                            				<input type="checkbox" name="6" value="Cronómetro de sesión"> <label for="6">Cronómetro de sesión</label><br>
                            				<input type="checkbox" name="7" value="BAM"> <label for="7">BAM</label><br>
                            			</fieldset>
                            			<textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($_GET['NS']).'</textarea>
                        				<legend></legend>
	                        		</td>
	                    		</tr>
	                    		<tr>
	                        		<td colspan="4"><input id="jjjjjj" name="jjjjjj" type="submit" value="Enviar" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
	                    		</tr>
	                    	</form>
	                    	</tbody>
	            	</table>
	            	<table class="tbl-registro" width="100%">
	                    <tbody>
	                    <br><br><br>';
	                    	}
	                    	$sql = mysql_query("SELECT * FROM Requerimientos WHERE lista_area_6 != '' AND id_ref = '".$_GET['NS']."'");
							if(mysql_num_rows($sql)>0){
								echo '
								<tr>
	                        		<td><b>La solicitud para DA ya fue enviada</b></td>
	                    		</tr>
								';
							}
							else {
	                    		echo'
							
	                    	<form method="post" action="" enctype="multipart/form-data">
	                    		<tr>
	                        		<td><b>Solicitud para DA</b></td>
	                    		</tr>
	                    		<tr>
	                        		<td>
										<legend></legend>
                            			<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
                            				<input type="checkbox" name="8" value="Cafetería"> <label for="8">Cafetería</label><br>
  											<input type="checkbox" name="9" value="Adecuación de mobiliario"> <label for="9">Adecuación de mobiliario</label><br>
                            			</fieldset>
                            			<textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($_GET['NS']).'</textarea>
                        				<legend></legend>
	                        		</td>
	                    		</tr>
	                    		<tr>
	                        		<td colspan="4"><input id="kkkkkk" name="kkkkkk" type="submit" value="Enviar" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
	                    		</tr>
	                    		<br>
	                    	</form>
	                    	</tbody>
	            	</table>
	            	<table class="tbl-registro" width="100%">
	                    <tbody>
	                    <br><br><br>';
	                    		}
	                    	$sql = mysql_query("SELECT * FROM Requerimientos WHERE lista_area_10 != '' AND id_ref = '".$_GET['NS']."'");
							if(mysql_num_rows($sql)>0){
								echo '
								<tr>
	                        		<td><b>La solicitud para UTCS ya fue enviada</b></td>
	                    		</tr>
								';
							}
							else {
	                    		echo'
	                    	<form method="post" action="" enctype="multipart/form-data">
		                    	<tr>
		                        	<td><b>Solicitud para UTCS</b></td>
	                    		</tr>
	                    		<tr>
	                        		<td>
										<legend></legend>
                        				<fieldset style="text-align: left; overflow: scroll; overflow-x: hidden; max-height: 200px;">
                        					<input type="checkbox" name="10" value="Fotografía"> <label for="10">Fotografía</label><br>
                        					<input type="checkbox" name="11" value="Transmisión en vivo"> <label for="11">Transmisión en vivo</label><br>
                        					<input type="checkbox" name="12" value="Micrófono Inalámbrico"> <label for="12">Micrófono Inalámbrico</label><br>
                        					<input type="checkbox" name="13" value="Atril"> <label for="13">Atril</label><br>
                    	    			</fieldset>
                        				<textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($_GET['NS']).'</textarea>
                        				<legend></legend>
	                        		</td>
	                    		</tr>
	                    		<tr>
	                        		<td colspan="4"><input id="llllll" name="llllll" type="submit" value="Enviar" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
	                    		</tr>
	                    	</form>';
	                		}
	                    echo'	
	                	</tbody>
	            	</table>
	            	<br><br><br>';
	}

	else{
		echo "<script>location.href='solicitudes.php'</script>";
	}
}

function ediSURES(){
			$sql = mysql_query("SELECT * FROM solicitudes WHERE tipo_agenda = '3'");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
						
						$hoy=date("Y-m-d");  
						$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
						$hora = date( "h:i" );
						echo '
				            <form method="post" action="" enctype="multipart/form-data">
				                <table class="tbl-registro" width="100%">
				                    <tbody>
					                    <tr>
					                        <td><b>Foto:</b></td>
					                        <textarea class="form-control" rows="5" id="solifech" name="solifech" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['fecha_soliciud']).'</textarea>
				                            <textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['id']).'</textarea>
					                    </tr>
					                    <tr>
					                        <td>
					                            <img src=img/agendas/'.utf8_encode($mostrar['imagen']).' style="width: 101%;">
					                        </td>
					                    </tr>
			                            <tr>
			                                <td>
			                                    <input name="foto1" type="file" id="foto1" style="margin: 0 auto;" accept="image/*">
			                                </td>
			                            </tr>
					                    <tr>
					                        <td colspan="4"><input id="ACTRESU" name="ACTRESU" type="submit" value="Guardar Cambios" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
					                    </tr>
				                	</tbody>
				                </table>
				            </form>';
					}
					mysql_free_result($sqlX);
				}
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}
			mysql_free_result($sql);
		}

function ediSUCE(){
			$sql = mysql_query("SELECT * FROM solicitudes WHERE tipo_agenda = '2' AND id = ".$_GET["NS"]."");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$fd = $mostrar['tipo_agenda'];
					$sqlx = mysql_query("SELECT * FROM areas WHERE id = ".$mostrar["area_evento"]."");
					while($mostrarx = mysql_fetch_array($sqlx)){
						if ($mostrar['estado'] == 0) {
							$significado = 'Cancelado';
						}
						if ($mostrar['estado'] == 1) {
							$significado = 'Pendiente';
						}
						if ($mostrar['estado'] == 9) {
							$significado = 'Aceptado';
						}
						
						
						$hoy=date("Y-m-d");  
						$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
						$hora = date( "h:i" );
						echo '
				            <form method="post" action="" enctype="multipart/form-data">
				                <table class="tbl-registro" width="100%">
				                    <tbody>
				                    <tr>
				                        <td><b>Nombre del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <textarea class="form-control" rows="5" id="nombre" name="nombre" maxlength="82" style="max-width: 870px;" required>'.utf8_encode($mostrar['nombre_evento']).'</textarea>
				                            <textarea class="form-control" rows="5" id="solifech" name="solifech" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['fecha_soliciud']).'</textarea>
				                            <textarea class="form-control" rows="5" id="idse" name="idse" style="max-width: 870px; display:none;" required >'.utf8_encode($mostrar['id']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Fecha de inicio:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
											<input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" value="'.utf8_encode($mostrar['fecha_evento']).'" required class="form-control" min="'.$hoy.'" />
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Fecha de finalización:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
											<input type="date" name="fechad" id="fecha" placeholder="Introduce una fecha" value="'.utf8_encode($mostrar['fecha_evento_fin']).'" required class="form-control" min="'.$hoy.'" />
				                        </td>
				                    </tr>
						            <tr>
										<td>
											<label>Color de fondo</label><input type="color" calue value="'.utf8_encode($mostrar['color_fondo']).'" name="myColor" required>
										</td>
									</tr>
						            <tr>
										<td>
											<label>Estado</label>
  											<select name="estate" class="form-control" required>';
				                    			if ($mostrar['estado'] == '9') {
				                    				echo '
				                    				<option value="9" selected="">Activado</option>
				                    	  			<option value="0">Desactivado</option>';
				                    			}
				                    			if ($mostrar['estado'] == '0') {
				                    				echo '
				                    				<option value="9">Activado</option>
				                    				<option value="0" selected="">Desactivado</option>';
				                    			}
				                    	echo '
				                    		</select>
										</td>
									</tr>
				                    <tr>
				                        <td colspan="4"><input id="pppppp" name="pppppp" type="submit" value="Guardar Cambios" class="btn btn-primary" style="background: #8c1b67; border-color: #8c1b67;"></td>
				                    </tr>
				                </tbody></table>
				            </form>';
					}
					mysql_free_result($sqlX);
				}
			}
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}
			mysql_free_result($sql);
		}


		function mostrars(){
			$sql = mysql_query("SELECT * FROM solicitudes WHERE id = ".$_GET["NS"]."");
			$item = 0;
			if(mysql_num_rows($sql)>0){
				while($mostrar = mysql_fetch_array($sql)){
					$sqlx = mysql_query("SELECT * FROM areas WHERE id != '1' AND id = ".$mostrar["area_evento"]."");
					while($mostrarx = mysql_fetch_array($sqlx)){
						if ($mostrar['estado'] == 0) {
							$significado = 'Cancelado';
						}
						if ($mostrar['estado'] == 1) {
							$significado = 'Pendiente';
						}
						if ($mostrar['estado'] == 9) {
							$significado = 'Aceptado';
						}
						mysql_free_result($sqlx);

						
						$hoy=date("Y-m-d");  
						$ayer = date( "Y-m-d", strtotime( "-1 day", strtotime( $hoy ) ) );
						$hora = date( "h:i" );
						echo '
				            <form method="post" action="" enctype="multipart/form-data">
				                <table class="tbl-registro" width="100%">
				                    <tbody>
				                    <tr>
				                        <td><b>Fecha en que se realizo la soliciud (AAAA-MM-DD hh:mm:ss):</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	<textarea class="form-control" rows="5" id="fecha" name="fecha" style="max-width: 870px;" required readonly>'.utf8_encode($mostrar['fecha_soliciud']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Foto:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <img src=img/agendas/'.utf8_encode($mostrar['imagen']).' style="width: 40%;">
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Nombre del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <textarea class="form-control" rows="5" id="nombre" name="nombre" maxlength="82" style="max-width: 870px;" required readonly>'.utf8_encode($mostrar['nombre_evento']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Lugar del evento:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <textarea class="form-control" rows="5" id="lugar" name="lugar" style="max-width: 870px;" required readonly>'.utf8_encode($mostrar['lugar_evento']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Fecha (AAAA-MM-DD):</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	<textarea class="form-control" rows="5" id="fecha" name="fecha" style="max-width: 870px;" required readonly>'.utf8_encode($mostrar['fecha_evento']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Hora:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	<textarea class="form-control" rows="5" id="hora" name="hora" style="max-width: 870px;" required readonly>'.utf8_encode($mostrar['hora_evento_ini']).'</textarea>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td><b>Área:</b></td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <textarea class="form-control" rows="5" id="hora" name="hora" style="max-width: 870px;" required readonly>'.utf8_encode($mostrarx['nombre']).'</textarea>
				                        </td>
				                    </tr>

				                </tbody></table>
				            </form>

							<tr>
								<td><a href="ac.php?NS='.utf8_encode($mostrar['id']).'&esado=0"><img src=image/0.png style="width: 11%;" title="Cancelado"></a></td>
								<td><a href="ac.php?NS='.utf8_encode($mostrar['id']).'&esado=9"><img src=image/9.png style="width: 11%;" title="Aceptado"></a></td>
								<td><a href="editar.php?NS='.utf8_encode($mostrar['id']).'"><img src=image/editar.png style="width: 11%;" title="Editar"></a></td>
							</tr>';
					}
				}
			}
			
			else{
				mysql_free_result($sql);
				echo '<tr><td colspan="4">No se encontraron registros...</td></tr>';
			}

			mysql_free_result($sql);
		}




		function mostrarcalendario(){
			if ($_GET['te'] == 1) {
				$sql = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND tipo_agenda = '1' ORDER BY id DESC");
			}
			elseif ($_GET['te'] == 2) {
				$sql = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND tipo_agenda = '2' ORDER BY id DESC");
			}
			else{
				$sql = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND tipo_agenda < '3' ORDER BY id DESC");
			}
			
			$item = 0;
			echo '
				<script type="text/javascript">
					var sampleEvents = {
						"monthly": [';
							if(mysql_num_rows($sql)>0){
								while($mostrar = mysql_fetch_array($sql)){
									if ($mostrar['publica'] == '1') {
										$pubeven = 'público';
									}
									else{
										$pubeven = 'privado';
									}
									echo'
										{
											"id": '.$mostrar['id'].',
											"name": "'.utf8_encode(str_replace('"', "''", $mostrar['nombre_evento'])).' | Evento '.$pubeven.'",
											"startdate": "'.$mostrar['fecha_evento'].'",
											"enddate": "'.$mostrar['fecha_evento_fin'].'",
											"starttime": "'.$mostrar['hora_evento_ini'].'",
											"endtime": "'.$mostrar['hora_evento_fin'].'",
											"color": "'.$mostrar['color_fondo'].'",
											"url": "evento.php?s='.$mostrar['id'].'"
										},
									';
								}
							}
					echo '
						]
					};

					$(window).load( function() {
						$("#mycalendar").monthly({
							mode: "event",
							dataType: "json",
							events: sampleEvents
						});
					});
				</script>';

				mysql_free_result($sql);

			}

			function actidesaplp(){
				$clase = new sistema;
			      		$clase->conexion();
				$actidesa = $_GET['actidesa'];
				$actidesaid = $_GET['actidesaid'];
				if ($actidesaid > 0) {
					if($actidesa == 9){
						$sqlborrar="UPDATE solicitudes SET estado = '0' WHERE id='".$actidesaid."'";
						$resborrar=mysql_query($sqlborrar);
						echo '<script>alert("REGISTRO ACTUALIZADO")</script> ';
						echo "<script>location.href='solicitudes.php'</script>";
					}
					if($actidesa == 0){
						$sqlborrar="UPDATE solicitudes SET estado = '9' WHERE id='".$actidesaid."'";
						$resborrar=mysql_query($sqlborrar);
						echo '<script>alert("REGISTRO ACTUALIZADO")</script>';
						echo "<script>location.href='solicitudes.php'</script>";
					}
				}
				else{
					echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
					echo "<script>location.href='index.php'</script>";	
				}
			}

}