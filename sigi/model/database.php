<?php
class Database
{
    public static function StartUp()
    {

    	$host      = "localhost";
        $usuario   = "root";
        $password   = "";
        $dataBase   = "datacenter";

        

        $pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
        
    }
}
