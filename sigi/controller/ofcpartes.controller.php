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
include ("sigi/class/init_paginador.php");
require_once ("sigi/class/validate.class.php");
//require_once ("/../view/header.php");


class OfcPartesController
{
	private $layout;
  private $validate;

  public function __CONSTRUCT()
  {
    try
    {
      $this->layout = new Layout();    
      $this->validate = new Validate();
    }
    catch(Exception $e)
    {
      die($e->getMessage());
    }
  }


  public function IndexAction(){
    // print_r($_SESSION);

    $area =  new Area();
    $ar = $area->ListarAreas();

        //require_once ("/../view/header.php");
        //require_once '/../view/ofcPartes/ofcPartesAdd.php';


    $this->layout->renderVista("ofcPartes","ofcPartes",array('areas' => $ar));
  }

  public function listarOficiosExternosAction(){

    $initPag = new InitPaginador();
    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    // print_r($_POST);exit;

    //si eres un usuario receptor, buscar solo los mensajes que te corresponden
    if($_SESSION['data_user']['privilegios'] == 3){
      $cond = " sigi_vw_oficios_externos.id_usuario_receptor = $id_usuario AND sigi_vw_oficios_externos.estatus_final <> 'Cancelado' ";
    }
    //si eres un alto directivo
    elseif ($_SESSION['data_user']['privilegios'] == 2) {
       $cond = " sigi_vw_oficios_externos.id_usuario_receptor = $id_usuario OR sigi_vw_oficios_externos.origen = 'Externo' ";
       $group_by = ' GROUP BY id_oficio ';
       //Filtro por area para usuarios ejecutivos
       if(isset($_POST['area']) && $_POST['area'] != ''  && intval($_POST['area']) > 0){
        $id_area = intval($_POST['area']);
        $cond = $cond . " AND id_area = $id_area";
       }

    }
    //Si eres el capturista de oficios, para la correcta visualizacion del paginador se agregar este group
    else{
      $group_by = ' GROUP BY id_oficio ';
      if(isset($_POST['area']) && $_POST['area'] != '' && intval($_POST['area']) > 0 ){
       $id_area = intval($_POST['area']);
       $cond = $cond . " id_area = $id_area";
      }
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
    if(isset($_POST['estatus_final']) && $_POST['estatus_final'] != ''){
      $estatus_final = $_POST['estatus_final'];
      if($cond != ''){
        $cond= $cond."  AND estatus_final = $estatus_final"; 
      }
      else{
        $cond= $cond." estatus_final = $estatus_final"; 
      }
    }

    // print_r($cond);exit;

    $table = 'sigi_vw_oficios_externos';
    $columns = array(
      array(
        'db' => 'id_oficio',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
          return 'row_'.$d;
        }
        ),
      array( 'db' => 'origen',  'dt' => 'origen' ),
      array( 'db' => 'tipo_oficio',  'dt' => 'tipo_oficio' ),
      array( 'db' => 'folio',   'dt' => 'folio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'nombre_emisor',   'dt' => 'nombre_emisor' ),
      array( 'db' => 'cargo',   'dt' => 'cargo' ),
      array( 'db' => 'institucion_emisor',   'dt' => 'institucion_emisor' ),
      array( 'db' => 'asunto_emisor',   'dt' => 'asunto_emisor' ),
      array( 'db' => 'id_area',   'dt' => 'id_area' ),
      array( 'db' => 'area',   'dt' => 'area' ),
      array( 'db' => 'estatus_inicial',   'dt' => 'estatus_inicial' ),
      array( 'db' => 'estatus_final',   'dt' => 'estatus_final' ),
      array( 'db' => 'fecha_recibido',  'dt' => 'fecha_recibido'),
      array( 'db' => 'fecha_visto',  'dt' => 'fecha_visto')
      );
    $primaryKey = 'id_oficio';

    $initPag->construir($table,$columns,$primaryKey,$cond,$group_by);

  }


  public function listarOficiosInternosAction(){

    // $initPag = new InitPaginador();

    $initPag = new InitPaginador();

    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    $fecha_inicio = '';
    $fecha_fin = '';

    //si eres un usuario receptor, buscar solo los mensajes que te corresponden
    if($_SESSION['data_user']['privilegios'] == 3){
      // $cond = " sigi_vw_oficios_internos.id_usuario_receptor = $id_usuario OR sigi_vw_oficios_internos.id_usuario_emisor = $id_usuario GROUP BY id_oficio  ";
      $cond = " (
      sigi_vw_oficios_internos.id_usuario_receptor = $id_usuario
      AND sigi_vw_oficios_internos.estatus_final <> 'Cancelado'
      )
      OR (id_usuario_emisor = $id_usuario)
      ";

      $group_by = ' GROUP BY id_oficio ';
    }
    //si eres un alto directivo
    elseif ($_SESSION['data_user']['privilegios'] == 2) {
       $cond = " (
      sigi_vw_oficios_internos.id_usuario_receptor = $id_usuario
      AND sigi_vw_oficios_internos.estatus_final <> 'Cancelado'
      )
      OR (id_usuario_emisor = $id_usuario) 
      OR origen = 'Interno'";
       $group_by = ' GROUP BY id_oficio ';

    }
    //Si eres el capturista de oficios, para la correcta visualizacion del paginador se agregar este group
    else{
      $group_by = ' GROUP BY id_oficio ';
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
    if(isset($_POST['estatus_final']) && $_POST['estatus_final'] != ''){
      $estatus_final = $_POST['estatus_final'];
      if($cond != ''){
        $cond= $cond."  AND estatus_final = $estatus_final"; 
      }
      else{
        $cond= $cond." estatus_final = $estatus_final"; 
      }
    }
    //Filtrar por area
    if(isset($_POST['area']) && $_POST['area'] != '' && intval($_POST['area']) > 0 ){
       $id_area = intval($_POST['area']);
       //Si eres usuario capturista y solo se filtra por area
       if($_SESSION['data_user']['privilegios'] == 1 && $fecha_inicio != '' & $fecha_fin != ''){
          $cond = $cond . " AND id_area = $id_area";

       }
       //Si eres usuarios capturista y filtras por area y por fecha
       elseif ($_SESSION['data_user']['privilegios'] == 1 && $fecha_inicio == '' & $fecha_fin == '') {
          $cond = $cond . " id_area = $id_area";         
       }
        else{
          $cond = $cond . " AND id_area = $id_area";
        }

      }

    $table = 'sigi_vw_oficios_internos';
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
      array( 'db' => 'folio',   'dt' => 'folio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'id_usuario_emisor',   'dt' => 'id_usuario_emisor' ),
      array( 'db' => 'area',   'dt' => 'area' ),
      array( 'db' => 'usuario',   'dt' => 'usuario' ),
      array( 'db' => 'id_usuario_receptor',   'dt' => 'id_usuario_receptor' ),
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

  public function listarOficiosDestinoExternoAction(){

    // $initPag = new InitPaginador();

    $initPag = new InitPaginador();

    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    //Traer tosos los oficios con destino externo
      $cond = " ((
      sigi_vw_oficios_des_externo.id_usuario_receptor = $id_usuario
      AND sigi_vw_oficios_des_externo.estatus_final <> 'Cancelado'
      )
      OR (sigi_vw_oficios_des_externo.id_usuario_emisor = $id_usuario))
      ";
      //Si eres directivo ademas de tus oficios, mostrar todos los demas oficios
      if($_SESSION['data_user']['privilegios'] == 2){
        $cond = $cond." OR origen = 'Interno'";
      }

      $group_by = ' GROUP BY id_oficio ';

      //Filtros
    if(isset($_POST['fecha_inicio']) && $_POST['fecha_inicio'] != '' && isset($_POST['fecha_fin']) && $_POST['fecha_fin'] != ''){
      //Filtrar por fecha
      $fecha_inicio = $_POST['fecha_inicio'];
      $fecha_fin = $_POST['fecha_fin'];
      $cond= $cond."  AND CAST(fecha_recibido AS DATE) BETWEEN '$fecha_inicio' AND '$fecha_fin'"; 
    }
    //Filtrar por area
    if(isset($_POST['area']) && $_POST['area'] != '' && intval($_POST['area']) > 0 ){
       $id_area = intval($_POST['area']);
       $cond = $cond . " AND id_area = $id_area";
    }
    //Filtrar por estatus
    if(isset($_POST['estatus_final']) && $_POST['estatus_final'] != ''){
      $estatus_final = $_POST['estatus_final'];
        $cond= $cond."  AND estatus_final = $estatus_final"; 
    }


    $table = 'sigi_vw_oficios_des_externo';
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
      array( 'db' => 'folio',   'dt' => 'folio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'id_usuario_emisor',   'dt' => 'id_usuario_emisor' ),
      array( 'db' => 'area',   'dt' => 'area' ),
      array( 'db' => 'usuario',   'dt' => 'usuario' ),
      array( 'db' => 'id_usuario_receptor',   'dt' => 'id_usuario_receptor' ),
      array( 'db' => 'nombre_destino',   'dt' => 'nombre_destino' ),
      array( 'db' => 'cargo_destino',   'dt' => 'cargo_destino' ),
      array( 'db' => 'institucion_destino',   'dt' => 'institucion_destino' ),
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
      array( 'db' => 'folio',   'dt' => 'folio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'id_usuario_emisor',   'dt' => 'id_usuario_emisor' ),
      array( 'db' => 'area',   'dt' => 'area' ),
      array( 'db' => 'usuario',   'dt' => 'usuario' ),
      array( 'db' => 'id_usuario_receptor',   'dt' => 'id_usuario_receptor' ),
      array( 'db' => 'nombre_destino',   'dt' => 'nombre_destino' ),
      array( 'db' => 'cargo_destino',   'dt' => 'cargo_destino' ),
      array( 'db' => 'institucion_destino',   'dt' => 'institucion_destino' ),
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

  public function listarRespuestasEnviadasAction(){

    // $initPag = new InitPaginador();

    $initPag = new InitPaginador();

    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    //si eres un usuario receptor o un alto directivo, buscar solo los mensajes que te corresponden
    if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2){
      $cond = " sigi_vw_respuestas_enviadas.id_usuario_emisor = $id_usuario ";
       $group_by = ' GROUP BY id_oficio ';
    }
    //Si eres el capturista de oficios, para la correcta visualizacion del paginador se agregar este group
    else{
      $group_by = ' GROUP BY id_oficio ';
    }

    $table = 'sigi_vw_respuestas_enviadas';
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
      array( 'db' => 'folio',   'dt' => 'folio' ),
      array( 'db' => 'folio_institucion',   'dt' => 'folio_institucion' ),
      array( 'db' => 'id_usuario_emisor',   'dt' => 'id_usuario_emisor' ),
      array( 'db' => 'persona_recibe',   'dt' => 'persona_recibe' ),
      array( 'db' => 'id_usuario_receptor',   'dt' => 'id_usuario_receptor' ),
      array( 'db' => 'asunto_emisor',   'dt' => 'asunto_emisor' ),
      array( 'db' => 'estatus_inicial',   'dt' => 'estatus_inicial' ),
      array(
        'db'        => 'fecha_enviado',
        'dt'        => 'fecha_enviado',
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

 public function editAction(){
  if(isset($_REQUEST['id'])){
    $id_oficio = $_REQUEST['id'];
    $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

    //si eres un usuario receptor, buscar solo el oficio que te correponse
    if($_SESSION['data_user']['privilegios'] == 3){
      $id_usuario = $_SESSION['data_user']['id'];
    }
    else{
      header('Location: sigi.php');
      exit;
    }

    $oficio = new Oficio();
    $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
    if(empty($objOficio)){
      $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
      header('Location: sigi.php');
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
    if($_SESSION['data_user']['privilegios'] == 3){
      if($objOficio->ccp == 0){

        //en caso de ser un oficio interno quitar el usuario que lo emitio
        if($objOficio->origen == "INTERNO")
          $usuarios_ccp[] = $objOficio->id_usuario_emisor;
        //quitar de la lista de usuarios el usuario logeado
        $usuarios_ccp[] = $id_usuario;


        $usr = $usuario->ListarUsuarios($usuarios_ccp);

      }
      
    }
    $this->layout->renderVista("ofcPartes","ofcPartesEdit",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $usr, 'privilegios' => $privilegios));

    }
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

    public function viewAction(){


      if(isset($_REQUEST['id'])){
        //Buscar oficio

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
                header('Location: sigi.php');
                exit;       
              }

            }
            else{
              $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
              header('Location: sigi.php');
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
        if($_SESSION['data_user']['privilegios'] == 3 || $_SESSION['data_user']['privilegios'] == 2 ){
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
            if($objOficio->id_usuario_emisor != $id_usuario)
              $usr = $usuario->ListarUsuarios($usuarios_ccp);

          }
          
        }
        //Si eres super su, traer todos los usuarios a los que se les envio el mensaje
        else{
          $arrUsrccp = $usuario->ListarUsuariosCcp($objOficio->id_oficio);


        }
        $this->layout->renderVista("ofcPartes","ofcPartesView",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $arrUsrccp,'usuarios_turnar' => $usr, 'respuestas_recibidas' => $arrRespuestas));

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
            header('Location: sigi.php');
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

    }

    public function cancelAction(){
      if(isset($_REQUEST['id'])){
        try {
          if (!$this->validate->numero($_REQUEST['id']))
            throw new Exception("Accion no encontrada");

          $objOficioDoc =  new OficioDocumento();
          $objOficioDoc->setEstatusFinal('Cancelado');
          $objOficioDoc->setIdOficio($_REQUEST['id']);
          $objOficioDoc->setUpdatedBy($_SESSION['data_user']['id']); //Cambair por el usuario logeado
          $objOficioDoc->ActualizarEstatusFinal();

          $_SESSION['flash-message-success'] = 'Solicitud Cancelada';
          header('Location: sigi.php');
          
        } catch (Exception $e) {

          $_SESSION['flash-message-error'] = 'Error al cambiar el estatus';
          header('Location: sigi.php');
          exit;
          
        }

      }
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header('Location: sigi.php');
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
            //   header('Location: sigi.php');
            //   exit;
            // }

            $oficio = new Oficio();
            $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
            if(empty($objOficio)){
              $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
              header('Location: sigi.php');
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
            header('Location: sigi.php');
            exit;
            
          }

        
      }else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header('Location: sigi.php');
        exit;

      }

    }

    public function viewFileAction(){
      if(isset($_REQUEST['id']) && $_REQUEST['id'] != ""){
        try {
          if (!$this->validate->numero($_REQUEST['id']) || !$this->validate->numero($_REQUEST['idofc']))
              throw new Exception("Accion no encontrada");
          $documento = new Documento();
          $objDoc = $documento->getDocumento($_REQUEST['id']);

          $objOficioDoc = new OficioDocumento();
          $objOficioDoc->setFechaVisto(date("Y-m-d H:i:s"));
          $objOficioDoc->setIdDocumentos($_REQUEST['id']);
          $objOficioDoc->setIdUsuario($_SESSION['data_user']['id']);
          $objOficioDoc->FechaVistoActualizar();

          //Buscar el oficio al que pertenece el docmuento y si es un externo y no requiere responder cambiar estatus global a cerrado
          $oficio = new oficio();
          $objOficio = $oficio->getOficio($_REQUEST['idofc'],$_SESSION['data_user']['id']);
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
          header('Location: sigi.php');
          exit;
          
        }
         
      }        
      
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header('Location: sigi.php');
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
          header('Location: sigi.php');
          exit;
          
        }
      }        
      
