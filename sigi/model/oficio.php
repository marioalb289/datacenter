<?php 

/**
* 
*/
class Oficio 
{
    private $pdo;
    private $id;
    private $origen;
    private $tipo_oficio;
    private $id_usuario_emisor;
    private $nombre_emisor;
    private $institucion_emisor;
    private $folio_institucion;
    private $cargo;
    private $asunto_emisor;
    private $asunto_receptor;
    private $respuesta;
    private $respondido;
    private $destino;

    private $fecha_recepcion;
    private $hora_recepcion;

    private $comentarios;
    public $vinculado;

	private $created_at;
	private $updated_at;
	private $created_by;
	private $updated_by;
    private $folio;
    private $flag_id;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of origen.
     *
     * @return mixed
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Sets the value of origen.
     *
     * @param mixed $origen the origen
     *
     * @return self
     */
    public function _setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Gets the value of pdo.
     *
     * @return mixed
     */
    public function getFolio()
    {
        return $this->folio;
    }

    /**
     * Sets the value of pdo.
     *
     * @param mixed $pdo the pdo
     *
     * @return self
     */
    public function setFolio($folio)
    {
        $this->folio = $folio;

        return $this;
    }

    /**
     * Gets the value of pdo.
     *
     * @return mixed
     */
    public function getFolioInstitucion()
    {
        return $this->folio_institucion;
    }

    /**
     * Sets the value of pdo.
     *
     * @param mixed $pdo the pdo
     *
     * @return self
     */
    public function setFolioInstitucion($folio_institucion)
    {
        $this->folio_institucion = $folio_institucion;

        return $this;
    }

    /**
     * Gets the value of id_usuario_emisor.
     *
     * @return mixed
     */
    public function getIdUsuarioEmisor()
    {
        return $this->id_usuario_emisor;
    }

    /**
     * Sets the value of id_usuario_emisor.
     *
     * @param mixed $id_usuario_emisor the id usuario emisor
     *
     * @return self
     */
    public function _setIdUsuarioEmisor($id_usuario_emisor)
    {
        $this->id_usuario_emisor = $id_usuario_emisor;

        return $this;
    }

    /**
     * Gets the value of nombre_emisor.
     *
     * @return mixed
     */
    public function getNombreEmisor()
    {
        return $this->nombre_emisor;
    }

    /**
     * Sets the value of nombre_emisor.
     *
     * @param mixed $nombre_emisor the nombre emisor
     *
     * @return self
     */
    public function _setNombreEmisor($nombre_emisor)
    {
        $this->nombre_emisor = $nombre_emisor;

        return $this;
    }

    /**
     * Gets the value of institucion_emisor.
     *
     * @return mixed
     */
    public function getInstitucionEmisor()
    {
        return $this->institucion_emisor;
    }

    /**
     * Sets the value of institucion_emisor.
     *
     * @param mixed $institucion_emisor the institucion emisor
     *
     * @return self
     */
    public function _setInstitucionEmisor($institucion_emisor)
    {
        $this->institucion_emisor = $institucion_emisor;

        return $this;
    }

    /**
     * Gets the value of cargo.
     *
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Sets the value of cargo.
     *
     * @param mixed $cargo the cargo
     *
     * @return self
     */
    public function _setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Gets the value of asunto_emisor.
     *
     * @return mixed
     */
    public function getAsuntoEmisor()
    {
        return $this->asunto_emisor;
    }

    /**
     * Sets the value of asunto_emisor.
     *
     * @param mixed $asunto_emisor the asunto emisor
     *
     * @return self
     */
    public function _setAsuntoEmisor($asunto_emisor)
    {
        $this->asunto_emisor = $asunto_emisor;

        return $this;
    }

    /**
     * Gets the value of asunto_receptor.
     *
     * @return mixed
     */
    public function getAsuntoReceptor()
    {
        return $this->asunto_receptor;
    }

    /**
     * Sets the value of asunto_receptor.
     *
     * @param mixed $asunto_receptor the asunto receptor
     *
     * @return self
     */
    public function _setAsuntoReceptor($asunto_receptor)
    {
        $this->asunto_receptor = $asunto_receptor;

        return $this;
    }

