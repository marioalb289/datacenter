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
//require_once ("/../view/header.php");


class OfcPartesController
{
	private $layout;

  public function __CONSTRUCT()
  {
    try
    {
      $this->layout = new Layout();    
    }
    catch(Exception $e)
    {
      die($e->getMessage());
    }
  }


  public function IndexAction(){
    $this->layout->renderVista("ofcPartes","ofcPartes");
  }

  public function listarOficiosExternosAction(){

    $initPag = new InitPaginador();
    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    //si eres un usuario receptor, buscar solo los mensajes que te corresponden
    if($_SESSION['data_user']['privilegios'] == 3){
      $cond = " sigi_vw_oficios_externos.id_usuario_receptor = $id_usuario ";
    }
    //Si eres el capturista de oficios, para la correcta visualizacion del paginador se agregar este group
    else{
      $group_by = ' GROUP BY id_oficio ';
    }

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

    //si eres un usuario receptor, buscar solo los mensajes que te corresponden
    if($_SESSION['data_user']['privilegios'] == 3){
      $cond = " sigi_vw_oficios_internos.id_usuario_receptor = $id_usuario OR sigi_vw_oficios_internos.id_usuario_emisor = $id_usuario GROUP BY id_oficio  ";
    }
    //Si eres el capturista de oficios, para la correcta visualizacion del paginador se agregar este group
    else{
      $group_by = ' GROUP BY id_oficio ';
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

  public function listarRespuestasEnviadasAction(){

    // $initPag = new InitPaginador();

    $initPag = new InitPaginador();

    $cond = '';
    $group_by = '';
    $id_usuario = $_SESSION['data_user']['id'];

    //si eres un usuario receptor, buscar solo los mensajes que te corresponden
    if($_SESSION['data_user']['privilegios'] == 3){
      $cond = " sigi_vw_respuestas_enviadas.id_usuario_emisor = $id_usuario   GROUP BY id_oficio";
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
    $ar = $area->ListarAreas();
    $area_usuario = $usuario->getUsuarioArea($_SESSION['data_user']['id']);
    $privilegios = $_SESSION['data_user']['privilegios'];

        //require_once ("/../view/header.php");
        //require_once '/../view/ofcPartes/ofcPartesAdd.php';
    $this->layout->renderVista("ofcPartes","ofcPartesAdd",array('usuarios' => $usr, 'areas' => $ar,'privilegios' => $privilegios,'area_usuario'=>$area_usuario));

  }

  public function editAction(){
    

    //Buscar oficio
    if(isset($_REQUEST['id'])){
        $id_oficio = $_REQUEST['id'];
        $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

        $oficio = new Oficio();
        $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
        if(empty($objOficio)){
          $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
          header('Location: sigi.php');
          exit;
        }

        $usuario = new Usuario();
        $usr = $usuario->ListarUsuarios();
        $area =  new Area();
        $ar = $area->ListarAreas();

        $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
        $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);
        $arrUsrccp = $usuario->ListarUsuariosCcp($objOficio->id_oficio);
        // print_r($objOficio);
        // print_r($objUserReceptor);
        // print_r($objUserEmisor);
        // exit;
        $this->layout->renderVista("ofcPartes","ofcPartesEdit",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $arrUsrccp));

    }

  }

  public function viewAction(){
    

    //Buscar oficio
    if(isset($_REQUEST['id'])){
        $id_oficio = $_REQUEST['id'];
        $id_usuario = ''; //Aqui deberia sacar el usuario y el rol que este logeado

        //si eres un usuario receptor, buscar solo el oficio que te correponse
        if($_SESSION['data_user']['privilegios'] == 3){
          $id_usuario = $_SESSION['data_user']['id'];
        }
        // print_r($id_oficio);
        // print_r($id_usuario);
        $oficio = new Oficio();
        $objOficio = $oficio->getOficio($id_oficio,$id_usuario);
        if(empty($objOficio)){
          $_SESSION['flash-message-error'] = 'Error al recuperar la Información';
          header('Location: sigi.php');
          exit;
        }

        // print_r($objOficio);exit;

        $usuario = new Usuario();
        $usr = array(); 

        //Traer la lista de respuestas recibidas a este folio
        $ofc_doc =  new OficioDocumento();
        $arrRespuestas = $ofc_doc->getRespuestas($objOficio->id_oficio);
        //$area =  new Area();
        //$ar = $area->ListarAreas();
        $usuarios_ccp = array();

        $objUserReceptor = $usuario->getUsuarioArea($objOficio->id_usuario_receptor);
        $objUserEmisor = $usuario->getUsuarioArea($objOficio->id_usuario_emisor);

        $arrUsrccp = array();
        //Si eres un usuario receptor cargar los usuarios que tambien recibieron el mensaje solo si eres el titular del mensaje, y solo el titular puede turnar a otros usuarios
        if($_SESSION['data_user']['privilegios'] == 3){
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
        // print_r($objOficio);
        // print_r($objUserReceptor);
        // print_r($objUserEmisor);
        // exit;
        $this->layout->renderVista("ofcPartes","ofcPartesView",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $arrUsrccp,'usuarios_turnar' => $usr, 'respuestas_recibidas' => $arrRespuestas));

    }

  }

  public function responseAction(){
    

    //Buscar oficio
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
        $this->layout->renderVista("ofcPartes","ofcPartesResponse",array('oficio' => $objOficio, 'usuario_emisor' => $objUserEmisor, 'usuario_receptor' => $objUserReceptor,'usuarios' => $usr));

    }

  }

