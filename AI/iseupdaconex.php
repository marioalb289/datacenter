
<?php
function Conectarse()

{
$hostname="localhost";
$username="root";
$password="";
$dbname="ai_info";


$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);

return $connection;

}
function Conectarse2()

{
$hostname="localhost";
$username="root";
$password="";
$dbname="ai_info";


$connection = mysql_connect($hostname, $username, $password);
mysql_select_db($dbname, $connection);

return $connection;

}

?>
