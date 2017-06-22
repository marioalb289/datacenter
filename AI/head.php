<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<title>Agenda Institucional</title>
<link rel="icon" type="image/png" href="http://www.iepcdurango.mx/x/logo.png" />
<link href="detalles/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
<link href="detalles/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="detalles/css/estilos.css" rel="stylesheet">
<script src="detalles/js/jquery.js"></script>
<script src="detalles/js/myjava.js"></script>
<script src="detalles/bootstrap/js/bootstrap.min.js"></script>
<script src="detalles/bootstrap/js/bootstrap.js"></script>
<script>
function noEnter(textfield){
    string = textfield.value;
    string = string.replace(/\n/g, " ");
    textfield.value = string;
}
</script>
<style type="text/css">
    
    .men:hover {
        background-color: #ab207d;
    }

</style>
</head>
<body style="min-width: 960px !important; background: url('https://www.toptal.com/designers/subtlepatterns/patterns/crossword.png');">

<?php
$clase->conexion();

    if ( $tipUSU == '0') {
        $clase->menumortal();
    }
    if ( $tipUSU == '1') {
        $clase->menuSU();
    }
    if ( $tipUSU == '3') {
        $clase->menupioho();
    }
?>