  public function viewFileAction(){
      // print_r($_REQUEST['id']);
      if(isset($_REQUEST['id']) && $_REQUEST['id'] != ""){
        $documento = new Documento();
        $objDoc = $documento->getDocumento($_REQUEST['id']);

        $objOficioDoc = new OficioDocumento();
        $objOficioDoc->setFechaVisto(date("Y-m-d H:i:s"));
        $objOficioDoc->setIdDocumentos($_REQUEST['id']);
        $objOficioDoc->setIdUsuario($_SESSION['data_user']['id']);
        $objOficioDoc->FechaVistoActualizar();

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
        }        
      
      else{
        exit;
      }

    

  }
  public function downloadFileAction(){
      // print_r($_REQUEST['id']);
      if(isset($_REQUEST['id']) && $_REQUEST['id'] != ""){
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
        }        
      
      else{
        exit;
      }

    

  }

  public function buscadorInstitucionAction(){

        // print_r($_REQUEST);exit;

      if(isset($_REQUEST['term']) && $_REQUEST['term'] != ""){
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
      }       
  }

  public function buscadorEmisorAction(){

        // print_r($_REQUEST);exit;

      if(isset($_REQUEST['term']) && $_REQUEST['term'] != ""){
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
      }       
  }

  public function buscadorCargoAction(){

        // print_r($_REQUEST);exit;

      if(isset($_REQUEST['term']) && $_REQUEST['term'] != ""){
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
      }       
  }

  public function buscarUsuarioAction(){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(isset($_POST['id_area']) && $_POST['id_area'] != ""){
        $usuario = new Usuario();
        $usr = $usuario->buscarUsuario($_POST['id_area']);

        if(!empty($usr)){

          echo json_encode(array('success' => true,'data' => array('id_usuario' => $usr->id, 'usuario' => $usr->nombre.' '.$usr->apellido)));
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
        header('Location: sigi.php');
        

      }

     } catch (Exception $e) {
        //Trabajar en un sistema de manejo de errores
      // print_r("aqui");exit;
      $_SESSION['flash-message-error'] =  $e->getMessage();
      $id= $_POST['id_oficio'];

      $location = "Location: sigi.php?c=OfcPartes&a=view&id=$id";
       header($location);
    }

  }

