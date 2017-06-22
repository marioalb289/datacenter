<?php 
/**
* 
*/
class Usuario 
{
	private $pdo;

	public $id;
	public $nombre;
	public $password;
	public $correo;
	public $area;
	public $estado;
	public $privilegios;
	public $titular;
	
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

	public function getUsuarioArea($id_usuario)
	{
		try
		{
			$result = array();
			

			$stm = $this->pdo->prepare("
				SELECT
					us.id AS id_usuario,
					us.nombre AS nombre_usuario,
					us.apellido AS apellido_usuario,
					us.correo AS email,
					ar.nombre AS area
				FROM
					usuarios us
				JOIN areas ar ON ar.id = us.area
				WHERE us.id = ?
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
					us.correo AS email,
					ar.nombre AS area
				FROM
					sigi_oficios ofc
				JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
				JOIN sigi_documentos doc ON doc.id = odr.id_documentos
				JOIN usuarios us ON us.id = odr.id_usuario
				JOIN areas ar ON ar.id = us.area
				WHERE
					ofc.id = ? AND odr.ccp = 1
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
				SELECT us.id as id_usuario, us.nombre_formal as nombre_formal, us.nombre as nombre_usuario, us.apellido as apellido_usuario, us.correo as email, ar.nombre as area FROM usuarios us
				JOIN areas ar ON ar.id = us.area WHERE us.id NOT IN($plist)
				$cond2
				");
				$stm->execute($parms);
			}
			else{
				$stm = $this->pdo->prepare("
				SELECT us.id as id_usuario, us.nombre_formal as nombre_formal,us.nombre as nombre_usuario, us.apellido as apellido_usuario, us.correo as email, ar.nombre as area FROM usuarios us
				JOIN areas ar ON ar.id = us.area
				$cond2 
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

	public function userTitulares($area,$id_not_usuario)
	{
		try
		{						
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
				us.area = ?
				AND us.titular = 1
				AND us.priv_sigi <> 1
				AND us.id NOT IN (?)
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
			          ->prepare("SELECT id as id_usuario, nombre, apellido FROM usuarios us WHERE area = ? AND us.titular = 1 AND us.priv_sigi <> 1  ");
			          

			$stm->execute(array($id_area));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}	
}


 ?>