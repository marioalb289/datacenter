<?php 

/**
* 
*/
class Area
{
	private $pdo;
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

	public function ListarAreas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("
				SELECT * FROM areas WHERE estado = 1
			");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarAreasById($id = 0)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("
				SELECT * FROM areas a WHERE a.id = ? LIMIT 1
			");
			$stm->execute(array($id));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarAreaByIdUser($id = 0)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("
				SELECT * from areas ar
				JOIN usuarios us ON us.area = ar.id
				WHERE us.id = ?
			");
			$stm->execute(array($id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
}

 ?>