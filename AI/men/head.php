<?php
    if (isset($_COOKIE['nom']) && isset($_COOKIE['cor']) && isset($_COOKIE['prv']) && isset($_COOKIE['con'])){

        include('detalles/class/classAsistencias.php');
        $clase = new sistema;
        /*
        $_COOKIE['nom'];
        $_COOKIE['cor'];
        $_COOKIE['prv'];
        $_COOKIE['con'];
        */
        if ($_COOKIE['prv'] == 7) {
            $tipUSU = 1;
        }
        if ($_COOKIE['prv'] == 1) {
            $tipUSU = 0;
        }
echo'';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<title>Lista de solicitudes</title>
<link href="detalles/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="detalles/css/estilos.css" rel="stylesheet">
<script src="detalles/js/jquery.js"></script>
<script src="detalles/js/myjava.js"></script>
<script src="detalles/bootstrap/js/bootstrap.min.js"></script>
<script src="detalles/bootstrap/js/bootstrap.js"></script>
<style type="text/css">
    
    .men:hover {
        background-color: #7d0303;
    }

</style>
</head>
<body>

<ul style="list-style-type: none; margin: 0; padding: 0; overflow: hidden; background-color: #9a0000; position: fixed; top: 0; width: 100%;">
    <li style="float: left;" class="men">
        <a style="display: block; font-weight: 600; color: white; padding: 16px; text-decoration: none;" href="solicitudes.php">
            <img src="image/logoAI.png" style="width: 27px;height: 21px;">
        </a>
    </li>
    <li style="float: left;" class="men">
        <a style="display: block; font-weight: 600; color: white; padding: 16px; text-decoration: none;" href="solicitudes.php">
            Hisorial de soliciudes
        </a>
    </li>
    <li style="float: left;" class="men">
        <a style="display: block; font-weight: 600; color: white; padding: 16px; text-decoration: none;" href="#news">
            Regisro de documentos
        </a>
    </li>
    <li style="float: left;" class="men">
        <a style="display: block; font-weight: 600; color: white; padding: 16px; text-decoration: none;" href="index.php">
            Salir
        </a>
    </li>
</ul>