    /**
     * Gets the value of respuesta.
     *
     * @return mixed
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * Sets the value of respuesta.
     *
     * @param mixed $respuesta the respuesta
     *
     * @return self
     */
    public function _setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Gets the value of created_at.
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Sets the value of created_at.
     *
     * @param mixed $created_at the created at
     *
     * @return self
     */
    public function _setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Gets the value of updated_at.
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Sets the value of updated_at.
     *
     * @param mixed $updated_at the updated at
     *
     * @return self
     */
    public function _setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Gets the value of created_by.
     *
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Sets the value of created_by.
     *
     * @param mixed $created_by the created by
     *
     * @return self
     */
    public function _setCreatedBy($created_by)
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * Gets the value of updated_by.
     *
     * @return mixed
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * Sets the value of updated_by.
     *
     * @param mixed $updated_by the updated by
     *
     * @return self
     */
    public function _setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;

        return $this;
    }

    /**
     * Gets the value of tipo_oficio.
     *
     * @return mixed
     */
    public function getTipoOficio()
    {
        return $this->tipo_oficio;
    }

    /**
     * Sets the value of tipo_oficio.
     *
     * @param mixed $tipo_oficio the tipo oficio
     *
     * @return self
     */
    public function setTipoOficio($tipo_oficio)
    {
        $this->tipo_oficio = $tipo_oficio;

        return $this;
    }

    /**
     * Sets the value of folio_institucion.
     *
     * @param mixed $folio_institucion the folio institucion
     *
     * @return self
     */
    private function _setFolioInstitucion($folio_institucion)
    {
        $this->folio_institucion = $folio_institucion;

        return $this;
    }

    /**
     * Sets the value of folio.
     *
     * @param mixed $folio the folio
     *
     * @return self
     */
    private function _setFolio($folio)
    {
        $this->folio = $folio;

        return $this;
    }


    /**
     * Gets the value of respondido.
     *
     * @return mixed
     */
    public function getRespondido()
    {
        return $this->respondido;
    }

    /**
     * Sets the value of respondido.
     *
     * @param mixed $respondido the respondido
     *
     * @return self
     */
    public function setRespondido($respondido)
    {
        $this->respondido = $respondido;

        return $this;
    }

     /**
     * Gets the value of destino.
     *
     * @return mixed
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Sets the value of destino.
     *
     * @param mixed $destino the destino
     *
     * @return self
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }

    /**
     * Gets the value of fecha_recepcion.
     *
     * @return mixed
     */
    public function getFechaRecepcion()
    {
        return $this->fecha_recepcion;
    }

    /**
     * Sets the value of fecha_recepcion.
     *
     * @param mixed $fecha_recepcion the fecha recepcion
     *
     * @return self
     */
    public function setFechaRecepcion($fecha_recepcion)
    {
        $this->fecha_recepcion = $fecha_recepcion;

        return $this;
    }

    /**
     * Gets the value of hora_recepcion.
     *
     * @return mixed
     */
    public function getHoraRecepcion()
    {
        return $this->hora_recepcion;
    }

    /**
     * Sets the value of hora_recepcion.
     *
     * @param mixed $hora_recepcion the hora recepcion
     *
     * @return self
     */
    public function setHoraRecepcion($hora_recepcion)
    {
        $this->hora_recepcion = $hora_recepcion;

        return $this;
    }

    /**
     * Gets the value of comentarios.
     *
     * @return mixed
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Sets the value of comentarios.
     *
     * @param mixed $comentarios the comentarios
     *
     * @return self
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Gets the value of vinculado.
     *
     * @return mixed
     */
    public function getVinculado()
    {
        return $this->vinculado;
    }

    /**
     * Sets the value of vinculado.
     *
     * @param mixed $vinculado the vinculado
     *
     * @return self
     */
    public function setVinculado($vinculado)
    {
        $this->vinculado = $vinculado;

        return $this;
    }

    public function UpdateOficio($id_oficio){
        try 
        {
            $sql = "
                UPDATE sigi_oficios SET
                `folio_institucion`= ?, 
                `nombre_emisor`=?, 
                `institucion_emisor`=?, 
                `cargo`=?, 
                `asunto_emisor`=?, 
                `respuesta`= ?, 
                `fecha_recepcion`=?, 
                `hora_recepcion`=?, 
                `comentarios`=?, 
                `respondido`=?, 
                `updated_at`=?, 
                `updated_by`=? 
                WHERE (`id`= ?);
            ";

            //print_r($sql);exit;

            $res = $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getFolioInstitucion(),
                        $this->getNombreEmisor(),
                        $this->getInstitucionEmisor(),
                        $this->getCargo(),
                        $this->getAsuntoEmisor(),
                        $this->getRespuesta(),
                        $this->getFechaRecepcion(),
                        $this->getHoraRecepcion(),
                        $this->getComentarios(),
                        $this->getRespondido(),
                        $this->getUpdatedBy(),
                        date('Y-m-d H:i:s'),
                        $id_oficio
                    )
                );

            return $res;

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }



    }

    public function RegistrarOficio()
    {
        try 
        {
            $sql = "INSERT INTO sigi_oficios (origen,tipo_oficio, folio,folio_institucion,id_usuario_emisor,nombre_emisor,institucion_emisor,cargo,asunto_emisor,asunto_receptor,respuesta,respondido,destino,fecha_recepcion,hora_recepcion,comentarios,vinculado,flag_id,created_at,created_by,updated_at,updated_by)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            //print_r($sql);exit;

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getOrigen(),
                        $this->getTipoOficio(),
                        $this->getFolio(),
                        $this->getFolioInstitucion(),
                        $this->getIdUsuarioEmisor(), 
                        $this->getNombreEmisor(), 
                        $this->getInstitucionEmisor(),
                        $this->getCargo(),
                        $this->getAsuntoEmisor(),
                        $this->getAsuntoReceptor(),
                        $this->getRespuesta(),
                        $this->getRespondido(),
                        $this->getDestino(),
                        $this->getFechaRecepcion(),
                        $this->getHoraRecepcion(),
                        $this->getComentarios(),
                        $this->getVinculado(),
                        $this->getFlagId(),
                        date('Y-m-d H:i:s'), 
                        $this->getCreatedBy(),
                        date('Y-m-d H:i:s'), 
                        $this->getUpdatedBy()
                    )
                );

            return $this->pdo->lastInsertId();

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function vincularOficio($id_oficio){
        try 
        {
            $sql = "UPDATE sigi_oficios SET 
                        origen          = ?, 
                        tipo_oficio        = ?,
                        folio        = ?,
                        folio_institucion            = ?, 
                        id_usuario_emisor = ?,
                        respuesta = ?,
                        respondido = ?,
                        destino = ?,
                        updated_by = ?,
                        updated_at = ?
                    WHERE id = ?";

            // print_r($sql);exit;

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getOrigen(),
                        $this->getTipoOficio(),
                        $this->getFolio(),
                        $this->getFolioInstitucion(),
                        $this->getIdUsuarioEmisor(), 
                        $this->getRespuesta(),
                        $this->getRespondido(),
                        $this->getDestino(),
                        $this->getUpdatedBy(),
                        date('Y-m-d H:i:s'),
                        $id_oficio
                    )
                );


        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function getOficio($id_oficio,$id_usuario =''){
        try
        {
            $cond = "";
            
            if($id_usuario != '')
                $cond = " (ofc.id = ? AND odr.id_usuario = ?) OR ( ofc.id = ? AND ofc.id_usuario_emisor = ? ) ";
            else
                $cond = " ofc.id = ? GROUP BY id_oficio";

            $stm = $this->pdo->prepare("
               SELECT
                ofc.id AS id_oficio,
                ofc.origen as origen,
                ofc.destino as destino,
                ofc.tipo_oficio as tipo_oficio,
                ofc.fecha_recepcion as fecha_recepcion,
                ofc.hora_recepcion as hora_recepcion,
                ofc.comentarios as comentarios,
                ofc.folio AS folio,
                ofc.folio_institucion AS folio_iepc,
                ofc.respondido AS respondido,
                ofc.id_usuario_emisor AS id_usuario_emisor,
                odr.id_usuario AS id_usuario_receptor,
                ofc.nombre_emisor AS nombre_emisor,
                ofc.cargo AS cargo,
                ofc.institucion_emisor AS institucion_emisor,
                ofc.asunto_emisor AS asunto_emisor,
                ofc.respuesta AS respuesta,
                ofc.vinculado as vinculado,
                ofc.flag_id as flag_id,
                odr.id as id_oficio_documento,
                odr.estatus_inicial AS estatus_inicial,
                odr.ccp AS ccp,
                odr.estatus_final AS estatus_final,
                doc.id as id_documento,
                doc.nombre as doc_nombre,
                odr.parent_id as parent_id,
                odr.fecha_visto as fecha_visto
               FROM
                sigi_oficios ofc
               JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
               LEFT JOIN sigi_documentos doc ON doc.id = odr.id_documentos
               WHERE
                $cond
            ");
            // print_r($stm);exit;

            if($id_usuario != '')
                $stm->execute(array($id_oficio,$id_usuario, $id_oficio, $id_usuario));
            else
                 $stm->execute(array($id_oficio));

            return $stm->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function buscarNumOficio($num){
        try
        {

            $stm = $this->pdo->prepare("
               SELECT
                id
               FROM
                sigi_oficios ofc
               WHERE
                ofc.folio_institucion = ?
            ");
            // print_r($stm);exit;

            $stm->execute(array($num));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function buscaUsuarioEnSolicitud($id_oficio,$id_usuario){
        try
        {

            $stm = $this->pdo->prepare("
               SELECT
                id
               FROM
                sigi_oficios_documentos_recepcion
               WHERE
                id_oficio = ?
               AND id_usuario = ?
            ");
            // print_r($stm);exit;

            $stm->execute(array($id_oficio,$id_usuario));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    public function ListarOficiosExternos()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("
               SELECT
                ofc.id AS id_oficio,
                ofc.origen,
                ofc.folio AS folio,
                ofc.folio_institucion AS folio_institucion,
                ofc.id_usuario_emisor AS id_usuario_emisor,
                odr.id_usuario AS id_usuario_receptor,
                ofc.nombre_emisor AS nombre_emisor,
                ofc.cargo AS cargo,
                ofc.institucion_emisor AS institucion_emisor,
                ofc.asunto_emisor AS asunto_emisor,
                odr.estatus_inicial AS estatus_inicial,
                odr.estatus_final AS estatus_final
               FROM
                sigi_oficios ofc
               JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
               JOIN sigi_documentos doc ON doc.id = odr.id_documentos
               WHERE origen = 'EXTERNO'
               GROUP BY id_oficio
            ");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function ListarOficiosInternos()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("
               SELECT
                ofc.id AS id_oficio,
                ofc.origen AS origen,
                ofc.folio AS folio,
                ofc.id_usuario_emisor AS id_usuario_emisor,
                odr.id_usuario AS id_usuario_receptor,
                ar.nombre AS area,
                us.correo AS usuario,
                ofc.asunto_emisor AS asunto_emisor,
                odr.estatus_inicial AS estatus_inicial,
                odr.estatus_final AS estatus_final
               FROM
                sigi_oficios ofc
               JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
               JOIN sigi_documentos doc ON doc.id = odr.id_documentos
               JOIN usuarios us ON us.id = ofc.id_usuario_emisor
               JOIN areas ar ON ar.id = us.area
               WHERE
                origen = 'INTERNO'
               GROUP BY
                id_oficio
            ");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function busquedaAuto($busqueda,$tipo)
    {
        try
        {
            $result = array();
            $cond = '';

            switch ($tipo) {
                case 'institucion':
                    $cond = " ofc.institucion_emisor LIKE ?";
                    break;
                case 'emisor':
                    $cond = " ofc.nombre_emisor LIKE ?";
                    break;
                case 'cargo':
                    $cond = " ofc.cargo LIKE ?";
                    break;
            }

            // print_r($cond);

            $stm = $this->pdo->prepare("
               SELECT DISTINCT
                ofc.institucion_emisor,
                ofc.nombre_emisor,
                ofc.cargo
               FROM
                sigi_oficios ofc
               WHERE
                $cond
            ");
            $stm->execute(array("%$busqueda%"));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function marcarRespuesta()
    {
        try 
        {
            $sql = "UPDATE sigi_oficios SET 
                        respondido          = ? 
                    WHERE id = ?";

                    // print_r($sql);exit;

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getRespondido(), 
                        $this->getId()
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }


    

    

    /**
     * @return mixed
     */
    public function getFlagId()
    {
        return $this->flag_id;
    }

    /**
     * @param mixed $flag_id
     *
     * @return self
     */
    public function setFlagId($flag_id)
    {
        $this->flag_id = $flag_id;

        return $this;
    }
}


 ?>