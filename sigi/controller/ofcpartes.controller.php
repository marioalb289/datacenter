<?php 
/**
* Controlloer de Oficialia de Partes
*/
require_once ("sigi/layout.php");
require_once ("sigi/model/oficio.php");
require_once ("sigi/model/usuario.php");
require_once ("sigi/model/area.php");
require_once ("sigi/model/contador.php");
require_once ("sigi/model/documento.php");
require_once ("sigi/model/oficio_documento.php");
require_once ("sigi/model/reportes_param.php");
include ("sigi/class/init_paginador.php");
require_once ("sigi/class/validate.class.php");

require_once __DIR__ . '/../../vendor/autoload.php';
  use Firebase\JWT\JWT;


//require_once ("/../view/header.php");


class OfcPartesController
{
  private $layout;
  private $validate;

  private $GLOBAL_PATH;

  public function __CONSTRUCT()
  {
    try
    {

      $this->layout = new Layout();    
      $this->validate = new Validate();

      $this->GLOBAL_PATH  = "http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    }
    catch(Exception $e)
    {
      die($e->getMessage());
    }
  }

  public function loginExternoAction(){
    // print_r($_REQUEST);exit;
    if( (isset($_REQUEST['idVincular']) && $_REQUEST['idVincular'] != '') && (isset($_REQUEST['id']) && $_REQUEST['id'] != '')){
        // print_r($_REQUEST);
        $correo = $_REQUEST['idVincular'];
        $pass = $_REQUEST['id'];
        $validate = new Validate();
        $extra = '/index';
        // print_r($validate);exit;
        if (!$validate->alfanumerico($correo))
           header("Location: https://datacenter-iepcdurango.mx/datacenter/index.php");     
        if (!$validate->alfanumerico($pass))
             header("Location: https://datacenter-iepcdurango.mx/datacenter/index.php");     

        $usuario = new Usuario();
        $objUser = $usuario->reLoginUser($correo,$pass);
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
            $_SESSION['con'] = $pass;

            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'];
            $nombre_formal = ucwords(mb_strtolower(utf8_encode($objUser->nombre_formal),'UTF-8'));

            $_SESSION['data_user'] = array(
                'nombre_formal' => $nombre_formal ,
                'nombre' =>  $nombre,
                'apellido' =>  $apelli,
                'correo' =>  $user,
                'privilegios' => $objUser->priv_sigi,
                'id' =>  $idx,
                'area' =>  $are,
                'titular' => $objUser->nombre_formal->titular
            );

            $time = time();
            $secret_key = 'Sdw1s9x8784455gtykifd335@';
            
            $token = array(
                'iat' => $time,
                'exp' => $time + (60*60),
                'data' => $_SESSION['data_user']
            );

            $_SESSION['token'] = JWT::encode($token, $secret_key);
            
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'ofcpartes/index';

            // print_r($uri);exit; 
            header("Location: http://$host$uri/$extra");

        }
        else{
           $extra = '/index';
            header("Location: https://datacenter-iepcdurango.mx/datacenter/index.php");

        }

        

    }
    else{
        $extra = '/index';
         header("Location: https://datacenter-iepcdurango.mx/datacenter/index.php");      
    }
  }


  public function IndexAction(){
    $area =  new Area();
    $ar = $area->ListarAreas();

    $usuario = new Usuario();
    $usr = $usuario->ListarUsuarios(array($_SESSION['data_user']['id']));

    $this->layout->renderVista("ofcPartes","ofcPartes",array('areas' => $ar,'usuarios' => $usr));
  }

  public function createReportParamAction(){
    // print_r($_POST);exit;
    // if(isset($_REQUEST['draw'])){
      try {
        // if (!$this->validate->numero($_REQUEST['draw']))
        //   throw new Exception("Accion no encontrada");
          $_SESSION['reporte_params'] = $_POST;
          echo json_encode(array('success' => true));
        exit;


        
      } catch (Exception $e) {
        echo json_encode(array('success' => false));
        exit;
        
      }

    //}
    // else{
    //   echo json_encode(array('success' => false));
    //   exit;
    // }

  }

  public function imprimirReporteAction(){
    try {
      $data = array();
      if(!isset($_SESSION['reporte_params']))
        throw new Exception("Error al Generar Reporte");

      $_POST = $_SESSION['reporte_params'];
      $tempPost = $_POST;
      // print_r($_POST['sol_entrantes']);exit;
      if(isset($_POST['sol_entrantes'])){
        $_POST = $_POST['sol_entrantes'];
        $data['sol_entrantes'] = $this->listarSolicitudesEntrantesAction(true);        
        // print_r($data['des_externo']);exit;
        // $data['des_externo']['filtro_area'] = ($tempPost['des_externo']['area'] != '') ? $data['des_externo']['data'][0]['area'] : '';
        $_POST = $tempPost;
      }
      if(isset($_POST['sol_salientes'])){
        $_POST = $_POST['sol_salientes'];
        $data['sol_salientes'] = $this->listarSolicitudesSalientesAction(true);        
        // print_r($data['des_externo']);exit;
        // $data['des_externo']['filtro_area'] = ($tempPost['des_externo']['area'] != '') ? $data['des_externo']['data'][0]['area'] : '';
        $_POST = $tempPost;
      }
      
      // print_r($data);exit;
       $ofc_doc = new OficioDocumento();

       foreach ($data as $key1 => $all) {
         foreach ($all['data'] as $key2 => $oficio) {

            $data[$key1]['data'][$key2]['fecha_respuesta'] = '';
            $data[$key1]['data'][$key2]['tiempo_respuesta'] = '';
            $data[$key1]['data'][$key2]['respondio'] = '';
              //Obtener la ultima persona que respondio el mensaje y el tiempo de respuesta
            if($oficio['estatus_final'] == 'Cerrado'){
             $idOfc= intval( substr($oficio['DT_RowId'], 4)); 
             $objOficioDoc = $ofc_doc->getRespuestas($idOfc,'LIMIT 1');

             if(!empty($objOficioDoc)){
               // print_r($objOficioDoc);exit;
               $datetime1 = new DateTime($oficio['fecha_recibido']);
               $datetime2 = new DateTime($objOficioDoc[0]->fecha_recibido);
               $interval = $datetime1->diff($datetime2);

               $data[$key1]['data'][$key2]['fecha_respuesta'] = $objOficioDoc[0]->fecha_recibido;
               $data[$key1]['data'][$key2]['tiempo_respuesta'] = $interval->format('%a días %h horas %i minutos');
               $data[$key1]['data'][$key2]['respondio'] = $objOficioDoc[0]->persona_responde.' de '.$objOficioDoc[0]->area;
              
             }

            }
         }
       }
       // print_r($data);
       // exit;

      // $_SESSION['reporte_params'] = array();

      $this->layout->renderVista("reportes","rep_lista_oficios",array('data' => $data));
      
    } catch (Exception $e) {
      //Aqui deberia mostrar error
      //echo json_encode(array('success' => false));
      exit;
      
    }

  }

  public function listarSolicitudesEntrantesAction($rep = false){



    $initPag = new InitPaginador();
    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    $group_by = ' GROUP BY id_oficio ';

    if($_SESSION['data_user']['privilegios'] == 2){
      $cond = " id_usuario_receptor = $id_usuario"; 

      if(isset($_POST['usuario']) && $_POST['usuario'] != ''){
        $id_usuario = intval($_POST['usuario']);
        $cond = " id_usuario_receptor = $id_usuario"; 
      }
    }else{
      $cond = " id_usuario_receptor = $id_usuario";      
    }

    //Solo mostrar solicitudes cuando se solicite reporte
    if($rep){
      if($cond != '')
        $cond= $cond." AND tipo_oficio = 'SOLICITUD'"; 
      else
        $cond= $cond." tipo_oficio = 'SOLICITUD'"; 
    }

    //Filtros
    if(isset($_POST['fecha_inicio']) && $_POST['fecha_inicio'] != '' && isset($_POST['fecha_fin']) && $_POST['fecha_fin'] != ''){
      //Filtrar por fecha
      $fecha_inicio = $_POST['fecha_inicio'];
      $fecha_fin = $_POST['fecha_fin'];
      if($cond != ''){
        $cond= $cond."  AND CAST(fecha_recibido AS DATE) BETWEEN '$fecha_inicio' AND '$fecha_fin'"; 
      }
      else{
        $cond= $cond." CAST(fecha_recibido AS DATE) BETWEEN '$fecha_inicio' AND '$fecha_fin'"; 
      }
    }
    //Filtrar por Tipo Oficio
    if(isset($_POST['tipo_oficio']) && $_POST['tipo_oficio'] != '' && $_POST['tipo_oficio'] != 'ALL'){
      $tipo_oficio = $_POST['tipo_oficio'];
      if($cond != ''){
        $cond= $cond."  AND tipo_oficio = '$tipo_oficio'"; 
      }
      else{
        $cond= $cond." tipo_oficio = '$tipo_oficio'"; 
      }
    }
    //Filtrar por estatus
    if(isset($_POST['estatus_final']) && $_POST['estatus_final'] != '' && $_POST['estatus_final'] != '3'){
      $estatus_final = $_POST['estatus_final'];
      if($cond != ''){
        $cond= $cond."  AND estatus_final = $estatus_final"; 
      }
      else{
        $cond= $cond." estatus_final = $estatus_final"; 
      }
    }
    //Filtrar por Area
    if(isset($_POST['area']) && $_POST['area'] != '' && intval($_POST['area']) > 0 ){
       $id_area = intval($_POST['area']);
      if($cond != ''){
       $cond = $cond . " AND id_area = $id_area";        
      }else{
       $cond = $cond . " id_area = $id_area";        
        
      }
    }

    // print_r($cond);exit;

    $table = 'sigi_vw_solicitudes_entrantes';
    $columns = array(
      array(
        'db' => 'id_oficio',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
          return 'row_'.$d;
        }
        ),
      array( 'db' => 'origen',  'dt' => 'origen' ),
      array( 'db' => 'destino',  'dt' => 'destino' ),
      array( 'db' => 'tipo_oficio',  'dt' => 'tipo_oficio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'emisor',   'dt' => 'emisor' ),
      array( 'db' => 'asunto_emisor',   'dt' => 'asunto_emisor' ),
      array( 'db' => 'id_area',   'dt' => 'id_area' ),
      array( 'db' => 'area',   'dt' => 'area' ),
      array( 'db' => 'estatus_inicial',   'dt' => 'estatus_inicial' ),
      array( 'db' => 'estatus_final',   'dt' => 'estatus_final' ),
      array( 'db' => 'fecha_recibido',  'dt' => 'fecha_recibido'),
      array( 'db' => 'fecha_visto',  'dt' => 'fecha_visto')
      );
    $primaryKey = 'id_oficio';

    return $initPag->construir($table,$columns,$primaryKey,$cond,$group_by,$rep);

  }

  public function listarSolicitudesSalientesAction($rep = false){


    $initPag = new InitPaginador();
    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    $group_by = ' GROUP BY id_oficio ';
    if($_SESSION['data_user']['privilegios'] == 2){
      $cond = " id_usuario_emisor = $id_usuario"; 

      if(isset($_POST['usuario']) && $_POST['usuario'] != ''){
        $id_usuario = intval($_POST['usuario']);
        $cond = " id_usuario_emisor = $id_usuario"; 
      }
    }else{
      $cond = " id_usuario_emisor = $id_usuario";      
    }

    //Solo mostrar solicitudes cuando se realice reporte
    if($rep){
      if($cond != '')
        $cond= $cond." AND tipo_oficio = 'SOLICITUD'"; 
      else
        $cond= $cond." tipo_oficio = 'SOLICITUD'"; 
    }


    //Filtros
    if(isset($_POST['fecha_inicio']) && $_POST['fecha_inicio'] != '' && isset($_POST['fecha_fin']) && $_POST['fecha_fin'] != ''){
      //Filtrar por fecha
      $fecha_inicio = $_POST['fecha_inicio'];
      $fecha_fin = $_POST['fecha_fin'];
      if($cond != ''){
        $cond= $cond."  AND CAST(fecha_recibido AS DATE) BETWEEN '$fecha_inicio' AND '$fecha_fin'"; 
      }
      else{
        $cond= $cond." CAST(fecha_recibido AS DATE) BETWEEN '$fecha_inicio' AND '$fecha_fin'"; 
      }
    }
    //Filtrar por estatus
    if(isset($_POST['estatus_final']) && $_POST['estatus_final'] != ''  && intval($_POST['estatus_final']) > 0){
      $estatus_final = $_POST['estatus_final'];
      if($cond != ''){
        $cond= $cond."  AND estatus_final = $estatus_final"; 
      }
      else{
        $cond= $cond." estatus_final = $estatus_final"; 
      }
    }

    //Filtrar por Tipo Oficio
    if(isset($_POST['tipo_oficio']) && $_POST['tipo_oficio'] != '' && $_POST['tipo_oficio'] != 'ALL'){
      $tipo_oficio = $_POST['tipo_oficio'];
      if($cond != ''){
        $cond= $cond."  AND tipo_oficio = '$tipo_oficio'"; 
      }
      else{
        $cond= $cond." tipo_oficio = '$tipo_oficio'"; 
      }
    }
    //Filtrar por Area
    if(isset($_POST['area']) && $_POST['area'] != '' && intval($_POST['area']) > 0 ){
       $id_area = intval($_POST['area']);
       $cond = $cond . " AND id_area = $id_area";
    }

    // print_r($cond);exit;

    $table = 'sigi_vw_solicitudes_salientes';
    $columns = array(
      array(
        'db' => 'id_oficio',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
          return 'row_'.$d;
        }
        ),
      array( 'db' => 'id_usuario_emisor',  'dt' => 'id_usuario_emisor' ),
      array( 'db' => 'origen',  'dt' => 'origen' ),
      array( 'db' => 'destino',  'dt' => 'destino' ),
      array( 'db' => 'tipo_oficio',  'dt' => 'tipo_oficio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'receptor',   'dt' => 'receptor' ),
      array( 'db' => 'asunto_receptor',   'dt' => 'asunto_receptor' ),
      array( 'db' => 'id_area',   'dt' => 'id_area' ),
      array( 'db' => 'estatus_inicial',   'dt' => 'estatus_inicial' ),
      array( 'db' => 'estatus_final',   'dt' => 'estatus_final' ),
      array( 'db' => 'fecha_recibido',  'dt' => 'fecha_recibido'),
      array( 'db' => 'fecha_visto',  'dt' => 'fecha_visto'),
      array( 'db' => 'respondido',  'dt' => 'respondido'),
      );
    $primaryKey = 'id_oficio';

    return $initPag->construir($table,$columns,$primaryKey,$cond,$group_by,$rep);

  }