      else{
        $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
        header('Location: sigi.php');
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
      try {
        if( !isset($_POST['check_list_user']) && empty($_POST['check_list_user']) ){
          throw new Exception('No se ha seleccionado ningun usuario.');
        }
        else
        {

          $id_usuario = $_SESSION['data_user']['id'];

          $ofc = new Oficio();

        //Buscar el oficio original y obtener sus datos
          $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);

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
         $arr_ccp = $_POST['check_list_user'];
         if(!empty($arr_ccp)){
           foreach ($arr_ccp as $ids) {
             //Hacer el guardado por id;
            $ofc_doc->setIdUsuario($ids);   
            $ofc_doc->setCcp(1); 
            $ofc_doc->RegistrarOficioDocumento();
          }            
        }
        $_SESSION['flash-message-success'] = 'Datos guardados correctamente';
        $id= $_POST['id_oficio'];

        $location = "Location: sigi.php?c=OfcPartes&a=view&id=$id";
        header($location);
        

      }

    } catch (Exception $e) {
      $_SESSION['flash-message-error'] =  $e->getMessage();
      $id= $_POST['id_oficio'];

      $location = "Location: sigi.php?c=OfcPartes&a=view&id=$id";
      header($location);
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
        header('Location: sigi.php');

        
        
        

      }
      else{
        throw new Exception("Error al guardar información");
      }
      
    } catch (Exception $e) {

      $_SESSION['flash-message-error'] = 'Error al guardar la información';
      header('Location: sigi.php');
      
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
               //   print_r($_POST);exit;


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
                 $ofc->setFechaRecepcion($_POST['fecha_recepcion']);
                 $ofc->setHoraRecepcion($_POST['hora_recepcion']);                               
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
               $ofc_doc->setEstatusFinal(2);
               $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
               $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
               
               $ofc_doc->RegistrarOficioDocumento();



               //Enviar copia solo si se selecciono de la lista de usuarios
               if(isset($_POST['check_list_user'])){
                 $arr_ccp = $_POST['check_list_user'];
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
               if(isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO'){

               }
               else{
                $obj_usr_titular = $usr->userTitulares($objArea->id,$_POST['id_usuario_receptor']);

                if(!empty($obj_usr_titular)){
                  foreach ($obj_usr_titular as $ids) {
                    $ofc_doc->setIdUsuario($ids->id_usuario);   
                    $ofc_doc->setCcp(0); //Se envia con ccp 0 para permitir que pueda responder 
                    $ofc_doc->RegistrarOficioDocumento();

                    array_push($usr_notificar, $ids->id_usuario); 
                    
                  }
                }                
               }
               /*****************/

              $_SESSION['flash-message-success'] = 'Datos guardados correctamente';

              //Armar arreglo de datos para los usuarios que se les notificara el oficio
              
              $objUsr = $usr->getUsuarioArea($_SESSION['data_user']['id']);

              $origen = ($_POST['select_origen'] == 1) ? 'INTERNO': 'EXTERNO';
              $destino = isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO' ? 'EXTERNO': 'INTERNO';

              $data = array('id_oficio' => $id_ofc,'nombre_usuario' => $objUsr->nombre_usuario.' '.$objUsr->apellido_usuario.' de '.$objUsr->area, 'asunto' => $_POST["asunto_oficio"], 'origen'=> $origen, 'destino' => $destino,'ids_usuario_receptor' => $usr_notificar);

              // header("Content-type:application/json");
              echo json_encode(array("success"=>$success,"notificacion" => $data));
              exit;
              //header('Location: sigi.php');
          }
          
      } catch (Exception $e) {
          //Trabajar en un sistema de manejo de errores
        $_SESSION['flash-message-error'] = $e->getMessage();
        echo json_encode(array("success"=>false));
        exit;
      //header('Location: sigi.php?c=OfcPartes&a=add');
      }
  }

  public function guardarRespuestaAction()
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
              $ofc->_setOrigen($_POST["origen"]);
              $ofc->setTipoOficio("RESPUESTA");
              $ofc->setFolio($folio);
              $ofc->setFolioInstitucion( isset($_POST['folio_iepc']) && $_POST['folio_iepc'] != '' && strlen($_POST['folio_iepc']) >= 7  ? $_POST['folio_iepc']: 'S/N'); //Folio de institucion cambiar
              $ofc->_setIdUsuarioEmisor($id_usuario);
              $ofc->_setNombreEmisor($objOficio->nombre_emisor);
              $ofc->_setInstitucionEmisor($objOficio->institucion_emisor);
              $ofc->_setCargo($objOficio->cargo);
              $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
              $ofc->setDestino( $objOficio->destino == 'EXTERNO' ? 'EXTERNO': 'INTERNO') ;
              $destino_notf = ($objOficio->destino == 'EXTERNO') ? 'EXTERNO': 'INTERNO';
              $ofc->setComentarios(isset($_POST['comentarios']) && $_POST['comentarios'] != '' ? $_POST['comentarios'] : '');
              $ofc->setVinculado(isset($_POST['ofc_vinculado']) && intval($_POST['ofc_vinculado']) == 1 ? 1 : 0);
              $ofc->_setAsuntoReceptor("");
              $ofc->_setRespuesta(1);
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
              $ofc_doc->setEstatusFinal(1);
              $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
              $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
              
              $ofc_doc->RegistrarOficioDocumento();

              $obj_usr_not = array();
              if($objOficio->tipo_oficio == 'SOLICITUD'){

                  //Si es solicitud marcarlo como respondido y cambiar estatus global a cerrado
                  //marcar como respondido
                  $ofc->_setId($objOficio->id_oficio);
                  $ofc->setRespondido(1);
                  $ofc->marcarRespuesta();

                  //cambiar el estatus final 
                  if($objOficio->estatus_final == 'Cerrado')
                  $objOficioDoc->setEstatusFinal('Abierto');
                  else
                  $objOficioDoc->setEstatusFinal('Cerrado');


                  $objOficioDoc->setIdOficio($_POST['id_oficio']);
                  $objOficioDoc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
                  $objOficioDoc->ActualizarEstatusFinal();

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
              if(isset($_POST['check_list_user'])){
                $arr_ccp = $_POST['check_list_user'];
                if(!empty($arr_ccp)){
                    foreach ($arr_ccp as $ids) {
                        //Hacer el guardado por id;
                        $ofc_doc->setIdUsuario($ids);   
                        $ofc_doc->setCcp(1); 
                        $ofc_doc->RegistrarOficioDocumento();
                    }            
                }
              }

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

              
              $_SESSION['flash-message-success'] = 'Datos guardados correctamente';
              //header('Location: sigi.php');

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

              $data = array('id_oficio' => $id_ofc,'nombre_usuario' => $objUsr->nombre_usuario.' '.$objUsr->apellido_usuario.' de '.$objUsr->area, 'asunto' => $_POST["asunto_oficio"], 'origen'=> $origen, 'destino' => $destino_notf,'ids_usuario_receptor' => $usr_notificar);

              // header("Content-type:application/json");
              echo json_encode(array("success"=>$success,"notificacion" => $data));
              exit;


          }
          
          
      } catch (Exception $e) {
          //Trabajar en un sistema de manejo de errores
          $_SESSION['flash-message-error'] = 'Error al guardar la información';
          echo json_encode(array("success"=>false));
          exit;
          //header('Location: sigi.php?c=OfcPartes&a=add');            
      }
  }

}


?>
