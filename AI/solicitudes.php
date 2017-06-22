<?php
session_start();
    if (isset($_SESSION['nom']) && isset($_SESSION['cor']) && isset($_SESSION['prv']) && isset($_SESSION['con'])){

        include('detalles/class/classAsistencias.php');
        $clase = new sistema;
        /*
        $_SESSION['nom'];
        $_SESSION['cor'];
        $_SESSION['prv'];
        $_SESSION['con'];
        */
        if ($_SESSION['prv'] == 1) {
            $tipUSU = 1;
        }
        if ($_SESSION['prv'] == 2) {
            $tipUSU = 0;
        }
        if ($_SESSION['prv'] == 3) {
            header('Location: agenda.php');
        }



$sino = '0';
include('head.php');


    if(@$_POST['llllll']){
        $clase->valreg();
    }
    elseif (@$_POST['kkkkkk']) {
        $clase->valreg();
    }
    elseif (@$_POST['pppppp']) {
        $clase->valregCE();
    }
    elseif (@$_POST['ACTRESU']) {
        $clase->regmortalsqledita();
    }

    if (@$_GET['actidesaid']) {
        $clase->actidesaplp();
    }


?>

<section>
    <h2>Historial de publicaciones</h2>
    <br />
    <?php
        if ( $tipUSU == '1') {
    ?>
    <form method="post" action="solicitudes.php">
        <p style="float: left; margin-right: 5px; font-size: 20px;">Publicaciones del:</p>
		<?php
			if (@$_POST["fs"]){
				$sql = mysql_query("SELECT * FROM solicitudes WHERE fecha_evento LIKE '".$_POST['fs']."'");
				?>
				<input type="date" style="    float: left; width: 16%; margin-right: 5px; font-size: 17px; line-height: 25px;" value="<?php echo $_POST['fs']; ?>" name="fs" required="">
				<?php
			}
			else{
				$hoy=date("Y-m-d");
				?>  
				<input type="date" style="    float: left; width: 16%; margin-right: 5px; font-size: 17px; line-height: 25px;" value="<?php echo $hoy; ?>" name="fs" required="">
				<?php
			}
		?>
        <button style="float: left;width: 58px;height: 35px;background: #8c1b67;border-color: #8c1b67; margin-right: 6px;" type="submit" class="btn btn-block btn-primary">Buscar</button>
    </form>

    <a href="solicitudes.php">
    	<button style="float: left;width: 67px;height: 35px;background: #8c1b67;border-color: #8c1b67; margin-right: 6px;" type="submit" class="btn btn-block btn-primary">Ver todo</button>
    </a>
        <?php
        }
    ?>

            <?php 
            if ( $tipUSU == '1') {
        ?>
    <input type="button" value="Nueva actividad" id="nuevaAsistenciax" class="btn btn-primary" style="background: #808080;border-color: #808080;float: right;"/>
    <!--<input type="button" value="Resumen semanal" id="Resumen" class="btn btn-primary" style="background: #8c1b67;border-color: #8c1b67;float: right;margin-right: 1%;"/>-->
            <?php 
          }
        ?>  

    <input type="button" value="Nueva publicación" id="nuevaAsistencia" class="btn btn-primary" style="background: #8c1b67;border-color: #8c1b67;float: right; margin-right: 1%;"/>

    <br />
    <br />
    <table class="table table-bordered table-condensed table-hover" style="text-align: center;">
        <thead>
            <tr>
                <?php
                    if ( $tipUSU == '0') {
                        $clase->tablamortal();
                    }
                    if ( $tipUSU == '1') {
                        $clase->tablaSU();
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                $clase->conexion();
                if ( $tipUSU == '0') {
                    $clase->mostrarAsistenciasmoral(); 
                }
                if ( $tipUSU == '1') {
                    $clase->mostrarAsistencias();
                }
            ?>
        </tbody>
    </table>
</section>
<div class="modal fade" id="modalAsistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><b>Nueva publicación</b></h4>
            </div>
            <div class="modal-body">
            <?php 
                $clase->conexion();
                if ( $tipUSU == '0') {
                    $clase->regmortal(); 
                }
                if ( $tipUSU == '1') {
                    $clase->regSU();
                }
            ?>
            </div>
          </div>
        </div>
      </div>
        <?php 
            if ( $tipUSU == '1') {
                $clase->conexion();
        ?>
    <div class="modal fade" id="modalAsistenciax" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><b>Nueva Actividad</b></h4>
            </div>
            <div class="modal-body">
            <?php
                $clase->regSUCE();
            ?>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modalresumen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel"><b>Actualizar resumen</b></h4>
            </div>
            <div class="modal-body">
            <?php
                $clase->ediSURES();
            ?>
            </div>
          </div>
        </div>
    </div>

    <?php
        }
    ?>

</body>
</html>
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