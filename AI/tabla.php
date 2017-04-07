<?php
session_start();
    if (isset($_SESSION['nom']) && isset($_SESSION['cor']) && isset($_SESSION['prv']) && isset($_SESSION['con'])){
        include('detalles/class/classAsistencias.php');
        $clase = new sistema;
        if ($_SESSION['prv'] == 1) {
            $tipUSU = 1;
        }
        if ($_SESSION['prv'] != 1) {
            $tipUSU = 0;
        }
        include('head.php');

?>

        <section>



            <p>
            <h1>Eventos de los proximos 15 días</h1>
            <canvas id="canvas" style="border:2px solid black;" width="920" height="auto"></canvas>
            <script>
                var canvas = document.getElementById("canvas");
                canvas.height=window.innerHeight;
                var ctx = canvas.getContext("2d");
                var data = 
                    "<svg xmlns='http://www.w3.org/2000/svg' width='920' height='auto'>" +
                        "<foreignObject width='100%' height='100%'>" +
                            "<div xmlns='http://www.w3.org/1999/xhtml' style='font-size:20px'>" +
                                "<table border='1' style='text-align: center; center;width: 100%;'>" +
                                    "<tr style='background: #8c1b67; color: white; font-size: x-large; font-weight: 900;'>" +
                                        "<td style='padding: 1%; width: 33%; font-family: sans-serif;'>Fecha</td>" +
                                        "<td style='padding: 1%; width: 33%; font-family: sans-serif;'>Actividad</td>" +
                                        "<td style='padding: 1%; width: 33%; font-family: sans-serif;'>Hora</td>" +
                                    "</tr>" +
                                    <?php
                                    $hoy = date("Y-m-d");
                                    $semana = date( "Y-m-d", strtotime( "+15 day", strtotime( $hoy ) ) );
                                    $clase = new sistema;
                                    $clase->conexion();
                                    $sql = mysql_query("SELECT * FROM solicitudes WHERE estado = '9' AND fecha_evento_fin BETWEEN '".$hoy."'  AND '".$semana."' ORDER BY fecha_evento ASC LIMIT 15");
                                    if(mysql_num_rows($sql)>0){
                                        while($mostrarx = mysql_fetch_array($sql)){
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
                                    ?>
                                            "<tr>" +
                                                "<td style='padding: 1%; width: 33%; font-family: sans-serif;'><?php echo 'Del <b>'.utf8_decode($dNOx).'</b> de <b>'.utf8_decode($mNOx).'</b> al '.utf8_decode($dNOT).' de '.utf8_decode($mNOT); ?></td>" +
                                                "<td style='padding: 1%; width: 33%; font-family: sans-serif;'><?php echo utf8_encode($mostrarx['nombre_evento'])?></td>" +
                                                "<td style='padding: 1%; width: 33%; font-family: sans-serif;'>De las <b><?php echo $mostrarx['hora_evento_ini']; ?></b> hrs. a las <b><?php echo $mostrarx['hora_evento_fin']; ?></b> hrs.</td>" +
                                            "</tr>" +
                                    <?php
                                        }
                                    }
                                    ?>

                                "</table>" +
                            "</div>" +
                        "</foreignObject>" +
                    "</svg>";
                var DOMURL = self.URL || self.webkitURL || self;
                var img = new Image();
                var svg = new Blob([data], {type: "image/svg+xml;charset=utf-8"});
                var url = DOMURL.createObjectURL(svg);
                img.onload = function() {
                    ctx.drawImage(img, 0, 0);
                    DOMURL.revokeObjectURL(url);
                };
                img.src = url;
                </script>


        </section>
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
            header('Location: ../index.php');
        }
    ?>