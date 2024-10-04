<?php
echo "Hola mundo desde Apache<br><br>";

$pdo = new PDO("mysql:host=mysql-db;dbname=daw","admin","admin");
$sql = "select * from Credenciales ";

$resultado=$pdo->query($sql);
 
echo "<br>";
echo($resultado->fetch()["username"]);
echo "<br>";
echo ($resultado->fetch()["username"]);
?>
