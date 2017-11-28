<?php 
/**
* 
*/
class Usuario 
{
	private $pdo;

	public $id;
	public $nombre_formal;
	public $nombre;
	public $apellido;
	public $priv_sigi;
	public $titular;
	public $contrasena;
	public $email;
	public $correo;
	public $privilegios;
	public $area;
	public $puesto;
	public $estado;
	public $created_at;
	public $created_by;
	public $updated_at;
	public $updated_by;

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
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @param mixed $pdo
     *
     * @return self
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param mixed $nombre_formal
     *
     * @return self
     */
    public function setNombreFormal($nombre_formal)
    {
        $this->nombre_formal = $nombre_formal;

        return $this;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @param mixed $apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @param mixed $priv_sigi
     *
     * @return self
     */
    public function setPrivSigi($priv_sigi)
    {
        $this->priv_sigi = $priv_sigi;

        return $this;
    }

    /**
     * @param mixed $titular
     *
     * @return self
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;

        return $this;
    }

    /**
     * @param mixed $contrasena
     *
     * @return self
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * @param mixed $email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param mixed $correo
     *
     * @return self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * @param mixed $privilegios
     *
     * @return self
     */
    public function setPrivilegios($privilegios)
    {
        $this->privilegios = $privilegios;

        return $this;
    }

    /**
     * @param mixed $area
     *
     * @return self
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @param mixed $puesto
     *
     * @return self
     */
    public function setPuesto($puesto)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNombreFormal()
    {
        return $this->nombre_formal;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @return mixed
     */
    public function getPrivSigi()
    {
        return $this->priv_sigi;
    }

    /**
     * @return mixed
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @return mixed
     */
    public function getPrivilegios()
    {
        return $this->privilegios;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @return mixed
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedBy()
    {
        return $this->updated_by;
    }

    /**
     * @param mixed $created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @param mixed $created_by
     *
     * @return self
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * @param mixed $updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @param mixed $updated_by
     *
     * @return self
     */
    public function setUpdatedBy($updated_by)
    {
        $this->updated_by = $updated_by;

        return $this;
    }

    public function getUsuarioArea($id_usuario)
    {
    	try
    	{
    		$result = array();
    		

    		$stm = $this->pdo->prepare("
    			SELECT
    				us.id AS id_usuario,
    				us.nombre_formal AS nombre_formal,
    				us.nombre AS nombre_usuario,
    				us.apellido AS apellido_usuario,
    				us.titular,
    				us.correo AS email,
    				ar.nombre AS area,
    				ar.id as id_area
    			FROM
    				usuarios us
    			JOIN areas ar ON ar.id = us.area
    			WHERE us.id = ?
    			ORDER BY us.titular
    		");
    		$stm->execute(array($id_usuario));

    		return $stm->fetch(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }

    public function ListarUsuariosCcp($id_oficio)
    {
    	try
    	{
    		$result = array();
    		

    		$stm = $this->pdo->prepare("
    			SELECT
    				us.id AS id_usuario,
    				us.nombre AS nombre_usuario,
    				us.apellido AS apellido_usuario,
    				us.nombre_formal as nombre_formal,
    				us.titular,
    				us.correo AS email,
    				ar.nombre AS area
    			FROM
    				sigi_oficios ofc
    			JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
    			JOIN sigi_documentos doc ON doc.id = odr.id_documentos
    			JOIN usuarios us ON us.id = odr.id_usuario
    			JOIN areas ar ON ar.id = us.area
    			WHERE
    				ofc.id = ? AND odr.ccp >= 0 AND odr.eliminado <> 1 AND us.priv_sigi <> 1
    		");
    		$stm->execute(array($id_oficio));

    		return $stm->fetchAll(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }

    public function reLoginUser($correo,$contrasena)
    {
    	try
    	{
    		$result = array();
    		

    		$stm = $this->pdo->prepare("
    			SELECT * FROM usuarios 
    			WHERE estado = 1
    			AND correo = ? AND contrasena = ?
    		");
    		$stm->execute(array(
    			$correo,
    			$contrasena
    			));

    		return $stm->fetch(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }

    public function ListarUsuarios($cond=array(),$cond2= "")
    {
    	try
    	{	
    		$sql = "";
    		if(!empty($cond)){
    			$plist = ':id_'.implode(',:id_', array_keys($cond));
    			$parms = array_combine(explode(",", $plist), $cond);	
    			$stm = $this->pdo->prepare("
    			SELECT us.id as id_usuario, us.nombre_formal as nombre_formal, us.nombre as nombre_usuario, us.apellido as apellido_usuario, us.correo as email,us.email as email2, us.titular, ar.nombre as area FROM usuarios us
    			JOIN areas ar ON ar.id = us.area WHERE us.id NOT IN($plist)
    			$cond2
    			ORDER BY us.titular DESC
    			");
    			$stm->execute($parms);
    		}
    		else{
    			$stm = $this->pdo->prepare("
    			SELECT us.id as id_usuario, us.nombre_formal as nombre_formal,us.nombre as nombre_usuario, us.apellido as apellido_usuario, us.correo as email,us.email as email2,us.titular, ar.nombre as area FROM usuarios us
    			JOIN areas ar ON ar.id = us.area
    			$cond2 
    			ORDER BY us.titular DESC
    			");
    			$stm->execute();

    		}
    		

    		

    		return $stm->fetchAll(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }

    public function userOfcPartes()
    {
    	try
    	{						
    		$stm = $this->pdo->prepare("
    		SELECT
    			us.id AS id_usuario,
    			us.nombre AS nombre_usuario,
    			us.apellido AS apellido_usuario,
    			us.correo AS email,
    			ar.id as id_area,
    			ar.nombre AS area,
    			us.titular
    		FROM
    			usuarios us
    		JOIN areas ar ON ar.id = us.area
    		WHERE us.priv_sigi = 1 AND ar.abreviatura = 'SE' and us.estado = 1 
    		");
    		$stm->execute();
    		return $stm->fetch(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }

    public function userTitulares($area,$id_not_usuario,$ofc_partes = false)
    {
    	try
    	{		
    		$cond = "";
    		if($ofc_partes){
    			$cond = "
    			us.area = ?
    			AND us.titular = 1
    			AND us.priv_sigi = 1
    			AND us.id NOT IN (?)
    			";
    		}
    		else{
    			$cond = "
    			us.area = ?
    			AND us.titular = 1
    			AND us.priv_sigi <> 1
    			AND us.id NOT IN (?)
    			";
    		}				
    		$stm = $this->pdo->prepare("
    		SELECT
    			us.id AS id_usuario,
    			us.nombre AS nombre_usuario,
    			us.apellido AS apellido_usuario,
    			us.correo AS email,
    			ar.id AS id_area,
    			ar.nombre AS area,
    			us.titular
    		FROM
    			usuarios us
    		JOIN areas ar ON ar.id = us.area
    		WHERE
    			$cond
    		");
    		$stm->execute(array(
    			$area,
    			$id_not_usuario
    			));
    		return $stm->fetchAll(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }

    public function buscarUsuario($id_area)
    {
    	try
    	{
    		$stm = $this->pdo
    		          ->prepare("SELECT id as id_usuario, nombre, apellido,nombre_formal FROM usuarios us WHERE area = ? AND us.titular = 1 AND us.priv_sigi <> 1  ");
    		          

    		$stm->execute(array($id_area));
    		return $stm->fetchAll(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
    public function buscarUsuarioRepetido($usuario)
    {
    	try
    	{
    		$stm = $this->pdo->prepare("
    		    SELECT
    				usr.id as id_usuario
    			FROM
    				usuarios usr
    			WHERE usr.correo = ?
    		");
    		          
    		$stm->bindParam(1, $usuario, PDO::PARAM_STR );
    		$stm->execute();
    		return $stm->fetchAll(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }	
    public function getDataUsuario($id)
    {
    	try
    	{
    		$stm = $this->pdo->prepare("
    		    SELECT
    				usr.id as id_usuario,
    				usr.nombre_formal,
    				usr.nombre,
    				usr.apellido,
    				usr.email,
    				usr.correo,
                    usr.contrasena,
    				usr.puesto,
    				usr.titular,
    				usr.estado,
    				usr.priv_sigi,
    				usr.privilegios,
    				ar.nombre as nombre_area,
    				ar.id as id_area
    			FROM
    				usuarios usr
    			JOIN areas ar ON ar.id = usr.area
    			WHERE usr.id = ?
    		");
    		          
    		$stm->bindParam(1, intval($id), PDO::PARAM_INT );
    		$stm->execute();
    		return $stm->fetch(PDO::FETCH_OBJ);
    	}
    	catch(Exception $e)
    	{
    		die($e->getMessage());
    	}
    }
    public function guardarContrasena(){
        try {

            $sql = "
                UPDATE usuarios SET
                contrasena = ?,
                updated_at = ?,
                updated_by = ?
                WHERE (`id`= ?);
            ";

            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(1, $this->getContrasena(), PDO::PARAM_STR );
            $stm->bindParam(2, date('Y-m-d H:i:s'), PDO::PARAM_STR );
            $stm->bindParam(3, $this->getUpdatedBy(), PDO::PARAM_INT );
            $stm->bindParam(4, $this->getId(), PDO::PARAM_INT );
            

            return $stm->execute();

        } catch (Exception $e) {
            die($e->getMessage());          
        }
        
    }

    public function guardarUsuario(){
    	try {
    		if($this->getId() == 0){
    			$sql = "INSERT INTO usuarios (nombre_formal,nombre,apellido,priv_sigi,titular,contrasena,email,correo,privilegios,area,puesto,estado,created_at,created_by,updated_at,updated_by)
    			        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    			$stm = $this->pdo->prepare($sql);
    			$stm->bindParam(1, $this->getNombreFormal(), PDO::PARAM_STR );
    			$stm->bindParam(2, $this->getNombre(), PDO::PARAM_STR );
    			$stm->bindParam(3, $this->getApellido(), PDO::PARAM_STR );
    			$stm->bindParam(4, intval($this->getPrivSigi()), PDO::PARAM_INT );
    			$stm->bindParam(5, intval($this->getTitular()), PDO::PARAM_INT );
    			$stm->bindParam(6, $this->getContrasena(), PDO::PARAM_STR );
    			$stm->bindParam(7, $this->getEmail(), PDO::PARAM_STR );
    			$stm->bindParam(8, $this->getCorreo(), PDO::PARAM_STR );
    			$stm->bindParam(9, $this->getPrivilegios(), PDO::PARAM_INT );
    			$stm->bindParam(10, $this->getArea(), PDO::PARAM_INT );
    			$stm->bindParam(11, $this->getPuesto(), PDO::PARAM_STR );
    			$stm->bindParam(12, $this->getEstado(), PDO::PARAM_INT );
    			$stm->bindParam(13, date('Y-m-d H:i:s'), PDO::PARAM_STR );
    			$stm->bindParam(14, $this->getCreatedBy(), PDO::PARAM_INT );
    			$stm->bindParam(15, date('Y-m-d H:i:s'), PDO::PARAM_STR );
    			$stm->bindParam(16, $this->getUpdatedBy(), PDO::PARAM_INT );
    			$stm->execute();

    			return $this->pdo->lastInsertId();
    		}else{

    			$sql = "
    			    UPDATE usuarios SET
    			    nombre_formal = ?,
    			    nombre = ?,
    			    apellido = ?,
    			    priv_sigi = ?,
    			    titular = ?,
    			    contrasena = ?,
    			    email = ?,
    			    correo = ?,
    			    privilegios = ?,
    			    area = ?,
    			    puesto = ?,
    			    estado = ?,
    			    updated_at = ?,
    			    updated_by = ?
    			    WHERE (`id`= ?);
    			";

    			$stm = $this->pdo->prepare($sql);
    			$stm->bindParam(1, $this->getNombreFormal(), PDO::PARAM_STR );
    			$stm->bindParam(2, $this->getNombre(), PDO::PARAM_STR );
    			$stm->bindParam(3, $this->getApellido(), PDO::PARAM_STR );
    			$stm->bindParam(4, intval($this->getPrivSigi()), PDO::PARAM_INT );
    			$stm->bindParam(5, intval($this->getTitular()), PDO::PARAM_INT );
    			$stm->bindParam(6, $this->getContrasena(), PDO::PARAM_STR );
    			$stm->bindParam(7, $this->getEmail(), PDO::PARAM_STR );
    			$stm->bindParam(8, $this->getCorreo(), PDO::PARAM_STR );
    			$stm->bindParam(9, $this->getPrivilegios(), PDO::PARAM_INT );
    			$stm->bindParam(10, $this->getArea(), PDO::PARAM_INT );
    			$stm->bindParam(11, $this->getPuesto(), PDO::PARAM_STR );
    			$stm->bindParam(12, $this->getEstado(), PDO::PARAM_INT );
    			$stm->bindParam(13, date('Y-m-d H:i:s'), PDO::PARAM_STR );
    			$stm->bindParam(14, $this->getUpdatedBy(), PDO::PARAM_INT );
    			$stm->bindParam(15, $this->getId(), PDO::PARAM_INT );
    			

    			return $stm->execute();

    		}    		
    	} catch (Exception $e) {
    		die($e->getMessage());    		
    	}
    	
    }
    
}
?>