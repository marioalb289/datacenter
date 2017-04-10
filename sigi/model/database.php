<?php
include_once 'vendor/vlucas/phpdotenv/src/Dotenv.php';
class Database
{
    public static function StartUp()
    {

    	$host      = $_ENV['HOST'];
        $usuario   = $_ENV['USUARIO'];
        $password   = $_ENV['PASSWORD'];
        $dataBase   = $_ENV['DATABASE'];

        

        $pdo = new PDO("mysql:host=$host;dbname=$dataBase;charset=utf8", $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
        
    }
}
