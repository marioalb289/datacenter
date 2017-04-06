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
        if ($_SESSION['prv'] != 1) {
            $tipUSU = 0;
        }
include('head.php');
?>
<link rel="stylesheet" href="css/monthly.css">
	<style type="text/css">
		#mycalendar {
			width: 100%;
			margin: 2em auto 0 auto;
			max-width: 80em;
			border: 1px solid #666;
		}
	</style>

    
    
   

<section>
<section style="margin-top: 0; width: 100%;">
  <h2>Agenda</h2>
    <center>
        <div class="monthly" id="mycalendar"></div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/monthly.js"></script>

<?php
    $clase->conexion();
    $clase->mostrarcalendario();
?>

    </center>           
                  
</section>
</section>

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