<?php 

/**
* 
*/
class Documento
{
	private $pdo;
	private $id;
	private $nombre;
	private $respuesta;
	private $ruta;
	private $create_at;
	private $created_by;
	private $updated_at;
	private $updated_by;

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
     * Gets the value of pdo.
     *
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Sets the value of pdo.
     *
     * @param mixed $pdo the pdo
     *
     * @return self
     */
    private function _setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of nombre.
     *
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Sets the value of nombre.
     *
     * @param mixed $nombre the nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Gets the value of ruta.
     *
     * @return mixed
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Sets the value of ruta.
     *
     * @param mixed $ruta the ruta
     *
     * @return self
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Gets the value of create_at.
     *
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * Sets the value of create_at.
     *
     * @param mixed $create_at the create at
     *
     * @return self
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;

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
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;

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
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

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
    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;

        return $this;
    }


    public function RegistrarDocumento()
	{
		try 
		{
			$sql = "INSERT INTO sigi_documentos (nombre,respuesta,ruta,create_at,created_by,updated_at,updated_by) 
			        VALUES (?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $this->getNombre(),
	                    $this->getRespuesta(), 
	                    $this->getRuta(), 
	                    date('Y-m-d H:i:s'), 
	                    $this->getCreatedBy(),
	                    date('Y-m-d H:i:s'),
	                    $this->getUpdatedBy(),
	                )
				);

			return $this->pdo->lastInsertId();

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function getDocumento($id_documento){
        try 
        {
            $result = array();

            $stm = $this->pdo->prepare("
               SELECT *                
               FROM
                sigi_documentos doc
               WHERE doc.id = ?
            ");
            $stm->execute(array($id_documento));

            return $stm->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }

    }
}


 ?>