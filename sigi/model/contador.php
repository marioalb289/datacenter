<?php 

/**
* 
*/
class Contador  
{
	private $pdo;
	public $id;
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

	public function generarId(){

		try 
		{
			$sql = "INSERT INTO sigi_contador_folios SET id = ''";

			$this->pdo->prepare($sql)->execute();

			return $this->pdo->lastInsertId();

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}
}

 ?>