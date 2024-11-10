<?php
include "../EjemploLogin/conexionBD.php";
switch($_POST['accion']){
	case null:
		header("Location: ejemploBD.php");
		break;
	case "Añadir":
		include("anadir.html");
		break;
	case "Modificar":
		include("modificar.php");
		
		break;
	case "Eliminar":
		$idReceta=$_POST['receta'];
		$stmnt=$pdo->prepare("DELETE FROM recetas WHERE id='$idReceta'");
		$stmnt->execute();
		header("Location: ejemploBD.php");
		break;
}

?>