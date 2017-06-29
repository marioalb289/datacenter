<?php
require_once 'sigi/model/database.php';
require_once ("sigi/class/validate.class.php");
require_once ("sigi/model/usuario.php");
require_once __DIR__ . '/vendor/autoload.php';
  use Firebase\JWT\JWT;

$controller = 'ofcpartes';
session_start();
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

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
    if( (isset($_REQUEST['usuario']) && $_REQUEST['usuario'] != '') && (isset($_REQUEST['contrasena']) && $_REQUEST['contrasena'] != '')){
        // print_r($_REQUEST);
        $validate = new Validate();
        $extra = '/index';
        // print_r($validate);exit;
        if (!$validate->alfanumerico($_REQUEST['usuario']))
           header("Location: http://$host$uri/$extra");     
        if (!$validate->alfanumerico($_REQUEST['contrasena']))
             header("Location: http://$host$uri/$extra");     

        $usuario = new Usuario();
        $objUser = $usuario->reLoginUser($_REQUEST['usuario'],$_REQUEST['contrasena']);
        // print_r($objUser);exit;
        if(!empty($objUser)){

            $user = $objUser->correo;
            $tusu = $objUser->privilegios;
            $nombre = $objUser->nombre;
            $apelli = $objUser->apellido;
            $idx = $objUser->id;
            $are = $objUser->area;
            $_SESSION['loggedin'] = true;
            $_SESSION['nom'] = $nombre;
            $_SESSION['ape'] = $apelli;
            $_SESSION['cor'] = $user;
            $_SESSION['prv'] = $tusu;
            $_SESSION['idx'] = $idx;
            $_SESSION['are'] = $idx;
            $_SESSION['con'] = md5($_REQUEST['contrasena']);

            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'];

            $_SESSION['data_user'] = array(
                'nombre' =>  $nombre,
                'apellido' =>  $apelli,
                'correo' =>  $user,
                'privilegios' => $objUser->priv_sigi,
                'id' =>  $idx,
                'area' =>  $are,
            );

            $time = time();
            $secret_key = 'Sdw1s9x8784455gtykifd335@';
            
            $token = array(
                'iat' => $time,
                'exp' => $time + (60*60),
                'data' => $_SESSION['data_user']
            );

            $_SESSION['token'] = JWT::encode($token, $secret_key);
            
            $extra = '/index';
            header("Location: http://$host$uri/$extra");

        }
        else{
           $extra = '/index';
            header("Location: http://$host$uri/$extra");

        }

        

    }
    else{
        $extra = '/index';
         header("Location: http://$host$uri/$extra");      
    }
}

