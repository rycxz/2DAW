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
    include_once ("../../modelo/comentarios.php");
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
<script>
    //aqui me hare una redireccion al controlador de elminar receta:
    function eliminarReceta(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta receta? ("+id+")")) {
            window.location.href = "../../../controlador/controladoresRecetas/controladorBorrarReceta/controladorBorradoReceta.php?idReceta="+id;
        }
    }
</script>
<body>
<header class="header">

 </header>
 <main class="contenedorVistaUnaReceta">


 <?php
 //saco la receta los detalles completos
 $receta = obtenerReceta($_GET['idReceta']);

//saco los ingredientes asociados a la receta
$ingredientesReceta = obtenerIngredientesReceta($_GET['idReceta']);

// recorro los ingredientes de la receta
if(!empty($ingredientesReceta)){
foreach ($ingredientesReceta as $ingrediente) {
    // Obtengo el nombre del ingrediente
    $nombreIngrediente = sacarNombreIngrediente($ingrediente['id_ingrediente']);
    $cantidadIngrediente = $ingrediente['cantidad'];
    $medidaIngrediente = $ingrediente['medida_unidad'];
    // Concateno el nombre del ingrediente al campo 'nombreIngredientes'

}}
$idUsuario = $receta['id_usuario'];
 $usuarioPublicador = selectUsuario($receta['id_usuario']);
$_SESSION['receta']=$receta;
$_SESSION['ingReceta']=$ingredientesReceta;
 ?>

<div class="receta">
    <h1 class="nombreReceta"><?php echo $receta['nombre']; ?></h1>
    <img src="../../../imagenes/imagenesReceta/<?php echo $receta['rutaImagen']; ?>" alt="Imagen de la receta" class="imagenReceta">
    <p class="fechaPublicacion">Fecha de publicación: <span><?php echo $receta['fechaPublicacion']; ?></span></p>
    <p class="dificultad">Dificultad: <span><?php echo $receta['dificultad']; ?></span></p>
    <p class="tipoReceta">Tipo de receta: <span><?php echo $receta['tipoReceta']; ?></span></p>
    <p class="valoracionMedia">Valoración media: <span><?php echo $receta['valoracionMedia']; ?></span></p>
    <p class="publicadaPor">Publicada por: <span>
    <a href="../../../controlador/controadoresUsuarios/controladorVerUsuario.php?idUsuario=<?= $idUsuario ?>" class="textuUser">


 <?php echo $usuarioPublicador['nickname']; ?></span></a></p>


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


    <!-- Botones de acción -->
    <div class="botonesAccion">
        <button class="botonModificar" onclick="location.href='../../../controlador/controladoresRecetas/modificarRecetaControlador.php' ">Modificar</button>
        <button class="botonEliminar" onclick="eliminarReceta(<?php echo $_GET['idReceta']; ?>)">Eliminar</button>
    </div>
</div>

 </main>
 <footer class="footer">
    </footer>
</body>
<script src="../../vistas/Headers/HeaderAdmin.js"></script>
<style>
 /* Estilo general */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;

    text-align: left;

}

.listaComentarios {
    list-style: none;
    padding: 0;
}

.comentario {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.fechaComentario {
    font-size: 12px;
    color: #666;
}

.botonAgregarComentario {
    margin-top: 10px;
    background-color: #45a049;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    cursor: pointer;
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

.textuUser{
    color: #45a049;
    text-decoration: none;
    font-style: italic;
    font-weight: 900;
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
 /* Estilo de los botones */
.botonModificar {
    background-color: #4CAF50;
    color: white;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.botonModificar:hover {
    background-color: #45a049;
    transform: scale(1.05);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

.botonEliminar {
    background-color: #f44336;
    color: white;
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.botonEliminar:hover {
    background-color: #d32f2f;
    transform: scale(1.05);
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
}

/* Contenedor de los botones */
.botonesAccion {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 30px;
}



</style>


</html>
