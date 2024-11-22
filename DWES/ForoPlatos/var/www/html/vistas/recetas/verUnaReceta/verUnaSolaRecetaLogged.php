<?php
/*
include ("../../modelo/conexionBD.php");
	$pdo=conexionBD();
	$receta=$pdo->query("SELECT * FROM receta WHERE id={$_GET['idReceta']}")->fetch(PDO::FETCH_ASSOC);
	foreach($receta as $campo => $valor){
		echo "$campo: $valor <br>";
	}
	*/
 
    include_once ("../../modelo/receta.php");
    include_once ("../../modelo/usuario.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ForoPlatos</title>
	<link rel="stylesheet" href="../../../vistas/Headers/estilosHeaderFooter/estilosHeaderFooter.css">
    <link rel="icon" href=" ../../../../imagenes/imagenesWeb/icono.ico" type="image/x-icon">
</head>
<body>
<header class="header">
 </header>
 <main class="contenedorVistaUnaReceta">
 yo si estoy loggeado 
 </main>
 <footer class="footer">
    </footer>
</body>
<script src="../../vistas/Headers/HeaderLogged.js"></script>
<style>
 /* Estilo general */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
}

main.contenedorVistaUnaReceta {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

/* Botón de cerrar */
.botonCruz {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
}

.botonCruz img {
    width: 24px;
    height: 24px;
}

/* Estilo de la receta */
.receta {
    text-align: center;
}

.nombreReceta {
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 20px;
    color: #444;
}

.imagenReceta {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 20px 0;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.fechaPublicacion,
.dificultad,
.tipoReceta,
.valoracionMedia,
.publicadaPor,
.ingredientesRecetas {
    font-size: 16px;
    margin: 10px 0;
}

.fechaPublicacion span,
.dificultad span,
.tipoReceta span,
.valoracionMedia span,
.publicadaPor span,
.ingredientesRecetas span {
    font-weight: bold;
    color: #555;
}

h2 {
    font-size: 20px;
    margin-top: 20px;
    color: #333;
}

.elaboracion {
    text-align: justify;
    line-height: 1.6;
    margin-top: 10px;
    color: #555;
}

/* Botones de acción */
.botonesAccion {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.botonModificar {
    background-color: #4CAF50;
    color: white;
}

.botonModificar:hover {
    background-color: #45a049;
}

.botonEliminar {
    background-color: #f44336;
    color: white;
}

.botonEliminar:hover {
    background-color: #d32f2f;
}
 
 

</style>
<script>
    function eliminarReceta(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta receta?")) {
            location.href = 'eliminarReceta.php?id=' + id;
        }
    }
</script>

</html>