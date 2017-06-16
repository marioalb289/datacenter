<?php 
/**
* 
*/
class ReportesParam
{
	private $pdo;
	private $id;
	private $id_usuario;
	private $params;
	private $active;
	private $created_at;
	private $created_by;

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
	 * Gets the value of params.
	 *
	 * @return mixed
	 */
	public function getParams()
	{
	    return $this->params;
	}

	/**
	 * Sets the value of params.
	 *
	 * @param mixed $params the params
	 *
	 * @return self
	 */
	public function setParams($params)
	{
	    $this->params = $params;

	    return $this;
	}

	/**
	 * Gets the value of active.
	 *
	 * @return mixed
	 */
	public function getActive()
	{
	    return $this->active;
	}

	/**
	 * Sets the value of active.
	 *
	 * @param mixed $active the active
	 *
	 * @return self
	 */
	public function setActive($active)
	{
	    $this->active = $active;

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
	public function setCreatedAt($created_at)
	{
	    $this->created_at = $created_at;

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
	
	function __construct()
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

	public function RegistrarParamReporte()
	{
	    try 
	    {
	        $sql = "INSERT INTO sigi_reportes_param (id_usuario, params, active, created_at, created_by)
	                VALUES (?, ?, ?, ?, ?)";

	        //print_r($sql);exit;

	        $this->pdo->prepare($sql)
	             ->execute(
	                array(
	                    $this->getIdUsuario(),
	                    $this->getParams(),
	                    $this->getActive(),
	                    date('Y-m-d H:i:s'), 
	                    $this->getCreatedBy()
	                )
	            );

	        return $this->pdo->lastInsertId();

	    } catch (Exception $e) 
	    {
	        die($e->getMessage());
	    }
	}
	public function buscarParamReportes($id_param){
        try
        {

            $stm = $this->pdo->prepare("
               SELECT
                *
               FROM
                sigi_reportes_param
               WHERE
                id = ?
            ");
            // print_r($stm);exit;

            $stm->execute(array($id_param));
            return $stm->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }

    }

    
}


 ?>