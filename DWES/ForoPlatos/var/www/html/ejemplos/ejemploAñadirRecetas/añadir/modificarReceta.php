<?php
include "../EjemploLogin/conexionBD.php";
//tendría que sanear las entradas de $_POST
$sql="UPDATE recetas SET ";
foreach($_POST as $clave => $valor){
	if($clave != "id"){
		$sql = $sql."$clave='$valor', ";
	}
}
$sql=rtrim($sql,", ");
$sql = $sql." WHERE id='{$_POST['id']}';";
$pdoStmnt=$pdo->prepare($sql);
$pdoStmnt->execute();
header("Location: ejemploBD.php");
?>