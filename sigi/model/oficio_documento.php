<?php 
/**
* 
*/
class OficioDocumento
{
	private $pdo;
	private $id;
    private $parent_id;
	private $id_oficio;
	private $id_documentos;
	private $id_usuario;
	private $ccp;
	private $fecha_visto;
	private $estatus_inicial;
	private $estatus_final;
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
     * Gets the value of id_oficio.
     *
     * @return mixed
     */
    public function getIdOficio()
    {
        return $this->id_oficio;
    }

    /**
     * Sets the value of id_oficio.
     *
     * @param mixed $id_oficio the id oficio
     *
     * @return self
     */
    public function setIdOficio($id_oficio)
    {
        $this->id_oficio = $id_oficio;

        return $this;
    }

    /**
     * Gets the value of id_documentos.
     *
     * @return mixed
     */
    public function getIdDocumentos()
    {
        return $this->id_documentos;
    }

    /**
     * Sets the value of id_documentos.
     *
     * @param mixed $id_documentos the id documentos
     *
     * @return self
     */
    public function setIdDocumentos($id_documentos)
    {
        $this->id_documentos = $id_documentos;

        return $this;
    }

    /**
     * Gets the value of id_usuario.
     *
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Sets the value of id_usuario.
     *
     * @param mixed $id_usuario the id usuario
     *
     * @return self
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Gets the value of ccp.
     *
     * @return mixed
     */
    public function getCcp()
    {
        return $this->ccp;
    }

    /**
     * Sets the value of ccp.
     *
     * @param mixed $ccp the ccp
     *
     * @return self
     */
    public function setCcp($ccp)
    {
        $this->ccp = $ccp;

        return $this;
    }

    /**
     * Gets the value of fecha_visto.
     *
     * @return mixed
     */
    public function getFechaVisto()
    {
        return $this->fecha_visto;
    }

    /**
     * Sets the value of fecha_visto.
     *
     * @param mixed $fecha_visto the fecha visto
     *
     * @return self
     */
    public function setFechaVisto($fecha_visto)
    {
        $this->fecha_visto = $fecha_visto;

        return $this;
    }

    /**
     * Gets the value of estatus_inicial.
     *
     * @return mixed
     */
    public function getEstatusInicial()
    {
        return $this->estatus_inicial;
    }

    /**
     * Sets the value of estatus_inicial.
     *
     * @param mixed $estatus_inicial the estatus inicial
     *
     * @return self
     */
    public function setEstatusInicial($estatus_inicial)
    {
        $this->estatus_inicial = $estatus_inicial;

        return $this;
    }

    /**
     * Gets the value of estatus_final.
     *
     * @return mixed
     */
    public function getEstatusFinal()
    {
        return $this->estatus_final;
    }

    /**
     * Sets the value of estatus_final.
     *
     * @param mixed $estatus_final the estatus final
     *
     * @return self
     */
    public function setEstatusFinal($estatus_final)
    {
        $this->estatus_final = $estatus_final;

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

    /**
     * Gets the value of parent_id.
     *
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Sets the value of parent_id.
     *
     * @param mixed $parent_id the parent id
     *
     * @return self
     */
    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function RegistrarOficioDocumento()
	{
		try 
		{
			$sql = "INSERT INTO sigi_oficios_documentos_recepcion (id_oficio,parent_id,id_documentos,id_usuario,ccp,fecha_visto,estatus_inicial,estatus_final,create_at,created_by,update_at,updated_by) 
			        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
	                    $this->getIdOficio(),
                        $this->getParentId(),
	                    $this->getIdDocumentos(),
	                    $this->getIdUsuario(),
	                    $this->getCcp(),
	                    $this->getFechaVisto(),
	                    $this->getEstatusInicial(),
	                    $this->getEstatusFinal(),
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

    public function FechaVistoActualizar(){
        try 
        {
            $sql = "UPDATE sigi_oficios_documentos_recepcion SET 
                        fecha_visto          = ?
                    WHERE id_documentos = ? AND id_usuario = ? ";

                    // print_r($sql);exit;

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getFechaVisto(),
                        intval($this->getIdDocumentos()),
                        intval($this->getIdUsuario()),
                    )
                );

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }

    }


    public function getOficioDocumento($id){
        try
        {

            $stm = $this->pdo->prepare("
               SELECT *
               FROM
                sigi_oficios_documentos_recepcion odr
               WHERE
                odr.id_oficio = ?
            ");
            // print_r($stm);exit;

            $stm->execute(array($id));

            return $stm->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
 
    }

    public function getUsuariosEnDocumentos($id_oficio,$id_usuario){
        try
        {

            $stm = $this->pdo->prepare("
               SELECT
                id_usuario
               FROM
                sigi_oficios_documentos_recepcion odr
               WHERE
                (id_oficio = ?
               OR parent_id = ?)
               AND id_usuario NOT IN (?)
               GROUP BY
                id_usuario
            ");
            // print_r($stm);exit;

            $stm->execute(array($id_oficio,$id_oficio,$id_usuario));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
 
    }

    public function ActualizarEstatusFinal(){
        try 
        {
            $sql = "UPDATE sigi_oficios_documentos_recepcion SET 
                        estatus_final = ?, update_at = ? , updated_by = ?
                    WHERE id_oficio = ? OR parent_id = ? ";

                    // print_r($sql);exit;

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getEstatusFinal(),
                        date('Y-m-d H:i:s'), 
                        $this->getUpdatedBy(),
                        intval($this->getIdOficio()),
                        intval($this->getIdOficio())
                    )
                );

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }

    }
    public function ActualizarEstatusFinalByUsr(){
        try 
        {
            $sql = "UPDATE sigi_oficios_documentos_recepcion SET 
                        estatus_final = ?, update_at = ? , updated_by = ?
                    WHERE (id_oficio = ? OR parent_id = ?) AND id_usuario = ? ";

                    // print_r($sql);exit;

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getEstatusFinal(),
                        date('Y-m-d H:i:s'), 
                        $this->getUpdatedBy(),
                        intval($this->getIdOficio()),
                        intval($this->getIdOficio()),
                        intval($this->getIdUsuario()),
                    )
                );

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }

    }   

    public function CancelarSolicitud(){
        try 
        {
            $sql = "UPDATE sigi_oficios_documentos_recepcion SET 
                        estatus_final = ?, update_at = ? , updated_by = ?
                    WHERE id_oficio = ? OR parent_id = ? ";

                    // print_r($sql);exit;

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $this->getEstatusFinal(),
                        date('Y-m-d H:i:s'), 
                        $this->getUpdatedBy(),
                        intval($this->getIdOficio()),
                        intval($this->getIdOficio())
                    )
                );

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }

    }

    public function getRespuestas($id_oficio){
        try
        {
            // print_r($id_oficio);
            $cond = "rr.parent_id = ? GROUP BY rr.id_oficio";
            
            $stm = $this->pdo->prepare("
               SELECT
                *
               FROM
                sigi_vw_respuestas_recibidas rr 
               WHERE
                $cond
               ORDER BY
                rr.fecha_recibido DESC
            ");
            // print_r($stm);exit;

            
            $stm->execute(array($id_oficio));

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    
}



 ?>