<?php
	include "../EjemploLogin/conexionBD.php";
	$sql="INSERT INTO recetas (titulo, procedimiento, dificultad, tiempo, id_usuario) 
						VALUES (?, ?, ?, ?, ?)";
	$statement=$pdo->prepare($sql);
	//el id del usuario lo sacariamos de la sesion ($_SESSION['id']), como no tenemos ponemos 1 
	$statement->execute(
	array($_POST['titulo'],$_POST['procedimiento'],$_POST['dificultad'],$_POST['tiempo'],1)
	);
?>

<form action="anadirIngredientes.php" method="POST">
<?php
$ingredientes=$pdo->query("SELECT id,nombre FROM ingredientes;")->fetchAll(PDO::FETCH_ASSOC); 
for($num=0;$num<$_POST['num_ingredientes'];$num++){
	echo "<input type='hidden' name='receta' value='{$_POST['titulo']}'>";
	echo "<select id='ingrediente$num' name='ingrediente$num'>";
	foreach($ingredientes as $ingrediente){
		echo "<option value='{$ingrediente['id']}'> {$ingrediente['nombre']} </option>";
	}
		echo "<option value='0'> Otro ingrediente </option>";	
	echo "</select><br>"; 
}?>
<input type="submit" value="Enviar">
</form>