  public function listarOficiosExternosVincularAction(){

    // $initPag = new InitPaginador();

    $initPag = new InitPaginador();

    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    //si eres un usuario receptor, buscar solo los mensajes que te corresponden
    //if($_SESSION['data_user']['privilegios'] == 3){
      // $cond = " sigi_vw_oficios_internos.id_usuario_receptor = $id_usuario OR sigi_vw_oficios_internos.id_usuario_emisor = $id_usuario GROUP BY id_oficio  ";
      $cond = " 
      sigi_vw_oficios_vincular.id_usuario_emisor = $id_usuario
      AND sigi_vw_oficios_vincular.estatus_final = 'Abierto'
      
      
      ";
      //Si eres directivo ademas de tus oficios, mostrar todos los demas oficios
      // if($_SESSION['data_user']['privilegios'] == 2){
      //   $cond = $cond." OR origen = 'Interno'";
      // }

      $group_by = ' GROUP BY id_oficio ';
    //}
    //Si eres el capturista de oficios, para la correcta visualizacion del paginador se agregar este group
    // else{
    //   $group_by = ' GROUP BY id_oficio ';
    // }

    $table = 'sigi_vw_oficios_vincular';
    $columns = array(
      array(
        'db' => 'id_oficio',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
          return 'row_'.$d;
        },
        'order' => 'desc'
        ),
      array( 'db' => 'origen',  'dt' => 'origen' ),
      array( 'db' => 'tipo_oficio',  'dt' => 'tipo_oficio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'id_usuario_emisor',   'dt' => 'id_usuario_emisor' ),
      array( 'db' => 'emisor',   'dt' => 'emisor' ),
      array( 'db' => 'id_usuario_receptor',   'dt' => 'id_usuario_receptor' ),
      array( 'db' => 'dependencia',   'dt' => 'dependencia' ),
      array( 'db' => 'asunto_emisor',   'dt' => 'asunto_emisor' ),
      array( 'db' => 'estatus_inicial',   'dt' => 'estatus_inicial' ),
      array( 'db' => 'estatus_final',   'dt' => 'estatus_final' ),
      array(
        'db'        => 'fecha_recibido',
        'dt'        => 'fecha_recibido',
        ),
      array( 'db' => 'fecha_visto',  'dt' => 'fecha_visto')
      );
    $primaryKey = 'id_oficio';

    $initPag->construir($table,$columns,$primaryKey,$cond,$group_by);

  }

  public function listarRespuestasRecibidasAction(){

    // $initPag = new InitPaginador();

    $initPag = new InitPaginador();

    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    //si eres un usuario receptor, buscar solo los mensajes que te corresponden
    if($_SESSION['data_user']['privilegios'] == 3){
      $cond = " sigi_vw_respuestas_recibidas.id_usuario_receptor = $id_usuario ";
    }
    //Si eres el capturista de oficios, para la correcta visualizacion del paginador se agregar este group
    else{
      $group_by = ' GROUP BY id_oficio ';
    }

    $table = 'sigi_vw_respuestas_recibidas';
    $columns = array(
      array(
        'db' => 'id_oficio',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
          return 'row_'.$d;
        },
        'order' => 'desc'
        ),
      array( 'db' => 'folio',   'dt' => 'folio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'id_usuario_emisor',   'dt' => 'id_usuario_emisor' ),
      array( 'db' => 'area',   'dt' => 'area' ),
      array( 'db' => 'persona_responde',   'dt' => 'persona_responde' ),
      array( 'db' => 'id_usuario_receptor',   'dt' => 'id_usuario_receptor' ),
      array( 'db' => 'asunto_emisor',   'dt' => 'asunto_emisor' ),
      array( 'db' => 'estatus_inicial',   'dt' => 'estatus_inicial' ),
      array(
        'db'        => 'fecha_recibido',
        'dt'        => 'fecha_recibido',
        ),
      array( 'db' => 'fecha_visto',  'dt' => 'fecha_visto')
      );
    $primaryKey = 'id_oficio';

    $initPag->construir($table,$columns,$primaryKey,$cond,$group_by);

  }



  public function addAction(){
    $usuario = new Usuario();
    $usr = $usuario->ListarUsuarios(array($_SESSION['data_user']['id']));
    $area =  new Area();
    $area_usuario = $usuario->getUsuarioArea($_SESSION['data_user']['id']);
    $ar = $area->ListarAreas();
    $privilegios = $_SESSION['data_user']['privilegios'];
        //require_once ("/../view/header.php");
        //require_once '/../view/ofcPartes/ofcPartesAdd.php';
    $this->layout->renderVista("ofcPartes","ofcPartesAdd",array('usuarios' => $usr, 'areas' => $ar,'privilegios' => $privilegios,'area_usuario'=>$area_usuario));

  }

  public function addExternoAction(){
   $usuario = new Usuario();
   $usr = $usuario->ListarUsuarios(array($_SESSION['data_user']['id']), " AND ar.abreviatura <>'UTOE'");
   $area =  new Area();
   $ar = $area->ListarAreas();
   $area_usuario = $usuario->getUsuarioArea($_SESSION['data_user']['id']);
   $privilegios = $_SESSION['data_user']['privilegios'];

        //require_once ("/../view/header.php");
        //require_once '/../view/ofcPartes/ofcPartesAdd.php';
   $this->layout->renderVista("ofcPartes","ofcPartesAddExterno",array('usuarios' => $usr, 'areas' => $ar,'privilegios' => $privilegios,'area_usuario'=>$area_usuario));

 }

  //Obteenr datos del oficio para la notificacion
  public function getOficioNotificacionAction(){

    if(isset($_REQUEST['id_oficio'])){
      try {
        if (!$this->validate->numero($_REQUEST['id_oficio']))
          throw new Exception("Accion no encontrada");

        $id_usuario = '';
        if($_SESSION['data_user']['privilegios'] == 3){
          $id_usuario = $_SESSION['data_user']['id'];
        }

        $id_oficio = $_REQUEST['id_oficio'];
        $oficio = new Oficio();
        $objOficio = $oficio->getOficio($id_oficio,$id_usuario);

        if(!empty($objOficio))
          echo json_encode(array('success' => true,'msg' => 'Se econtrro datos','data' => $objOficio));
        else
          echo json_encode(array('success' => false,'msg' => 'No se encontraron datos'));
        exit;


        
      } catch (Exception $e) {
        echo json_encode(array('success' => false,'msg' => 'Error al recuperar datos'));
        exit;
        
      }

    }
    else{
      echo json_encode(array('success' => false,'msg' => 'No se encontraron Datos'));
      exit;
    }
  }

