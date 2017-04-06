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
	private $created_at;
	private $updated_at;
	private $created_by;
	private $updated_by;
    private $folio;

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

    public function RegistrarOficio()
    {
        try 
        {
            $sql = "INSERT INTO sigi_oficios (origen,tipo_oficio, folio,folio_institucion,id_usuario_emisor,nombre_emisor,institucion_emisor,cargo,asunto_emisor,asunto_receptor,respuesta,created_at,created_by,updated_at,updated_by)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
                ofc.tipo_oficio as tipo_oficio,
                ofc.folio AS folio,
                ofc.folio_institucion AS folio_institucion,
                ofc.id_usuario_emisor AS id_usuario_emisor,
                odr.id_usuario AS id_usuario_receptor,
                ofc.nombre_emisor AS nombre_emisor,
                ofc.cargo AS cargo,
                ofc.institucion_emisor AS institucion_emisor,
                ofc.asunto_emisor AS asunto_emisor,
                ofc.respuesta AS respuesta,
                odr.estatus_inicial AS estatus_inicial,
                odr.ccp AS ccp,
                odr.estatus_final AS estatus_final,
                doc.id as id_documento
               FROM
                sigi_oficios ofc
               JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
               JOIN sigi_documentos doc ON doc.id = odr.id_documentos
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

    

    

}


 ?>