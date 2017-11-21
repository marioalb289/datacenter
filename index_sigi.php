<?php
require_once 'sigi/model/database.php';
require_once ("sigi/class/validate.class.php");
require_once ("sigi/model/usuario.php");
require_once __DIR__ . '/vendor/autoload.php';
  use Firebase\JWT\JWT;

$controller = 'ofcpartes';
$secret_key = 'Sdw1s9x8784455gtykifd335@';
session_start();
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$host  = $_ENV['SS'].$_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$ip = '';
$url = "$host$uri/";

//Validar primero que exista una sesion
if( !empty($_SESSION['data_user'])){

    //Validar Sesion

    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"),"unknown"))
       $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
       $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
       $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
       $ip = $_SERVER['REMOTE_ADDR'];
    else
       header("Location: https://www.google.com.mx");

    $decoded = JWT::decode($_SESSION['token'], $secret_key, array('HS256'));
    // print_r($decoded);exit;

    if($decoded->data->base != $_ENV['BASE'] || $decoded->data->ip != $ip){
        header("Location: $url");
    }


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
            header("HTTP/1.0 404 Not Found");
            exit();
        }
        
    }

    //require_once 'sigi/view/footer.php';
}
else{
    header("Location: $url");
    // print_r($_REQUEST);exit;
    // if( (isset($_REQUEST['idVincular']) && $_REQUEST['idVincular'] != '') && (isset($_REQUEST['id']) && $_REQUEST['id'] != '')){
    //     // print_r($_REQUEST);
    //     $correo = $_REQUEST['idVincular'];
    //     $pass = $_REQUEST['id'];
    //     $validate = new Validate();
    //     $extra = '/index';
    //     // print_r($validate);exit;
    //     if (!$validate->alfanumerico($correo))
    //        header("Location: http://$host$uri/$extra");     
    //     if (!$validate->alfanumerico($pass))
    //          header("Location: http://$host$uri/$extra");     

    //     $usuario = new Usuario();
    //     $objUser = $usuario->reLoginUser($correo,$pass);
    //     if(!empty($objUser)){

    //         $user = $objUser->correo;
    //         $tusu = $objUser->privilegios;
    //         $nombre = $objUser->nombre;
    //         $apelli = $objUser->apellido;
    //         $idx = $objUser->id;
    //         $are = $objUser->area;
    //         $_SESSION['loggedin'] = true;
    //         $_SESSION['nom'] = $nombre;
    //         $_SESSION['ape'] = $apelli;
    //         $_SESSION['cor'] = $user;
    //         $_SESSION['prv'] = $tusu;
    //         $_SESSION['idx'] = $idx;
    //         $_SESSION['are'] = $idx;
    //         $_SESSION['con'] = $pass;

    //         $_SESSION['start'] = time();
    //         $_SESSION['expire'] = $_SESSION['start'];
    //         $nombre_formal = ucwords(mb_strtolower(utf8_encode($objUser->nombre_formal),'UTF-8'));

    //         $_SESSION['data_user'] = array(
    //             'nombre_formal' => $nombre_formal ,
    //             'nombre' =>  $nombre,
    //             'apellido' =>  $apelli,
    //             'correo' =>  $user,
    //             'privilegios' => $objUser->priv_sigi,
    //             'id' =>  $idx,
    //             'area' =>  $are,
    //             'titular' => $objUser->nombre_formal->titular
    //         );

    //         $time = time();
    //         $secret_key = 'Sdw1s9x8784455gtykifd335@';
            
    //         $token = array(
    //             'iat' => $time,
    //             'exp' => $time + (60*60),
    //             'data' => $_SESSION['data_user']
    //         );

    //         $_SESSION['token'] = JWT::encode($token, $secret_key);
            
    //         $host  = $_SERVER['HTTP_HOST'];
    //         $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    //         $extra = 'ofcpartes/index';

    //         // print_r($uri);exit; 
    //         header("Location: http://$host$uri/$extra");

    //     }
    //     else{
    //        $extra = '/index';
    //         header("Location: http://$host$uri/$extra");

    //     }

        

    // }
    // else{
    //     $extra = '/index';
    //      header("Location: http://$host$uri/$extra");      
    // }
}

