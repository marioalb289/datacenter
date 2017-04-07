<?php
            }
    else{
        unset($_COOKIE['nom']);
        unset($_COOKIE['cor']);
        unset($_COOKIE['prv']);
        unset($_COOKIE['con']);
        header('Location: index.php');
    }
?>