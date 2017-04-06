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
				SELECT * FROM areas
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
}

 ?>