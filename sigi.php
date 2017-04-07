<?php
require_once 'sigi/model/database.php';

$controller = 'ofcpartes';
session_start();
//echo exec('whoami');exit;
// if( empty($_SESSION['data_user'])){
//     header('Location: index.php');
// }


// $_SESSION['err'] = '';
//Validar primero que exista una sesion
if( !empty($_SESSION['data_user'])){


    // Todo esta lógica hara el papel de un FrontController
    // require_once 'sigi/view/header.php';


    if(!isset($_REQUEST['c']))
    {
        require_once "sigi/controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        $controller->IndexAction();    
    }
    else
    {
        try
        {
            // Obtenemos el controlador que queremos cargar
            $controller = strtolower($_REQUEST['c']);;
            $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
            
            // Instanciamos el controlador si es que exsiste
            if (!file_exists(__DIR__ ."/sigi/controller/$controller.controller.php" )){
                //echo "no existe";
                throw new Exception("Controlador no encontrado");
            }else{
                //echo "existe";
                require_once "sigi/controller/$controller.controller.php";
                $controller = ucwords($controller) . 'Controller';
                $controller = new $controller;
                // Llama la accion
                $x = call_user_func( array( $controller, $accion."Action" ) );
            }
            
               
        }
        catch(Exception $e)
        {
            // print_r(__DIR__ ."/sigi/controller/$controller.controller.php");
            // print_r($e->getMessage());exit;
            /*Nota: deberia redireccionar a un status 404*/
            header('Location: sigi.php');
            //die($e->getMessage());
        }
        
    }

    //require_once 'sigi/view/footer.php';
}
else{
    header('Location: index.php');
}

