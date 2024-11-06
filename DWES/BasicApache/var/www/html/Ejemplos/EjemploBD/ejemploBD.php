<?php
	include "../EjemploLogin/conexionBD.php";
	
	$resultado=$pdo->query("SELECT titulo, procedimiento, fecha_creacion, dificultad, tiempo  FROM recetas");
	//var_dump($resultado->fetchAll(PDO::FETCH_ASSOC));
	
	echo '<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Recetas</title>
			<link rel="stylesheet" href="stylesBD.css">
		</head>
		<body>
			<table>
				<thead>
					<tr>
						<th>Título</th>
						<th>Procedimiento</th>
						<th>Fecha de Creación</th>
						<th>Dificultad</th>
						<th>Tiempo</th>
					</tr>
				</thead>
				<tbody>';
	while($receta=$resultado->fetch(PDO::FETCH_ASSOC)){
		echo "<tr>";
		foreach($receta as $campo){
			echo "<td> $campo </td>";
		}
		echo "</tr>";
	}
	echo "</tbody> </table> </body>";
?>
<form action="redirigir.php" method="post">
	<input type="submit" name="accion" value="Añadir">
	<br><br>
	<?php
		$resultado=$pdo->query("SELECT id, titulo FROM recetas");
		echo '<select name="receta">
		<option value="">Seleccione una receta</option>';
		while($receta=$resultado->fetch(PDO::FETCH_ASSOC)){
			echo  "<option value='{$receta['id']}'>{$receta['titulo']}</option>";
		}
		echo '</select>';
	?>
	<input type="submit" name="accion" value="Modificar">
	<input type="submit" name="accion" value="Eliminar">
</form>
<?php

?>