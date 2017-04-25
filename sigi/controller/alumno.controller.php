<?php
// echo __DIR__.'/../class/user.php';exit;
// require_once (__DIR__.'../model/alumno.php');
require_once('/../model/alumno.php');

class AlumnoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Alumno();
    }
    
    public function Index(){
        // require_once '/../view/header.php';
        require_once '/../view/alumno/alumno.php';
        // require_once '/../view/footer.php';
    }
    
    public function Crud(){
        $alm = new Alumno();

        // print_r($_REQUEST);exit;
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        // require_once '/../view/header.php';
        require_once '/../view/alumno/alumno-editar.php';
        // require_once '/../view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Alumno();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellido = $_REQUEST['Apellido'];
        $alm->Correo = $_REQUEST['Correo'];
        $alm->Sexo = $_REQUEST['Sexo'];
        $alm->FechaNacimiento = $_REQUEST['FechaNacimiento'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: sigi.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: sigi.php');
    }

    public function guardarAction(){
        try {
            if( !isset($_FILES['archivo']) ){
              throw new Exception('No se ha seleccionado ningun archivo.');
            }
            else{
                 // print_r($_FILES);
                   // throw new Exception('No se ha seleccionado ningun archivo.');
                   // print_r($_POST);exit;
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

                     if( file_exists( 'documentos/'.$folio_archivo) ){
                           //Archivo ya existente
                     }

                     else{
                           //crear archivo
                       if(move_uploaded_file($nombre_tmp,"documentos/" . $newfilename)){

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
                 $documento->setRuta('documentos/');
                 $documento->setCreatedBy($id_usuario); //Asignar el user logeado
                 $documento->setUpdatedBy ($id_usuario); //Asingar el user logeado;
                 $id_documento = $documento->RegistrarDocumento();


                 //Guardar oficio

                 $ofc = new Oficio();

                 $ofc->_setOrigen($_POST["select_origen"]);
                 $ofc->setTipoOficio("SOLICITUD");
                 $ofc->setFolio($folio);
                 $ofc->setFolioInstitucion( isset($_POST['folio_iepc']) ? $_POST['folio_iepc']: ''); //Folio de institucion cambiar
                 $ofc->_setIdUsuarioEmisor(($_POST["id_usuario_origen"] == '') ? 0: $_POST["id_usuario_origen"]);
                 $ofc->_setNombreEmisor( isset($_POST["nombre_emisor"]) ? $_POST["nombre_emisor"] : "");
                 $ofc->_setInstitucionEmisor( isset( $_POST["institucion_emisor"]) ? $_POST["institucion_emisor"]: "" );
                 $ofc->_setCargo( isset($_POST["cargo_emisor"]) ? $_POST["cargo_emisor"]: "");
                 $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
                 $ofc->_setAsuntoReceptor("");
                 $ofc->_setRespuesta($_POST["respuesta"]);
                 $ofc->setDestino( isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO' ? 'EXTERNO': 'INTERNO') ;
                 $ofc->_setCreatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
                 $ofc->_setUpdatedBy($id_usuario); //aqui deberia sacar el usuario actual de sesion
                 $id_ofc = $ofc->RegistrarOficio();


                 //Guardar Registro del oficio con documento
                 $ofc_doc = new OficioDocumento();

                 $ofc_doc->setIdOficio($id_ofc);    
                 $ofc_doc->setParentId(null);    
                 $ofc_doc->setIdDocumentos($id_documento);

                 //Si es un oficio con destino a dependencia externa buscar y asingar el usuario titular de ofc de partes
                 if(isset($_POST['destino']) && $_POST['destino'] == 'EXTERNO'){
                   $usr = new Usuario();
                   $objUsr = $usr->userOfcPartes();
                   $ofc_doc->setIdUsuario($objUsr->id_usuario);

                 }
                 else{
                   $ofc_doc->setIdUsuario($_POST['id_usuario_receptor']);   
                 }
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
        $_SESSION['flash-message-error'] = $e->getMessage();
        header('Location: sigi.php?c=OfcPartes&a=add');
        }
    }

    public function guardarRespuestaAction()
    {
        try {
           if( !isset($_FILES['archivo']) ){
                 throw new Exception('No se ha seleccionado ningun archivo.');
            } else {
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

                  if( $ext_correcta && $tipo_correcto ){//&& $tamano <= $limite ){
                    if( $_FILES['archivo']['error'] > 0 ){
                          //Error al subir el archivo, tipo incorrecto o tamaño excesido
                      throw new Exception('Error al subir el archivo');
                    }else{             

                      if( file_exists( 'documentos/'.$folio_archivo) ){
                            //Archivo ya existente
                      }else{
                            //crear archivo
                        if(move_uploaded_file($nombre_tmp,
                          "documentos/" . $newfilename)){

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
                $documento->setRuta('documentos/');
                $documento->setCreatedBy($id_usuario); //Asignar el user logeado
                $documento->setUpdatedBy ($id_usuario); //Asingar el user logeado;
                $id_documento = $documento->RegistrarDocumento();

                $ofc = new Oficio();
                $objOficioDoc =  new OficioDocumento();

                //Buscar el oficio del mensaje recibido y obtener sus datos
                $objOficio = $ofc->getOficio($_POST['id_oficio'],$id_usuario);

                //Guardar oficio
                $ofc->_setOrigen($_POST["origen"]);
                $ofc->setTipoOficio("RESPUESTA");
                $ofc->setFolio($folio);
                $ofc->setFolioInstitucion( isset($_POST['folio_iepc']) ? $_POST['folio_iepc']: ''); //Folio de institucion cambiar
                $ofc->_setIdUsuarioEmisor($id_usuario);
                $ofc->_setNombreEmisor($objOficio->nombre_emisor);
                $ofc->_setInstitucionEmisor($objOficio->institucion_emisor);
                $ofc->_setCargo($objOficio->cargo);
                $ofc->_setAsuntoEmisor($_POST["asunto_oficio"]);
                $ofc->setDestino( $objOficio->destino == 'EXTERNO' ? 'EXTERNO': 'INTERNO') ;
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
                $ofc_doc->setEstatusInicial(($_POST['respuesta'] == 0) ? 2: 1);
                $ofc_doc->setEstatusFinal(1);
                $ofc_doc->setCreatedBy($id_usuario); //Cambair por el usuario logeado   
                $ofc_doc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
                
                $ofc_doc->RegistrarOficioDocumento();

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
                }
                else{
                    //Sie es la respuesta de una respuesta, marcar la respuesta recibida como respondido y cambiar el estatus de la solicitud principal
                    $ofc->_setId($objOficio->id_oficio);
                    $ofc->setRespondido(1);
                    $ofc->marcarRespuesta();

                    //Buscar el oficio original
                    $arr = $ofc_doc->getOficioDocumento($objOficio->parent_id);
                    $objOficioOriginal = $ofc->getOficio($arr->id_oficio,$id_usuario);

                    //cambiar el estatus final 
                    if($objOficioOriginal->estatus_final == 'Cerrado')
                     $objOficioDoc->setEstatusFinal('Abierto');
                    else
                     $objOficioDoc->setEstatusFinal('Cerrado');

                    $objOficioDoc->setIdOficio($objOficioOriginal->id_oficio);
                    $objOficioDoc->setUpdatedBy($id_usuario); //Cambair por el usuario logeado
                    $objOficioDoc->ActualizarEstatusFinal();
                }

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