  public function editAction(){

      if(isset($_REQUEST['id'])){
        //Buscar oficio
        try {
          if (!$this->validate->numero($_REQUEST['id']))
            throw new Exception("Accion no encontrada");

          // print_r($_REQUEST);exit;

          $id_oficio = $_REQUEST['id'];
          $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado
          $privilegios = $_SESSION['data_user']['privilegios'];

          //si eres un usuario receptor, buscar solo el oficio que te correponse
          if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2){
            $id_usuario = $_SESSION['data_user']['id'];
          }
          // print_r($id_oficio);
          // print_r($id_usuario);exit;
          $oficio = new Oficio();
          $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
          // print_r($objOficio);exit;
          //Si esta vacio verificar que el usuario este en la lista de usuarios a los que se les envio copia
          if(empty($objOficio) && $id_usuario != ''){
            $objOficioTemp = $oficio->getOficio($id_oficio);
            $objSolicitud = $oficio->buscaUsuarioEnSolicitud($objOficioTemp->parent_id,$id_usuario);
            if(empty($objSolicitud)){
              //Verificar por ultimo, que si tienes privilegios de titular ejecutivo
              // print_r($_SESSION);exit;
              if($_SESSION['data_user']['privilegios'] == 2 && intval($_SESSION['data_user']['titular']) == 1){
                $id_usuario = '';
                $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
                if(empty($objOficio)){
                  $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
                  header("Location: $this->GLOBAL_PATH/ofcpartes/index");
                  exit;       
                }

              }
              else{
                $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
                header("Location: $this->GLOBAL_PATH/ofcpartes/index");
                exit;              
              }
            }
            else{
              $objOficio = $objOficioTemp;
            }
          }

          // print_r($objOficio);exit;

          $usuario = new Usuario();
          $usr = array(); 

          $area =  new Area();
          $ar = $area->ListarAreas();
          $area_usuario = $usuario->getUsuarioArea($_SESSION['data_user']['id']);

          //Traer la lista de respuestas recibidas a este folio
          $ofc_doc =  new OficioDocumento();
          $arrRespuestas = $ofc_doc->getRespuestas($objOficio->id_oficio);

          // print_r($arrRespuestas);exit;
          //$area =  new Area();
          //$ar = $area->ListarAreas();
          $usuarios_ccp = array();

          $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
          $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);

          $arrUsrccp = array();
          //Si eres un usuario receptor cargar los usuarios que tambien recibieron el mensaje solo si eres el titular del mensaje, y solo el titular puede turnar a otros usuarios
          if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2 || $_SESSION['data_user']['privilegios'] == 1 ){
            if($objOficio->ccp == 0 ){
              //Obtener lista de usuarios a los que se les envio el mensaje
              $arrUsrccp = $usuario->ListarUsuariosCcp($objOficio->id_oficio);
              // print_r($arrUsrccp);exit;
              //crear arreglo de ids de usurios a los que se le envio el mensaje
              foreach ($arrUsrccp as $key => $value) {
                $usuarios_ccp[] = $value->id_usuario;
              }
              //añadir al arreglo de omitidos el usuario logeado
              $usuarios_ccp[] = $id_usuario;
              //en caso de ser un oficio interno quitar el usuario que lo emitio
              if($objOficio->origen == "INTERNO")
                $usuarios_ccp[] = $objOficio->id_usuario_emisor;

              //Quitar de la lista de usuarios los usuarios a los que se les haya enviado el mensaje incluido el usuario logeado y solo cargar si eres el usuario titular del mensaje
              if($objOficio->id_usuario_emisor != $id_usuario || $objOficio->id_usuario_emisor == $_SESSION['data_user']['id'])
                $usr = $usuario->ListarUsuarios($usuarios_ccp);

            }
            
          }
          //Si eres super su, traer todos los usuarios a los que se les envio el mensaje
          else{
            $arrUsrccp = $usuario->ListarUsuariosCcp($objOficio->id_oficio);


          }
          $this->layout->renderVista("ofcPartes","ofcPartesEdit",array('oficio' => $objOficio,'areas' => $ar,'area_usuario'=>$area_usuario, 'privilegios' => $privilegios,'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $arrUsrccp,'usuarios_turnar' => $usr, 'respuestas_recibidas' => $arrRespuestas));
          
        } catch (Exception $e) {

          $_SESSION['flash-message-error'] = $e->getMessage();
          header("Location: $this->GLOBAL_PATH/ofcpartes/index");
          exit;
          
        }

        

      }
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;
      }

    }

    public function viewAction(){

      if(isset($_REQUEST['id'])){
        //Buscar oficio
        try {
          if (!$this->validate->numero($_REQUEST['id']))
            throw new Exception("Accion no encontrada");

          // print_r($_REQUEST);exit;

          $id_oficio = $_REQUEST['id'];
          $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

          //si eres un usuario receptor, buscar solo el oficio que te correponse
          if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2){
            $id_usuario = $_SESSION['data_user']['id'];
          }
          // print_r($id_oficio);
          // print_r($id_usuario);exit;
          $oficio = new Oficio();
          $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
          //Marcar como visto cuando el oficio ya este vinculado
          if(!empty($objOficio) && $objOficio->vinculado){
            $objOficioDoc = new OficioDocumento();
            $objOficioDoc->setFechaVisto(date("Y-m-d H:i:s"));
            $objOficioDoc->setIdOficio($id_oficio);
            $objOficioDoc->setIdUsuario($_SESSION['data_user']['id']);
            $objOficioDoc->FechaVistoActualizar();

          }
          // print_r($objOficio);exit;
          //Si esta vacio verificar que el usuario este en la lista de usuarios a los que se les envio copia
          if(empty($objOficio) && $id_usuario != ''){
            $objOficioTemp = $oficio->getOficio($id_oficio);
            $objSolicitud = $oficio->buscaUsuarioEnSolicitud($objOficioTemp->parent_id,$id_usuario);
            if(empty($objSolicitud)){
              //Verificar por ultimo, que si tienes privilegios de titular ejecutivo
              // print_r($_SESSION);exit;
              if($_SESSION['data_user']['privilegios'] == 2 && intval($_SESSION['data_user']['titular']) == 1){
                $id_usuario = '';
                $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
                if(empty($objOficio)){
                  $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
                  header("Location: $this->GLOBAL_PATH/ofcpartes/index");
                  exit;       
                }

              }
              else{
                $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
                header("Location: $this->GLOBAL_PATH/ofcpartes/index");
                exit;              
              }
            }
            else{
              $objOficio = $objOficioTemp;
            }
          }

          // print_r($objOficio);exit;

          $usuario = new Usuario();
          $usr = array(); 

          //Obtener el total de oficios en revision que no sean alcances para evitar que respondan o reabran oficios
          $total_revision = $oficio->getTotalOfcRevision($id_oficio);
          // print_r($total_revision);exit;

          //Traer la lista de respuestas recibidas a este folio
          $ofc_doc =  new OficioDocumento();
          $arrRespuestas = $ofc_doc->getRespuestas($objOficio->id_oficio);

          // print_r($arrRespuestas);exit;
          //$area =  new Area();
          //$ar = $area->ListarAreas();
          $usuarios_ccp = array();

          $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
          $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);

          $arrUsrccp = array();
          //Si eres un usuario receptor cargar los usuarios que tambien recibieron el mensaje solo si eres el titular del mensaje, y solo el titular puede turnar a otros usuarios
          if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2 ||  $_SESSION['data_user']['privilegios'] == 1){
            if($objOficio->ccp == 0 ){
              //Obtener lista de usuarios a los que se les envio el mensaje
              $arrUsrccp = $usuario->ListarUsuariosCcp($objOficio->id_oficio);
              //crear arreglo de ids de usurios a los que se le envio el mensaje
              foreach ($arrUsrccp as $key => $value) {
                $usuarios_ccp[] = $value->id_usuario;
              }
              //añadir al arreglo de omitidos el usuario logeado
              $usuarios_ccp[] = $id_usuario;
              //en caso de ser un oficio interno quitar el usuario que lo emitio
              if($objOficio->origen == "INTERNO")
                $usuarios_ccp[] = $objOficio->id_usuario_emisor;

              //Quitar de la lista de usuarios los usuarios a los que se les haya enviado el mensaje incluido el usuario logeado y solo cargar si eres el usuario titular del mensaje
              // if($objOficio->id_usuario_emisor != $id_usuario)
              if($objOficio->id_usuario_emisor != $id_usuario || $objOficio->id_usuario_emisor == $_SESSION['data_user']['id'])
                $usr = $usuario->ListarUsuarios($usuarios_ccp);

            }
            
          }
          //Si eres super su, traer todos los usuarios a los que se les envio el mensaje
          else{
            $arrUsrccp = $usuario->ListarUsuariosCcp($objOficio->id_oficio);


          }
          // print_r($usr);exit;
          $this->layout->renderVista("ofcPartes","ofcPartesView",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $arrUsrccp,'usuarios_turnar' => $usr, 'respuestas_recibidas' => $arrRespuestas,'total_revision' => $total_revision->total_revision));
          
        } catch (Exception $e) {

          $_SESSION['flash-message-error'] = $e->getMessage();
          header("Location: $this->GLOBAL_PATH/ofcpartes/index");
          exit;
          
        }

        

      }
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;
      }

    }

    public function vincularAction(){


      if(isset($_REQUEST['id'])){
        //Buscar oficio

        // print_r($_REQUEST);exit;

        $id_oficio = $_REQUEST['id'];
        $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

        //si eres un usuario receptor, buscar solo el oficio que te correponse
        if($_SESSION['data_user']['privilegios'] == 3){
          $id_usuario = $_SESSION['data_user']['id'];
        }
        // print_r($id_oficio);
        // print_r($id_usuario);exit;
        $oficio = new Oficio();
        $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
        //Si esta vacio verificar que el usuario este en la lista de usuarios a los que se les envio copia
        if(empty($objOficio) && $id_usuario != ''){
          $objOficioTemp = $oficio->getOficio($id_oficio);
          $objSolicitud = $oficio->buscaUsuarioEnSolicitud($objOficioTemp->parent_id,$id_usuario);
          if(empty($objSolicitud)){
            $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
            header("Location: $this->GLOBAL_PATH/ofcpartes/index");
            exit;
          }
          else{
            $objOficio = $objOficioTemp;
          }
        }


        $usuario = new Usuario();
        $usr = array(); 

        // print_r($arrRespuestas);exit;
        //$area =  new Area();
        //$ar = $area->ListarAreas();
        $usuarios_ccp = array();

        $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
        $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);

        $arrUsrccp = array();
        
        $this->layout->renderVista("ofcPartes","ofcPartesVincular",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor));

      }
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;
      }

    }

    public function cancelAction(){
      if(isset($_POST['id_oficio'])){
        try {
          if (!$this->validate->numero($_POST['id_oficio']))
            throw new Exception("Accion no encontrada");

          $objOficioDoc =  new OficioDocumento();
          $objOficioDoc->setEstatusFinal('Cancelado');
          $objOficioDoc->setIdOficio($_POST['id_oficio']);
          $objOficioDoc->setUpdatedBy($_SESSION['data_user']['id']); //Cambair por el usuario logeado
          $objOficioDoc->CancelarSolicitud();

          //$_SESSION['flash-message-success'] = 'Solicitud Cancelada';
          //header("Location: $this->GLOBAL_PATH/ofcpartes/index");
          echo json_encode(array("success"=>true));
          exit;
          
        } catch (Exception $e) {

          //$_SESSION['flash-message-error'] = 'Error al cambiar el estatus';
          //header("Location: $this->GLOBAL_PATH/ofcpartes/index");
          echo json_encode(array("success"=>false,"msg_error" => 'Error al cambiar el estatus'));
          exit;
          
        }

      }
      else{
        echo json_encode(array("success"=>false,"msg_error" => 'Error al recuperar información'));
        exit;
      }

    }



    public function responseAction(){


      if(isset($_REQUEST['id'])){
          try {
            if (!$this->validate->numero($_REQUEST['id']))
                throw new Exception("Accion no encontrada");

            $id_oficio = $_REQUEST['id'];
            $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

            //si eres un usuario receptor, buscar solo el oficio que te correponse
            //if($_SESSION['data_user']['privilegios'] == 3){
              $id_usuario = $_SESSION['data_user']['id'];
            //}
            // else{
            //   header("Location: $this->GLOBAL_PATH/ofcpartes/index");
            //   exit;
            // }

            $oficio = new Oficio();
            $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
            if(empty($objOficio)){
              $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
              header("Location: $this->GLOBAL_PATH/ofcpartes/index");
              exit;
            }

            $privilegios = $_SESSION['data_user']['privilegios'];

            // print_r($objOficio);exit;

            $usuario = new Usuario();
            $usr = array(); 
            $area =  new Area();
            $ar = $area->ListarAreas();
            $usuarios_ccp = array();

            $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
            $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);

            $arrUsrccp = array();
            //Si eres un usuario receptor cargar los usuarios que tambien recibieron el mensaje solo si eres el titular del mensaje, y solo el titular puede turnar a otros usuarios
            //if($_SESSION['data_user']['privilegios'] == 3){
              if($objOficio->ccp == 0){

                //en caso de ser un oficio interno quitar el usuario que lo emitio
                if($objOficio->origen == "INTERNO")
                  $usuarios_ccp[] = $objOficio->id_usuario_emisor;
                //quitar de la lista de usuarios el usuario logeado
                $usuarios_ccp[] = $id_usuario;


                $usr = $usuario->ListarUsuarios($usuarios_ccp);

              }
              
            //}
            $this->layout->renderVista("ofcPartes","ofcPartesResponse",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $usr, 'privilegios' => $privilegios));

            
          } catch (Exception $e) {

            $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
            header("Location: $this->GLOBAL_PATH/ofcpartes/index");
            exit;
            
          }

        
      }else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;

      }

    }

    public function oficioDescartarAction(){


      if(isset($_REQUEST['id'])){
          try {
            if (!$this->validate->numero($_REQUEST['id']))
                throw new Exception("Accion no encontrada");

            $id_oficio = $_REQUEST['id'];
            $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

            //si eres un usuario receptor, buscar solo el oficio que te correponse
            //if($_SESSION['data_user']['privilegios'] == 3){
              $id_usuario = $_SESSION['data_user']['id'];
            //}
            // else{
            //   header("Location: $this->GLOBAL_PATH/ofcpartes/index");
            //   exit;
            // }

            $oficio = new Oficio();
            $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
            if(empty($objOficio)){
              $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
              header("Location: $this->GLOBAL_PATH/ofcpartes/index");
              exit;
            }

            $privilegios = $_SESSION['data_user']['privilegios'];

            // print_r($objOficio);exit;

            $usuario = new Usuario();
            $usr = array(); 
            $area =  new Area();
            $ar = $area->ListarAreas();
            $usuarios_ccp = array();

            $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
            $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);

            $arrUsrccp = array();
            //Si eres un usuario receptor cargar los usuarios que tambien recibieron el mensaje solo si eres el titular del mensaje, y solo el titular puede turnar a otros usuarios
            //if($_SESSION['data_user']['privilegios'] == 3){
              if($objOficio->ccp == 0){

                //en caso de ser un oficio interno quitar el usuario que lo emitio
                if($objOficio->origen == "INTERNO")
                  $usuarios_ccp[] = $objOficio->id_usuario_emisor;
                //quitar de la lista de usuarios el usuario logeado
                $usuarios_ccp[] = $id_usuario;


                $usr = $usuario->ListarUsuarios($usuarios_ccp);

              }
              
            //}
            $this->layout->renderVista("ofcPartes","ofcPartesOficioDescartar",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $usr, 'privilegios' => $privilegios));

            
          } catch (Exception $e) {

            $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
            header("Location: $this->GLOBAL_PATH/ofcpartes/index");
            exit;
            
          }

        
      }else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;

      }

    }

    public function anexarAction(){

      
      if(isset($_REQUEST['id'])){
          try {
            if (!$this->validate->numero($_REQUEST['id']))
                throw new Exception("Accion no encontrada");

            $id_oficio = $_REQUEST['id'];
            $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

            //si eres un usuario receptor, buscar solo el oficio que te correponse
            //if($_SESSION['data_user']['privilegios'] == 3){
              $id_usuario = $_SESSION['data_user']['id'];
            //}
            // else{
            //   header("Location: $this->GLOBAL_PATH/ofcpartes/index");
            //   exit;
            // }

            $oficio = new Oficio();
            $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
            if(empty($objOficio)){
              $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
              header("Location: $this->GLOBAL_PATH/ofcpartes/index");
              exit;
            }

            $privilegios = $_SESSION['data_user']['privilegios'];

            // print_r($objOficio);exit;

            $usuario = new Usuario();
            $usr = array(); 
            $area =  new Area();
            $ar = $area->ListarAreas();
            $usuarios_ccp = array();

            $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
            $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);

            $arrUsrccp = array();
            //Si eres un usuario receptor cargar los usuarios que tambien recibieron el mensaje solo si eres el titular del mensaje, y solo el titular puede turnar a otros usuarios
            //if($_SESSION['data_user']['privilegios'] == 3){
              if($objOficio->ccp == 0){

                //en caso de ser un oficio interno quitar el usuario que lo emitio
                if($objOficio->origen == "INTERNO")
                  $usuarios_ccp[] = $objOficio->id_usuario_emisor;
                //quitar de la lista de usuarios el usuario logeado
                $usuarios_ccp[] = $id_usuario;


                $usr = $usuario->ListarUsuarios($usuarios_ccp);

              }
              
            //}
            $this->layout->renderVista("ofcPartes","ofcPartesAnexar",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $usr, 'privilegios' => $privilegios));

            
          } catch (Exception $e) {

            $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
            header("Location: $this->GLOBAL_PATH/ofcpartes/index");
            exit;
            
          }

        
      }else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;

      }

    }

    public function viewFileAction(){
      // print_r($_REQUEST);exit;
      if(isset($_REQUEST['id']) && $_REQUEST['id'] != ""){
        try {
          if (!$this->validate->numero($_REQUEST['id']) || !$this->validate->numero($_REQUEST['idVincular']))
              throw new Exception("Accion no encontrada");
          $documento = new Documento();
          $objDoc = $documento->getDocumento($_REQUEST['idVincular']);

          // print_r($_REQUEST);exit;

          $objOficioDoc = new OficioDocumento();
          $objOficioDoc->setFechaVisto(date("Y-m-d H:i:s"));
          $objOficioDoc->setIdDocumentos($_REQUEST['idVincular']);
          $objOficioDoc->setIdUsuario($_SESSION['data_user']['id']);
          $objOficioDoc->FechaVistoActualizar();

          //Buscar el oficio al que pertenece el docmuento y si es un externo y no requiere responder cambiar estatus global a cerrado
          $oficio = new oficio();
          $objOficio = $oficio->getOficio($_REQUEST['id'],$_SESSION['data_user']['id']);
          // print_r($objOficio);exit;
          if(!empty($objOficio)){
            if(!$objOficio->respuesta ){

             $objOficioDoc->setEstatusFinal('Cerrado');
             $objOficioDoc->setIdOficio($objOficio->id_oficio);
             $objOficioDoc->setIdUsuario($_SESSION['data_user']['id']);
               $objOficioDoc->setUpdatedBy($_SESSION['data_user']['id']); //Cambair por el usuario logeado
               $objOficioDoc->ActualizarEstatusFinalByUsr();

             }
           }

          // print_r($objDoc);exit;
           if(!empty($objDoc)){

            $dir = $objDoc->ruta; // trailing slash is important
            $file = $dir . $objDoc->nombre . ".pdf";          
            if (file_exists($file))
            {
              header('Content-type: application/pdf');
              header('Content-Disposition: inline; filename='.basename($file));
              header('Content-Transfer-Encoding: binary');
              header('Content-Length: ' . filesize($file));
              header('Accept-Ranges: bytes');

              @readfile($file);
            }
          }
          else{
            throw new Exception("No se encontro archivo");
          }
          
        } catch (Exception $e) {
          $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
          header("Location: $this->GLOBAL_PATH/ofcpartes/index");
          exit;
          
        }
         
      }        
      
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;
      }

    }
    public function downloadFileAction(){
      // print_r($_REQUEST['id']);
      if(isset($_REQUEST['id']) && $_REQUEST['id'] != ""){
        try {
          if (!$this->validate->numero($_REQUEST['id']) )
              throw new Exception("Accion no encontrada");
          $documento = new Documento();
          $objDoc = $documento->getDocumento($_REQUEST['id']);
          // print_r($objDoc);exit;
          if(!empty($objDoc)){

            $dir = $objDoc->ruta; // trailing slash is important
            $file = $dir . $objDoc->nombre . ".pdf";          
            if (file_exists($file))
            {
              header('Content-Description: File Transfer');
              header('Content-Type: application/pdf');
              header('Content-Disposition: attachment; filename='.basename($file));
              header('Expires: 0');
              header('Cache-Control: must-revalidate');
              header('Pragma: public');
              header('Content-Length: ' . filesize($file));
              ob_clean();
              flush();
              readfile($file);
              exit;
            }
          } 
          
        } catch (Exception $e) {
          $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
          header("Location: $this->GLOBAL_PATH/ofcpartes/index");
          exit;
          
        }
      }        
      
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");
        exit;
      }

    }

    public function buscadorInstitucionAction(){


      if(isset($_REQUEST['term']) && $_REQUEST['term'] != ""){
        try {
          if (!$this->validate->cadena($_REQUEST['term']) )
              throw new Exception("Accion no encontrada");

          $oficio = new Oficio();
          $arrClave = $oficio->busquedaAuto($_REQUEST['term'],'institucion');
          $arrDatos = array();

          foreach ($arrClave as $key => $value) {

            $arrDatos[] = array(
              'label' => $value->institucion_emisor,
              'value' => $value->institucion_emisor,
              'nombre_emisor' => $value->nombre_emisor,
              'cargo' => $value->cargo
              );
          }

          echo json_encode($arrDatos);
          
        } catch (Exception $e) {
          echo json_encode(array());
          
        }
        
      }       
    }

    public function buscadorEmisorAction(){


      if(isset($_REQUEST['term']) && $_REQUEST['term'] != ""){
        try {
          if (!$this->validate->cadena($_REQUEST['term']) )
              throw new Exception("Accion no encontrada");
          $oficio = new Oficio();
          $arrClave = $oficio->busquedaAuto($_REQUEST['term'],'emisor');
          $arrDatos = array();

          foreach ($arrClave as $key => $value) {

            $arrDatos[] = array(
              'label' => $value->nombre_emisor,
              'value' => $value->nombre_emisor,
              'institucion_emisor' => $value->institucion_emisor,
              'cargo' => $value->cargo
              );
          }


          echo json_encode($arrDatos);
          
        } catch (Exception $e) {
          echo json_encode(array());
        }

        
      }       
    }

    public function buscadorCargoAction(){
      // print_r($_REQUEST);

      if(isset($_REQUEST['term']) && $_REQUEST['term'] != ""){
        try {
          if (!$this->validate->cadena($_REQUEST['term']) )
              throw new Exception("Accion no encontrada");
          $oficio = new Oficio();
          $arrClave = $oficio->busquedaAuto($_REQUEST['term'],'cargo');
          $arrDatos = array();

          foreach ($arrClave as $key => $value) {

            $arrDatos[] = array(
              'label' => $value->cargo,
              'value' => $value->cargo,
              'nombre_emisor' => $value->nombre_emisor,
              'institucion_emisor' => $value->institucion_emisor,
              );
          }


          echo json_encode($arrDatos);
          
        } catch (Exception $e) {
          echo json_encode(array());
        }
        
      }       
    }

    public function buscarUsuarioAction(){

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['id_area']) && $_POST['id_area'] != ""){
          $usuario = new Usuario();
          $usr = $usuario->buscarUsuario($_POST['id_area']);

          if(!empty($usr)){

            $usr[0]->nombre_formal = ucwords(mb_strtolower($usr[0]->nombre_formal,'UTF-8')) ;
            echo json_encode(array('success' => true,'data' => $usr));
            // print_r($usr->correo);exit;
          }
          else{
            echo json_encode(array('success' => false,'msg' => 'No se encontraron usuarios'));
          }

        }       
      }
      else{
        echo json_encode(array('success' => false,'msg' => 'Error al procesar'));
      }
      //header('Content-Type: application/json');

      // exit;
    }

    public function buscarNumOficioAction(){

      try {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST['folio_iepc']) && $_POST['folio_iepc'] != ""){
            if (!$this->validate->cadena($_REQUEST['folio_iepc']) )
              throw new Exception("Accion no encontrada");
            $ofc = new Oficio();
            $num_ofc = $ofc->buscarNumOficio($_POST['folio_iepc']);

            if(empty($num_ofc)){

              echo json_encode(array('success' => true,'opc' => 1,'msg' => 'Número de oficio válido'));
              // print_r($usr->correo);exit;
            }
            else{
              echo json_encode(array('success' => true,'opc' => 2,'msg' => 'Número de oficio ya registrado'));
            }

          }
          else{
            echo json_encode(array('success' => false,'msg' => 'Error al procesar información'));
          }       
        }
        else{
          echo json_encode(array('success' => false,'msg' => 'Error al procesar información'));
        }
        
      } catch (Exception $e) {
        echo json_encode(array('success' => false,'msg' => 'Error al procesar información'));
      }
    }

    public function TurnarAction(){
      // print_r($_POST);exit;
      try {
        if( !isset($_POST['check']) && empty($_POST['check']) ){
          throw new Exception('No se ha seleccionado ningun usuario.');
        }
        else
        {
          $success = false;
          $usr_notificar = array();
          $id_usuario = $_SESSION['data_user']['id'];

          $ofc = new Oficio();
          $usr = new Usuario();

        //Buscar el oficio original y obtener sus datos
          $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);
          $id_oficio = $_POST["id_oficio"];
        // print_r($objOficio);exit;


         //Guardar Registro del oficio con documento
          $ofc_doc = new OficioDocumento();

          $ofc_doc->setIdOficio($objOficio->id_oficio);    
          $ofc_doc->setParentId(null);    
          $ofc_doc->setIdDocumentos($objOficio->id_documento);
          $ofc_doc->setFechaVisto('');  
          $ofc_doc->setEstatusInicial($objOficio->estatus_inicial);
          $ofc_doc->setEstatusFinal($objOficio->estatus_final);
         $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
         $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado

         //Enviar copia solo si se selecciono de la lista de usuarios
         $arr_ccp = empty($_POST['check']) ? array() : explode(",",$_POST['check']);
         if(!empty($arr_ccp)){
           foreach ($arr_ccp as $ids) {
             //Hacer el guardado por id;
            $ofc_doc->setIdUsuario($ids);   
            $ofc_doc->setCcp(1); 
            $ofc_doc->RegistrarOficioDocumento();
            array_push($usr_notificar, $ids);
          }            
        }
        $success = true;
        $_SESSION['flash-message-success'] = 'Datos guardados correctamente';
        $data = array();

        //Armar arreglo de datos para los usuarios que se les notificara el oficio
        if(!empty($usr_notificar) && $objOficio->estatus_final != "Revisión"){
          $objUsr = $usr->getUsuarioArea($_SESSION['data_user']['id']);

          $origen = $objOficio->origen;
          $destino = $objOficio->destino;

          $data = array('id_oficio' => $id_oficio,'nombre_usuario' => ucwords(mb_strtolower($objUsr->nombre_formal,'UTF-8')).' de '.$objUsr->area, 'asunto' => $objOficio->asunto_emisor, 'origen'=> $origen, 'destino' => $destino,'ids_usuario_receptor' => $usr_notificar);        
        }

        // header("Content-type:application/json");
        echo json_encode(array("success"=>$success,"notificacion" => $data));
        exit;        

      }

    } catch (Exception $e) {
      $_SESSION['flash-message-error'] = $e->getMessage();
      echo json_encode(array("success"=>false));
      exit;
    }

  
}
  //Se hace el proceso de vincular un oficio recibo a uno ya elaborado anteriormente por el usuario
  public function guardarVinculacionAction(){
    try {
      if(isset($_REQUEST['idVincular']) && $_REQUEST['idVincular'] != "" && isset($_REQUEST['id']) && $_REQUEST['id'] != "" && $this->validate->numero($_REQUEST['idVincular']) && $this->validate->numero($_REQUEST['id'])){
        // print_r($_REQUEST);
        // print_r("<br><br>");

        //Cambiar las propiedades de la solicitud a vincular
        $ofc = new Oficio();
        $ofc_doc =  new OficioDocumento();
        $id_usuario = $_SESSION['data_user']['id'];
        $objOficioSolicitud = $ofc->getOficio($_REQUEST['id'],$id_usuario); //solicitud original
        $objOficioVincular = $ofc->getOficio($_REQUEST['idVincular'],$id_usuario);

        // print_r($objOficioSolicitud);
        // print_r("<br><br>");
        // print_r($objOficioVincular);
        // exit;


        
        //Modificar datos del oficio que sera vinculado
        $ofc->_setOrigen($objOficioVincular->origen);
        $ofc->setTipoOficio("RESPUESTA");
        $ofc->setFolio($objOficioSolicitud->folio);//hAY QUE SACAR FOLIO DEL OFICIO ORIGINAL
        $ofc->setFolioInstitucion("S/N"); //Folio de institucion cambiar
        $ofc->_setIdUsuarioEmisor($objOficioVincular->id_usuario_emisor); //VERIFICAR SI ES POSIBLE
        $ofc->_setRespuesta(1); //revisar si es posible reabrir el oficio
        $ofc->setRespondido(1); //Marcar que el oficio fue respondido, para identificar que la solicitud fue convertida a respuesta
        $ofc->setDestino('INTERNO') ; 
        $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
        $ofc->vincularOficio($_REQUEST['idVincular']); //Actualizar datos del oficio

        //Modificar datos del oficio con documentos
        $ofc_doc->setParentId($_REQUEST['id']);    
        $ofc_doc->setEstatusInicial(2); //Estatus para el tramite que corresponda
        $ofc_doc->setEstatusFinal(1); //Estatus cerrado
        $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado 
        $ofc_doc->vincularOficioDocumento($_REQUEST['idVincular']);

        //Cambiar el estatus de la solicitud original a cerrado y marcar como respondido
        //marcar como respondido
        $ofc->_setId($objOficioSolicitud->id_oficio);
        $ofc->setRespondido(1);
        $ofc->marcarRespuesta();

        //cambiar el estatus final 
        if($objOficioSolicitud->estatus_final == 'Cerrado')
        $ofc_doc->setEstatusFinal('Abierto');
        else
        $ofc_doc->setEstatusFinal('Cerrado');


        $ofc_doc->setIdOficio($objOficioSolicitud->id_oficio);
        $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
        $ofc_doc->ActualizarEstatusFinal();

        $_SESSION['flash-message-success'] = 'Datos guardados correctamente';
        header("Location: $this->GLOBAL_PATH/ofcpartes/index");

        
        
        

      }
      else{
        throw new Exception("Error al guardar información");
      }
      
    } catch (Exception $e) {

      $_SESSION['flash-message-error'] = 'Error al guardar la información';
      header("Location: $this->GLOBAL_PATH/ofcpartes/index");
      
    }
  }
  public function EnviarSolicitudAction(){
      // print_r($_POST);
       // exit;
    try {
      //Obtener el oficio original
      if (!$this->validate->numero($_POST['id_oficio']))
              throw new Exception("Error al validar Datos");

      $success = false;
      $usr_notificar = array();
      $ofcOriginalRes = array();
      $oficio = new Oficio();
      $objOficio = $oficio->getOficio($_POST['id_oficio']);  
      $enviar_alcance = true;  
      $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado
      $id_oficio = $_POST['id_oficio'];
      $msgEstatus = "";

      //Guardar oficio

      $ofc = new Oficio();

      if($objOficio->tipo_oficio == "RESPUESTA"){
        $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);

        //Si es una solicitud el objoficio y no ha sido responido marcar como responido para evitar que respondan la respuesta
        if($ofcOriginalRes->tipo_oficio == "SOLICITUD" && !$ofcOriginalRes->respondido)
        $ofc->setRespondido(1);
        //Si es una solicitud el objoficio y ya fue respondida marcar como no respondido para que el receptor pueda responder la respuesta de la respuesta
        elseif($ofcOriginalRes->tipo_oficio == "SOLICITUD" && $ofcOriginalRes->respondido)
        $ofc->setRespondido(0);
        //si es una respuesta el objfocio marcar como respondido para terminar de cerrar el oficio y evitar que respondan sin reabirl el oficio
        else
        $ofc->setRespondido(1);

        $ofc->_setUpdatedBy($id_usuario);

        if(!$ofc->UpdateOficioEnviar($id_oficio))
          throw new Exception("Error al actualizar el oficio");  
      }

      $ofc_doc = new OficioDocumento();
      array_push($usr_notificar, $objOficio->id_usuario_receptor); //Asingar al arrreglo de notificaciones el id de usuario receptor
      if($objOficio->tipo_oficio == "ALCANCE"){
        $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);
        if($ofcOriginalRes->estatus_final == "Revision"){
          $enviar_alcance = false;
          $msgEstatus = "NO se puede ENVIAR un Alcance de una Solicitud o Respuesta que este en estatus Revisión";
          $ofc_doc->setEstatusFinal(4);
        }
        else{
          $ofc_doc->setEstatusFinal(1);
        }
      }
      elseif($objOficio->tipo_oficio == "RESPUESTA"){
        $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);
        if($ofcOriginalRes->estatus_final == 'Cerrado')
          $ofc_doc->setEstatusFinal(2);
        else
          $ofc_doc->setEstatusFinal(1);

      }else{
        $ofc_doc->setEstatusFinal(2); //<<<<<<<<<<<<<<<verificar que si es guardar o enviar 
      }
      $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
             
      if(!$ofc_doc->ActualizarOficioDocEnviar($objOficio->id_usuario_receptor,$id_oficio,0))
        throw new Exception("Error al Actualizar oficio_documento");  

      //Se debe validar que los usuarios que ya tienen copia se camvie el estatus a abierto y añadirlos al arreglo de notificaciones
      $obj_usr_not = array();
      $usr = new Usuario();
      if($objOficio->tipo_oficio == "RESPUESTA"){
        //Obtener oficio original
        // $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);

        // print_r($ofcOriginalRes);exit();
        if($ofcOriginalRes->tipo_oficio == 'SOLICITUD'){

            //Si es solicitud marcarlo como respondido y cambiar estatus global a cerrado
            //marcar como respondido
            $ofc->_setId($ofcOriginalRes->id_oficio);
            $ofc->setRespondido(1);
            $ofc->marcarRespuesta();

            //cambiar el estatus final 
            if($ofcOriginalRes->estatus_final == 'Cerrado')
            $ofc_doc->setEstatusFinal('Abierto');
            else
            $ofc_doc->setEstatusFinal('Cerrado');


            $ofc_doc->setIdOficio($ofcOriginalRes->id_oficio);
            $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
            $ofc_doc->CambiarEstatusSolicitud();



            $obj_usr_not = $ofc_doc->getUsuariosEnDocumentos($_POST['id_oficio'],$id_usuario);
        }
        else{
            //Sie es la respuesta de una respuesta, marcar la respuesta recibida como respondido y cambiar el estatus de la solicitud principal
            $ofc->_setId($objOficio->flag_id);
            $ofc->setRespondido(1);
            $ofc->marcarRespuesta();

            //Usario el oficio original
            $arr = $ofc_doc->getOficioDocumento($ofcOriginalRes->parent_id);

            //cambiar el estatus final 
            if($arr->estatus_final == 'Cerrado')
             $ofc_doc->setEstatusFinal('Abierto');
            else
             $ofc_doc->setEstatusFinal('Cerrado');

            $ofc_doc->setIdOficio($arr->id_oficio);
            $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
            $ofc_doc->ActualizarEstatusFinal();

            $obj_usr_not = $ofc_doc->getUsuariosEnDocumentos($arr->id_oficio,$_SESSION['data_user']['id']);
        }

      }
      elseif($objOficio->tipo_oficio == "ALCANCE"){
        if(!$enviar_alcance){
          $success = true;
          echo json_encode(array("success"=>$success,"notificacion" => array(),"msgEstatus" => $msgEstatus));
          exit;          
        }

      }
      else{
        //cAMBIAR el estatus de todas las solicitudes en revision
        $arrUsrccp = $usr->ListarUsuariosCcp($objOficio->id_oficio);
        if(!empty($arrUsrccp)){
          foreach ($arrUsrccp as $usuario) {
             $ofc_doc->enviarUsuarios($usuario->id_usuario,$objOficio->id_oficio);
             if(!in_array($usuario->id_usuario, $usr_notificar))
              array_push($usr_notificar, $usuario->id_usuario);          
          }

        }
        //Cambiar el estatus de todas los alcances a abierto hechos durante la revision de la SOLICITUD
        //$ofc_doc->enviarAlcances($objOficio->id_oficio);

      }

      //Obtener Lista de usuarios que recibiran copia para notificarles
      $arrUsrccp = $usr->ListarUsuariosCcp($objOficio->id_oficio);
      if(!empty($arrUsrccp)){
        foreach ($arrUsrccp as $usuario) {
            if($objOficio->id_usuario_receptor != $usuario->id_usuario)
              array_push($usr_notificar, $usuario->id_usuario);          
        }

      }

      $success = true;
      // $_SESSION['flash-message-success'] = 'Datos guardados correctamente';
      $data = array();

      if(!empty($obj_usr_not)){
        foreach ($obj_usr_not as $value) {
          if(!in_array($value->id_usuario,$usr_notificar))
            array_push($usr_notificar,$value->id_usuario);
        }        
      }

      //Armar arreglo de datos para los usuarios que se les notificara el oficio
      
      $objUsr = $usr->getUsuarioArea($id_usuario);

      $origen = $objOficio->origen;
      $destino = $objOficio->destino;

      $data = array('id_oficio' => $id_oficio,'nombre_usuario' => ucwords(mb_strtolower($objUsr->nombre_formal,'UTF-8')).' de '.$objUsr->area, 'asunto' => $objOficio->asunto_emisor, 'origen'=> $origen, 'destino' => $destino,'ids_usuario_receptor' => $usr_notificar);        
      


      echo json_encode(array("success"=>$success,"notificacion" => $data,"msgEstatus" => $msgEstatus));
      exit;
    } catch (Exception $e) {
        //Trabajar en un sistema de manejo de errores
      $_SESSION['flash-message-error'] = $e->getMessage();
      echo json_encode(array("success"=>false));
      exit;
    //header('Location: sigi.php?c=OfcPartes&a=add');
    }

  }

  public function guardarEdicionAction(){
    // print_r($_FILES);
      // print_r($_POST);
       // exit;
    try {
      //Obtener el oficio original
      if (!$this->validate->numero($_POST['id_oficio']) || !$this->validate->numero($_POST['id_documento']))
              throw new Exception("Error al validar Datos");

      $enviar = $_POST['enviar'];
      $success = false;
      $usr_notificar = array();
      $ofcOriginalRes = array();
      $oficio = new Oficio();
      $objOficio = $oficio->getOficio($_POST['id_oficio']);
      $respuesta = isset($_POST['respuesta']) && $_POST['respuesta'] != '' ? $_POST['respuesta'] : $objOficio->respuesta;
      $msgEstatus = "";
      // print_r($objOficio);exit;

      $cambio_area = false;
      if ($objOficio->destino =="EXTERNO") {
        $cambio_area = false;
      }
      elseif($objOficio->id_usuario_receptor != $_POST['id_usuario_receptor'])
        $cambio_area = true;

      $documento = new Documento();
      $objDoc = $documento->getDocumento($_POST['id_documento']);
      $enviar_alcance = true;

      $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado
      $id_oficio = $_POST['id_oficio'];
      $id_documento = $_POST['id_documento']; 

      //Proceder a guardar el arhivo si se selecciono alguno
      if($_FILES['archivo']['name'] != ''){
        $nombre = basename( $_FILES['archivo']['name']);
        $nombre_tmp = $_FILES['archivo']['tmp_name'];
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];

        $ext_permitidas = array('pdf');
        $partes_nombre = explode('.', $nombre);
        $extension = end( $partes_nombre );
        $ext_correcta = in_array($extension, $ext_permitidas);


        $tipo_correcto = preg_match('/^application\/(pdf)$/', $tipo);

        $newfilename = $objDoc->nombre.".pdf";

        if( $ext_correcta && $tipo_correcto ){//&& $tamano <= $limite ){
          if(move_uploaded_file($nombre_tmp,$objDoc->ruta.'/'.$newfilename)){
          }
          else{
            throw new Exception('Archivo no valido');
          }
        }
        else{
               //Archivo no valido
          throw new Exception('Archivo no valido');
        }
      }
       //Guardar oficio

      $ofc = new Oficio();

      $ofc->setFolioInstitucion( isset($_POST['folio_iepc']) && $_POST['folio_iepc'] != '' && strlen($_POST['folio_iepc']) >= 4   ? $_POST['folio_iepc']: 'S/N');
      $ofc->_setNombreEmisor( isset($_POST["nombre_emisor"]) ? $_POST["nombre_emisor"] : "");
      $ofc->_setInstitucionEmisor( isset( $_POST["institucion_emisor"]) ? $_POST["institucion_emisor"]: "" );
      $ofc->_setCargo( isset($_POST["cargo_emisor"]) ? $_POST["cargo_emisor"]: "");
      $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
      $ofc->_setRespuesta($respuesta);
      if($_POST['select_origen'] == 1){
        $ofc->setFechaRecepcion('');
        $ofc->setHoraRecepcion('');
      }
      else{
        $hora_recepcion = str_replace(" ", "", $_POST['hora_recepcion']);
        $hora_recepcion = str_replace("AM", " am", $hora_recepcion);
        $hora_recepcion = str_replace("PM", " pm", $hora_recepcion);
        $hora_recepcion = date("H:i:s", strtotime($hora_recepcion));
        $ofc->setFechaRecepcion($_POST['fecha_recepcion']);
        $ofc->setHoraRecepcion($hora_recepcion);                               
      }
      $ofc->setComentarios(isset($_POST['comentarios']) && $_POST['comentarios'] != '' ? $_POST['comentarios'] : '');

      $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
      if($enviar && $objOficio->tipo_oficio == "RESPUESTA"){
        $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);

        //Si es una solicitud el objoficio y no ha sido responido marcar como responido para evitar que respondan la respuesta
        if($ofcOriginalRes->tipo_oficio == "SOLICITUD" && !$ofcOriginalRes->respondido)
        $ofc->setRespondido(1);
        //Si es una solicitud el objoficio y ya fue respondida marcar como no respondido para que el receptor pueda responder la respuesta de la respuesta
        elseif($ofcOriginalRes->tipo_oficio == "SOLICITUD" && $ofcOriginalRes->respondido)
        $ofc->setRespondido(0);
        //si es una respuesta el objfocio marcar como respondido para terminar de cerrar el oficio y evitar que respondan sin reabirl el oficio
        else
        $ofc->setRespondido(1);

      }
      if($objOficio->tipo_oficio == "ALCANCE")
        $ofc->setRespondido(1);
      if(!$ofc->UpdateOficio($id_oficio))
        throw new Exception("Error al actualizar el oficio");

        

      //Actualizar al nuevo usuario seleccionado
      $ofc_doc = new OficioDocumento();

      //Si es un oficio con destino a dependencia externa buscar y asingar el usuario con privilegios 1 de ofc de partes
      if($objOficio->destino == "EXTERNO"){
         //Verificar aqui
        $ofc_doc->setIdUsuario($objOficio->id_usuario_receptor);   
        array_push($usr_notificar, $objOficio->id_usuario_receptor);
      }
      else{
        $ofc_doc->setIdUsuario($_POST['id_usuario_receptor']);   
        array_push($usr_notificar, $_POST['id_usuario_receptor']);
      }
      $ofc_doc->setEstatusInicial(($respuesta == 0) ? 2: 1);

      if($objOficio->tipo_oficio == "ALCANCE" && $enviar){
        $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);
        if($ofcOriginalRes->estatus_final == "Revision"){
          $enviar_alcance = false;
          $msgEstatus = "Cambios Guardados Correctamente pero NO se puede ENVIAR un Alcance de una Solicitud o Respuesta que este en estatus Revisión";
          $ofc_doc->setEstatusFinal(4);
        }
        else{
          $ofc_doc->setEstatusFinal(1);
        }
      }
      elseif($objOficio->tipo_oficio == "RESPUESTA"){
        $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);
        if($ofcOriginalRes->estatus_final == 'Cerrado')
          $ofc_doc->setEstatusFinal($enviar ? 2 : 4);
        else
          $ofc_doc->setEstatusFinal($enviar ? 1 : 4);

      }else{
        $ofc_doc->setEstatusFinal($enviar ? 2 : 4); //<<<<<<<<<<<<<<<verificar que si es guardar o enviar
        
      }

      $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
       
      if(!$ofc_doc->ActualizarTitularOficioDocumento($objOficio->id_usuario_receptor,$id_oficio,0))
        throw new Exception("Error al Actualizar oficio_documento");  
      if(!$ofc_doc->ActualizarTitularAlcance($objOficio->destino =="EXTERNO" ? $objOficio->id_usuario_receptor: $_POST['id_usuario_receptor'],$id_oficio))
        throw new Exception("Error al Actualizar alcances");  
       
      //Marcar como eliminados los usuarios que ya no recibiran copia del mensaje, se incluye tmb los usuarios titulares en caso de haber seleccionado otra area
      if(isset($_POST['delete'])){
        $arr_ccp = empty($_POST['delete']) ? array() : explode(",",$_POST['delete']);
        if(!empty($arr_ccp)){
          foreach ($arr_ccp as $ids) {
            //Hacer el guardado por id de usuario;
           if(!$ofc_doc->EliminarUsuarioCCpOficioDocumento($ids,$id_oficio))
            throw new Exception("Error al marcar eliminados");
            
         }            
       }
      }
      // print_r($usr_notificar);exit;
      //Cuando se seleccione el boton enviar, se debe validar que los usuarios que ya tienen copia se camvie el estatus a abierto y añadirlos al arreglo de notificaciones
      $obj_usr_not = array();
      $usr = new Usuario();
      if($enviar){
        if($objOficio->tipo_oficio == "RESPUESTA"){
          //Obtener oficio original
          // $ofcOriginalRes = $oficio->getOficio($objOficio->flag_id);

          // print_r($ofcOriginalRes);exit();
          if($ofcOriginalRes->tipo_oficio == 'SOLICITUD'){

              //Si es solicitud marcarlo como respondido y cambiar estatus global a cerrado
              //marcar como respondido
              $ofc->_setId($ofcOriginalRes->id_oficio);
              $ofc->setRespondido(1);
              $ofc->marcarRespuesta();

              //cambiar el estatus final 
              if($ofcOriginalRes->estatus_final == 'Cerrado')
              $ofc_doc->setEstatusFinal('Abierto');
              else
              $ofc_doc->setEstatusFinal('Cerrado');


              $ofc_doc->setIdOficio($ofcOriginalRes->id_oficio);
              $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
              $ofc_doc->CambiarEstatusSolicitud();



              $obj_usr_not = $ofc_doc->getUsuariosEnDocumentos($_POST['id_oficio'],$_SESSION['data_user']['id']);
          }
          else{
              //Sie es la respuesta de una respuesta, marcar la respuesta recibida como respondido y cambiar el estatus de la solicitud principal
              $ofc->_setId($objOficio->flag_id);
              $ofc->setRespondido(1);
              $ofc->marcarRespuesta();

              //Usario el oficio original
              $arr = $ofc_doc->getOficioDocumento($ofcOriginalRes->parent_id);

              //cambiar el estatus final 
              if($arr->estatus_final == 'Cerrado')
               $ofc_doc->setEstatusFinal('Abierto');
              else
               $ofc_doc->setEstatusFinal('Cerrado');

              $ofc_doc->setIdOficio($arr->id_oficio);
              $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
              $ofc_doc->ActualizarEstatusFinal();

              $obj_usr_not = $ofc_doc->getUsuariosEnDocumentos($arr->id_oficio,$_SESSION['data_user']['id']);


              
          }

        }
        elseif($objOficio->tipo_oficio == "ALCANCE"){
          if(!$enviar_alcance){
            $success = true;
            echo json_encode(array("success"=>$success,"notificacion" => array(),"msgEstatus" => $msgEstatus));
            exit;
            
          }

        }
        else{
          //cAMBIAR el estatus de todas las solicitudes en revision
          $arrUsrccp = $usr->ListarUsuariosCcp($objOficio->id_oficio);
          if(!empty($arrUsrccp)){
            foreach ($arrUsrccp as $usuario) {
               $ofc_doc->enviarUsuarios($usuario->id_usuario,$objOficio->id_oficio);
               if(!in_array($usuario->id_usuario, $usr_notificar))
                array_push($usr_notificar, $usuario->id_usuario);          
            }

          }
          //Cambiar el estatus de todas los alcances a abierto hechos durante la revision de la SOLICITUD
          //$ofc_doc->enviarAlcances($objOficio->id_oficio);

        }
      }

      //Enviar copia a los nuevos usuarios seleccionados
      if(isset($_POST['check'])){
        $arr_ccp = empty($_POST['check']) ? array() : explode(",",$_POST['check']);
        if(!empty($arr_ccp)){
          foreach ($arr_ccp as $ids) {
            //Hacer el guardado por id de usuario;
            $ofc_doc->setIdOficio($id_oficio);    
            $ofc_doc->setParentId($objOficio->parent_id);    
            $ofc_doc->setIdDocumentos($id_documento);
            $ofc_doc->EliminarUsuarioCCpOficioDocumento($ids,$id_oficio);

            //Si es un oficio con destino a dependencia externa buscar y asingar el usuario con privilegios 1 de ofc de partes
            if(isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO'){
              //Verficar aqui
            }
            else{
              $ofc_doc->setIdUsuario($ids);   
              //array_push($usr_notificar, $_POST['id_usuario_receptor']);
            }
            $ofc_doc->setCcp(1);         
            $ofc_doc->setFechaVisto('');  
            $ofc_doc->setEstatusInicial(($respuesta == 0) ? 2: 1);
            $ofc_doc->setEstatusFinal($enviar ? 2 : 4); //<<<<<<<<<<<<<<<verificar que si es guardar o enviar
            $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
            $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
            
            $ofc_doc->RegistrarOficioDocumento();

            if(!in_array($ids,$usr_notificar))
              array_push($usr_notificar, $ids);
         }            
       }
      }
      
      /*Se añadio que si hay mas de un titular se le enviara mensaje, quitar de la lista el usuario que se selecciono anteriormente*/
      if($cambio_area){
        $obj_usr_titular = $usr->userTitulares($_POST['area_destino'],$_POST['id_usuario_receptor']);

        if(!empty($obj_usr_titular)){
          foreach ($obj_usr_titular as $ids) {
            if(!in_array($ids->id_usuario, $usr_notificar)){
              $ofc_doc->setIdOficio($id_oficio);    
              $ofc_doc->setParentId($objOficio->parent_id);    
              $ofc_doc->setIdDocumentos($id_documento);
              $ofc_doc->setIdUsuario($ids->id_usuario);   
              $ofc_doc->setCcp(0); //Se envia con ccp 0 para permitir que pueda responder 
              $ofc_doc->setFechaVisto('');  
              $ofc_doc->setCreatedBy($id_usuario);
              $ofc_doc->RegistrarOficioDocumento();
              array_push($usr_notificar, $ids->id_usuario);
            }          
          }
        }
      }
      /*****************/
      $success = true;
      //$_SESSION['flash-message-success'] = 'Datos guardados correctamente';
      $data = array();

      if(!empty($obj_usr_not)){
        foreach ($obj_usr_not as $value) {
          if(!in_array($value->id_usuario,$usr_notificar))
            array_push($usr_notificar,$value->id_usuario);
        }        
      }

      //Armar arreglo de datos para los usuarios que se les notificara el oficio
      if($enviar){
        $objUsr = $usr->getUsuarioArea($_SESSION['data_user']['id']);

        $origen = ($_POST['select_origen'] == 1) ? 'INTERNO': 'EXTERNO';
        $destino = isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO' ? 'EXTERNO': 'INTERNO';

        $data = array('id_oficio' => $id_oficio,'nombre_usuario' => ucwords(mb_strtolower($objUsr->nombre_formal,'UTF-8')).' de '.$objUsr->area, 'asunto' => $_POST["asunto_oficio"], 'origen'=> $origen, 'destino' => $destino,'ids_usuario_receptor' => $usr_notificar);        
      }

      // header("Content-type:application/json");
      echo json_encode(array("success"=>$success,"notificacion" => $data,"msgEstatus" => $msgEstatus));
      exit;
    } catch (Exception $e) {
        //Trabajar en un sistema de manejo de errores
      // $_SESSION['flash-message-error'] = $e->getMessage();
      echo json_encode(array("success"=>false,"msg_error" => $e->getMessage() ));
      exit;
    //header('Location: sigi.php?c=OfcPartes&a=add');
    }

  }
  public function guardarAction(){
      try {
          $success = true;
          if( !isset($_FILES['archivo']) ){
            throw new Exception('No se ha seleccionado ningun archivo.');
          }
          else{
               // print_r($_FILES);
                 // print_r($_POST);
                   // exit;

              $enviar = $_POST['enviar'];
               $usr_notificar = array();
               $objUsr = array();
               if(isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO'){
                 $usr = new Usuario();
                 $objUsr = $usr->userOfcPartes();
               }

               $origen = ($_POST['select_origen'] == 1) ? 'I': 'E';
               $area = new Area();
               $objArea = $area->ListarAreasById( !empty($objUsr) ? $objUsr->id_area : $_POST['area_destino'])['0'];

               $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado

                 //Generar el folio
               $contador = new Contador();
               $id = $contador->generarId();
               $folio = str_pad($id,8,'0',STR_PAD_LEFT);
               $folio_archivo = 'S'.$folio.date("Y-m-d-H-i-s").$objArea->abreviatura;

               $temp = explode(".", $_FILES["archivo"]["name"]);
               $newfilename = $folio_archivo . '.' . end($temp);
                 // exit;



                 //Proceder a guardar el arhivo
               $nombre = basename( $_FILES['archivo']['name']);
               $nombre_tmp = $_FILES['archivo']['tmp_name'];
               $tipo = $_FILES['archivo']['type'];
               $tamano = $_FILES['archivo']['size'];

               $ext_permitidas = array('pdf');
               $partes_nombre = explode('.', $nombre);
               $extension = end( $partes_nombre );
               $ext_correcta = in_array($extension, $ext_permitidas);


               $tipo_correcto = preg_match('/^application\/(pdf)$/', $tipo);



               //$limite = 500 * 1024;
               //$absolute_path = substr(__DIR__, 0,24);

               if( $ext_correcta && $tipo_correcto ){//&& $tamano <= $limite ){
                 if( $_FILES['archivo']['error'] > 0 ){
                       //Error al subir el archivo, tipo incorrecto o tamaño excesido
                   throw new Exception('Error al subir el archivo');
                 }
                 else{
                  $year = date("Y");
                  $rutaAnio = "documentos/$year";
                  $rutaArea = $rutaAnio."/".$objArea->abreviatura;
                  if (!file_exists($rutaAnio)) {
                      if(!mkdir($rutaAnio, 0777, true))
                        throw new Exception('Error al crear carpeta');

                  }
                  if (!file_exists($rutaArea)) {
                    if(!mkdir($rutaArea, 0777, true))
                        throw new Exception('Error al crear carpeta');

                  }             

                   if( file_exists( $rutaArea.'/'.$newfilename) ){
                         //Archivo ya existente
                      if(move_uploaded_file($nombre_tmp,$rutaArea.'/'.$newfilename)){

                      }
                      else{
                        throw new Exception('Archivo no valido');
                      }
                   }

                   else{
                         //crear archivo
                     if(move_uploaded_file($nombre_tmp,$rutaArea.'/'.$newfilename)){

                     }
                     else{
                       throw new Exception('Archivo no valido');
                     }
                   }
                 }
               }
               else{
                      //Archivo no valido
                 throw new Exception('Archivo no valido');
               }

                 //Guardar referencia al archivo
               $documento =  new Documento();
               $documento->setNombre($folio_archivo);
               $documento->setRespuesta(0);
               $documento->setRuta($rutaArea."/");
               $documento->setCreatedBy($id_usuario); //Asignar el user logeado
               $documento->setUpdatedBy ($id_usuario); //Asingar el user logeado;
               $id_documento = $documento->RegistrarDocumento();


               //Guardar oficio

               $ofc = new Oficio();

               $ofc->_setOrigen($_POST["select_origen"]);
               $ofc->setTipoOficio("SOLICITUD");
               $ofc->setFolio($folio);
               $ofc->setFolioInstitucion( isset($_POST['folio_iepc']) && $_POST['folio_iepc'] != '' && strlen($_POST['folio_iepc']) >= 8  ? $_POST['folio_iepc']: 'S/N'); //Folio de institucion cambiar

              //  if(isset($_POST['id_usuario_origen']))
              //   $ofc->_setIdUsuarioEmisor(( $_POST["id_usuario_origen"] == '') ? 0: $_POST["id_usuario_origen"]);
              // else
              //   $ofc->_setIdUsuarioEmisor(0);
               $ofc->_setIdUsuarioEmisor($id_usuario); //<----verificar si no afecta 

               $ofc->_setNombreEmisor( isset($_POST["nombre_emisor"]) ? $_POST["nombre_emisor"] : "");
               $ofc->_setInstitucionEmisor( isset( $_POST["institucion_emisor"]) ? $_POST["institucion_emisor"]: "" );
               $ofc->_setCargo( isset($_POST["cargo_emisor"]) ? $_POST["cargo_emisor"]: "");
               $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
               $ofc->_setAsuntoReceptor("");
               $ofc->_setRespuesta($_POST["respuesta"]);
               $ofc->setDestino( isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO' ? 'EXTERNO': 'INTERNO' ) ;


               if($_POST['select_origen'] == 1){
                  $ofc->setFechaRecepcion('');
                 $ofc->setHoraRecepcion('');
               }
               else{
                  $hora_recepcion = str_replace(" ", "", $_POST['hora_recepcion']);
                  $hora_recepcion = str_replace("AM", " am", $hora_recepcion);
                  $hora_recepcion = str_replace("PM", " pm", $hora_recepcion);
                  $hora_recepcion = date("H:i:s", strtotime($hora_recepcion));
                 $ofc->setFechaRecepcion($_POST['fecha_recepcion']);
                 $ofc->setHoraRecepcion($hora_recepcion);                               
               }

               $ofc->setComentarios(isset($_POST['comentarios']) && $_POST['comentarios'] != '' ? $_POST['comentarios'] : '');
               $ofc->setVinculado(0);

               $ofc->_setCreatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
               $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
               $id_ofc = $ofc->RegistrarOficio();


               //Guardar Registro del oficio con documento
               $ofc_doc = new OficioDocumento();

               $ofc_doc->setIdOficio($id_ofc);    
               $ofc_doc->setParentId(null);    
               $ofc_doc->setIdDocumentos($id_documento);

               //Si es un oficio con destino a dependencia externa buscar y asingar el usuario con privilegios 1 de ofc de partes
               if(isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO'){
                 $usr = new Usuario();
                 $objUsr = $usr->userOfcPartes();
                 $ofc_doc->setIdUsuario($objUsr->id_usuario);
                 array_push($usr_notificar, $objUsr->id_usuario); 
               }
               else{
                 $ofc_doc->setIdUsuario($_POST['id_usuario_receptor']);   
                 array_push($usr_notificar, $_POST['id_usuario_receptor']);
               }
               $ofc_doc->setCcp(0);         
               $ofc_doc->setFechaVisto('');  
               $ofc_doc->setEstatusInicial(($_POST['respuesta'] == 0) ? 2: 1);
               $ofc_doc->setEstatusFinal( $enviar ? 2 : 4);
               $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
               $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
               
               $ofc_doc->RegistrarOficioDocumento();



               //Enviar copia solo si se selecciono de la lista de usuarios
               if(isset($_POST['check'])){
                 $arr_ccp = empty($_POST['check']) ? array() : explode(",",$_POST['check']);
                 if(!empty($arr_ccp)){
                   foreach ($arr_ccp as $ids) {
                     //Hacer el guardado por id;
                    $ofc_doc->setIdUsuario($ids);   
                    $ofc_doc->setCcp(1); 
                    $ofc_doc->RegistrarOficioDocumento();

                    array_push($usr_notificar, $ids); 
                  }            
                }
               }
              $usr = new Usuario();
               /*Se añadio que si hay mas de un titular se le enviara mensaje, quitar de la lista el usuario que se selecciono anteriormente*/
               $id_not = isset( $_POST['id_usuario_receptor']) && $_POST['id_usuario_receptor'] != '' ? $_POST['id_usuario_receptor'] : $id_usuario;
                $obj_usr_titular = $usr->userTitulares($objArea->id,$id_not,isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO' ? true : false);

                if(!empty($obj_usr_titular)){
                  foreach ($obj_usr_titular as $ids) {
                    if(!in_array($ids->id_usuario, $usr_notificar)){
                      $ofc_doc->setIdUsuario($ids->id_usuario);   
                      $ofc_doc->setCcp(0); //Se envia con ccp 0 para permitir que pueda responder 
                      $ofc_doc->RegistrarOficioDocumento();
                      array_push($usr_notificar, $ids->id_usuario);
                    }          
                  }
                }                
               /*****************/

              // $_SESSION['flash-message-success'] = 'Datos guardados correctamente';

              //Armar arreglo de datos para los usuarios que se les notificara el oficio
              $data = array();
              if($enviar){
                $objUsr = $usr->getUsuarioArea($_SESSION['data_user']['id']);

                $origen = ($_POST['select_origen'] == 1) ? 'INTERNO': 'EXTERNO';
                $destino = isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO' ? 'EXTERNO': 'INTERNO';

                $data = array('id_oficio' => $id_ofc,'nombre_usuario' => ucwords(mb_strtolower($objUsr->nombre_formal,'UTF-8')).' de '.$objUsr->area, 'asunto' => $_POST["asunto_oficio"], 'origen'=> $origen, 'destino' => $destino,'ids_usuario_receptor' => $usr_notificar);
              }

              // header("Content-type:application/json");
              echo json_encode(array("success"=>$success,"notificacion" => $data));
              exit;
              //header("Location: $this->GLOBAL_PATH/ofcpartes/index");
          }
          
      } catch (Exception $e) {
          //Trabajar en un sistema de manejo de errores
        //$_SESSION['flash-message-error'] = $e->getMessage();
        echo json_encode(array("success"=>false,"msg_error"=>$e->getMessage()));
        exit;
      //header('Location: sigi.php?c=OfcPartes&a=add');
      }
  }

  public function guardarRespuestaAction()
  {   
      try {
         if( !isset($_FILES['archivo']) && !isset($_POST['ofc_vinculado'])){
               throw new Exception('No se ha seleccionado ningun archivo.');
          } 
          else {
            // print_r($_FILES);
            // print_r($_REQUEST);
            // exit;

            $success = true;



            //Buscar el oficio original y obtener sus datos
            // $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado
            // print_r($id_usuario);
            // $ofc = new Oficio();
            // $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);
            // print_r($objOficio);exit;
              // throw new Exception('No se ha seleccionado ningun archivo.');
              // print_r($_POST['origen']);exit;

            $enviar = isset($_POST['enviar']) && $_POST['enviar'] != '' ? $_POST['enviar'] : true;

            $ofc = new Oficio();
            $objOficioDoc =  new OficioDocumento();

            $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado

            //Buscar el oficio del mensaje recibido y obtener sus datos
            $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);

            // print_r($objOficio);exit;

              $origen = ($_POST['origen'] == 'INTERNO') ? 'I': 'E';
              $area = new Area();
              // print_r($_SESSION['data_user']);exit;
              $objArea = $area->ListarAreasById($_SESSION['data_user']['area'])['0'];

              

              //Generar el folio de RESPUESTA
              $folio = $objOficio->folio;
              $folio_archivo = 'R'.$folio.date("Y-m-d-H-i-s").$objArea->abreviatura;

              
              // exit;

              //Si es un oficio sin vincular se gaurda el documento
              if(!isset($_POST['ofc_vinculado'])){
                $temp = explode(".", $_FILES["archivo"]["name"]);
                $newfilename = $folio_archivo . '.' . end($temp);
                //Proceder a guardar el arhivo
                $nombre = $_FILES['archivo']['name'];
                $nombre_tmp = $_FILES['archivo']['tmp_name'];
                $tipo = $_FILES['archivo']['type'];
                $tamano = $_FILES['archivo']['size'];

                $ext_permitidas = array('pdf');
                $partes_nombre = explode('.', $nombre);
                $extension = end( $partes_nombre );
                $ext_correcta = in_array($extension, $ext_permitidas);

                $tipo_correcto = preg_match('/^application\/(pdf)$/', $tipo);

                $limite = 500 * 1024;

                  if( $ext_correcta && $tipo_correcto ){//&& $tamano <= $limite ){
                    if( $_FILES['archivo']['error'] > 0 ){
                          //Error al subir el archivo, tipo incorrecto o tamaño excesido
                      throw new Exception('Error al subir el archivo');
                    }
                    else{
                     $year = date("Y");
                     $rutaAnio = "documentos/$year";
                     $rutaArea = $rutaAnio."/".$objArea->abreviatura;
                     if (!file_exists($rutaAnio)) {
                         if(!mkdir($rutaAnio, 0777, true))
                           throw new Exception('Error al crear carpeta');

                     }
                     if (!file_exists($rutaArea)) {
                       if(!mkdir($rutaArea, 0777, true))
                           throw new Exception('Error al crear carpeta');

                     }             

                      if( file_exists( $rutaArea.'/'.$newfilename) ){
                            //Archivo ya existente
                      }

                      else{
                            //crear archivo
                        if(move_uploaded_file($nombre_tmp,$rutaArea.'/'.$newfilename)){

                        }
                        else{
                          throw new Exception('Archivo no valido');
                        }
                      }
                    }
                  }
                  else{
                         //Archivo no valido
                    throw new Exception('Archivo no valido');
                  }


                //Guardar referencia al archivo
                $documento =  new Documento();
                $documento->setNombre($folio_archivo);
                $documento->setRespuesta(0);
                $documento->setRuta($rutaArea."/");
                $documento->setCreatedBy($id_usuario); //Asignar el user logeado
                $documento->setUpdatedBy ($id_usuario); //Asingar el user logeado;
                $id_documento = $documento->RegistrarDocumento();                
              }
              else{
                $id_documento = 0;
              }

              

              //Guardar oficio
              $ofc->_setOrigen('INTERNO');
              $ofc->setTipoOficio("RESPUESTA");
              $ofc->setFolio($folio);
              $ofc->setFolioInstitucion( isset($_POST['folio_iepc']) && $_POST['folio_iepc'] != '' && strlen($_POST['folio_iepc']) >= 7  ? $_POST['folio_iepc']: 'S/N'); //Folio de institucion cambiar
              $ofc->_setIdUsuarioEmisor($id_usuario);
              $ofc->_setNombreEmisor($objOficio->nombre_emisor);
              $ofc->_setInstitucionEmisor($objOficio->institucion_emisor);
              $ofc->_setCargo($objOficio->cargo);
              $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);

              //$ofc->setDestino( $objOficio->destino == 'EXTERNO' ? 'EXTERNO': 'INTERNO') ;
              $ofc->setDestino($_POST["origen"] == 'EXTERNO' ? 'EXTERNO': 'INTERNO');
              $destino_notf = $_POST["origen"] == 'EXTERNO' ? 'EXTERNO': 'INTERNO';
              $ofc->setComentarios(isset($_POST['comentarios']) && $_POST['comentarios'] != '' ? $_POST['comentarios'] : '');
              $ofc->setVinculado(isset($_POST['ofc_vinculado']) && intval($_POST['ofc_vinculado']) == 1 ? 1 : 0);
              $ofc->_setAsuntoReceptor("");
              $ofc->_setRespuesta(1);
              if($enviar){
                //Si es una solicitud el objoficio y no ha sido responido marcar como responido para evitar que respondan la respuesta
                if($objOficio->tipo_oficio == "SOLICITUD" && !$objOficio->respondido)
                $ofc->setRespondido(1);
                //Si es una solicitud el objoficio y ya fue respondida marcar como no respondido para que el receptor pueda responder la respuesta de la respuesta
                elseif($objOficio->tipo_oficio == "SOLICITUD" && $objOficio->respondido)
                $ofc->setRespondido(0);
                //si es una respuesta el objfocio marcar como respondido para terminar de cerrar el oficio y evitar que respondan sin reabirl el oficio
                else
                $ofc->setRespondido(1);
              }

              
              $ofc->_setCreatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
              $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
              $ofc->setFlagId($_POST['id_oficio']);
              $id_ofc = $ofc->RegistrarOficio();

              //Guardar Registro del oficio con documento
              $ofc_doc = new OficioDocumento();

              $ofc_doc->setIdOficio($id_ofc);    
              $ofc_doc->setParentId( ($objOficio->tipo_oficio == "RESPUESTA") ? $objOficio->parent_id : $objOficio->id_oficio );    
              $ofc_doc->setIdDocumentos($id_documento);

              //Si es el oficio original y no esta respondido, utilizar el id usuario emisor del oficio objOficioOriginal 
              if($objOficio->tipo_oficio == "SOLICITUD" && !$objOficio->respondido)
                $ofc_doc->setIdUsuario($objOficio->id_usuario_emisor);   
              //Si es el oficio original y esta responido lo cual indica que se intenta reabrir el oficio, utilizar el id del usuario recpetor
              elseif($objOficio->tipo_oficio == "SOLICITUD" && $objOficio->respondido)
                $ofc_doc->setIdUsuario($objOficio->id_usuario_receptor);
              //Si es la respuesta de una respuesta utilizar el id usuario emisor
              else
                $ofc_doc->setIdUsuario($objOficio->id_usuario_emisor);
              $ofc_doc->setCcp(0);         
              $ofc_doc->setFechaVisto('');  
              $ofc_doc->setEstatusInicial(1);

              //Si oficio es solicitud poner el estatus del oficio original
              if($objOficio->tipo_oficio == 'SOLICITUD' && $enviar){

                //Si el oficio ya fue vinculado descartar el actual y marcar todo como cerrado
                if(isset($_POST['ofc_vinculado'])){
                  $ofc_doc->setEstatusFinal('Cerrado');    
                }
                //cambiar el estatus final 
                else{
                  if($objOficio->estatus_final == 'Cerrado')
                  $ofc_doc->setEstatusFinal('Abierto');
                  else
                  $ofc_doc->setEstatusFinal('Cerrado');                  
                }

              }else{
                $ofc_doc->setEstatusFinal($enviar ? 1 : 4);                
              }
              $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
              $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
              
              $ofc_doc->RegistrarOficioDocumento();

              $obj_usr_not = array();

               //Solo guardar otra respuesta para los usuarios titulares cuando se reabre el oficio
              $usr_notificar = array();
              if($objOficio->tipo_oficio == "SOLICITUD" && $objOficio->respondido){

                $usr = new Usuario();
                $objArea = $area->ListarAreaByIdUser($objOficio->id_usuario_receptor);
                $obj_usr_titular = $usr->userTitulares($objArea->area,$objOficio->id_usuario_receptor);
                if(!empty($obj_usr_titular)){
                  foreach ($obj_usr_titular as $ids) {
                    $ofc_doc->setIdUsuario($ids->id_usuario);   
                    $ofc_doc->setCcp(0); //Se envia con ccp 0 para permitir que pueda responder 
                    $ofc_doc->RegistrarOficioDocumento();
                    array_push($usr_notificar, $ids->id_usuario); 
                    
                  }
                }                
                 /*****************/
              }

              if(!$enviar){

                //Si es solicitud marcarlo como respondido al guardar y evitar que generen mas de una respuesta por solicitud
                $ofc->_setId($objOficio->id_oficio);
                $ofc->setRespondido(1);
                $ofc->marcarRespuesta();

                $data = array();
                //$_SESSION['flash-message-success'] = 'Datos guardados correctamente';
                echo json_encode(array("success"=>$success,"notificacion" => $data));
                exit;

              }

              if($objOficio->tipo_oficio == 'SOLICITUD'){

                  //Si es solicitud marcarlo como respondido y cambiar estatus global a cerrado
                  //marcar como respondido
                  $ofc->_setId($objOficio->id_oficio);
                  $ofc->setRespondido(1);
                  $ofc->marcarRespuesta();

                  //Si el oficio ya fue vinculado descartar el actual y marcar todo como cerrado
                  if(isset($_POST['ofc_vinculado'])){

                    if($objOficio->estatus_final == 'Cerrado')
                    $objOficioDoc->setEstatusFinal('Cerrado');
                    elseif($objOficio->estatus_final == 'Abierto')
                    $objOficioDoc->setEstatusFinal('Cerrado');


                    $objOficioDoc->setIdOficio($_POST['id_oficio']);
                    $objOficioDoc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
                    $objOficioDoc->CambiarEstatusSolicitud();

                  }
                  else{
                    //cambiar el estatus final 
                    if($objOficio->estatus_final == 'Cerrado')
                    $objOficioDoc->setEstatusFinal('Abierto');
                    else
                    $objOficioDoc->setEstatusFinal('Cerrado');


                    $objOficioDoc->setIdOficio($_POST['id_oficio']);
                    $objOficioDoc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
                    $objOficioDoc->CambiarEstatusSolicitud();
                  }


                  $obj_usr_not = $objOficioDoc->getUsuariosEnDocumentos($_POST['id_oficio'],$_SESSION['data_user']['id']);
              }
              else{
                  //Sie es la respuesta de una respuesta, marcar la respuesta recibida como respondido y cambiar el estatus de la solicitud principal
                  $ofc->_setId($objOficio->id_oficio);
                  $ofc->setRespondido(1);
                  $ofc->marcarRespuesta();

                  // print_r($objOficio);
                  // print_r("<br>");

                  //Buscar el oficio original
                  $arr = $ofc_doc->getOficioDocumento($objOficio->parent_id);

                  // print_r($arr);
                  // print_r("<br>");
                  // $objOficioOriginal = $ofc->getOficio($arr->id);

                  // print_r($objOficioOriginal);exit;

                  //cambiar el estatus final 
                  if($arr->estatus_final == 'Cerrado')
                   $objOficioDoc->setEstatusFinal('Abierto');
                  else
                   $objOficioDoc->setEstatusFinal('Cerrado');

                  $objOficioDoc->setIdOficio($arr->id_oficio);
                  $objOficioDoc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
                  $objOficioDoc->ActualizarEstatusFinal();

                  $obj_usr_not = $objOficioDoc->getUsuariosEnDocumentos($arr->id_oficio,$_SESSION['data_user']['id']);


                  
              }

              //Enviar copia solo si se selecciono de la lista de usuarios
              if(isset($_POST['check'])){
                $arr_ccp = explode(",", $_POST['check']);
                if(!empty($arr_ccp)){
                    foreach ($arr_ccp as $ids) {
                        //Hacer el guardado por id;
                        $ofc_doc->setIdUsuario($ids);   
                        $ofc_doc->setCcp(1); 
                        $ofc_doc->RegistrarOficioDocumento();
                    }            
                }
              }

             

              
              //$_SESSION['flash-message-success'] = 'Datos guardados correctamente';
              //header("Location: $this->GLOBAL_PATH/ofcpartes/index");

              //Armar arreglo de datos para los usuarios que se les notificara el oficio
              $usr = new Usuario();
              $objUsr = $usr->getUsuarioArea($_SESSION['data_user']['id']);
              

              if ($_POST['origen'] == "INTERNO"){
                $origen = 'INTERNO';
              }
              else{
                $origen = 'EXTERNO';
                $objUsrPartes = $usr->userOfcPartes();
                if(!in_array($objUsrPartes->id_usuario,$usr_notificar))
                  array_push($usr_notificar,$objUsrPartes->id_usuario);
              }

              //$origen = ($_POST['origen'] == "INTERNO") ? 'INTERNO': 'EXTERNO';
              

              foreach ($obj_usr_not as $value) {
                if(!in_array($value->id_usuario,$usr_notificar))
                  array_push($usr_notificar,$value->id_usuario);
              }

              $data = array('id_oficio' => $id_ofc,'nombre_usuario' => ucwords(mb_strtolower($objUsr->nombre_formal,'UTF-8')).' de '.$objUsr->area, 'asunto' => $_POST["asunto_oficio"], 'origen'=> $origen, 'destino' => $destino_notf,'ids_usuario_receptor' => $usr_notificar);

              // header("Content-type:application/json");
              echo json_encode(array("success"=>$success,"notificacion" => $data));
              exit;


          }
          
          
      } catch (Exception $e) {
          //Trabajar en un sistema de manejo de errores
          // $_SESSION['flash-message-error'] = 'Error al guardar la información';
          echo json_encode(array("success"=>false,"msg_error" => $e->getMessage()));
          exit;
          //header('Location: sigi.php?c=OfcPartes&a=add');            
      }
  }

  public function guardarAnexoAction()
  {
      try {
         if( !isset($_FILES['archivo']) ){
               throw new Exception('No se ha seleccionado ningun archivo.');
          } else {
            $success = true;
            // print_r($_FILES);
            // print_r($_REQUEST);
            // exit;

            //Buscar el oficio original y obtener sus datos
            // $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado
            // print_r($id_usuario);
            // $ofc = new Oficio();
            // $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);
            // print_r($objOficio);exit;
              // throw new Exception('No se ha seleccionado ningun archivo.');
              // print_r($_POST['origen']);exit;

            $enviar = isset($_POST['enviar']) && $_POST['enviar'] != '' ? $_POST['enviar'] : true;
            $msgEstatus = "";

            $ofc = new Oficio();
            $objOficioDoc =  new OficioDocumento();

            $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado

            //Buscar el oficio del mensaje recibido y obtener sus datos
            $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);

            // print_r($objOficio);exit;

              $origen = ($_POST['origen'] == 'INTERNO') ? 'I': 'E';
              $area = new Area();
              // print_r($_SESSION['data_user']);exit;
              $objArea = $area->ListarAreasById($_SESSION['data_user']['area'])['0'];

              

              //Generar el folio de RESPUESTA
              $folio = $objOficio->folio;
              $folio_archivo = 'R'.$folio.date("Y-m-d-H-i-s").$objArea->abreviatura;

              $temp = explode(".", $_FILES["archivo"]["name"]);
              $newfilename = $folio_archivo . '.' . end($temp);
              // exit;

              //Si es un oficio sin vincular se gaurda el documento
              if(!isset($_POST['ofc_vinculado'])){
                //Proceder a guardar el arhivo
                $nombre = $_FILES['archivo']['name'];
                $nombre_tmp = $_FILES['archivo']['tmp_name'];
                $tipo = $_FILES['archivo']['type'];
                $tamano = $_FILES['archivo']['size'];

                $ext_permitidas = array('pdf');
                $partes_nombre = explode('.', $nombre);
                $extension = end( $partes_nombre );
                $ext_correcta = in_array($extension, $ext_permitidas);

                $tipo_correcto = preg_match('/^application\/(pdf)$/', $tipo);

                $limite = 500 * 1024;

                  if( $ext_correcta && $tipo_correcto ){//&& $tamano <= $limite ){
                    if( $_FILES['archivo']['error'] > 0 ){
                          //Error al subir el archivo, tipo incorrecto o tamaño excesido
                      throw new Exception('Error al subir el archivo');
                    }
                    else{
                     $year = date("Y");
                     $rutaAnio = "documentos/$year";
                     $rutaArea = $rutaAnio."/".$objArea->abreviatura;
                     if (!file_exists($rutaAnio)) {
                         if(!mkdir($rutaAnio, 0777, true))
                           throw new Exception('Error al crear carpeta');

                     }
                     if (!file_exists($rutaArea)) {
                       if(!mkdir($rutaArea, 0777, true))
                           throw new Exception('Error al crear carpeta');

                     }             

                      if( file_exists( $rutaArea.'/'.$newfilename) ){
                            //Archivo ya existente
                      }

                      else{
                            //crear archivo
                        if(move_uploaded_file($nombre_tmp,$rutaArea.'/'.$newfilename)){

                        }
                        else{
                          throw new Exception('Archivo no valido');
                        }
                      }
                    }
                  }
                  else{
                         //Archivo no valido
                    throw new Exception('Archivo no valido');
                  }


                //Guardar referencia al archivo
                $documento =  new Documento();
                $documento->setNombre($folio_archivo);
                $documento->setRespuesta(0);
                $documento->setRuta($rutaArea."/");
                $documento->setCreatedBy($id_usuario); //Asignar el user logeado
                $documento->setUpdatedBy ($id_usuario); //Asingar el user logeado;
                $id_documento = $documento->RegistrarDocumento();                
              }
              else{
                $id_documento = 0;
              }

              

              //Guardar oficio
              $ofc->_setOrigen($_POST['origen']);
              $ofc->setTipoOficio("ALCANCE");
              $ofc->setFolio($folio);
              $ofc->setFolioInstitucion( isset($_POST['folio_iepc']) && $_POST['folio_iepc'] != '' && strlen($_POST['folio_iepc']) >= 7  ? $_POST['folio_iepc']: 'S/N'); //Folio de institucion cambiar
              $ofc->_setIdUsuarioEmisor($id_usuario);
              $ofc->_setNombreEmisor($objOficio->nombre_emisor);
              $ofc->_setInstitucionEmisor($objOficio->institucion_emisor);
              $ofc->_setCargo($objOficio->cargo);
              $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
              $ofc->setDestino( $_POST['destino']) ;
              $destino_notf = $_POST['destino'];
              $ofc->setComentarios(isset($_POST['comentarios']) && $_POST['comentarios'] != '' ? $_POST['comentarios'] : '');
              $ofc->setVinculado(isset($_POST['ofc_vinculado']) && intval($_POST['ofc_vinculado']) == 1 ? 1 : 0);
              $ofc->_setAsuntoReceptor("");
              $ofc->_setRespuesta(1);
              $ofc->setFlagId($objOficio->id_oficio);
              //Si es una solicitud el objoficio y no ha sido responido marcar como responido para evitar que respondan la respuesta
              if($objOficio->tipo_oficio == "SOLICITUD" && !$objOficio->respondido)
              $ofc->setRespondido(1);
              //Si es una solicitud el objoficio y ya fue respondida marcar como no respondido para que el receptor pueda responder la respuesta de la respuesta
              elseif($objOficio->tipo_oficio == "SOLICITUD" && $objOficio->respondido)
              $ofc->setRespondido(0);
              //si es una respuesta el objfocio marcar como respondido para terminar de cerrar el oficio y evitar que respondan sin reabirl el oficio
              else
              $ofc->setRespondido(1);
              $ofc->_setCreatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
              $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
              $id_ofc = $ofc->RegistrarOficio();

              //Guardar Registro del oficio con documento
              $ofc_doc = new OficioDocumento();

              $ofc_doc->setIdOficio($id_ofc);    
              $ofc_doc->setParentId( ($objOficio->tipo_oficio == "RESPUESTA") ? $objOficio->parent_id : $objOficio->id_oficio );    
              $ofc_doc->setIdDocumentos($id_documento);

              $ofc_doc->setIdUsuario($objOficio->id_usuario_receptor);
              $ofc_doc->setCcp(0);         
              $ofc_doc->setFechaVisto('');  
              $ofc_doc->setEstatusInicial(1);

              $es_fin = 1;
              if($objOficio->estatus_final == "Revision"){
                if($enviar){
                  $es_fin = 4;
                  $msgEstatus = "Cambios Guardados Correctamente pero NO se puede ENVIAR un Alcance de una Solicitud o Respuesta que este en estatus Revisión";
                  
                }
                else{
                  $es_fin = 4;
                }
              }elseif ($enviar) {
                $es_fin = 1;
              }else{
                $es_fin = 4;
              }

              $ofc_doc->setEstatusFinal($es_fin);
              $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
              $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
              
              $ofc_doc->RegistrarOficioDocumento();


              //REcuperar lista de usuarios a los que se notificara el anexo
              $obj_usr_not = array();
              $usr_notificar = array();
              $obj_usr_not = $objOficioDoc->getUsuariosEnDocumentos($objOficio->tipo_oficio == "RESPUESTA" ? $objOficio->parent_id : $objOficio->id_oficio,$_SESSION['data_user']['id']);

              //Enviar copia del anexo a usuarios titulares
              $usr = new Usuario();
              $objArea = $area->ListarAreaByIdUser($objOficio->id_usuario_receptor);
              $obj_usr_titular = $usr->userTitulares($objArea->area,$objOficio->id_usuario_receptor);
              if(!empty($obj_usr_titular)){
                foreach ($obj_usr_titular as $ids) {
                  $ofc_doc->setIdUsuario($ids->id_usuario);   
                  $ofc_doc->setCcp(0); //Se envia con ccp 0 para permitir que pueda responder 
                  $ofc_doc->RegistrarOficioDocumento();
                  array_push($usr_notificar, $ids->id_usuario); 
                  
                }
              }                
                 /*****************/

             if(!$enviar){
               $data = array();
               // $_SESSION['flash-message-success'] = 'Datos guardados correctamente';
               echo json_encode(array("success"=>$success,"notificacion" => $data,"msgEstatus" => $msgEstatus));
               exit;

             }

              
              // $_SESSION['flash-message-success'] = 'Datos guardados correctamente';
              //header("Location: $this->GLOBAL_PATH/ofcpartes/index");

              //Armar arreglo de datos para los usuarios que se les notificara el oficio
              $data = array();
              if( $objOficio->estatus_final != "Revision"){
                $usr = new Usuario();
                $objUsr = $usr->getUsuarioArea($_SESSION['data_user']['id']);
                

                if ($_POST['origen'] == "INTERNO"){
                  $origen = 'INTERNO';
                }
                else{
                  $origen = 'EXTERNO';
                  $objUsrPartes = $usr->userOfcPartes();
                  if(!in_array($objUsrPartes->id_usuario,$usr_notificar))
                    array_push($usr_notificar,$objUsrPartes->id_usuario);
                }

                //$origen = ($_POST['origen'] == "INTERNO") ? 'INTERNO': 'EXTERNO';
                

                foreach ($obj_usr_not as $value) {
                  if(!in_array($value->id_usuario,$usr_notificar))
                    array_push($usr_notificar,$value->id_usuario);
                }

                $data = array('id_oficio' => $id_ofc,'nombre_usuario' => ucwords(mb_strtolower($objUsr->nombre_formal,'UTF-8')).' de '.$objUsr->area, 'asunto' => $_POST["asunto_oficio"], 'origen'=> $origen, 'destino' => $destino_notf,'ids_usuario_receptor' => $usr_notificar);
              }

              // header("Content-type:application/json");
              echo json_encode(array("success"=>$success,"notificacion" => $data,"msgEstatus" => $msgEstatus));
              exit;


          }
          
          
      } catch (Exception $e) {
          //Trabajar en un sistema de manejo de errores
          // $_SESSION['flash-message-error'] = 'Error al guardar la información';
          echo json_encode(array("success"=>false,"msg_error"=> $e->getMessage()));
          exit;
          //header('Location: sigi.php?c=OfcPartes&a=add');            
      }
  }

}


?>
