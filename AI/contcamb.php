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

    if(@$_POST['llllll']){
        $clase->valactcont();
    }

?>

<section>
<section style="margin-top: 0; width: 100%;">
  <h2>Editar contraseña</h2>
  <?php
    $clase->conexion();
    
        $clase->ediSUco();
  ?>              
                  
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