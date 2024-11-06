<?php 
//Conectarnos a la BD
$pdo = new PDO("mysql:host=localhost;dbname=daw","root","");

//Escribo mi sql en una variable por comodidad. ¡¡SIN PUNTO Y COMA!!
$sql = "SELECT pwd,username FROM usuarios";

//Ejecuto la query, me devuelve un objeto de la clase PDOStamement
$resultado=$pdo->query($sql);

echo "<br><br>";
//Recupero un resultado
$usuario = $resultado->fetch(PDO::FETCH_ASSOC);
print_r($usuario);
exit();
//El resultado me llega como array asociativo con el nombre del campo
echo($usuario["username"]);
echo "<br><br>";
//... y como array normal
echo($usuario[0]);
?>