<?php
	include "../EjemploLogin/conexionBD.php";
	$sql="INSERT INTO recetas (titulo, procedimiento, dificultad, tiempo, id_usuario) 
						VALUES (?, ?, ?, ?, ?)";
	$statement=$pdo->prepare($sql);
	//el id del usuario lo sacariamos de la sesion ($_SESSION['id']), como no tenemos ponemos 1 
	$statement->execute(
	array($_POST['titulo'],$_POST['procedimiento'],$_POST['dificultad'],$_POST['tiempo'],1)
	);
	header("Location: ejemploBD.php");
?>