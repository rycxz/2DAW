<?php
include ("../../modelo/conexionBD.php");
	$pdo=conexionBD();
	$receta=$pdo->query("SELECT * FROM recetas WHERE id={$_GET['idReceta']}")->fetch(PDO::FETCH_ASSOC);
	foreach($receta as $campo => $valor){
		echo "$campo: $valor <br>";
	}
	
?>