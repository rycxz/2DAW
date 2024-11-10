<<<<<<< HEAD
<?php
$resultado=$pdo->query("SELECT * FROM recetas WHERE id='{$_POST['receta']}'");
$receta=$resultado->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Receta</title>
    <style type="text/css">
			body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 20px;
		}

		.container {
			max-width: 600px;
			margin: auto;
			background: white;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			text-align: center;
			color: #333;
		}

		label {
			display: block;
			margin: 10px 0 5px;
		}

		input[type="text"],
		input[type="number"],
		input[type="datetime-local"],
		textarea,
		select {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ddd;
			border-radius: 4px;
		}

		textarea {
			resize: vertical;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 15px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
    <div class="container">
        <h1>Modificar Receta</h1>
        <form action="modificarReceta.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $receta['id'];?>"> <!-- ID de la receta que se va a modificar -->

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $receta['titulo'];?>" required>

            <label for="procedimiento">Procedimiento:</label>
            <textarea id="procedimiento" name="procedimiento" required><?php echo $receta['procedimiento'];?></textarea>

            <label for="id_usuario">ID Usuario:</label>
            <input type="number" id="id_usuario" name="id_usuario" value="<?php echo $receta['id_usuario'];?>" required>

            <label for="dificultad">Dificultad:</label>
            <select id="dificultad" name="dificultad" required>
                <option value="Fácil">Fácil</option>
                <option value="Media">Media</option>
                <option value="Difícil">Difícil</option>
            </select>

            <label for="tiempo">Tiempo:</label>
            <input type="text" id="tiempo" name="tiempo" value="<?php echo $receta['tiempo'];?>" required>

            <button type="submit">Modificar Receta</button>
        </form>
    </div>
</body>
</html>
=======
<?php
$resultado=$pdo->query("SELECT * FROM recetas WHERE id='{$_POST['receta']}'");
$receta=$resultado->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Receta</title>
    <style type="text/css">
			body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 20px;
		}

		.container {
			max-width: 600px;
			margin: auto;
			background: white;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
		}

		h1 {
			text-align: center;
			color: #333;
		}

		label {
			display: block;
			margin: 10px 0 5px;
		}

		input[type="text"],
		input[type="number"],
		input[type="datetime-local"],
		textarea,
		select {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			border: 1px solid #ddd;
			border-radius: 4px;
		}

		textarea {
			resize: vertical;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 15px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}

		button:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
    <div class="container">
        <h1>Modificar Receta</h1>
        <form action="modificarReceta.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $receta['id'];?>"> <!-- ID de la receta que se va a modificar -->

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $receta['titulo'];?>" required>

            <label for="procedimiento">Procedimiento:</label>
            <textarea id="procedimiento" name="procedimiento" required><?php echo $receta['procedimiento'];?></textarea>

            <label for="id_usuario">ID Usuario:</label>
            <input type="number" id="id_usuario" name="id_usuario" value="<?php echo $receta['id_usuario'];?>" required>

            <label for="dificultad">Dificultad:</label>
            <select id="dificultad" name="dificultad" required>
                <option value="Fácil">Fácil</option>
                <option value="Media">Media</option>
                <option value="Difícil">Difícil</option>
            </select>

            <label for="tiempo">Tiempo:</label>
            <input type="text" id="tiempo" name="tiempo" value="<?php echo $receta['tiempo'];?>" required>

            <button type="submit">Modificar Receta</button>
        </form>
    </div>
</body>
</html>
>>>>>>> origin/master
