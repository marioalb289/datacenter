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

        if(@$_POST['llllll']){
            $clase->valact();
        }
        elseif (@$_POST['kkkkkk']) {
            $clase->valact();
        }
?>

        <section>
                <?php
                    $clase->conexion();
                    $clase->even();
                ?>
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