  public function guardarAction(){
    try {
      if( !isset($_FILES['archivo']) ){
        throw new Exception('No se ha seleccionado ningun archivo.');
      }
      else
      {
        print_r($_FILES);
          // throw new Exception('No se ha seleccionado ningun archivo.');
          // print_r($_POST);exit;
        $origen = ($_POST['select_origen'] == 1) ? 'I': 'E';
        $area = new Area();
        $objArea = $area->ListarAreasById($_POST['area_destino'])['0'];

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
          }else{             

            if( file_exists( 'documentos/'.$folio_archivo) ){
                  //Archivo ya existente
            }else{
                  //crear archivo
              // print_r($absolute_path ."/documentos/" . $newfilename);
              // print_r("aqui");exit;
              if(move_uploaded_file($nombre_tmp,
                "documentos/" . $newfilename)){

              }
              else{
                print_r("no se subio archivo");
                exit;
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
        $documento->setRuta('documentos/');
          $documento->setCreatedBy($id_usuario); //Asignar el user logeado
          $documento->setUpdatedBy ($id_usuario); //Asingar el user logeado;
          $id_documento = $documento->RegistrarDocumento();


          //Guardar oficio

          $ofc = new Oficio();

          $ofc->_setOrigen($_POST["select_origen"]);
          $ofc->setTipoOficio("SOLICITUD");
          $ofc->setFolio($folio);
          $ofc->setFolioInstitucion($folio); //Folio de institucion cambiar
          $ofc->_setIdUsuarioEmisor(($_POST["id_usuario_origen"] == '') ? 0: $_POST["id_usuario_origen"]);
          $ofc->_setNombreEmisor( isset($_POST["nombre_emisor"]) ? $_POST["nombre_emisor"] : "");
          $ofc->_setInstitucionEmisor( isset( $_POST["institucion_emisor"]) ? $_POST["institucion_emisor"]: "" );
          $ofc->_setCargo( isset($_POST["cargo_emisor"]) ? $_POST["cargo_emisor"]: "");
          $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
          $ofc->_setAsuntoReceptor("");
          $ofc->_setRespuesta($_POST["respuesta"]);
          $ofc->_setCreatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
          $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
          $id_ofc = $ofc->RegistrarOficio();


          //Guardar Registro del oficio con documento
          $ofc_doc = new OficioDocumento();

          $ofc_doc->setIdOficio($id_ofc);    
          $ofc_doc->setParentId(null);    
          $ofc_doc->setIdDocumentos($id_documento);
          $ofc_doc->setIdUsuario($_POST['id_usuario_receptor']);   
          $ofc_doc->setCcp(0);         
          $ofc_doc->setFechaVisto('');  
          $ofc_doc->setEstatusInicial(($_POST['respuesta'] == 0) ? 2: 1);
          $ofc_doc->setEstatusFinal(2);
          $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
          $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
          
          $ofc_doc->RegistrarOficioDocumento();



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
         header('Location: sigi.php');

       }

     } catch (Exception $e) {
        //Trabajar en un sistema de manejo de errores
      print_r($e->getMessage());
      //exit;
      $_SESSION['flash-message-error'] = $e->getMessage();
      header('Location: sigi.php?c=OfcPartes&a=add');
    }



  }

  public function guardarRespuestaAction(){
    try {
      if( !isset($_FILES['archivo']) ){
        throw new Exception('No se ha seleccionado ningun archivo.');
      }
      else
      {
        print_r($_FILES);
        print_r($_REQUEST);
        // exit;

         //Buscar el oficio original y obtener sus datos
        $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado
        $ofc = new Oficio();
          $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);
          print_r($objOficio);exit;
          // throw new Exception('No se ha seleccionado ningun archivo.');
          // print_r($_POST['origen']);exit;
        
        $origen = ($_POST['origen'] == 'INTERNO') ? 'I': 'E';
        $area = new Area();
        $objArea = $area->ListarAreasById($_SESSION['data_user']['area'])['0'];

        $id_usuario = $_SESSION['data_user']['id']; //id de usuario logeado

        //Generar el folio de RESPUESTA
        $contador = new Contador();
        $id = $contador->generarId();
        $folio = str_pad($id,8,'0',STR_PAD_LEFT);
        $folio_archivo = 'R'.$folio.date("Y-m-d-H-i-s").$objArea->abreviatura;

        $temp = explode(".", $_FILES["archivo"]["name"]);
        $newfilename = $folio_archivo . '.' . end($temp);
          // exit;



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

        if( $ext_correcta && $tipo_correcto && $tamano <= $limite ){
          if( $_FILES['archivo']['error'] > 0 ){
                //Error al subir el archivo, tipo incorrecto o tamaño excesido
            throw new Exception('Error al subir el archivo');
          }else{             

            if( file_exists( 'documentos/'.$folio_archivo) ){
                  //Archivo ya existente
            }else{
                  //crear archivo
              move_uploaded_file($nombre_tmp,
                "documentos/" . $newfilename);

                  //
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
        $documento->setRuta('documentos/');
          $documento->setCreatedBy($id_usuario); //Asignar el user logeado
          $documento->setUpdatedBy ($id_usuario); //Asingar el user logeado;
          $id_documento = $documento->RegistrarDocumento();


          

          $ofc = new Oficio();

          //Buscar el oficio original y obtener sus datos
          $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);
          
          //cambiar el estatus final a cerrado
          $objOficioDoc =  new OficioDocumento();
          $objOficioDoc->setEstatusFinal('Cerrado');
          $objOficioDoc->setIdOficio($_POST['id_oficio']);
          $objOficioDoc->ActualizarEstatusFinal();

          $ofc->_setId($objOficio->id_oficio);
          $ofc->setRespondido(1);
          $ofc->marcarRespuesta();



          //Guardar oficio
          $ofc->_setOrigen($_POST["origen"]);
          $ofc->setTipoOficio("RESPUESTA");
          $ofc->setFolio($folio);
          $ofc->setFolioInstitucion($folio); //Folio de institucion cambiar
          $ofc->_setIdUsuarioEmisor($id_usuario);
          $ofc->_setNombreEmisor($objOficio->nombre_emisor);
          $ofc->_setInstitucionEmisor($objOficio->institucion_emisor);
          $ofc->_setCargo($objOficio->cargo);
          $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
          $ofc->_setAsuntoReceptor("");
          $ofc->_setRespuesta(1);
          $ofc->_setCreatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
          $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
          $id_ofc = $ofc->RegistrarOficio();


          //Guardar Registro del oficio con documento
          $ofc_doc = new OficioDocumento();

          $ofc_doc->setIdOficio($id_ofc);    
          $ofc_doc->setParentId($objOficio->id_oficio);    
          $ofc_doc->setIdDocumentos($id_documento);
          $ofc_doc->setIdUsuario($objOficio->id_usuario_emisor);   
          $ofc_doc->setCcp(0);         
          $ofc_doc->setFechaVisto('');  
          $ofc_doc->setEstatusInicial(($_POST['respuesta'] == 0) ? 2: 1);
          $ofc_doc->setEstatusFinal(2);
          $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
          $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
          
          $ofc_doc->RegistrarOficioDocumento();



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
         header('Location: sigi.php');

       }

     } catch (Exception $e) {
        //Trabajar en un sistema de manejo de errores
      $_SESSION['flash-message-error'] = 'Error al guardar la información';
      header('Location: sigi.php?c=OfcPartes&a=add');
    }



  }
}


?>
