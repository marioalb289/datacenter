<?php
require_once 'sigi/model/database.php';
include_once 'vendor/vlucas/phpdotenv/src/Dotenv.php';

$controller = 'ofcpartes';
session_start();
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

//Validar primero que exista una sesion
if( !empty($_SESSION['data_user'])){


    // Todo esta lógica hara el papel de un FrontController


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

            /*$controller = "mario alberto";
            $regex = "/^((([a-zA-Z Ññ áéíóú ÁÉÍÓÚ 0-9- .,()])+)? ?([a-zA-Z Ññ áéíóú ÁÉÍÓÚ 0-9- .,()]))+$/i";
            if (!preg_match($regex, $controller))
                print_r("not ok");
            else
                print_r("ok");
            exit;*/

            $regex = "/^[a-zA-Z 0-9]+$/i";
            if (!preg_match($regex, $controller))
                throw new Exception("Accion no encontrada");
            
            $controller = strtolower($_REQUEST['c']);
            $accion = "";
            if (isset($_REQUEST['a'])) {
                if (!preg_match($regex, $controller))
                    throw new Exception("Accion no encontrada");
                $accion = $_REQUEST['a'];
            } else {
                 throw new Exception("Accion no encontrada");
            }
                        
            // Instanciamos el controlador si es que exsiste
            if (!file_exists(__DIR__ ."/sigi/controller/$controller.controller.php" )){
                //echo "no existe";
                throw new Exception("Controlador no encontrado");
            }else{
                //echo "existe";
                require_once "sigi/controller/$controller.controller.php";
                $controller = ucwords($controller) . 'Controller';
                $controller = new $controller;
                // Llama la accion si existe
                if(is_callable(array( $controller, $accion."Action" ))) {
                    call_user_func( array( $controller, $accion."Action" ) );
                } else {
                    throw new Exception("Accion no encontrada");
                }

            }
            
               
        }
        catch(Exception $e)
        {
            /*Nota: deberia redireccionar a un status 404*/
            //header('Location: sigi.php');
            //die($e->getMessage());

            http_response_code(404);
            die();
        }
        
    }

    //require_once 'sigi/view/footer.php';
}
else{
    header('Location: index.php');
}

