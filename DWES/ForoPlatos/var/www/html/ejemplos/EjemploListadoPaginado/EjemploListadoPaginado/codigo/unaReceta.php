<?php
	$pdo=new PDO("mysql:host=localhost;dbname=daw","root","");
	$receta=$pdo->query("SELECT * FROM recetas WHERE id={$_GET['idReceta']}")->fetch(PDO::FETCH_ASSOC);
	foreach($receta as $campo => $valor){
		echo "$campo: $valor <br>";
	}
	
?>