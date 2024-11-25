<?php
    include_once ("../../modelo/receta.php");
    include_once ("../../modelo/usuario.php");
    include_once ("../../modelo/ingrediente.php");
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

 <?php
 //saco la receta los detalles completos
 $receta = obtenerReceta($_GET['idReceta']);
 //añado un campo mas al que operar
$receta['nombreIngredientes'] = "";
//saco los ingredientes asociados a la receta
$ingredientesReceta = obtenerIngredientesReceta($_GET['idReceta']);

// recorro los ingredientes de la receta
if(!empty($ingredientesReceta)){
foreach ($ingredientesReceta as $ingrediente) {
    // Obtengo el nombre del ingrediente
    $nombreIngrediente = sacarNombreIngrediente($ingrediente['id_ingrediente']);
    // Concateno el nombre del ingrediente al campo 'nombreIngredientes'
    if (!empty($receta['nombreIngredientes'])) {
        $receta['nombreIngredientes'] .= ", "; // Agrega una coma como separador
    }
    $receta['nombreIngredientes'] .= $nombreIngrediente;
}}
 $usuarioPublicador = selectUsuario($receta['id_usuario']);

 ?>

<div class="receta">
    <h1 class="nombreReceta"><?php echo $receta['nombre']; ?></h1>
    <img src="<?php echo $receta['rutaImagen']; ?>" alt="Imagen de la receta" class="imagenReceta">
    <p class="fechaPublicacion">Fecha de publicación: <span><?php echo $receta['fechaPublicacion']; ?></span></p>
    <p class="dificultad">Dificultad: <span><?php echo $receta['dificultad']; ?></span></p>
    <p class="tipoReceta">Tipo de receta: <span><?php echo $receta['tipoReceta']; ?></span></p>
    <p class="valoracionMedia">Valoración media: <span><?php echo $receta['valoracionMedia']; ?></span></p>
    <p class="publicadaPor">Inicia sesion para averiguar quien ha creado esta receta!</p>

    <h2>Ingredientes para una persona</h2>
    <p class="ingredientesRecetas">
    Ingredientes de la receta: <br>
        <?php
        if(!empty($ingredientesReceta)){
    foreach ($ingredientesReceta as $ingrediente) { ?>
          <span><?php  $nombreIngrediente = sacarNombreIngrediente($ingrediente['id_ingrediente']);
        echo  $nombreIngrediente;   ?>
        con esta cantidad: <?php echo $ingrediente['cantidad']; ?>
        <?php echo $ingrediente["medida_unidad"]; ?></span><br>

    <?php } }
    else{
        echo "Vaya no sabemos los ingredientes de esta receta! 🤔🤔🤔";
    }?>

<!--
       Ingredientes de la receta: <span><?php echo  $receta['nombreIngredientes']; ?>
        con esta cantidad: <?php echo $ingredientesReceta['cantidad']; ?>
        <?php echo $ingredientesReceta["medida_unidad"]; ?></span>-->
</p>

    <h2>Elaboración</h2>
    <p class="elaboracion"><?php echo $receta['elaboracion']; ?></p>


</div>



 </main>
 <footer class="footer">
    </footer>
</body>
<script src="../../vistas/Headers/HeaderNoLogged.js"></script>
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

    text-align: center;
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
</html>
