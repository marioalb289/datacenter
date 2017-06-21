<?php
class Database
{
    public static function StartUp()
    {

    	$host      = 'localhost';
        $usuario   = 'mario.canales';
        $password  = 'alberto289';
        $dataBase  = 'artic600_datacenter';

        

        

        $pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
        
    }
}
